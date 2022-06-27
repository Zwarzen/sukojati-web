<?php

namespace App\Http\Controllers\Presentation\Home;

use Auth;
use File;
use DataTables;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Admin\Berita;
use App\Models\Admin\PopupInfo;
use App\Models\Admin\KanalBerita;
use App\Models\Admin\KategoriGaleri;
use App\Models\Admin\Galeri;
use App\Models\Prestasi;
use App\Models\Admin\OpdUser;
use App\Models\Admin\Opd;
use App\Models\Admin\OpdJenis;
use App\Models\Presentation\Transparansi\PengelolaanKategori;
use Illuminate\Support\Facades\DB;


class PortalController extends Controller
{
    public $nmPart = "presentation.module.home.portal.";

    public $data  = [];
    public $uriModul  = "/home/portal";
    public $opd;
    public $jenisOpd;


    public $gzClient;


    public  function __construct(Request $request, OpdJenis $jenisOpd, Opd $opd, OpdUser $opduser){

        $this->jenisOpd = $jenisOpd;
        $this->opd = $opd;
        $this->opduser = $opduser;
        



        $this->gzClient = new Client(['verify' => false ]);
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
        $this->data['base_link_media_thumbnail'] = asset('media/berita/thumbnail')."/";
        $this->data['base_link_media_popupinfo_raw'] = asset('media/popupinfo/original')."/";

        $this->data['base_link_asset_img'] = asset('presentation/b-asset/img')."/";
        $this->data['base_link_asset_img'] = asset('presentation/b-asset/img')."/";




    }


