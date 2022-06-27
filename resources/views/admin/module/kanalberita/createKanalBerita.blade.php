@extends('admin.layouts.main')

@section('header')
@parent
@stop


@section('sidebar')
@parent
@stop



@section('content')
<form action="{{route('admin.master.kanalberita.store')}}" method="post">
  @csrf
<div class="be-content">
  <div class="page-head">
    <h4 class="page-head-title">Tambah Kanal Berita<span class="page-head-sub-title"></span></h4>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb page-head-nav">
        <li class="breadcrumb-item"><a href="{{ route('admin.master.kanalberita.index') }}">Semua Kanal</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.master.kanalberita.create') }}">Tambah Kanal</a></li>
      </ol>
    </nav>

  </div>
  <div class="main-content container-fluid ">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-table  card-border-color card-border-color-primary">
          <div class="card-header">
            

          </div>
          <div class="card-body" style="padding: 1rem">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Kanal Berita</label>
              <div class="col-sm-10">


                <input type="text" class="form-control" id="name" 
                    onkeyup="slugify(this)" placeholder="Nama Kanal Berita"
                    name="name" value="{{ isset($berita)?$berita->title:'' }}">
                    slug:
                <input type="text" readonly 
                    style="border:none; font-style:italic; font-size:1rem;" 
                    class="form-control" id="slug" placeholder="Slug Judul"
                    name="slug" value="{{ isset($berita)?$berita->slug:'' }}">
                <div>Slug ini penting untuk alamat akses atau url identitas, misalnya : 
                  <br> www.xeample.go.id/berita/<i>nama-kanal-ini</i></div>
                
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.master.kanalberita.index')}}" class="btn btn-default">
              Batal
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script >

  
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
    $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{url('admin/list_kanalberita')}}",
      columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      { data: 'name', name: 'name' },
      {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
      }
      ]
    });
  });
  
  function get_items(){
    $('#data-table').DataTable().ajax.reload();
  }

</script>
@endsection
@section('footer')
@parent
@stop