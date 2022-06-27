@php

$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp


<div id="navbar_news" class="must-close mobile-offcanvas">
    <div id="navbar_main_inner" class="container-fluid mobile-offcanvas-inner scroller">
        <div class="offcanvas-header">
            <button class="btn float-right btn-close"><i class="fas fa-times"></i> </button>


            <a class="navbar-brand" href="{{ route('berita') }}">
                <div class="navbar-brand-wrp">
                    <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" class="logo-beranda-img">
                    {{-- <span class="title-teks"><strong> {{ $opd->nama }} </strong> </span> --}}
                    <div id="title-teks" class="logo-beranda">
                        <span class="title-teks-sub-opd-a">{{ $opdProfile->alias }}</span>
                        <span class="title-teks-sub-opd-b">Kabupaten Banyuwangi</span>
                    </div>

                </div>
            </a>



        </div>


        @php
            $listApps = [

                [
                    'title' => 'Beranda',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Ngretren',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Wisata',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],


                [
                    'title' => 'Kesehatan',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Perencanaan Daerah',
                ],

                [
                    'title' => 'Ekonomi',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Transparansi Anggaran Daerah',
                ],

                [
                    'title' => 'Budaya',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Musik',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Olahraga',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

            ];


        @endphp

        <style>
            .tools-sc-container{
                grid-template-columns: auto auto auto auto auto !important;
            }

            @media all and (max-width:600px){
                .tools-sc-container{
                grid-template-columns: auto auto auto  !important;
            }
            }

        </style>
        <div style="height: 2rem;"></div>
        <div style="text-align: center"><h5>Kategori Berita</h5></div>
        <div class="tools-sc-container ">


            @if(isset($beritaMainKategori))
            @foreach ($beritaMainKategori as $item)
                <div class="tools-sc-container-item">


                    @if($type_news == "foto")
                        <a href="{{ route('berita.foto.kanal.{any}',$item->kanal_slug) }} ">
                            <div class="tool-items">
                                <img class="tool-items-icon" title="{{ $item->name}}"
                                    src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt=" {{ ' image '.$item->name }}">
                            </div>

                            <div class="tool-items-text" title="{{ $item->kanal_slug }}">{{ $item->kanal_slug }}</div>

                        </a>


                    @elseif($type_news == "video")

                    <a href="{{ route('berita.video.kanal.{any}',$item->kanal_slug) }} ">
                        <div class="tool-items">
                            <img class="tool-items-icon" title="{{ $item->name}}"
                                src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt=" {{ ' image '.$item->name }}">
                        </div>

                        <div class="tool-items-text" title="{{ $item->kanal_slug }}">{{ $item->kanal_slug }}</div>

                    </a>

                    @elseif($type_news == "text")

                    <a href="{{ route('berita.kanal.{any}',$item->kanal_slug) }} ">
                        <div class="tool-items">
                            <img class="tool-items-icon" title="{{ $item->name}}"
                                src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt=" {{ ' image '.$item->name }}">
                        </div>

                        <div class="tool-items-text" title="{{ $item->kanal_slug }}">{{ $item->kanal_slug }}</div>

                    </a>
                    @endif





                </div>
            @endforeach
            @endif

            @if(isset($beritaVideoMainKategori))
            @foreach ($beritaVideoMainKategori as $item)
                <div class="tools-sc-container-item">
                    @if($type_news == "foto")
                        <a href="{{ route('berita.foto.kanal.{any}',$item->kanal_slug) }} ">
                            <div class="tool-items">
                                <img class="tool-items-icon" title="{{ $item->name}}"
                                    src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt=" {{ ' image '.$item->name }}">
                            </div>

                            <div class="tool-items-text" title="{{ $item->kanal_slug }}">{{ $item->kanal_slug }}</div>

                        </a>


                    @elseif($type_news == "video")

                    <a href="{{ route('berita.video.kanal.{any}',$item->kanal_slug) }} ">
                        <div class="tool-items">
                            <img class="tool-items-icon" title="{{ $item->name}}"
                                src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt=" {{ ' image '.$item->name }}">
                        </div>

                        <div class="tool-items-text" title="{{ $item->kanal_slug }}">{{ $item->kanal_slug }}</div>

                    </a>

                    @elseif($type_news == "text")

                    <a href="{{ route('berita.kanal.{any}',$item->kanal_slug) }} ">
                        <div class="tool-items">
                            <img class="tool-items-icon" title="{{ $item->name}}"
                                src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt=" {{ ' image '.$item->name }}">
                        </div>

                        <div class="tool-items-text" title="{{ $item->kanal_slug }}">{{ $item->kanal_slug }}</div>

                    </a>
                    @endif


                </div>
            @endforeach
            @endif


        </div>



    </div>
</div>
