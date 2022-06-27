@extends('presentation.layouts.mainArtikelNewsContent')

@section('pageContentArtikel')
    <div style="height: 5vh"></div>
    <div style="height: 5vh"></div>
    <div class="container">



        <div class="row">
            <div class="col-12 col-lg-8 col-md-12">
                <article>
                    <header>
                        
                        <h1 class="">{{ $data->title }}</h1>
                    </header>


                    <h2> 
                        <small>
                            By <i>Nama User</i><br>
                            Published On <i> @php echo date('F d, Y H:i:s ',strtotime($data->publish_date)) @endphp </i> &nbsp; <i class="fa fa-eye" aria-hidden="true"></i> {{ $data->hit }}
                        </small>
                    </h2>
                    <br>
                    <div style="margin-bottom:1rem; align-items:left; text-align:left; ">
                        <img style="width:100%;"
                            src="/media/galeri/original/{{ $data->img_raw }}" />
                    </div>

                    <p class="article-justify">
                        {{ $data->desc }}
                    </p>

                </article>
            </div>
            <div class="col-12 col-lg-4 col-md-12">
                <aside>
                    <div style="background: #fafafa; border-radius:15px;  margin-bottom:1rem">
                        @include('presentation.module.galeri.ngetrenGaleri')
                    </div>
                </aside>
            </div>

            
        </div>

        <br>
        <br>

        <div style="font-weight: 600">Galeri Terkait</div>
        <hr>
        <aside>
            <div class="row">
                @foreach ($terkait as $item)
                    <div class="col-6 col-md-6 col-lg-3" style="background: transparent">
                        <div style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff">
                            <div style="
                            border-radius:15px 15px 0px 0px;
                            width:100%;
                            height:150px;
                            background-image: url('/media/galeri/thumbnail/{{ $item->img_thumb }}');
                            background-size:cover; 
                            background-position:center;
                            padding:0.5rem;
                            float:right;
                             ">
                           
                               
                            </div>
                                <div style="background: #ffffff; padding:1rem; border-radius: 15px 15px 15px 15px ; text-align:left; font-weight:600">
                                    {{ $item->title }}
                                </div>

                        </div>
                        
                    </div>
                @endforeach
            </div>

            <br>
            <nav>
                <a href="{{ route('galeri') }}" style="color:blue !important"> <i class="fas fa-chevron-left"></i> Kembali ke Beranda Galeri</a>
                <br>
                <a href="{{ route('portal') }}" style="color:rgb(65, 155, 13) !important"> <i class="fas fa-chevron-left"></i> Kembali ke Beranda Portal</a>
            </nav>
        </aside>

    

    </div>



    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 10rem;"></div>

@endsection
