<?php

namespace App\Http\Controllers\Presentation\Budaya\Sejarah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public $nmPart = "presentation.module.budaya.sejarah.";
    public $data  = [];
    public $uriModul  = "/budaya/sejarah";


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
        $this->data['pageTitle'] = "Sejarah Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Sejarah banyuwangi, seni banyuwangi, musik, tarian, cerita";

        //opsi ini diisi dengan judul halaman yang sesuai 
        $this->data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->uriModul  = "/budaya/sejarah";
        $this->data['modulItems'] = [
            [
                "name" => "Tempat bersejarah",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($this->uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",
               
            ],

            [
                "name" => "Tempat bersejarah",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($this->uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",
               
            ],

            [
                "name" => "Tempat bersejarah",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($this->uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",
               
            ],

            
        ];

       
        
    }

    public function index(){
        $data = $this->data;

        return view($this->nmPart."sejarahIndex",$data);
    }
}
