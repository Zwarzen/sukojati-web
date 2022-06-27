@extends('admin.layouts.main')

@section('header')
    @parent
@stop


@section('sidebar')
    @parent
@stop



@section('content')

   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="be-content">
        <style>
            .top-nav-tools-container {
                padding: 1rem;
            }
    
            .item-btn-tools{
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
    
            @media all and (max-width:600px){
                .item-btn-tools{
                    box-sizing: border-box;
                }
            }
    
        </style>

        {{-- <div class="page-head">
            <h4 class="page-head-title">Pemeliharaan Berita<span class="page-head-sub-title"></span></h4>
        </div> --}}

        
        <div class="main-content container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table  card-border-color card-border-color-primary">
                        <div class="card-header">
                            <h4 class="page-head-title">Modul Pengelolaan Anggaran<span class="page-head-sub-title"></span> 
                                <a href="{{ route('admin.transparansi.pengelolaan.index') }}">
                                <span class="btn float-right">  
                                    <i class="fas fa-times" style="margin-right: 1rem"></i>
                                </span>
                            </a>
                            </h4>
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
                        <div class="card-body" style="padding:1rem">
                            <div class="row">
                                <div class="col-sm-12">

                                    
                                    <div class="top-nav-tools-container">

                                        {{-- @can('tambah berita') --}}
                                        <div class="item-btn-tools">
                                            <a class="tools-btn" href="{{ route('admin.transparansi.pengelolaan.create') }}">
                                                <span class="fas fa-plus"></span> Tambah
                                            </a>
                                        </div>

                                        {{-- @endcan --}}
                                        
                                        <div class="item-btn-tools">
                                            <form action="" method="get">
                                                <input type="hidden" name="page" value="{{ $anggaran->currentPage() }}">

                                           
                                                <select name="kategori" class="tool-inputs" id="anggaran_kategori_id">
                                                    <option value="all" {{ isset($kategoris) ? null : 'selected="selected"' }}>
                                                        Semua kategori </option>

                                                    @foreach ($kategoris as $item)

                                                        @if (isset($kategori))
                                                            @php $selected = "" @endphp
                                                            @if ($kategori == $item->id_kategori)
                                                                @php $selected = "selected" @endphp

                                                            @endif

                                                            <option value="{{ $item->id_kategori }}"
                                                                {{ $selected != '' ? 'selected="selected"' : null }}>
                                                                {{ $item->kategori }}</option>

                                                        @else
                                                            <option value="{{ $item->id_kategori }}">{{ $item->kategori }}
                                                            </option>
                                                        @endif

                                                    @endforeach

                                                </select>


                                                <select name="tahun" class="tool-inputs" id="anggaran_tahun_id">
                                                    <option value="all" {{ isset($tahuns) ? null : 'selected="selected"' }}>
                                                        Semua tahun </option>

                                                    @foreach ($tahuns as $item)

                                                        @if (isset($tahun))
                                                            @php $selected = "" @endphp
                                                            @if ($tahun == $item->tahun)
                                                                @php $selected = "selected" @endphp

                                                            @endif

                                                            <option value="{{ $item->tahun }}"
                                                                {{ $selected != '' ? 'selected="selected"' : null }}>
                                                                {{ $item->tahun }}</option>

                                                        @else
                                                            <option value="{{ $item->tahun }}">{{ $item->id - $item->tahun }}
                                                            </option>
                                                        @endif

                                                    @endforeach

                                                </select>

                                                <input type="text" class="tool-inputs" placeholder="cari judul"
                                                    name="keyword" value="{{ isset($keyword) ? $keyword : '' }}">

                                                <button type="submit" class="tools-btn">
                                                    Cari
                                                </button>
                                            </form>
                                        </div>




                                    </div>

                                </div>
                            </div>

                            <div class="container-fluid" id="info_proses"></div>
                            <div class="col-sm-12">
                             
                                <style>
                                    .link-berita {
                                        color: #386d8b;
                                        font-weight: 500;
                                    }

                                    .action-bar {
                                        opacity: 0;
                                    }

                                    .action-bar:hover {
                                        opacity: 1;
                                    }

                                    .search-item-text-title-match{
                                        color: #3cb2f1;
                                    }
                                    .txt-title-post {
                                        font-size: 1.1rem;
                                        color: #2c373d
                                    }

                                    .btn-edit {
                                        color: #388b38 !important
                                    }

                                    .btn-trash {
                                        color: #b9342a !important
                                    }

                                    .btn-draft,
                                    .btn-publish {
                                        color: #386d8b !important
                                    }

                                    @media screen and (max-width:600px) {
                                        .action-bar {
                                            opacity: 0.7;
                                        }
                                    }

                                </style>
                                <table id="table43" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tahun Anggaran</th>
                                        <th>Dokumen</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($anggaran as $key => $b)
                                            <tr>
                                                <td>
                                                    {{ ++$key + ($anggaran->currentPage() - 1) * $anggaran->perPage() }}
                                                </td>
                                                <td>
                                                    <div class="txt-title-post">
                                                        <a class="link-berita"
                                                            href="{{ route('admin.transparansi.pengelolaan.edit', $b->id) }}">
                                                            @if(isset($keywords))
                                                                @php 
                                                                    $resTitle = [];
                                                                    $titles = explode(" ",$b->judul_dokumen);

                                                                    foreach ($titles as $k => $v) {
                                                                            if( in_array(strtolower($v),array_map("strtolower", $keywords))){
                                                                                $bold = "<strong class='search-item-text-title-match'>$v</strong>";
                                                                                array_push($resTitle,$bold);
                                                                            }else{
                                                                                array_push($resTitle,$v); 
                                                                            }
                                                                        }

                                                                    $resTitle = implode(" ",$resTitle);
                                                                        
                                                                @endphp
                                                                {!! $resTitle !!}
                                                            @else
                                                                {{ $b->judul_dokumen }}
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="action-bar">


                                                        <div class="btn-group">

                                                            
                                                            <div type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              opsi <i class="fas fa-cogs"></i>
                                                            </div>
                                                            <div class="dropdown-menu">

                                                                {{-- @can('edit berita') --}}
                                                                    <a href="{{ route('admin.transparansi.pengelolaan.edit', $b->id) }}"
                                                                        id="update-berita" class="dropdown-item btn btn-edit">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                {{-- @endcan --}}
                                                                
                                                                {{-- @can('hapus berita') --}}
                                                                    <button onclick="destroyData({{ $b->id }})" class="dropdown-item btn btn-trash"> <i class="fas fa-trash"></i> Trash</button>
                                                                {{-- @endcan --}}

{{--                                                                 
                                                                @if ($b->published == 'yes')
                                                                    <button onclick="saveToDraftData({{ $b->id }})"  class="dropdown-item btn btn-draft"> <i class="fas fa-file"></i> Save To Draft</button>
                                                                @else
                                                                    <button onclick="publishData({{ $b->id }})"  class=" dropdown-item btn btn-publish"> <i class="fas fa-paper-plane "></i> Publish</button>
                                                                @endif --}}



                                                            </div>
                                                          </div>



                                                    </div>

                                                    

                                                </td>

                                                <td>
                                                    <span>{{ $b->tahun }}</span> 
                                                </td>

                                                <td>
                                                    @if(isset($b) && $b->nama_file != "" )
                                                        <a href="{{ asset($link_path_media_pdf.$b->nama_file) }}"> <span> <img style="display:inline; height:16px; width:16px; margin-right:5px;" src="{{ asset('presentation/b-asset/img/icon_pdf.png') }}" alt=""> <span>{{ $b->nama_file }}</span> </span></a>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div style="padding:1rem;">

                                    {{ $anggaran->appends(
                                        [
                                        'keyword' => isset($keyword)  ? $keyword : '',
                                        "tahun"=> isset($request->tahun) ? $request->tahun : 'all', 
                                        "kategori" => isset($request->kategori) ? $request->kategori : 'all'])
                                        ->links("pagination::bootstrap-4") 
                                    }}

                                    
                                </div>

                            </div>
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
        

      
        function destroyData(id) {
            var url = "{{ url('admin/transparansi/pengelolaan/delete/') }}"
            if (confirm("Hapus data?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "delete",
                    url: url + "/" + id,
                    data: {
                        id: id,
                        "_token": "{{ csrf_token() }}",
                        _method: "delete"
                    },
                    dataType: 'json',
                    success: function(res) {
                        alert("sukes hapus data")
                        location.reload(); 


                        // if (res.status) {
                        //     $('#data-table').DataTable().ajax.reload()
                        // } else {
                        //     alert(res.message)
                        // }
                    }
                });
            }
        }

        function saveToDraftData(id) {
            var url = "{{ url('admin/transparansi/pengelolaan/saveToDraftData') }}"
            if (confirm("Simpan ke draft / konsep?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "put",
                    url: url + "/" + id,
                    data: {
                        id: id,
                        "_token": "{{ csrf_token() }}",
                        _method: "put"
                    },
                    dataType: 'json',
                    success: function(res) {
                        alert(res.message)
                        location.reload(); 


                        // if (res.status) {
                        //     $('#data-table').DataTable().ajax.reload()
                        // } else {
                        //     alert(res.message)
                        // }
                    }
                });
            }
        }

        function publishData(id) {
            var url = "{{ url('admin/transparansi/pengelolaan/publishData') }}"
            if (confirm("Publish data?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "put",
                    url: url + "/" + id,
                    data: {
                        id: id,
                        "_token": "{{ csrf_token() }}",
                        _method: "put"
                    },
                    dataType: 'json',
                    success: function(res) {
                        alert(res.message)
                        location.reload(); 


                        // if (res.status) {
                        //     $('#data-table').DataTable().ajax.reload()
                        // } else {
                        //     alert(res.message)
                        // }
                    }
                });
            }
        }


        $(function() {
            $("#anggaran_kategori_id").css("min-width","300px").select2();
            $("#anggaran_tahun_id").css("min-width","150px").select2();
        });
    </script>
@endsection
@section('footer')
    @parent
@stop
