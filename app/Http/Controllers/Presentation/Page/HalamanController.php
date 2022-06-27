<?php

namespace App\Http\Controllers\Presentation\Page;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Admin\KanalBerita;
use App\Models\Admin\Halaman;

class HalamanController extends Controller
{
    public $nmPart = "presentation.module.halaman.";
    public $data  = [];
    public $uriModul  = "/halaman";
    public $gzClient;


    public  function __construct(Request $request, Halaman $halaman, KanalBerita $kanalBerita)
    {
        $this->gzClient = new Client(['verify' => false]);


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

        $this->data['urlWallpaper'] = [
            url('/uploads/wallpaper/gb-gesibu.jpg'),
            url('/uploads/wallpaper/gb-gesibu2.jpg'),
        ];

        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        $this->data['pageTitle'] = "Halaman Desa Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Halaman Desa banyuwangi, halaman, musik, tarian, cerita";

        //opsi ini diisi dengan judul halaman yang sesuai
        $this->data['description'] = "Halaman resmi Desa  Banyuwangi adalah portal informasi resmi desa desa di kabupaten  banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya ::
        // website banyuwangi, banyuwangi, dan setserunya
        $this->uriModul  = "/budaya/berita";
        $this->data['base_link_media_thumbnail'] = asset('media/berita/thumbnail/')."/";
        $this->data['base_link_media_raw'] = asset('media/berita/original/')."/";
        $this->data['type_news'] = "text";

    }

    public function index()
    {
        return redirect()->route('beranda');
    }

    public function detail(Halaman $halaman,$slug)
    {


        $v = explode(".html",$slug);


        if(count($v)>1){
            $slug = $v[0];
        }


        $b = $halaman::where("slug","=",$slug)->first();

        if(!$b){
            // return redirect()->route('search',["q"=>$slug]);
            return redirect()->route('beranda');
        }

        if($b->published == "no"){
            return redirect()->route('beranda');
            // return redirect()->route('search',["q"=>$slug]);
        }


        $hit = $b->hit+1;
        $b->update(["hit" => $hit]);

        // $this->data['ngetrenBerita'] = $halaman->trending(4);

        $this->data['halamanDetail'] = $b;
        $keywordRelated = strlen($b->keyword) > 5 ? $b->keyword : $b->title;

        // ini untuk preview share disosial media
        $this->data["og"] =[
            [
                "property" => "og:site_name",
                "content" => "Pemerintahan Desa di Kabupaten Banyuwangi"
            ],

            [
                "property"  => "og:type",
                "content" => "article"
            ],

            [
                "property"  => "og:title",
                "content" => $b->title
            ],

            [
                "property"  => "og:description",
                "content" => strlen($b->desc) < 10 ? $b->title : $b->desc
            ],

            [
                "property"  => "og:url",
                "content" => route('berita') . '/' . $b->slug
            ],

            [
                "property"  => "og:image",
                "content" => $b->img_thumb != '' || $b->img_thumb != null? $this->data['base_link_media_thumbnail'].$b->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png')
            ],

            [
                "property"  => "og:locale",
                "content" => "id_ID"
            ]
        ] ;



        $this->data["twitter"] =[

            [
                "name" => "twitter:card",
                "content" => "summary_large_image"
            ],

            [
                "name" => "twitter:domain",
                "content" => route('berita') . '/' . $b->slug
            ],


            [
                "name" => "twitter:title",
                "content" => $b->title
            ],


            [
                "name" => "twitter:description",
                "content" => strlen($b->desc) < 10 ? $b->title : $b->desc
            ],

            [
                "name" => "twitter:image",
                "content" => $b->img_thumb != '' || $b->img_thumb != null? $this->data['base_link_media_thumbnail'].$b->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png')
            ],

        ] ;




        $this->data["pageTitle"] = $b->title ." | Halaman Desa";
        $this->data["keywords"] = strlen($b->keyword) > 3 ? $b->keyword : $b->title;
        $this->data["description"] = strlen($b->desc) < 10 ? $b->title : $b->desc;

        $data = $this->data;


        return view($this->nmPart . "halamanDetail", $data);
    }


}
