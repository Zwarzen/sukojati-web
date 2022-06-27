<?php

namespace App\Http\Controllers\Presentation\Perencanaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perencanaan;


class PerencanaanController extends Controller
{
    public $nmPart = "presentation.module.perencanaan.";

    public $data  = [];
    public $uriModul  = "/home/portal";


    public  function __construct(Request $request){
    
        $this->data['urlWallpaper']= [
            url('/uploads/wallpaper/gb-gesibu.jpg'),
            url('/uploads/wallpaper/gb-gesibu2.jpg'),
        ];

      
        $this->data['pageTitle'] = "Prestasi Daerah Banyuwangi";

        $this->data['keywords'] = "Portal banyuwangi";

        $this->data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->uriModul  = "/home/portal";
        $this->data['modulItems'] = [
            [
                "name" => "Tempat bersejarah",
                "imgSrc" => asset('presentation/b-asset/img/icon-budaya.png'),
                "linkTo" => url($this->uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",
               
            ],

            [
                "name" => "Tempat bersejarah",
                "imgSrc" => asset('presentation/b-asset/img/icon-budaya.png'),
                "linkTo" => url($this->uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",
               
            ],

            [
                "name" => "Tempat bersejarah",
                "imgSrc" => asset('presentation/b-asset/img/icon-budaya.png'),
                "linkTo" => url($this->uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",
               
            ],
            
        ];
        
    }
    
    public function index(){return "index";}

    public function perencanaan(){
        $this->data['pageTitle'] = "Perencanaan Pembangunan Kabupaten Banyuwangi";
        $data = $this->data;
        // print_r($data['perencanaan']); die;
        $data['perencanaan'] = perencanaan::orderBy('id', 'DESC')->paginate(15); 

        return view($this->nmPart."perencanaanIndex",$data);
    }

    public function cari(Request $request)
	{
        $data = $this->data;
        $cari = $request->cari;
        $data['prestasi1'] = prestasi::where('jenis', 'like', "%" . $cari . "%")->paginate(15);
        
        $data['prestasi'] = prestasi::where(function ($query) use ($request) {
            $query->where('jenis', "like", "%" . $request->cari . "%");
            $query->orWhere('bidang', "like", "%" . $request->cari . "%");
        })->paginate(15);

        return view($this->nmPart."perencanaanIndex",$data);
 
	}

    public function detail($slug){
        return $slug;
    }

    public function saran(){
        return "<h1>Halaman Saran dan Masukan</h1><hr><h2>Silakan kirim saran dan masukan yang membangun</h2>";
    }


    public function pejabat(){
        return "<h1>Halaman para pejabat terkini dan masa lalu</h1><hr><h2>Profil pejabat terkini dan masa lalu</h2>";
    }
}
