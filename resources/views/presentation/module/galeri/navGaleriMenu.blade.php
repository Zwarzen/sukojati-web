@php

$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp



<div id="navbar_news_XXXX" class="must-close mobile-offcanvas">
    <div id="navbar_main_inner_XXXX" class="container-fluid mobile-offcanvas-inner scroller">
        <div class="offcanvas-header">
            <button class="btn float-right btn-close"><i class="fas fa-times"></i> </button>
            {{-- <a class="navbar-brand" href="{{ route('galeri') }}">
                <div style="display: flex; flex-direction:row;">
                    <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}"
                        class="logo-beranda-img"> --}}
                    {{-- <div id="title-teks" class="logo-beranda">
                    <span class="title-teks-sub-a" style="color:#E3AF1C">BANYUWANGI</span>
                    <span class="title-teks-sub-b">Semakin Digital</span>
                </div> --}}
{{--
                    <span class="title-teks" > <strong>Galeri Banyuwangi</strong> </span>

                </div>
            </a> --}}

            <a class="navbar-brand" data-trigger="#navbar_news">
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
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Ngretren',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Wisata',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],


                [
                    'title' => 'Kesehatan',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
                    'textDesc' => 'Informasi Perencanaan Daerah',
                ],

                [
                    'title' => 'Ekonomi',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
                    'textDesc' => 'Informasi Transparansi Anggaran Daerah',
                ],

                [
                    'title' => 'Budaya',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Musik',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
                    'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                ],

                [
                    'title' => 'Olahraga',
                    'linkTo' => '#',
                    'imgSrc' => asset('presentation/b-asset/img/icon-gallery.png'),
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
        <div class="tools-sc-container ">

            @foreach ($listApps as $item)
                <div class="tools-sc-container-item">
                    <a href="{{ $item['linkTo'] }}">
                        <div class="tool-items">
                            <img class="tool-items-icon" title="{{ $item['title'] ." - ". $item['textDesc']}}"
                                src="{{ $item['imgSrc'] }}" alt=" {{ ' image '.$item['title'] }}">
                        </div>

                        <div class="tool-items-text" title="{{ $item['title'] ." - ". $item['textDesc'] }}">{{ $item['title'] }}</div>

                    </a>


                </div>
            @endforeach
        </div>



    </div>
</div>
