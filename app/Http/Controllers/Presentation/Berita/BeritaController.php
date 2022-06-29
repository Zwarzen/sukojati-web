<?php

namespace App\Http\Controllers\Presentation\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Admin\Berita;
use App\Models\Admin\Opd;
use App\Models\Admin\KanalBerita;
use Auth;
use DB;



class BeritaController extends Controller
{
    public $nmPart = "presentation.module.berita.";
    public $data  = [];
    public $uriModul  = "/berita";
    public $gzClient;
    public $opd;


    public  function __construct(Request $request, Berita $berita, KanalBerita $kanalBerita, Opd $opd)
    {
        $this->gzClient = new Client(['verify' => false]);
        $this->opd = $opd;


        $opd = $this->getOpdAvailabe();




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
        $this->data['base_link_media_thumbnail'] = asset('media/berita/thumbnail/')."/";
        $this->data['base_link_media_raw'] = asset('media/berita/original/')."/";
        $this->data['type_news'] = "text";
        // dd($this->data['base_link_media_thumbnail']);
        // dd($this->data['base_link_media_raw']);
        $this->data['beritaMainKategori'] = $kanalBerita->getMainKanalBeritaByUnorOPd( $opd->kd_unor );
    }

    public function index(Berita $berita, KanalBerita $kanalBerita)
    {


        $this->data['latestBerita'] = $berita->latest(3);
        $this->data['ngetrenBerita'] = $berita->trending(3);
        $this->data['latestBeritaVideo'] =$berita->latestBeritaVideo();

        $opd = $this->getOpdAvailabe();
        // dd($opd);

        $getKat = $kanalBerita->getMainKanalBeritaByUnorOPd( $opd->kd_unor );


        $datas = array();

        foreach ($getKat as $row1) {

            $current_sql_date = date('Y-m-d H:i:s',  strtotime( date( "Y-m-d H:i:s", strtotime( date("Y-m-d H:i:s") ) ) . "-1 month" ));


            $getGaleriPopuler = $berita::where([['unor', '=', $opd->kd_unor],['berita_kanal_id', '=', $row1->id],['published', '=', 'yes'], ["created_at",">", "$current_sql_date"] ])->orderBy('hit','DESC')->limit(3)->get();
            $getGaleriTerbaru = $berita::where([['unor', '=', $opd->kd_unor],['berita_kanal_id', '=', $row1->id],['published', '=', 'yes']])->orderBy('created_at','DESC')->limit(3)->get();

            $datas[$row1->id]['title'] = $row1->name;
            $datas[$row1->id]['kanal_slug'] = $row1->kanal_slug;
            $datas[$row1->id]['pinned']['id'] = $row1->id_berita;
            $datas[$row1->id]['pinned']['title'] = $row1->title;
            $datas[$row1->id]['pinned']['img_thumb'] = $row1->img_thumb;
            $datas[$row1->id]['pinned']['img_raw'] = $row1->img_raw;
            $datas[$row1->id]['pinned']['slug'] = $row1->slug;
            $datas[$row1->id]['pinned']['desc'] = $row1->desc;
            $datas[$row1->id]['pinned']['publish_date'] = $row1->publish_date;
            $datas[$row1->id]['pinned']['created_at'] = $row1->created_at;
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
                $datas[$row1->id]['populer'][$row2->id]['created_at'] = $row2->created_at;
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
                $datas[$row1->id]['terbaru'][$row2->id]['created_at'] = $row2->created_at;
            }
        }

        $this->data['beritaPartsKategori'] =  $datas;


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


        $data = $this->data;

        return view($this->nmPart . "beritaIndex", $data);
    }

    public function detail(Berita $berita,$slug)
    {


        $v = explode(".html",$slug);


        if(count($v)>1){
            $slug = $v[0];
        }


        $b = $berita::where("slug","=",$slug)->first();

        if(!$b){
            return redirect()->route('search',["q"=>$slug]);
        }

        if($b->published == "no"){
            return redirect()->route('search',["q"=>$slug]);
        }


        $hit = $b->hit+1;
        $b->update(["hit" => $hit]);

        $this->data['ngetrenBerita'] = $berita->trending(4);

        $this->data['beritaDetail'] = $b;
        $keywordRelated = strlen($b->keyword) > 5 ? $b->keyword : $b->title;
        $this->data['beritaRelated'] = $berita->related(4, $keywordRelated, $b->berita_kanal_id );
        if(count($this->data['beritaRelated']) == 0){
            $this->data['beritaRelated'] = $berita->latest(4);
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


        return view($this->nmPart . "beritaDetail", $data);
    }


    public function kanal(KanalBerita $kanalBerita, Berita $berita, $slug){


        $data = $this->data;


        $str =  trim(str_replace(["'",'"'],'', str_replace("'",'',filter_var ( $slug, FILTER_SANITIZE_STRING))));

        $kanal = $kanalBerita::where("slug","=", $str)->first();


        if($kanal){
            $data['pageTitle'] = "Berita kanal $kanal->name";
            $data['latestBerita'] = $berita->latestBykanal(3,$kanal->id);
            $data['ngetrenBerita'] = $berita->trendingBykanal(3,$kanal->id);

            $option = [["published","=","yes"],["berita_kanal_id","=",$kanal->id]];
            $data['listBeritaKanal'] = $berita->where($option)->paginate(5);
            $data['kanal'] = $kanal;

            return view($this->nmPart . "kanal.beritaKanalIndex", $data);
        }else{
            return redirect()->route('search',["q"=>$slug]);
        }

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
