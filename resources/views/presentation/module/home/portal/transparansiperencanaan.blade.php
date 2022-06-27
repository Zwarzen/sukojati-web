@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')

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
            <h1 class="">TRANSPARANSI PENGELOLAAN ANGGARAN</h1> 
        </header>
        <br>
        <p align="justify">
        Sebagai wujud pelaksanaan Amanah Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, serta dalam rangka menindaklanjuti Instruksi Menteri Dalam Negeri Republik Indonesia Nomor : 188.52/1797/SJ tentang Peningkatan Transparansi Pengelolaan Anggaran Daerah, maka dibawah ini terdapat link dokumen yang terkait dengan Anggaran Pemerintah Daerah Kabupaten Banyuwangi.

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
        @if($tahun =='2018')  
            <div class="tools-sc-container  ">
                
                <div class="tools-sc-container-item">
                    <!-- <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/HibahBansos/index" target="_blank"> -->
                    <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
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
                @foreach ($anggaran_2018 as $item )
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
                @foreach ($anggaran_2020 as $item )
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
                @foreach ($anggaran_2021 as $item )
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
                @foreach ($anggaran_2017 as $item )
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
                @foreach ($anggaran_2019 as $item )
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
                @foreach ($anggaran_2011 as $item )
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
                @foreach ($anggaran_2012 as $item )
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
                @foreach ($anggaran_2013 as $item )
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
                @foreach ($anggaran_2014 as $item )
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
                @foreach ($anggaran_2015 as $item )
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
                @foreach ($anggaran_2016 as $item )
                    <!-- <div class="tools-sc-container-item"> -->
                    <a href="{{route('portal.transparansi.pengelolaan', [$tahun , $item->id_kategori] )}}" target="_blank">
                        <a href="http://bpkad.banyuwangikab.go.id/utama/index.php/Artikel/sp2d" target="_blank">
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
        </p>        

        
        
              
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
