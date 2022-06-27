@extends('presentation.layouts.mainContent')


@section('top1')
@endsection


@section('pageContent')
    
    <div class="container ctn-resume">
        @include('presentation.module.budaya.modulMainParts')
        @include('presentation.module.home.listAppsParts')
        @include('presentation.module.home.listSosmedParts')
    </div>
    

    @yield('page_content')
@endsection


@section('bottom1')

@endsection
