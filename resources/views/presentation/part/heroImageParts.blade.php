
<div class="xhero-wrap ximg">
    
    @if(isset($urlImageBfest))
        {{-- <style>
            .hero-wrap{
                background-image: url('{{ $urlImageBfest[0] }}') !important;
            }
        </style> --}}
        <div style="position:sticky; top:0px;">
            <div class="dt-slick-hero">
                @foreach ($urlImageBfest as $item)
                <div class="hero-wrap img" style=" background-attachment: fixed; height: 100vh; width: 100vh;  background-image: url('{{ $item }}') !important">
                    <div class="overlay"></div>
                </div>
                @endforeach
            </div>
        </div>
        

        <div class="hero-wrap img" style="margin-top:-70vh;">
            <div class="hero-content-page">
                @yield('pageContent')
            </div>
        </div>

    @else

        <div class="hero-wrap img">
            <div class="hero-content-page">
                
                @yield('pageContent')
            </div>
        </div>
    @endif

    
    
    

</div>


<script>

    $(()=>{
        $('.dt-slick-hero').slick({
            pauseOnHover:false,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            infinite: true,
            speed: 2000,
            prevArrow: false,
            nextArrow: false,
            fade: true,
            cssEase: 'ease-in-out',

        });
    })
</script>