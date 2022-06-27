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

                <h4 class="page-head-title"> {{ isset($mode) && $mode=="edit" ? "Edit" : "Tambah" }} Foto Item <span class="page-head-sub-title"></span></h4>
                                


                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                      <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.beritafoto.addFoto.{id}',$foto->beritafotos_id) }}">Semua Item Foto Berita</a></li>
                    

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

                                @include('admin.module.beritafoto.formCreateBeritaFotoItem',["mode"=>$mode,"foto" => $foto])
                               
                            </div>
                            <div class="card-footer">
                                
                            </div>
                            <div style="height:1rem"></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>


            
          

            function get_items() {
                $('#data-table').DataTable().ajax.reload();
            }


            

            $(function() {
                // setUpTextEditor()
                
                if($("#is_berita_video").val()!=="yes"){
                    $("#prop_src_video").hide()
                }
               
            });
        </script>
    @endsection
    @section('footer')
        @parent
    @stop
