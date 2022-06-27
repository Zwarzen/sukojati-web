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
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            cursor: pointer;
        }

        .tools-btn a {
            color: #186491;
            text-align: center;
        }

    </style>

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
            color: #2c373d !important
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


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="be-content">
        <div class="page-head">

            <h4 class="page-head-title"> Halaman Daftar Foto item <span class="page-head-sub-title"></span></h4>



            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb page-head-nav">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.transaksi.beritafoto.index') }}">
                            <i class="fas fa-arrow-left"></i> Lihat berita yang lain
                        </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table  card-border-color card-border-color-primary">
                        <div class="card-header">
                            {{-- <h4 class="page-head-title">Daftar Foto dari berita<span class="page-head-sub-title">  </span></h4> --}}
                            Foto - foto dari berita <br> <a class="link-berita"
                                href={{ route('admin.transaksi.beritafoto.edit', $berita->id) }}> " {{ $berita->title }}
                                " <i class="fas fa-link"></i> </a>
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
                                        <div style="display: inline-block; float left">
                                            <a class="tools-btn" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <span class="fas fa-plus"></span> Tambah
                                            </a>
                                        </div>
                                        <div style="display: inline-block; float left">
                                            <form action="" method="get">
                                                <input type="hidden" name="page" value="{{ $list_foto->currentPage() }}">

                                                <select name="published" class="tool-inputs" id="published">
                                                    <option value="all"
                                                        {{ isset($published) ? null : 'selected="selected"' }}>
                                                        Semua Status Tayang</option>


                                                    @foreach (['yes' => 'Ditayangkan', 'no' => 'Konsep'] as $item => $v)

                                                        @if (isset($published))
                                                            @php $selected = "" @endphp
                                                            @if ($published == $item)
                                                                @php $selected = "selected" @endphp

                                                            @endif

                                                            <option value="{{ $item }}"
                                                                {{ $selected != '' ? 'selected="selected"' : null }}>
                                                                {{ $v }}</option>

                                                        @else
                                                            <option value="{{ $item }}">{{ $v }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>


                                                <select name="kanal" class="tool-inputs" id="berita_kanal_id">
                                                    <option value="all"
                                                        {{ isset($kanal) ? null : 'selected="selected"' }}>
                                                        Semua kanal</option>


                                                    @foreach ($kanals as $item)

                                                        @if (isset($kanal))
                                                            @php $selected = "" @endphp
                                                            @if ($kanal == $item->id)
                                                                @php $selected = "selected" @endphp

                                                            @endif

                                                            <option value="{{ $item->id }}"
                                                                {{ $selected != '' ? 'selected="selected"' : null }}>
                                                                {{ $item->name }}</option>

                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->name }}
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


                                <div class="collapse" id="collapseExample">
                                    @include('admin.module.beritafoto.formCreateBeritaFotoItem',["mode" => "new", "berita"
                                    => $berita
                                    ])

                                </div>


                                <table id="table43" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Foto</th>
                                        <th>Tgl. Dibuat</th>
                                        <th>Dibuat Oleh</th>
                                    </thead>
                                    <tbody>


                                        @if ($list_foto->count() > 0)

                                            @foreach ($list_foto as $key => $b)
                                                <tr>
                                                    <td>
                                                        {{ ++$key + ($list_foto->currentPage() - 1) * $list_foto->perPage() }}
                                                    </td>
                                                    <td>
                                                        <div class="txt-title-post">
                                                            <a class="link-berita"
                                                                href="{{ route('admin.transaksi.beritafoto.editfoto', $b->id) }}">

                                                                @if (isset($keywords))
                                                                    @php
                                                                        $resTitle = [];
                                                                        $titles = explode(' ', $b->title);
                                                                        
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
                                                                    {{ $b->title }}
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="action-bar">

                                                            <div class="btn-group">
                                                                <div type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                  opsi <i class="fas fa-cogs"></i>
                                                                </div>
                                                                <div class="dropdown-menu">

                                                                    <div onclick="destroyData({{ $b->id }})"
                                                                        class="dropdown-item btn btn-trash">
                                                                        <i class="fas fa-trash"></i> Buang
                                                                    </div>

{{-- 
                                                                    @if ($b->published == 'yes')
                                                                        <div onclick="saveToDraftData({{ $b->id }})"
                                                                            class="dropdown-item btn btn-draft">
                                                                            <i class="fas fa-file"></i> Save
                                                                            To Draft
                                                                        </div>
                                                                    @else
                                                                        <div onclick="publishData({{ $b->id }})"
                                                                            class="dropdown-item btn btn-publish">
                                                                            <i class="fas fa-paper-plane "></i>
                                                                            Publish
                                                                        </div>
                                                                    @endif --}}

                                                                    @if ($b->is_utama == 'no')
                                                                        <button
                                                                            onclick="makePrimary({{ $b->id }})"
                                                                            class="dropdown-item btn btn-publish">
                                                                            <i class="fas fa-star "></i>
                                                                            Jadikan utama
                                                                        </button>
                                                                    @endif



                                                                </div>
                                                              </div>

                                                        </div>


                                                    </td>

                                                    <td>
                                                        @if (strlen($b->img_thumb))
                                                            
                                                            <a target="_blank"
                                                                href=" {{ $base_link_media_thumbnail . $b->img_thumb }}">
                                                                <img src="{{ $base_link_media_thumbnail . $b->img_thumb }}"
                                                                    style="height:2rem;" alt="">
                                                            </a>
                                                            @if ($b->is_utama == 'yes')
                                                                <i class="fas fa-star " style="color:#c7950a"></i>

                                                            @endif
                                                        @else
                                                            <div>Tidak ada </div>
                                                        @endif

                                                    </td>

                                                    <td>
                                                        <span>{{ $b->created_at }}</span>
                                                    </td>

                                                    <td>
                                                        <span>{{ $b->createdby }}</span>
                                                    </td>


                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <br>
                                <div style="padding:1rem;">
                                    {{ $list_foto->links('pagination::bootstrap-4') }}
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
        function makePrimary(id) {
            var url = "{{ url('admin/transaksi/beritafoto/makePrimaryFotoItem') }}"
            if (confirm("Jadikan foto utama?") == true) {
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

        function destroyData(id) {
            var url = "{{ url('admin/transaksi/beritafoto/deleteFotoItem/') }}"
            if (confirm("Hapus Berita?") == true) {
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
            var url = "{{ url('admin/transaksi/beritafoto/saveToDraftDataFotoItem') }}"
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
            var url = "{{ url('admin/transaksi/beritafoto/publishDataFotoItem') }}"
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


        $(function() {});
    </script>
@endsection
@section('footer')
    @parent
@stop
