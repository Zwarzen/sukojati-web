@extends('presentation.layouts.mainPortalContent')


@section('navigation')
    @include('presentation.module.home.portal.navPortal')
    @include('presentation.module.home.portal.navSearch')
    @include('presentation.module.home.portal.navMenu')
@endsection

@section('top1')
    {{-- <div id="based-div-1" class="based-div-1"></div>
    <div class="screen-overlay"></div> --}}
    {{-- <div id="based-div-2" 
    class="based-div-2"></div> --}}

@endsection


@section('pageContent')
    <div id="ctn-utama" class="based-div-1" >
        <div style="background:linear-gradient(10deg, #03b5d4 5%, #ffffff, #ffffffa4); opacity:0.8; content:'';  position:absolute; top:0; bottom:0px; left:0px; right:0px; width:100%; "></div>
        <div class="container-fluid for-lg">
            <div class="row">
                <div class="col-lg-4 col-sm-12"
                    style="background:linear-gradient(45deg, #ffffff00, #5f5f5f00); ">
                </div>
                <div class="col-lg-8 col-sm-12" style="max-height: 60vh; 
                overflow-y:auto; 
                scrollbar-color: rebeccapurple green; scrollbar-width: thin;">
                   
                </div>
            </div>


           
        </div>

        {{-- mobile --}}

        <div class="for-md">

            <style>
                .typewriter {
                    overflow: hidden;
                    /* Ensures the content is not revealed until the animation */
                    border-right: .15em solid rgba(255, 166, 0, 0.055);
                    /* The typwriter cursor */
                    white-space: nowrap;
                    /* Keeps the content on a single line */
                    margin: 0 auto;
                    /* Gives that scrolling effect as the typing happens */
                    letter-spacing: 1px;
                    animation:
                        typing 3.5s steps(40, end),
                        blink-caret .75s step-end infinite;
                }

                /* The typing effect */
                @keyframes typing {
                    from {
                        width: 0
                    }

                    to {
                        width: 100%
                    }
                }

                /* The typewriter cursor effect */
                @keyframes blink-caret {

                    from,
                    to {
                        border-color: transparent
                    }

                    50% {
                        border-color: rgba(255, 166, 0, 0.041);
                    }
                }

            </style>



            <div id="main-contain-for-md" class="owl-carousel owl-theme">



                <div id="pp-1" class="pp-1">
                    <div style="height: 5vh"></div>

                    <div style="align-items:center; text-align:center; padding:1rem;">
                        <img style="margin:auto; width:3rem; height:4rem;"
                            src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}">
                        <h2 style="font-family: 'Capriola', 'Fauna One', sans-serif; font-size:1.1rem;">Banyuwangi
                        </h2>
                        <h6 class="typewriter"
                            style="font-family: 'Titillium Web', 'Roboto', sans-serif; font-size:0.7rem;">Semakin
                            Digital, Sehat, Kreatif</h6>
                    </div>


                    <div style="height: 15vh"></div>

                    <div style="align-self:center; margin:auto; width:90%; align-items:center;  color: #08916c;">
                        {{-- <div style="width: 100%; text-align:center">
                                <h5 style="text-align:center; margin:auto;">Cari info menarik</h5>
                            </div> --}}
                        <div style="padding:1rem; margin:auto; cursor:pointer">
                            <div style="padding:1rem; margin:auto">
                                <form action="#" style="color:inherit; margin:auto; align-self:center auto;"
                                    class="form-inline search-form">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input id="search-input-form" data-trigger="#navbar_main_search" class="form-control  search-input-form" type="text"
                                        placeholder="Cari info menarik ">
                                    <i style="clear:both"></i>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tools-wrp" style="width: 100%; background:transparent !important">


                        <div class="tool-items">
                            <img class="tool-items-icon" src="https://banyuwangikab.go.id/images/icon/publik.png" alt="">
                           
                            <div class="multi-icon-text">Perencanaan</div>
                        </div>
                        <div class="tool-items">
                            <img class="tool-items-icon" src="https://banyuwangikab.go.id/images/icon/layanan.png" alt="">
                            <div class="multi-icon-text">Transparansi</div>
                        </div>

                        <div class="tool-items">
                            <img class="tool-items-icon" src="https://banyuwangikab.go.id/images/icon/transparansi.png" alt="">
                            <div class="multi-icon-text">JDIH</div>
                        </div>

                        <div class="tool-items">
                            <img class="tool-items-icon" src="https://banyuwangikab.go.id/images/icon/pengaduan_logo.png"
                                alt="">
                            <div class="multi-icon-text">CCTV</div>
                        </div>

                    </div>


                    <div class="tools-wrp" style="width: 100%; background:transparent !important">


                        <div class="tool-items">
                            <img class="tool-items-icon" src="https://banyuwangikab.go.id/images/icon/publik.png" alt="">
                            <div class="multi-icon-text">Data</div>
                        </div>
                        <div class="tool-items">
                            <img class="tool-items-icon" src="https://banyuwangikab.go.id/images/icon/layanan.png" alt="">
                            <div class="multi-icon-text">GIS</div>
                        </div>

                        <div class="tool-items">
                            <img class="tool-items-icon" src="https://banyuwangikab.go.id/images/icon/transparansi.png" alt="">
                            <div class="multi-icon-text">Unggulan</div>
                        </div>

                        <div class="tool-items" data-trigger="#navbar_main">
                            <img class="tool-items-icon" src="{{ asset('presentation/b-asset/img/menu_kotak.png') }}"
                                alt="">
                            <div class="multi-icon-text">Lainnya</div>
                        </div>

                    </div>

                    <div style="height: 1rem"></div>

                    <div id="btn_pintasan_main_content" style="margin:auto; 
                    text-align: center; 
                    width:50%; 
                    border-radius:5px; 
                    background:#fafafa18; 
                    font-size:0.8rem; 
                    color:#ffffff ">Pintasan informasi <i class="fas fas fa-chevron-right"></i>
                    </div>
                    




                    {{-- bottom tools --}}
                    <div class="bottom-based-tools-wrp bottom" style="width: 100% !important">

                        <div class="tools-wrp">


                            <div class="tool-items">
                                <img class="tool-items-icon" src="{{ asset('presentation/b-asset/img/icon-bwimap.png') }}" alt="">
                                <div class="multi-icon-text">Profil</div>
                            </div>
                            <div class="tool-items">
                                <img class="tool-items-icon" src="{{ asset('presentation/b-asset/img/layanan.png') }}" alt="">
                                <div class="multi-icon-text">Layanan</div>
                            </div>

                            <div class="tool-items">
                                <img class="tool-items-icon" src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt="">
                                <div class="multi-icon-text">Berita</div>
                            </div>

                            <div class="tool-items">
                                <img class="tool-items-icon" src="{{ asset('presentation/b-asset/img/customer_service.png') }}"
                                    alt="">
                                <div class="multi-icon-text">Kontak</div>
                            </div>

                        </div>
                    </div>


                </div>

                <div id="pp-2" class="pp-2">

                    <div id="dt-banner-top-pp-2" class="owl-carousel owl-theme" style="max-width: 100vw !important">

                        <div class="mb-line-2"
                            style="border-radius:0px; width:100% !important; height:6rem; line-height:6rem; background-image: url('{{ asset('presentation/b-asset/img/gandrung-sewu-bwidev.jpeg') }}'); ">
                            <div
                                style="color:#ffffff; letter-spacing:2px; font-size:1.5rem; text-align:right; padding-right:1rem; line-height:inherit; height:inherit; border-radius:inherit;  background: linear-gradient(to right,#5a5a5a1f, #3f3f3f69)">
                                <div>Festival</div>
                            </div>
                        </div>

                        <div class="mb-line-2"
                            style="border-radius:0px;  width:100% !important; height:6rem; line-height:6rem; background-image: url('{{ asset('presentation/b-asset/img/pulau_merah.jpg') }}'); ">
                            <div
                                style="color:#ffffff; letter-spacing:2px; font-size:1.5rem; text-align:right; padding-right:1rem; line-height:inherit; height:inherit; border-radius:inherit;  background: linear-gradient(to right,#5a5a5a1f, #3f3f3f69)">
                                <div>Wisata</div>
                            </div>
                        </div>


                        <div class="mb-line-2"
                            style="border-radius:0px;  width:100% !important; height:6rem; line-height:6rem; background-image: url('{{ asset('presentation/b-asset/img/food_tempong.jpg') }}'); ">
                            <div
                                style="color:#ffffff; letter-spacing:2px; font-size:1.5rem; text-align:right; padding-right:1rem; line-height:inherit; height:inherit; border-radius:inherit;  background: linear-gradient(to right,#5a5a5a1f, #3f3f3f69)">
                                <div>Kuliner</div>
                            </div>
                        </div>

                    </div>


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
                            width: 20%;
                            text-align: center;
                            align-items: center;
                            align-content: center;


                        }

                        .btn-left,
                        .btn-right {
                            text-align: center !important;
                            align-items: center !important;
                            align-content: center !important;
                        }

                        .btn-left,
                        .btn-right>i {
                            color: #03b5d4;
                            line-height: 20px !important;
                        }

                        .md-nlstmenu {
                            width: 80%;
                        }

                    </style>


                    <div class="divider-for-md"></div>

                    <div class="md-nlstmenu-wrp">
                        <div class="btn-left"><i
                                style="margin: auto; vertical-align:middle; align-self:center !important;"
                                class="fas fa-chevron-left"></i></div>
                        <div id="md-nlstmenu" class="md-nlstmenu">
                            <div class=" pills">Pemerintahan</div>
                            <div class=" pills">Pemerintahan</div>
                            <div class=" pills">Pemerintahan</div>
                            <div class=" pills">Pemerintahan</div>
                            <div class=" pills">Pemerintahan</div>
                        </div>
                        <div class="btn-right"><i style="margin: auto; vertical-align:middle"
                                class="fas fa-chevron-right"></i></div>


                    </div>

                    <div class="divider-for-md"></div>

                    <div class="container">


                        <div style="display: flex; flex-direction:row; padding:0.5rem;  box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); background:#ffffff54; border-radius:20px;">
                            <div style="height: 7rem; width:7rem; border-radius:1rem;   
                            background-image: url('{{ asset('presentation/b-asset/img/corona.jpg') }}');
                            background-size:100% 100%;
                            background-position:center center; ">
                            </div>
                            <div style="flex:1; padding-left:1rem;">
                                <div style="text-align: left; font-size:1rem">
                                    <strong>Vaksinasi</strong>
                                </div>

                                <div style="text-align: left; font-size:0.8rem">
                                    Vaksinasi 45%
                                </div>
                                <div style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                                    <div style="width: 45%; height:0.6rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem"></div>
                                </div>

                                <div style="height: 0.5rem"></div>
                                <div style="text-align: left; font-size:0.8rem">
                                    Vaksinasi 70%
                                </div>
                                <div style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                                    <div style="width: 70%; height:0.6rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem"></div>
                                </div>

                                <div style="height: 0.5rem"></div>


                            </div>
                        </div>

                        <div class="divider-for-md"></div>

                        <div style="display: flex; flex-direction:row; padding:0.5rem;  box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); background:#ffffff54; border-radius:20px;">
                            
                            <div style="flex:1; padding-right:1rem;">
                                <div style="text-align: left; font-size:1rem">
                                    <strong>Muslim Fashion Festival</strong>
                                     
                                </div>
                                <div style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                                    <div style="width: 90%; height:0.1rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem"></div>
                                </div>

                                <div style="height: 0.5rem"></div>
                               <div style="text-align:left; font-size:0.7rem;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos nam itaque 
                                   consequuntur eligendi totam, porro magnam temporibus animi odit repellendus.</div>


                            </div>


                            <div style="height: 7rem; width:7rem; border-radius:1rem;   
                            background-image: url('{{ asset('presentation/b-asset/img/festival_muslim.jpg') }}');
                            background-size:100% 100%;
                            background-position:center center; ">
                            </div>
                        </div>

                        <div class="divider-for-md"></div>

                        <div class="mb-line-1">
                            <div class="mb-half-single">
                                <div class="mb-half-single-content single-left"
                                    style="background-image: url('{{ asset('presentation/b-asset/img/corona.jpg') }}'); ">

                                </div>

                            </div>


                            <div class="mb-half-single ">
                                <div class="mb-half-single-content single-right"
                                    style="background-image: url('{{ asset('presentation/b-asset/img/festival_muslim.jpg') }}'); ">



                                </div>

                            </div>

                        </div>


                        <div class="divider-for-md"></div>

                        <div class="mb-line-1">
                            <div class="mb-half-single">
                                <div class="mb-half-single-content single-left"
                                    style="background-image: url('{{ asset('presentation/b-asset/img/corona.jpg') }}'); ">

                                </div>

                            </div>


                            <div class="mb-half-single ">
                                <div class="mb-half-single-content single-right"
                                    style="background-image: url('{{ asset('presentation/b-asset/img/festival_muslim.jpg') }}'); ">



                                </div>

                            </div>

                        </div>

                        <div class="divider-for-md"></div>
                        <div class="mb-line-1">
                            <div class="mb-half-single">
                                <div class="mb-half-single-content single-left"
                                    style="background-image: url('{{ asset('presentation/b-asset/img/corona.jpg') }}'); ">

                                </div>

                            </div>


                            <div class="mb-half-single ">
                                <div class="mb-half-single-content single-right"
                                    style="background-image: url('{{ asset('presentation/b-asset/img/festival_muslim.jpg') }}'); ">



                                </div>

                            </div>

                      

                    </div>

                </div>

            </div>

            

        </div>

    </div>




    @yield('page_content')

