@extends('presentation.layouts.mainContent')


@section('top1')
    {{-- <div style="height:20rem; background:blue"></div> --}}
@endsection


@section('pageContent')
    
    <div class="container ctn-resume">
        @include('presentation.module.pemerintahan.modulMainParts')
        @include('presentation.module.home.listAppsParts')
        @include('presentation.module.home.listSosmedParts')
    </div>
    

    @yield('page_content')
@endsection


@section('bottom1')
    {{-- <div style="height:20rem; background:rgb(81, 148, 148)"></div> --}}
@endsection

@section('footer')
    @parent
@stop

