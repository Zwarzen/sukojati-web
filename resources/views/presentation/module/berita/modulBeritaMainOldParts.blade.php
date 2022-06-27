{{-- <div class="modul-sized-box"></div> --}}

{{-- <style>
    .center .slick-slide.slick-current.slick-active.slick-center{
        transform: scale(2);
        margin-right: 5rem;
        margin-left: 5rem;
    }

    .center .slick-slide:hover{
        transform: scale(2);
    }

    @media screen and (max-width:800px){
        .center{
            display: none;
        }
    }
</style>

<div class="center " style="margin:-10rem auto 4rem auto; align-self:center; max-width:70%">
    @foreach ($newsHots as $item => $val)
        <div slick-data="dt-slick-my" style="
        background:url('{{ $val['poster'] }}');
        text-align:center; 
        align-items:center; 
        background:transparent; 
        padding:1rem;
        margin-right:1rem;
        margin-left:1rem;
        ">
            <div style="background: #ffffff; ">
                <div style="background:url('{{ url($val['poster']) }}');
                background-size:100% 100%;
            height:10rem;
            text-align:center; 
            align-items:center;"></div>
                <div style="padding: 1rem">{{ $val['title'] }}</div>
            </div>


        </div>
    @endforeach

</div> --}}

<div class="container pad-main-resume">



    {{-- TITLE MODUL --}}
    {{-- <div class="berita-modul-title">
        <div class="berita-modul-ic-wrp">
            <div class="berita-modul-text">BERANDA</div>
        </div>

    </div> --}}


    {{-- <div class="mrg-top-5rem"></div> --}}


    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <div class="owl-carousel owl-theme" id="berita-beranda" style="background:transparent">


                @foreach ($newsHots as $item => $val)
                    <a href="">
                        <div slick-data="dt-slick-my" style="
                        background:url('{{ url($val['poster']) }}');
                        min-height:25rem;
                        align-items:bottom start;
                        align-content:bottom start;
                        text-align:left;
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center center;">
                            <div style=" background: linear-gradient(to top, rgba(31, 30, 30, 0.356),  rgba(61, 61, 61, 0.116));
                                color:#ffffff; position: absolute;bottom:0; left:0; padding:1rem; text-align:left">
                                <span style="font-size:1rem">
                                    <strong>
                                        {{ url($val['title']) }}
                                    </strong>
                                </span> <br>
                                <span style="font-size:0.8rem"> kanal name | {{ $val['publish-date'] }} </span>
                            </div>
                        </div>
                    </a>
                @endforeach




            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">

            <div style="min-height:400px;  padding-bottom:1rem; background:transparent">
                <div style="font-size:1.5rem; color:#4ea1ac; background:transparent;">
                    <strong>Populer</strong>
                    <div style="content:''; background:#4ea1ac; height:0.2rem; width:12rem; margin-bottom:0.5rem">
                    </div>
                    <!-- <small
                            style=" font-size:1rem; color:blue; position:absolute; float:right; right:1rem; margin-top:1rem">Lainnya</small> -->
                </div>

                <div style="max-height:370px; overflow:auto; margin-top:1rem; padding-right:1rem">

                    @foreach ($newsHots as $item => $val)


                        <a href="" style="color:black">

                            <div style="display:flex; flex-direction:row; padding-bottom:2rem;">
                                <div style="flex:2; font-size:0.8rem; text-align:left">
                                    <strong>
                                        {{ $val['title'] }}
                                    </strong>
                                </div>

                                <div style="
                                flex:1;
                                margin-left:1rem;
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: center center;
                                background-image: url(' {{ url($val['poster']) }} ');
                                height:100px; width:100px"></div>

                            </div>
                            <div style="clear:both"></div>


                        </a>
                    @endforeach
                </div>

            </div>


        </div>
    </div>

   
</div>
<br>





<script>
    $(document).ready(function() {

        $('.carousel').carousel()

        let owl = $('#berita-beranda');
        owl.owlCarousel({
            singleItem: true,
            margin: 100,
            autoPlay: true,
            autoPlayTimeout: 3000

        });


        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });


        $('.dt-slick-budaya').slick({
            autoplay: true,
            autoplaySpeed: 1000,
            dots: false,
            infinite: true,
            speed: 1000,
            prevArrow: false,
            nextArrow: false,
            fade: true,
            cssEase: 'ease-in-out',
            touchThreshold: 100,
            draggable: true,

        });
    })
</script>
