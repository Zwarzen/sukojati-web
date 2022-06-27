@extends('admin.layouts.main')

@section('header')
@parent
@stop


@section('sidebar')
@parent
@stop



@section('content')
    <form  action="{{route('admin.users.profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
  
    <div class="be-content">
      <div class="page-head">
          <h4 class="page-head-title"> Edit User<span class="page-head-sub-title"></span></h4>

          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="{{ route('admin.users.profile.index') }}">Semua User</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.users.profile.create') }}">Tambah User</a></li>
            

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
                            <div class="col-sm-10">
                                <div>
                                    Roles : 
                                    @foreach($roles as $item)
                                        <span class="badge">{{ $item }}</span>
                                    @endforeach

                                </div>
                                
                                <br>
                                <div>
                                    Permissions : 
                                    @foreach($permission as $item)
                                        <span class="badge">{{ $item->name }} :: {{ $item->pivot->role_id }}</span>
                                    @endforeach

                                </div>

                            </div>
                          </div>

                          <div class="form-group row">
                              <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>

                              <div class="col-sm-10">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usersProfile->name }}" required autocomplete="name" autofocus>
                                  <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $usersProfile->id }}" required autocomplete="id" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('Username') }}</label>

                            <div class="col-sm-10">
                                <input id="name" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ $usersProfile->username }}" required readonly autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                          <div class="form-group row">
                              <label for="email" class="col-sm-2 col-form-label">{{ __('E-Mail Address') }}</label>

                              <div class="col-sm-10">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usersProfile->email }}" required readonly autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label">{{ __('Alamat') }}</label>
                              <div class="col-sm-10">

                                  <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Jalan Abcd ...."
                                      name="address" cols="30" rows="3">{{ $usersProfile->address }}</textarea>
                                  
                                  @error('address')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">{{ __('Password') }}</label>

                              <div class="col-sm-10">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>

                              <div class="col-sm-10">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Groups</label>
                              <div class="col-sm-10">
                                  <select id="select-role" class="form-control js-example-basic-multiple" name="role[]" multiple="multiple">
            
                                      @foreach ($group as $item)
                                        <option value="{{ $item->name }}" >{{ $item->name }}</option>
                                      @endforeach

                                  </select>
                              </div>
                          </div>

                      </div>
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Simpan Pengguna</button>
                          <a href="{{ route('admin.users.profile.index') }}" class="btn btn-default">
                              Batal
                          </a>
                      </div>


                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <script >
    let roles = `<?php echo json_encode($roles) ?>`

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $('#select-role').val(JSON.parse(roles))
        $('#select-role').trigger('change'); 
    });

  </script>
@endsection
@section('footer')
@parent
@stop