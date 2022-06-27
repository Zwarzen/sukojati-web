@extends('presentation.layouts.mainOpdContent')


@section('navigation')
    @include('presentation.module.opd.navOpd')
    @include('presentation.module.opd.navMenuOpdSide')

    {{-- @include('presentation.module.home.portal.navSearch')
    @include('presentation.module.berita.navBeritaMenu')
    @include('presentation.module.home.portal.navBasedModal') --}}
@endsection

@section('top1')
    {{-- <div id="based-div-1" class="based-div-1"></div>
    <div class="screen-overlay"></div> --}}
    {{-- <div id="based-div-2"
    class="based-div-2" style="background: #f3f3f3"></div> --}}
@endsection


@section('pageContent')

    <div class="container based-page-opd">
        <div style="height: 4rem"></div>
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

        <header>
            <!-- <div style="height: 5vh"></div> -->
            <br>
            <h3 class="">TRANSPARANSI PENGELOLAAN ANGGARAN DAN PERTANGGUNGJAWABAN</h3>
        </header>
        <br>
        <p align="justify">
            Berdasarkan Undang-Undang Nomor 6 Tahun 2014 Pasal 71 ayat 1 dijelaskan Keuangan Desa adalah semua hak dan kewajiban Desa yang dapat dinilai dengan uang serta segala sesuatu berupa uang dan barang yang berhubungan dengan pelaksanaan hak dan kewajiban Desa. Dalam pelaksanaannya pemerintah desa wajib mengelola keuangan desa secara Transparan, Akuntabel dan Partisipatif yang bermakna melibatkan masyarakat dalam prosesnya. Guna mewujudkan amanah Undang-Undang tersebut maka dibawah ini terdapat link dokumen yang terkait dengan Transparansi dan Pertanggungjawaban Pengelolaan Anggaran Desa Sukojati
        </p>

        <div class="top-nav-tools-container " >

            <!-- <div style="display: inline-block; float left"> -->
                <form action="" method="get" style="text-align: center; ">
                    <span class="input-group-addon" id="basic-addon3">TAHUN ANGGARAN</span>

                    <select  name="tahun" class="select2 tool-inputs"  style="width:30%; text-align: center; " id="tahun" >
                        <option value="" selected>Pilih Tahun</option>
                        <!-- <option>2021</option> -->
                        @foreach ($filtertahun as $item)
                            @if(isset($tahun))
                                @if($tahun == $item->tahun )
                                    <option value="{{$item->tahun }}" selected>{{ $item->tahun }} </option>
                                @else
                                    <option value="{{$item->tahun }}">{{ $item->tahun }} </option>
                                @endif
                            @else
                                <option value="{{$item->tahun }}">{{ $item->tahun }} </option>
                            @endif
                        @endforeach
                    </select>
                     <button type="submit" class="tools-btn" >
                        Cari
                    </button>

                </form>

            <!-- </div> -->
        </div>
        <p align="justify">
        {{-- @if($tahun =='2018')
            <div class="tools-sc-container  ">

                <div class="tools-sc-container-item">
                    <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/HibahBansos/index" target="_blank"> -->
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Hibah & Bansos</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >SP2D</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/RealisasiBerjalan/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Laporan Realisasi Berjalan</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Realisasi/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Perbandingan</div>
                    </a>

                </div>
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
        @if($tahun =='2020')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach

                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >SP2D</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/HibahBansos/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Hibah & Bansos</div>
                    </a>
                </div>
                <!-- <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/RealisasiBerjalan/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Laporan Realisasi Berjalan</div>
                    </a>
                </div> -->
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Realisasi/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Perbandingan</div>
                    </a>

                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Aset/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Aset Banyuwangi</div>
                    </a>

                </div>
            </div>

        @endif
        @if($tahun =='2021')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >SP2D</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/HibahBansos/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Hibah & Bansos</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/RealisasiBerjalan/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Laporan Realisasi Berjalan</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Realisasi/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Perbandingan</div>
                    </a>

                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Aset/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Aset Banyuwangi</div>
                    </a>

                </div>

            </div>

        @endif
        @if($tahun =='2017')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
        @if($tahun =='2019')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >SP2D</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/HibahBansos/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Hibah & Bansos</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/RealisasiBerjalan/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Laporan Realisasi Berjalan</div>
                    </a>
                </div>
                <div class="tools-sc-container-item">
                    <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Realisasi/index" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" >Realisasi Perbandingan</div>
                    </a>

                </div>
            </div>

        @endif
        @if($tahun =='2011')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif

        @if($tahun =='2012')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
        @if($tahun =='2013')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
        @if($tahun =='2014')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
        @if($tahun =='2015')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
        @if($tahun =='2016')
            <div class="tools-sc-container  ">
                @foreach ($data_anggaran as $item )
                    <div class="tools-sc-container-item">
                        <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                        <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                            <div >
                                <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                    src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                            </div>
                            <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
        @if($tahun > '2021')

         --}}
        <div class="tools-sc-container  ">
            <!-- <div class="tools-sc-container-item">
                <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank">
                    <div >
                        <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                            src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                    </div>
                    <div class="tool-items-text" >SP2D</div>
                </a>
            </div> -->
            @foreach ($data_anggaran as $item )
                <div class="tools-sc-container-item">
                    <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank"> -->
                    <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                        <div >
                            <img class="tool-items-icon" title="SP2D" style="width: 100px; height: 100px;"
                                src="{{ asset('presentation/b-asset/img/transparansi.png') }}">
                        </div>
                        <div class="tool-items-text" title="">{{ $item->kategori }}</div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- @endif --}}



        </p>


    @yield('page_content')

    </div>

