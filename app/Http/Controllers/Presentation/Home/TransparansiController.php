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


class TransparansiController extends Controller
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


    public function transparansi(Request $request, Berita $berita, Opd $opd, PopupInfo $popupinfo){
        // $user = Auth::user();

        // $opd = $this->opd::where("id","258")->first();
        $mOpd = $this->getOpdAvailabe();
        $this->data['pageTitle'] = "Transparansi ".$mOpd->nama. " - Kabupaten Bayuwangi";
        $this->data['keywords'] = "Transparansi ".$mOpd->nama. " - Kabupaten Bayuwangi";
        $this->data['description'] = "Transparansi ".$mOpd->nama. " - Kabupaten Bayuwangi";


        // if (Auth::check()){
        //     $user = Auth::user();
        //     // dd($user->id);
        //     // $user_id = $user->id;
        //     $unors = $this->opduser->where("user_id","=",$user->id);
        //     // dd($unors);
        //     $unor = $unors->get()[0]->opd_unor;

        //     $namaopd = $this->opd->getByIdUser($user->id);
        //     // dd($namaopd->nama);

        //     $this->data['pageTitle'] = "Transparansi ".$namaopd->nama;
        // }else{
        //     $sql= DB::raw("CONCAT(prov_id,'.',kab_id,'.',kec_id,'.',kel_id)");

        //     $default_opd = env('OPD_DEFAULT');
        //     $dataopdViaServicesProvider = $opd->where($sql, $default_opd)->first();
        //     $unor = $dataopdViaServicesProvider->kd_unor;
        //     $this->data['pageTitle'] = "Transparansi ".$dataopdViaServicesProvider->nama;

        //     // $user_id = 25;
        // }

        $data = $this->data;
        $prestasi = prestasi::orderBy('tahun', 'DESC');
        // $this->data['opd'] = $opd;
        // $opd = $this->opd::where("id","258")->first();
        $jenisOpd = $this->jenisOpd::where("id","=",$mOpd->jenis_opd)->first();

        $data['slug'] = $mOpd->slug;
        // $data['opd'] = $opd;
        $data['jenisOpd'] = $jenisOpd;
        $data['latestBannerOpd'] =$popupinfo->latest();
        $data['latestBerita'] =$berita->latest();

        // dd($this->data['latestBannerOpd']);


        $this->data['pageTitle'] =  ucwords($jenisOpd->nama) ." - ". ucwords($mOpd->nama);




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
            'pengelolaan_anggaran.id_dokumen', 'pengelolaan_kategori.kategori', 'pengelolaan_kategori.id_kategori')->where('unor', '=', $mOpd->kd_unor);

        // if($request->tahun ){
        //     $prestasi->where('tahun','$request->tahun');
        // }
        // dd($unor);
        $tahunnow = isset($request->tahun)?$request->tahun:date('Y');


        if($request->bidang){
            $prestasi->where('bidang',$request->bidang);
        }

        // if($request->tahun == '2011'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2012'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2013'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2014'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2015'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2016'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2017'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2018'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2019'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2020'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->where('pengelolaan_kategori.id_kategori', '!=' ,'K0020')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }
        // if($request->tahun == '2021'){
        //     $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $request->tahun)->where('ACTIVE', '=', '1')->where('pengelolaan_kategori.id_kategori', '!=' ,'K0020')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }

        // else{
            $data['data_anggaran'] = $anggaran->where('pengelolaan_anggaran.tahun', '=', $tahunnow)->where('ACTIVE', '=', '1')->groupBy('pengelolaan_kategori.id_kategori')->orderBy('pengelolaan_anggaran.created', 'desc')->get();
        // }

        $data['prestasi'] = $prestasi->paginate(15);

        $data['filtertahun'] =DB::table('pengelolaan_anggaran')->select('tahun')->groupby('tahun')->get();
        $data['tahun'] = isset($request->tahun)?$request->tahun:date('Y');
        // $data['opd'] = $opd;


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



}
