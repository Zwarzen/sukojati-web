@extends('presentation.layouts.mainOpdContent')


@section('navigation')
    @parent
    {{-- @include('presentation.module.opd.navOpd')
    @include('presentation.module.opd.navMenuOpdSide') --}}

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

        @include("presentation.module.opd.opdListBanner",['latestBannerOpdData'=>$latestBannerOpd])


        <div>

        </div>

        <div style="height: 2rem"></div>
        <div class="container">
            @include('presentation.module.berita.beritaPartTerbaru',["latestBerita"=>isset($latestBerita)?$latestBerita:null])
        </div>

        {{-- gallery section --}}
        <div style="height: 2rem"></div>
        <div class="container">
            @include('presentation.module.galeri.galeriPartTerbaru',["latestGaleri"=>isset($latestGaleri)?$latestGaleri:null])
        </div>



    @yield('page_content')

    </div>

@endsection

@php

$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp

@section('bottom1')
    <style>
        #btnTop {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 20px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color: rgba(26, 23, 23, 0.555); /* Set a background color */
            color: white; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 1rem 2rem 1rem 2rem; /* Some padding */
            border-radius: 10px; /* Rounded corners */
            font-size: 18px; /* Increase font size */
            }

            #btnTop:hover {
            background-color: rgb(199, 187, 187); /* Add a dark-grey background on hover */
            }
    </style>
    {{-- scrool to top button --}}
    <button onclick="topFunction()" id="btnTop"  title="Go to top"><i class="fas fa-chevron-up fa-up" aria-hidden="true"></i></button>


    <!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4"
    >

      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4" style="text-align: left">
            <!-- Content -->
            <div class="fw-bold mb-4" style="color: aliceblue">
                <h1>{{ $opdProfile->nama }}</h1>
                Kabupaten Banyuwangi
            </div>

            <div style="
                position: relative;
                top: -8rem;
                left: -3rem;
                z-index:10;
                height:15rem;
                width:15rem;
                opacity:0.1;
                background: url('https://www.banyuwangikab.go.id/presentation/b-asset/img/logo-bwi-black-and-white.png');
                background-size:cover;
                background-repeat:no-repeat"></div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-3" style="text-align: left; color:aliceblue">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Kontak</h6>
                <?php if(!(is_null($opdProfile->alamat) || $opdProfile->alamat == '') ){?>
                <p><i class="fa fa-home me-3"></i> {{ $opdProfile->alamat }}</p>
                <?php }; ?>
                <?php if(!(is_null($opdProfile->surel) || $opdProfile->surel == '') ){?>
                <p><i class="fa fa-envelope me-3"></i> {{ $opdProfile->surel }}</p>
                <?php }; ?>
                <?php if(!(is_null($opdProfile->telp) || $opdProfile->telp == '') ){?>
                <p><i class="fa fa-phone me-3"></i> {{ $opdProfile->telp }}</p>
                <?php }; ?>
                <?php if(!(is_null($opdProfile->fax) || $opdProfile->fax == '') ){?>
                <p><i class="fa fa-print me-3"></i>  {{ $opdProfile->fax }}</p>
                <?php }; ?>
                <?php if(!(is_null($opdProfile->facebook) || $opdProfile->facebook == '') ){?>
                <p><i class="fa fa-facebook-official me-3"></i>  <a href="{{ $opdProfile->url_facebook }}" target="_blank" style="color:white !important">{{ $opdProfile->facebook }}</a></p>
                <?php }; ?>
                <?php if(!(is_null($opdProfile->ig) || $opdProfile->ig == '') ){?>
                <p><i class="fa fa-instagram me-3"></i>  <a href="{{ $opdProfile->url_ig }}" target="_blank" style="color:white !important">{{ $opdProfile->ig }}</a></p>
                <?php }; ?>
                <?php if(!(is_null($opdProfile->youtube) || $opdProfile->youtube == '') ){?>
                <p><i class="fa fa-youtube-play me-3"></i>  <a href="{{ $opdProfile->url_youtube }}" target="_blank" style="color:white !important">{{ $opdProfile->youtube }}</a></p>
                <?php }; ?>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-md-0 mb-5">
            <!-- Links -->
            <iframe
            width="100%"
            height="350"
            style="border:0"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDemIE8raZumgakvLyengJgYqNvkGlYxWM
              &q={{ $opdProfile->nama }}">
          </iframe>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2022 Copyright
      <a class="text-reset fw-bold" >{{ $opdProfile->alias }}</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


    {{-- <footer class="footer">

        <div class="row" style="background:#0a0a0a70; height:100% ; position:relative; z-index:2">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <div style="
                position: absolute;
                z-index:-1;
                top:1rem;
                right:0rem;
                height:20rem;
                width:20rem;
                opacity:0.1;
                background: url('https://www.banyuwangikab.go.id/presentation/b-asset/img/logo-bwi-black-and-white.png');
                background-size:cover;
                background-repeat:no-repeat"></div>
                </div>


            <div class="xbottom-based-tools-wrp" style="bottom: 0;">
                <div style="text-align: center; color:#fffffffa; font-size:0.9rem;">
                    © 2022 {{ $opdProfile->alias }} <i class="fas fa-heart" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </footer> --}}


</div>

<script>
    //Get the button:
    mybutton = document.getElementById("btnTop");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>

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
