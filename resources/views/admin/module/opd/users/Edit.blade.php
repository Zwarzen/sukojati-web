@extends('admin.layouts.main')

@section('header')
@parent
@stop


@section('sidebar')
@parent
@stop



@section('content')
<form action="{{route('opd.update', $opd->id)}}" method="POST">
  @csrf
  @method('PUT')
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
                <input type="text" class="form-control" id="name" placeholder="Nama Ketegori" name="name" value="{{ $opd->name }}">
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
<script >
  $(function() {
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