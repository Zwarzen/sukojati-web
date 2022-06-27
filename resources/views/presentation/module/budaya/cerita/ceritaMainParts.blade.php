{{-- <div class="modul-sized-box"></div> --}}

<!-- <style>
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
</style> -->



<!-- <div class="container pad-main-resume">

    <div class="row">
    
    </div>
</div> -->
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
