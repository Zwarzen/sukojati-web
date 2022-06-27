<!-- TOP NAV -->

@php

$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp



<div>
    <div id="topNav" class="nav-portal hide-element">
        @if (isset($headlineNews))
            <div class="headline-main-header">
                <div class="container align-items-center justify-content-center text-center">
                    <a href='{{ url($headlineNews['urlHeadlineNews']) }}'>
                        <span style="color:white; text-align:center">
                            <h5 style="color:rgb(5, 5, 5); text-align:center">
                                <strong>{{ $headlineNews['titleHeadlineNews'] }}</strong>
                            </h5>
                            <span>{{ $headlineNews['contentHeadlineNews'] }}</span>
                        </span>
                    </a>
                </div>
            </div>
        @endif

        <!-- add .full-container for fullwidth -->
        <div class="container-fluid">
            <div id="navbar-utama" class="navbar navbar-utama ">

                {{-- <a class="navbar-brand" data-trigger="#navbar_news">
                    <div class="navbar-brand-wrp">
                        <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" class="logo-beranda-img">
                        <span class="title-teks"><strong> Galeri Banyuwangi </strong> </span> --}}
                        {{-- <div id="title-teks" class="logo-beranda">
                            <span class="title-teks-sub-a">Banyuwangi</span>
                            <span class="title-teks-sub-b">Semakin Digital</span>
                        </div> --}}
{{--
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



                <div class="toolbar-nav ml-auto">
                    <button  class="btn btn-default navbar-nav ">
                        <a href="{{ route('portal') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </button>


{{--
                    <button data-trigger="#navbar_main_weather" class="btn btn-default navbar-nav ">
                        <i class="fas fa-cloud-sun"></i>
                    </button> --}}


                    <button data-trigger="#navbar_news" class="btn btn-default navbar-nav ">
                        <a >
                            <i class="fas fa-ellipsis-v"></i>
                        </a>

                    </button>

                    {{-- <button data-trigger="#navbar_main" class="btn btn-default navbar-nav ">
                        <i class="fas fa-times"></i>
                    </button> --}}

                </div>
            </div>
        </div>
    </div>


</div>
