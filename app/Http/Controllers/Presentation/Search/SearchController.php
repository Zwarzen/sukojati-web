<?php

namespace App\Http\Controllers\Presentation\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Admin\Berita;
use App\Models\Admin\Opd;
use App\Models\Admin\Indexs;
use App\Models\Admin\KanalBerita;
use App\Models\Admin\Requests;
use DB;
use Auth;



class SearchController extends Controller
{
    public $nmPart = "presentation.module.search.";

    public $data  = [];
    public $uriModul  = "/home/portal";

    public $gzClient;
    public $opd;


    public  function __construct(Request $request, Opd $opd){
        $this->opd = $opd;

        $this->gzClient = new Client(["verify"=>false]);
        // opsi ini untuk menampilkan super news yang khusus dan penting
        // bisa dari database atau diisi manual


        // $data["headlineNews"] = [
        //     "titleHeadlineNews"=>"Corona Di Banyuwangi Menurun ",
        //     "contentHeadlineNews" =>"super headline, contoh: pencegahan Corona virus telah dilakukan Pemkab banyuwangi",
        //     "urlHeadlineNews"=>"http://banyuwangiweb.test/berita/detail/slug",
        // ];

        //data ini berisi tentang fersitval yang sedang berlangsung
        //diisi dengan url poster yang menarik untuk ditampilkan
        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        $this->data['urlWallpaper']= [
            url('/uploads/wallpaper/gb-gesibu.jpg'),
            url('/uploads/wallpaper/gb-gesibu2.jpg'),
        ];

        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        $this->data['pageTitle'] = "Pecarian informasi berita atau lainnya di Portal Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Portal banyuwangi";

        //opsi ini diisi dengan judul halaman yang sesuai
        $this->data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $this->uriModul  = "/home/portal";

        $this->data['base_link_media_thumbnail'] = asset('media/berita/thumbnail/')."/";




    }


    public function index(Berita $berita, Request $request, Requests $iRequests){
        $data = $this->data;


        $wanted = file_get_contents("php://input");

        $opd = $this->getOpdAvailabe();

        $key = array_key_exists("q",$request->all()) ? $request->all()["q"] : null;

        if(strlen($key)>0){
            $iRequests->keyword = $key;
            $iRequests->ip = $request->ip();
            $iRequests->created_at =date('Y-m-d h:i:s');
            $iRequests->updated_at = date('Y-m-d h:i:s');

            $iRequests->save();
        }


        $str =  trim(str_replace(["'",'"'],'', str_replace("'",'',filter_var ( $key, FILTER_SANITIZE_STRING))));
        $data["key"] = $key;

        $exploded_key = explode(" ",$key);



        $where = [];
        if(count($exploded_key)>0){
            $not_blank_key = [];
            $b = $berita->where('published','=','yes');

            foreach ($exploded_key as $key => $value) {

                if($value != ""){
                    array_push($not_blank_key,$value);
                    $b->where(DB::raw('LOWER(title)'),'like',"%".trim(strtolower($value))."%");

                    // $b->where('title','like',"%".$value."%");

                }

            }

            $data['keys'] =  $not_blank_key;

            $data['data'] = $b->where("unor",$opd->kd_unor)->orderBy("hit","desc")->paginate(5)->appends(request()->except('page'));



        }else{

            $where = [["unor","=",$opd->kd_unor],["title","like","%".$str."%"], ];
            $data['data'] = $berita->where($where)->paginate(5)->appends(request()->except('page'));
        }




        return view($this->nmPart."searchIndex",$data);
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


    public function indexBackup(Berita $berita, Request $request, Requests $iRequests){
        $data = $this->data;

        $wanted = file_get_contents("php://input");



        $key = array_key_exists("q",$request->all()) ? $request->all()["q"] : null;

        if(strlen($key)>0){
            $iRequests->keyword = $key;
            $iRequests->ip = $request->ip();
            $iRequests->created_at =date('Y-m-d h:i:s');
            $iRequests->updated_at = date('Y-m-d h:i:s');

            $iRequests->save();
        }


        $str =  trim(str_replace(["'",'"'],'', str_replace("'",'',filter_var ( $key, FILTER_SANITIZE_STRING))));
        $data["key"] = $key;

        $exploded_key = explode(" ",$key);



        $where = [];
        if(count($exploded_key)>0){
            $not_blank_key = [];
            $b = $berita->where('published','=','yes');

            foreach ($exploded_key as $key => $value) {

                if($value != ""){
                    array_push($not_blank_key,$value);
                    $b->where('title','like',"%".$value."%");

                }

            }

            $data['keys'] =  $not_blank_key;

            $data['data'] = $b->orderBy("hit","desc")->paginate(5)->appends(request()->except('page'));



        }else{

            $where = ["title","like","%".$str."%"];
            $data['data'] = $berita->where($where)->paginate(5)->appends(request()->except('page'));
        }




        return view($this->nmPart."searchIndex",$data);
    }
}
