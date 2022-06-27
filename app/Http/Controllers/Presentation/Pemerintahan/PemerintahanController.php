<?php

namespace App\Http\Controllers\Presentation\Pemerintahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Skpd;

class PemerintahanController extends Controller
{
    public $data  = [];
    public $uriModul = "/pemerintahan";
    public $nmPart = "presentation.module.pemerintahan.";


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
        $this->data['urlImageBfest']= [
            url('/uploads/wallpaper/gedung_pemkab_bwidev.jpg'),
            url('/uploads/wallpaper/kantor-pemkab.jpg'),
        ];

        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        $this->data['pageTitle'] = "Pemerintahan Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "pemerintah banyuwangi, pemerintahan banyuwangi, kantor banyuwangi, banyuwangi, pemkab banyuwangi";

        //opsi ini diisi dengan judul halaman yang sesuai 
        $this->data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['uriModul']  = "/pemerintahan";
        $uriModul = $this->data['uriModul'];
        $this->data['modulItems'] = [

            [
                "name" => "Gambaran Umum",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/gambaran-umum'),
                "desc" => "Pemerintahan Kabupaten Banyuwangi",
                // "data" => [
                //     "6 Muesum",
                //     "7 Perang revolusi"
                // ]
            ],

            [
                "name" => "Eksekutif",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/eksekutif'),
                "desc" => "Pemerintahan Kabupaten Banyuwangi",
                // "data" => [
                //     "6 Muesum",
                //     "7 Perang revolusi"
                // ]
            ],

            [
                "name" => "Legislatif",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/legislatif'),
                "desc" => "Pembuatan dan pengatur peraturan daerah",
                // "data" => [
                //     "2.500 lebih penari",
                //     "150 lebih sanggar tari"
                // ]
            ],


            [
                "name" => "Yudikatif",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/yudikatif'),
                "desc" => "Pemroses hukum yang berlaku",
                // "data" => [
                //     "2.500 lebih penari",
                //     "150 lebih sanggar tari"
                // ]
            ],


            [
                "name" => "Lambang daerah",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/lambang-daerah'),
                "desc" => "Arti lambang daerah",
                // "data" => [
                //     "2.500 lebih penari",
                //     "150 lebih sanggar tari"
                // ]
            ],

            [
                "name" => "VIsi Misi",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/visi-misi'),
                "desc" => "Pandangan ke depan pembangunan",
                // "data" => [
                //     "2.500 lebih musisi",
                //     "150 lebih grup musik"
                // ]
            ],

            [
                "name" => "Prestasi",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/prestasi'),
                "desc" => "Kinerja pemerintah daerah",
                // "data" => [
                //     "500 lebih adat etnik",
                //     "1.000 lebih acara tradisi"
                // ]
            ],

            [
                "name" => "Produk Hukum",
                "icon" => asset('presentation/b-asset/img/icon-pemerintahan.png'),
                "link" => url($uriModul.'/produk-hukum'),
                "desc" => "Akses dan arsip digital produk hukum",
                // "data" => [
                //     "Pembuatan kamus osing",
                //     "penerbitan katalog budaya"
                // ]
            ],

            
        ];
       
        
    }


    public function index(){
        return view($this->nmPart."pemerintahanIndex",$this->data);
    } 

    public function kepalaDaerah(){
        $this->data['pageTitle'] = "Kepala Daerah - Pemerintahan Banyuwangi";
        return view($this->nmPart."kepala-daerah.kepalaDaerahIndex",$this->data);
    } 

    public function sekda(){
        $this->data['pageTitle'] = "Sekeretaris Daerah - Pemerintahan Banyuwangi";

        return view($this->nmPart."sekda.sekdaIndex",$this->data);
    } 


    public function inspektorat(){
        $this->data['pageTitle'] = "Inspektorat - Pemerintahan Banyuwangi";
        return view($this->nmPart."inspektorat.inspektoratIndex",$this->data);
    } 


    public function dinas(){
        $this->uriModul="/dinas";
        $this->data['dinasItems'] = [

            [
                "name" => "Dinas Kebudayaan dan Pariwisata",
                "shortname" => "Dinas Pariwisata",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'https://banyuwangitourism.com/',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Kependudukan dan Catatan Sipil",
                "shortname" => "Dispenduk",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'https://disdukcapil.banyuwangikab.go.id/',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Kesehatan",
                "shortname" => "Dinas Kesehatan",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" =>'http://dinkes.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pendidikan",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Komunikasi, Informatika dan Persandian",
                "shortname" => "Diskominfo",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://diskominfo.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Koperasi Usaha Mikro dan Perdagangan",
                "shortname" => "Diskop",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://diskopumkm.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Lingkungan Hidup",
                "shortname" => "DLH",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://dlh.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Pekerjaan Umum Pengairan",
                "shortname" => "Dinas PU Pengairan ",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://pengairan.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pekerjaan umum pemgairan",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Pekerjaan Umum Cipta Karya, Perumahan dan Permukiman",
                "shortname" => "Dinas PUCKPP",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://dinaspu.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pekerjaan umum",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Pemberdayaan Masyarakat dan Desa",
                "shortname" => "DPMD",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://dpmd.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Pemuda dan Olahraga",
                "shortname" => "Dispora",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://dispora.banyuwangikab.go.id/',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu",
                "shortname" => "DPMPTSP",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://dpmptspbwi.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Pendidikan",
                "shortname" => "Dinas Pendidikan",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://pendidikan.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pendidikan ",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Perhubungan",
                "shortname" => "Dishub",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://dishub.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Perikanan",
                "shortname" => "Dinas Perikanan",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => '#',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Perpustakaan dan Kearsipan",
                "shortname" => "Dinas Perpustakaan dan Kearsipan",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'https://dispusip.banyuwangikab.go.id/',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Pertanian dan Pangan",
                "shortname" => "Dinas Pertanian dan Pangan",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://dinaspertanian.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pertanian dan pangan",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Dinas Sosial. Pemberdayaan Perempuan dan KB",
                "shortname" => "Dinas Pertanian dan Pangan",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => '#',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor pertanian dan pangan",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Tenaga Kerja, Transmigrasi dan Perindustrian",
                "shortname" => "Disnaker",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'https://nakertrans.banyuwangikab.go.id/',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            [
                "name" => "Dinas Pemadam Kebakaran dan Penyelamatan",
                "shortname" => "Dispenduk",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => '#',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],

            [
                "name" => "Satpol PP",
                "shortname" => "Dispenduk",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => '#',
                "desc" => "Bertugas dalam penanganan dan inovasi sektor perencanaan pembangunan daerah",
                "jenisOpd" =>'dinas'
               
            ],
            
        ];
        return view($this->nmPart."dinas.dinasIndex",$this->data);
    } 

    public function kecamatannew(){
        $this->data['pageTitle'] = "Kecamatan - Pemerintahan Banyuwangi";
        $this->uriModul="/kecamatan";
        $this->data['kecamatanItems'] = kecamatan::all();
        return view($this->nmPart."kecamatan.kecamatanIndex",$this->data);
    }

    public function dinasnew(){
        $this->data['pageTitle'] = "Dinas - Pemerintahan Banyuwangi";
        $this->uriModul="/dinas";
        $this->data['dinasItems'] = skpd::where('jenis','dinas')->get();
        return view($this->nmPart."dinas.dinasIndex",$this->data);
    }

    public function badannew(){
        $this->data['pageTitle'] = "Badan - Pemerintahan Banyuwangi";
        $this->uriModul="/badan";
        $this->data['badanItems'] = skpd::where('jenis','badan')->get();
        return view($this->nmPart."badan.badanIndex",$this->data);
    }

    public function desa($id)
    {
        $this->data['pageTitle'] = "Desa - Pemerintahan Banyuwangi";
        $desa = Desa::where('no_kec',$id)->get();
        $data['kecamatan'] = Kecamatan::where('kec_kode',$id)->first();
        $data['desa'] = $desa;
        return view($this->nmPart.'desa.desaIndex',$data);
    }

    public function kecamatan(){
        $this->uriModul="/kecamatan";
        $this->data['kecamatanItems'] = [
            [
                "name" => "Kecamatan Pesanggaran",
                "shortname" => "Pesanggaran",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://pesanggaran.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Bahayangkara 16 Siliragung",
                "sosmed" => [
                    "telephon" => "0333 - 710446",
                    // "fax" => "kec_pesanggaran@banyuwangikab.go.id",
                    "email" => "kec_pesanggaran@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Siliragung",
                "shortname" => "Siliragung",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://siliragung.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Bhayangkara no. 16 Siliragung BWI",
                "sosmed" => [
                    "telephon" => "0333 - 710483",
                    "fax" => "0333 - 711672",
                    "email" => "kec_siliragung@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Bangorejo",
                "shortname" => "Bangorejo",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://bangorejo.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Pesanggaran no. 548 Bangorejo BWI",
                "sosmed" => [
                    "telephon" => "0333 - 710545",
                    // "fax" => "0333 - 711672",
                    "email" => "kec_bangorejo@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Purwoharjo",
                "shortname" => "Purwoharjo",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://purwoharjo.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Grajagan No. 45 Purwoharjo",
                "sosmed" => [
                    "telephon" => "0333 - 396345",
                    "fax" => "0333 - 396345",
                    "email" => "kec_purwoharjo@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Tegaldlimo",
                "shortname" => "Tegaldlimo",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => ' http://tegaldlimo.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Koptu Ruswadi No. 12 Tegaldlimo",
                "sosmed" => [
                    "telephon" => "0333 - 592008",
                    "fax" => "0333 - 592008",
                    "email" => "kec_tegaldlimo@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Muncar",
                "shortname" => "Muncar",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://muncar.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "	Jl. Hayam Wuruk No. 14 Muncar",
                "sosmed" => [
                    "telephon" => "0333 - 593008",
                    "fax" => "0333 - 593008",
                    "email" => "kec_muncar@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Cluring",
                "shortname" => "Cluring",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://cluring.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Raya Jember No. 34 Cluring",
                "sosmed" => [
                    "telephon" => "0333 - 396145",
                    // "fax" => "0333 - 711672",
                    "email" => "kec_cluring@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            
            [
                "name" => "Kecamatan Gambiran",
                "shortname" => "Gambiran",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://gambiran.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. A. Yani No. 26 Gambiran",
                "sosmed" => [
                    "telephon" => "0333 - 396445",
                    "fax" => "0333 - 396445",
                    "email" => "kec_gambiran@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Tegalsari",
                "shortname" => "Tegalsari",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://tegalsari.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Blokagung no. 62 Tegalsari BWI",
                "sosmed" => [
                    "telephon" => "0333 - 845573",
                    // "fax" => "0333 - 711672",
                    "email" => "kec_tegalsari@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Glenmore",
                "shortname" => "Glenmore",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://glenmore.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Raya Glenmore no. 89 Glenmore BWI",
                "sosmed" => [
                    "telephon" => "0333 - 821445",
                    "fax" => "0333 - 823135",
                    "email" => "kec_glenmore@banyuwangikab.go.id",
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Kalibaru",
                "shortname" => "Kalibaru",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://kalibaru.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Jember No. 157 Kalibaru",
                "sosmed" => [
                    "telephon" => "0333 - 897245",
                    "fax" => "0333 - 897245",
                    "email" => "kec_kalibaru@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Genteng",
                "shortname" => "Genteng",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://genteng.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. KH. Hasyim Ashari No. 64",
                "sosmed" => [
                    "telephon" => " 0333 - 845617",
                    "fax" => "0333 - 845617",
                    "email" => "kec_genteng@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Srono",
                "shortname" => "Srono",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://srono.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Raya Srono 145",
                "sosmed" => [
                    "telephon" => "0333 - 396245",
                    "fax" => "0333 - 396245",
                    "email" => "kec_srono@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Rogojampi",
                "shortname" => "Rogojampi",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://rogojampi.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. P. Diponogoro No. 211 Rogojampi",
                "sosmed" => [
                    "telephon" => "0333 - 631201",
                    // "fax" => "0333 - 711672",
                    "email" => "kec_rogojampi@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Kabat",
                "shortname" => "Kabat",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://kabat.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Raya Kabat No. 280",
                "sosmed" => [
                    "telephon" => "0333 - 631402",
                    // "fax" => "0333 - 711672",
                    "email" => "kec_kabat@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Singojuruh",
                "shortname" => "Singojuruh",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://singojuruh.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Singojuruh-Gendoh No. 85 Singojuruh",
                "sosmed" => [
                    "telephon" => "0333 - 631002",
                    "fax" => "0333 - 631002",
                    "email" => "kec_singojuruh@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Sempu",
                "shortname" => "Sempu",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://sempu.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Raya Sempu No. 27 Sempu",
                "sosmed" => [
                    "telephon" => "0333 - 846840",
                    // "fax" => "0333 - 711672",
                    "email" => "kec_sempu@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Songgon",
                "shortname" => "Songgon",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://songgon.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Jend. Ahmad Yani No. 287 Songgon",
                "sosmed" => [
                    "telephon" => "0333 - 631102",
                    "fax" => "0333 - 631102",
                    "email" => "kec_songgon@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Glagah",
                "shortname" => "Glagah",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://glagah.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Raya Banyuwangi-Licin 244 Glagah BWI",
                "sosmed" => [
                    "telephon" => "0333 - 421845",
                    "fax" => "0333 - 42184",
                    "email" => "kec_glagah@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Licin",
                "shortname" => "Licin",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://licin.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Licin no. 10 Licin Banyuwangi",
                "sosmed" => [
                    "telephon" => "0333 - 426644",
                    "fax" => "0333 - 426672",
                    "email" => "kec_licin@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Banyuwangi",
                "shortname" => "Banyuwangi",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://banyuwangi.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Jend. Ahmad Yani No. 101 BWI",
                "sosmed" => [
                    "telephon" => "0333 - 424232",
                    "fax" => "0333 - 124232",
                    "email" => "kec_banyuwangi@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Giri",
                "shortname" => "Giri",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://giri.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jalan Letkol Istiqlah 123",
                "sosmed" => [
                    "telephon" => "0333 - 424593",
                    // "fax" => "0333 - 711672",
                    "email" => "kec_giri@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Kalipuro",
                "shortname" => "Kalipuro",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://kalipuro.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Joyoboyo No. 03",
                "sosmed" => [
                    "telephon" => "0333 - 411275",
                    "fax" => "0333 - 411275",
                    "email" => "kec_kalipuro@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Wongsorejo",
                "shortname" => "Wongsorejo",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://wongsorejo.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Raya Wongsorejo 136",
                "sosmed" => [
                    "telephon" => "0333 - 461200",
                    "fax" => "0333 - 461200",
                    "email" => "kec_wongsorejo@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],
            [
                "name" => "Kecamatan Blimbingsari",
                "shortname" => "Blimbingsari",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://blimbingsari.banyuwangikab.go.id',
                "desc" => "",
                "alamat" => "Jl. Pantai Desa Blimbingsari Nomor 116 - Blimbingsari",
                "sosmed" => [
                    "telephon" => "0333 - 6370482",
                    "fax" => "0333 - 6370482",
                    "email" => "kec_blimbingsari@banyuwangikab.go.id",
                   
                ],
                "jenisOpd" =>'kecamatan'
               
            ],           
        ];
        return view($this->nmPart."kecamatan.kecamatanIndex",$this->data);
    } 

    public function badan(){

        $this->uriModul="/badan";
        $this->data['badanItems'] = [
            [
                "name" => "Badan Kepegawaian, Pendidikan dan Pelatihan",
                "shortname" => "BKD",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://bkd.banyuwangikab.go.id',
                "desc" => "Bertugas dalam penanganan kepegewaian",
                "jenisOpd" =>'badan'
               
            ],

            [
                "name" => "Badan Kesatuan Bangsa dan Politik",
                "shortname" => "Kesbangpol",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://kesbangpol.banyuwangikab.go.id',
                "desc" => "Bertugas dalam Penyelenggaraan urusan pemerintahan dan pelayanan umum bidang kesatuan bangsa dan politik, dan lain sebagainya",
                "jenisOpd" =>'badan'
               
            ],

            [
                "name" => "Badan Pendapatan Daerah",
                "shortname" => "Bapenda",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://bapenda.banyuwangikab.go.id',
                "desc" => "Bertugas dalam pembinaan teknis penyelenggaraan fungsi-fungsi penunjang urusan pemerintahan daerah di bidang pendapatan daerah dan lain sebagainya",
                "jenisOpd" =>'badan'
               
            ],

            [
                "name" => "Badan Pengelolaan Keuangan dan Aset Daerah",
                "shortname" => "BPKAD ",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'http://bpkad.banyuwangikab.go.id',
                "desc" => "Bertugas dalam pengelolaan di bidang keuangan dan aset daerah",
                "jenisOpd" =>'badan'
               
            ],

            [
                "name" => "Badan Perencanaan Pembangunan Daerah",
                "shortname" => "Bappeda",
                "icon" => asset('presentation/b-asset/img/logo-bwi-black-and-white.png'),
                "link" => 'https://bappeda.banyuwangikab.go.id',
                "desc" => "Bertugas dalam melaksanakan fungsi penunjang urusan pemerintahan di bidang perencanaan, pembangunan daerah, dan fungsi penunjang urusan pemerintahan bidang penelitian dan pengembangan",
                "jenisOpd" =>'badan'
               
            ],

        ];
        return view($this->nmPart."badan.badanIndex",$this->data);
    } 
}
