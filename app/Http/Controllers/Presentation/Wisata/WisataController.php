<?php

namespace App\Http\Controllers\Presentation\Wisata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    //
    public $nmPart = "presentation.module.wisata.";
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
        $data['pageTitle'] = "Wisata Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $data['keywords'] = "Wisata banyuwangi, destinasi, kuliner, event";

        //opsi ini diisi dengan judul halaman yang sesuai
        $data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $uriModul  = "/wisata";
        $data['modulItems'] = [
            [
                "name" => "Hotel & Villa",
                "icon" => asset('presentation/b-asset/img/icon-wisata.png'),
                "link" => url($uriModul.'/akomodasi'),
                "desc" => "Temukan Hotel dan Villa terbaik",
                "data" => [
                    "6 Hotel",
                    "7 Villa"
                ]
            ],

            [
                "name" => "Event",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/event'),
                "desc" => "Pemerintahan Kabupaten Banyuwangi",
                // "data" => [
                //     "6 Muesum",
                //     "7 Perang revolusi"
                // ]
            ],

            [
                "name" => "Informasi",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/informasi'),
                "desc" => "Pembuatan dan pengatur peraturan daerah",
                // "data" => [
                //     "2.500 lebih penari",
                //     "150 lebih sanggar tari"
                // ]
            ],


            [
                "name" => "Akomodasi",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/akomodasi'),
                "desc" => "Pemroses hukum yang berlaku",
                // "data" => [
                //     "2.500 lebih penari",
                //     "150 lebih sanggar tari"
                // ]
            ],


            [
                "name" => "Kuliner",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/kuliner'),
                "desc" => "Arti lambang daerah",
                // "data" => [
                //     "2.500 lebih penari",
                //     "150 lebih sanggar tari"
                // ]
            ],

            [
                "name" => "Transportasi",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/transportasi'),
                "desc" => "Pandangan ke depan pembangunan",
                // "data" => [
                //     "2.500 lebih musisi",
                //     "150 lebih grup musik"
                // ]
            ],
                      
        ];

        return view($this->nmPart."wisataIndex",$data);
    }
}
