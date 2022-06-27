@extends('presentation.layouts.mainArtikelNewsContent')

@section('pageContentArtikel')

    <div style="height: 5vh"></div>
    <div style="height: 5vh"></div>
    <div class="container">




        <div class="row">
            <div class="col-12 col-lg-8 col-md-12">
                <article>
                    <header>
                        <h1 class="">{{ $berita->title }}</h1>
                    </header>


                    <h2> <small style="font-size: 0.9rem">
                            <i class="fas fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($berita->created_at)->format('Y-m-d') }}
                            {{ strlen($berita->desc) > 10 ? strlen($berita->desc) : $berita->title }}</small>
                    </h2>
                    <br>






                    <style>
                        .splide__slide img {
                        width: 100%;
                        height: auto;
                        }

                        .splide__slide {
                            opacity: 0.3;
                            }

                            .splide__slide.is-active {
                            opacity: 1;
                        }


                    </style>


                    <div id="main-slider" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                    @foreach ($fotos as $key => $item)
                                        <li class="splide__slide">
                                            <div>
                                                <img style="border-radius:15px;" src="{{ $item->img_raw != '' || $item->img_raw != null? $base_link_media_raw . $item->img_raw: asset('presentation/b-asset/img/lambang-daerah.png') }}"
                                                class="img-fluid">
                                            </div>
                                            <div>
                                                {{ $item->img_desc }}
                                            </div>
                                            


                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>

                    <br>


                    <div id="thumbnail-slider" class="splide">
                        <div class="splide__track">
                              <ul class="splide__list">

                                @foreach ($fotos as $key => $item)
                                    <li class="splide__slide">
                                        <img src="{{ $item->img_thumb != '' || $item->img_thumb != null? $base_link_media_thumbnail . $item->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}"
                                            class="img-fluid">
                                    </li>
                                @endforeach

                             

                                
                              </ul>
                        </div>
                      </div>


                    <script>

                        document.addEventListener( 'DOMContentLoaded', function () {
                            var main = new Splide( '#main-slider', {
                                type      : 'fade',
                                rewind    : true,
                                pagination: false,
                                arrows    : false,
                            } );

                            var thumbnails = new Splide( '#thumbnail-slider', {
                                fixedWidth  : 100,
                                fixedHeight : 60,
                                gap         : 10,
                                rewind      : true,
                                pagination  : false,
                                cover       : true,
                                isNavigation: true,
                                breakpoints : {
                                600: {
                                    fixedWidth : 60,
                                    fixedHeight: 44,
                                },
                                },
                            } );

                            main.sync( thumbnails );
                            main.mount();
                            thumbnails.mount();
                        } );


                        

                    </script>






                </article>
            </div>
            <div class="col-12 col-lg-4 col-md-12">
                <aside>
                    @include('presentation.module.berita.beritafoto.ngetrenBeritaFoto')
                </aside>
            </div>
        </div>

        <br>
        <br>


        @if (isset($beritaRelated) && count($beritaRelated) > 0)
            <div style="font-weight: 600">Berita Terkait</div>
            <hr>
            <aside>
                <div class="row">
                    @foreach ($beritaRelated as $item)
                        <div class="col-6 col-md-6 col-lg-3" style="background: transparent">
                            <a href="{{ route('berita.video') . '/' . $item->slug }}" title="{{ $item->title }}">

                                <div
                                    style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff">
                                    <div style="
                                    border-radius:15px 15px 0px 0px;
                                    width:100%;
                                    height:150px;
                                    background-image: url('{{ $item->img_thumb != '' || $item->img_thumb != null? $base_link_media_thumbnail . $item->img_thumb: asset('presentation/b-asset/img/lambang-daerah.png') }}');
                                    background-size:cover; 
                                    background-position:center;
                                    padding:0.5rem;
                                    float:right;
                                     ">


                                    </div>
                                    <div
                                        style="background: #ffffff; padding:1rem; border-radius: 15px 15px 15px 15px ; text-align:left; font-weight:600">
                                        {{ strlen($item->title) > 60 ? substr($item->title, 0, 60) . '...' : $item->title }}
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <br>
                <br>
                <nav>
                    <a class="btn default" href="{{ route('berita.foto') }}" style="color:blue !important"> <i
                            class="fas fa-chevron-left"></i> Kembali ke Beranda Berita</a>
                    <br>
                    <a class="btn" href="{{ route('portal') }}" style="color:rgb(65, 155, 13) !important"> <i
                            class="fas fa-chevron-left"></i> Kembali ke Beranda Portal</a>
                </nav>
            </aside>
        @endif()

        <div style="height: 10rem;"></div>


        <script>
            $(() => {
                $('.carousel').carousel()
            })
        </script>

    @endsection
