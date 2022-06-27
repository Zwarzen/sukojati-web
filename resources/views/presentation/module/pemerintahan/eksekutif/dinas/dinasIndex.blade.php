@extends('presentation.layouts.mainSinglePageContent')


@section('top1')
    {{-- <div style="height:20rem; background:blue"></div> --}}
@endsection


@section('pageContent')
    
    <div class="ctn-single-page">
        @include('presentation.module.pemerintahan.eksekutif.dinas.dinasMainParts')


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

   
    

    @yield('page_content')
@endsection


@section('bottom1')
    @include('presentation.part.navFooter')
@endsection

@section('footer')
    @parent
@endsection