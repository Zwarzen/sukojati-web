@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')


<div style="height: 5vh"></div>
    <div style="height: 5vh"></div>


<style>
        .top-nav-tools-container{
            padding: 1rem;
        }
        .tool-inputs{
            background: #ffffff;
            color: #2c373d;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin-left: 0.5rem;
            margin-right: 0.5rem;


        }

        .tools-btn{
            background: #e7f9ff;
            color: #186491;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            cursor: pointer;
        }

        .tools-btn a{
            color: #186491;
            text-align: center;
        }

        .tool-items-text1{
            color: #186491;
            text-align: center;
            font-family: monospace;
            font-size: 1rem;
            font-weight: bold;
        }


    </style>
    <!--  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <article class="article-justify container">

        <header>
            <div style="height: 5vh"></div>
            <br>
            <h1 class="">Transparansi</h1>
        </header>
        <br>
        <p align="justify">
        Sebagai wujud pelaksanaan Amanah Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, serta dalam rangka menindaklanjuti Instruksi Menteri Dalam Negeri Republik Indonesia Nomor : 188.52/1797/SJ tentang Peningkatan Transparansi Pengelolaan Anggaran Daerah, maka dibawah ini terdapat link dokumen yang terkait dengan Anggaran Pemerintah Daerah Kabupaten Banyuwangi.

        </p>

        <div class="container">
            <div
                style=" margin-top:15px; border-radius:15px; background: rgb(122 164 210 / 50%); opacity:0.9; padding:1rem; width:100%;">

                @php
                    $listApps = [


                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Transparansi Perencanaan Pembangunan Daerah',
                            'linkTo' => route('pemerintahan.lambang-daerah'),
                            'imgSrc' => asset('presentation/b-asset/img/lambang-daerah.png'),
                            'textDesc' => '  ',
                            'justForward' => true,
                        ],

                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Transparansi Pengelolaan Anggaran Daerah',
                            'linkTo' => route('portal.transparansi'),
                            'imgSrc' => asset('presentation/b-asset/img/visi-misi.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],



                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Transparansi Pertanggung Jawaban Anggaran Daerah',
                            'linkTo' => url('https://dprd.banyuwangikab.go.id'),
                            'imgSrc' => asset('presentation/b-asset/img/icon-dprd.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],


                    ];
                @endphp

                <div class="row ">
                    @foreach ($listApps as $item)
                        <div class="col-6 col-md-4 col-lg-4">
                            <div class="tools-sc-container-item tools-sc-bg-container-item">
                                <a
                                    {{ $item['justForward'] ? 'href=' . $item['linkTo'] : "onclick=openModal('oke')" }}>
                                    <div class="tool-items">
                                        <img class="tool-items-icon"
                                            title="{{ $item['title'] . ' - ' . $item['textDesc'] }}"
                                            src="{{ $item['imgSrc'] }}"
                                            alt=" {{ ' image ' . $item['title'] }}">
                                    </div>

                                    <div class="tool-items-text1"
                                        title="{{ $item['title'] . ' - ' . $item['textDesc'] }}">
                                        {{ $item['title'] }}</div>

                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



    </article>



    <div style="height: 3rem;"></div>
    <!-- <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
    <script>
        $(()=>{
            $("#bidang").select2();
        })

        var placeholder = "Select a State";

        // $( ".select2-single" ).select2( {
        //     placeholder: placeholder,
        //     width: null,
        //     containerCssClass: ':all:'
        // } );

    </script>

@endsection
