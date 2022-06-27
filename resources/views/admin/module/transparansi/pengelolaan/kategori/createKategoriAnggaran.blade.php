@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')
    <form action="{{ isset($kategori) && $mode=='edit'? 
    route('admin.transparansi.pengelolaan.kategoriUpdate', ["id" =>$kategori->id]) : 
    route('admin.transparansi.pengelolaan.kategoriStore') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">

                <h4 class="page-head-title"> {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Pengelolaan Kategori Anggaran<span class="page-head-sub-title"></span></h4>
                                


                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                      <li class="breadcrumb-item"><a href="{{ route('admin.transparansi.pengelolaan.kategori') }}">Semua Data Kategori Anggaran</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.transparansi.pengelolaan.kategoriCreate') }}">Tambah Data Kategori Anggaran</a></li>
                    </ol>
                  </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table  card-border-color card-border-color-primary">
                            <div class="card-header">
                                Form {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Kategori Anggaran
                                

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

                            </div>
                            <div class="card-body" style="padding:1rem;">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kategori_id" 
                                        onchange="slugify(this)"
                                            onkeyup="slugify(this)" 
                                            name="kategori" value="{{ isset($kategori)?$kategori->kategori:'' }}">
                                     </div>
                                </div>
                                <br>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Data Kategori</button>
                                <a href="{{ route('admin.transparansi.pengelolaan.kategori') }}" class="btn btn-default">
                                    Batal
                                </a>
                            </div>
                            <div style="height:1rem"></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
function slugify(elem)
            {
                var str = elem.value;

                str = str.replace(/^\s+|\s+$/g, '');

                // Make the string lowercase
                str = str.toLowerCase();

                // Remove accents, swap ñ for n, etc
                var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆÍÌÎÏŇÑÓÖÒÔÕØŘŔŠŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇíìîïňñóöòôõøðřŕšťúůüùûýÿžþÞĐđßÆa·/_,:;";
                var to   = "AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------";
                for (var i=0, l=from.length ; i<l ; i++) {
                    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
                }

                // Remove invalid chars
                str = str.replace(/[^a-z0-9 -]/g, '') 
                // Collapse whitespace and replace by -
                .replace(/\s+/g, '-') 
                // Collapse dashes
                .replace(/-+/g, '-'); 

                $("#slug").val(str)

                // document.getElementById("slug").value = str;

                return str;
            }

            $(function() {
                $("#anggaran_kategori_id").css("min-width","300px").select2();
                $("#anggaran_tahun_id").css("min-width","300px").select2();
                $("#anggaran_opd_id").css("min-width","300px").select2();
            });
        </script>
    @endsection
    @section('footer')
        @parent
    @stop
