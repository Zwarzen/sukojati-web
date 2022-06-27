<?php

namespace App\Http\Controllers\Admin\Transparansi;

use Auth;
use File; 
use DataTables;
use Illuminate\Support\Str;
use App\Models\Admin\Berita;
use App\Models\Admin\Indexs;


use Illuminate\Http\Request;
use App\Models\Admin\KanalBerita;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class PertanggungJawabanController extends Controller
{
    public $nmPart = "admin.module.berita.";
    public $data  = [];
    public $uriModul  = "/berita";
    public $kanal;
    public $berita;
    public $request;
    public $indexs;
    public $path_tumbnail_media = 'media/berita/thumbnail/';
    public $path_original_media = 'media/berita/original/';


    public function __construct(Request $request, Berita $berita, KanalBerita $kanalBerita, Indexs $indexs)
    {
        $this->berita = $berita;
        $this->kanal = $kanalBerita;
        $this->request= $request;
        $this->indexs= $indexs;
        $this->data['base_link_media_thumbnail'] = asset($this->path_tumbnail_media )."/";
    }
  
    public function index(){
        $data = $this->data;
        $req = $this->request;
        $where = [];



        $b = $this->berita->orderBy("created_at","desc");


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


    public function show(){
    $data = $this->berita::all();
        // print_r($data); die();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', 'admin.module.berita.action')
    ->rawColumns(['action'])
    ->make(true);
    }

    public function create(){
        $data['menu'] = 'berita';
        $data['mode'] = 'new';
        $data["kanal"] = $this->kanal::all();


        return view($this->nmPart."createBerita",$data);
    }


    public static function quickRandom($length = 16)
    {
        $pool = '_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }


    
    public function uploadVideo($file, $originalName, $thumbName){
    
        $path_video = public_path('media/berita/video/'); 
    
        $file->move($path_video, $originalName);
    
    }
    
    public function uploadImg($file, $originalName, $thumbName){
    
        $path_ori = public_path('media/berita/original/');             
        $path_thumb = public_path('media/berita/thumbnail/');  
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


    public function store(Request $request){
        $berita = $this->berita;
        $user = Auth::user();


        $this->validate($request, [
            'file' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'content' => 'required',
        ]);

                    
        $file = $request->file('file');
        $video_file = $request->file('video');

        // dd($video_file);
        $post = (object) $request->all();


        // [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
        // [$width, $height] =getimagesize($file);


        // $this->uploadImg($file,$filename_original, $filename_thumbnail);


        if($video_file){
            [$filename_thumbnail, $filename_original] = $this->getNamedFile($video_file);
            $this->uploadVideo($video_file,$filename_original, $filename_thumbnail);

            $berita->url_video = $filename_original;

        }else{
            $berita->url_video = "";
        }

        if(isset($post->id_youtube)){
            $berita->id_youtube =  $post->id_youtube;
        }


        if($file){


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
            [$width, $height] = getimagesize($file);


            $this->uploadImg($file,$filename_original, $filename_thumbnail);

            $berita->img_thumb = $filename_thumbnail;
            $berita->img_raw = $filename_original;
            $berita->img_desc = $post->img_desc?$request->img_desc:'';

        }else{
            $berita->img_thumb = "";
            $berita->img_raw = "";
            $berita->img_desc = $post->img_desc?$request->img_desc:'';
        }


        $berita->title = $post->title;
        $berita->slug = $post->slug;
        $berita->desc = $post->desc;
        $berita->content = $post->content;
        $berita->is_berita_video = $post->is_berita_video == "yes" ? "yes":"no";
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



        /// sync dengan tabel indexs untuk bahan pencarian 
        $img_url = strlen($berita->img_thumb)>0?$this->path_tumbnail_media.$berita->img_thumb : 'presentation/b-asset/img/lambang-daerah.png';
        $indexData = [
        "title" =>$post->title,
        "desc" => $post->desc,
        'item_url' => "/berita/".$post->slug,
        'base_url' => url('/'),
        'img_url' =>  $img_url,
        'hit' => 0,
        'keyword' => $post->keyword,
        'published' => $post->published == "yes" ? "yes":"no",
        'categori_id' => '1',
        'categori_name' => 'Berita',
        'creatorid' => $user->id,
        'createdby' => $user->email,
        'modifiedby' => $user->email,
        'modifierid' => $user->id,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
        ];



        $this->indexs::create($indexData);


        

        return redirect()->route('admin.transaksi.berita.index')->with('success','Data berhasil di input');
    }

    
    public function deleteImg($image_path){
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }


    public function update(Request $request, Berita $berita)
    {

        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
        ]);


        $input= $request->all();
        $id = $input["id"];
        $file = $request->file('file');
        $video_file = $request->file('video');
        $berita->where("id",$id);

        unset($input["id"]);
        unset($input["file"]);
        unset($input["_token"]);
        unset($input["video"]);
        // dd($input);

        $user = Auth::user();
        $input["modifiedby"] = $user->email;
        $input["modifierid"] = $user->id;
        
        
        if($video_file){

            // dd($video_file);

            [$filename_thumbnail, $filename_original] = $this->getNamedFile($video_file);
            $this->uploadVideo($video_file,$filename_original, $filename_thumbnail);
            $input['url_video'] = $filename_original;
            $berita->url_video = $filename_original;

        }else{
            $input['url_video'] = "";
            $berita->url_video = "";
        }


        if($file){
            $g=$berita->first();
            $path_ori = public_path('media/berita/original/');             
            $path_thumb = public_path('media/berita/thumbnail/'); 


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
            [$width, $height] = getimagesize($file);


            $this->uploadImg($file,$filename_original, $filename_thumbnail);

            $input["img_thumb"] = $filename_thumbnail;
            $input["img_raw"] = $filename_original;

            
            
            $this->deleteImg(public_path('media/berita/thumbnail/'.$g->img_thumb));
            $this->deleteImg(public_path('media/berita/original/'.$g->img_raw));
            


        }

        $input["updated_at"] = date('Y-m-d H:i:s');
        $berita->where("id",$id)->update($input);
        
        return redirect()->route('admin.transaksi.berita.edit',$id)->with('success','Berita berhasil di update');
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


    public function edit($id)
    {
        $data = $this->data;

        $berita_item = $this->berita::find($id);
        $data["kanal"] = $this->kanal::all();
        $data['menu'] = 'berita';
        $data['mode'] = 'edit';
        $data['berita'] = $berita_item;


        return view($this->nmPart."createBerita",$data);
    }

    public function getlist(){
        $data = $this->berita::all();
        // print_r($data); die();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', 'admin.module.berita.action')
        ->rawColumns(['action'])
        ->make(true);
    } 


    public function delete(Berita $berita, $id)
    {
        $b = $berita->where("id",$id)->first();

        $this->deleteImg(public_path('media/berita/thumbnail/'.$b->img_thumb));
        $this->deleteImg(public_path('media/berita/original/'.$b->img_raw));

        

        // return redirect()->route('admin.transaksi.berita')->with('success','Berita berhasil di update');


        // $kategorigaleri = Galeri::where('id',$id)->delete();
        $b = $berita->where("id",$id)->delete();

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
      



}
