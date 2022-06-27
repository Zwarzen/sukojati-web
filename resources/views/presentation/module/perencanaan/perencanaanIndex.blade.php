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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <article class="article-justify container">
       
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">{{ $pageTitle }}</h1> 
        </header>
        <br>
        <div style="display:flex;  flex-direction:row">
            <div style="padding:1rem; flex:1; display:none">
                <form action="{{route('perencanaan.cari')}}" style="color: #4225b5;margin:auto;align-self:center auto;flex:1; "
                    class="form-inline search-form">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input class="form-control search-input-form" type="text" name="cari" id="cari" placeholder="Mencari perencanaan... ">
                    <i styl="clear:both"></i>
                </form>
            </div>
            <!-- <select class="form-control">
                <option>Default select</option>
            </select> -->
        </div>
        {{-- <div class="top-nav-tools-container">
               
                <div style="display: inline-block; float left">
                    <form action="" method="get">
                        <select  name="kanal" class="tool-inputs" id="berita_kanal_id">
                            <option value="all" selected>Tahun</option>
                            <!--  -->
                        </select>
                        <select  name="kanal" class="tool-inputs" id="berita_kanal_id">
                            <option value="all" selected>Bidang</option>
                            <!--  -->
                        </select>
                        <button type="submit" class="tools-btn" >
                            Filter
                        </button>
                    </form>
                </div>
        </div> --}}
        <p align="justify">

            <table id="table4" class="table table-hover table-striped table-bordered">
                <thead>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Nama</th>
                    <th style="text-laign:center">File</th>
                </thead>
                <tbody>
                @foreach ($perencanaan as $key => $os)
                    <tr>
                        <td>
                        {{ ++$key + ($perencanaan->currentPage()-1) * $perencanaan->perPage() }}
                        </td>
                      
                        <td>
                        <span> @if(isset($os['tahun'])) {{ $os['tahun'] }} @else - @endif </span> <br>
                        </td>
                         <td>
                        <span> @if(isset($os['nama'])) {{ $os['nama'] }} @else - @endif </span> <br>
                        </td>
                        <td>
                        <a style="background-color:white" href="/media/dokumen/perencanaan/@if(isset($os['file'])){{ $os['file'] }} @else - @endif" target="_blank" class="btn btn-warning"> 
                            <i class="fa fa-file"></i> File Dokumen</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="center">
                {{ $perencanaan->render('pagination::bootstrap-4') }}
            </div>
            </p>        

    </article>

  

    <div style="height: 3rem;"></div>

@endsection
