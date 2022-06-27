@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop

{{-- get data current opd --}}
@php
$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp


@section('content')
    <form action="{{ isset($galeri) && $mode=='edit'?
    route('admin.transaksi.galeri.update', ["id" =>$galeri->id]) :
    route('admin.transaksi.galeri.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">
                <h4 class="page-head-title"> Upload Media Galeri<span class="page-head-sub-title"></span></h4>
            </div>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table  card-border-color card-border-color-primary">
                            <div class="card-header">
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
                                        <select class="form-control" name="galeri_kategori_id">

                                            @foreach ($kategori as $item)

                                                @if(isset($galeri))
                                                    @php $selected = "" @endphp
                                                    @if($galeri->galeri_kategori_id == $item->id)
                                                    @php $selected = "selected" @endphp

                                                    @endif

                                                    <option value="{{ $item->id }}" {{ $selected != ""? 'selected="selected"':null; }} >{{ $item->name }}</option>

                                                @else
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                @hasanyrole("Opd")
                                <input type="hidden" name="kd_unor" value="{{ $opdProfile->kd_unor }}">
                                @else
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">OPD / SKPD</label>
                                    <div class="col-sm-10">
                                        <select name="kd_unor" class="form-control" id="galeri_opd_id">
                                            {{-- <option {{ isset($kategoris) ? null : 'selected="selected readonly"' }}>
                                                Semua OPD / SKPD </option> --}}

                                            @foreach ($unors as $item)

                                                @if (isset($galeri))
                                                    @php $selected = "" @endphp
                                                    @if ($galeri->kd_unor == $item->kd_unor)
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
                                @endhasanyrole

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title"
                                            onkeyup="slugify(this)" placeholder="Judul"
                                            name="title" value="{{ isset($galeri)?$galeri->title:'' }}">
                                            slug:
                                            <input type="text" readonly
                                            style="border:none; font-style:italic; font-size:1rem;"
                                            class="form-control" id="slug" placeholder="Slug Judul"
                                            name="slug" value="{{ isset($galeri)?$galeri->slug:'' }}">
                                            <div>Slug ini penting untuk alamat akses atau url identitas, misalnya : <br> www.example.com/galeri/<i>kembang-mayang-wetan</i></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">

                                        <textarea type="text" class="form-control" id="desc" placeholder="Keterangan"
                                            name="desc" cols="30" rows="5">{{ isset($galeri)?$galeri->desc:'' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">File</label>
                                    <div class="col-sm-10">
                                        <input type="file" onchange="displayImage(this);" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                            class="form-control" id="file" placeholder="" name="file">

                                            <br>
                                <div id="img_value">
                                    <img id="canvas" style="border:none;" src="{{ isset($galeri)? asset('media/galeri/thumbnail/'.$galeri->img_thumb):'' }}" width="100" height="100" />
                                </div>
                                <br>
                                    </div>
                                </div>


                                {{-- <strong>Publikasikan</strong>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div>Jika pilih <strong>Iya</strong> maka galeri ini bisa ditayangkan</div>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" name="published"
                                                value="yes"><span class="custom-control-label">Iya</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" name="published" value="no"
                                                checked><span class="custom-control-label">Nanti saja</span>
                                        </label>
                                    </div>
                                </div> --}}



                                <strong>Pilih Status tayang</strong>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div>Jika pilih <strong>Ditayangkan</strong> maka langsung tayang</div>

                                        <select class="form-control" id="published" name="published">

                                            @foreach (["no" => "Simpan sebagi konsep", "yes"=>"Ditayangkan"] as $item => $val)

                                                @if(isset($galeri))
                                                    @php $selected = "" @endphp
                                                    @if($galeri->published == $item)
                                                    @php $selected = "selected" @endphp

                                                    @endif

                                                    <option value="{{ $item}}" {{ $selected != ""? 'selected="selected"':null; }} >{{ $val }}</option>

                                                @else
                                                <option value="{{ $item}}" >{{ $val }}</option>
                                                @endif
                                            @endforeach

                                        </select>



                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Upload Media Galeri</button>
                                <a href="{{ route('admin.transaksi.galeri.index') }}" class="btn btn-default">
                                    Batal
                                </a>
                            </div>


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


          function displayImage(elem) {
              const [file] = elem.files
            console.log(elem.files)
            var image = document.getElementById("canvas");
            if(file){
                image.src = URL.createObjectURL(file) ;
            }else{
                image.src = "#" ;
            }

          }

          $(function() {
                $("#galeri_opd_id").css("min-width","300px").select2();
            });


        </script>
    @endsection
    @section('footer')
        @parent
    @stop
