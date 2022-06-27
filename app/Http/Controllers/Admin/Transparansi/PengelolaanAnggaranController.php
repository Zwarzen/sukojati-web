<?php

namespace App\Http\Controllers\Admin\Transparansi;

use DB;
use Auth;
use File; 
use DataTables;
use App\Models\Admin\Unor;
use Illuminate\Support\Str;

use App\Models\Admin\Berita;
use App\Models\Admin\OpdUser;
use App\Models\Admin\Indexs;


use Illuminate\Http\Request;
use App\Models\Admin\KanalBerita;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Admin\Transparansi\PengelolaanAnggaran;
use App\Models\Admin\Transparansi\PengelolaanKategori;

class PengelolaanAnggaranController extends Controller
{
    public $nmPart = "admin.module.transparansi.";
    public $data  = [];
    public $uriModul  = "/anggaran";
    public $kelolaAnggaran;
    public $unor;
    public $request;
    public $kelolaKategori;
    public $indexs;
    public $path_media = 'media/anggaran/pdf/';


    public function __construct(Request $request, PengelolaanAnggaran $kelolaAnggaran, OpdUser $opduser, PengelolaanKategori $kelolaKategori, Unor $unor, Indexs $indexs)
    {
        $this->unor = $unor;
        $this->opduser = $opduser;

        $this->kelolaAnggaran = $kelolaAnggaran;
        $this->kelolaKategori = $kelolaKategori;
        $this->request= $request;
        $this->indexs= $indexs;
        $this->data['link_path_media_pdf'] = asset($this->path_media )."/";
    }
  
    public function index(){
        $data['menu'] = 'anggaranIndex';
        $data['link_path_media_pdf'] = $this->path_media;
        
        return view($this->nmPart."pengelolaan.anggaranIndex",$data);
    }


    public function dataKelola(){

       
        
        $data = $this->data;
        $req = $this->request;
        $where = [];
        $user = Auth::user();

        $unors = $this->opduser->where("user_id","=",$user->id);

        if($unors->count()>0){
            $unor = $unors->get()[0]->opd_unor;
            // dd($unor);
        }else{
            return redirect()->route('admin.transaksi.berita.index')->with('warning','Unor / Organisasi tidak ditemukan, Anda Tidak Terdaftar Pada salah satu OPD / SKPD.');
        }

        $b = $this->kelolaAnggaran->where('unor', '=', $unor)->orderBy("created","desc");


        if(isset($req->kategori)){
            if($req->kategori != "all"){
                $b->where("id_kategori","=",$req->kategori);
            }

            $data["kategori"] = $req->kategori;
            
        }

        if(isset($req->tahun)){

            if($req->tahun != "all"){
                $b->where("tahun","=",$req->tahun);
            }

            $data["tahun"] = $req->tahun;
        }
        

        if(isset($req->keyword) && $req->keyword != ""){
            $exploded_key = explode(" ",$req->keyword);
            $not_blank_key = [];

            $data["keyword"] = $req->keyword;
            $data["keywords"] = $exploded_key;


            foreach ($exploded_key as $key => $value) {

                if($value != ""){
                    array_push($not_blank_key,$value);
                    $b->where(DB::raw('LOWER(judul_dokumen)'),'like',"%".trim(strtolower($value))."%");
                }
            }
        }


        $data['anggaran'] = $b->paginate(5);
        $data['sql'] = $b->toSql();


        if(isset($req->page)){
            $data["page"] = $req->page;
        }

        $data['menu'] = 'kelolaAnggaranIndex';
        $data['request'] = $req;
        $data['kategoris'] = $this->kelolaKategori->orderBy("kategori")->get();
        $data['tahuns'] = $this->kelolaAnggaran->select("tahun")->groupBy("tahun")->orderBy("tahun","ASC")->get();
        

      return view($this->nmPart."pengelolaan.kelolaAnggaranIndex",$data);
    }


