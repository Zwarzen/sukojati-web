@extends('admin.layouts.main')

@section('header')
@parent
@stop


@section('sidebar')
@parent
@stop



@section('content')
    <form  action="{{route('admin.users.role.hiteditrole', $role->id) }}" method="post" enctype="multipart/form-data">
        @csrf
  
    <!-- @method('PUT') -->
    <div class="be-content">
      <div class="page-head">
          <h4 class="page-head-title"> Edit Role<span class="page-head-sub-title"></span></h4>

          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="{{ route('admin.users.role.index') }}">Semua Role</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.users.role.create') }}">Tambah Role</a></li>
            

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
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Groups</label>
                            <div class="col-sm-10">
                                <select id="select-permission" class="form-control js-example-basic-multiple" name="permission[]" multiple="multiple">
          
                                    @foreach ($permissions as $item)
                                      <option value="{{ $item->name }}" >{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                      </div>
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Simpan Role</button>
                          <a href="{{ route('admin.users.role.index') }}" class="btn btn-default">
                              Batal
                          </a>
                      </div>


                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <script >
    let mypermissions = `<?php echo json_encode($mypermissions) ?>`

    $(document).ready(function() {
        console.log(mypermissions);
        
        $('.js-example-basic-multiple').select2();
        $('#select-permission').val(JSON.parse(mypermissions))
        $('#select-permission').trigger('change'); 
    });

  </script>
@endsection
@section('footer')
@parent
@stop