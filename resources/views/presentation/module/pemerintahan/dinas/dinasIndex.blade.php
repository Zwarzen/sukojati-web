@extends('presentation.layouts.mainDinasContent')

@section('pageContentArtikel')
    <article class="container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Dinas Pemerintah Daerah Banyuwangi</h1>
        </header>


        <h2>Daftar Dinas <span style="color: #0DCEDA;">Pemerintah Kabupaten Banyuwangi
            </span> </h2>
        <br>
        <div style="width: 100%; align-items:center; text-align:center; ">
            <img style="margin:auto;  height:150px; width:120px;"
                src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" />
        </div>
        <br>
        <br>

        <p class="article-justify">Dinas daerah adalah unsur pelaksana pemerintah daerah. Daerah dapat berarti Provinsi,
            Kabupaten, atau Kota. Dinas Daerah menyelenggarakan fungsi: perumusan kebijakan teknis sesuai dengan lingkup
            tugasnya, pemberian perizinan dan pelaksanaan pelayanan umum, serta pembinaan pelaksanaan tugas sesuai
            denganlingkup tugasnya. </p>
        <p class="article-justify">Dinas Daerah Kabupaten/Kota merupakan unsur pelaksana Pemerintah Kabupaten/Kota dimpimpin
            oleh seorang Kepala yang berada di bawah dan bertanggung jawab kepada Bupati/Wali kota melalui Sekretaris
            Daerah. Dinas Daerah Kabupaten/Kota mempunyai tugas melaksanakan kewenangan desentralisasi. </p>
        <p class="article-justify">Pada Dinas Daerah Kabupaten/Kota dapat dibentuk Unit Pelaksana Teknis Dinas Daerah (UPTD)
            Kabupaten/Kota untuk melaksanakan sebagian tugas Dinas yang mempunyai wilayah kerja satu atau beberapa
            kecamatan. </p>

        <p>Berikut ini adalah daftar dinas di Kabupaten Banyuwangi:</p>

            <br>

        <div class="row">
            @foreach ($dinasItems as $item)
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
                                    <small> <i> @if($item['telp']) Telp. {{ $item['telp'] }} @else  @endif </i></small> <br>
                                </div>

                                <div>
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
