<?php

namespace App\Http\Controllers\Presentation\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Admin\Berita;
use App\Models\Admin\KanalBerita;

class BeritaVideoController extends Controller
{
    public $nmPart = "presentation.module.berita.video.";
    public $data  = [];
    public $uriModul  = "/berita/video";
    public $gzClient;

    public  function __construct(Request $request, Berita $berita, KanalBerita $kanalBerita)
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
        $this->data['type_news'] = "video";

      

        $this->data['beritaVideoMainKategori'] = $kanalBerita->getMainKanalBeritaVideo();


    }

    public function index()
    {

        $this->data['newsChannelFirts'] = [
            [
                "title" => "Putri Tanjung dan Bos-Bos Startup ke Banyuwangi, Tebar Inspirasi ke Anak-Anak Muda",
                "slug" => "putri-tanjung-dan-bos-bos-startup-ke-banyuwangi-tebar-inspirasi-ke-anak-anak-muda",
                "shortdesc" => "BANYUWANGI – Staf Khusus Presiden Joko Widodo, Putri Tanjung, bersama sejumlah bos berbagai bisnis rintisan (startup) tersohor mengunjungi Banyuwangi selama Sabtu-Minggu (20-21/11/2021). Bersama Bupati Banyuwangi Ipuk Fiestiandani, mereka bertemu dengan anak-anak muda setempat untuk berbagi inspirasi dan pengalaman mengembangkan bisnis.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/cbbbe17627c98e09b9f120006f625315.jpg',
                "kanal-name" => "olahraga",
                "publish-date" => '2021-09-03 20:21:22'
            ],
            [
                "title" => "HUT TNI ke-76, Bupati Banyuwangi: Sejarah TNI adalah Sejarah Pengabdian kepada Negeri",
                "slug" => "hut-tni-ke-76-bupati-banyuwangi-sejarah-tni-adalah-sejarah-pengabdian-kepada-negeri.html",
                "shortdesc" => "BANYUWANGI - Bupati Banyuwangi Ipuk Fiestiandani mengapresiasi berbagai peran dan kiprah TNI dalam pengembangan daerah, termasuk dalam menghadapi tantangan pandemi Covid-19.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg',
                "kanal-name" => "kesehatan",
                "publish-date" => '2021-09-03 20:21:22'
            ],
            [
                "title" => "HUT TNI ke-76, Bupati Banyuwangi: Sejarah TNI adalah Sejarah Pengabdian kepada Negeri",
                "slug" => "hut-tni-ke-76-bupati-banyuwangi-sejarah-tni-adalah-sejarah-pengabdian-kepada-negeri.html",
                "shortdesc" => "BANYUWANGI - Bupati Banyuwangi Ipuk Fiestiandani mengapresiasi berbagai peran dan kiprah TNI dalam pengembangan daerah, termasuk dalam menghadapi tantangan pandemi Covid-19.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/9a3b5bba01ee97e9d16622e15771ddd3.jpg',
                "kanal-name" => "wisata",
                "publish-date" => '2021-09-03 20:21:22'
            ],
            [
                "title" => "HUT TNI ke-76, Bupati Banyuwangi: Sejarah TNI adalah Sejarah Pengabdian kepada Negeri",
                "slug" => "hut-tni-ke-76-bupati-banyuwangi-sejarah-tni-adalah-sejarah-pengabdian-kepada-negeri.html",
                "shortdesc" => "BANYUWANGI - Bupati Banyuwangi Ipuk Fiestiandani mengapresiasi berbagai peran dan kiprah TNI dalam pengembangan daerah, termasuk dalam menghadapi tantangan pandemi Covid-19.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/9a3b5bba01ee97e9d16622e15771ddd3.jpg',
                "kanal-name" => "wisata",
                "publish-date" => '2021-09-03 20:21:22'
            ],
            [
                "title" => "HUT TNI ke-76, Bupati Banyuwangi: Sejarah TNI adalah Sejarah Pengabdian kepada Negeri",
                "slug" => "hut-tni-ke-76-bupati-banyuwangi-sejarah-tni-adalah-sejarah-pengabdian-kepada-negeri.html",
                "shortdesc" => "BANYUWANGI - Bupati Banyuwangi Ipuk Fiestiandani mengapresiasi berbagai peran dan kiprah TNI dalam pengembangan daerah, termasuk dalam menghadapi tantangan pandemi Covid-19.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/9a3b5bba01ee97e9d16622e15771ddd3.jpg',
                "kanal-name" => "wisata",
                "publish-date" => '2021-09-03 20:21:22'
            ],

        ];

        $this->data['newsHots'] = [
            [
                "title" => "Putri Tanjung dan Bos-Bos Startup ke Banyuwangi, Tebar Inspirasi ke Anak-Anak Muda",
                "slug" => "putri-tanjung-dan-bos-bos-startup-ke-banyuwangi-tebar-inspirasi-ke-anak-anak-muda",
                "shortdesc" => "BANYUWANGI – Staf Khusus Presiden Joko Widodo, Putri Tanjung, bersama sejumlah bos berbagai bisnis rintisan (startup) tersohor mengunjungi Banyuwangi selama Sabtu-Minggu (20-21/11/2021). Bersama Bupati Banyuwangi Ipuk Fiestiandani, mereka bertemu dengan anak-anak muda setempat untuk berbagi inspirasi dan pengalaman mengembangkan bisnis.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/cbbbe17627c98e09b9f120006f625315.jpg',
                "kanal-name" => "News",
                "publish-date" => '2021-09-03 20:21:22'
            ],

        ];

        $this->data['newsHotsTerkait'] = [

            [
                "title" => "HUT TNI ke-76, Bupati Banyuwangi: Sejarah TNI adalah Sejarah Pengabdian kepada Negeri",
                "slug" => "hut-tni-ke-76-bupati-banyuwangi-sejarah-tni-adalah-sejarah-pengabdian-kepada-negeri.html",
                "shortdesc" => "BANYUWANGI - Bupati Banyuwangi Ipuk Fiestiandani mengapresiasi berbagai peran dan kiprah TNI dalam pengembangan daerah, termasuk dalam menghadapi tantangan pandemi Covid-19.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg',
                "kanal-name" => "News",
                "publish-date" => '2021-09-03 20:21:22'
            ],
            [
                "title" => "HUT TNI ke-76, Bupati Banyuwangi: Sejarah TNI adalah Sejarah Pengabdian kepada Negeri",
                "slug" => "hut-tni-ke-76-bupati-banyuwangi-sejarah-tni-adalah-sejarah-pengabdian-kepada-negeri.html",
                "shortdesc" => "BANYUWANGI - Bupati Banyuwangi Ipuk Fiestiandani mengapresiasi berbagai peran dan kiprah TNI dalam pengembangan daerah, termasuk dalam menghadapi tantangan pandemi Covid-19.",
                "poster" => 'https://banyuwangikab.go.id/media/berita/images/9a3b5bba01ee97e9d16622e15771ddd3.jpg',
                "kanal-name" => "News",
                "publish-date" => '2021-09-03 20:21:22'
            ]
        ];

        $this->data['urlWallpaper'] =  null;

        

        $data = $this->data;

        // ini untuk preview share disosial media 
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


        return view($this->nmPart . "beritaIndex", $data);
    }

    public function videoDetail(Berita $berita, $slug)
    {

        $video = $berita::where("slug",$slug)->first();
        $data = $this->data;
        $data['video'] = $video;
        $data['ngetrenBeritaVideo'] = $berita->trendingVideo(4);

        $keywordRelated = strlen($video->keyword) > 5 ? $video->keyword : $video->title;
        $data['beritaRelated'] = $berita->relatedVideo(4, $keywordRelated, $video->berita_kanal_id );

        if(count($data['beritaRelated']) == 0){
            $data['beritaRelated'] = $berita->latestVideo(4);
        }


        // ini untuk preview share disosial media 
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
                "content" => $video->title
            ],

            [
                "property"  => "og:description",
                "content" => strlen($video->desc) < 10 ? $video->title : $video->desc
            ],

            [
                "property"  => "og:url",
                "content" => route('berita.video') . '/' . $video->slug
            ],

            [
                "property"  => "og:image",
                "content" => $video->img_thumb != '' || $video->img_thumb != null? $this->data['base_link_media_thumbnail'].$video->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png')
            ]
        ] ;


        $data["twitter"] =[

            [
                "name" => "twitter:card",
                "content" => "summary_large_image"
            ],

            [
                "name" => "twitter:domain",
                "content" => route('berita') . '/' . $video->slug
            ],


            [
                "name" => "twitter:title",
                "content" => $video->title
            ],


            [
                "name" => "twitter:description",
                "content" => strlen($video->desc) < 10 ? $video->title : $video->desc
            ],

            [
                "name" => "twitter:image",
                "content" => $video->img_thumb != '' || $video->img_thumb != null? $this->data['base_link_media_thumbnail'].$video->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png')
            ],

        ] ;


        $data["pageTitle"] = $video->title ." | Berita Banyuwangi ";
        $data["keywords"] = strlen($video->keyword) > 3 ? $video->keyword : $video->title;
        $data["description"] = strlen($video->desc) < 10 ? $video->title : $video->desc;

        return view($this->nmPart . "beritaVideoDetail", $data);
    }

    public function video(Berita $berita, KanalBerita $kanalBerita)
    {

        
        $this->data['latestBeritaVideo'] = $berita->latestBeritaVideo(3);
        $this->data['ngetrenBeritaVideo'] = $berita->trendingVideo(4);
        $this->data['latestBerita'] =$berita->latest();

        $getKat = $kanalBerita->getMainKanalBeritaVideo();

        
        $datas = array();



        foreach ($getKat as $row1) {
            $getBeritaVideoPopuler = $berita::where([["is_berita_video","=","yes"],['berita_kanal_id', '=', $row1->id],['published', '=', 'yes']])->orderBy('hit','DESC')->limit(3)->get();
            $getBeritaVideoTerbaru = $berita::where([["is_berita_video","=","yes"],['berita_kanal_id', '=', $row1->id],['published', '=', 'yes']])->orderBy('publish_date','DESC')->limit(3)->get();


            
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
            foreach ($getBeritaVideoPopuler as $row2) {
                $datas[$row1->id]['populer'][$row2->id]['id'] = $row2->id;
                $datas[$row1->id]['populer'][$row2->id]['title'] = $row2->title;
                $datas[$row1->id]['populer'][$row2->id]['img_thumb'] = $row2->img_thumb;
                $datas[$row1->id]['populer'][$row2->id]['img_raw'] = $row2->img_raw;
                $datas[$row1->id]['populer'][$row2->id]['slug'] = $row2->slug;
                $datas[$row1->id]['populer'][$row2->id]['desc'] = $row2->desc;
                $datas[$row1->id]['populer'][$row2->id]['publish_date'] = $row2->publish_date;
                $datas[$row1->id]['populer'][$row2->id]['created_at'] = $row2->created_at;
                $datas[$row1->id]['populer'][$row2->id]['hit'] = $row2->hit;
                // $datas[$row1->id]['populer'][$row2->id]['id'] = $row2->id;
            }
            foreach ($getBeritaVideoTerbaru as $row2) {
                $datas[$row1->id]['terbaru'][$row2->id]['id'] = $row2->id;
                $datas[$row1->id]['terbaru'][$row2->id]['title'] = $row2->title;
                $datas[$row1->id]['terbaru'][$row2->id]['img_thumb'] = $row2->img_thumb;
                $datas[$row1->id]['terbaru'][$row2->id]['img_raw'] = $row2->img_raw;
                $datas[$row1->id]['terbaru'][$row2->id]['slug'] = $row2->slug;
                $datas[$row1->id]['terbaru'][$row2->id]['desc'] = $row2->desc;
                $datas[$row1->id]['terbaru'][$row2->id]['created_at'] = $row2->created_at;
                $datas[$row1->id]['terbaru'][$row2->id]['hit'] = $row2->hit;
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

       
        return view($this->nmPart . "beritaVideoIndex", $data);
    }


    public function kanal(KanalBerita $kanalBerita, Berita $berita, $slug){

        
        $data = $this->data;


        $str =  trim(str_replace(["'",'"'],'', str_replace("'",'',filter_var ( $slug, FILTER_SANITIZE_STRING))));
        
        $kanal = $kanalBerita::where("slug","=", $str)->first();

      
        if($kanal){
            $data['pageTitle'] = "Berita kanal $kanal->name";
            $data['latestBerita'] = $berita->latestBykanal(3,$kanal->id);
            $data['ngetrenBerita'] = $berita->trendingBykanal(4,$kanal->id);

            $option = [["published","=","yes"],["berita_kanal_id","=",$kanal->id]];
            $data['listBeritaKanal'] = $berita->where($option)->paginate(5);
            $data['kanal'] = $kanal;

            return view($this->nmPart . "kanal.beritaVideoKanalIndex", $data);
        }else{
            return redirect()->route('search',["q"=>$slug]);
        }
        
    }
}
