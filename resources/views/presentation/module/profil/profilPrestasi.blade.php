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


    </style>
    <!--  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <article class="article-justify container">
       
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Prestasi dan Penghargaan Kabupaten Banyuwangi</h1> 
        </header>
        <br>
        
        <div class="top-nav-tools-container">
                         
            <!-- <div style="display: inline-block; float left"> -->
                <form action="{{route('prestasi.filter')}}" method="get">
                    <select  name="tahun" method="GET" class="select2 tool-inputs" style="width:15%" id="tahun">
                        <option value="" selected>Pilih Tahun</option>
                        @foreach ($filtertahun as $item)
                            <option value="{{$item->tahun }}">{{ $item->tahun }} </option>
                        @endforeach
                    </select>
                    <select  name="bidang" class="select2 tool-inputs" style="width:30%" id="bidang">
                        <option value="" method="GET" selected>Pilih Bidang</option>
                        @foreach ($filterbidang as $item)
                            <option value="{{ $item->bidang }}">{{ $item->bidang }} </option>
                        @endforeach
                    </select>
                    <input type="text" class="tool-inputs" placeholder="cari Prestasi" style="width:35%" name="cari" >
                    <button type="submit" class="tools-btn" >
                        Cari
                    </button>

                </form>
               
            <!-- </div> -->
        </div>
        <p align="justify">

            <table id="table4" class="table table-hover table-striped table-bordered">
                <thead>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Bidang</th>
                    <th>Jenis Penghargaan / Prestasi dan Kategori</th>
                    <th>Peringkat</th>
                    <th>Oleh</th>
                    <th>Penyelenggara</th>
                    <th>Tingkat</th>
                </thead>
                <tbody>
                @foreach ($prestasi as $key => $os)
                    <tr>
                        <td>
                        {{ ++$key + ($prestasi->currentPage()-1) * $prestasi->perPage() }}
                        </td>
                      
                        <td>
                        <span> @if(isset($os['tahun'])) {{ $os['tahun'] }} @else - @endif </span> <br>
                            <!-- <span>{{ $os['tahun'] }}</span> <br> -->
                        </td>
                        <td>
                        <span> @if(isset($os['bidang'])) {{ $os['bidang'] }} @else - @endif </span> <br>

                            <!-- <span>{{ $os['bidang'] }}</span> <br> -->
                        </td>
                        <td>
                            <span>{{ $os['jenis'] }}</span> <br>
                        </td>
                        <td>
                            <span> @if(isset($os['peringkat'])) {{ $os['peringkat'] }} @else - @endif </span> <br>

                            <!-- <span>{{ $os['peringkat'] }}</span> <br> -->
                        </td>
                        <td>
                            <span>{{ $os['oleh'] }}</span> <br>
                        </td>
                        <td>
                            <span>{{ $os['penyelenggara'] }}</span> <br>
                        </td>
                        <td>
                            <span> @if(isset($os['tingkat'])) {{ $os['tingkat'] }} @else - @endif </span> <br>

                            <!-- <span>{{ $os['tingkat'] }}</span> <br> -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="center">
                {{ $prestasi->render('pagination::bootstrap-4') }}
            </div>
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
