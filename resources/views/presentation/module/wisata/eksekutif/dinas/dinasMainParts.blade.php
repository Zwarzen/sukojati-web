<div class="pad-main-resume">

    {{-- TITLE MODUL --}}
    <div class="sg-title">
        <div class="sg-ic-wrp">
            <img class="sg-ic" src="{{ asset('presentation/b-asset/img/icon-pemerintahan.png') }}" alt="">
            <div class="sg-text">DINAS - DINAS BANYUWANGI</div>
        </div>

    </div>


</div>
<br>

<div class="container">


    <article class="article-justify">
        <div class="heading-title heading-dotted text-left">
            <h4>KEDUDUKAN, TUGAS DAN FUNGSI</h4>
        </div>
        <ul>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>
        </ul>
    </article>

    <br>
    {{-- MOST WIDGET --}}

    <div class="row">
        @foreach ($dinasItems as $item)
            <div class="col-lg-12 col-md-12 col-sm-12">

                <a class="link-wrp" href="{{ url($item['link']).'?sn='.$item['shortname'].'&jenis='.$item['jenisOpd'] }}">
                    <div class="sg-widget-wrapper">
                        <div class="wg-ic-wrp" style="height:40px; width:40px">
                            <img class="ic" style="height:40px; width:40px" src="{{ asset($item['icon']) }}" alt="">
                        </div>
                        <div class="sg-div-wrp">
                            <h4 class="dt-slick-txt-header" style="font-size: 1rem !important"> {{ $item['name'] }}</h4>
                            <small> <i>{{ $item['desc'] }}</i> </small>
                            @if (isset($item['data']))
                                <div class="dt-slick-budaya">
                                    @foreach ($item['data'] as $v)
                                        <div class="dt-slick-txt">
                                            <span> {{ $v }}</span>
                                        </div>
                                        <div class="dt-slick-txt">
                                            <span> {{ $v }}</span>
                                        </div>
                                    @endforeach

                                </div>
                            @endif

                        </div>

                    </div>
                </a>

            </div>
        @endforeach


    </div>
    <br>
  


</div>


<script>
    $(document).ready(function() {
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
