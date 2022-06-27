<?php

namespace App\Http\Controllers\Presentation\Pemerintahan\LambangDaerah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LambangDaerahController extends Controller
{
    public $nmPart = "presentation.module.pemerintahan.lambang-daerah.";

    public $data  = [];
    public $uriModul  = "/home/portal";


    public  function __construct(Request $request){
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
        $this->data['pageTitle'] = "Lambang daerah Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Lambang daerah Banyuwangi";

        //opsi ini diisi dengan judul halaman yang sesuai 
        $this->data['description'] = "Lambang daerah Banyuwangi - Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


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
    public function index(){
        $data = $this->data;
        
        return view($this->nmPart."lambangDaerahIndex",$data);
    }

    
}
