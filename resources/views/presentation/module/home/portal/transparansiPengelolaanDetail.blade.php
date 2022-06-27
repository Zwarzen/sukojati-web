@extends('presentation.layouts.mainOpdContent')


@section('navigation')
    @include('presentation.module.opd.navOpd')
    @include('presentation.module.opd.navMenuOpdSide')

    {{-- @include('presentation.module.home.portal.navSearch')
    @include('presentation.module.berita.navBeritaMenu')
    @include('presentation.module.home.portal.navBasedModal') --}}
@endsection

@section('top1')
    {{-- <div id="based-div-1" class="based-div-1"></div>
    <div class="screen-overlay"></div> --}}
    {{-- <div id="based-div-2"
    class="based-div-2" style="background: #f3f3f3"></div> --}}
@endsection


@section('pageContent')

    <div class="container based-page-opd">
        <div style="height: 4rem"></div>
        <style>
        .top-nav-tools-container{
            padding: 1rem;
        }
        .tool-inputs{
            background: #ffffff;
            color: #2c373d;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin-left: 0.5rem;
            margin-right: 0.5rem;


        }

        .tools-btn{
            background: #e7f9ff;
            color: #186491;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            cursor: pointer;
        }

        .tools-btn a{
            color: #186491;
            text-align: center;
        }

        .tool-items-text1{
            color: #186491;
            text-align: center;
            font-family: monospace;
            font-size: 1rem;
            font-weight: bold;
        }


    </style>

<header>
            <div style="height: 5vh"></div>
            <br>
            <h3 class="">Transparansi Pengelolaan Anggaran dan Pertanggungjawaban( {{ $kategori->kategori }} tahun {{ $tahun }} ) </h3>
        </header>
        <br>
        <!-- <p align="justify"> -->

        <!-- </p> -->
        <p align="justify">

            <table id="table4" class="table table-hover table-striped table-bordered">

                <tbody>
                @foreach ($detail as $key => $os)
                    <tr>
                        <td>
                        {{ ++$key + ($detail->currentPage()-1) * $detail->perPage() }}
                        </td>


                        <td>
                            <span><a href="{{ asset('media/anggaran/pdf').'/'.$os->nama_file}}" target="__blank"> {{ $os->judul_dokumen }} </a></span> <br>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="center">
                {{ $detail->render('pagination::bootstrap-4') }}
            </div>
            </p>



    @yield('page_content')

    </div>

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
