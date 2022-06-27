@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')
    <form action="{{ isset($berita) && $mode=='edit'? 
    route('admin.transaksi.beritafoto.update', ["id" =>$berita->id]) : 
    route('admin.transaksi.beritafoto.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">

                <h4 class="page-head-title"> {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Berita Foto <span class="page-head-sub-title"></span></h4>
                                


                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                      <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.beritafoto.index') }}">Semua Berita</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.beritafoto.create') }}">Tambah Berita</a></li>
                    

                    </ol>
                  </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table  card-border-color card-border-color-primary">
                            <div class="card-header">
                                Form {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Data Berita Foto
                                

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

                                @if(isset($berita))



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        Jumlah foto saat ini {{ $berita->jml_fotos }} <br>
                                        <a href="{{ route("admin.transaksi.beritafoto.addFoto.{id}",$berita->id) }}">
                                            <span class="btn btn-secondary"> 
                                                <i class="fas fa-wrench"></i> Kelola lebih lanjut foto
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <br>
                                @endif
                               
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


                                        
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Berita</button>
                                <a href="{{ route('admin.transaksi.beritafoto.index') }}" class="btn btn-default">
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
