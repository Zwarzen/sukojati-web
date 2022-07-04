<style>
    ul>li>a {
        font-size: 0.9rem;
    }
</style>



<ul class="navbar-nav ml-auto">

@php



    // $halamanViaServicesProvider didapat dari service laravel di appServiceProvider
    layTheMenus($halamanViaServicesProvider)

@endphp



    {{-- <li class="nav-item">
        <a class="nav-link a-nav" href="{{ url('') }}">
            Portal Kabupaten
        </a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link a-nav" href="{{ url($jenisOpd->slug . '/' . $opd->slug . '/beranda') }}">
            Beranda
        </a>
    </li>

    <li class="nav-item dropdown open">
        <a class="nav-link a-nav dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
            Profil
        </a>
        <ul title="memuat halaman profil" class="dropdown-menu dropdown-menu-right">
            <li>
                <a class="dropdown-item dropdown-toggle" href="#">
                    Pemerintahan
                </a>
                <ul title="Menjelaskan tentang visi misi" class="submenu submenu-left dropdown-menu">
                    <li>
                        <a class="dropdown-item " href="#">
                            Visi Misi
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">
                            Struktur
                        </a>
                        <ul title="" class="submenu submenu-left dropdown-menu">
                            <li class=" nav-item  ">
                                <a class="dropdown-item" title="" href="#">
                                    Desa
                                </a>
                            </li>
                            <li class=" nav-item  ">
                                <a class="dropdown-item" title="" title="" href="#">
                                    Sekretaris desa
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title="" href="#">
                            Perangkat desa yang lainnya
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="dropdown-item dropdown-toggle" href="#" aria-expanded="false">
                    Sejarah
                </a>
                <ul title="Menampilkan informasi tentang Sejarah" class="submenu submenu-left dropdown-menu">
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title=" " href="#">
                            Sejarah asal usul desa
                        </a>
                    </li>

                    <li class=" nav-item  ">
                        <a class="dropdown-item" title=" " href="#">
                            Sejarah pemimpin desa dari masa ke masa
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </li>



    <li class="nav-item dropdown open">
        <a class="nav-link a-nav a-nav dropdown-toggle " href="#" data-toggle="dropdown" aria-expanded="false">
            Layanan
        </a>

        <ul title="memuat halaman layanan" class="dropdown-menu dropdown-menu-right">

            <li>
                <a class="dropdown-item dropdown-toggle" href="#">
                    Pemerintahan
                </a>
                <ul title="Menjelaskan tentang pemerintahan" class="submenu submenu-left dropdown-menu">
                    <li>
                        <a class="dropdown-item " href="#">
                            Visi Misi
                        </a>

                    </li>
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">
                            Struktur
                        </a>
                        <ul title="" class="submenu submenu-left dropdown-menu">
                            <li class=" nav-item  ">
                                <a class="dropdown-item" title="" href="#">
                                    Desa
                                </a>
                            </li>
                            <li class=" nav-item  ">
                                <a class="dropdown-item" title="" title="" href="#">
                                    Sekretaris desa
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title="" href="#">
                            Perangkat desa yang lainnya
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">
                    Sejarah
                </a>
                <ul title="Menampilkan informasi tentang Sejarah" class="submenu submenu-left dropdown-menu">
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title=" " href="#">
                            Sejarah asal usul desa
                        </a>
                    </li>

                    <li class=" nav-item  ">
                        <a class="dropdown-item" title=" " href="#">
                            Sejarah pemimpin desa dari masa ke masa
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link a-nav" href="{{ url($jenisOpd->slug . '/' . $opd->slug . '/program-kerja') }}">
            Program Kerja
        </a>
    </li>

    <li class="nav-item dropdown open">
        <a class="nav-link a-nav dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
            Transparansi
        </a>

        <ul title="memuat halaman profil" class="dropdown-menu dropdown-menu-right">

            <li>
                <a class="dropdown-item dropdown-toggle" href="#">
                    Pemerintahan
                </a>
                <ul title="Menjelaskan tentang visi misi" class="submenu submenu-left dropdown-menu">
                    <li>
                        <a class="dropdown-item " href="#">
                            Visi Misi
                        </a>

                    </li>
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">
                            Struktur
                        </a>
                        <ul title="Menceritakan tentang visi misi pimpinan DPRD"
                            class="submenu submenu-left dropdown-menu">
                            <li class=" nav-item  ">
                                <a class="dropdown-item" title="" href="">
                                    Ketua
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title="Menerangkan tentang TUPOKSI DPRD"
                            href="https://dprd.banyuwangikab.go.id/v2/page/tentang/tupoksi-wewenang-amp-hak-dprd"
                            onclick="loc('https://dprd.banyuwangikab.go.id/v2/page/tentang/tupoksi-wewenang-amp-hak-dprd')">
                            Tupoksi, Wewenang &amp; Perangkat desa x x x x x x x x x x x
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="dropdown-item dropdown-toggle" href="#">
                    Sejarah
                </a>
                <ul title="Menampilkan informasi tentang Sejarah" class="submenu submenu-left dropdown-menu">
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title="Menerangkan tentang struktur organisasi Sekretariat DPRD "
                            href="https://dprd.banyuwangikab.go.id/v2/sekretariat/sotk"
                            onclick="loc('https://dprd.banyuwangikab.go.id/v2/sekretariat/sotk')">
                            SOTK Sekretariat DPRD
                        </a>
                    </li>
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title="menarangkan tentang sakip DPRD"
                            href="https://dprd.banyuwangikab.go.id/v2/sekretariat/kinerja"
                            onclick="loc('https://dprd.banyuwangikab.go.id/v2/sekretariat/kinerja')">
                            Rencana Kinerja Sekretariat DPRD
                        </a>
                    </li>
                    <li class=" nav-item  ">
                        <a class="dropdown-item" title="Menerangkan tentang data pegawai Sekretariat DPRD"
                            href="https://dprd.banyuwangikab.go.id/v2/sekretariat/sotk/pegawai"
                            onclick="loc('https://dprd.banyuwangikab.go.id/v2/sekretariat/sotk/pegawai')">
                            Daftar Pegawai Sekretariat DPRD
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </li>

    <li class="nav-item">
        <a class="nav-link a-nav" href="{{ url($jenisOpd->slug . '/' . $opd->slug . '/publikasi') }}">
            Lembaga
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link a-nav" href="{{ url($jenisOpd->slug . '/' . $opd->slug . '/kegiatan') }}">
            Potensi
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link a-nav" href="{{ url($jenisOpd->slug . '/' . $opd->slug . '/berita') }}">
            Berita
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link a-nav" href="{{ url($jenisOpd->slug . '/' . $opd->slug . '/kontak') }}">
            Galeri
        </a>
    </li>
 --}}

</ul>

<script>
    function loc(url){
        window.location.href = url;
    }
    </script>
