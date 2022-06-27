<?php

namespace App\Http\Controllers\Admin;

use Auth;
use File;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\OpdUser;
use App\Models\Admin\Opd;
use App\Models\Admin\PopupInfo;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Intervention\Image\ImageManagerStatic as Image;


class PopupInfoController extends Controller
{


    public $nmPart = "admin.module.popupinfo.";
    public $data  = [];
    public $uriModul  = "/popupinfo";
    public $opduser  ;
    public $opd;
    public $user;


    public  function __construct(Request $request, OpdUser $opduser, Opd $opd){
        $this->opduser = $opduser;
        $this->opd = $opd;


        $this->data['base_link_media_popupinfo_thumbnail'] = asset('media/popupinfo/thumbnail')."/";
        $this->data['base_link_asset_img'] = asset('presentation/b-asset/img')."/";
    }



    public function index(PopupInfo $popupInfo){

      $this->data['menu'] = 'popupinfo';
      $this->data['data']= PopupInfo::all();
      $this->data['data']= $popupInfo->latest();
      return view($this->nmPart."popupinfoIndex",$this->data);
    }

    public function show(){
      $data['menu'] = 'popupinfo';

      $data = PopupInfo::all();

      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', 'admin.module.popupinfo.action')
      ->rawColumns(['action'])
      ->make(true);
    }

    public function create(){
      $data['menu'] = 'popupinfo';
      $data['mode'] = 'new';
      return view($this->nmPart."popupinfoCreate",$data);
    }


    public static function quickRandom($length = 16)
    {
        $pool = '_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }


    public function uploadImg($file, $originalName, $thumbName){

      $path_ori = public_path('media/popupinfo/original/');
      $path_thumb = public_path('media/popupinfo/thumbnail/');
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


    public function store(Request $request, popupinfo $popupinfo){
      $this->validate($request, [
          'file' => 'required',
          'title' => 'required',
          'desc' => 'required',
      ],


      [ 'file.required' => 'Kolom Banner tidak boleh kosong.',
      'title.required' => 'Kolom judul / title boleh kosong.',
      'desc.required' => 'Kolom Description / Keterangan tidak boleh kosong.',

  ]);


      $user = Auth::user();

      $unors = $this->opduser->where("user_id","=",$user->id);

      if($unors->count()>0){
          $unor = $unors->get()[0]->opd_unor;
      }else{
          return redirect()->route('admin.transaksi.popupinfo.create')->with('warning','Unor / Organisasi tidak ditemukan, Anda Tidak Terdaftar Pada salah satu OPD / SKPD.');

      }




      $file = $request->file('file');
      [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
      [$width, $height] =getimagesize($file);


      $this->uploadImg($file,$filename_original, $filename_thumbnail);


      $post = (object) $request->all();


      $popupinfo->link_forward = $request->link_forward;
      $popupinfo->title = $request->title;
      $popupinfo->desc = $request->desc;
      $popupinfo->slug = $request->slug;
      $popupinfo->img_thumb = $filename_thumbnail;
      $popupinfo->img_raw = $filename_original;
      $popupinfo->hit = 0;
      $popupinfo->unor = $unor;
      $popupinfo->duration = $request->duration;
      $popupinfo->publish_date = $request->published == "yes" ? date('Y-m-d H:i:s') : null;
      $popupinfo->published = $request->published == "yes" ? "yes":"no";
      $popupinfo->publishedby = "";
      $popupinfo->creatorid = "";
      $popupinfo->createdby = "";
      $popupinfo->modifiedby = "";
      $popupinfo->modifierid = "";
      $popupinfo->created_at =date('Y-m-d H:i:s');
      $popupinfo->updated_at = date('Y-m-d H:i:s');

      $popupinfo->save();

      return redirect()->route('admin.transaksi.popupinfo.index')->with('success','Data berhasil di input');
    }


    public function deleteImg($images){




      foreach ($images as $image) {

        if (File::exists($image)) {
            File::delete($image);
        }

        // if(file_exists($image)){
        //     unlink($image);
        // }

        // if (File::exists($image)) {

        //     File::delete($image);
        // }

        // Storage::delete($image);
    }

    }


    public function update(Request $request, popupinfo $popupinfo)
    {

      $this->validate($request, [
        'title' => 'required',
        'desc' => 'required',
      ]);


      $input= $request->all();
      $id = $input["id"];
      $file = $request->file('file');
      $b = $popupinfo->find($id);

      unset($input["id"]);
      unset($input["file"]);
      unset($input["_token"]);
      // dd($input);



      if($file){
        // $b=$popupinfo;


        $path_ori = public_path('media/popupinfo/original/');
        $path_thumb = public_path('media/popupinfo/thumbnail/');


        [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
        [$width, $height] = getimagesize($file);


        $this->uploadImg($file,$filename_original, $filename_thumbnail);

        $input["img_thumb"] = $filename_thumbnail;
        $input["img_raw"] = $filename_original;



        $files = [];

        // dd($b->img_thumb);

        if(strlen($b->img_thumb)>0){
            $files[] =  $path_thumb.$b->img_thumb;
        }

        if(strlen($b->img_raw)>0){
            $files[] =  $path_ori.$b->img_raw;
        }


        if(count($files) > 0){

          // dd($files);
            $this->deleteImg($files);
        }


      }

      $input["updated_at"] = date('Y-m-d H:i:s');
      $popupinfo->where("id",$id)->update($input);

      return redirect()->route('admin.transaksi.popupinfo.index')->with('success','biodata berhasil di update');
    }


    public function edit(PopupInfo $popupinfo, $id)
    {

      $popupinfo_item = $popupinfo::find($id);
      $data['menu'] = 'popupinfo';
      $data['mode'] = 'edit';
      $data['popupinfo'] = $popupinfo_item;


      return view($this->nmPart."popupinfoCreate",$data);
    }


    function getOpdAvailabe(){
        if (Auth::check()){
            $user = Auth::user();

            $opd = $this->opd->getByIdUser($user->id);
            // dd($opd->kd_unor);


        }else{
            $default_opd = env('OPD_DEFAULT');
            $sql= DB::raw("CONCAT(prov_id,'.',kab_id,'.',kec_id,'.',kel_id)");
            $opd = $this->opd->where($sql, $default_opd)->first();

            // dd($opd->kd_unor);


        }

        return $opd;

    }


    public function getlist(PopupInfo $popupinfo){

        $opd = $this->getOpdAvailabe();

        // $user = Auth::user();

        // $unor = $this->opd->getByIdUser($user->id)->kd_unor;




      $data = $popupinfo->list(99999999999999999,["unor","=",$opd->kd_unor]);
      // print_r($data); die();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', 'admin.module.popupinfo.action')
      ->rawColumns(['action'])
      ->make(true);
    }


    public function delete(PopupInfo $popupinfo, $id)
    {
      $popupinfo->where("id",$id);
      $b=$popupinfo->first();

      $files = [];

        if(strlen($b->img_thumb)>0){
            $files[] =  public_path('media/popupinfo/thumbnail/'.$b->img_thumb);
        }

        if(strlen($b->img_raw)>0){
            $files[] =  public_path('media/popupinfo/original/'.$b->img_raw);
        }


        if(count($files) > 0){
            $this->deleteImg($files);
        }


      if($popupinfo->where("id",$id)->delete()){
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
