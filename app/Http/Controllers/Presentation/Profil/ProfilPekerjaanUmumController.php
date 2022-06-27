<?php

namespace App\Http\Controllers\Presentation\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;






class ProfilPekerjaanUmumController extends Controller
{
    public $nmPart = "presentation.module.profil.";
    public $data  = [];
    public function _construct(){
        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        $this->data['pageTitle'] = "Program Kota Tanpa Kumuh";



        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Program Kota Tanpa Kumuh, kotaku, kotakut banyuwangi, tanpa kumuh";

        //opsi ini diisi dengan judul halaman yang sesuai 
        $this->data['description'] = "Program Kota Tanpa Kumuh (Kotaku) adalah satu dari sejumlah upaya strategis Direktorat
        Jenderal Cipta Karya Kementerian Pekerjaan Umum dan Perumahan Rakyat";

    }

    public function index(){
        return view($this->nmPart . "pekerjaanUmumPusatIndex",$this->data);
    }
}
