@extends('presentation.layouts.mainSinglePageContent')


@section('top1')
    {{-- <div style="height:20rem; background:blue"></div> --}}
@endsection


@section('pageContent')
    
    <div class="ctn-single-page">
        @include('presentation.module.budaya.sejarah.sejarahMainParts')


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
    </div>

    @include('presentation.part.navFooter')
    

    @yield('page_content')
@endsection


@section('bottom1')
    {{-- <div style="height:20rem; background:rgb(81, 148, 148)"></div> --}}
@endsection
