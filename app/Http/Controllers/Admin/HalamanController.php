<?php

namespace App\Http\Controllers\Admin;

use Auth;
use File;
use DataTables;
use Illuminate\Support\Str;


use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use App\Models\Admin\Halaman;
use App\Models\Admin\OpdUser;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class HalamanController extends Controller
{
    public $nmPart = "admin.module.halaman.";
    public $data  = [];
    public $uriModul  = "/halaman";
    public $halaman;
    public $request;
    public $opduser;

    public function __construct(Halaman $halaman, OpdUser $opduser)
    {
        $this->halaman = $halaman;
        $this->opduser = $opduser;
    }

    public function index(Request $req){
        $data['menu'] = 'halaman';

        $user = Auth::user();

        $unors = $this->opduser->where("user_id","=",$user->id);

        if($unors->count()>0){
            $unor = $unors->get()[0]->opd_unor;
            // dd($unor);
        }else{
            return redirect()->route('admin.transaksi.berita.index')->with('warning','Unor / Organisasi tidak ditemukan, Anda Tidak Terdaftar Pada salah satu OPD / SKPD.');

    }

        $b = $this->halaman->getForPaginated();


        if(isset($req->published)){
            if($req->published != "all"){
                $b->where("published","=",$req->published);
            }

            $data["published"] = $req->published;

        }else{
            $data["published"] = "yes";
            $b->where("published","=","yes");
        }

        if(isset($req->keyword) && $req->keyword != ""){
          $exploded_key = explode(" ",$req->keyword);
          $not_blank_key = [];

          $data["keyword"] = $req->keyword;
          $data["keywords"] = $exploded_key;


            foreach ($exploded_key as $key => $value) {

                if($value != ""){
                    array_push($not_blank_key,$value);

                    $where[] = ["nama","like","%".$value."%"];
                    $b->where('nama','like',"%".$value."%");

                }

            }
        }

        $b->where("unor",$unor);
        $data['halamans'] = $b->paginate(5);
        return view($this->nmPart."halamanIndex",$data);
    }

    public function show(){
      $data = halaman::all();
        // print_r($data); die();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', 'admin.module.halaman.action')
      ->rawColumns(['action'])
      ->make(true);
    }

    public function create(Request $req){
        $input = (object)$req->all();


        if(isset($input->parent_id)){
            $this->data['parent_id_for_submenu'] = $input->parent_id;
        }

        $this->data['menu'] = 'halaman';
        $this->data['mode'] = 'new';

        return view($this->nmPart."createHalaman",$this->data);
    }


    public function deleteImg($image_path){
        if (File::exists($image_path)) {
            File::delete($image_path);

            echo "akan hapus <br>";
            echo $image_path;
            echo " <br>";


        }else{
          echo "tidak bisa hapus <br>";
          echo $image_path;
          echo "<br>";
        }
    }


    public function uploadVideo($file, $originalName, $thumbName){

        $path_video = public_path('media/halamanfoto/video/');

        $file->move($path_video, $originalName);

    }

    public function uploadImg($file, $originalName, $thumbName){

        $path_ori = public_path('media/halamanfoto/original/');
        $path_thumb = public_path('media/halamanfoto/thumbnail/');
        [$width, $height] =getimagesize($file);

        if($width>300){
            $width = 300;
            $height = 200;
        }

        Image::make($file)->resize($width,$height)->save($path_thumb.$thumbName);

        $file->move($path_ori, $originalName);

    }


    public static function quickRandom($length = 16)
    {
        $pool = '_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
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

    public function store(Request $request){
        $halaman = $this->halaman;
        $user = Auth::user();

        $unors = $this->opduser->where("user_id","=",$user->id);

        if($unors->count()>0){
            $unor = $unors->get()[0]->opd_unor;
        }else{
            return redirect()->route('admin.master.halaman.create')->with('warning','Unor / Organisasi tidak ditemukan, Anda Tidak Terdaftar Pada salah satu OPD / SKPD.');

        }



        $this->validate($request, [
            'nama' => 'required',
            'desc' => 'required',
        ],
        [ 'nama.required' => 'Kolom Nama tidak boleh kosong.',
            'desc.required' => 'Kolom Keterangan / Cuplikan tidak boleh kosong.',

        ]);


        $file = $request->file('file');
        // $video_file = $request->file('video');

        // dd($video_file);
        $post = (object) $request->all();

        // dd($post);


        // [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
        // [$width, $height] =getimagesize($file);


        // $this->uploadImg($file,$filename_original, $filename_thumbnail);


        // if($video_file){
        //     [$filename_thumbnail, $filename_original] = $this->getNamedFile($video_file);
        //     $this->uploadVideo($video_file,$filename_original, $filename_thumbnail);

        //     $halaman->url_video = $filename_original;

        // }else{
        //     $halaman->url_video = "";
        // }

        // if(isset($post->id_youtube)){
        //     $halaman->id_youtube =  $post->id_youtube;
        // }

        if(isset($file)){


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
            [$width, $height] = getimagesize($file);


            $this->uploadImg($file,$filename_original, $filename_thumbnail);

            $halaman->img_thumb = $filename_thumbnail;
            $halaman->img_raw = $filename_original;
            $halaman->img_desc = $post->img_desc?$request->img_desc:'';

        }else{
            $halaman->img_thumb = "";
            $halaman->img_raw = "";
            $halaman->img_desc = isset($post->img_desc) ?$request->img_desc:'';
        }


        $halaman->nama = $post->nama;
        $halaman->slug = $post->slug;
        $halaman->desc = $post->desc;
        $halaman->parent_id = $post->parent_id;
        $halaman->content = $post->content;
        $halaman->url = $post->url;
        // $halaman->is_berita_video = $post->is_berita_video == "yes" ? "yes":"no";
        $halaman->hit = 0;
        $halaman->unor = $unor;
        $halaman->keyword = $post->keyword;
        $halaman->allow_comment = $post->published == "yes" ? "yes":"no";
        $halaman->publish_date = $post->published == "yes" ? date('Y-m-d H:i:s') : null;
        $halaman->published = $post->published == "yes" ? "yes":"no";
        // $halaman->berita_kanal_id = $post->berita_kanal_id;
        $halaman->publishedby =  $post->published == "yes" ? $user->email : '';
        $halaman->creatorid = $user->id;
        $halaman->createdby = $user->email;
        $halaman->modifiedby = $user->email;
        $halaman->modifierid = $user->id;

        $halaman->created_at =date('Y-m-d H:i:s');
        $halaman->updated_at = date('Y-m-d H:i:s');

        $halaman->save();



        /// sync dengan tabel indexs untuk bahan pencarian
        // $img_url = strlen($halaman->img_thumb)>0?$this->path_tumbnail_media.$halaman->img_thumb : 'presentation/b-asset/img/lambang-daerah.png';
        // $indexData = [
        // "title" =>$post->title,
        // "desc" => $post->desc,
        // 'item_url' => "/halamanfoto/".$post->slug,
        // 'base_url' => url('/'),
        // 'img_url' =>  $img_url,
        // 'hit' => 0,
        // 'keyword' => $post->keyword,
        // 'published' => $post->published == "yes" ? "yes":"no",
        // 'categori_id' => '1',
        // 'categori_name' => 'Berita',
        // 'creatorid' => $user->id,
        // 'createdby' => $user->email,
        // 'modifiedby' => $user->email,
        // 'modifierid' => $user->id,
        // 'created_at' => date('Y-m-d H:i:s'),
        // 'updated_at' => date('Y-m-d H:i:s')
        // ];



        // $this->indexs::create($indexData);

        return redirect()->route('admin.master.halaman.index')->with('success','Data berhasil di input');
    }

    public function edit($id)
    {
      $halaman = $this->halaman::find($id);
      if($halaman->parent_id != 0){
            $parent = $this->halaman::find($halaman->parent_id);
            $halaman->parent_nama = $parent->nama;

      }


      $data['menu'] = 'halaman';
      $data['halaman'] = $halaman;
      $data['mode'] = 'edit';
      return view($this->nmPart.'createHalaman',$data);
    }

    public function update(Request $request, halaman $halaman)
    {

        $this->validate($request, [
            'nama' => 'required',
        ]);


        $input= $request->all();
        $id = $input["id"];
        $file = $request->file('file');
        $video_file = $request->file('video');


        $halaman->where("id",$id);

        unset($input["id"]);
        unset($input["file"]);
        unset($input["_token"]);
        unset($input["video"]);
        // dd($input);

        $user = Auth::user();
        $input["modifiedby"] = $user->email;
        $input["modifierid"] = $user->id;


        if($file){
            $g=$halaman->find($id);
            $path_ori = public_path('media/halamanfoto/original/');
            $path_thumb = public_path('media/halamanfoto/thumbnail/');


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
            [$width, $height] = getimagesize($file);


            $this->uploadImg($file,$filename_original, $filename_thumbnail);

            $input["img_thumb"] = $filename_thumbnail;
            $input["img_raw"] = $filename_original;



            $this->deleteImg(public_path('media/halamanfoto/thumbnail/'.$g->img_thumb));
            $this->deleteImg(public_path('media/halamanfoto/original/'.$g->img_raw));



        }

        $input["updated_at"] = date('Y-m-d H:i:s');
        $halaman->where("id",$id)->update($input);

        return redirect()->route('admin.master.halaman.edit',$id)->with('success','Berita berhasil di update');
    }

    public function getlist(){
      $data = $this->halaman::all();
      // print_r($data); die();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', 'admin.module.halaman.action')
      ->rawColumns(['action'])
      ->make(true);
    }


    public function delete($id)
    {

      $halaman = $this->berita::where("berita_kanal_id",$id);

      if($halaman->count()>0){
        echo json_encode([
          "status" => false,
          "message" => "Tidak bisa dihapus.. kanal ini sudah digunakan oleh berita yang lain"
        ]);
      }else{
        $halaman = $this->halaman::where('id',$id)->delete();

        if($halaman){
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

     /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
    public function destroy()
    {
      echo $id;
      // $halaman = halaman::where('id',$id)->delete();
      // return redirect()->route('admin.master.halaman.index')->with('success','Data berhasil di delete');
    }



    public function deletePage($id)
  {

        $opd = $this->halaman::where('id',$id)->delete();

        if($opd){
            session()->flash('message', 'Data berhasil dihapus');
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


    // if($opd){
    //   return redirect()->route('admin.opd.users')->with('success','Data berhasil hapus');
    // }else{
    //   return redirect()->route('admin.opd.users')->with('danger','Data gagal hapus');
    // }

  }

}
