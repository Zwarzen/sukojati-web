@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Desa Pemerintah Daerah Banyuwangi</h1>
        </header>


        <h2>Daftar desa dari kecamatan {{ $kecamatan['kec_nama'] }} <span style="color: #0DCEDA;">Pemerintah Kabupaten Banyuwangi
            </span> </h2>
        <br>
        <div style="width: 100%; align-items:center; text-align:center; ">
            <img style="margin:auto;  height:150px; width:120px;"
                src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" />
        </div>
       <br><br>


        <!-- <div class="heading-title heading-dotted text-center">
            <h4>SUSUNAN ORGANISASI</h4>
        </div>
        <br> -->
        <!-- <div style="width: 100%; align-items:center; text-align:center; ">
            <img style="margin:auto;  width:80%;"
                src="{{ asset('presentation/b-asset/img/st_kecamatan.png') }}" />
        </div>
        <br> -->
        <br>
        <br>

        
        <!-- <p class="article-justify">Kecamatan (juga disebut distrik di provinsi Papua Barat dan Papua, serta kapanewon dan
            kemantren di Daerah Istimewa Yogyakarta) adalah bagian wilayah dari daerah kabupaten atau kota yang dipimpin
            oleh Camat. Kecamatan diatur sesuai dengan ketentuan Pasal 1 angka 24 Undang-Undang Republik Indonesia Nomor 23
            Tahun 2014 tentang Pemerintahan Daerah yang menyatakan bahwa "Kecamatan atau yang disebut dengan nama lain
            adalah bagian wilayah dari Daerah kabupaten/kota yang dipimpin oleh camat. </p>

        <p class="article-justify">Dinas Daerah Kabupaten/Kota merupakan unsur pelaksana Pemerintah Kabupaten/Kota dimpimpin
            oleh seorang Kepala yang berada di bawah dan bertanggung jawab kepada Bupati/Wali kota melalui Sekretaris
            Daerah. Dinas Daerah Kabupaten/Kota mempunyai tugas melaksanakan kewenangan desentralisasi. </p>
            
        <p class="article-justify">Pada Dinas Daerah Kabupaten/Kota dapat dibentuk Unit Pelaksana Teknis Dinas Daerah (UPTD)
            Kabupaten/Kota untuk melaksanakan sebagian tugas Dinas yang mempunyai wilayah kerja satu atau beberapa
            kecamatan. </p> -->

        <p>Berikut ini adalah daftar Desa di {{ $kecamatan['kec_nama'] }}:</p>

        <br>

        <div class="row">
            @foreach ($desa as $item)
                <div class="col-lg-12 col-md-12 col-sm-12">

                    
                        <div class="list-has-icon">
                            <div class="list-has-item-icon">
                                <!-- <img src="{{ asset($item['icon']) }}" alt=""> -->
                            </div>
                            <div class="sg-div-wrp">
                                <div class="name"> <a href="{{ $item['website'] }}" target="__blank"> {{ $item['nama_desa'] }} </a>
                                </div>
                                    <!-- <div>
                                        <a class="button btn btn-light btn-radius btn-brd" href="#"> <small> Daftar Desa </small></a>
                                    </div> -->
                                <div>
                                    <small> <i>{{ $item['alamat'] }}</i> </small>
                                </div>

                                <div>
                                    <small> <i>{{ $item['email'] }}</i> </small> 
                                </div>
                                <div>
                                    <small> <i> @if($item['website']) website: <a href="{{ $item['website'] }}" target="__blank"> {{ $item['website'] }} </a> @else  @endif </i></small> 
                                   
                                </div>

                                <div>
                                    <!-- <small> <i>{{ $item['email'] }}</i> </small>  -->
                                    <small> <i> @if($item['telp']) Telp. {{ $item['telp'] }} @else  @endif </i></small> <br>
                                </div>                                
                            </div>

                        </div>
                    </a>

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