@endsection


@section('bottom1')
    {{-- <div style="height:20rem; background:rgb(81, 148, 148)"></div> --}}
@endsection

@section('footer')

    <script>

function onDraggedPage(ev){
                console.log(ev)
            }
            


        $(() => {


            $('#md-nlstmenu').slick({
                draggable: true,
                //   autoplay: true, /* this is the new line */
                //   autoplaySpeed: 2000,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                touchThreshold: 1000,
                prevArrow: $('.btn-left'),
                nextArrow: $('.btn-right'),

            });



        

            let owl2 = $('#main-contain-for-md');
            owl2.owlCarousel({
                singleItem: true,
                margin: 100,
                autoPlay: false

            });


            let owl3 = $("#dt-banner-top-pp-2");
            owl3.owlCarousel({
                singleItem: true,
                autoPlay: true,
                autoPlayTimeout: 200,
            });


            var $dots = $('.owl-dot');

            console.log($dots)

            function goToNextCarouselPage() {    
                var $next = $dots.filter('.active').next();

                if (!$next.length)
                    $next = $dots.first();

                $next.trigger('click');
            }

            $('#btn_pintasan_main_content').click(function () {
                console.log("oke oke")
                goToNextCarouselPage();
            });


           



            var lastScrollTop = 0;

            // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
            $("#pp-1,#pp-2").scroll(function(e) {

                if ($("#pp-1,#pp-2").scrollTop() > 200) {

                    $('#topNav').addClass("show-element");
                    $('#topNav').removeClass("hide-element");


                } else {
                    $('#topNav').removeClass("show-element");
                    $('#topNav').addClass("hide-element");
                }

            });

            $("#pp-2").scroll(function(e) {

                if ($("#pp-2").scrollTop() > 200) {

                    $('#topNav').addClass("show-element");
                    $('#topNav').removeClass("hide-element");


                } else {
                    $('#topNav').removeClass("show-element");
                    $('#topNav').addClass("hide-element");
                }

            });

            $('#pp-1').on('click',()=>{
                if ($("#pp-1").scrollTop() < 200) {
                    $('#topNav').addClass("hide-element");
                    $('#topNav').removeClass("show-element");
                    $('#topNav').addClass("hide-element");
                }
            })



        })
    </script>


    @parent
@endsection
