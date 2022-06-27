@extends('presentation.layouts.mainArtikelOpdContent')



@section('top1')
    {{-- <div id="based-div-1" class="based-div-1"></div>
    <div class="screen-overlay"></div> --}}
    {{-- <div id="based-div-2"
    class="based-div-2"></div> --}}
@endsection


{{-- get data current opd --}}
@php
$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp

@section('pageContent')


@php

$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp


    {{-- style --}}
    <style>

    </style>
    {{-- end style --}}

    <div id="ctn-utama" class="based-div-1">
        <div
            style="
                    background:linear-gradient(10deg, #eeeeee 1%,  #eeeeee, #eeeeee);
                    opacity:1; content:'';
                    position:absolute; top:0; bottom:0px; left:0px; right:0px; width:100%; ">
        </div>


        {{-- bottom tools --}}

        <div id="main-content"
            style="opacity: 1; z-index:1; position: relative; max-height:100vh; overflow-y:auto; overflow-x:hidden;"
            class="scroller">


            <div id="p-2" class="" style="scroll-behavior: smooth; min-height: 100vh;">
                <div id="p-2-inner">

                    <div class="container">
                        {{-- @include('presentation.module.galeri.kanalGaleri') --}}
                    </div>


                    <style>
                        .galeri-utama-item {
                            height: 100vh;
                            background-position: center;
                            background-color: gray;
                            background-size: cover;
                        }

                        .galeri-utama-desc-cont {
                            background: linear-gradient(to bottom, #3b3b3b00 20%, #000000c9);
                            color: #ffffff;
                            height: inherit;
                        }

                        .galeri-utama-desc {
                            color: #ffffff;
                            bottom: 0%;
                            width: 100%;
                            position: absolute;
                            padding: 5%;
                            font-family: 'Noto Sans Display';
                            text-align: left;
                        }

                        .galeri-utama-desc .--title {
                            font-size: 5rem;
                            font-family: 'Noto Sans Display';
                        }


                        .galeri-utama-desc .--subb-title {
                            font-size: 1rem;
                            font-family: 'Noto Sans Display';
                        }
                    </style>
                    {{-- <div class="galeri-utama-item" style="
                            background-image:url('media/galeri/original/{{ $galeriUtama->img_raw }}')">

                        <div class="galeri-utama-desc-cont">
                            <div class="galeri-utama-desc">

                                <div class="--title">{{ $galeriUtama->title }}</div>
                                <div style="background: #ffffff; width:50%; height:1px;margin-top:0.5rem; margin-bottom:0.5rem"></div>
                                <div class="--sub-title">{{ $galeriUtama->desc }}</div>

                            </div>

                        </div>

                    </div> --}}
                    <div style="height:1rem"></div>


                    <div class="container" style="z-index: 2; position: relative;">
                        {{-- @include('presentation.module.galeri.galleryParts') --}}
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

                        .owl-carousel .owl-wrapper-outer {
                            /* overflow: hidden; */
                            position: unset !important;
                            /* width: 100%; */
                            /* z-index: 5; */
                        }

                        /* new style */
                        .imgal-container{line-height:0;-webkit-column-count:5;-webkit-column-gap:0;-moz-column-count:5;-moz-column-gap:0;column-count:5;column-gap:0}
                        .imgal-img{width:100%;height:auto;transition:filter .2s;box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);padding: 5px}
                        .imgal-img:hover{-webkit-filter:opacity(80%);filter:opacity(80%);cursor:pointer}.imgal-modal{margin:auto;position:absolute;top:0;left:0;bottom:0;right:0;background-color:#000;color:#fff;vertical-align:middle;height:100vh;width:100vw}#imgal-modal-close{display:inline;font-size:2rem;position:absolute;top:1rem;right:1.5rem;cursor:pointer}.imgal-modal-img{width:100%;height:100%;object-fit:contain}@media only screen and (max-width:768px){.imgal-container{line-height:0;-webkit-column-count:2;-webkit-column-gap:0;-moz-column-count:2;-moz-column-gap:0;column-count:2;column-gap:0}}@media only screen and (min-width:768px){.imgal-container{line-height:0;-webkit-column-count:3;-webkit-column-gap:0;-moz-column-count:3;-moz-column-gap:0;column-count:3;column-gap:0}}@media only screen and (min-width:992px){.imgal-container{line-height:0;-webkit-column-count:4;-webkit-column-gap:0;-moz-column-count:4;-moz-column-gap:0;column-count:4;column-gap:0}}@media only screen and (min-width:1200px){.imgal-container{line-height:0;-webkit-column-count:5;-webkit-column-gap:0;-moz-column-count:5;-moz-column-gap:0;column-count:5;column-gap:0}}

                        /* style for modal */
                        /* The Modal (background) */
                        .modal {
                        display: none; /* Hidden by default */
                        position: fixed; /* Stay in place */
                        z-index: 1; /* Sit on top */
                        padding-top: 100px; /* Location of the box */
                        left: 0;
                        top: 0;
                        width: 100%; /* Full width */
                        height: 100%; /* Full height */
                        overflow: auto; /* Enable scroll if needed */
                        background-color: rgb(0,0,0); /* Fallback color */
                        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
                        }

                        /* Modal Content (Image) */
                        .modal-content {
                        margin: auto;
                        display: block;
                        width: 80%;
                        max-width: 700px;
                        }

                        /* Caption of Modal Image (Image Text) - Same Width as the Image */
                        #caption {
                        margin: auto;
                        display: block;
                        width: 80%;
                        max-width: 700px;
                        text-align: center;
                        color: #ccc;
                        padding: 10px 0;
                        height: 150px;
                        }

                        /* Add Animation - Zoom in the Modal */
                        .modal-content, #caption {
                        animation-name: zoom;
                        animation-duration: 0.6s;
                        }

                        @keyframes zoom {
                        from {transform:scale(0)}
                        to {transform:scale(1)}
                        }

                        /* The Close Button */
                        .close {
                        position: absolute;
                        top: 15px;
                        right: 35px;
                        color: #f1f1f1;
                        font-size: 40px;
                        font-weight: bold;
                        transition: 0.3s;
                        }

                        .close:hover,
                        .close:focus {
                        color: #bbb;
                        text-decoration: none;
                        cursor: pointer;
                        }

                        /* 100% Image Width on Smaller Screens */
                        @media only screen and (max-width: 700px){
                        .modal-content {
                            width: 100%;
                        }
                        }

                        /* pagination */
                        .pagination{
                            justify-content: center
                        }

                    </style>



                    <div class="container" style="margin-top: 2rem">

                            <h2 style="font-size:1.2rem;">Gallery {{ $opdProfile->alias }}</h2>

                                <div class="imgal-container">
                                @foreach ($galeriHots as $item)
                                    <img class="imgal-img" src="{{ asset('media/galeri/original/' . $item->img_raw) }}" alt="{{ $item->title }}">
                                @endforeach
                                </div>

                                <div style="margin-top:2rem">
                                {{ $galeriHots->links() }}
                                </div>

                                <!-- The Modal -->
                                <div id="myModal" class="modal" style="margin-top: 3rem">

                                    <!-- The Close Button -->
                                    <span class="close">&times;</span>

                                    <!-- Modal Content (The Image) -->
                                    <img class="modal-content" id="img01">

                                    <!-- Modal Caption (Image Text) -->
                                    <div id="caption"></div>
                                </div>



                        <!-- <div style="height: 2rem"></div> -->

                        {{-- <!-- @include('presentation.module.galeri.galeriPartVideoTerbaru') --> --}}

                        <!-- <div style="height:2rem"></div> -->


                        {{-- <!-- @include('presentation.module.galeri.galleryPartsKategori') --> --}}

                        {{-- channel berita umum --}}



                        {{-- channel olahraga --}}



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
    $(document).ready(function(){
	$('.imgal-img').click(function(){
		let imageSrc = $(this).attr("src");
		let imageAlt = $(this).attr("alt");

		// $('.imgal-container').hide();

        let modal = document.getElementById("myModal");
        let modalImg = document.getElementById("img01");
        let captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = imageSrc;
        captionText.innerHTML = imageAlt;

		// $('body').append(
		// 	'<div class="imgal-modal">'+
		// 	'<span id="imgal-modal-close"">X</span>'+
		// 	'<img src="' + imageSrc + '" alt="' + imageAlt + '" class="imgal-modal-img"></img>'+
		// 	'</div'
		// ).hide().show('fast');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

		// $('#imgal-modal-close').click(function(){
		// 	$('.imgal-container').show();
		// 	$('.imgal-modal').hide('fast', function(){
		// 		$(this).remove();
		// 	});
		// });
	});
});

</script>

    <script>
        $(() => {
            // $('#topNav,#toolbar-bottom').addClass("hide-element");
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

        })
    </script>

    @parent
@endsection
