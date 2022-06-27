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
                        <li title="Menu aplikasi" id="sdb-btn" class="divider">Menu</li>
                        <li title="Dashboard untuk ringakasan informasi yang ada dalam sistem" class=" active ">
                            <a href="dash" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Dashboard ">
                                <i class="fa fa-home" aria-hidden="true"></i> <span>Dashboard </span>
                            </a>
                        </li>
                        <li title="Master data" class="parent open">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Master ">
                                <i class="fa fa-file" aria-hidden="true"></i> <span>Master </span>
                            </a>
                            <ul title="Master data" class="sub-menu">
                                <li class="title">Master </li>
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li title="Memuat data kategori biaya" class="  ">
                                                    <a title="Memuat data kategori biaya"
                                                        href="dash/master/biaya/kategori">
                                                        <div title="Memuat data kategori biaya"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> OPD</div>
                                                    </a>
                                                </li>
                                                <li title="Memuat data master biaya" class="  ">
                                                    <a title="Memuat data master biaya" href="dash/master/biaya/data">
                                                        <div title="Memuat data master biaya"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> Berita
                                                        </div>
                                                    </a>
                                                </li>
                                                <li title="Memuat data lokasi stock pile perusahaan"
                                                    class="  ">
                                                    <a title="Memuat data lokasi stock pile perusahaan"
                                                        href="dash/master/perusahaan/stockpile">
                                                        <div title="Memuat data lokasi stock pile perusahaan"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> Prioritas</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li title="Memuat data transaksi" class="parent  ">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Transaksi ">
                                <i class="fa fa-file" aria-hidden="true"></i> <span>Transaksi </span>
                            </a>
                            <ul title="Memuat data transaksi" class="sub-menu">
                                <li class="title">Transaksi </li>
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li title="Mengelola data stock pile perusahaan" class="  ">
                                                    <a title="Mengelola data stock pile perusahaan"
                                                        href="dash/transaksi/perusahaan/kelolastockpile">
                                                        <div title="Mengelola data stock pile perusahaan"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i>
                                                            Pemeliharaan Berita</div>
                                                    </a>
                                                </li>
                                                <li title="Mengelola data visit perusahaan" class="  ">
                                                    <a title="Mengelola data visit perusahaan"
                                                        href="dash/transaksi/perusahaan/visit">
                                                        <div title="Mengelola data visit perusahaan"><i
                                                                class="fa fa-angle-right" aria-hidden="true"></i> 
																Pemeliharaan OPD
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li title="Mengatur menu akses" class="parent  ">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Aturan &amp; Perijinan ">
                                <i class="fas fa-ruler-combined"></i> <span>Aturan &amp; Perijinan </span>
                            </a>
                            <ul title="Mengatur menu akses" class="sub-menu">
                                <li class="title">Aturan &amp; Perijinan </li>
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li title="" class="  ">
                                                    <a title="" href="users/User_groups/create_group">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Create Roles</div>
                                                    </a>
                                                </li>
                                                <li title="" class="  ">
                                                    <a title="" href="users/permissions">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Permissions</div>
                                                    </a>
                                                </li>
                                                <li title="" class="  ">
                                                    <a title="" href="users/User_groups">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> View Roles</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li title="mengatur tentang informasi profile pengguna aplikasi" class="  ">
                            <a href="users/Profile" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Profil ">
                                <i class="fas fa-user" aria-hidden="true"></i> <span>Profil </span>
                            </a>
                        </li>
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
                                                    <a title="" href="users/create_user">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Add Users</div>
                                                    </a>
                                                </li>
                                                <li title="" class="  ">
                                                    <a title="" href="users">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> View Users</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>


                </div>
            </div>
        </div>

    </div>
</div>
