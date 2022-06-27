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
            <h1 class="">Transparansi Pengelolaan Anggaran ( {{ $kategori->kategori }} tahun {{ $tahun }} ) </h1> 
        </header>
        <br>
        <!-- <p align="justify"> -->
       
        <!-- </p> -->  
        <p align="justify">

            <table id="table4" class="table table-hover table-striped table-bordered">
                
                <tbody>
                @foreach ($detail as $key => $os)
                    <tr>
                        <td>
                        {{ ++$key + ($detail->currentPage()-1) * $detail->perPage() }}
                        </td>
                      
                       
                        <td>
                            <span><a href="{{ asset('media/anggaran/pdf').'/'.$os->nama_file}}" target="__blank"> {{ $os->judul_dokumen }} </a></span> <br>
                        </td>
                       
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="center">
                {{ $detail->render('pagination::bootstrap-4') }}
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
