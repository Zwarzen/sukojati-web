@extends('admin.layouts.main')

@section('header')
@parent
@stop


@section('sidebar')
@parent
@stop



@section('content')
<form action="{{route('opd.store')}}" method="post">
  @csrf
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
<link src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
<div class="be-content">
  <div class="page-head">
    <h4 class="page-head-title">Kategori Galeri<span class="page-head-sub-title"></span></h4>
  </div>
  <div class="main-content container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-table  card-border-color card-border-color-primary">
          <div class="card-header">
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Kategori</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" placeholder="Nama OPD" name="nama">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Singkatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="singkatan" placeholder="Singkatan" name="singkatan">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control ckeditor" id="deskripsi" placeholder="Deskripsi" name="deskripsi">
                <!-- <textarea name="deskripsi" class="my-editor form-control" id="deskripsi" cols="20" rows="10"></textarea> -->
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Slug</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">No HP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="no_hp" placeholder="No Hp" name="no_hp">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('opd.index')}}" class="btn btn-default">
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script >
  $(function() {
    CKEDITOR.replace('#ckeditor');
    $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{url('admin/list_opd')}}",
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
  function showFrmTambah(){
    $.ajax({
      type: 'GET',
      url: "{{url('/admin/add')}}",
      dataType:"html",
      success: function(html) {

        $("#content-html").html(html)
        $('#mymodal').modal('show')
        $('#modal-title').html('Tambah OPD ')

      },

      error: function(err){
        console.log(err)
      }
    })
  }
  function get_items(){
    $('#data-table').DataTable().ajax.reload();
  }

</script>
@endsection
@section('footer')
@parent
@stop