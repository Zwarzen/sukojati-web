@extends('presentation.layouts.mainOpdContent')


@section('top1')
    {{-- <div style="height:20rem; background:blue"></div> --}}
@endsection


@section('pageContent')
    
    <div class="ctn-single-page">
        
        @include($pageContent)


        <style>
            .a-apps{
                color: rgb(97, 97, 97) !important;
            }
            .a-sosmed{
                color: rgb(97, 97, 97) !important;
            }

            .a-apps:hover, .a-sosmed:hover{
                color: #64c0cd !important;
            }


        </style>
        @include('presentation.module.home.listAppsParts')
        @include('presentation.module.home.listSosmedParts')

        <br>

        <a href="{{ url('') }}" style=" align-items:center">
            <img src="{{ asset('srcadmin/b-assets/img/logo_bwi.png') }}" style="height:40px; width:30px">
            <div id="title-teks" class="logo-beranda">
                <span >Kembali ke portal Kabupaten</span>
            </div>
        </a>


        <br>
        

    </div>

   
    

    @yield('page_content')
@endsection


@section('bottom1')



@include('presentation.part.navFooter')

@endsection

@section('footer')
    @parent
@endsection