    public function index(Berita $berita, KategoriGaleri $kategori){
        $data = $this->data;

        $data['latestBerita'] =$berita->latest();
        $data['latestBeritaVideo'] =$berita->latestBeritaVideo();
        $data['galeriKategori']  = $kategori->getMainKategori();


        try {
            $data['corona'] = $this->getImgCoronaAndVaksin();
        } catch (\Throwable $th) {
            //throw $th;
        }


         // <meta property="og:type" content="article" />
        // <meta property="og:title" content="Cara Menggunakan Open Graph Meta Tag" />
        // <meta property="og:description" content="Open Graph Meta Tag atau OG Tags merupakan sebuah tag html khusus yang bertujuan agar social media mengenali sebuah page di website." />
        // <meta property="og:url" content="https://www.metropolution.com/marketips/open-graph-atau-og-meta-tag/" />
        // <meta property="og:image" content="https://www.metropolution.com/wp-content/uploads/2020/01/cara-membuat-open-graph-meta-tag.jpg" />



        // ini untuk preview share disosial media <meta property="og:site_name" content="European Travel, Inc.">
        $data["og"] =[

            [
                "property" => "og:site_name",
                "content" => "Pemerintah Kabupaten Banyuwangi"
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
            ],

            [
                "property"  => "og:image:width",
                "content" => "1280"
            ],

            [
                "property"  => "og:image:height",
                "content" => "720"
            ]

        ] ;



        $data["twitter"] =[

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





        return view($this->nmPart."portalIndex",$data);
    }

    public function index_transparansi(Request $request){
        $this->data['pageTitle'] = "Transparansi Kabupaten Banyuwangi";
        $data = $this->data;
        $prestasi = prestasi::orderBy('tahun', 'DESC');
        if($request->tahun){
            $prestasi->where('tahun',$request->tahun);
        }
        if($request->bidang){
            $prestasi->where('bidang',$request->bidang);
        }
        $data['prestasi'] = $prestasi->paginate(15);
        $data['filtertahun'] = prestasi::groupby('tahun')->get();
        $data['filterbidang'] = prestasi::groupby('bidang')->get();
        return view($this->nmPart."transparansi",$data);
    }


    public function transparansi(Request $request, Berita $berita, Opd $opd, PopupInfo $popupinfo){
        // $user = Auth::user();

        // $opd = $this->opd::where("id","258")->first();

        if (Auth::check()){
            $user = Auth::user();
            // dd($user->id);
            // $user_id = $user->id;
            $unors = $this->opduser->where("user_id","=",$user->id);
            // dd($unors);
            $unor = $unors->get()[0]->opd_unor;

            $namaopd = $this->opd->getByIdUser($user->id);
            // dd($namaopd->nama); 

            $this->data['pageTitle'] = "Transparansi ".$namaopd->nama;
        }else{
            $sql= DB::raw("CONCAT(prov_id,'.',kab_id,'.',kec_id,'.',kel_id)");
        
            $default_opd = env('OPD_DEFAULT');
            $dataopdViaServicesProvider = $opd->where($sql, $default_opd)->first();
            $unor = $dataopdViaServicesProvider->kd_unor;
            $this->data['pageTitle'] = "Transparansi ".$dataopdViaServicesProvider->nama;

            // $user_id = 25;
        }

        $data = $this->data;
        $prestasi = prestasi::orderBy('tahun', 'DESC');
        $this->data['opd'] = $opd;
        $opd = $this->opd::where("id","258")->first();
        $jenisOpd = $this->jenisOpd::where("id","=",$opd->jenis_opd)->first();

        $data['slug'] = $opd->slug;
        // $data['opd'] = $opd;
        $data['jenisOpd'] = $jenisOpd;
        $data['latestBannerOpd'] =$popupinfo->latest();
        $data['latestBerita'] =$berita->latest();

        // dd($this->data['latestBannerOpd']);


        $this->data['pageTitle'] =  ucwords($jenisOpd->nama) ." - ". ucwords($opd->nama);




        $this->data["og"] =[
            [
                "property" => "og:site_name",
                "content" => "Pemerintah Kabupaten Banyuwangi"
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

        // $anggaran = pengelolaan_kategori::select();
        // dd($request->tahun);
        // die();
        $anggaran = DB::table('pengelolaan_anggaran')
            ->join('pengelolaan_kategori', 'pengelolaan_anggaran.id_kategori', '=', 'pengelolaan_kategori.id_kategori')
            // ->join('unor', 'pengelolaan_anggaran.id_dinas', '=', 'unor.kd_unor')
            ->select('pengelolaan_anggaran.judul_dokumen', DB::raw('COUNT(pengelolaan_anggaran.id_dokumen) as Dokumen'), 'pengelolaan_anggaran.tahun',
            'pengelolaan_anggaran.id_dokumen', 'pengelolaan_kategori.kategori', 'pengelolaan_kategori.id_kategori')->where('unor', '=', $unor);

        // if($request->tahun ){
        //     $prestasi->where('tahun','$request->tahun');
        // }
        // dd($unor);
        $tahunnow = isset($request->tahun)?$request->tahun:date('Y');


        if($request->bidang){
            $prestasi->where('bidang',$request->bidang);
        }

        if($request->tahun == '2011'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2012'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2013'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2014'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2015'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2016'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2017'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2018'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2019'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2020'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->where('pengelolaan_kategori.id_kategori', '!=' ,'K0020')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }
        if($request->tahun == '2021'){
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->where('pengelolaan_kategori.id_kategori', '!=' ,'K0020')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        }

        // else{
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $tahunnow)->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }

        $data['prestasi'] = $prestasi->paginate(15);

        $data['filtertahun'] =DB::table('pengelolaan_anggaran')->select('tahun')->groupby('tahun')->get();
        $data['tahun'] = isset($request->tahun)?$request->tahun:date('Y');
        $data['opd'] = $opd;


        // dd($data['filtertahun']);


        return view($this->nmPart."transparansipengelolaan",$data);
    }

    public function transparansi_perencanaan(Request $request){
        $this->data['pageTitle'] = "Transparansi Kabupaten Banyuwangi";
        $data = $this->data;
        $prestasi = prestasi::orderBy('tahun', 'DESC');
        // $anggaran = pengelolaan_kategori::select();
        $anggaran = DB::table('pengelolaan_anggaran')
            ->join('pengelolaan_kategori', 'pengelolaan_anggaran.id_kategori', '=', 'pengelolaan_kategori.id_kategori')
            // ->join('unor', 'pengelolaan_anggaran.id_dinas', '=', 'unor.kd_unor')
            ->select('pengelolaan_anggaran.judul_dokumen', DB::raw('COUNT(pengelolaan_anggaran.id_dokumen) as Dokumen'), 'pengelolaan_anggaran.tahun',
            'pengelolaan_anggaran.id_dokumen', 'pengelolaan_kategori.kategori', 'pengelolaan_kategori.id_kategori');

        if($request->tahun){
            $prestasi->where('tahun','$request->tahun');
        }
        if($request->bidang){
            $prestasi->where('bidang',$request->bidang);
        }

        if($request->tahun == '2011'){
            // $data['anggaran_2011'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2011')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'desc')->get();
        }
        if($request->tahun == '2012'){
            // $data['anggaran_2012'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2012')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2013'){
            // $data['anggaran_2013'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2013')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2014'){
            // $data['anggaran_2014'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2014')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2015'){
            // $data['anggaran_2015'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2015')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2016'){
            // $data['anggaran_2016'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2016')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2017'){
            // $data['anggaran_2017'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2017')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2018'){
            // $data['anggaran_2018'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2018')->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2019'){
            // $data['anggaran_2019'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2019')->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2020'){
            // $data['anggaran_2020'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2020')->where('ACTIVE', '=', '1')->where('pengelolaan_kategori.id_kategori', '!=' ,'K0020')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }
        if($request->tahun == '2021'){
            // $data['anggaran_2021'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', '2021')->where('ACTIVE', '=', '1')->where('pengelolaan_kategori.id_kategori', '!=' ,'K0020')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_kategori.id_kategori', 'asc')->get();
        }

        $data['prestasi'] = $prestasi->paginate(15);
        $data['filtertahun'] = prestasi::groupby('tahun')->get();
        $data['tahun'] = isset($request->tahun)?$request->tahun:date('Y');

        // dd($data['anggaran_2020']);

        return view($this->nmPart."transparansipengelolaan",$data);
    }

    public function transparansiPengelolaan($tahun, $id) {
        $this->data['pageTitle'] = "Transparansi Pengelolaan Kabupaten Banyuwangi";
        $data = $this->data;

        $data['kls'] = PengelolaanKategori::get();
        $data['detail'] = DB::table('pengelolaan_anggaran')
        ->join('pengelolaan_kategori', 'pengelolaan_anggaran.id_kategori', '=', 'pengelolaan_kategori.id_kategori')
        // ->join('unor', 'pengelolaan_anggaran.id_dinas', '=', 'unor.kd_unor')
        ->select('pengelolaan_anggaran.judul_dokumen', 'nama_file', 'pengelolaan_anggaran.tahun',
        'pengelolaan_anggaran.id_dokumen', 'pengelolaan_kategori.kategori', 'pengelolaan_kategori.id_kategori')
        ->where('pengelolaan_anggaran.tahun', '=', $tahun)->where('ACTIVE', '=', '1')->where('pengelolaan_kategori.id_kategori', '=' ,$id)
        ->orderBy('pengelolaan_anggaran.created', 'desc')->paginate(15);
        // dd($data['detail'] );
        $data['tahun'] = $tahun;
        $data['id'] = $id;
        $data['kategori'] = DB::table('pengelolaan_kategori')->where('id_kategori', '=', $id)->first();

        return view($this->nmPart."transparansiPengelolaanDetail",$data);

    }

    public function listContactUsView(){
        $assetImg = $this->data['base_link_asset_img'];

        $listApps = [

            [
                "id" => "1",
                "title" => "Website",
                "jenis" => "web",
                "imgSrc" => $assetImg . "web.png",
                "textDesc" => "Aplikasi Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "http://pengaduan.banyuwangikab.go.id/",

            ],
            [
                "id" => "1",
                "title" => "SMS",
                "jenis" => "sms",
                "imgSrc" => $assetImg . "sms.png",
                "textDesc" => "SMS Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "sms:+6282131545555",

            ],
            [
                "id" => "1",
                "title" => "Whatsapp",
                "jenis" => "wa",
                "imgSrc" => $assetImg . "wa.png",
                "textDesc" => "Whatsapp Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "https://wa.me/+6282131545555",

            ],

            [
                "id" => "1",
                "title" => "telpon",
                "jenis" => "telpon",
                "imgSrc" =>  $assetImg . "pengaduan.png",
                "textDesc" => "Telepon Pengaduan Online Kabupaten Banyuwangi",
                "linkTo" => "tel:112",

            ],
            [
                "id" => "1",
                "title" => "Facebook",
                "jenis" => "sosmed",
                "imgSrc" => $assetImg . "facebook.png",
                "textDesc" => "Facebook Kabupaten Banyuwangi",
                "linkTo" => "https://id-id.facebook.com/KabupatenBanyuwangi",

            ],

            [
                "id" => "1",
                "title" => "Instagram",
                "jenis" => "sosmed",
                "imgSrc" => $assetImg . "ig.png",
                "textDesc" => "Facebook Kabupaten Banyuwangi",
                "linkTo" => "https://instagram.com/banyuwangi_kab",

            ],

            [
                "id" => "1",
                "title" => "Youtube",
                "jenis" => "sosmed",
                "imgSrc" => $assetImg . "youtube.png",
                "textDesc" => "Facebook Kabupaten Banyuwangi",
                "linkTo" => "https://www.youtube.com/channel/UCptA3CnhbD9smyVJRtCOvcQ",

            ],

            [
                "id" => "1",
                "title" => "Twitter",
                "jenis" => "sosmed",
                "imgSrc" => $assetImg . "twitter.png",
                "textDesc" => "Twitter Kabupaten Banyuwangi",
                "linkTo" => "https://twitter.com/banyuwangi_kab",

            ],

            ];

        return view($this->nmPart."listContactUsPart",["listApps"=>$listApps])->render();
    }

    public function listPopupInfoView(PopupInfo $popupinfo){
        $this->data['latestPopupInfo'] =$popupinfo->latest();
        return view($this->nmPart."listPopupInfoView",$this->data)->render();
    }



    public function listProfileView(){

        $listApps = [


            [
                "id" => "1",
                "title" => "Geologi",
                "jenis" => "web",
                "imgSrc" => asset('presentation/b-asset/img/icon-geologi.png'),
                "textDesc" => "Struktur geologi dan Jenis Tanah yang bervariasi",
                "linkTo" => route('profil-daerah.geologi')

            ],

            [
                "id" => "1",
                "title" => "Iklim",
                "jenis" => "web",
                "imgSrc" => asset('presentation/b-asset/img/icon-iklim.png'),
                "textDesc" => "Curah hujan, kelembaban udara dan lainnya",
                "linkTo" =>  route('profil-daerah.iklim')

            ],

            [
                "id" => "1",
                "title" => "Geografi",
                "jenis" => "web",
                "imgSrc" => asset('presentation/b-asset/img/icon-geografi.png'),
                "textDesc" => "Letak, luas wilayah dan lainnya",
                "linkTo" =>  route('profil-daerah.geografi')

            ],

            [
                "id" => "1",
                "title" => "Sejarah",
                "jenis" => "web",
                "imgSrc" => asset('presentation/b-asset/img/icon-sejarah.png'),
                "textDesc" => "Asal usul Kota Banyuwangi",
                "linkTo" =>  route('profil-daerah.sejarah')

            ],

            [
                "id" => "1",
                "title" => "Kinerja",
                "jenis" => "web",
                "imgSrc" => asset('presentation/b-asset/img/icon-spedometer.png'),
                "textDesc" => "Hasil pembangunan daerah ",
                "linkTo" =>  route('profil-daerah.kinerja')

            ],




            ];

        return view($this->nmPart."listProfilePart",["listApps"=>$listApps])->render();
    }

    public function listPerencanaanView(){

        $listApps = [


            [
                "id" => "1",
                "title" => "RPJPD 2005-2025",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/perencanaan.png',
                "textDesc" => "",
                "linkTo" => 'https://banyuwangikab.go.id//media/doc/edoc/RPJPD_2005_2025.pdf'

            ],

            [
                "id" => "1",
                "title" => "RPJMD 2016-2021",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/perencanaan.png',
                "textDesc" => "",
                "linkTo" =>  'https://banyuwangikab.go.id//media/doc/edoc/RPJMD_2016_2021.pdf'

            ],

            [
                "id" => "1",
                "title" => "RPMJD P 2016-2021",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/perencanaan.png',
                "textDesc" => "",
                "linkTo" =>  'https://banyuwangikab.go.id//media/doc/edoc/RPJMD_P_2016_2021.pdf'

            ],

            [
                "id" => "1",
                "title" => "RKPD 2021",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/perencanaan.png',
                "textDesc" => "Letak, luas wilayah dan lainnya",
                "linkTo" =>  'https://banyuwangikab.go.id//media/doc/edoc/RKPD_2021.pdf'

            ],

            [
                "id" => "1",
                "title" => "LKJIP 2020",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/perencanaan.png',
                "textDesc" => "Hasil pembangunan daerah ",
                "linkTo" =>  'https://banyuwangikab.go.id//media/doc/edoc/LKJIP2020.pdf'

            ]



            ];

        return view($this->nmPart."listPerencanaanPart",["listApps"=>$listApps])->render();
    }

    public function listTransparansiView(){

        $listApps = [


            [
                "id" => "1",
                "title" => "Transparansi Perencanaan Pembangunan Daerah",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/perencanaan.png',
                "textDesc" => "",
                "linkTo" => 'https://banyuwangikab.go.id//media/doc/edoc/RPJPD_2005_2025.pdf'

            ],

            [
                "id" => "1",
                "title" => "Transparansi Pengelolaan Anggaran Daerah ",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/transparansi.png',
                "textDesc" => "Letak, luas wilayah dan lainnya",
                "linkTo" =>  'https://banyuwangikab.go.id//media/doc/edoc/RKPD_2021.pdf'

            ],

            [
                "id" => "1",
                "title" => "Transparansi Pertanggung Jawaban Anggaran Daerah",
                "jenis" => "web",
                "imgSrc" => 'https://banyuwangikab.go.id/images/icon/jdih.png',
                "textDesc" => "Hasil pembangunan daerah ",
                "linkTo" =>  'https://banyuwangikab.go.id//media/doc/edoc/LKJIP2020.pdf'

            ]



            ];

        return view($this->nmPart."listTransparansiPart",["listApps"=>$listApps])->render();
    }

    public function radioBlambangan(){
        return view($this->nmPart."radioBlambanganView",$this->data)->render();
    }



    // public function b(){
    //     echo bcrypt('operator2banyuwngikab@2021!!');
    // }


    // public function tes(){
    //     $endpoint = "http://banyuwangikab.go.id/api/api_bwikab/get_list_berita";

    //     $client = $this->gzClient;

    //     $options =  ['query' => [
    //         'key1' =>"22",
    //         'key2' =>"22",
    //     ]];

    //     $response = $client->request('GET', $endpoint,$options);

    //     // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

    //     $statusCode = $response->getStatusCode();
    //     $content = $response->getBody();

    //     print_r( json_decode($response->getBody()) );


    //     // or when your server returns json
    //     // return $content = json_decode($response->getBody());
    // }


    public function getImgCoronaAndVaksin(){
        $endpointVaksin = "http://corona.banyuwangikab.go.id/api/api_bwikab/get_vaksin";
        $endpointInfografis = "http://corona.banyuwangikab.go.id/api/api_bwikab/get_infografis";

        $client = $this->gzClient;

        $response = $client->request('GET', $endpointVaksin, ['query' => []]);
        $statusCode = $response->getStatusCode();
        $vaksin = json_decode($response->getBody());


        $response = $client->request('GET', $endpointInfografis, ['query' => []]);
        $statusCode = $response->getStatusCode();
        $infografis = json_decode($response->getBody());

        $content = [
            "vaksinasi" => $vaksin,
            "infografis" => $infografis
        ];

        // or when your server returns json
        return $content;
    }


    public function getListInformation(Request $request){

        $wanted = file_get_contents("php://input");
        $key = $request->all()["key"];

        $endpointListInformation = "http://banyuwangikab.go.id/api/api_bwikab/get_list_berita";

        $client = $this->gzClient;

        $response = $client->request('POST', $endpointListInformation, ['form_params' => ["key"=>$key]]);
        $statusCode = $response->getStatusCode();
        $res = json_decode($response->getBody());

        $data= $res->data->data;

        return view($this->nmPart."resultSearch",["listSearch"=>$data])->render();
    }

}
