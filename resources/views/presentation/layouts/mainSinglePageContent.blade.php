@extends('presentation.layouts.main')

@section('header')
    @parent
@stop


@section('navigation')
@include('presentation.part.mainNav')
@stop

@section('content')
    @yield('top1')
    @yield('top2')
    @yield('top3')
    @include('presentation.part.heroSinglePageParts')
    @yield('bottom1')
    @yield('bottom2')
    @yield('bottom3')
@endsection


@section('footer')
    @parent
@stop