@endsection


@section('bottom1')
    {{-- <div style="height:20rem; background:#0888af"></div> --}}
@endsection

@section('footer')
    <script>
        $(() => {
            $('#topNav,#toolbar-bottom').addClass("show-element");
            // $('#topNav,#toolbar-bottom').hide();
            $("#toolbar-p-1-container").addClass("bg-transparant");


            $('#md-kanalmenu').slick({
                draggable: true,
                autoplay: false,
                autoplaySpeed: 2000,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 5,
                touchThreshold: 1000,
                prevArrow: $('.btn-kanal-left'),
                nextArrow: $('.btn-kanal-right'),

            });

            $('#md-nlstmenu').slick({
                draggable: true,
                autoplay: true,
                /* this is the new line */
                autoplaySpeed: 2000,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                touchThreshold: 1000,
                vertical: true,
                verticalSwiping: true,
                prevArrow: $('.btn-left'),
                nextArrow: $('.btn-right'),

            });


            let owl3 = $("#dt-banner-top-pp-2");
            owl3.owlCarousel({
                singleItem: true,
                autoPlay: true,
                autoPlayTimeout: 200,
            });



            var lastScrollTop = 0;
            var isClikedBtnJelajah = false;

            $("#btn-jelajah").click(() => {
                window.history.pushState('', '', '/');
                // console.log("click btn jelajah")
                isClikedBtnJelajah = true;
            })


            var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
            if (window.location.hash && isChrome) {
                setTimeout(function() {
                    var hash = window.location.hash;
                    window.location.hash = "";
                    window.location.hash = hash;
                }, 300);
            }




            // $("#p-2-inner").fadeOut()
            // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.



            $("#main-content").scroll(function(e) {
                var scrollTop = $(this).scrollTop()

                if (scrollTop > 300) {
                    // console.log(scrollTop)

                    // window.location.href = "#p-2"

                    $('#topNav,#toolbar-bottom').addClass("show-element");
                    $('#topNav,#toolbar-bottom').removeClass("hide-element");
                    // $('#topNav,#toolbar-bottom').fadeOut(300);
                    $("#toolbar-p-1").addClass("bottom-based-tools-wrp")
                    $("#toolbar-p-1-container").removeClass("bg-transparant");

                    // $('#topNav').fadeIn(300);
                    // $('#p-1').fadeOut(300);


                    setTimeout(() => {
                        isClikedBtnJelajah = false
                    }, 200);

                } else {



                    $("#toolbar-p-1").removeClass("bottom-based-tools-wrp")
                    $("#toolbar-p-1-container").addClass("bg-transparant");


                    // $('#topNav').fadeOut(300);



                    // $('#topNav,#toolbar-bottom').removeClass("show-element");
                    // $('#topNav,#toolbar-bottom').addClass("hide-element");

                    isClikedBtnJelajah == false
                }

                lastScrollTop = $(this).scrollTop()

            });

        })
    </script>

    @parent
@endsection
