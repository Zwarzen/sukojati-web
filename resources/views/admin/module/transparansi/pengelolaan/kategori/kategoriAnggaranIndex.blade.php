@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop




@section('content')


    <style>
        .ng-wrp-item {
            width: 100%;
            display: flex;
            flex-direction: row;
            padding: 0.5rem;
            border-radius: 10px;
            /* box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); */
            background: #e7e7e7;
        }

        .img-tools-btn {
            height: 8rem;
            width: 8rem;
            border-radius: 15px;

            background-size: 100% 100%;
            background-position: center center;

        }

    </style>

    <div class="be-content">

        
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table  card-border-color card-border-color-primary">
                        <div class="card-header">
                            <h4 class="page-head-title">Modul Pengelolaan Anggaran<span class="page-head-sub-title"></span>
                            </h4>
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
                            <div class="row">
                                <div class="col-sm-12 col-lg-6" style="margin-bottom: 1rem;">
                                    <a href="{{ route('admin.transparansi.pengelolaan.data') }}">
                                        <div class="ng-wrp-item" style="border-bottom:1px solid #e9e9e9">
                                            <div class="img-tools-btn"
                                                style=" background-image: url('{{ asset('presentation/b-asset/img/transparansi.png') }}');">
                                            </div>


                                            <div style=" flex:1;padding-left:1rem;">
                                                <div style="text-align: left; font-size:1.5rem;">
                                                    Data Pengelolaan Anggaran
                                                </div>
                                                <div style="text-align: left; font-size:1rem; color:#464646">
                                                    Manajemen data pengelolaan Anggaran
                                                </div>
                                            </div>

                                        </div>
                                    </a>


                                </div>
                                <div class="col-sm-12 col-lg-6" style="margin-bottom: 1rem;">
                                    <a href="{{ route('admin.transparansi.pengelolaan.kategori') }}">
                                        <div class="ng-wrp-item" style="border-bottom:1px solid #e9e9e9">
                                            <div class="img-tools-btn"
                                                style=" background-image: url('{{ asset('presentation/b-asset/img/transparansi.png') }}');">
                                            </div>


                                            <div style=" flex:1;padding-left:1rem;">
                                                <div style="text-align: left; font-size:1.5rem;">
                                                    Kategori Pengelolaan Anggaran
                                                </div>
                                                <div style="text-align: left; font-size:1rem; color:#464646">
                                                    Manajemen data kategori Anggaran
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                </div>
                            </div>

                            <div class="container-fluid" id="info_proses"></div>

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
