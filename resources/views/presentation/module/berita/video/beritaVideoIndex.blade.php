@extends('presentation.layouts.mainNewsContent')


@section('navigation')
@include('presentation.module.berita.navBerita')
@include('presentation.module.home.portal.navSearch')
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


                    

                    <div style="height: 2rem;"></div>
                    <div class="container">
                        <div style="text-align:center; font-size: 2rem; font-weight:600">Berita Video </div>
                    </div>
                    <div style="height:1rem"></div>
                    <style>
                        

                        .banner-top-wrp {
                            overflow: hidden;
                            height: 28rem;
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
                                <div class="owl-carousel owl-theme" id="dt-banner-top-pp-2"
                                    style="background:transparent; margin-bottom:1rem;">
                                    @foreach ( $latestBeritaVideo as $item)
                                        <a href="{{ route('berita.video') . '/' . $item->slug}}">
                                            <div class="banner-top-wrp">
                                                <div style=" background:url('{{ $item->img_thumb != '' || $item->img_thumb != null? $base_link_media_thumbnail.$item->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}');"
                                                    class="banner-top-item ">
                                                    <div
                                                        style=" padding:0.5rem; font-size:2rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                                                        <i class="fas fa-play-circle"></i>
                                                    </div>

                                                </div>
                                                <div class="bti-title">
                                                    <div class="sub-bti-title">
                                                        <strong>
                                                            {{ $item->title }}
                                                        </strong>
                                                    </div>

                                                    <div class="xsub-bti-title">
                                                        <span style="font-size:0.8rem"> 
                                                            {{-- {{ $val['kanal-name'] }} | --}}
                                                            {{ $item->created_at }} </span>
                                                    </div>

                                                </div>
                                            </div>

                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-4">
                                <div style="background: #fafafa; border-radius:15px;  margin-bottom:1rem">
                                    @include('presentation.module.berita.video.ngetrenBeritaVideo',["base_link_media_thumbnail"=>$base_link_media_thumbnail, "ngetrenBeritaVideo"=>$ngetrenBeritaVideo])
                                </div>
                            </div>

                        </div>

                        <div style="height:2rem"></div>
                        <div class="container">
                            @include('presentation.module.berita.beritaPartTerbaru',["base_link_media_thumbnail"=>$base_link_media_thumbnail, "latestBerita"=>isset($latestBerita)?$latestBerita:null])
                        </div>


                        <div style="height:2rem"></div>
                        <div style="text-align: center">
                            <a href="{{ route("berita") }}">
                                <button class="btn" style="padding:1rem; border-radius: 15px; background:#fafafa !important;">
                                    Lihat berita text lainnya
                                </button>
                            </a>
                            
                        </div>

                        <div style="height:2rem"></div>


                        <div style="font-size:1.2rem; font-weight:600; padding:1rem; ">
                            Kanal - kanal Berita  Video
                        </div>

                        @foreach ($beritaPartsKategori as $item)

                            
                            <div style="background: #fafafa; border-radius:15px; padding:1rem; margin-bottom:1rem">
                                <div style="font-size:1.2rem; font-weight:600">{{ $item['title'] }} 
                                    <a href="{{ route('berita.video.kanal.{any}',$item['kanal_slug']) }}">
                                    
                                        <small
                                            style="float: right; font-size:0.9rem; line-height:2rem">Lainnya <i
                                                class="fas fa-chevron-right" style="margin-left:0.5rem; font-size:0.7rem"
                                                aria-hidden="true"></i> 
                                        </small>

                                    </a>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <a target="_blank" href="{{ route('berita.video') . '/' . $item['pinned']['slug'] }}">
                                            <div style="width: 100%; height:350px; padding:0px;">


                                                <div style="
                                                            border-radius:15px;
                                                            background-color:#fafafa !important;
                                                            background-image:url('{{ $item['pinned']['img_thumb'] != '' || $item['pinned']['img_thumb'] != null? $base_link_media_thumbnail.$item['pinned']['img_thumb'] : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                                                            background-repeat:no-repeat; 
                                                            background-size:cover;
                                                            background-position:center center;
                                                            width: 100%; height:350px">
                                                    <div
                                                        style="border-radius:inherit; height:100%; position:relative; left:0px; bottom:0px; width:100%; background:linear-gradient(to top, #030303b2, transparent )">
                                                        
                                                        <div
                                                            style=" border-radius: 15px 15px 0px 0px !important; padding:0.5rem; font-size:1rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                                                            <i class="fas fa-play-circle"></i>
                                                        </div>
                                                        <div
                                                            style="position: absolute; bottom:0px; width:100%; padding:1rem; background:#47474700; color:#ffffff; font-weight:600">
                                                            {{ $item['pinned']['title'] }} 
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                        <div style="height: 1rem"></div>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <div> <strong>Populer dari  {{ $item['title'] }}</strong> </div>
                                        <div class="scroller" style="max-height:27rem; overflow-y:auto;">
                                          
                                            @if(isset($item['populer']))
                                            @foreach ($item['populer'] as $items)
                                            <a target="_blank" href="{{ route('berita.video') . '/' . $items['slug'] }}">
                                                    <div class="ng-wrp-item" style="border-bottom: 1px solid #e9e9e9">
                                                        <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                            background-image: url('{{ $items['img_thumb'] != '' || $items['img_thumb'] != null? $base_link_media_thumbnail .$items['img_thumb'] : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                                                            background-size:cover;
                                                            background-repeat:no-repeat; 
                                                            background-position:center center; ">

                                                            <div
                                                            style=" border-radius: 15px 15px 0px 0px !important;padding:0.5rem; font-size:1rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                                                            <i class="fas fa-play-circle"></i>
                                                            </div>
                                                        </div>

                                                        <div style=" flex:1;padding-left:1rem;">
                                                            <div style="text-align: left; font-size:0.9rem">
                                                                {{ $items['title'] }}
                                                                <br>
                                                            <small style="color:#aaaaaa">
                                                            <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse( $item['pinned']['created_at'])->diffForHumans() }}
                                                            </small> 

                                                            </div>

                                                        </div>



                                                    </div>
                                                </a>   
                                            @endforeach
                                        
                                           
                                           @endif

                                        </div>
                                        <div style="text-align:center; font-size:0.9rem; margin-top:1rem; margin-bottom:1rem">
                                            <a href="#">Lihat lainnya</a>
                                        </div>


                                    </div>


                                    <div class="col-12 col-md-4 col-lg-4">


                                        <div> <strong>Terbaru dari {{ $item['title'] }}</strong> </div>
                                        <div class="scroller" style="max-height:27rem; overflow-y:auto;">
                                        @if(isset($item['terbaru']))
                                        @foreach ($item['terbaru'] as $items)
                                                <a target="_blank" style="margin-bottom: 1rem"
                                                    href="{{ route('berita.video') . '/' . $items['slug'] }}">
                                                    <div class="ng-wrp-item" style="border-bottom: 1px solid #e9e9e9">
                                                        <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                            background-image: url('{{ $items['img_thumb'] != '' || $items['img_thumb'] != null? $base_link_media_thumbnail .$items['img_thumb'] : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                                                            background-size:cover;
                                                            background-repeat:no-repeat; 
                                                            background-position:center center; ">
                                                            <div
                                                            style=" border-radius: 15px 15px 0px 0px !important; padding:0.5rem; font-size:1rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                                                            <i class="fas fa-play-circle"></i>
                                                        </div>
                                                        </div>

                                                        <div style=" flex:1;padding-left:1rem;">
                                                            <div style="text-align: left; font-size:0.9rem">
                                                                {{ $items['title'] }}

                                                                <br>
                                                            <small style="color:#aaaaaa">
                                                            <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse( $item['pinned']['created_at'])->diffForHumans() }}
                                                            </small> 

                                                            </div>

                                                        </div>



                                                    </div>
                                                </a>
                                        @endforeach            
                                        @endif
                                        </div>
                                        <div style="text-align:center; font-size:0.9rem; margin-top:1rem; margin-bottom:1rem">
                                            <a href="#">Lihat lainnya</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach





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
