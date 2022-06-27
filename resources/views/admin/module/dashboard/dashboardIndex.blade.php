@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop


@section('content')
    <div class="be-content">
        {{-- <div class="page-head">
            <h4 class="page-head-title">Dashboard<span class="page-head-sub-title"></span></h4>
        </div> --}}
        <div class="main-content container-fluid">
            <h3>Halo</h3>
            <h4>Selamat datang  <strong>{{ $user->username }}</strong></h4>
        </div>
    </div>

@endsection
@section('footer')
    @parent
@stop
