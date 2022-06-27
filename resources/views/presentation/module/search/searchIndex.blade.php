@extends('presentation.layouts.mainSearchContent')

@section('pageContentArtikel')

@php

$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp


    <style>
        .search-form {
            width: 100% !important;
            padding: 0rem !important;
            border-radius: 0px !important;
        }

        .logo-bwi-search-page-container {
            width: 100%;
            text-align: center;
            align-content: center;
            align-items: center;
        }

        .logo-bwi-search-page {
            margin: auto;

        }

        .b {
            font-size: 3.5rem;
        }


        .title-teks {
            font-family: 'cocon-reguler', 'Capriola', 'Fauna One', sans-serif;
            font-size: 3rem;
        }


        .search-item-container {
            display: flex;
            flex-direction: row;
            padding: 0.5rem;
            /* box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); */
            /* background: #ffffff54; */
            border-radius: 0px !important;
            width: 100%;
            align-self: center;
            margin: auto;
        }

        .search-item-text {
            flex: 1;
            padding-left: 1rem;
        }

        .search-item-text-title {
            text-align: left;
            font-size: 1rem;
            color: #565fdd;
            font-family: 'lato';
            line-height: 1.3rem;
        }

        .search-item-text-title-match {
            text-align: left;
            font-size: 1rem;
            color: #2830a3;
            font-family: 'lato';
            line-height: 1.3rem;
        }

        .search-item-text-link {
            text-align: left;
            font-size: 1rem;
            color: #5aaf74
        }

        .search-item-text-desc {
            text-align: left;
            font-size: 0.8rem;
        }

        .cat-search {
            font-size: 0.9rem;
            color: #575757;
            margin-right: 1rem;
        }

        .cat-search-active {
            color: #0b96e6 !important;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #0b96e6;
        }

        .nav-item {
            /* margin-bottom: 0.5rem; */
        }

        .gap-top {
            height: 5vh;
        }

        .img-cuplikan {
            min-height: 10rem;
            width: 100%;
            border-radius: 10px;
            background-size: 100% 100%;
            background-position: center center;
        }


        @media all and (max-width:600px) {
            .gap-top {
                height: 3vh;
            }

            .nav-item {
                margin-bottom: 0rem !important;
            }

            .b {
                font-size: 2rem;
            }

            .title-teks {
                font-size: 1.8rem;
            }


            /* .search-item-container {
                        display: flex;
                        flex-direction: row;
                        padding: 0.5rem;
                        box-shadow: 0 1px 20px rgb(0 0 0 / 0.1);
                        background: #ffffff54;
                        border-radius: 10px;
                        width: 100%;
                    } */

            .search-item-text {
                flex: 1;
                padding-left: 1rem;
            }

            .search-item-text-title {
                text-align: left;
                font-size: 1rem;
            }

            .search-item-text-desc {
                text-align: left;
                font-size: 0.7rem;
            }

            .img-cuplikan {
                min-height: 20rem;
                width: 100%;
                border-radius: 10px;
                background-size: 100% 100%;
                background-position: center center;
            }


        }

    </style>


    <div class="gap-top"></div>

    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="logo-bwi-search-page-container">
                    <a class="navbar-brand" href="{{ url('./') }}">
                        <div class="navbar-brand-wrp">
                            <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" class="logo-beranda-img">
                            {{-- <span class="title-teks"><strong> {{ $opd->nama }} </strong> </span> --}}
                            <div id="title-teks" class="logo-beranda">
                                <span class="title-teks-sub-opd-a">Berita {{ $opdProfile->alias }}</span>
                                <span class="title-teks-sub-opd-b">Kabupaten Banyuwangi</span>
                            </div>

                        </div>
                    </a>


                </div>

                <div style="padding:0.5rem;">
                    <form action="{{ route('search') }}" id="id-search-form" method="get"
                        style="color:inherit; margin:auto; align-self:center auto;" class="form-inline search-form">

                        <input id="search-input-form" name="q" value="{{ isset($key) ? $key : '' }}"
                            class="form-control search-input-form" type="text" placeholder="Cari berita menarik ">

                        <i class="fa fa-search" onclick="submitSearch(event)" style="cursor:pointer; color:#0b96e6"
                            aria-hidden="true"></i>

                        <i style="clear:both"></i>

                        {{-- @csrf --}}

                    </form>


                </div>
                {{-- <div style="padding:0.5rem; text-align:center">
                    <span class="cat-search cat-search-active ">Semua</span>
                    <span class="cat-search">Berita</span>
                    <span class="cat-search">Artikel</span>
                    <span class="cat-search">Gambar</span>
                    <span class="cat-search">Video</span>
                </div> --}}



            </div>
        </div>





    </div>


    <hr>





    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-12">

                @if (count($data) > 0)
                <i><small>Menampilkan 5 dari {{ $data->total() }} hasil pencarian <strong>"{{ $key }}"</strong> </small></i>

                    @foreach ($data as $item => $val)

                        <div>
                            <a target="_blank" href="{{ route('berita') . '/' . $val->slug }}">
                                <div class="search-item-container">

                                    <div style="height: 4rem; width:4rem; border-radius:10px;
                                                            background-image: url('{{ $val->img_thumb != '' || $val->img_thumb != null? $base_link_media_thumbnail . $val->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                                                            background-size:100% 100%;
                                                            background-position:center center; ">
                                    </div>

                                    <div class="search-item-text">
                                        <div class="search-item-text-title">
                                            @php
                                                $resTitle = [];
                                                $titles = explode(" ",$val->title);

                                                foreach ($titles as $k => $v) {
                                                        if( in_array(strtolower($v),array_map("strtolower", $keys))){
                                                            $bold = "<strong class='search-item-text-title-match'>$v</strong>";
                                                            array_push($resTitle,$bold);
                                                        }else{
                                                            array_push($resTitle,$v);
                                                        }
                                                    }

                                                $resTitle = implode(" ",$resTitle);

                                            @endphp
                                            {!! $val->title !!}

                                        </div>
                                        {{-- <div style="width: 90%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                                <div style="width: 100%; background:#868686; height:0.1rem; !important;   text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem"></div>
                            </div> --}}

                                        <div class="search-item-text-desc">
                                            {!!  strlen($val->desc) > 10 ? $val->desc : substr(  $val->title,0,65)."..."  !!}
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endforeach

                    @if(isset($key) && strlen($key)>0)
                    <div>{{ $data->appends(['q' => $key])->links("pagination::bootstrap-4") }}</div>
                    @else
                    <div>{{ $data->links("pagination::bootstrap-4") }}</div>
                    @endif




                @else

                <i><small>Menampilkan 0 data dari hasil pencarian <strong>"{{ $key }}"</strong> </small></i>
                @endif

            </div>
            {{-- <div class="col-lg-4 col-md-12">


                @if (count($data) > 0)
                    <div
                        style="border-radius:15px; background:#fcfcfc; border:1px solid #f3f3f3; min-height:200px; text-align:center; padding:1rem">


                        <div>
                            <strong>Cuplikan Berita</strong>
                        </div>
                        <br>
                        <div class="img-cuplikan"
                            style="
                            background-image: url(' {{ $data[0]->img_thumb != '' || $data[0]->img_thumb != null? $base_link_media_thumbnail . $data[0]->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }} ');">
                        </div>

                        <br>
                        <div style="color: #4b4b4b">
                            {{ $data[0]->title }}
                        </div>
                        <br>
                        <div style="color: #5c5c5c; font-size:0.9rem">
                            {!! substr($data[0]->content, 0, 250) !!}
                        </div>


                        <a target="_blank" href="{{ route('berita') . '/' . $data[0]->slug }}">
                            <button class="btn" style="background: #0b96e6; color:#fcfcfc">Lihat</button>
                        </a>
                    </div>
                @endif


            </div> --}}
        </div>





    </div>


    <div style="height: 10vh;"></div>


    <script>
        // $('#id-search-form').on('submit', function(e) {
        //     console.log(e)
        //     if ($("#search-input-form").val() == "") {
        //         e.preventDefault();
        //     }
        // });



        function submitSearch(e) {

            $("#id-search-form").submit()

            // console.log(e)
            // if ($("#search-input-form").val() != "") {
            //     $("#id-search-form").submit()
            // }

        }
    </script>

@endsection
