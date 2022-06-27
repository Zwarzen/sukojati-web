<?php

namespace App\Http\Controllers\Presentation\Galeri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\KategoriGaleri;
use App\Models\Admin\Galeri;
use App\Models\Admin\Opd;
use Auth;
use DB;

class GaleriFotoController extends Controller
{
    public $nmPart = "presentation.module.galeri.";
    public $data  = [];
    public $uriModul  = "/galeri";
    public $kategoriGaleri;
    public $opd;


    public  function __construct(Request $request, KategoriGaleri $kategoriGaleri, Opd $opd){
        $this->kategoriGaleri = $kategoriGaleri;
        $this->opd = $opd;
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
        $this->data['pageTitle'] = "Galeri Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Galeri banyuwangi, galeri, musik, tarian, cerita";

        //opsi ini diisi dengan judul halaman yang sesuai
        $this->data['description'] = "Galeri banyuwangi adalah menampilkan foto atau video dari kegiatan dan dokumentasi kabupaten banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $this->uriModul  = "/galeri";
        $this->data['modulItems'] = [
            [
                "name" => "Tempat berBerita",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($this->uriModul.'/tempat-berBerita'),
                "desc" => "Tempat-tempat Berita",

            ],

            [
                "name" => "Tempat berBerita",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($this->uriModul.'/tempat-berBerita'),
                "desc" => "Tempat-tempat Berita",

            ],

            [
                "name" => "Tempat berBerita",
                "icon" => asset('presentation/b-asset/img/icon-budaya.png'),
                "link" => url($this->uriModul.'/tempat-berBerita'),
                "desc" => "Tempat-tempat Berita",

            ],


        ];



    }

