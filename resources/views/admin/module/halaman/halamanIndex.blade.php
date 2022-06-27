
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
                            <h4 class="page-head-title">Daftar Halaman  / Menu<span
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

                                            <div class="item-btn-tools">
                                                <a class="tools-btn" href="{{ route('admin.master.halaman.create') }}">
                                                    <span class="fas fa-plus"></span> Tambah Halaman / Root Menu
                                                </a>
                                            </div>

                                        <div class="item-btn-tools">
                                            <form action="" method="get">
                                                <input type="hidden" name="page" value="{{ $halamans->currentPage() }}">

                                                <select name="published" class="tool-inputs" id="published">



                                                    @foreach (['yes' => 'Ditayangkan', 'no' => 'Konsep', 'all' => 'Semua Status Tayang'] as $item => $v)
                                                        @if (isset($published))
                                                            @php $selected = "" @endphp
                                                            @if ($published == $item)
                                                                @php $selected = "selected" @endphp
                                                            @endif

                                                            <option value="{{ $item }}"
                                                                {{ $selected != '' ? 'selected="selected"' : null }}>
                                                                {{ $v }}</option>
                                                        @else
                                                            @if ($item == 'yes')
                                                                <option value="{{ $item }}" selected="selected">
                                                                    {{ $v }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $item }}">{{ $v }}
                                                                </option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    {{-- <option value="all" {{ isset($published) ? null : 'selected="selected"' }}>
                                                        Semua Status Tayang</option> --}}

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
                                            <th>Urutan</th>
                                        </thead>
                                        <tbody>

                                            @foreach ($halamans as $key => $b)
                                                <tr>
                                                    <td>
                                                        {{ ++$key + ($halamans->currentPage() - 1) * $halamans->perPage() }}
                                                    </td>
                                                    <td>
                                                        <div class="txt-title-post">
                                                            <a class="link-berita"
                                                                href="{{ route('admin.master.halaman.edit', $b->id) }}">
                                                                <span
                                                                class="badge ">{{ $b->published == 'yes' ? 'Tayang' : 'Konsep' }}
                                                                :: </span>
                                                                @if (isset($keywords))
                                                                    @php
                                                                        $resTitle = [];
                                                                        $titles = explode(' ', $b->nama);

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
                                                                    {{ $b->nama }}
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

                                                                    <button onclick="destroyData({{ $b->id }})"
                                                                        class="dropdown-item btn btn-trash">
                                                                        <i class="fas fa-trash"></i> Trash
                                                                    </button>

                                                                    <a href="{{ route('admin.master.halaman.edit', $b->id)   }}"
                                                                        class="dropdown-item btn btn-edit">
                                                                        <i class="fas fa-edit "></i> Edit
                                                                    </a>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>{{ $b->urutan }}</td>




                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <div style="padding:1rem;">

                                        {{ $halamans->appends([
                                                'q' => isset($keyword) ? $keyword : '',
                                            ])->links('pagination::bootstrap-4') }}


                                    </div>



                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">

                                    @php

                                        //$halamanViaServicesProvider adalah variable list halaman dari appseriviceProvider
                                        //drawSelectListBeringkat() adalah variable list halaman dari appseriviceProvider

                                        $listPage = $halamanViaServicesProvider;


                                     function myList($n){
                                        echo "<ul style='list-style:none; background:#f7f7f7;'>";

                                            foreach($n as $row){
                                            $fontweight = (count($row->child)>0)||( $row->parent_id==0)? 'bold':'normal';
                                            echo '<li>

                                                <div class="btn-group">
                                                    <span title="urutan ke '.$row->urutan.', desc: '.$row->desc.'" style="font-weight:'.$fontweight.'" >'.$row->urutan.':: '.html_entity_decode($row->icon).' '.$row->nama.' </span>
                                                    <span  class="btn  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-caret-down"></i>
                                                    </span>
                                                    <div class="dropdown-menu">
                                                        <span class="dropdown-item"> '.$row->nama.'</span>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="'.url('/')."/".$row->url."/".$row->slug.'">
                                                            <i style=" color:blue" class="fa fa-globe"></i>
                                                            Kunjungi
                                                        </a>

                                                        <a class="dropdown-item" style="cursor:pointer" onclick="copySlug(\''.$row->slug.'\')" >

                                                            <i style=" color:blue" class="fa fa-copy"></i>
                                                            Salin slug

                                                            <input type="text" style="background:transparent;width:0px;border:none"  value="'.$row->slug.'" id="'.$row->slug.'">
                                                        </a>

                                                        <a class="dropdown-item" href="'.url('/').'/admin/master/halaman/create/?parent_id='.$row->id.'" >
                                                            <i style=" color:green" class="fa fa-plus"></i> Tambah Sub Halaman
                                                        </a>


                                                        <a class="dropdown-item" target="_blank" href="'.url('/').'/admin/master/halaman/edit/'.$row->id.'">
                                                            <i style=" color:green" class="fa fa-wrench"></i>
                                                            Edit
                                                        </a>




                                                    </div>
                                                </div>


                                             </li>';

                                          if(count($row->child) >0){
                                              echo "<ul>".myList($row->child)."</ul>";
                                          }
                                                }
                                            echo "</ul>";
                                        }


                                        myList($listPage);

                                    @endphp
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


        function copySlug(slug){
            var copyText = document.getElementById(slug);
            console.log(copyText)
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Berhasil copy slug: "+copyText.value)

        }


        function destroyData(id) {
            var url = "{{ url('admin/master/halaman/delete/') }}"
            if (confirm("Hapus Halaman ini?") == true) {
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