    public function show(){
        $data = $this->kelolaAnggaran::all();
            // print_r($data); die();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', 'admin.module.kelolaAnggaran.action')
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create(){
        $data['menu'] = 'kelolaAnggaran';
        $data['mode'] = 'new';


        $data['unors'] = $this->unor->all();
        $data['kategoris'] = $this->kelolaKategori->orderBy("kategori")->get();
        return view($this->nmPart."pengelolaan/createKelolaAnggaran",$data);
    }


    public static function quickRandom($length = 16)
    {
        $pool = '_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }


    
    public function uploadVideo($file, $originalName, $thumbName){
    
        $path_video = public_path('media/kelolaAnggaran/video/'); 
    
        $file->move($path_video, $originalName);
    
    }
    
    public function uploadDokumen($file, $originalName){
    
        $path_media = public_path($this->path_media);    

        $file->move($path_media, $originalName);

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
        $kelolaAnggaran = $this->kelolaAnggaran;
        $user = Auth::user();


        $this->validate($request, [
            'file' => 'required',
            'judul_dokumen' => 'required',
        ]);

                    
        $file = $request->file('file');

        $post = (object) $request->all();



        if($file){


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);
            [$width, $height] = getimagesize($file);


            $this->uploadDokumen($file,$filename_original, $filename_thumbnail);

            $kelolaAnggaran->nama_file = $filename_original;

        }else{
            $kelolaAnggaran->nama_file = "";
        }
        $user = Auth::user();

        $unors = $this->opduser->where("user_id","=",$user->id);

        if($unors->count()>0){
            $unor = $unors->get()[0]->opd_unor;
            // dd($unor);
        }else{
            return redirect()->route('admin.transaksi.berita.index')->with('warning','Unor / Organisasi tidak ditemukan, Anda Tidak Terdaftar Pada salah satu OPD / SKPD.');
        }

        $kelolaAnggaran->id_dokumen =  $this->kelolaAnggaran->getKodeMaxTableEight("id_dokumen");
        $kelolaAnggaran->judul_dokumen = $post->judul_dokumen;
        $kelolaAnggaran->id_kategori = $post->id_kategori;
        $kelolaAnggaran->slug = $post->slug;
        $kelolaAnggaran->tahun =  $post->tahun;
        $kelolaAnggaran->bulan =  isset($post->bulan) ? $post->bulan : 0 ;
        $kelolaAnggaran->tanggal =  isset($post->tanggal) ? $post->tanggal: 0 ; ;
        $kelolaAnggaran->id_dinas =  $post->id_dinas;
        $kelolaAnggaran->unor =  $unor;
        $kelolaAnggaran->introtext =  isset($post->introtext) ? $post->introtext : "" ;
        $kelolaAnggaran->created_by = $user->email;
        $kelolaAnggaran->modified_by = $user->email;
        $kelolaAnggaran->created = date('Y-m-d H:i:s');


        $kelolaAnggaran->save();



        /// sync dengan tabel indexs untuk bahan pencarian 
        // $img_url = 'presentation/b-asset/img/icon_pdf.png';
        // $indexData = [
        // "title" =>$post->judul_dokumen,
        // "desc" => $post->introtext,
        // 'item_url' => "/transparansi/detail/".$post->slug,
        // 'base_url' => url('/'),
        // 'img_url' =>  $img_url,
        // 'hit' => 0,
        // 'keyword' => isset($post->keyword) ? $post->keyword : $post->judul_dokumen,
        // 'published' => isset($post->published) ?  $post->published == "yes" ? "yes":"no" : "yes",
        // 'categori_id' => '2',
        // 'categori_name' => 'Artikel',
        // 'creatorid' => $user->id,
        // 'createdby' => $user->email,
        // 'modifiedby' => $user->email,
        // 'modifierid' => $user->id,
        // 'created' => date('Y-m-d H:i:s'),
        // 'updated_at' => date('Y-m-d H:i:s')
        // ];



        // $this->indexs::create($indexData);


        

        return redirect()->route('admin.transparansi.pengelolaan.index')->with('success','Data berhasil di input');
    }

    
    public function deleteDokumen($image_path){
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }


    public function update(Request $request)
    {
 
        $this->validate($request, [
            'judul_dokumen' => 'required',
        ]);

        $input= $request->all();
        $id = $input["id"];
        $file = $request->file('file');
        $anggaran = $this->kelolaAnggaran::find($id);

        unset($input["id"]);
        unset($input["file"]);
        unset($input["_token"]);
        // dd($input);

        $user = Auth::user();
        $input["modified_by"] = $user->email;
        $input["modified"] =date("Y-m-d H:i:s");
        
        

        if($file){


            [$filename_thumbnail, $filename_original] = $this->getNamedFile($file);


            $this->uploadDokumen($file,$filename_original, $filename_thumbnail);

            $input["nama_file"] = $filename_original;


            // dd(public_path($this->path_media.$anggaran->nama_file));

            $this->deleteDokumen(public_path($this->path_media.$anggaran->nama_file));
            


        }

        // $input["updated_at"] = date('Y-m-d H:i:s');
        $anggaran->where("id",$id)->update($input);

        // /// sync dengan tabel indexs untuk bahan pencarian 
        // $img_url = 'presentation/b-asset/img/icon_pdf.png';
        // $indexData = [
        // "title" =>$post->judul_dokumen,
        // "desc" => $post->introtext,
        // 'item_url' => "/transparansi/detail/".$post->slug,
        // 'base_url' => url('/'),
        // 'img_url' =>  $img_url,
        // 'hit' => 0,
        // 'keyword' => isset($post->keyword) ? $post->keyword : $post->judul_dokumen,
        // 'published' => isset($post->published) ?  $post->published == "yes" ? "yes":"no" : "yes",
        // 'categori_id' => '2',
        // 'categori_name' => 'Artikel',
        // 'creatorid' => $user->id,
        // 'createdby' => $user->email,
        // 'modifiedby' => $user->email,
        // 'modifierid' => $user->id,
        // 'updated_at' => date('Y-m-d H:i:s')
        // ];



        // $this->indexs::create($indexData);




        
        return redirect()->route('admin.transparansi.pengelolaan.edit',$id)->with('success','Berita berhasil di update');
    }


    public function publishData($id){
        $b = $this->kelolaAnggaran->where("id",$id)->first();

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
        $b = $this->kelolaAnggaran->where("id",$id)->first();

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

        $anggaran = $this->kelolaAnggaran::find($id);
        $data['menu'] = 'kelolaAnggaran';
        $data['mode'] = 'edit';
        $data['anggaran'] = $anggaran;

        $data['unors'] = $this->unor->all();
        $data['kategoris'] = $this->kelolaKategori->orderBy("kategori")->get();
        return view($this->nmPart."pengelolaan/createKelolaAnggaran",$data);



    }

    public function getlist(){
        $data = $this->kelolaAnggaran::all();
        // print_r($data); die();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', 'admin.module.kelolaAnggaran.action')
        ->rawColumns(['action'])
        ->make(true);
    } 


    public function delete( $id)
    {
        $b = $this->kelolaAnggaran->find($id);
        $this->deleteDokumen(public_path($this->path_media.$b->nama_file));

        $b = $b->where("id",$id)->delete();

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




    /*** pengelolaan kategori */

    public function kategori(){
        $req = $this->request;
        $data['menu'] = 'anggaranIndex';
        $data['link_path_media_pdf'] = $this->path_media;
        $b = $this->kelolaKategori->orderBy("created_at","desc");
        

        if(isset($req->keyword) && $req->keyword != ""){
            $exploded_key = explode(" ",$req->keyword);
            $not_blank_key = [];

            $data["keyword"] = $req->keyword;
            $data["keywords"] = $exploded_key;


            foreach ($exploded_key as $key => $value) {

                if($value != ""){
                    array_push($not_blank_key,$value);
                    $b->where(DB::raw('LOWER(kategori)'),'like',"%".trim(strtolower($value))."%");
                }
            }
        }


        $data['kategoris'] = $b->paginate(5);
        $data['sql'] = $b->toSql();

        
        return view($this->nmPart."pengelolaan.kategori.kelolaKategoriAnggaranIndex",$data);
        
    }


    public function kategoriEdit($id)
    {
        $data = $this->data;

        $kategori = $this->kelolaKategori::find($id);
        $data['menu'] = 'kelolaKategoriAnggaran';
        $data['mode'] = 'edit';
        $data['kategori'] = $kategori;

        return view($this->nmPart."pengelolaan.kategori.createKategoriAnggaran",$data);
    }

      
    public function Kategoriupdate(Request $request)
    {
 
        $this->validate($request, [
            'kategori' => 'required',
        ]);

        $input= $request->all();
        $id = $input["id"];
        $file = $request->file('file');
        $kategori = $this->kelolaKategori::find($id);

        unset($input["id"]);
        unset($input["_token"]);
        // dd($input);

        $user = Auth::user();
        $input["updated_by"] = $user->email;
        $input["updated_at"] =date("Y-m-d H:i:s");
        

        // $input["updated_at"] = date('Y-m-d H:i:s');
        $kategori->where("id",$id)->update($input);

        // /// sync dengan tabel indexs untuk bahan pencarian 
        // $img_url = 'presentation/b-asset/img/icon_pdf.png';
        // $indexData = [
        // "title" =>$post->judul_dokumen,
        // "desc" => $post->introtext,
        // 'item_url' => "/transparansi/detail/".$post->slug,
        // 'base_url' => url('/'),
        // 'img_url' =>  $img_url,
        // 'hit' => 0,
        // 'keyword' => isset($post->keyword) ? $post->keyword : $post->judul_dokumen,
        // 'published' => isset($post->published) ?  $post->published == "yes" ? "yes":"no" : "yes",
        // 'categori_id' => '2',
        // 'categori_name' => 'Artikel',
        // 'creatorid' => $user->id,
        // 'createdby' => $user->email,
        // 'modifiedby' => $user->email,
        // 'modifierid' => $user->id,
        // 'updated_at' => date('Y-m-d H:i:s')
        // ];



        // $this->indexs::create($indexData);




        
        return redirect()->route('admin.transparansi.pengelolaan.kategoriEdit',$id)->with('success','Berita berhasil di update');
    }




    
    public function kategoriCreate(){
        $data['menu'] = 'kelolaKategori';
        $data['mode'] = 'new';
        return view($this->nmPart."pengelolaan.kategori.createKategoriAnggaran",$data);
    }


    public function kategoriStore(Request $request){
        $kelolaKategori = $this->kelolaKategori;
        $user = Auth::user();


        $this->validate($request, [
            'kategori' => 'required'
        ]);
        $post = (object) $request->all();

        $kelolaKategori->id_kategori =  $this->kelolaKategori->getKodeMaxTableFour("id_kategori");
        $kelolaKategori->kategori = $post->kategori;
        $kelolaKategori->created_by = $user->email;
        $kelolaKategori->created_at = date('Y-m-d H:i:s');
        $kelolaKategori->updated_at = date('Y-m-d H:i:s');


        $kelolaKategori->save();

        return redirect()->route('admin.transparansi.pengelolaan.kategori')->with('success','Data berhasil di input');
    }

    
    public function kategoriDelete( $id)
    {
        $b = $this->kelolaKategori->find($id);

        $b = $b->where("id",$id)->delete();

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