    public function index(){

        $opd = $this->getOpdAvailabe();

        $galeriHots         = Galeri::where('kd_unor',$opd->kd_unor)->
                                        where('published','yes')->orderBy('publish_date','DESC')->paginate(20);
        $this->data['urlWallpaper'] =  null;
        $this->data['galeriHots'] =  $galeriHots;

        $this->data['keywords'] = "Galeri Pemerintah ".$opd->alias." Kabupaten Banyuwangi";

        //opsi ini diisi dengan judul halaman yang sesuai
        $this->data['description'] = "Galeri Pemerintah ".$opd->alias." Kabupaten Banyuwangi menampilkan foto atau video dari kegiatan dan dokumentasi yang menarik untuk diulik";





        $data = $this->data;

        return view($this->nmPart."galeriIndex",$data);
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

    public function detail($slug){

        // $data = array();
        $getData = Galeri::where([['slug', '=', $slug]])->first();
        $getTerkait = Galeri::where([['galeri_kategori_id', '=', $getData->galeri_kategori_id],['id','<>',$getData->id]])->orderBy('publish_date','DESC')->limit(5)->get();
        $this->data['data'] =  $getData;
        $this->data['terkait'] =  $getTerkait;
        $galeriNgetren = Galeri::orderBy('hit','DESC')->limit(10)->get();
        $this->createGalleryNgetren($galeriNgetren);
        $data = $this->data;

        return view($this->nmPart."galeriDetail",$data);
    }

    public function createGalleryParts(){
        // $getData = KategoriGaleri::orderBy('id','DESC')->limit(6)->get();
        $getData = $this->kategoriGaleri->getMainKategori();
        $this->data['data'] =  $getData;
        $data = $this->data;

        return view($this->nmPart."galleryParts",$data);
    }

    public function showListFotoByKategori(){
        $getData = Galeri::where([['galeri_kategori_id', '=', $_POST['id']]])->orderBy('hit','DESC')->get();
        if($_POST['jns']=='Ngetren')
        {
            $getData = Galeri::where([['published', '=', 'yes']])->orderBy('hit','DESC')->get();
        }
        if($_POST['jns']=='Terbaru')
        {
            $getData = Galeri::where([['published', '=', 'yes']])->orderBy('published','DESC')->get();
        }

        $this->data['data'] =  $getData;
        $this->data['selected'] =  $_POST['id'];
        $this->data['jns'] =  $_POST['jns'];
        $data = $this->data;

        return view($this->nmPart."galleryPartsCarousel",$data);
    }

    public function createGalleryNgetren($getData){
        $this->data['galeriNgetren'] =  $getData;
        $data = $this->data;

        return view($this->nmPart."ngetrenGaleri",$data);
    }

    public function createGalleryPartsKategori(){
        // $getData = KategoriGaleri::orderBy('id','DESC')->limit(6)->get();
        $getKat = $this->kategoriGaleri->getMainKategori();
        $datas = array();

        foreach ($getKat as $row1) {
            $getGaleriPopuler = Galeri::where([['galeri_kategori_id', '=', $row1->id],['published', '=', 'yes']])->orderBy('hit','DESC')->limit(3)->get();
            $getGaleriTerbaru = Galeri::where([['galeri_kategori_id', '=', $row1->id],['published', '=', 'yes']])->orderBy('publish_date','DESC')->limit(3)->get();

            $datas[$row1->id]['title'] = $row1->name;
            $datas[$row1->id]['pinned']['id'] = $row1->id_galeri;
            $datas[$row1->id]['pinned']['title'] = $row1->title;
            $datas[$row1->id]['pinned']['img_thumb'] = $row1->img_thumb;
            $datas[$row1->id]['pinned']['img_raw'] = $row1->img_raw;
            $datas[$row1->id]['pinned']['slug'] = $row1->slug;
            $datas[$row1->id]['pinned']['desc'] = $row1->desc;
            $datas[$row1->id]['pinned']['publish_date'] = $row1->publish_date;
            $datas[$row1->id]['pinned']['hit'] = $row1->hit;
            foreach ($getGaleriPopuler as $row2) {
                $datas[$row1->id]['populer'][$row2->id]['id'] = $row2->id;
                $datas[$row1->id]['populer'][$row2->id]['title'] = $row2->title;
                $datas[$row1->id]['populer'][$row2->id]['img_thumb'] = $row2->img_thumb;
                $datas[$row1->id]['populer'][$row2->id]['img_raw'] = $row2->img_raw;
                $datas[$row1->id]['populer'][$row2->id]['slug'] = $row2->slug;
                $datas[$row1->id]['populer'][$row2->id]['desc'] = $row2->desc;
                $datas[$row1->id]['populer'][$row2->id]['publish_date'] = $row2->publish_date;
                $datas[$row1->id]['populer'][$row2->id]['hit'] = $row2->hit;
                // $datas[$row1->id]['populer'][$row2->id]['id'] = $row2->id;
            }
            foreach ($getGaleriTerbaru as $row2) {
                $datas[$row1->id]['terbaru'][$row2->id]['id'] = $row2->id;
                $datas[$row1->id]['terbaru'][$row2->id]['title'] = $row2->title;
                $datas[$row1->id]['terbaru'][$row2->id]['img_thumb'] = $row2->img_thumb;
                $datas[$row1->id]['terbaru'][$row2->id]['img_raw'] = $row2->img_raw;
                $datas[$row1->id]['terbaru'][$row2->id]['slug'] = $row2->slug;
                $datas[$row1->id]['terbaru'][$row2->id]['desc'] = $row2->desc;
                $datas[$row1->id]['terbaru'][$row2->id]['publish_date'] = $row2->publish_date;
                $datas[$row1->id]['terbaru'][$row2->id]['hit'] = $row2->hit;
            }
        }
        // echo '<pre>';
        // print_r($datas);
        // echo '</pre>';die();
        // $this->data['data'] =  $getData;
        // $data = $this->data;

        $this->data['galleryPartsKategori'] =  $datas;
        $data = $this->data;
        return view($this->nmPart."galleryPartsKategori",$datas);
    }
}
