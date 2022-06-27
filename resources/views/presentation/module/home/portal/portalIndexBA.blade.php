@extends('presentation.layouts.mainPortalContent')


@section('navigation')
    @include('presentation.module.home.portal.navPortal')
    @include('presentation.module.home.portal.navSearch')
    @include('presentation.module.home.portal.navMenu')
    @include('presentation.module.home.portal.navBasedModal')
@endsection

@section('top1')
    {{-- <div id="based-div-1" class="based-div-1"></div>
    <div class="screen-overlay"></div> --}}
    {{-- <div id="based-div-2" 
    class="based-div-2"></div> --}}

@endsection


@section('pageContent')



    <div id="ctn-utama" class="based-div-1">
        <div style="
                    background:linear-gradient(10deg, #ffffff 1%,  #ffffff, #ffffff); 
                    opacity:0.8; content:'';  
                    position:absolute; top:0; bottom:0px; left:0px; right:0px; width:100%; ">
        </div>


        {{-- bottom tools --}}

        <div id="main-content"
            style="opacity: 1; z-index:1; position: relative; max-height:100vh; overflow-y:auto; overflow-x:hidden;"
            class="scroller">

            <div id="p-1"
                style="max-width:100vw !important; height:100vh; overflow-x:hidden;  background: linear-gradient(to top, #ffffff 1%,#ffffff60,#ffffff00)">

                <!-- Button trigger modal -->


                <style>
                    .apcr-top-wrp {
                        display: inline-block;
                        width: 100%;
                        padding: 10px;
                    }

                    .apcr-top-wrp>.left {
                        float: left;
                        margin-right: 5px;
                    }

                    .apcr-top-wrp>.right {
                        float: right;
                        margin-left: 5px;
                    }

                    .apcr-top-item {
                        height: 2rem
                    }

                    @media all and (max-width:600px) {
                        .apcr-top-item {
                            height: 1.2rem;

                        }
                    }

                </style>
                <div class="apcr-top-wrp">
                    {{-- <img class="apcr-top-item left"
                        src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" alt=""> --}}

                    <img class="apcr-top-item right" src="{{ asset('presentation/b-asset/img/ijen_geopark_small.png') }}"
                        alt="">



                    <img class="apcr-top-item left" src="{{ asset('presentation/b-asset/img/bfest-logo.png') }}" alt="">
                    <img class="apcr-top-item left"  style="background:#7a7a7a; padding:2px;" src="{{ asset('presentation/b-asset/img/img-bwirebound.png') }}" alt="">



                </div>

                <div style="min-height: 15vh"></div>
                <div class="typewriter title-text-single coloring-text-logo">
                    <span class="b">b</span>anyuwangi
                </div>

                <div class="typewriter tag-line-single">
                    Makin Digital, Makin Sehat, Makin Kreatif
                </div>

                <div style="height: 2vh"></div>

                {{-- <div class="tag-line-desc">
                    Digitalisasi menghasilkan produk layanan terbaik bagi masyarakat sampai
                    terciptanya masyarakat sehat dan kuat, sehingga tumbuh jiwa-jiwa Kreatif tumpuan masa depan. <strong>( B
                        E T A )</strong>
                </div> --}}

                <style>
                    .tagline-home-2 {
                        text-align: center;
                        font-family: 'Fauna One';
                        font-size: 0.9rem
                    }

                    .search-container-inner {
                        padding: 1rem 10% 1rem 10%;
                        margin: auto;
                        cursor: pointer;

                    }

                    @media all and (max-width:600px) {
                        #search-container-p1 {
                            margin-top: 100px;
                            margin-bottom: -50px;
                        }

                        .tagline-home-2 {
                            font-size: 0.7rem;
                        }

                        .search-container-inner {
                            padding: 1rem 10% 1rem 10%;

                        }
                    }

                </style>

                <div style="search-container" id="search-container-p1">
                    {{-- <div style="width: 100%; text-align:center">
                        <h5 style="text-align:center; margin:auto;">Cari info menarik</h5>
                    </div> --}}
                    <div class="search-container-inner">
                        <div style="padding:1rem; margin:auto">
                            <form action="{{ route('search') }}" 
                                id="id-search-form"
                                method="get" 
                                style="color:inherit; margin:auto; align-self:center auto;"
                                class="form-inline search-form">
                               
                                <input id="search-input-form"
                                    name="q" 
                                    class="form-control search-input-form" 
                                    type="text" 
                                    placeholder="Cari info menarik ">

                                    <i class="fa fa-search" onclick="submitSearch(event)" 
                                    style="cursor:pointer; color:#0b96e6"
                                    aria-hidden="true"></i>

                                <i style="clear:both"></i>

                                {{-- @csrf --}}
                                
                            </form>

                            {{-- <div class="tagline-home-2">"Telusuri Banyuwangi, Anda pasti ingin kembali "</div> --}}

                        </div>
                    </div>
                </div>


                <div style="height: 5vh;"></div>

                <div id="toolbar-p-1" class="">
                    @include('presentation.part.toolbarMain')
                </div>


                <div style="height:4rem;"></div>

                <div style="text-align: center">
                    {{-- <a class="btn-jelajah" id="btn-jelajah" href="{{ url('/#p-2') }}" onclick="document.getElementById('p-2').scrollIntoView({'behavior': 'smooth'});return false;">
                        <i class="fas fa-compass fa-spin"></i> Jelajahi
                    </a> --}}



                    <style>
                        .blink_me {
                            animation: blinker 1s linear infinite;
                        }

                        @keyframes blinker {
                            50% {
                                opacity: 0;
                            }
                        }

                    </style>

                    <button type="button" class="btn">
                        <a class="blink_me" style="margin:auto; color:#ffffff; font-size:2rem;" id="btn-jelajah"
                            href="{{ url('/#p-2') }}"
                            onclick="document.getElementById('p-2').scrollIntoView({'behavior': 'smooth'});return false;">
                            <i style="color: #000000 !important" class="fas fa-chevron-down"></i>
                        </a>
                    </button>



                </div>

                <div style="min-height: 10vh"></div>


            </div>





            <div id="p-2" class="" style="scroll-behavior: smooth; min-height: 100vh; padding-top:50px">
                <div id="p-2-inner">

                    <style>
                        .banner-top-item {
                            height: 30rem;
                            align-items: bottom start;
                            align-content: bottom start;
                            text-align: left;
                            -webkit-background-size: cover !important;
                            -moz-background-size: cover !important;
                            -o-background-size: cover !important;
                            background-size: cover !important;
                            background-position: center center !important;
                            background-repeat: no-repeat !important;
                        }

                        .bti-content {
                            background: linear-gradient(to top, rgba(31, 30, 30, 0.356), rgba(61, 61, 61, 0.116));
                            color: #ffffff;
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            padding: 1rem;
                            text-align: left;
                            width: 100%;
                            height: 100%;
                        }

                        .bti-title {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            padding: 1rem;
                            color: #ffffff;
                            letter-spacing: 2px;
                            font-size: 2.5rem;
                            text-align: right;
                            right: 0px;

                            /* font-family: 'Fauna One', sans-serif; */
                        }


                        .sub-bti-title {
                            font-size: 1rem;

                            /* font-family: 'Fauna One', sans-serif; */
                        }


                        @media all and (max-width:600px) {
                            .banner-top-item {
                                height: 15rem;
                            }
                        }

                    </style>

                    @php
                        $topBanners = [
                            [
                                'title' => 'Kuliner',
                                'linkTo' => '#',
                                'imgSrc' => asset('presentation/b-asset/img/food_tempong.jpg'),
                                'textDesc' => 'Informasi singkat Kuliner',
                            ],
                        
                            [
                                'title' => 'Festival',
                                'linkTo' => '#',
                                'imgSrc' => asset('presentation/b-asset/img/bg-festival.png'),
                                'textDesc' => 'Informasi singkat Festival',
                            ],
                        
                            [
                                'title' => 'Wisata',
                                'linkTo' => '#',
                                'imgSrc' => asset('presentation/b-asset/img/pulau_merah.jpg'),
                                'textDesc' => 'Informasi singkat Wisata',
                            ],
                        ];
                        
                    @endphp


                    {{-- <div class="owl-carousel owl-theme" id="dt-banner-top-pp-2" style="background:transparent">


                        @foreach ($topBanners as $item => $val)
                            <a href="">
                                <div class="banner-top-item" style="
                                                            background:url('{{ $val['imgSrc'] }}');
                                                            ">
                                    <div class="bti-content">
                                        <div class="bti-title">
                                            <div>
                                                {{ $val['title'] }}
                                            </div>
                                            <div class="sub-bti-title">{{ $val['textDesc'] }} </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div> --}}

                    <div class="divider-for-md"></div>

                    <div class="container">


                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="">

                                    
                                    @php 
                                    $img = $corona['infografis']->grafis->file_grafis;
                                    $vaksinasi = $corona['vaksinasi'];
                                    @endphp

                                    <a target="_blank" href="https://corona.banyuwangikab.go.id/">
                                        <div {{-- box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); --}}
                                            style="display: flex; flex-direction:row; padding:0.5rem;  background: #ffffff5b; opacity:0.9; border-radius:15px;">
                                            <div
                                                style="height: 7rem; width:7rem; border-radius:1rem;   
                                                    background-image: url('https://corona.banyuwangikab.go.id/public/media/infografis/{{ $img }}');
                                                    background-size:100% 100%;
                                                    background-position:center center; ">
                                            </div>
                                            <div style="flex:1; padding-left:1rem;">
                                                <div style="text-align: left; font-size:1rem">
                                                    <strong>Vaksinasi</strong>
                                                </div>

                                                @foreach ($vaksinasi->data as $k => $v)

                                                    @php 
                                                    if( strpos(strtolower($v->VAKSINASI),"dosis 3")){
                                                        $percent = number_format( ($v->jumlah/$vaksinasi->sasaran->sdmk)*100 ,0)."%";
                                                    }else{
                                                        $percent = number_format( ($v->jumlah/$vaksinasi->sasaran->total)*100 ,0)."%";
                                                    }
                                                     
                                                    @endphp


                                                    <div style="text-align: left; font-size:0.8rem">
                                                        
                                                         {{ $v->VAKSINASI }} => {{ $percent }}
                                                    </div>
                                                    <div
                                                        style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                                                        <div
                                                            style="width: {{ $percent }}; height:0.6rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem">
                                                        </div>
                                                    </div>
                                                    <div style="height: 0.5rem"></div>
                                                @endforeach
                                                

                                                <div style="height: 0.5rem"></div>


                                            </div>
                                        </div>
                                    </a>

                                  

                                    <div class="divider-for-md"></div>

                                    {{-- <div class="btn-right"><i style="margin: auto; vertical-align:middle"
                                        class="fas fa-chevron-down"></i></div> --}}

                                </div>

                                <div style="height: 1rem"></div>
                            </div>

                            <div class="col-lg-12 col-md-12">

                                <style>
                                    .md-nlstmenu-wrp {
                                        display: flex;
                                        flex-direction: row;
                                        width: 100%;
                                    }

                                    .pills {
                                        text-align: center;
                                        margin: 5px;
                                        border-radius: 10px;
                                        background: #f8f8f8;
                                        padding: 5px 15px 5px 15px;
                                        color: #03b5d4;
                                        border: 2px solid #03b5d4;
                                        font-size: 0.8rem;
                                        min-width: 5rem;
                                    }

                                    .md-nlstmenu-wrp>.btn-left,
                                    .btn-right {

                                        width: 100%;
                                        text-align: center;
                                        align-items: center;
                                        align-content: center;


                                    }

                                    .btn-left,
                                    .btn-right {
                                        text-align: center !important;
                                        align-items: center !important;
                                        align-content: center !important;
                                        cursor: pointer;
                                    }

                                    .btn-left,
                                    .btn-right>i {
                                        color: #03b5d4;
                                        line-height: 20px !important;
                                    }

                                    .md-nlstmenu {
                                        width: 100%;
                                    }

                                </style>


                                {{-- <div class="btn-left"><i
                                    style="margin: auto; vertical-align:middle; align-self:center !important;"
                                    class="fas fa-chevron-up"></i></div> --}}

                                <div class="md-nlstmenu-wrp">
                                    <div id="md-nlstmenu" class="md-nlstmenu"
                                        style="background: transparent !important">
                                        <a target="_blank"
                                            href="https://banyuwangikab.go.id/berita-daerah/akhir-pekan-ini-banyuwangi-gelar-moslem-fashion-festival-di-dermaga-yacht-marina-boom.html">
                                            <div
                                                style="width: 100%; display: flex; flex-direction:row; padding:0.5rem; background: #ffffff5b; opacity:0.9;border-radius:15px;">

                                                <div style="flex:1; padding-right:1rem;">
                                                    <div style="text-align: left; font-size:1rem">
                                                        @php
                                                        $title = 'Akhir Pekan Ini, Banyuwangi Gelar Moslem Fashion Festival di Dermaga Yacht Marina Boom'; @endphp
                                                        <strong>{{ $title }}</strong>

                                                    </div>
                                                    <div
                                                        style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                                                        <div
                                                            style="width: 90%; height:0.1rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem">
                                                        </div>
                                                    </div>

                                                    <div style="height: 0.5rem"></div>
                                                    <div style="text-align:left; font-size:0.7rem;">
                                                        @php
                                                            $a = "BANYUWANGI – Sektor ekonomi kreatif di Banyuwangi terus bergeliat 
                                                                                                                                                                                                                                                                                                                                                                                    untuk mendorong pemulihan ekonomi. Akhir pekan ini, Sabtu 23 Oktober 2021, Pemkab Banyuwangi
                                                                                                                                                                                                                                                                                                                                                                                    berkolaborasi dengan Bank Indonesia (BI) menggelar Moslem Fashion Festival (MFF),
                                                                                                                                                                                                                                                                                                                                                                                    sebuah pergelaran busana muslim di dermaga yacht Pantai Marina Boom.";
                                                            if (strlen($title) > 70) {
                                                                $b = substr($a, strpos($a, '--') + 0, 70) . ' ...';
                                                            } else {
                                                                $b = substr($a, strpos($a, '--') + 0, 100);
                                                            }
                                                            
                                                        @endphp

                                                        {{ $b }}

                                                    </div>


                                                </div>


                                                <div
                                                    style="height: 7rem; width:7rem; border-radius:1rem;   
                                                                                    background-image: url('{{ asset('presentation/b-asset/img/festival_muslim.jpg') }}');
                                                                                    background-size:100% 100%;
                                                                                    background-position:center center; ">
                                                </div>
                                            </div>
                                        </a>

                                        <a target="_blank"
                                            href="https://banyuwangikab.go.id/berita-daerah/upaya-geopark-ijen-masuk-jaringan-dunia-bupati-ipuk-ikuti-forum-dengan-sekjen-ugg.html">
                                            <div
                                                style="width: 100%; display: flex; flex-direction:row; padding:0.5rem;  box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); background:#ffffff54; border-radius:20px;">

                                                <div style="flex:1; padding-right:1rem;">
                                                    <div style="text-align: left; font-size:1rem">
                                                        @php
                                                        $title = 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG'; @endphp
                                                        <strong>{{ $title }}</strong>

                                                    </div>
                                                    <div
                                                        style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                                                        <div
                                                            style="width: 90%; height:0.1rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem">
                                                        </div>
                                                    </div>

                                                    <div style="height: 0.5rem"></div>
                                                    <div style="text-align:left; font-size:0.7rem;">
                                                        @php
                                                            $a = 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.';
                                                            if (strlen($title) > 70) {
                                                                $b = substr($a, strpos($a, '--') + 0, 70) . ' ...';
                                                            } else {
                                                                $b = substr($a, strpos($a, '--') + 0, 100);
                                                            }
                                                            
                                                        @endphp

                                                        {{ $b }}

                                                    </div>


                                                </div>


                                                <div
                                                    style="height: 7rem; width:7rem; border-radius:1rem;   
                                                        background-image: url('https://banyuwangikab.go.id/media/berita/images/9dc1abc5cea09403df9c31f143618649.jpg');
                                                        background-size:100% 100%;
                                                        background-position:center center; ">
                                                </div>
                                            </div>
                                        </a>

                                    </div>



                                </div>

                            </div>
                        </div>

                    </div>

                

                    <div style="height: 2rem"></div>
                    <div class="container">
                        @include('presentation.module.berita.beritaPartTerbaru',["latestBerita"=>isset($latestBerita)?$latestBerita:null])
                    </div>

                    

                    <div style="height:2rem"></div>
                    <div class="container">
                        @include('presentation.module.berita.beritaPartVideoTerbaru',["latestBeritaVideo"=>isset($latestBeritaVideo)?$latestBeritaVideo:null])
                    </div>




                    <div class="container" style="z-index: 2; position: relative;">
                        @include('presentation.module.home.portal.galleryParts')
                    </div>

                    <div style="height: 2rem;"></div>

                </div>
                {{-- p-2-inner --}}

            </div>
            {{-- p-2 --}}

            <div id="p-3" style="background: linear-gradient(transparent,#3d3d3d)">


                {{-- 1 --}}
                <div style="
                                        opacity:0.8 !important;  
                                        background: linear-gradient(to bottom,#03b5d4,#03b5d4) ; 
                                        margin-top: -6rem;
                                        -ms-transform: skewY(-3deg); /* IE 9 */
                                        -webkit-transform: skewY(-3deg); /* Safari */
                                        transform: skewY(-3deg); /* Standard syntax */
                                        border:none;/

                                        
                                    ">
                    <div style="
                                            padding: 10rem 5% 10rem 5% ;
                                            opacity: 1 !important; 
                                            -ms-transform: skewY(3deg); /* IE 9 */
                                            -webkit-transform: skewY(3deg); /* Safari */
                                            transform: skewY(3deg); /* Standard syntax */
                                            border:none;
                                                ">
                        <div class="container">

                            <div style="font-size:2rem; color:#ffffff; font-family: 'Rubik', 'Fauna One', 'Roboto';">
                                Pemerintahan
                            </div>
                            <div>
                                <div class="container">
                                    <div
                                        style=" margin-top:15px; border-radius:15px; background: #ffffff00; opacity:0.9; padding:1rem; width:100%;">
                                        {{-- <div style="text-align: center; font-size:1.2rem">
                                                    Pintasan Informasi
                                                </div> --}}
                                        @php
                                            $listApps = [
                                               
                                                
                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'Lambang Daerah',
                                                    'linkTo' => route('pemerintahan.lambang-daerah'),
                                                    'imgSrc' => asset('presentation/b-asset/img/lambang-daerah.png'),
                                                    'textDesc' => '  ',
                                                    'justForward' => true,
                                                ],

                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'Visi Misi',
                                                    'linkTo' => route('pemerintahan.visi-misi'),
                                                    'imgSrc' => asset('presentation/b-asset/img/visi-misi.png'),
                                                    'textDesc' => '',
                                                    'justForward' => true,
                                                ],

                                                
                                            
                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'DPRD',
                                                    'linkTo' => url('https://dprd.banyuwangikab.go.id'),
                                                    'imgSrc' => asset('presentation/b-asset/img/icon-dprd.png'),
                                                    'textDesc' => '',
                                                    'justForward' => true,
                                                ],

                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'Kepala Daerah',
                                                    'linkTo' => route('pemerintahan.kepala-daerah'),
                                                    'imgSrc' => asset('presentation/b-asset/img/kepala-daerah.png'),
                                                    'textDesc' => '',
                                                    'justForward' => true,
                                                ],
                                            
                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'Sekda',
                                                    'linkTo' => route('pemerintahan.sekda'),
                                                    'imgSrc' => asset('presentation/b-asset/img/icon-sekda.png'),
                                                    'textDesc' => '',
                                                    'justForward' => true,
                                                ],
                                            
                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'Dinas',
                                                    'linkTo' => route('pemerintahan.dinas'),
                                                    'imgSrc' => asset('presentation/b-asset/img/icon-dinas.png'),
                                                    'textDesc' => '',
                                                    'justForward' => true,
                                                ],
                                            
                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'Badan',
                                                    'linkTo' => route('pemerintahan.badan'),
                                                    'imgSrc' => asset('presentation/b-asset/img/icon-badan.png'),
                                                    'textDesc' => '',
                                                    'justForward' => true,
                                                ],
                                                [
                                                    'id' => '',
                                                    'slug' => '',
                                                    'title' => 'Kecamatan',
                                                    'linkTo' => route('pemerintahan.kecamatan'),
                                                    'imgSrc' => asset('presentation/b-asset/img/icon-kecamatan.png'),
                                                    'textDesc' => '',
                                                    'justForward' => true,
                                                    'action' => 'popup',
                                                    'parameter' => [
                                                        'link' => '',
                                                        'data' => [''],
                                                    ],
                                                ],
                                            ];
                                            
                                        @endphp

                                        <div class="row ">
                                            @foreach ($listApps as $item)
                                                <div class="col-6 col-md-3 col-lg-3">
                                                    <div class="tools-sc-container-item tools-sc-bg-container-item">
                                                        <a
                                                            {{ $item['justForward'] ? 'href=' . $item['linkTo'] : "onclick=openModal('oke')" }}>
                                                            <div class="tool-items">
                                                                <img class="tool-items-icon"
                                                                    title="{{ $item['title'] . ' - ' . $item['textDesc'] }}"
                                                                    src="{{ $item['imgSrc'] }}"
                                                                    alt=" {{ ' image ' . $item['title'] }}">
                                                            </div>

                                                            <div class="tool-items-text color-fg-white"
                                                                title="{{ $item['title'] . ' - ' . $item['textDesc'] }}">
                                                                {{ $item['title'] }}</div>

                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>



                            </div>


                        </div>



                    </div>
                </div>

               

                <div style="height:10rem"></div>

                <div style="background: transparent;
                        opacity:0.8 !important; 
                        width:100%; 
                        position: relative; 
                        z-index:9;">

                    <div style="
                            position: absolute;
                            z-index:-1;
                            top:-2rem;
                            right:-1rem;
                            height:20rem; 
                            width:20rem; 
                            opacity:0.1;
                            background: url('{{ asset('presentation/b-asset/img/logo-bwi-black-and-white.png') }}');
                            background-size:cover;
                            background-repeat:no-repeat"></div>


                    <div class="container">
                        <div class="row" style="color: #f8f8f8">
                            <div class="col-xs-12 col-md-6 col-lg-3" style="margin-bottom:1rem">
                                <div class="title-section-footer" style="font-size: 1.6rem">
                                    Kantor
                                </div>
                                <div style="font-size: 1.2rem">
                                    <ul class="list-footer-content">
                                        <li>
                                            <a style="cursor: pointer;" onclick="getListContact()">
                                                Alamat dan Kontak</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('pemerintahan.pejabat') }}">
                                                Para Pejabat</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-3" style="margin-bottom:1rem">
                                <div class="title-section-footer" style="font-size: 1.6rem">
                                    Tentang
                                </div>
                                <div style="font-size: 1.2rem">
                                    <ul class="list-footer-content">
                                        <li>
                                            <a style="cursor: pointer;" onclick="getListProfile()">
                                                Profil Daerah</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('pemerintahan.saran') }}">
                                                Saran dan Masukan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3" style="margin-bottom:1rem">
                                <div class="title-section-footer" style="font-size: 1.6rem">
                                    Prestasi
                                </div>
                                <div style="font-size: 1.2rem">
                                    <ul class="list-footer-content">
                                        <li>
                                            <a href="{{ route('pemerintahan.prestasi.{slug}', 'sluggxx') }}">
                                                Maturitas Penyelenggara Sistem...</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('pemerintahan.prestasi.{slug}', 'sluggxx') }}">
                                                Maturitas Penyelenggara Sistem...</a>
                                        </li>


                                        <li>
                                            <a href="{{ route('pemerintahan.prestasi') }}">
                                                Lihat prestasi lainnya</a>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3" style="margin-bottom:1rem">
                                <div class="title-section-footer" style="font-size: 1.6rem">
                                    Tautan Kabar
                                </div>
                                <div style="font-size: 1.2rem">
                                    <ul class="list-footer-content">
                                        <li>
                                            <a href="{{ url('https://corona.banyuwangikab.go.id/') }}">
                                                Covid 19</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('https://smartkampung.id/') }}">
                                                SmartKampung</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div
                        style="background:transparent;  text-align: center; padding:3rem 3rem 30vh 3rem ; position:relative; z-index:2">
                        <a class="btn-jelajah" id="btn-jelajah" href="#"
                            onclick="document.getElementById('p-1').scrollIntoView({'behavior': 'smooth'});return false;">
                            <i class="fas fa-chevron-up fa-up"></i>
                        </a>


                        <div style="height: 5rem"></div>
                        <div class="xbottom-based-tools-wrp">
                            <div style="text-align: center; color:#fffffffa; font-size:0.9rem;">
                                &copy; {{ date('Y') }} Melayani sepenuh <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            {{-- p-3 --}}




        </div>




    </div>



    @yield('page_content')

