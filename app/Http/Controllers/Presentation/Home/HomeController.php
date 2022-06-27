<?php

namespace App\Http\Controllers\Presentation\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $nmPart = "presentation.module.home.";
    public function index(){
        $data=[];

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
        $data['pageTitle'] = "Website resmi Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $data['keywords'] = "website banyuwangi, banyuwangi";

        //opsi ini diisi dengan judul halaman yang sesuai 
        $data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";



        return view($this->nmPart."homeIndex",$data);
    }

}
