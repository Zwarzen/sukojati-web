@extends('presentation.layouts.mainArtikelNewsContent')

@section('pageContentArtikel')
    <div style="height: 5vh"></div>
    <div style="height: 5vh"></div>
    <div class="container">



        <div class="row">
            <div class="col-12 col-lg-8 col-md-12">
                <article>
                    <header>
                        <h1 class="">{{ $video->title }}</h1>
                    </header>


                    <h2> <small style="font-size: 0.9rem"> 
                        <i class="fas fa-calendar-alt"></i> 
                        {{ \Carbon\Carbon::parse($video->created_at)->format("Y-m-d") }} 
                        {{ strlen($video->desc) >10? strlen($video->desc) :   $video->title   }}</small>
                    </h2>
                    <br>

                    @if(strlen($video->url_video) > 3)

                    <div style="margin-right:1rem; margin-bottom:1rem; align-items:left; text-align:left; float: left; ">
                        <video style="width:100%; max-height:400px; border-radius:15px"
                            poster="{{ asset('presentation/b-asset/img/poster_vidio.jpg') }}" controls>
                            <source src="{{ asset('media/berita/video/maribelanja_4_4_Trim.mp4') }}" type="video/mp4">
                            {{-- <source src="movie.ogg" type="video/ogg"> --}}
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @else


                    <style>
                        .videowrapper {
                            float: none;
                            clear: both;
                            width: 100%;
                            position: relative;
                            padding-bottom: 56.25%;
                            padding-top: 25px;
                            height: 0;
                            background:url('{{ asset("presentation/b-asset/img/loading3.gif")  }}') center center no-repeat;
                        }

                        .videowrapper iframe {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                        }

                    </style>
                    <div class="videowrapper">
                        <iframe width="560" height="315" style="border-radius: 15px;"
                            src="https://www.youtube.com/embed/{{ $video->id_youtube }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    

                    @endif



                </article>
            </div>
            <div class="col-12 col-lg-4 col-md-12">
                <aside>
                    @include('presentation.module.berita.video.ngetrenBeritaVideo')
                </aside>
            </div>
        </div>

        <br>
        <br>

        
        @if(isset($beritaRelated) && count($beritaRelated)> 0)
        <div style="font-weight: 600">Berita Terkait</div>
        <hr>
        <aside>
            <div class="row">
                @foreach ($beritaRelated as $item)
                    <div class="col-6 col-md-6 col-lg-3" style="background: transparent">
                        <a href="{{ route('berita.video')."/".$item->slug }}" title="{{ $item->title }}">

                        <div style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff">
                            <div style="
                            border-radius:15px 15px 0px 0px;
                            width:100%;
                            height:150px;
                            background-image: url('{{ $item->img_thumb != '' || $item->img_thumb != null? $base_link_media_thumbnail .$item->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                            background-size:cover; 
                            background-position:center;
                            padding:0.5rem;
                            float:right;
                             ">
                           
                               
                            </div>
                                <div style="background: #ffffff; padding:1rem; border-radius: 15px 15px 15px 15px ; text-align:left; font-weight:600">
                                    {{ strlen($item->title)  > 60 ? substr($item->title,0, 60)."..." : $item->title }}
                                </div>

                        </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <br>
            <br>
            <nav>
                <a class="btn default" href="{{ route('berita.video') }}" style="color:blue !important"> <i class="fas fa-chevron-left"></i> Kembali ke Beranda Berita</a>
                <br>
                <a class="btn" href="{{ route('portal') }}" style="color:rgb(65, 155, 13) !important"> <i class="fas fa-chevron-left"></i> Kembali ke Beranda Portal</a>
            </nav>
        </aside>
        @endif()

{{--         
        <aside>
            <div class="row">
                @foreach (['3', '3', '3', '3'] as $item)
                    <div class="col-6 col-md-6 col-lg-3" style="background: transparent">
                        <div
                            style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff">
                            <div style="
                                border-radius:15px 15px 0px 0px;
                                width:100%;
                                height:150px;
                                background-image: url('https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg');
                                background-size:cover; 
                                background-position:center;
                                padding:0.5rem;
                                float:right;
                                 ">
                                <div
                                    style=" padding:0.5rem; font-size:1rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                                    <i class="fas fa-play-circle"></i>
                                </div>

                            </div>
                            <div
                                style="background: #ffffff; padding:1rem; border-radius: 15px 15px 15px 15px ; text-align:left; font-weight:600">
                                Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

            <br>
            <nav>
                <a href="{{ route('berita') }}" class="btn btn-default" style="color:blue !important; background:#ffffff !important; border-radius:5px;"> <i class="fas fa-chevron-left"></i> Kembali
                    ke Beranda Berita</a>
                <br>
                <br>
                <a href="{{ route('portal') }}" class="btn btn-defualt" style="color:rgb(65, 155, 13) !important;  background:#ffffff !important; border-radius:5px;"> <i
                        class="fas fa-chevron-left"></i> Kembali ke Beranda Portal</a>
            </nav>
        </aside> --}}



    </div>



    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 10rem;"></div>

@endsection
