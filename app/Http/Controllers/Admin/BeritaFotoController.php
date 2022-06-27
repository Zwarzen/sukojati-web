<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BeritaFoto;
use App\Models\Admin\BeritaFotoItem;
use App\Models\Admin\KanalBerita;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use File; 
use Illuminate\Support\Facades\Storage;
use DataTables;

class BeritaFotoController extends Controller
{
    public $nmPart = "admin.module.beritafoto.";
    public $data  = [];
    public $uriModul  = "/berita";
    public $kanal;
    public $berita;
    public $beritaItem;
    public $request;
    public $user;


    public function __construct(
        Request $request, 
        BeritaFoto $beritaFoto, 
        BeritaFotoItem $beritaFotoItem, 
        KanalBerita $kanalBerita
        )
    {
        $this->user = Auth::user();
        $this->berita = $beritaFoto;
        $this->beritaFotoItem = $beritaFotoItem;
        $this->kanal = $kanalBerita;
        $this->request= $request;
        $this->data['base_link_media_thumbnail'] = asset('media/beritafoto/thumbnail/')."/";
        $this->data['base_link_media_original'] = asset('media/beritafoto/original/')."/";
    }


    public function index(){


        $data = $this->data;
        $req = $this->request;
        $where = [];

        
        $b = $this->berita->listIndex(5);


        if(isset($req->published)){
            if($req->published != "all"){
                $b->where("published","=",$req->published);
            }

            $data["published"] = $req->published;
            
        }else{
            $data["published"] = "yes";
            $b->where("published","=","yes");
        }

        if(isset($req->kanal) && $req->kanal != "all"){
            $data["kanal"] = $req->kanal;
            // $where[]=["berita_kanal_id","=",$req->kanal];

            $b->where("berita_kanal_id","=",$req->kanal);

        }

        if(isset($req->keyword) && $req->keyword != ""){
            $exploded_key = explode(" ",$req->keyword);
            $not_blank_key = [];

            $data["keyword"] = $req->keyword;
            $data["keywords"] = $exploded_key;


            foreach ($exploded_key as $key => $value) {

                if($value != ""){
                    array_push($not_blank_key,$value);
                    $b->where('title','like',"%".$value."%");
                    
                }
                
            }


        }


        $data['beritas'] = $b->paginate(5);



        if(isset($req->page)){
            $data["page"] = $req->page;
        }

        $data['menu'] = 'beritaIndex';
        $data['request'] = $req;
        $data['kanals'] = $this->kanal->all();
        

      return view($this->nmPart."beritaIndex",$data);
    }


    public function create(){
        $data['menu'] = 'berita';
        $data['mode'] = 'new';
        $data["kanal"] = $this->kanal::all();


        return view($this->nmPart."createBerita",$data);
    }


    public function addFoto($id){
        $data = $this->data;
        
        $berita = $this->berita::find($id);
        $list_foto = $this->beritaFotoItem::where("beritafotos_id","=",$id)->paginate(5);


        $data['menu'] = 'berita';
        $data['mode'] = 'new';
        $data['list_foto'] = $list_foto;
        $data['berita'] = $berita;
        $data["kanals"] = $this->kanal::all();


        return view($this->nmPart."addFotoBerita",$data);
    }


    public function storeFoto(Request $request){

        $berita = $this->beritaFotoItem;
        $user = Auth::user();

        $this->validate($request, [
            'title' => 'required',
            'img_desc' => 'required',
        ]);

                    
        $file = $request->file('file');

        
        $post = (object) $request->all();
        
        
       
        if($file){


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
            [$width, $height] = getimagesize($file);


            $this->uploadImg($file,$filename_original, $filename_thumbnail);

            $berita->img_thumb = $filename_thumbnail;
            $berita->img_raw = $filename_original;


            $berita->title = $post->title;
            $berita->slug = $post->slug;
            $berita->img_desc = $post->img_desc;
            $berita->beritafotos_id = $post->beritafotos_id;
            
            $berita->creatorid = $user->id;
            $berita->createdby = $user->email;
            $berita->modifiedby = $user->email;
            $berita->modifierid = $user->id;
            $berita->created_at =date('Y-m-d H:i:s');
            $berita->updated_at = date('Y-m-d H:i:s');

           

            ///// update inang dengan gambar pertama dijadikan utama

            $b = $this->berita::find($post->beritafotos_id);

            $berita_foto_item = $this->beritaFotoItem->list(["beritafotos_id","=",$b->id]);

            $jml_berita_foto_item_utama = $this->beritaFotoItem->where([["is_utama","=","yes"],["beritafotos_id","=",$b->id]]);

            // dd($jml_berita_foto_item_utama->count());

            

            $b->jml_fotos = $berita_foto_item->count();

            if($b->jml_fotos  == 0){
                $b->img_thumb = $filename_thumbnail;
                $b->img_raw = $filename_original;
            }

            if($jml_berita_foto_item_utama->count() == 0){
                $berita->is_utama = 'yes';

            }


            $b->jml_fotos  += 1;


            $berita->save();

            $b->save();
            

            return redirect()->route('admin.transaksi.beritafoto.addFoto.{id}',$post->beritafotos_id)
            ->with('success','Data berhasil di input');


        }else{
             return redirect()->route('admin.transaksi.beritafoto.addFoto.{id}',$post->beritafotos_id)
             ->with('warning','Data tidak diinput , foto tidak ditemukan');
            
        }
       
    }

