@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')

    <style>
        .top-nav-tools-container {
            padding: 1rem;
        }

        .item-btn-tools {
            display: inline-flex;
            box-sizing: border-box;
        }

        .tool-inputs {
            background: #ffffff;
            color: #2c373d;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin-left: 0.5rem;
            margin-right: 0.5rem;


        }

        .tools-btn {
            background: #e7f9ff;
            color: #186491;
            border: 1px solid #a7a7a7;
            border-radius: 5px;
            padding: 0.5rem;
            min-width: 100px;
            margin: 0.5rem;
            cursor: pointer;
        }

        .tools-btn a {
            color: #186491;
            text-align: center;
        }

    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="be-content">
        {{-- <div class="page-head">
            <h4 class="page-head-title">Pemeliharaan Berita<span class="page-head-sub-title"></span></h4>
        </div> --}}
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table  card-border-color card-border-color-primary">
                        <div class="card-header">
                            <h4 class="page-head-title">Menambahkan User ke OPD <span
                                    class="page-head-sub-title"></span></h4>
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


                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>
                            @endif


                        </div>
                        <div class="card-body" style="padding:1rem">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.opd.doAddUsers') }}" method="post">
                                        @csrf
                                    <div class="top-nav-tools-container">

                                        <div class="item-btn-tools">
                                           
                                              
                                            
                                                <select name="unor" class="tool-inputs" id="unor_id" onchange="changeOPD(this.value)">
                                                    {{-- <option value="all"
                                                        {{ isset($unor) ? null : 'selected="selected"' }}>
                                                        Pilih OPD / SKPD</option> --}}

                                                        <option></option>

                                                    @foreach ($unors as $item)
                                                    <option value="{{ $item->kd_unor }}">{{ $item->nm_unor }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="item-btn-tools">
                                                <div id="id_content_select_component"></div>
                                            </div>

                                                {{-- <input type="text" class="tool-inputs" placeholder="Cari User"
                                                    name="keyword" value="{{ isset($keyword) ? $keyword : '' }}"> --}}


                                                    <div class="item-btn-tools">


                                                <button type="submit" class="tools-btn">
                                                    Tambah ke OPD
                                                </button>
                                            </div>
                                            
                                        


                                    </div>

                                </form>

                                </div>
                            </div>

                            <div class="container-fluid" id="info_proses"></div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>

        function changeOPD(id_opd){

            console.log("change OPD .. .. . .")
            console.log(id_opd);


            var url = "{{ url('admin/opd/getUserComponentNotIn') }}"


            $.ajax({
                    type: "get",
                    url: url + "/" + id_opd,
                    // data: {
                    //     id_opd: id_opd,
                    //     "_token": "{{ csrf_token() }}",
                    //     _method: "get"
                    // },
                    dataType: 'html',
                    success: function(res) {
                        $("#id_content_select_component").html(res)
                        
                        
                    },
                    error:(xhr,status,error)=>{
                        $("#id_content_select_component").html(xhr.responseText)
                    }
                });

                
        }




        $(()=>{
            $("#unor_id").css("min-width","300px");
            $("#unor_id").select2({
                placeholder: "Silakan pilih OPD / SKPD"
            });

            
            changeOPD('all')


        })

    </script>
@endsection
@section('footer')
    @parent
@stop
