@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')
    <form action="{{ isset($popupinfo) && $mode=='edit'? 
    route('admin.transaksi.popupinfo.update', ["id" =>$popupinfo->id]) : 
    route('admin.transaksi.popupinfo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">
                <h4 class="page-head-title"> Upload Media PopupInfo<span class="page-head-sub-title"></span></h4>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                      <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.popupinfo.index') }}">Semua PopupInfo</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.popupinfo.create') }}">Tambah PopupInfo</a></li>
                    

                    </ol>
                  </nav>
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

{{-- 
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="galeri_kategori_id">

                                            @foreach ($kategori as $item)

                                                @if(isset($popupinfo))
                                                    @php $selected = "" @endphp 
                                                    @if($popupinfo->galeri_kategori_id == $item->id)
                                                    @php $selected = "selected" @endphp 
                                                       
                                                    @endif

                                                    <option value="{{ $item->id }}" {{ $selected != ""? 'selected="selected"':null; }} >{{ $item->name }}</option>
                                                
                                                @else
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" 
                                            onchange="slugify(this.value)" placeholder="Judul"
                                            
                                            name="title" value="{{ isset($popupinfo)?$popupinfo->title:'' }}">
                                            slug (terisi otomatis):
                                            <input type="text" readonly 
                                            style="border:none; font-style:italic; font-size:1rem;" 
                                            class="form-control" id="slug" placeholder="Slug Judul"
                                            name="slug" value="{{ isset($popupinfo)?$popupinfo->slug:'' }}">
                                            <div>Slug ini penting untuk alamat akses atau url identitas, misalnya : <br> www.xeample.com/galeri/<i>kembang-mayang-wetan</i></div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Durasi (jam)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="duration" 
                                            onchange="slugify()"
                                             placeholder="Duration, isi angka (satuan jam)"
                                            name="duration" value="{{ isset($popupinfo)?$popupinfo->duration:'' }}">
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Link redirect</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_link_forward" 
                                             placeholder="Link redirect"
                                            name="link_forward" value="{{ isset($popupinfo)?$popupinfo->link_forward:'' }}">
                                            
                                            <p>
                                                <a class="btn" style="background: #fafafa" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                  <i class="fas fa-info"></i> Info
                                                </a>
                                              </p>
                                              <div class="collapse" id="collapseExample">
                                                <div class="card card-body">
                                                    <div>Link ini digunakan untuk mengalihkan dan menuju halaman sesuai link yang Anda berikan, misalnya :
                                                        <strong>
                                                            https://banyuwangikab.go.id/berita/ke-banyuwangi-menko-luhut-dijadwalkan-buka-kejurda-atletik-dan-tinjau-pengelolaan-sampah-di-banyuwangi  
                                                        </strong> 
                                                        <br> maka saat seseorang klik banner maka halaman akan berganti sesuai alamat link di atas 
                                                    
                                                    </div>

                                                </div>
                                              </div>                                            
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">

                                        <textarea type="text" class="form-control" id="desc" placeholder="Keterangan"
                                            name="desc" cols="30" rows="5">{{ isset($popupinfo)?$popupinfo->desc:'' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">File</label>
                                    <div class="col-sm-10">
                                        <input type="file" onchange="displayImage(this);" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                            class="form-control" id="file" placeholder="" name="file">

                                            <br>
                                <div id="img_value">
                                  <img id="canvas" style="border:none;" src="{{ isset($popupinfo)? asset('media/popupinfo/thumbnail/'.$popupinfo->img_thumb):'' }}" width="100" height="100" />
                                </div>
                                <br>
                                    </div>
                                </div>

                                
                                <strong>Pilih Status tayang</strong>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div>Jika pilih <strong>Ditayangkan</strong> maka langsung tayang</div>

                                        <select class="form-control" id="published" name="published">

                                            @foreach (["no" => "Simpan sebagi konsep", "yes"=>"Ditayangkan"] as $item => $val)

                                                @if(isset($popupinfo))
                                                    @php $selected = "" @endphp 
                                                    @if($popupinfo->published == $item)
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
{{-- 
                                <strong>Publikasikan</strong>
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
                                                checked><span class="custom-control-label">Simpan sebagai draft</span>
                                        </label>
                                    </div>
                                </div> --}}



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ $mode=='edit'? 'Update Media PopupInfo' : 'Upload Media PopupInfo'}}</button>
                                <a href="{{ route('admin.transaksi.popupinfo.index') }}" class="btn btn-default">
                                    Batal
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-title">Modal title</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="content-html"></div>
                </div>
            </div>
        </div>
        <script>


        function slugify(elem)
        {
            var str = elem;
            if(!elem){
                str = $("#title").val()
            }
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
              $('#data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ url('admin/list_kategorigaleri') }}",
                  columns: [{
                          data: 'DT_RowIndex',
                          name: 'DT_RowIndex'
                      },
                      {
                          data: 'name',
                          name: 'name'
                      },
                      {
                          data: 'action',
                          name: 'action',
                          orderable: true,
                          searchable: true
                      }
                  ]
              });
          });

          function showFrmTambah() {
              $.ajax({
                  type: 'GET',
                  url: "{{ url('/admin/add') }}",
                  dataType: "html",
                  success: function(html) {

                      $("#content-html").html(html)
                      $('#mymodal').modal('show')
                      $('#modal-title').html('Tambah OPD ')

                  },

                  error: function(err) {
                      console.log(err)
                  }
              })
          }

          function get_items() {
              $('#data-table').DataTable().ajax.reload();
          }
        </script>
    @endsection
    @section('footer')
        @parent
    @stop