    public function store(Request $request){
        $berita = $this->berita;
        $user = Auth::user();

        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
        ]);

                    
        // $file = $request->file('file');
        // $video_file = $request->file('video');

        // dd($video_file);
        $post = (object) $request->all();



        $berita->title = $post->title;
        $berita->slug = $post->slug;
        $berita->desc = $post->desc;
        // $berita->content = $post->content;
        $berita->hit = 0;
        $berita->keyword = $post->keyword;
        $berita->allow_comment = $post->published == "yes" ? "yes":"no";
        $berita->publish_date = $post->published == "yes" ? date('Y-m-d H:i:s') : null;
        $berita->published = $post->published == "yes" ? "yes":"no";
        $berita->berita_kanal_id = $post->berita_kanal_id;
        $berita->publishedby =  $post->published == "yes" ? $user->email : '';
        $berita->creatorid = $user->id;
        $berita->createdby = $user->email;
        $berita->modifiedby = $user->email;
        $berita->modifierid = $user->id;
        $berita->created_at =date('Y-m-d H:i:s');
        $berita->updated_at = date('Y-m-d H:i:s');

        $berita->save();

        return redirect()->route('admin.transaksi.beritafoto.index')->with('success','Data berhasil di input');
    }

    public function edit($id)
    {
        $data = $this->data;

        $berita = $this->berita::find($id);
        $berita_foto_item = $this->beritaFotoItem->list(["beritafotos_id","=",$berita->id]);
        $berita->jml_fotos = $berita_foto_item->count();
        $berita->save();

        $data["kanal"] = $this->kanal::all();
        $data['menu'] = 'beritafoto';
        $data['mode'] = 'edit';
        $data['berita'] = $berita;


        return view($this->nmPart."createBerita",$data);
    }



    public function editfoto($id){

        
        $data = $this->data;

        $berita_foto_item = $this->beritaFotoItem::find($id);

        $data['menu'] = 'beritafoto';
        $data['mode'] = 'edit';
        $data['foto'] = $berita_foto_item;

        return view($this->nmPart."createBeritaFotoItem",$data);
    }


    public function update(Request $request)
    {

        $berita = $this->berita;
        $user = Auth::user();

        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
        ]);


        $input= $request->all();
        $id = $input["id"];
        // $file = $request->file('file');
        // $video_file = $request->file('video');
        $berita->where("id",$id);

        unset($input["id"]);
        // unset($input["file"]);
        unset($input["_token"]);
        
        $input["updated_at"] = date('Y-m-d H:i:s');
        $input["modifiedby"] = $user->email;
        $input["modifierid"] = $user->id;
        $berita->where("id",$id)->update($input);
        
        return redirect()->route('admin.transaksi.beritafoto.edit',$id)->with('success','Berita berhasil di update');
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

    public function deleteImg($images){

       
        foreach ($images as $image) {

            if(file_exists($image)){
                unlink($image);
            }

            // if (File::exists($image)) {
            
            //     File::delete($image);
            // }

            // Storage::delete($image);
        }
        
    }


    public function uploadImg($file, $originalName, $thumbName){
    
        $path_ori = public_path('media/beritafoto/original/');             
        $path_thumb = public_path('media/beritafoto/thumbnail/');  
        

        try {
            [$width, $height] =getimagesize($file);

            if($width>300){
                $width = 300;
                $height = 200;
            }
            Image::make($file)->resize($width,$height)->save($path_thumb.$thumbName);
        } catch (\Throwable $th) {
            report($th);
        }
        

        $file->move($path_ori, $originalName);

    }



    public function updateFoto(Request $request)
    {

        $berita = $this->beritaFotoItem;
        $user = Auth::user();
        


        $this->validate($request, [
            'title' => 'required',
            // 'img_desc' => 'required',c
        ]);


        $input= $request->all();
        $id = $input["foto_item_id"];
        
        $file = $request->file('file');
        $berita->where("id",$id);
        

        unset($input["foto_item_id"]);
        unset($input["file"]);
        unset($input["_token"]);

        $input["updated_at"] = date('Y-m-d H:i:s');
        $input["modifiedby"] = $user->email;
        $input["modifierid"] = $user->id;
        

        if($file){
            $b=$berita->first();


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);


            $this->uploadImg($file,$filename_original, $filename_thumbnail);

            $input["img_thumb"] = $filename_thumbnail;
            $input["img_raw"] = $filename_original;


        }


        
        $berita->where("id",$id)->update($input);
        
        if($file){

            $files = [];

            if(strlen($b->img_thumb)>0){
                $files[] =  public_path('media/beritafoto/thumbnail/'.$b->img_thumb); 
            }

            if(strlen($b->img_raw)>0){
                $files[] =  public_path('media/beritafoto/original/'.$b->img_raw);
            }


            if(count($files) > 0){
                $this->deleteImg($files);
        
            }

        }

        

        return redirect()->route('admin.transaksi.beritafoto.editfoto',$id)->with('success','Berita berhasil di update');
    }


    public function delete($id)
    {
        $b = $this->berita->where("id",$id)->first();


        // // cari list foto berita kemudian di hapus

        // $this->deleteImg(public_path('media/berita/thumbnail/'.$b->img_thumb));
        // $this->deleteImg(public_path('media/berita/original/'.$b->img_raw));

        
        $b = $this->berita->where("id",$id)->delete();

        if($b){
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

    }


    public function deleteFotoItem($id)
    {

        $b = $this->beritaFotoItem->where("id",$id)->first();

        // dd([
        //     public_path('media/beritafoto/thumbnail/'.$b->img_thumb),
        //     public_path('media/beritafoto/original/'.$b->img_raw)
        // ]);

        $files = [];

        if(strlen($b->img_thumb)>0){
            $files[] =  public_path('media/beritafoto/thumbnail/'.$b->img_thumb); 
        }

        if(strlen($b->img_raw)>0){
            $files[] =  public_path('media/beritafoto/original/'.$b->img_raw);
        }


        if($files > 0){
            $this->deleteImg($files);
    
        }


        // // // cari list foto berita kemudian di hapus

        // $this->deleteImg([public_path('media/berita/thumbnail/'.$b->img_thumb)]);
        // $this->deleteImg([public_path('media/berita/original/'.$b->img_raw)]);

        
        if($b->delete()){

            $b = $this->berita::find($b->beritafotos_id);
            $b->jml_fotos  -= 1;
            $b->save();



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

    }



    public function publishDataFotoItem($id){
        $b = $this->beritaItem->where("id",$id)->first();

        if($b){
            $b->published = "yes";
            $b = $b->save();
            if($b){
                session()->flash('message', 'Data berhasil dipublikasikan');
                echo json_encode([
                "status" => true,
                "message" => "Data berhasil dipublikasikan"
                ]);
            }else{
                echo json_encode([
                "status" => false,
                "message" => "Data gagal dipublikasikan"
                ]);
            }
        }else{
            echo json_encode([
                "status" => false,
                "message" => "Data tidak ditemukan"
                ]);
        }
        
    }

    public function publishData($id){
        $b = $this->berita->where("id",$id)->first();

        if($b){
            $b->published = "yes";
            $b = $b->save();
            if($b){
                session()->flash('message', 'Data berhasil dipublikasikan');
                echo json_encode([
                "status" => true,
                "message" => "Data berhasil dipublikasikan"
                ]);
            }else{
                echo json_encode([
                "status" => false,
                "message" => "Data gagal dipublikasikan"
                ]);
            }
        }else{
            echo json_encode([
                "status" => false,
                "message" => "Data tidak ditemukan"
                ]);
        }
        
    }

    public function saveToDraftDataFotoItem($id){
        $b = $this->beritaItem->where("id",$id)->first();

        if($b){


            $b->published = "no";
            $b = $b->save();
            if($b){
                session()->flash('message', 'Data berhasil disimpan ke draft / konsep');
                echo json_encode([
                "status" => true,
                "message" => "Data berhasil disimpan ke draft / konsep"
                ]);
            }else{
                echo json_encode([
                "status" => false,
                "message" => "Data gagal disimpan ke draft / konsep"
                ]);
            }
        }else{
            echo json_encode([
                "status" => false,
                "message" => "Data tidak ditemukan"
                ]);
        }
    }

    public function saveToDraftData($id){
        $b = $this->berita->where("id",$id)->first();

        if($b){


            $b->published = "no";
            $b = $b->save();
            if($b){
                session()->flash('message', 'Data berhasil disimpan ke draft / konsep');
                echo json_encode([
                "status" => true,
                "message" => "Data berhasil disimpan ke draft / konsep"
                ]);
            }else{
                echo json_encode([
                "status" => false,
                "message" => "Data gagal disimpan ke draft / konsep"
                ]);
            }
        }else{
            echo json_encode([
                "status" => false,
                "message" => "Data tidak ditemukan"
                ]);
        }
    }


    public function makePrimaryFotoItem($id){
        $b = $this->beritaFotoItem->makePrimaryFotoItem($id);

        if($b){

            if($b){
                session()->flash('message', 'Data berhasil dijadikan utama');
                echo json_encode([
                "status" => true,
                "message" => "Data berhasil dijadikan utama"
                ]);
            }else{
                echo json_encode([
                "status" => false,
                "message" => "Data gagal dijadikan yang utama"
                ]);
            }
        }else{
            echo json_encode([
                "status" => false,
                "message" => "Data tidak ditemukan"
                ]);
        }
    }



}
