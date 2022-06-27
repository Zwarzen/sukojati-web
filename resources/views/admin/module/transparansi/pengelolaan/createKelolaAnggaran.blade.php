@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')
    <form action="{{ isset($anggaran) && $mode=='edit'? 
    route('admin.transparansi.pengelolaan.update', ["id" =>$anggaran->id]) : 
    route('admin.transparansi.pengelolaan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">

                <h4 class="page-head-title"> {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Pengelolaan Anggaran<span class="page-head-sub-title"></span></h4>
                                


                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                      <li class="breadcrumb-item"><a href="{{ route('admin.transparansi.pengelolaan.data') }}">Semua Data Anggaran</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.transparansi.pengelolaan.create') }}">Tambah Data Anggaran</a></li>
                    </ol>
                  </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table  card-border-color card-border-color-primary">
                            <div class="card-header">
                                Form {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Pengelolaan Anggaran
                                

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
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select name="id_kategori" class="form-control" id="anggaran_tahun_id">
                                            {{-- <option  {{ isset($kategoris) ? null : 'selected="selected readonly"' }}>
                                                Semua kategori </option> --}}
        
                                            @foreach ($kategoris as $item)
        
                                                @if (isset($kategori))
                                                    @php $selected = "" @endphp
                                                    @if ($kategori == $item->id)
                                                        @php $selected = "selected" @endphp
        
                                                    @endif
        
                                                    <option value="{{ $item->id }}"
                                                        {{ $selected != '' ? 'selected="selected"' : null }}>
                                                        {{ $item->kategori }}</option>
        
                                                @else
                                                    <option value="{{ $item->id_kategori }}">{{ $item->kategori }}
                                                    </option>
                                                @endif
        
                                            @endforeach
        
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">OPD / SKPD</label>
                                    <div class="col-sm-10">
                                        <select name="id_dinas" class="form-control" id="anggaran_opd_id">
                                            {{-- <option {{ isset($kategoris) ? null : 'selected="selected readonly"' }}>
                                                Semua OPD / SKPD </option> --}}
        
                                            @foreach ($unors as $item)
        
                                                @if (isset($anggaran))
                                                    @php $selected = "" @endphp
                                                    @if ($anggaran->id_dinas == $item->kd_unor)
                                                        @php $selected = "selected" @endphp
        
                                                    @endif
        
                                                    <option value="{{ $item->kd_unor }}"
                                                        {{ $selected != '' ? 'selected="selected"' : null }}>
                                                        {{ $item->nm_unor }}</option>
        
                                                @else
                                                    <option value="{{ $item->kd_unor }}">{{ $item->nm_unor }}
                                                    </option>
                                                @endif
        
                                            @endforeach
        
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tahun Anggaran</label>
                                    <div class="col-sm-10">
                                        @php 
                                            $now=date('Y');
                                        @endphp
                                        <select name="tahun" class="form-control" id="anggaran_kategori_id">
                                                
                                            @for ($i=1; $i < 20; $i++ )
        
                                                @if (isset($anggaran))
                                                    @php $selected = "" @endphp
                                                    
                                                    @if ($now == $anggaran->tahun)
                                                        @php $selected = "selected" @endphp
        
                                                    @endif
        
                                                    <option value="{{ $anggaran->tahun }}"
                                                        {{ $selected != '' ? 'selected="selected"' : null }}>
                                                        {{ $anggaran->tahun }}</option>
        
                                                @else
                                                    <option value="{{ $now }}">{{ $now }}
                                                    </option>
                                                @endif

                                                @php $now-- @endphp
        
                                            @endfor
        
                                        </select>
                                    </div>
                                </div>

                               

                                

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul_dokumen_id" 
                                        onchange="slugify(this)"
                                            onkeyup="slugify(this)" 
                                            name="judul_dokumen" value="{{ isset($anggaran)?$anggaran->judul_dokumen:'' }}">

                                            Pastikan judul berisfat unik dan berbeda dengan judul dokumen - dokumen yang sebelumnya agar tidak membingungkan saat pencarian data nantinya  <br>
                                            <br>slug:
                                        <input type="text" readonly 
                                            style="border:none; font-style:italic; font-size:1rem;" 
                                            class="form-control" id="slug" placeholder="Slug Judul terisi otomatis"
                                            name="slug" value="{{ isset($anggaran)?$anggaran->slug:'' }}">
                                        <div>Slug ini penting untuk alamat akses atau url identitas, misalnya : <br> www.xeample.go.id/transparansi/<i>judul-dokumen-terbaru-ini</i></div>
                                   


                                     </div>
                                </div>
                                <br>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan / penjelasan</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="desc" placeholder="Keterangan / penjelasan lainnya  "
                                            name="introtext" cols="30" rows="3">{{ isset($anggaran)?$anggaran->introtext:'' }}</textarea>
                                        <div>Keterangan singkat: ini berguna untuk meta desc / cuplikan file atau data yang dapat mempermudah dalam pencarian atau SEO</div>
                                    </div>
                                </div>
                                <br>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">File Dokumen</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept="application/pdf"
                                            class="form-control" id="file" placeholder="" name="file">

                                            <br>
                                        <div id="img_value">

                                            @if(isset($anggaran) && $anggaran->nama_file != "" )
                                                <a href="{{ asset($link_path_media_pdf.$anggaran->nama_file) }}">{{ $anggaran->nama_file }}</a>
                                            @endif
                                    
                                        </div>
                                        <br>
                                    </div>
                                </div>

                                

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Data Anggaran</button>
                                <a href="{{ route('admin.transparansi.pengelolaan.index') }}" class="btn btn-default">
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
