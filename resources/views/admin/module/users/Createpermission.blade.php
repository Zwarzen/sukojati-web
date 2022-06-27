@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')
    <form  action="{{route('admin.users.permission.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="be-content">
            <div class="page-head">
                <h4 class="page-head-title"> Tambah Permission<span class="page-head-sub-title"></span></h4>

                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                      <li class="breadcrumb-item"><a href="{{ route('admin.users.permission.index') }}">Semua Permission</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.users.permission.create') }}">Tambah Permission</a></li>
                    
        
                    </ol>
                  </nav>

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


            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            
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
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>

                                    <div class="col-sm-10">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('Route') }}</label>

                                    <div class="col-sm-10">
                                        <input id="name" type="text" class="form-control @error('route') is-invalid @enderror" name="route" value="{{ old('route') }}" required autocomplete="route" autofocus>

                                        @error('route')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Permission Baru</button>
                                <a href="{{ route('admin.users.permission.index') }}" class="btn btn-default">
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
