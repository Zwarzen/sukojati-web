<?php

namespace App\Http\Controllers\Presentation\Prioritas;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrioritasPembangunanController extends Controller
{
    public $nmPart = "presentation.module.profil.";

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
        $this->data['pageTitle'] = "Portal Banyuwangi";



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

    public function index(){return ""; }

    public function showListPrioritasView($slug){


        $menu = [];

        if("wajib" == strtolower($slug) ){

        }else if("unggulan"  == strtolower($slug)){

        }else{

        }
        $listApps = [

            [
                "id" => "1",
                "title" => "Website",
                "jenis" => "web",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/web.png",
                "textDesc" => "Aplikasi Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "http://pengaduan.banyuwangikab.go.id/",
    
            ],
            [
                "id" => "1",
                "title" => "SMS",
                "jenis" => "sms",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/sms.png",
                "textDesc" => "SMS Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "sms:+6282131545555",
    
            ],
            [
                "id" => "1",
                "title" => "Whatsapp",
                "jenis" => "wa",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/wa.png",
                "textDesc" => "Whatsapp Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "https://wa.me/+6282131545555",
    
            ],
    
            [
                "id" => "1",
                "title" => "telpon",
                "jenis" => "telpon",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/pengaduan.png",
                "textDesc" => "Telepon Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "tel:112",
    
            ],
            [
                "id" => "1",
                "title" => "Facebook",
                "jenis" => "sosmed",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/facebook.png",
                "textDesc" => "Facebook Kabupaten Banyuwangi",
                "linkTo" => "https://id-id.facebook.com/KabupatenBanyuwangi",
    
            ],
    
            [
                "id" => "1",
                "title" => "Instagram",
                "jenis" => "sosmed",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/ig.png",
                "textDesc" => "Facebook Kabupaten Banyuwangi",
                "linkTo" => "https://instagram.com/banyuwangi_kab",
    
            ],
    
            [
                "id" => "1",
                "title" => "Youtube",
                "jenis" => "sosmed",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/youtube.png",
                "textDesc" => "Facebook Kabupaten Banyuwangi",
                "linkTo" => "https://www.youtube.com/channel/UCptA3CnhbD9smyVJRtCOvcQ",
    
            ],
    
            [
                "id" => "1",
                "title" => "Twitter",
                "jenis" => "sosmed",
                "imgSrc" => "https://banyuwangikab.go.id/images/layanan/twitter.png",
                "textDesc" => "Twitter Kabupaten Banyuwangi",
                "linkTo" => "https://twitter.com/banyuwangi_kab",
    
            ],
        
            ];

        return view($this->nmPart."listContactUsPart",["listApps"=>$listApps])->render();
    }
}
