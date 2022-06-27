<style>
    @media screen and (max-width:600px) {
        #sdb-btn {
            display: none;
        }
    }

</style>
<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Menu</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content" style="background:#ffffff">
                    <ul class="sidebar-elements" id="sdb-el" style="background:#ffffff">
                        {{-- <li title="Menu aplikasi" id="sdb-btn" class="divider">Menu</li> --}}

                        <li title="Panel untuk ringakasan informasi yang ada dalam sistem" class="  <?= (isset($menu)? $menu== 'dash' ? 'active':'' : ''); ?>">
                            <a href="{{ url('admin') }}" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Panel ">
                                <i class="fa fa-home" aria-hidden="true"></i> <span>Panel </span>
                            </a>
                        </li>




                        @hasanyrole("Admin|SuperAdmin|Operator|Opd")

                        <li title="Setup data" class="parent">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Master ">
                                <i class="fa fa-file" aria-hidden="true"></i> <span>Setup Master </span>
                            </a>
                            <ul title="Setup data" class="sub-menu">
                                <li class="title ">Setup data </li>
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>

                                                <li title="Memuat data Opd Profile" class="">
                                                    <a title="Memuat data Opd Profile"
                                                    href="{{ route('admin.opd.profile') }}">
                                                        <div title="Memuat data Opd Profile"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> Opd Profile
                                                        </div>
                                                    </a>
                                                </li>

                                                <li title="Memuat data Halaman" class="">
                                                    <a title="Memuat data Halaman"
                                                    href="{{ route('admin.master.halaman.index') }}">
                                                        <div title="Memuat data Kanal Berita"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> Halaman
                                                        </div>
                                                    </a>
                                                </li>

                                                <li title="Memuat data Kanal Berita" class="">
                                                    <a title="Memuat data Kanal Berita"
                                                    href="{{ route('admin.master.kanalberita.index') }}">
                                                        <div title="Memuat data Kanal Berita"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> Kanal Berita
                                                        </div>
                                                    </a>
                                                </li>

                                                <li title="Memuat data Kategori Galeri"
                                                    class="  ">
                                                    <a title="Memuat data Kategori Galeri"
                                                        href="{{ route("admin.master.kategorigaleri.index") }}">
                                                        <div title="Memuat data Kategori Galeri"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> Kategori Galeri</div>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li title="Memuat data Kelola" class="parent  ">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Kelola ">
                                <i class="fa fa-file" aria-hidden="true"></i> <span>Kelola </span>
                            </a>
                            <ul title="Memuat data transaksi" class="sub-menu">
                                <li class="title">Kelola </li>
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>

                                                <li>
                                                    <a href="javascript:;" data-toggle="xxtooltip" data-placement="right" title=""
                                                        data-original-title=" ">
                                                        <i class="fa fa-file" aria-hidden="true"></i> <span>Transparansi </span>
                                                    </a>
                                                    <ul title="Master data" class="sub-menu">
                                                        <li class="nav-items">

                                                            <div class="be-scroller">
                                                                <div class="content">
                                                                    <ul>

                                                                        <li title="Memuat data Pengelolaan Anggaran" class="">
                                                                            <a title="Memuat data Pengelolaan Anggaran"
                                                                            href="{{ route('admin.transparansi.pengelolaan.index') }}">
                                                                                <div title="Memuat data Pengelolaan Anggaran"><i
                                                                                        class="fa fa-angle-right" aria-hidden="true"></i> Pengelolaan Anggaran
                                                                                </div>
                                                                            </a>
                                                                        </li>

                                                                        {{-- <li title="Memuat data Pertanggungjawaban"
                                                                            class="  ">
                                                                            <a title="Memuat data Pertanggungjawaban"
                                                                                href="{{ route("admin.transparansi.pertanggungjawaban.index") }}">
                                                                                <div title="Memuat data Pertanggungjawaban"><i
                                                                                        class="fa fa-angle-right" aria-hidden="true"></i> Pertanggungjawaban</div>
                                                                            </a>
                                                                        </li> --}}

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>

                                                </li>

                                                <li title="Pemeliharaan Berita" class="  ">
                                                    <a
                                                    href="{{ route("admin.transaksi.berita.index") }}"
                                                    title="Pemeliharaan Berita"
                                                        href="">
                                                        <div title="Pemeliharaan Berita"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i>
                                                            Kelola Berita text / video</div>
                                                    </a>
                                                </li>

                                                <li title="Pemeliharaan Berita" class="  ">
                                                    <a
                                                    href="{{ route("admin.transaksi.popupinfo.index") }}"
                                                    title="Pemeliharaan Berita"
                                                        href="">
                                                        <div title="Pemeliharaan Berita"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i>
                                                            Kelola Popup  / Banner Info</div>
                                                    </a>
                                                </li>


                                                <li title="Mengelola data galeri" class="  ">
                                                    <a href="{{ route("admin.transaksi.galeri.index") }}"
                                                    title="Mengelola data galeri"
                                                        href="">
                                                        <div title="Mengelola data galeri"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i>
                                                            Kelola Galeri</div>
                                                    </a>
                                                </li>

                                                @hasanyrole("Admin|SuperAdmin|Operator")

                                                <li title="Pemeliharaan Berita" class="  ">
                                                    <a
                                                    href="{{ route("admin.transaksi.beritafoto.index") }}"
                                                    title="Pemeliharaan Berita"
                                                        href="">
                                                        <div title="Pemeliharaan Berita"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i>
                                                            Kelola Berita foto</div>
                                                    </a>
                                                </li>









                                                @endhasanyrole


                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @endhasanyrole

                        @hasanyrole("Admin|SuperAdmin")



                        <li title="manajemen tentang pengguna" class="parent  ">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Para pengguna ">
                                <i class="fas fa-users"></i> <span>Para pengguna </span>
                            </a>
                            <ul title="manajemen tentang pengguna" class="sub-menu">
                                <li class="title">Para pengguna </li>
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li title="" class="  ">
                                                    <a title="" href="{{ route('admin.users.profile.index') }}">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Daftar Pengguna</div>
                                                    </a>
                                                </li>

                                                <li title="" class="  ">
                                                    <a title="" href="{{ route('admin.opd.users') }}">
                                                        <div title=""><i class="fa fa-angle-right"
                                                            aria-hidden="true"></i> Pengguna Terkoneksi OPD</div>
                                                    </a>
                                                </li>


                                                {{-- @can('edit posts', Post::class) --}}
                                                <li title="" class="  ">
                                                    <a title="" href="{{ route('admin.users.profile.create') }}">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Tambah Pengguna</div>
                                                    </a>
                                                </li>
                                                {{-- @endcan --}}

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>



                        <li title="manajemen role dan permission" class="parent  ">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Para pengguna ">
                                <i class="fas fa-users"></i> <span>Role dan Permission </span>
                            </a>
                            <ul title="manajemen role dan permission" class="sub-menu">
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li title="" class="  ">
                                                    <a title="" href="{{ route('admin.users.role.index') }}">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Role</div>
                                                    </a>
                                                </li>

                                                <li title="" class="  ">
                                                    <a title="" href="{{ route('admin.users.permission.index') }}">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Permission</div>
                                                    </a>
                                                </li>



                                                <li title="" class="  ">
                                                    <a title="" href="{{ route('admin.users.permission.index') }}">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Permission Pengguna</div>
                                                    </a>
                                                </li>

                                                <li title="" class="  ">
                                                    <a title="" href="{{ route('admin.users.permission.create') }}">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Tambah Permission</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        @endhasanyrole
                    </ul>


                </div>
            </div>
        </div>

    </div>
</div>
