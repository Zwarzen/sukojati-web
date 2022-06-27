{{-- <div class="modul-sized-box"></div> --}}
<div class="pad-main-resume">

    {{-- TITLE MODUL --}}
    <div class="modul-title">
        <div class="modul-ic-wrp">
            <img class="modul-ic" src="{{ asset('presentation/b-asset/img/icon-budaya.png') }}" alt="">
            <div class="modul-text">BUDAYA</div>
        </div>
        
    </div>

    <div class="mrg-top-5rem"></div>
    
    {{-- FORM SEARCH CONTENT --}}
    <div style="display:flex;  flex-direction:row">
        <div style="padding:1rem; flex:1">
            <form action="#" style="color:white; margin:auto; align-self:center auto; flex:1"
                class="form-inline search-form">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input class="form-control  search-input-form" type="text" placeholder="Mencari sesuatu di Budaya... ">
                <i styl="clear:both"></i>
            </form>
        </div>
    </div>
</div>
<br>


<br>
{{-- MOST RESUME --}}
<div class="row">
    @foreach ($modulItems as $item)
        <div class="col-lg-4 col-md-4 col-sm-6">

            <a class="link-wrp" href="{{ url($item['link']) }}">
                <div class="widget-wrapper">
                    <div class="wg-ic-wrp">
                        <img class="ic" src="{{ asset($item['icon']) }}"
                            alt="">
                    </div>
                    <div class="wg-div-wrp">
                        <h4 class="dt-slick-txt-header"> {{ $item['name'] }}</h4>
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
<br>




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
