@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')

<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table  card-border-color card-border-color-primary">
                    <div class="card-header">
                        <h4 class="page-head-title">Kelola Profile Desa<span class="page-head-sub-title"></span></h4>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.opd.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $opd->id }}">
                    <div class="card-body" style="padding:1rem">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Desa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Nama Desa" name="nama" value="{{ $opd->nama }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alias</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alias" placeholder="Alias" name="alias" value="{{ $opd->alias }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Alamat email" name="email" value="{{ $opd->surel }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No Telp & Fax</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="telp" placeholder="No Telp" name="telp" value="{{ $opd->telp }}">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="fax" placeholder="Fax" name="fax" value="{{ $opd->fax }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="fb" placeholder="Nama Facebook" name="fb" value="{{ $opd->facebook }}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="url_fb" placeholder="Link Facebook Exp: https://facebook.com/akun" name="url_fb" value="{{ $opd->url_facebook }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Instagram</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="ig" placeholder="Nama IG" name="ig" value="{{ $opd->ig }}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="url_ig" placeholder="Link Instagram Exp: https://Instagram.com/akun" name="url_ig" value="{{ $opd->url_ig }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Youtube</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="youtube" placeholder="Youtube Channel" name="youtube" value="{{ $opd->youtube }}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="url_youtube" placeholder="Link Youtube Exp: https://Youtube.com/akun" name="url_youtube" value="{{ $opd->url_youtube }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>{{ $opd->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Map</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="lat" placeholder="Latitude" name="lat" value="{{ $opd->lat }}">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="long" placeholder="Longitude" name="long" value="{{ $opd->long }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    @parent
@stop
