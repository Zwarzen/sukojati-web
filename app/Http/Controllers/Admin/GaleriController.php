<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Galeri;
use App\Models\Admin\Unor;
use App\Models\Admin\KategoriGaleri;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use DataTables;
use DB;


use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class GaleriController extends Controller
{


    public $nmPart = "admin.module.galeri.";
    public $data  = [];
    public $uriModul  = "/galeri";
    public $unor;


    public  function __construct(Request $request,Unor $unor){
        $this->unor = $unor;

      $this->data['base_link_media_galeri_thumbnail'] = asset('media/galeri/thumbnail')."/";
      $this->data['base_link_asset_img'] = asset('presentation/b-asset/img')."/";
    }

    public function index(Galeri $galeri){


      $this->data['menu'] = 'galeri';
      return view($this->nmPart."galeriIndex",$this->data);
    }

    public function show(){
      $data = Galeri::all();
        // print_r($data); die();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', 'admin.module.galeri.action')
      ->rawColumns(['action'])
      ->make(true);
    }

    public function create(){
        $data['menu']       = 'galeri';
        $data["kategori"]   = KategoriGaleri::all();
        $data['unors']      = $this->unor->all();

        return view($this->nmPart."CreateFormGaleri",$data);
    }

    public static function quickRandom($length = 16)
    {
        $pool = '_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }


    public function uploadImg($file, $originalName, $thumbName){

      $path_ori = public_path('media/galeri/original/');
      $path_thumb = public_path('media/galeri/thumbnail/');
      [$width, $height] =getimagesize($file);

      if($width>300){
        $width = 300;
        $height = 200;
      }

      Image::make($file)->resize($width,$height)->save($path_thumb.$thumbName);

      $file->move($path_ori, $originalName);

    }

    public function getNamedFile($file){
      $archiv = value(function() use ($file){

        $oriName = $file->getClientOriginalName();
        $name = pathinfo($oriName, PATHINFO_FILENAME);


      $filename = $this->quickRandom(10) . '_'.Str::slug($name).".". $file->getClientOriginalExtension();
          return strtolower($filename);

      });

      return ["thmb_".$archiv,$archiv];
    }


    public function store(Request $request, Galeri $galeri){
      $this->validate($request, [
          'file' => 'required',
          'title' => 'required',
          'desc' => 'required',
      ]);


      $file = $request->file('file');
      [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
      [$width, $height] =getimagesize($file);


      $this->uploadImg($file,$filename_original, $filename_thumbnail);


      $post = (object) $request->all();


      $galeri->title                = $request->title;
      $galeri->desc                 = $request->desc;
      $galeri->slug                 = $request->slug;
      $galeri->img_thumb            = $filename_thumbnail;
      $galeri->img_raw              = $filename_original;
      $galeri->hit                  = 0;
      $galeri->publish_date         = $request->published == "yes" ? date('Y-m-d H:i:s') : null;
      $galeri->published            = $request->published == "yes" ? "yes":"no";
      $galeri->galeri_kategori_id   = $request->galeri_kategori_id;
      $galeri->publishedby          = "";
      $galeri->creatorid            = "";
      $galeri->createdby            = "";
      $galeri->modifiedby           = "";
      $galeri->modifierid           = "";
      $galeri->kd_unor              = $request->kd_unor;
      $galeri->created_at           =date('Y-m-d H:i:s');
      $galeri->updated_at           = date('Y-m-d H:i:s');

      $galeri->save();

      return redirect()->route('admin.transaksi.galeri.index')->with('success','Data berhasil di input');
    }


    public function deleteImg($image_path){
      if (File::exists($image_path)) {
        File::delete($image_path);
      }
    }


    public function update(Request $request, Galeri $galeri)
    {

      $this->validate($request, [
        'title' => 'required',
        'desc' => 'required',
      ]);


      $input        = $request->all();
      $id           = $input["id"];
      $file         = $request->file('file');
      $galeri->where("id",$id);

      unset($input["id"]);
      unset($input["file"]);
      unset($input["_token"]);
      // dd($input);



      if($file){
        $g          =$galeri->first();
        $path_ori   = public_path('media/galeri/original/');
        $path_thumb = public_path('media/galeri/thumbnail/');


        [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
        [$width, $height] = getimagesize($file);


        $this->uploadImg($file,$filename_original, $filename_thumbnail);

        $input["img_thumb"] = $filename_thumbnail;
        $input["img_raw"] = $filename_original;



        $this->deleteImg(public_path('media/galeri/thumbnail/'.$g->img_thumb));
        $this->deleteImg(public_path('media/galeri/original/'.$g->img_raw));



      }

      $input["updated_at"] = date('Y-m-d H:i:s');
      $galeri->where("id",$id)->update($input);

      return redirect()->route('admin.transaksi.galeri.index')->with('success','biodata berhasil di update');
    }


    public function edit(Galeri $galeri, $id)
    {

      $galeri_item = $galeri::where("id","=",$id)->first();
      $data["kategori"] = KategoriGaleri::all();
      $data['menu'] = 'galeri';
      $data['mode'] = 'edit';
      $data['galeri'] = $galeri_item;


      return view($this->nmPart."CreateFormGaleri",$data);
    }

    public function getlist(Galeri $galeri){
      $data = DB::table("galeris")->select("galeris.*","galeri_kategoris.name")->join("galeri_kategoris", "galeri_kategoris.id","=","galeris.galeri_kategori_id")->get();
      // print_r($data); die();/
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', 'admin.module.galeri.action')
    ->rawColumns(['action'])
    ->make(true);
    }


    public function delete($id)
    {
      $kategorigaleri = Galeri::where('id',$id)->delete();

      if($kategorigaleri){
        echo json_encode([
          "status" => true,
          "message" => "Data berhasil dihapus"
        ]);
      }else{
        echo json_encode([
          "status" => false,
          "message" => "Data tidak terhapus"
        ]);
      }

    }


}
