@extends('presentation.layouts.mainDinasContent')

@section('pageContentArtikel')
    <article class="container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Badan - badan Pemerintah Daerah Banyuwangi</h1>
        </header>


        <h2>Daftar Badan <span style="color: #0DCEDA;">Pemerintah Kabupaten Banyuwangi
            </span> </h2>
        <br>
        <div style="width: 100%; align-items:center; text-align:center; ">
            <img style="margin:auto;  height:150px; width:120px;"
                src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" />
        </div>
        <br>
        <br>

        <p class="article-justify">Badan daerah adalah unsur pelaksana pemerintah daerah, unsur pendukung tugas kepala daerah dalam penyusunan dan pelaksanaan kebijakan daerah yang bersifat spesifik . </p>


        <p>Berikut ini adalah daftar badan di Kabupaten Banyuwangi:</p>

            <br>

        <div class="row">
            @foreach ($badanItems as $item)
                <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="list-has-icon">
                            <div class="list-has-item-icon">
                                <!-- <img src="{{ asset($item['icon']) }}" alt=""> -->
                            </div>
                            <div class="sg-div-wrp">
                                <div class="name"> <a href="{{ $item['website'] }}" target="__blank"> {{ $item['nama'] }} </a>
                                </div>

                                <div>
                                    <small> {{ $item['deskripsi'] }} </small> 
                                </div>
                                   
                                <div>
                                    <small> <i>{{ $item['alamat'] }}</i> </small>
                                </div>

                                <div>
                                    <small> <i>email: {{ $item['email'] }}</i> </small> 
                                   
                                </div>
                                <div>
                                    <small> <i> @if($item['website']) website: <a href="{{ $item['website'] }}" target="__blank"> {{ $item['website'] }} </a> @else  @endif </i></small> 
                                   
                                </div>
                                <div>
                                    <!-- <small> <i>{{ $item['email'] }}</i> </small>  -->
                                    <small> <i> @if($item['telp']) Telp. {{ $item['telp'] }} @else  @endif </i></small> <br>
                                </div>

                                <div>
                                    <!-- <small> <i>{{ $item['email'] }}</i> </small>  -->
                                    <small> <i> @if($item['fax']) Fax. {{ $item['fax'] }} @else  @endif </i></small> <br>
                                </div>

                               


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

                </div>
            @endforeach


        </div>




    </article>

    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 10rem;"></div>

@endsection
