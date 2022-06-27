<?php

namespace App\Http\Controllers\Presentation\Pemerintahan\Prestasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;


class PrestasiController extends Controller
{
    public $nmPart = "presentation.module.profil.";

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
    
    public function index(Request $request){return "index";}

    public function prestasi(Request $request){
        $this->data['pageTitle'] = "Prestasi Kabupaten Banyuwangi";
        $data = $this->data;
        $prestasi = prestasi::orderBy('tahun', 'DESC');
        if($request->tahun){
            $prestasi->where('tahun',$request->tahun);
        }
        if($request->bidang){
            $prestasi->where('bidang',$request->bidang);
        }
        $data['prestasi'] = $prestasi->paginate(15); 
        $data['filtertahun'] = prestasi::groupby('tahun')->get();
        $data['filterbidang'] = prestasi::groupby('bidang')->get();
        return view($this->nmPart."profilPrestasi",$data);
    }

    public function cari(Request $request)
	{
        $data = $this->data;
        $cari = $request->cari;
        $data['filtertahun'] = prestasi::groupby('tahun')->get();
        $data['filterbidang'] = prestasi::groupby('bidang')->get();
        $data['prestasi1'] = prestasi::where('jenis', 'like', "%" . $cari . "%")->paginate(15);
        
        $data['prestasi'] = prestasi::where(function ($query) use ($request) {
            $query->where('jenis', "like", "%" . $request->cari . "%");
            $query->orWhere('bidang', "like", "%" . $request->cari . "%");
            $query->orWhere('tahun', "like", "%" . $request->cari . "%");
        })->orderBy('tahun', 'DESC')->paginate(15);

        return view($this->nmPart."profilPrestasi",$data);
 
	}

    public function filter(Request $request)
	{
        $data = $this->data;
        $cari = $request->cari;
        $data['filtertahun'] = prestasi::groupby('tahun')->get();
        $data['filterbidang'] = prestasi::groupby('bidang')->get();
       
        $prestasi = prestasi::orderBy('tahun', 'DESC');
        if($request->tahun){
            $prestasi->where('tahun',$request->tahun);
        }
        if($request->bidang){
            $prestasi->where('bidang',$request->bidang);
        }
        if($request->cari){
            $prestasi->where(function ($query) use ($request) {
                $query->where('jenis', "like", "%" . $request->cari . "%");
                $query->orWhere('bidang', "like", "%" . $request->cari . "%");
                $query->orWhere('tahun', "like", "%" . $request->cari . "%");
            });
        }
        $data['prestasi'] = $prestasi->paginate(10);

        return view($this->nmPart."profilPrestasi",$data);
 
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
