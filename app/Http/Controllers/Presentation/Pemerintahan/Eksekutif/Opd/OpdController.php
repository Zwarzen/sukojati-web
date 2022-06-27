<?php

namespace App\Http\Controllers\Presentation\Pemerintahan\Eksekutif\Opd;

use App\Models\Admin\Opd;
use App\Models\Admin\Berita;
use App\Models\Admin\Galeri;
use Illuminate\Http\Request;
use App\Models\Admin\OpdJenis;
use App\Models\Admin\PopupInfo;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class OpdController extends Controller
{
    public $nmPart = "presentation.module.opd.";
    public $data  = [];
    public $uriModul  = "/pemerintahan/eksekutif/opd";
    public $jenisOpd;
    public $opd;
    public $queryStrings = null;
    public $objOpd;


    public  function __construct(Request $request, OpdJenis $jenisOpd, Opd $opd){
        $this->jenisOpd = $jenisOpd;
        $this->opd = $opd;



       // variable  $opdViaServicesProvider di dapat dari appServicesProvider untuk kebutuhan global view and controller
        // $this->objOpd = $opdViaServicesProvider;

        $this->data["navigationPart"] = [
            "navBrandTitle"=>"OPD",
            "navBrandSubTitle" =>"Kabpuaten Banyuwangi"
        ];

        // opsi ini untuk menampilkan super news yang khusus dan penting
        // bisa dari database atau diisi manual


        // $this->data["headlineNews"] = [
        //     "titleHeadlineNews"=>"Corona Di Banyuwangi Menurun ",
        //     "contentHeadlineNews" =>"super headline, contoh: pencegahan Corona virus telah dilakukan Pemkab banyuwangi",
        //     "urlHeadlineNews"=>"http://banyuwangiweb.test/berita/detail/slug",
        // ];


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

        $this->data['base_link_media_thumbnail'] = asset('media/berita/thumbnail')."/";
        $this->data['base_link_media_popupinfo_raw'] = asset('media/popupinfo/original')."/";
    }

    public function index(Berita $berita, PopupInfo $popupinfo, Galeri $galeri){

        return $this->beranda($berita, $popupinfo, $galeri);
    }


    /**
     * slug
     *
     * @param  mixed $slugOpd ini sglu nama opd contoh dinas-kesehatan
     * @return void
     */
    public function beranda(Berita $berita, PopupInfo $popupinfo, Galeri $galeri){


        $opd = $this->getOpdAvailabe();
        // dd($opd->kd_unor);

        $this->data['latestBannerOpd']  = $popupinfo->latest(12,["unor","=",$opd->kd_unor]); //Attempt to read property "kd_unor" on null 
        $this->data['latestBerita']     = $berita->latest(4,["a.unor","=",$opd->kd_unor]);
        $this->data['latestGaleri']     = $galeri->latest(6,["kd_unor","=",$opd->kd_unor]);

        $this->data['pageTitle'] = "Pemerintah ". $opd->nama. " - Kabupaten Banyuwangi";
        $this->data['keywords'] = "Pemerintahan ". $opd->nama. " - Kabupaten Banyuwangi";
        $this->data['description'] = "Website resmi Pemerintahan ". $opd->nama. " - Kabupaten Banyuwangi";


        $this->data["og"] =[
            [
                "property" => "og:site_name",
                "content" => $opd->nama
            ],

            [
                "property"  => "og:type",
                "content" => "article"
            ],

            [
                "property"  => "og:title",
                "content" => $this->data['pageTitle']
            ],

            [
                "property"  => "og:description",
                "content" => $this->data['description']
            ],

            [
                "property"  => "og:url",
                "content" => url('')

            ],

            [
                "property"  => "og:image",
                "content" => asset('presentation/b-asset/img/lambang-daerah.png')
            ]
        ] ;


        $this->data["twitter"] =[

            [
                "name" => "twitter:card",
                "content" => "summary_large_image"
            ],

            [
                "name" => "twitter:domain",
                "content" => url("")
            ],


            [
                "name" => "twitter:title",
                "content" => $this->data['pageTitle']
            ],


            [
                "name" => "twitter:description",
                "content" => $this->data['description']
            ],

            [
                "name" => "twitter:image",
                "content" => asset('presentation/b-asset/img/lambang-daerah.png')
            ],

        ] ;


        return view($this->nmPart.".opdIndex",$this->data);
    }

    function getOpdAvailabe(){
        if (Auth::check()){
            $user = Auth::user();

            $opd = $this->opd->getByIdUser($user->id);
            // dd($opd->kd_unor);


        }else{
            $default_opd = env('OPD_DEFAULT');
            $sql= DB::raw("CONCAT(prov_id,'.',kab_id,'.',kec_id,'.',kel_id)");
            $opd = $this->opd->where($sql, $default_opd)->first();

            // dd($opd->kd_unor);


        }

        return $opd;

    }



    public function listPopupInfoView(PopupInfo $popupinfo){
        $this->data['latestPopupInfo'] =$popupinfo->latest();
        return view($this->nmPart."listPopupInfoView",$this->data)->render();
    }

    public function visimisi($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdVisiMisiParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }

    public function struktur($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdStrukturParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }

    public function proker($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdProkerParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }

    public function data($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdDataParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }

    public function publikasi($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdPublikasiParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }

    public function kegiatan($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdKegiatanParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }


    public function berita($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdBeritaParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }


    public function kontak($slugOpd){
        $this->data['slug'] = $slugOpd;
        $this->data['pageContent'] = "presentation.module.pemerintahan.eksekutif.opd.opdKontakParts";

        return view($this->nmPart."/opdIndex",$this->data);
    }



}

