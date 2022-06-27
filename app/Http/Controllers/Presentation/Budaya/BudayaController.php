<?php

namespace App\Http\Controllers\Presentation\Budaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public $nmPart = "presentation.module.budaya.";
    
    public function index(){

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
        $data['urlImageBfest']= [
            url('/uploads/bfest/ijen-bwidev.jpg'),
            url('/uploads/bfest/gandrung-sewu-bwidev.jpeg'),
            url('/uploads/bfest/bec-bwidev.jpg'),
            url('/uploads/bfest/gedung_pemkab_bwidev.jpg'),
        ];

        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        $data['pageTitle'] = "Budaya Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $data['keywords'] = "budaya banyuwangi, seni banyuwangi, musik, tarian, cerita";

        //opsi ini diisi dengan judul halaman yang sesuai 
        $data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $uriModul  = "/budaya";
        $data['modulItems'] = [
            [
                "name" => "Sejarah",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($uriModul.'/sejarah'),
                "desc" => "Asal usul sejarah",
                "data" => [
                    "6 Muesum",
                    "7 Perang revolusi"
                ]
            ],

            [
                "name" => "Bahasa",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($uriModul.'/bahasa'),
                "desc" => "Perkembangan bahasa",
                "data" => [
                    "2.500 lebih penari",
                    "150 lebih sanggar tari"
                ]
            ],


            [
                "name" => "Cerita",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($uriModul.'/cerita'),
                "desc" => "Mengulik cerita rakyat",
                "data" => [
                    "2.500 lebih penari",
                    "150 lebih sanggar tari"
                ]
            ],


            [
                "name" => "Tarian",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($uriModul.'/tarian'),
                "desc" => "Perkembangan seni tari",
                "data" => [
                    "2.500 lebih penari",
                    "150 lebih sanggar tari"
                ]
            ],

            [
                "name" => "Musik",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($uriModul.'/musik'),
                "desc" => "Perkembangan seni musik",
                "data" => [
                    "2.500 lebih musisi",
                    "150 lebih grup musik"
                ]
            ],

            [
                "name" => "Adat",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($uriModul.'/adat'),
                "desc" => "Kelestarian Adat tradisi",
                "data" => [
                    "500 lebih adat etnik",
                    "1.000 lebih acara tradisi"
                ]
            ],

            [
                "name" => "Inovasi",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($uriModul.'/inovasi'),
                "desc" => "Perkerbangan Invoasi Budaya",
                "data" => [
                    "Pembuatan kamus osing",
                    "penerbitan katalog budaya"
                ]
            ],

            
        ];

        return view($this->nmPart."budayaIndex",$data);
    }
}

