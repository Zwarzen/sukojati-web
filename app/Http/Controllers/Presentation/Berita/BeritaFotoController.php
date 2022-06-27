<?php

namespace App\Http\Controllers\Presentation\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Admin\Berita;
use App\Models\Admin\BeritaFoto;
use App\Models\Admin\BeritaFotoItem;
use App\Models\Admin\KanalBerita;
use Auth;

class BeritaFotoController extends Controller
{
    public $nmPart = "presentation.module.berita.beritafoto.";
    public $data  = [];
    public $uriModul  = "/berita";
    public $gzClient;
    public $berita;
    public $beritaFotoItem;
    public $kanal;


    public  function __construct(Request $request, BeritaFoto $beritaFoto, BeritaFotoItem $beritaFotoItem, KanalBerita $kanalBerita)
    {
        $this->gzClient = new Client(['verify' => false]);
        $this->beritaFotoItem = $beritaFotoItem;
        $this->kanal = $kanalBerita;
        $this->berita = $beritaFoto;

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
        $this->data['pageTitle'] = "Berita Banyuwangi";



        //opsi ini diisi dengan judul halaman yang sesuai 
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya
        $this->data['keywords'] = "Berita banyuwangi, berita, musik, tarian, cerita";

        //opsi ini diisi dengan judul halaman yang sesuai 
        $this->data['description'] = "Website resmi Banyuwangi adalah portal informasi resmi kabupaten pemerintah banyuwangi";


        //opsi ini diisi dengan menu item yang sesuai dengan modul
        // bisa dari database atau diisi manual
        // dipisahkan dengan koma contohnya :: 
        // website banyuwangi, banyuwangi, dan setserunya

        $this->uriModul  = "/budaya/berita";
        $this->data['base_link_media_thumbnail'] = asset('media/beritafoto/thumbnail/')."/";
        $this->data['base_link_media_raw'] = asset('media/beritafoto/original/')."/";
        $this->data['type_news'] = "foto";


        $this->data['beritaMainKategori'] = $kanalBerita->getMainKanalBeritaFoto();
    }


    public function foto()
    {

        
        $this->data['latestBerita'] = $this->berita->latest(3)->get();
        $this->data['ngetrenBeritaFoto'] =  $this->berita->trending(3);
        $this->data['latestBeritaVideo'] =$this->berita->latestBeritaVideo();

        $getKat = $this->kanal->getMainKanalBeritaFoto();


        
        $datas = array();

        
        foreach ($getKat as $row1) {
            
            $getBeritaFotoTerpopuler = $this->berita->populerByKanal(3, $row1->id );
            $getBeritaFotoTerbaru = $this->berita->terbaruByKanal(3, $row1->id );
            
            $datas[$row1->id]['title'] = $row1->name;
            $datas[$row1->id]['kanal_slug'] = $row1->kanal_slug;
            $datas[$row1->id]['pinned']['id'] = $row1->id_berita;
            $datas[$row1->id]['pinned']['title'] = $row1->title;
            $datas[$row1->id]['pinned']['img_thumb'] = $row1->img_thumb;
            $datas[$row1->id]['pinned']['img_raw'] = $row1->img_raw;
            $datas[$row1->id]['pinned']['slug'] = $row1->slug;
            $datas[$row1->id]['pinned']['desc'] = $row1->desc;
            $datas[$row1->id]['pinned']['created_at'] = $row1->created_at;
            $datas[$row1->id]['pinned']['publish_date'] = $row1->publish_date; 
            $datas[$row1->id]['pinned']['jml_fotos'] = $row1->jml_fotos;  
            $datas[$row1->id]['pinned']['img_thumb_nya'] = $row1->img_thumb_nya;  
            $datas[$row1->id]['pinned']['img_raw_nya'] = $row1->img_raw_nya;  
            $datas[$row1->id]['pinned']['hit'] = $row1->hit;

            foreach ($getBeritaFotoTerpopuler as $row2) {
                $datas[$row1->id]['populer'][$row2->id]['id'] = $row2->id;
                $datas[$row1->id]['populer'][$row2->id]['title'] = $row2->title;
                $datas[$row1->id]['populer'][$row2->id]['img_thumb'] = $row2->img_thumb;
                $datas[$row1->id]['populer'][$row2->id]['img_thumb_nya'] = $row2->img_thumb_nya;
                $datas[$row1->id]['populer'][$row2->id]['img_raw'] = $row2->img_raw;
                $datas[$row1->id]['populer'][$row2->id]['slug'] = $row2->slug;
                $datas[$row1->id]['populer'][$row2->id]['desc'] = $row2->desc;
                $datas[$row1->id]['populer'][$row2->id]['publish_date'] = $row2->publish_date;
                $datas[$row1->id]['populer'][$row2->id]['created_at'] = $row2->created_at;
                $datas[$row1->id]['populer'][$row2->id]['hit'] = $row2->hit;
                // $datas[$row1->id]['populer'][$row2->id]['id'] = $row2->id;
            }

            foreach ($getBeritaFotoTerbaru as $row2) {
                $datas[$row1->id]['terbaru'][$row2->id]['id'] = $row2->id;
                $datas[$row1->id]['terbaru'][$row2->id]['title'] = $row2->title;
                $datas[$row1->id]['terbaru'][$row2->id]['img_thumb'] = $row2->img_thumb;
                $datas[$row1->id]['terbaru'][$row2->id]['img_thumb_nya'] = $row2->img_thumb_nya;
                $datas[$row1->id]['terbaru'][$row2->id]['img_raw'] = $row2->img_raw;
                $datas[$row1->id]['terbaru'][$row2->id]['slug'] = $row2->slug;
                $datas[$row1->id]['terbaru'][$row2->id]['desc'] = $row2->desc;
                $datas[$row1->id]['populer'][$row2->id]['publish_date'] = $row2->publish_date;
                $datas[$row1->id]['terbaru'][$row2->id]['created_at'] = $row2->created_at;
                $datas[$row1->id]['terbaru'][$row2->id]['hit'] = $row2->hit;
            }
        }

        $this->data['beritaPartsKategori'] =  $datas;
        
        $data = $this->data;

        return view($this->nmPart . "beritaFotoIndex", $this->data);
    }


