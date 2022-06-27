@extends('presentation.layouts.main')

@section('header')
    @include('presentation.part.headerPortal')
@stop


{{-- <div class="pr-bsc"> --}}

@section('navigation')
    {{-- @include('presentation.part.mainNav') --}}
@stop

@section('content')

    @yield('top1')
    @yield('top2')
    @yield('top3')
    @yield('top3')
    @yield('pageContent')
    @yield('bottom1')
    @yield('bottom2')
    @yield('bottom3')
@endsection

{{-- </div> --}}


@section('footer')
    @include('presentation.part.footerNews')
@stop
