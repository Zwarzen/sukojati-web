<?php

namespace App\Http\Controllers\Presentation\Pemerintahan\Eksekutif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EksekutifController extends Controller
{
    public $nmPart = "presentation.module.pemerintahan.eksekutif.";
    public $data  = [];
    public $uriModul  = "/pemerintahan/eksekutif";

    public  function __construct(){
        

        // opsi ini untuk menampilkan super news yang khusus dan penting
        // bisa dari database atau diisi manual


        $this->data["headlineNews"] = [
            "titleHeadlineNews"=>"Corona Di Banyuwangi Menurun ",
            "contentHeadlineNews" =>"super headline, contoh: pencegahan Corona virus telah dilakukan Pemkab banyuwangi",
            "urlHeadlineNews"=>"http://banyuwangiweb.test/berita/detail/slug",
        ];


        //=====
        //data ini berisi tentang fersitval yang sedang berlangsung
        //diisi dengan url poster yang menarik untuk ditampilkan
        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        $this->data['urlWallpaper']= [
            url('/uploads/wallpaper/gedung_pemkab_bwidev.jpg'),
            url('/uploads/wallpaper/kantor-pemkab.jpg'),
        ];

        //===
        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        $this->data['pageTitle'] = "Pemerintahan - Eksekutif Banyuwangi";


        //=====
        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Pemerintahan banyuwangi, eksekutif banyuwangi,";

        //===
        //opsi ini diisi dengan judul halaman yang sesuai 
        $this->data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";

    }


    public function index(){

        $this->data['modulItems'] = [
            [
                "name" => "Kepala Daerah",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/kepala-daerah'),
                "desc" => "Informasi tentang pemimpin daerah",
               
            ],

            [
                "name" => "Sekretaris Dearah",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/sekretaris-daerah'),
                "desc" => "Tugas dan fungsi skretaris daerah",
               
            ],

            [
                "name" => "Inspektorat",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/inspektorat'),
                "desc" => "Tugas dan fungsi inspektorat",
               
            ],

            [
                "name" => "Dinas",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/dinas'),
                "desc" => "Tugas dan fungsi dinas",
               
            ],

            [
                "name" => "Badan",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/badan'),
                "desc" => "Tugas dan fungsi badan",
               
            ],

            [
                "name" => "Kecamatan",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/inspektorat'),
                "desc" => "Tugas dan fungsi kecamatan",
               
            ],

            
        ];

       
        return view($this->nmPart."eksekutifIndex",$this->data);
    }

    public function dinas(){
        $this->uriModul="/dinas";
        $this->data['dinasItems'] = [
            [
                "name" => "Dinas Pendidikan",
                "shortname" => "Dinas Pendidikan",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/dinas-pendidikan'),
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pendidikan ",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Kesehatan",
                "shortname" => "Dinas Kesehatan",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/dinas-kesehatan'),
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pendidikan",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Pekerjaan Umum Cipta Karya, Perumahan dan Permukiman",
                "shortname" => "Dinas PU",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/Dinas-Pekerjaan-Umum-Cipta-Karya-Perumahan-dan-Permukiman'),
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pekerjaan umum",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Pekerjaan Umum Pengairan",
                "shortname" => "Dinas PU Pengairan ",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/Dinas-Pekerjaan-Umum-Pengairan'),
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pekerjaan umum pemgairan",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Pertanian dan Pangan",
                "shortname" => "Dinas Pertanian",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/Dinas-Pertanian-dan-Pangan'),
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pertanian dan pangan",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Kebudayaan dan Pariwisata",
                "shortname" => "Dinas Pariwisata",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($this->uriModul.'/Badan-Perencanaan-Pembangunan-Daerah'),
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],

            
        ];

        return view($this->nmPart."/dinas/dinasIndex",$this->data);
    }    
    
    
    
}