    function fotoDetail($slug){
        $v = explode(".html",$slug);


        if(count($v)>1){
            $slug = $v[0];
        }
        

        $b = $this->berita::where("slug","=",$slug)->first();
        
        if(!$b){
            return redirect()->route('search',["q"=>$slug]);
        }


        
        $hit = $b->hit+1;
        $b->update(["hit" => $hit]);

        $this->data['berita'] = $b;
        $this->data['fotos'] = $this->beritaFotoItem->list(["beritafotos_id" ,"=",$b->id]);
        $this->data['ngetrenBeritaFoto'] =  $this->berita->trending(3);
        
        $this->data['beritaDetail'] = $b;
        $keywordRelated = strlen($b->keyword) > 5 ? $b->keyword : $b->title;
        $this->data['beritaRelated'] = $this->berita->related(4, $keywordRelated, $b->berita_kanal_id );
        if(count($this->data['beritaRelated']) == 0){
            $this->data['beritaRelated'] = $this->berita->latest(4);
        }


        // <meta property="og:type" content="article" />
        // <meta property="og:title" content="Cara Menggunakan Open Graph Meta Tag" />
        // <meta property="og:description" content="Open Graph Meta Tag atau OG Tags merupakan sebuah tag html khusus yang bertujuan agar social media mengenali sebuah page di website." />
        // <meta property="og:url" content="https://www.metropolution.com/marketips/open-graph-atau-og-meta-tag/" />
        // <meta property="og:image" content="https://www.metropolution.com/wp-content/uploads/2020/01/cara-membuat-open-graph-meta-tag.jpg" />



        // ini untuk preview share disosial media 
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




        $this->data["pageTitle"] = $b->title ." | Berita Banyuwangi ";
        $this->data["keywords"] = strlen($b->keyword) > 3 ? $b->keyword : $b->title;
        $this->data["description"] = strlen($b->desc) < 10 ? $b->title : $b->desc;

        $data = $this->data;


        return view($this->nmPart . "beritaFotoDetail", $data);
    }

    public function kanal(KanalBerita $kanalBerita, Berita $berita, $slug){

        
        $data = $this->data;


        $str =  trim(str_replace(["'",'"'],'', str_replace("'",'',filter_var ( $slug, FILTER_SANITIZE_STRING))));
        
        $kanal = $kanalBerita::where("slug","=", $str)->first();

      
        if($kanal){
            $data['pageTitle'] = "Berita kanal $kanal->name";
            $data['latestBerita'] = $this->berita->terbaruByKanal(3,$kanal->id);
            $data['ngetrenBerita'] = $this->berita->populerByKanal(3,$kanal->id);

            $option = [["published","=","yes"],["berita_kanal_id","=",$kanal->id]];
            $data['listBeritaKanal'] = $this->berita->where($option)->paginate(5);
            $data['kanal'] = $kanal;

            return view($this->nmPart . "kanal.beritaFotoKanalIndex", $data);
        }else{
            return redirect()->route('search',["q"=>$slug]);
        }
        
    }

}
