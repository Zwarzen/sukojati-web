<div id="navbar_main" class="must-close mobile-offcanvas">
    <div id="navbar_main_inner" class="container-fluid mobile-offcanvas-inner scroller">
        <div class="offcanvas-header">
            <button class="btn float-right btn-close"><i class="fas fa-times"></i> </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <div style="display: flex; flex-direction:row;">
                    <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}"
                        class="logo-beranda-img">
                    {{-- <div id="title-teks" class="logo-beranda">
                    <span class="title-teks-sub-a" style="color:#E3AF1C">BANYUWANGI</span>
                    <span class="title-teks-sub-b">Semakin Digital</span>
                </div> --}}

                    <span class="title-teks" style="color: #303030"> Banyuwangi </span>

                </div>
            </a>

        </div>


        @php
            $listApps = [

                // [
                //     'title' => 'Pemerintahan',
                //     'linkTo' => '#',
                //     'imgSrc' => asset('presentation/b-asset/img/lambang-daerah.png'),
                //     'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                // ],

                // [
                //     'title' => 'Prioritas',
                //     'linkTo' => '#',
                //     'imgSrc' => asset('presentation/b-asset/img/prioritas-wajib.png'),
                //     'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                // ],

                // [
                //     'title' => 'Warga',
                //     'linkTo' => '#',
                //     'imgSrc' => asset('presentation/b-asset/img/warga.png'),
                //     'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                // ],


                // [
                //     'title' => 'Layanan',
                //     'linkTo' => '#',
                //     'imgSrc' => asset('presentation/b-asset/img/layanan.png'),
                //     'textDesc' => 'Informasi Perencanaan Daerah',
                // ],

                [
                     'title' => 'GIS',
                     'linkTo' => 'http://gis.banyuwangikab.go.id/FrontEnd/GoogleMapView?land_page=1',
                     'imgSrc' => asset('presentation/b-asset/img/icon-gis.png'),
                     'textDesc' => 'Informasi Transparansi Anggaran Daerah',
                 ],

                 [
                     'title' => 'Wisata',
                     'linkTo' => 'https://banyuwangitourism.com/destination',
                     'imgSrc' => asset('presentation/b-asset/img/wisata.png'),
                     'textDesc' => 'Informasi Transparansi Anggaran Daerah',
                 ],

                // [
                //     'title' => 'Budaya',
                //     'linkTo' => '#',
                //     'imgSrc' => asset('presentation/b-asset/img/budaya.png'),
                //     'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                // ],

                 [
                     'title' => 'Penghargaan',
                     'linkTo' => route('pemerintahan.prestasi'),
                     'imgSrc' => asset('presentation/b-asset/img/icon-penghargaan.png'),
                     'textDesc' => 'Prestasi dan Penghargaan Kabupaten Banyuwangi',
                 ],

                 [
                     'title' => 'Perencanaan',
                     'linkTo' => route('perencanaan'),
                     'imgSrc' => asset('presentation/b-asset/img/icon-perencanaan.png'),
                     'textDesc' => 'Transparansi Perencanaan Pembangunan Daerah',
                 ],

                 [
                     'title' => 'Transparansi',
                     'linkTo' => route('portal.transparansi'),
                     'imgSrc' => asset('presentation/b-asset/img/logo_transparansi.png'),
                     'textDesc' => 'Transparansi Perencanaan Pembangunan Daerah',
                 ],

                 [
                     'title' => 'JDIH',
                     'linkTo' => 'https://jdih.banyuwangikab.go.id/',
                     'imgSrc' => asset('presentation/b-asset/img/icon-jdih.png'),
                     'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
                 ],

                [
                    'title' => 'Layanan',
                    'linkTo' => 'https://smartkampung.id/',
                    'imgSrc' => asset('presentation/b-asset/img/layanan-blue.png') ,
                    'textDesc' => 'Layanan adminduk dan lainnya ',
                ],


                [
                    "id" => "1",
                    "title" => "Kotaku",
                    "jenis" => "web",
                    "imgSrc" => asset('presentation/b-asset/img/program-kotaku.jpg'),
                    "textDesc" => "Program Kota Tanpa Kumuh ",
                    "linkTo" =>  route('profil-pekerjaan-umum')
                ],

                [
                    "id" => "1",
                    "title" => "Radio Blambangan",
                    "jenis" => "web",
                    "imgSrc" => asset('presentation/b-asset/img/icon-radio-blambangan_2.png'),
                    "textDesc" => "Radion Blambangan 88.1 FM ",
                    "linkTo" =>  route('portal.radio-blambangan')
                ]

            ];


        @endphp

        <style>
            .tools-sc-container{
                grid-template-columns: auto auto auto auto auto !important;
            }

            @media all and (max-width:600px){
                .tools-sc-container{
                grid-template-columns: auto auto auto  !important;
            }
            }

        </style>
        <div class="tools-sc-container ">

            @foreach ($listApps as $item)
                <div class="tools-sc-container-item">
                    <a href="{{ $item['linkTo'] }}">
                        <div class="tool-items">
                            <img class="tool-items-icon" title="{{ $item['title'] ." - ". $item['textDesc']}}"
                                src="{{ $item['imgSrc'] }}" alt=" {{ ' image '.$item['title'] }}">
                        </div>

                        <div class="tool-items-text" title="{{ $item['title'] ." - ". $item['textDesc'] }}">{{ $item['title'] }}</div>

                    </a>


                </div>
            @endforeach
        </div>



    </div>
</div>
