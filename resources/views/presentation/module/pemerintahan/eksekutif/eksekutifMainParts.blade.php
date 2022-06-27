<div class="pad-main-resume">

    {{-- TITLE MODUL --}}
    <div class="sg-title">
        <div class="sg-ic-wrp">
            <img class="sg-ic" src="{{ asset('presentation/b-asset/img/icon-pemerintahan.png') }}" alt="">
            <div class="sg-text">EKSEKUTIF</div>
        </div>

    </div>


</div>
<br>
<div class="container">
    <p>
        Eksekutif adalah cabang pemerintahan banyuwangi yang memiliki 
        kekuasaan dan bertanggung jawab untuk menerapkan hukum dan perundan-undangan. 
        Contoh paling umum dalam sebuah cabang eksekutif disebut ketua pemerintahan. 
        Eksekutif dapat merujuk kepada administrasi, dalam sistem presiden, atau sebagai pemerintah, dalam sistem parlementer. 
        </p>



<br>
{{-- MOST WIDGET --}}

    <div class="row">
        @foreach ($modulItems as $item)
            <div class="col-lg-4 col-md-4 col-sm-6">

                <a class="link-wrp" href="{{ url($item['link']) }}">
                    <div class="sg-widget-wrapper">
                        <div class="wg-ic-wrp">
                            <img class="ic" src="{{ asset($item['icon']) }}" alt="">
                        </div>
                        <div class="sg-div-wrp">
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

<h2 style="background: #4ea1ac; padding:1rem; ">Catatan:: konten halaman ini silakan merujuk pada web 
    <a style="color:blue" href="https://banyuwangikab.go.id/bwidev/">https://banyuwangikab.go.id/bwidev</a> </h2>
    <br>
    <br><br>


<article class="article-justify">
    <h2>Judul paragraf </h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita labore nulla vitae inventore. At nihil
        laboriosam, qui aspernatur cum eos odit expedita. Saepe maxime delectus exercitationem nemo cupiditate in
        sapiente!, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut ab possimus sit consectetur eveniet quidem veritatis eos iure quo exercitationem aliquid qui, dolorum deserunt corrupti nesciunt laudantium perspiciatis? Debitis, quasi?
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quod error totam fugit. Magni quos minus velit repellat id fuga necessitatibus corrupti labore? Ab officia aliquam, veritatis voluptates ducimus at.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptatem nam cumque eos deserunt ducimus non! Incidunt, aspernatur ad voluptates at, aut odio, ea excepturi facere quia perspiciatis consectetur illum!
</p>

<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita labore nulla vitae inventore. At nihil
    laboriosam, qui aspernatur cum eos odit expedita. Saepe maxime delectus exercitationem nemo cupiditate in
    sapiente!, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut ab possimus sit consectetur eveniet quidem veritatis eos iure quo exercitationem aliquid qui, dolorum deserunt corrupti nesciunt laudantium perspiciatis? Debitis, quasi?
Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quod error totam fugit. Magni quos minus velit repellat id fuga necessitatibus corrupti labore? Ab officia aliquam, veritatis voluptates ducimus at.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptatem nam cumque eos deserunt ducimus non! Incidunt, aspernatur ad voluptates at, aut odio, ea excepturi facere quia perspiciatis consectetur illum!
</p>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita labore nulla vitae inventore. At nihil
    laboriosam, qui aspernatur cum eos odit expedita. Saepe maxime delectus exercitationem nemo cupiditate in
    sapiente!, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut ab possimus sit consectetur eveniet quidem veritatis eos iure quo exercitationem aliquid qui, dolorum deserunt corrupti nesciunt laudantium perspiciatis? Debitis, quasi?
Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quod error totam fugit. Magni quos minus velit repellat id fuga necessitatibus corrupti labore? Ab officia aliquam, veritatis voluptates ducimus at.
Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptatem nam cumque eos deserunt ducimus non! Incidunt, aspernatur ad voluptates at, aut odio, ea excepturi facere quia perspiciatis consectetur illum!
</p>


</article>


<article class="article-justify">
    <h2>Judul paragraf</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita labore nulla vitae inventore. At nihil
        laboriosam, qui aspernatur cum eos odit expedita. Saepe maxime delectus exercitationem nemo cupiditate in
        sapiente!</p>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita labore nulla vitae inventore. At nihil
        laboriosam, qui aspernatur cum eos odit expedita. Saepe maxime delectus exercitationem nemo cupiditate in
        sapiente!</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita labore nulla vitae inventore. At nihil
        laboriosam, qui aspernatur cum eos odit expedita. Saepe maxime delectus exercitationem nemo cupiditate in
        sapiente!</p>

</article>

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
