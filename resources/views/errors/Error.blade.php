@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')

    <style>
        .top-nav-tools-container {
            padding: 1rem;
        }

        .item-btn-tools {
            display: inline-flex;
            box-sizing: border-box;
        }

        .tool-inputs {
            background: #ffffff;
            color: #2c373d;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin-left: 0.5rem;
            margin-right: 0.5rem;


        }

        .tools-btn {
            background: #e7f9ff;
            color: #186491;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin: 0.5rem;
            cursor: pointer;
        }

        .tools-btn a {
            color: #186491;
            text-align: center;
        }

    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="be-content">
        {{-- <div class="page-head">
            <h4 class="page-head-title">Pemeliharaan Berita<span class="page-head-sub-title"></span></h4>
        </div> --}}
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table  card-border-color card-border-color-primary">
                        <div class="card-header">
                            <h4 class="page-head-title">Terjadi Kesalahan<span
                                    class="page-head-sub-title"></span></h4>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('warning'))
                                <div class="alert alert-warning alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('info'))
                                <div class="alert alert-info alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    Please check the form below for errors
                                </div>
                            @endif


                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>
                            @endif


                        </div>
                        <div class="card-body" style="padding:1rem">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    @parent
@stop
