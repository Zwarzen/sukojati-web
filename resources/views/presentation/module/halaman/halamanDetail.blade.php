@extends('presentation.layouts.mainArtikelOpdContent')

@section('pageContentArtikel')
<link itemprop="thumbnailUrl" href="{{ $halamanDetail->img_thumb != '' || $halamanDetail->img_thumb != null?  $base_link_media_thumbnail .$halamanDetail->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}">

<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
<link itemprop="url" href="{{ $halamanDetail->img_thumb != '' || $halamanDetail->img_thumb != null?  $base_link_media_thumbnail .$halamanDetail->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}">
</span>


    <div style="height: 5vh"></div>
    <div style="height: 5vh"></div>
    <div class="container">



        <div class="row">
            <div class="col-12 col-lg-8 col-md-12">
                <article>
                    <header>
                        <h1 class="title-detail-berita">{{ $halamanDetail->title }}</h1>
                    </header>


                    {{-- <h2> <small style="font-size: 0.9rem">
                        <i class="fas fa-calendar-alt"></i>
                        <?php setlocale(LC_TIME, 'id_ID');
                        \Carbon\Carbon::setLocale('id'); ?>


                        {{ \Carbon\Carbon::parse($halamanDetail->created_at)->isoFOrmat('dddd, D MMMM Y') }} </small>
                    </h2> --}}
                    <br>

                    @if($halamanDetail->img_thumb != '' || $halamanDetail->img_raw != null)

                    <div class="img-detail-berita-wrp">
                        <img class="img-detail-berita"
                            src="{{ $halamanDetail->img_thumb != '' || $halamanDetail->img_raw != null?  $base_link_media_raw .$halamanDetail->img_raw : asset('presentation/b-asset/img/lambang-daerah.png') }}" />
                        <div style="text-align:left; max-width:300px"> <small><i>{{ strlen($halamanDetail->img_desc) > 10 ? $halamanDetail->img_desc : "" }}</i></small></div>
                    </div>
                    @endif

                    <div>
                        {!! $halamanDetail->content !!}
                    </div>

                </article>
            </div>

            @if(isset($$ngetrenBerita) )

            {{-- <div class="col-12 col-lg-4 col-md-12">
                <aside>
                    <div style="background: #fafafa; border-radius:15px;  margin-bottom:1rem">
                        @include('presentation.module.berita.ngetrenBerita',["ngetrenBerita"=>$ngetrenBerita])
                    </div>
                </aside>
            </div> --}}
            @endif


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
                        <a href="{{ route('berita')."/".$item->slug }}" title="{{ $item->title }}">

                        <div style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff">
                            <div style="
                            border-radius:15px 15px 0px 0px;
                            width:100%;
                            height:150px;
                            background-image: url('{{ $item->img_thumb != '' || $item->img_thumb != null?  $base_link_media_thumbnail .$item->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}');
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

            {{-- <br>
            <br>
            <nav>
                <a class="btn default" href="{{ route('berita') }}" style="color:blue !important"> <i class="fas fa-chevron-left"></i> Kembali ke Beranda Berita</a>
                <br>
                <a class="btn" href="{{ route('portal') }}" style="color:rgb(65, 155, 13) !important"> <i class="fas fa-chevron-left"></i> Kembali ke Beranda Portal</a>
            </nav> --}}
        </aside>
        @endif()




    </div>



    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 10rem;"></div>

@endsection
