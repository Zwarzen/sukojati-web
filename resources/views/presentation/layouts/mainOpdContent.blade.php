@extends('presentation.layouts.main')

@section('header')
    @include('presentation.part.headerNews')
@stop


{{-- <div class="pr-bsc"> --}}


@section('navigation')
    <header>
        <nav>
            @include('presentation.module.opd.navOpd')
            @include('presentation.module.opd.navMenuOpdSide')
        </nav>

    </header>
@endsection



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
