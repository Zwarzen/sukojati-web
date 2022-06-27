@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')
    <form action="{{ isset($berita) && $mode=='edit'?
    route('admin.transaksi.berita.update', ["id" =>$berita->id]) :
    route('admin.transaksi.berita.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">

                <h4 class="page-head-title"> {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Berita<span class="page-head-sub-title"></span></h4>



                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                      <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.berita.index') }}">Semua Berita</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.berita.create') }}">Tambah Berita</a></li>
                    </ol>
                  </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table  card-border-color card-border-color-primary">
                            <div class="card-header">
                                Form {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Berita


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
                                    <label class="col-sm-2 col-form-label">Jenis Berita</label>
                                    <div class="col-sm-10">
                                        <select onchange="isBeritaVideo(this)"class="form-control" id="is_berita_video" name="is_berita_video">

                                            @php $jenisBerita = [
                                                "yes" => "Berita Teks",
                                            // "yes"=>"Berita Video"
                                            ]; @endphp
                                            @foreach ( $jenisBerita as $item => $val)

                                                @if(isset($berita))
                                                    @php $selected = "" @endphp
                                                    @if($berita->is_berita_video == $val)
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

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kanal</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="berita_kanal_id">

                                            @foreach ($kanal as $item)

                                                @if(isset($berita))
                                                    @php $selected = "" @endphp
                                                    @if($berita->berita_kanal_id == $item->id)
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

                                <div id="prop_src_video" style="display: none">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID Youtube</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="id_youtube" placeholder="id youtube"
                                                name="id_youtube" value="{{ isset($berita)?$berita->id_youtube:'' }}">

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Video Berita</label>
                                        <div class="col-sm-10">
                                            <input type="file" onchange="displayVideo(this);" accept="video/mp4"
                                                class="form-control" id="video" placeholder="" name="video">

                                                <br>
                                            <div id="video_value">

                                            @if(isset($berita) && $berita->url_video != "" )
                                            <div>
                                                <video id="canvas_video"
                                            style="border:none; height:20vh; width:50wv;"
                                            src="{{ asset("media/berita/video//").$berita->url_video }}"></video>
                                            </div>

                                            @endif

                                            </div>
                                            <br>
                                        </div>
                                    </div>



                                </div>

                                <br>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title"
                                            onchange="slugify(this)"
                                            onkeyup="slugify(this)" placeholder="Judul"
                                            name="title" value="{{ isset($berita)?$berita->title:'' }}">
                                            slug:
                                        <input type="text" readonly
                                            style="border:none; font-style:italic; font-size:1rem;"
                                            class="form-control" id="slug" placeholder="Slug Judul"
                                            name="slug" value="{{ isset($berita)?$berita->slug:'' }}">
                                        <div>Slug ini penting untuk alamat akses atau url identitas, misalnya : <br> www.xeample.go.id/berita/<i>judul-berita-terbaru-ini</i></div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keyword</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="keyword" placeholder="keyword"
                                            name="keyword" value="{{ isset($berita)?$berita->keyword:'' }}">
                                        <div>Tips:: <strong>Pisahkan kata kunci dengan tanda koma (,) misal: keyword, berita, daerah</strong> kunci ini berguna untuk mempermudah pembaca mencari berita dengan kata kata yang dia ketik dan sekaligus bagus di mesin pencari seperti SEO</div>
                                    </div>
                                </div>

                                <br>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan / cuplikan berita</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="desc" placeholder="Keterangan untuk cuplikan berita"
                                            name="desc" cols="30" rows="3">{{ isset($berita)?$berita->desc:'' }}</textarea>
                                        <div>Keterangan singkat: ini berguna untuk meta desc / cuplikan berita mempermudah penelusuran di mesin pencari atau SEO</div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Konten</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="content" placeholder="Konten Lengkap"
                                            name="content" cols="30" rows="16">{{ isset($berita)?$berita->content:'' }}</textarea>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gambar Utama</label>
                                    <div class="col-sm-10">
                                        <input type="file" onchange="displayImage(this);" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                            class="form-control" id="file" placeholder="" name="file">

                                            <br>
                                        <div id="img_value">

                                        @if(isset($berita) && $berita->img_thumb != "" )
                                            <img id="canvas" style="border:none; height:20vh; width:50wv;"
                                            src="{{ isset($berita)? asset('media/berita/thumbnail/'.$berita->img_thumb) : '' }}" />
                                        @endif

                                        </div>
                                        <br>
                                    </div>
                                </div>



                                <strong>Boleh Komentar pada berita</strong>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="padding:0.5rem"> </label>
                                    <div class="col-sm-10">
                                        <div>Jika pilih <strong>Boleh</strong> maka berita boleh dikomentari</div>

                                        <select class="form-control" id="allow_comment" name="allow_comment">

                                            @foreach (["no" => "Tidak Boleh", "yes"=>"Boleh"] as $item => $val)

                                                @if(isset($berita))
                                                    @php $selected = "" @endphp
                                                    @if($berita->allow_comment == $item)
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


                                <strong>Pilih Status tayang</strong>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div>Jika pilih <strong>Ditayangkan</strong> maka berita langsung tayang</div>

                                        <select class="form-control" id="published" name="published">

                                            @foreach (["no" => "Simpan sebagi konsep", "yes"=>"Ditayangkan"] as $item => $val)

                                                @if(isset($berita))
                                                    @php $selected = "" @endphp
                                                    @if($berita->published == $item)
                                                    @php $selected = "selected" @endphp

                                                    @endif

                                                    <option value="{{ $item}}" {{ $selected != ""? 'selected="selected"':null; }} >{{ $val }}</option>

                                                @else
                                                <option value="{{ $item}}" >{{ $val }}</option>
                                                @endif
                                            @endforeach

                                        </select>


                                        {{-- <label class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" name="published"
                                                value="yes" {{ isset($berita) && $berita->published == "yes"? "checked": null }}><span class="custom-control-label">Iya</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" name="published" value="no"
                                            {{ isset($berita) && $berita->published == "no"? "checked": null }} checked>
                                            <span class="custom-control-label">Nanti saja</span>
                                        </label> --}}
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Data Berita</button>
                                <a href="{{ route('admin.transaksi.berita.index') }}" class="btn btn-default">
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


            function isBeritaVideo(elem){
                if(elem.value == "no"){
                    $("#prop_src_video").hide();
                }else{
                    $("#prop_src_video").show();
                }
            }


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
                                name="img_desc" value="{{ isset($berita)?$berita->img_dec:'' }}" rquired>
                            <div>Keterangan gambar ini untuk memudahkan index di mesin pencari browser atau SEO</div>
                        </div>

                    `;
                    $("#img_value").html(img);
                    // image.src = URL.createObjectURL(file) ;
                }else{
                    image.src = "#" ;
                }





            }

            function displayVideo(elem) {
                const [file] = elem.files
                console.log(elem.files)
                var image = document.getElementById("canvas");
                if(file){
                    var img = `
                    <div>
                        <video id="canvas_video"
                    style="border:none; height:20vh; width:50wv;"
                    src="${URL.createObjectURL(file)}" ></video>
                    </div>

                    `;
                    $("#video_value").html(img);
                    // image.src = URL.createObjectURL(file) ;
                }else{
                    image.src = "#" ;
                }
            }



            function get_items() {
                $('#data-table').DataTable().ajax.reload();
            }


            function setUpTextEditor(){

                // console.log(CKEDITOR);

                // var content_field = document.getElementById("konten");
                // CKEDITOR.replace(content_field,{
                //     language:'en-gb'
                // });
                // CKEDITOR.config.allowedContent = true;

                CKEDITOR.replace( 'content' );
            }


            $(function() {
                setUpTextEditor()

                if($("#is_berita_video").val()!=="yes"){
                    $("#prop_src_video").hide()
                }

            });
        </script>
    @endsection
    @section('footer')
        @parent
    @stop
