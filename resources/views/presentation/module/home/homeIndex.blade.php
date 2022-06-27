@extends('presentation.layouts.mainContent')


@section('top1')
    {{-- <div style="height:20rem; background:blue"></div> --}}
@endsection


@section('pageContent')
    
    {{-- @include('presentation.module.home.weatherParts') --}}
    <div class="container ctn-resume">
        @include('presentation.module.home.resumeParts')
        @include('presentation.module.home.prioritasParts')
        @include('presentation.module.home.listAppsParts')
        @include('presentation.module.home.listSosmedParts')

        <div style="height:5rem"></div>
        @include('presentation.part.navFooterTheme2')
        
    </div>

    
    
    @yield('page_content')
@endsection


@section('bottom1')
    {{-- <div style="height:20rem; background:rgb(81, 148, 148)"></div> --}}
@endsection
