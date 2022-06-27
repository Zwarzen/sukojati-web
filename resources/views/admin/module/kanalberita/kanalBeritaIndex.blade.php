@extends('admin.layouts.main')

@section('header')
@parent
@stop


@section('sidebar')
@parent
@stop



@section('content')
<div class="be-content">
    <div class="page-head">
        <h4 class="page-head-title">Daftar Master Kanal Berita<span class="page-head-sub-title"></span></h4>

        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="{{ route('admin.master.kanalberita.index') }}">Semua Kanal</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.master.kanalberita.create') }}">Tambah Kanal</a></li>
            </ol>
          </nav>

    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table  card-border-color card-border-color-primary">
                    <div class="card-header">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('info'))
                        <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Please check the form below for errors
                        </div>
                    @endif
                    </div>
                    <div class="card-body" style="padding:1rem">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav">
                                    <li class="nav-item">
                                      <a href="{{route('admin.master.kanalberita.create')}}" class="nav-link">
                                        <span class="btn">
                                            <span class="fas fa-plus"></span> Tambah
                                        </span>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a javascripttitle="Refresh" class="nav-link" href="javascript:void(0)" onclick="get_items()">
                                            <span class="btn" data-toggle="modal">
                                                <span class="fas fa-sync"></span> Muat ulang
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="container-fluid" id="info_proses"></div>
                        <div class="col-sm-12">
                            <table class="table table-striped table-hover table-fw-widget" id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script >
    $(function() {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('admin/master/kanalberita/getlist')}}",
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

    function destroyData(id){
        var url = "{{url('admin/master/kanalberita/delete/')}}"
        if (confirm("Delete Record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type:"delete",
                url: url+"/"+id,
                data: { id: id,"_token": "{{ csrf_token() }}", _method: "post" },
                dataType: 'json',
                success: function(res){

                    if(res.status){
                        $('#data-table').DataTable().ajax.reload()
                    }else{
                        alert(res.message)
                    }
                }
            });
        }
    }

</script>
@endsection
@section('footer')
@parent
@stop
