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
                            <h4 class="page-head-title">Daftar User Terkoneksi ke OPD / SKPD<span
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

                                    <div class="top-nav-tools-container">

                                        @can('tambah berita')
                                            <div class="item-btn-tools">
                                                <a class="tools-btn" href="{{ route('admin.opd.addUsers') }}">
                                                    <span class="fas fa-plus"></span> Tambah User ke OPD
                                                </a>
                                            </div>
                                        @endcan

                                        <div class="item-btn-tools">
                                            <form action="" method="get">
                                                <input type="hidden" name="page" value="{{ $users->currentPage() }}">


                                                <select name="unor" class="tool-inputs" id="unor_id">
                                                    <option></option>
                                                    <option value="all" {{ isset($unor) ? null : 'selected="selected"' }}>
                                                        Semua OPD / SKPD</option>


                                                    @foreach ($unors as $item)
                                                        @if (isset($unor))
                                                            @php $selected = "" @endphp
                                                            @if ($unor == $item->kd_unor)
                                                                @php $selected = "selected" @endphp
                                                            @endif

                                                            <option value="{{ $item->kd_unor }}"
                                                                {{ $selected != '' ? 'selected="selected"' : null }}>
                                                                {{ $item->nm_unor }}</option>
                                                        @else
                                                            <option value="{{ $item->kd_unor }}">{{ $item->nm_unor }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                                <input type="text" class="tool-inputs" placeholder="Cari User"
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

                            <div class="row">

                                <div class="col-sm-12">
                                    {{-- <table class="table table-striped table-hover table-fw-widget" id="data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                    </table> --}}

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

                                        .search-item-text-title-match {
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>OPD</th>
                                        </thead>
                                        <tbody>

                                            @foreach ($users as $key => $b)
                                                <tr>
                                                    <td>
                                                        {{ ++$key + ($users->currentPage() - 1) * $users->perPage() }}
                                                    </td>
                                                    <td>
                                                        <div class="txt-title-post">
                                                            <a class="link-berita"
                                                                href="{{ route('admin.transaksi.berita.edit', $b->id) }}">

                                                                @if (isset($keywords))
                                                                    @php
                                                                        $resTitle = [];
                                                                        $titles = explode(' ', $b->name);
                                                                        
                                                                        foreach ($titles as $k => $v) {
                                                                            if (in_array(strtolower($v), array_map('strtolower', $keywords))) {
                                                                                $bold = "<strong class='search-item-text-title-match'>$v</strong>";
                                                                                array_push($resTitle, $bold);
                                                                            } else {
                                                                                array_push($resTitle, $v);
                                                                            }
                                                                        }
                                                                        
                                                                        $resTitle = implode(' ', $resTitle);
                                                                        
                                                                    @endphp
                                                                    {!! $resTitle !!}
                                                                @else
                                                                    {{ $b->name }}
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="action-bar">


                                                            <div class="btn-group">


                                                                <div type="button" class="btn dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    opsi <i class="fas fa-cogs"></i>
                                                                </div>
                                                                <div class="dropdown-menu">

                                                                    <button onclick="destroyData({{ $b->id_list }})"
                                                                        class="dropdown-item btn btn-trash"> 
                                                                        <i class="fas fa-trash"></i> Trash
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>

                                                    <td>
                                                        <span>{{ $b->email }}</span>
                                                    </td>

                                                    <td>
                                                        <span>{{ $b->nm_unor }}</span>
                                                    </td>



                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <div style="padding:1rem;">

                                        {{ $users->appends([
                                                'q' => isset($keyword) ? $keyword : '',
                                                'unor' => isset($request->unor) ? $request->unor : 'all',
                                            ])->links('pagination::bootstrap-4') }}


                                    </div>



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
            var url = "{{ url('admin/opd/deleteUsers/') }}"
            if (confirm("Hapus User ini?") == true) {
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
                    }
                });
            }
        }

        function saveToDraftData(id) {
            var url = "{{ url('admin/transaksi/berita/saveToDraftData') }}"
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
            var url = "{{ url('admin/transaksi/berita/publishData') }}"
            if (confirm("Publish berita?") == true) {
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



        $(() => {
            $("#unor_id").css("min-width", "300px");
            $("#unor_id").select2({
                placeholder: "Silakan pilih OPD / SKPD"
            });
        })
    </script>
@endsection
@section('footer')
    @parent
@stop
