@extends('presentation.layouts.mainNewsContent')


@section('navigation')
    @include('presentation.module.berita.navBerita')
    {{-- @include('presentation.module.berita.navSearch') --}}
    @include('presentation.module.berita.navBeritaMenu')
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
                                background:linear-gradient(10deg, #eeeeee 1%,  #eeeeee, #eeeeee); 
                                opacity:1; content:'';  
                                position:absolute; top:0; bottom:0px; left:0px; right:0px; width:100%; ">
        </div>


        {{-- bottom tools --}}

        <div id="main-content"
            style="opacity: 1; z-index:1; position: relative; max-height:100vh; overflow-y:auto; overflow-x:hidden;"
            class="scroller">


            <div id="p-2" class="" style="scroll-behavior: smooth; min-height: 100vh; padding-top:50px">
                <div id="p-2-inner">

                    <div class="container">
                        {{-- @include('presentation.module.berita.kanalBerita') --}}
                    </div>


                    <div style="height:1rem"></div>

                    <style>
                        .banner-top-wrp {
                            overflow: hidden;
                            height: 30rem;
                            border-radius: 15px;
                        }

                        .banner-top-wrp:hover .banner-top-item,
                        .banner-top-wrp:focus .banner-top-item {
                            transform: scale(1.2);
                            transition: all ease-in-out .5s;

                        }

                        .banner-top-wrp:hover .sub-bti-title,
                        .banner-top-wrp:focus .sub-bti-title {
                            transition: all ease-in-out .5s;
                            color: #d426f7 !important;
                        }


                        .banner-top-item {
                            height: inherit;
                            align-items: bottom start;
                            align-content: bottom start;
                            text-align: left;
                            -webkit-background-size: cover !important;
                            -moz-background-size: cover !important;
                            -o-background-size: cover !important;
                            background-size: cover !important;
                            background-position: center center !important;
                            background-repeat: no-repeat !important;
                            border-radius: 15px;
                            overflow: hidden;
                        }

                        .bti-content {
                            background: linear-gradient(to bottom, rgba(24, 24, 24, 0.63), rgba(61, 61, 61, 0));
                            color: #ffffff;
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            padding: 1rem;
                            text-align: left;
                            width: 100%;
                            height: 100%;
                            border-radius: 15px;
                        }

                        .bti-title {

                            background: linear-gradient(to top, #363636ad 50%, rgba(61, 61, 61, 0));
                            color: #ffffff;
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            width: 100%;
                            padding: 3rem 1rem 1rem 1rem;
                            text-align: left;
                            border-radius: 0px 0px 15px 15px;
                            /* font-family: 'Fauna One', sans-serif; */
                        }


                        .sub-bti-title {
                            color: inherit;
                            font-size: 1.5rem;

                            /* font-family: 'Fauna One', sans-serif; */
                        }

                        .sub-bti-title:hover,
                        .sub-bti-title:focus {
                            transition: all ease-in-out .5s;
                            color: #d426f7 !important;
                        }


                        @media all and (max-width:600px) {
                            .sub-bti-title {
                                font-size: 1rem;

                                /* font-family: 'Fauna One', sans-serif; */
                            }

                            /* .banner-top-item {
                                                height: 25rem;
                                            } */
                        }

                    </style>



                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="owl-carousel owl-theme" id="dt-banner-top-pp-2" style="background:transparent">
                                    @foreach ($newsHots as $item => $val)
                                        <a href="{{ route('berita') . '/' . $val['slug'] }}">
                                            <div class="banner-top-wrp">
                                                <div style=" background:url('{{ url($val['poster']) }}');"
                                                    class="banner-top-item ">

                                                </div>
                                                <div class="bti-title">
                                                    <div class="sub-bti-title">
                                                        <strong>
                                                            {{ $val['title'] }}
                                                        </strong>
                                                    </div>

                                                    <div class="xsub-bti-title">
                                                        <span style="font-size:0.8rem"> {{ $val['kanal-name'] }} |
                                                            {{ $val['publish-date'] }} </span>
                                                    </div>

                                                </div>
                                            </div>

                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-4">

                                @include('presentation.module.berita.ngetrenBerita')
                            </div>

                        </div>


                        <div style="height: 2rem"></div>

                        <div style="">
                            <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Video <small
                                    style="float: right; font-size:0.9rem; line-height:2rem"><a href="{{ route('berita.video.sorotan') }}">Lainnya</a> <i
                                        class="fas fa-chevron-right" aria-hidden="true"></i> </small>
                            </div>

                            <div class="row">
                                @foreach (['3', '3', '3', '3'] as $item)
                                
                                    <div class="col-6 col-md-6 col-lg-3">
                                        <a href="{{ route('berita.video')."/"."video-yang-di-sorot" }}">
                                        <div style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff">
                                            <div style="
                                                border-radius:15px 15px 0px 0px;
                                                width:100%;
                                                height:150px;
                                                background-image: url('{{ asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg') }}');
                                                background-size:cover; 
                                                background-position:center;
                                                overflow:hidden;
                                                float:right;
                                                 ">
                                                <div
                                                    style=" padding:0.5rem; font-size:1rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                                                    <i class="fas fa-play-circle"></i>
                                                </div>

                                            </div>
                                            <div
                                                style="background: #ffffff; padding:1rem; border-radius: 15px 15px 15px 15px ; text-align:left; font-weight:600">
                                                Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan
                                                Sekjen UGG
                                            </div>

                                        </div>
                                        </a>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div style="height:1rem"></div>
                        <hr>
                        <div style="height:1rem"></div>



                        {{-- channel berita umum --}}
                        <div style="background: #fafafa; border-radius:15px; padding:1rem; margin-bottom:1rem">
                            <div style="font-size:1.2rem; font-weight:600">Berita Umum <small
                                    style="float: right; font-size:0.9rem; line-height:2rem">Lainnya <i
                                        class="fas fa-chevron-right" aria-hidden="true"></i> </small></div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-4">
                                    <div style="width: 100%; height:350px">
                                        <img src="{{ asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg') }}"
                                            alt="gambar-berita" style="border-radius:15px; width: inherit; height:inherit"
                                            alt="">
                                    </div>
                                    <div style="height: 1rem"></div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-4">

                                    @php
                                        $listNgetren = [
                                            [
                                                'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
                                                'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
                                                'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
                                                'poster' => asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg'),
                                                'kanal-name' => 'News',
                                                'publish-date' => '2021-09-03 20:21:22',
                                            ],
                                        
                                            [
                                                'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
                                                'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
                                                'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
                                                'poster' => asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg'),
                                                'kanal-name' => 'News',
                                                'publish-date' => '2021-09-03 20:21:22',
                                            ],
                                            [
                                                'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
                                                'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
                                                'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
                                                'poster' => asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg'),
                                                'kanal-name' => 'News',
                                                'publish-date' => '2021-09-03 20:21:22',
                                            ],
                                        ];
                                    @endphp
                                    <div> <strong>Populer dari berita umum</strong> </div>
                                    <div class="scroller" style="max-height:27rem; overflow-y:auto;">
                                        @foreach ($listNgetren as $item)
                                            <a target="_blank" style="margin-bottom: 1rem"
                                                href="{{ route('berita') . '/' . $item['slug'] }}">
                                                <div class="ng-wrp-item">
                                                    <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                            background-image: url('{{ $item['poster'] }}');
                                                            background-size:100% 100%;
                                                            background-position:center center; ">
                                                    </div>

                                                    <div style=" flex:1;padding-left:1rem;">
                                                        <div style="text-align: left; font-size:0.9rem">
                                                            {{ $item['title'] }}

                                                        </div>

                                                    </div>



                                                </div>
                                            </a>
                                        @endforeach


                                    </div>
                                    <div style="text-align:center"> <a href="#">Lihat lainnya</a> </div>
                                    <div style="height: 1rem"></div>

                                </div>


                                <div class="col-12 col-md-4 col-lg-4">


                                    <div> <strong>Terbaru dari Berita umum</strong> </div>
                                    <div class="scroller" style="max-height:27rem; overflow-y:auto;">
                                        @foreach ($listNgetren as $item)
                                            <a target="_blank" style="margin-bottom: 1rem"
                                                href="{{ route('berita') . '/' . $item['slug'] }}">
                                                <div class="ng-wrp-item">
                                                    <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                            background-image: url('{{ $item['poster'] }}');
                                                            background-size:100% 100%;
                                                            background-position:center center; ">
                                                    </div>

                                                    <div style=" flex:1;padding-left:1rem;">
                                                        <div style="text-align: left; font-size:0.9rem">
                                                            {{ $item['title'] }}

                                                        </div>

                                                    </div>



                                                </div>
                                            </a>
                                        @endforeach


                                    </div>
                                    <div style="text-align: center"> <a href="#">Lihat lainnya</a> </div>
                                    <div style="height: 1rem"></div>
                                </div>
                            </div>

                        </div>


                        {{-- channel olahraga --}}

                        <div style="background: #fafafa; border-radius:15px; padding:1rem; margin-bottom:1rem">
                            <div style="font-size:1.2rem; font-weight:600">Olahraga <small
                                    style="float: right; font-size:0.9rem; line-height:2rem">Lainnya <i
                                        class="fas fa-chevron-right" aria-hidden="true"></i> </small></div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-4">
                                    <div style="width: 100%; height:350px">
                                        <img src="{{ asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg') }}"
                                            alt="gambar-berita" style="border-radius:15px; width: inherit; height:inherit"
                                            alt="">
                                    </div>
                                    <div style="height: 1rem"></div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-4">

                                    @php
                                        $listNgetren = [
                                            [
                                                'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
                                                'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
                                                'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
                                                'poster' => asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg'),
                                                'kanal-name' => 'News',
                                                'publish-date' => '2021-09-03 20:21:22',
                                            ],
                                        
                                            [
                                                'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
                                                'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
                                                'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
                                                'poster' => asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg'),
                                                'kanal-name' => 'News',
                                                'publish-date' => '2021-09-03 20:21:22',
                                            ],
                                            [
                                                'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
                                                'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
                                                'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
                                                'poster' => asset('presentation/b-asset/img/thumbnail-festival-posyandu.jpg'),
                                                'kanal-name' => 'News',
                                                'publish-date' => '2021-09-03 20:21:22',
                                            ],
                                        ];
                                    @endphp
                                    <div> <strong>Populer dari olahraga</strong> </div>
                                    <div class="scroller" style="max-height:27rem; overflow-y:auto;">
                                        @foreach ($listNgetren as $item)
                                            <a target="_blank" style="margin-bottom: 1rem"
                                                href="{{ route('berita') . '/' . $item['slug'] }}">
                                                <div class="ng-wrp-item">
                                                    <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                            background-image: url('{{ $item['poster'] }}');
                                                            background-size:100% 100%;
                                                            background-position:center center; ">
                                                    </div>

                                                    <div style=" flex:1;padding-left:1rem;">
                                                        <div style="text-align: left; font-size:0.9rem">
                                                            {{ $item['title'] }}

                                                        </div>

                                                    </div>



                                                </div>
                                            </a>
                                        @endforeach


                                    </div>
                                    <div style="text-align:center"> <a href="#">Lihat lainnya</a> </div>
                                    <div style="height: 1rem"></div>

                                </div>



                                <div class="col-12 col-md-4 col-lg-4">


                                    <div><strong>Terbaru dari Olahraga</strong></div>
                                    <div class="scroller" style="max-height:27rem; overflow-y:auto;">
                                        @foreach ($listNgetren as $item)
                                            <a target="_blank" style="margin-bottom: 1rem"
                                                href="{{ route('berita') . '/' . $item['slug'] }}">
                                                <div class="ng-wrp-item">
                                                    <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                            background-image: url('{{ $item['poster'] }}');
                                                            background-size:100% 100%;
                                                            background-position:center center; ">
                                                    </div>

                                                    <div style=" flex:1;padding-left:1rem;">
                                                        <div style="text-align: left; font-size:0.9rem">
                                                            {{ $item['title'] }}

                                                        </div>

                                                    </div>



                                                </div>
                                            </a>
                                        @endforeach


                                    </div>
                                    <div style="text-align: center"> <a href="#">Lihat lainnya</a> </div>
                                    <div style="height: 1rem"></div>
                                </div>
                            </div>

                        </div>





                    </div>


                    <div style="height: 2rem;"></div>



                </div>
                {{-- p-2-inner --}}

            </div>
            {{-- p-2 --}}




        </div>




    </div>



    @yield('page_content')

@endsection


@section('bottom1')
    {{-- <div style="height:20rem; background:#0888af"></div> --}}
@endsection

@section('footer')

    <script>
        $(() => {
            $('#topNav,#toolbar-bottom').addClass("show-element");
            // $('#topNav,#toolbar-bottom').hide();
            $("#toolbar-p-1-container").addClass("bg-transparant");


            $('#md-kanalmenu').slick({
                draggable: true,
                autoplay: false,
                autoplaySpeed: 2000,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 5,
                touchThreshold: 1000,
                prevArrow: $('.btn-kanal-left'),
                nextArrow: $('.btn-kanal-right'),

            });

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


                    setTimeout(() => {
                        isClikedBtnJelajah = false
                    }, 200);

                } else {



                    $("#toolbar-p-1").removeClass("bottom-based-tools-wrp")
                    $("#toolbar-p-1-container").addClass("bg-transparant");


                    // $('#topNav').fadeOut(300);



                    // $('#topNav,#toolbar-bottom').removeClass("show-element");
                    // $('#topNav,#toolbar-bottom').addClass("hide-element");

                    isClikedBtnJelajah == false
                }

                lastScrollTop = $(this).scrollTop()

            });

        })
    </script>

    @parent
@endsection
