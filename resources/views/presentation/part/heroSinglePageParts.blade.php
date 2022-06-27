<div class="xhero-wrap ximg">

    @if (isset($urlWallpaper))
        {{-- <style>
            .hero-wrap{
                background-image: url('{{ $urlWallpaper[0] }}') !important;
            }
        </style> --}}
        <div style="position:relative; top:0px;">
            <div class="dt-slick-hero">
                @foreach ($urlWallpaper as $item)
                    <div class="hero-wrap img"
                        style="background-size:cover; height: 40vh; width: 100vh;  background-image: url('{{ $item }}') !important">
                        <div class="overlay"></div>
                    </div>
                @endforeach
            </div>
        </div>

{{-- 
        <div class="hero-wrap img" style="margin-top:-14vh;">
            <div class="hero-content-page">
                @yield('pageContent')
            </div>
        </div> --}}

    @else

        <div style="position:relative; top:0px;">
            <div class="dt-slick-hero">
                <div class="hero-wrap img"
                    style="background-size:cover; height: 70vh; width: 100vh;  background-image: url('{{ asset('presentation/b-asset/img/gedung_pemkab_bwidev.jpg') }}') !important">
                    <div class="overlay"></div>
                </div>
            </div>
        </div>

        <div class="hero-wrap img" style="margin-top:-12vh;">
            <div class="hero-content-page">

                @yield('pageContent')
            </div>
        </div>
    @endif





</div>


<script>
    $(() => {
        $('.dt-slick-hero').slick({
            pauseOnHover: false,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            speed: 5000,
            prevArrow: false,
            nextArrow: false,
            fade: true,
            cssEase: 'ease-in-out',

        });
    })
</script>