@endsection


@section('bottom1')
    {{-- <div style="height:20rem; background:#0888af"></div> --}}
@endsection

@section('footer')

    <script>


        $('#id-search-form').on('submit', function(e){
            console.log(e)
            if($("#search-input-form").val() == "" ){
                e.preventDefault();
            }
        });



        function submitSearch(e){
            console.log(e)
            if($("#search-input-form").val() != "" ){
                $("#id-search-form").submit()
            }
            
        }   

        $(() => {
            // $('#topNav,#toolbar-bottom').hide();
            $("#toolbar-p-1-container").addClass("bg-transparant");


            $('#md-nlstmenu').slick({
                draggable: true,
                autoplay: true,
                /* this is the new line */
                autoplaySpeed: 2000,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                touchThreshold: 1000,
                vertical: true,
                verticalSwiping: true,
                prevArrow: $('.btn-left'),
                nextArrow: $('.btn-right'),

            });


            let owl3 = $("#dt-banner-top-pp-2");
            owl3.owlCarousel({
                singleItem: true,
                autoPlay: true,
                autoPlayTimeout: 200,
            });



            var lastScrollTop = 0;
            var isClikedBtnJelajah = false;

            $("#btn-jelajah").click(() => {
                window.history.pushState('', '', '/');
                // console.log("click btn jelajah")
                isClikedBtnJelajah = true;
            })


            var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
            if (window.location.hash && isChrome) {
                setTimeout(function() {
                    var hash = window.location.hash;
                    window.location.hash = "";
                    window.location.hash = hash;
                }, 300);
            }




            // $("#p-2-inner").fadeOut()
            // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.



            $("#main-content").scroll(function(e) {
                var scrollTop = $(this).scrollTop()

                if (scrollTop > 300) {
                    // console.log(scrollTop)

                    // window.location.href = "#p-2"

                    $('#topNav,#toolbar-bottom').addClass("show-element");
                    $('#topNav,#toolbar-bottom').removeClass("hide-element");
                    // $('#topNav,#toolbar-bottom').fadeOut(300);
                    $("#toolbar-p-1").addClass("bottom-based-tools-wrp")
                    $("#toolbar-p-1-container").removeClass("bg-transparant");

                    // $('#topNav').fadeIn(300);
                    // $('#p-1').fadeOut(300);

                    if (scrollTop > 300 && scrollTop < 350) {
                        if (lastScrollTop < scrollTop && isClikedBtnJelajah == false) {
                            // console.log("scroll bottom and non click btn jelajah")
                            // window.location.href = "#p-2"
                            // window.history.pushState('', '', '/');

                        }
                    }



                    if (scrollTop > 600 && scrollTop < 700) {

                        if (lastScrollTop > scrollTop && isClikedBtnJelajah == false) {
                            // console.log("try scroll up")
                            // console.log("try to p-1")
                            // window.location.href = "#p-1"
                            // window.history.pushState('', '', '/');

                        }

                    }

                    setTimeout(() => {
                        isClikedBtnJelajah = false
                    }, 200);

                } else {



                    $("#toolbar-p-1").removeClass("bottom-based-tools-wrp")
                    $("#toolbar-p-1-container").addClass("bg-transparant");


                    // $('#topNav').fadeOut(300);



                    $('#topNav,#toolbar-bottom').removeClass("show-element");
                    $('#topNav,#toolbar-bottom').addClass("hide-element");

                    isClikedBtnJelajah == false
                }

                lastScrollTop = $(this).scrollTop()

            });

        })
    </script>

    @parent
@endsection
