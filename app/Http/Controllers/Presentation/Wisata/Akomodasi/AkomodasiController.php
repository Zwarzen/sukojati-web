<?php

namespace App\Http\Controllers\Presentation\Wisata\Akomodasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akomodasi;

class AkomodasiController extends Controller
{
    //
    public $nmPart = "presentation.module.wisata.akomodasi.";
    public function __construct(){
       $this->model = new Akomodasi();
       $this->urlwallpaper = [
           url('/uploads/wallpaper/hotels.jpg')
       ];
    }
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
        $data['urlWallpaper']= $this->urlwallpaper;
        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        $data['pageTitle'] = "Hotel & Villa Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $data['keywords'] = "Hotel banyuwangi, villa banyuwangi, penginapan banyuwangi, hotel,villa";

        //opsi ini diisi dengan judul halaman yang sesuai
        $data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $uriModul  = "/wisata/akomodasi";
        $data['modulItems'] = [
            [
                "name" => "Hotel",
                "icon" => asset('presentation/b-asset/img/icon-wisata.png'),
                "link" => url($uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",

            ],

            [
                "name" => "Villa",
                "icon" => asset('presentation/b-asset/img/icon-wisata.png'),
                "link" => url($uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",

            ],

            [
                "name" => "Guest House",
                "icon" => asset('presentation/b-asset/img/icon-wisata.png'),
                "link" => url($uriModul.'/tempat-bersejarah'),
                "desc" => "Tempat-tempat sejarah",

            ],


        ];

        $data['list'] = Akomodasi::all();


        return view($this->nmPart."akomodasiIndex",$data);
    }

    public function villa($id){
      echo 'welcome';
    }
}
