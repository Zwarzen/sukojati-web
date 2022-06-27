@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')


    <form
        action="{{ isset($halaman) && $mode == 'edit'
            ? route('admin.master.halaman.update', ['id' => $halaman->id])
            : route('admin.master.halaman.store') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">

                <h4 class="page-head-title"> {{ isset($mode) && $mode == 'edit' ? 'Edit' : 'Tambah' }} Halaman / Menu <span
                        class="page-head-sub-title"></span></h4>



                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="{{ route('admin.master.halaman.index') }}">Semua Halaman</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.master.halaman.create') }}">Tambah Halman</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table  card-border-color card-border-color-primary">
                            <div class="card-header">
                                Form {{ isset($mode) && $mode == 'edit' ? 'Edit' : 'Tambah' }} Halaman / Menu


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

                                @if (isset($halaman) && $halaman->parent_id != 0)
                                    <br>
                                    <div class=" row">
                                        <label class="col-sm-2 col-form-label">Parent Halaman Saat ini </label>
                                        <div class="col-sm-10">

                                            <div>{{ $halaman->parent_nama }}</div>
                                        </div>
                                    </div>
                                @endif




                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Parent Halaman</label>
                                    <div class="col-sm-10">

                                        @php
                                            //getChildren() adalah fungsi yang didapat dari helper menu
                                            //$halamanViaServicesProvider adalah variable list halaman dari appseriviceProvider
                                            //drawSelectListBeringkat() adalah variable list halaman dari appseriviceProvider

                                            $listPage = $halamanViaServicesProvider;

                                        @endphp
                                        <select name="parent_id" class="form-control tool-inputs" id="parent_id">

                                            @if ($mode == 'new')
                                                @if (isset($parent_id_for_submenu))
                                                    @php

                                                        drawSelectListBeringkat($listPage, null, $parent_id_for_submenu);
                                                    @endphp
                                                @else
                                                    @php
                                                        echo "<option value='0' selected>Halaman dasar / root </option>";
                                                        drawSelectListBeringkat($listPage, null, null);
                                                    @endphp
                                                @endif
                                            @else
                                                @if ($halaman->parent_id == 0)
                                                    @php
                                                        echo "<option value='0' selected>Halaman dasar [ level: 0 ]</option>";
                                                        drawSelectListBeringkatEditPage($listPage, $halaman, null);
                                                    @endphp
                                                @else
                                                    @php
                                                        drawSelectListBeringkatEditPage($listPage, $halaman, $halaman->parent_id);
                                                        echo "<option value='0' >Halaman dasar [ level: 0 ]</option>";
                                                    @endphp
                                                @endif

                                            @endif
                                        </select>


                                        <i>Menentukan parent halaman untuk menjadikan menu root atau submenu</i>
                                    </div>
                                </div>




                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" onchange="slugify(this)"
                                            onkeyup="slugify(this)" placeholder="Nama" name="nama"
                                            value="{{ isset($halaman) ? $halaman->nama : '' }}">
                                        slug:
                                        <input type="text" readonly style="border:none; font-style:italic; font-size:1rem;"
                                            class="form-control" id="slug" placeholder="Slug Nama" name="slug"
                                            value="{{ isset($halaman) ? $halaman->slug : '' }}">
                                        <div>Slug ini penting untuk alamat akses atau url identitas, misalnya : <br>
                                            www.xeample.go.id/halaman/<i>Nama-berita-terbaru-ini</i></div>
                                    </div>
                                </div>
                                <br>

                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Statik</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="is_statis" id="id_is_statis">
                                            @php
                                                $op = [0 => 'Tidak', 1 => 'Ya'];

                                                foreach ($op as $k => $v) {
                                                    $selected = '';
                                                    if (isset($halaman)) {
                                                        if ($halaman->is_statis == $k) {
                                                            $selected = 'selected';
                                                        }
                                                    } else {
                                                        if ($k == '1') {
                                                            $selected = 'selected';
                                                        }
                                                    }

                                                    echo "<option value='$k' $selected>$v</option>";
                                                }
                                            @endphp

                                        </select>
                                    </div>
                                </div>




                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Url Controller segment
                                        Halaman</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="url" class="form-control" id="id_url"
                                            placeholder="url Controller misal: halaman/transparansi"
                                            value="<?= isset($halaman) ? $halaman->url : 'halaman' ?>">
                                        <i style="padding:0.5rem; background:#f7f7f7; ">Catatan: untuk halaman yang bersifat
                                            statik sebaiknya menggunakan url controller bawaan yaitu
                                            <strong>"halaman"</strong> </i>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Urutan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="urutan" placeholder="urutan"
                                            name="urutan" value="{{ isset($halaman) ? $halaman->urutan : '' }}">
                                        <i style="padding:0.5rem; background:#f7f7f7; ">Catatan: isilah angka urutan halaman
                                            untuk menentukan posisi halaman pada menu, misalnya <strong>"1,2,3 dan
                                                seterusnya"</strong> </i>

                                    </div>
                                </div>

                                <br>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keyword</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="keyword" placeholder="keyword"
                                            name="keyword" value="{{ isset($halaman) ? $halaman->keyword : '' }}">
                                        <div>Tips:: <strong>Pisahkan kata kunci dengan tanda koma (,) misal: keyword,
                                                halaman, daerah</strong> kunci ini berguna untuk mempermudah pembaca mencari
                                            halaman dengan kata kata yang dia ketik dan sekaligus bagus di mesin pencari
                                            seperti SEO</div>
                                    </div>
                                </div>

                                <br>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan / cuplikan halaman</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="desc" placeholder="Keterangan untuk cuplikan halaman" name="desc"
                                            cols="30" rows="3">{{ isset($halaman) ? $halaman->desc : '' }}</textarea>
                                        <div>Keterangan singkat: ini berguna untuk meta desc / cuplikan halaman mempermudah
                                            penelusuran di mesin pencari atau SEO</div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Konten</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="content" placeholder="Konten Lengkap" name="content" cols="30"
                                            rows="16">{{ isset($halaman) ? $halaman->content : '' }}</textarea>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gambar Utama</label>
                                    <div class="col-sm-10">
                                        <input type="file" onchange="displayImage(this);"
                                            accept="image/x-png,image/gif,image/jpeg,image/jpg" class="form-control"
                                            id="file" placeholder="" name="file">

                                        <br>
                                        <div id="img_value">

                                            @if (isset($halaman) && $halaman->img_thumb != '')
                                                <img id="canvas" style="border:none; height:20vh; width:50wv;"
                                                    src="{{ isset($halaman) ? asset('media/halamanfoto/thumbnail/' . $halaman->img_thumb) : '' }}" />
                                            @endif

                                        </div>
                                        <br>
                                    </div>
                                </div>



                                <strong>Boleh Komentar pada halaman</strong>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="padding:0.5rem"> </label>
                                    <div class="col-sm-10">
                                        <div>Jika pilih <strong>Boleh</strong> maka halaman boleh dikomentari</div>

                                        <select class="form-control" id="allow_comment" name="allow_comment">

                                            @foreach (['no' => 'Tidak Boleh', 'yes' => 'Boleh'] as $item => $val)
                                                @if (isset($halaman))
                                                    @php $selected = "" @endphp
                                                    @if ($halaman->allow_comment == $item)
                                                        @php $selected = "selected" @endphp
                                                    @endif

                                                    <option value="{{ $item }}"
                                                        {{ $selected != '' ? 'selected="selected"' : null }}>
                                                        {{ $val }}</option>
                                                @else
                                                    <option value="{{ $item }}">{{ $val }}</option>
                                                @endif
                                            @endforeach

                                        </select>



                                    </div>
                                </div>


                                <strong>Pilih Status tayang</strong>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div>Jika pilih <strong>Ditayangkan</strong> maka halaman langsung tayang</div>

                                        <select class="form-control" id="published" name="published">

                                            @foreach (['no' => 'Simpan sebagi konsep', 'yes' => 'Ditayangkan'] as $item => $val)
                                                @if (isset($halaman))
                                                    @php $selected = "" @endphp
                                                    @if ($halaman->published == $item)
                                                        @php $selected = "selected" @endphp
                                                    @endif

                                                    <option value="{{ $item }}"
                                                        {{ $selected != '' ? 'selected="selected"' : null }}>
                                                        {{ $val }}</option>
                                                @else
                                                    <option value="{{ $item }}">{{ $val }}</option>
                                                @endif
                                            @endforeach

                                        </select>


                                        {{-- <label class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" name="published"
                                                value="yes" {{ isset($halaman) && $halaman->published == "yes"? "checked": null }}><span class="custom-control-label">Iya</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" name="published" value="no"
                                            {{ isset($halaman) && $halaman->published == "no"? "checked": null }} checked>
                                            <span class="custom-control-label">Nanti saja</span>
                                        </label> --}}
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Data Halaman</button>
                                <a href="{{ route('admin.master.halaman.index') }}" class="btn btn-default">
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
            function slugify(elem) {
                var str = elem.value;





                if($("#desc").val() == ''){
                    $("#desc").val(str)
                }

                if($("#keyword").val() == ''){
                    $("#keyword").val(str)
                }




                str = str.replace(/^\s+|\s+$/g, '');

                // Make the string lowercase
                str = str.toLowerCase();

                // Remove accents, swap ñ for n, etc
                var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆÍÌÎÏŇÑÓÖÒÔÕØŘŔŠŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇíìîïňñóöòôõøðřŕšťúůüùûýÿžþÞĐđßÆa·/_,:;";
                var to = "AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------";
                for (var i = 0, l = from.length; i < l; i++) {
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
                if (file) {
                    var img = `
                    <div>
                        <img id="canvas"
                    style="border:none; height:20vh; width:50wv;"
                    src="${URL.createObjectURL(file)}" />
                    </div>

                    <br>



                    <div >
                            <input type="text" class="form-control" id="img_desc"
                                placeholder="Keterangan singkat gambar"
                                name="img_desc" value="{{ isset($halaman) ? $halaman->img_dec : '' }}" rquired>
                            <div>Keterangan gambar ini untuk memudahkan index di mesin pencari browser atau SEO</div>
                        </div>

                    `;
                    $("#img_value").html(img);
                    // image.src = URL.createObjectURL(file) ;
                } else {
                    image.src = "#";
                }





            }

            function displayVideo(elem) {
                const [file] = elem.files
                console.log(elem.files)
                var image = document.getElementById("canvas");
                if (file) {
                    var img = `
                    <div>
                        <video id="canvas_video"
                    style="border:none; height:20vh; width:50wv;"
                    src="${URL.createObjectURL(file)}" ></video>
                    </div>

                    `;
                    $("#video_value").html(img);
                    // image.src = URL.createObjectURL(file) ;
                } else {
                    image.src = "#";
                }
            }



            function get_items() {
                $('#data-table').DataTable().ajax.reload();
            }


            function setUpTextEditor() {

                // console.log(CKEDITOR);

                // var content_field = document.getElementById("konten");
                // CKEDITOR.replace(content_field,{
                //     language:'en-gb'
                // });
                // CKEDITOR.config.allowedContent = true;

                CKEDITOR.replace('content');
            }


            $(function() {
                setUpTextEditor()
                $("#parent_id").css("min-width", "300px");
                $("#parent_id").select2({
                    placeholder: "Silakan pilih Parent Halaman "
                });


            });
        </script>
    @endsection




    @section('footer')
        @parent
    @stop
