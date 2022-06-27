@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="article-justify container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Kinerja</h1>
        </header>


        <h2>Kinerja Kabupaten <span style="color: #0DCEDA;">Banyuwangi</span> </h2>



        <p align="justify">
        Kabupaten Banyuwangi hingga saat ini terus gencar melakukan pembenahan dalam hal pembangunan daerah. Pembangunan dilakukan diberbagai sektor, mulai dari pendidikan, kesehatan, pariwisata, pertanian, UMKM, serta infrastruktur. Pembangunan di bidang infrastruktur menjadikan aksesabilitas antar daerah ke Banyuwangi menjadi lebih mudah dan singkat dengan dibangunnya Bandara. Sebagai bentuk pertanggungjawaban, laporan keuangan Pemerintah Kabupaten Banyuwangi juga terus diperbaiki. Sejak tahun 2012 pemeriksaan laporan keuangan Pemda Banyuwangi masuk dalam opini wajar tanpa pengecualian. Image Banyuwangi yang sebelumnya dikenal sebagai Kota Santet pun saat ini telah berubah menjadi Kota Wisata, hal ini diperkuat dengan penghargaan UNWTO yang telah diterima oleh Kabupaten Banyuwangi.
        </p>
        <div class="row">
            <div class="col-md-6">
                <center><img src="{{ asset('presentation/b-asset/img/kinerja-kab-banyuwangi.jpg') }} "
                        style="max-width: 100%;margin-bottom: 15px; " class="img-responsive"></center>
            </div>
            <div class="col-md-6">
                <center><img src="{{ asset('presentation/b-asset/img/kinerja-kab-banyuwangi-2.jpg') }} "
                        style="max-width: 100%;margin-bottom: 15px; " class="img-responsive"></center>
            </div>
        </div>


        <p align="justify">
        Beberapa tahun terakhir Kabupaten Banyuwangi telah menjadikan Pariwisata sebagai leading sector dalam pembangunan daerah. Hal ini terbukti dengan meningkatnya jumlah kunjungan wisatawan secara pesat setiap tahunnya. Kunjungan wisatawan ke Banyuwangi meningkat 10 tahun terakhir baik domestik maupun mancanegara. Namun tahun 2020 ketika pandemi muncul, kunjungan wisatawan ke Banyuwangi baik domestik maupun mancanegara mengalami penurunan yang cukup signifikan. Kunjungan wisatawan domestik turun 76 persen dari 5,3 juta kunjungan pada 2019 turun menjadi 3 juta kunjungan pada 2020. Begitu pula kunjungan wisatawan mancanegara tercatat sebanyak 101 ribu kunjungan pada 2019 untuk drastis menjadi 27 ribu pada 2020.
        </p>
        <p align="justify">
        Indeks Pembangunan Manusia (IPM) mengukur capaian pembangunan manusia berbasis sejumlah komponen dasar kualitas hidup. Sebagai ukuran kualitas hidup, IPM dibangun melalui pendekatan tiga dimensi dasar. Dimensi tersebut mencakup umur panjang dan sehat; pengetahuan, dan kehidupan yang layak. Dari tahun ke tahun Banyuwangi telah meningkatkan Indeks Pembangunan Manusia sebagai bukti pembangunan di Banyuwangi tidak hanya berdampak pada pembangunan infrastruktur dan ekonomi tetapi juga berhasil meningkatkan Indeks pembangunan Manusia di Kabupaten Banyuwangi. Pada tahun 2021 IPM Kabupaten Banyuwangi mencapai 71,38 dan meningkat 0,76 poin dibandingkan tahun 2020. Peningkatan Indeks Pembangunan Manusia juga diikuti dengan meningkatnya komponen pembentuknya seperti Angka Harapan Hidup Banyuwangi meningkat dari 70,65 tahun pada 2020 menjadi 70,72 pada 2021. Begitu pula rata-rata lama sekolah, harapan lama sekolah dan pengeluaran per kapita.
        </p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color:#f0ecec; font-weight:bold;">
                        <td align="center" rowspan="2">No</td>
                        <td align="center" rowspan="2">Indikator</td>
                        <td align="center" colspan="6 ">Tahun</td>
                        <td align="center" rowspan="2">Satuan Data</td>
                        <td align="center" rowspan="2">Sumber Data</td>
                    </tr>
                    <tr style="background-color:#f0ecec; font-weight:bold;">
                        <td align="center">2016</td>
                        <td align="center">2017</td>
                        <td align="center">2018</td>
                        <td align="center">2019</td>
                        <td align="center">2020</td>
                        <td align="center">2021</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">1</td>
                        <td align="left">Indeks Pembangunan Manusia</td>
                        <td align="center">69.00</td>
                        <td align="center">69.64</td>
                        <td align="center">70.06</td>
                        <td align="center">70.06</td>
                        <td align="center">70.62</td>
                        <td align="center">71.38</td>
                        <td align="center"></td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td align="left">Indeks Daya Beli</td>
                        <td align="center">0.74</td>
                        <td align="center">0.74</td>
                        <td align="center">0.75</td>
                        <td align="center">0.76</td>
                        <td align="center">0.76</td>
                        <td align="center">0.76</td>
                        <td align="center"></td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td align="left">Indeks Kesehatan</td>
                        <td align="center">0.77</td>
                        <td align="center">0.77</td>
                        <td align="center">0.77</td>
                        <td align="center">0.78</td>
                        <td align="center">0.78</td>
                        <td align="center">0.78</td>
                        <td align="center"></td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td align="left">Indeks Pendidikan</td>
                        <td align="center">0.58</td>
                        <td align="center">0.59</td>
                        <td align="center">0.59</td>
                        <td align="center">0.59</td>
                        <td align="center">0.59</td>
                        <td align="center">0.61</td>
                        <td align="center"></td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                    <tr>
                        <td align="center">5</td>
                        <td align="left">Pengeluaran per Kapita per Tahun </td>
                        <td align="center">11,171,000</td>
                        <td align="center">11,438,000</td>
                        <td align="center">11,828,000</td>
                        <td align="center">12,264,000</td>
                        <td align="center">12,140,000</td>
                        <td align="center">12,217,000</td>
                        <td align="center">RP</td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>

                    <tr>
                        <td align="center">6</td>
                        <td align="left">Angka Harapan Hidup </td>
                        <td align="center">70.11</td>
                        <td align="center">70.19</td>
                        <td align="center">70.34</td>
                        <td align="center">70.54</td>
                        <td align="center">70.65</td>
                        <td align="center">70.72</td>
                        <td align="center">Tahun</td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                    <tr>
                        <td align="center">7</td>
                        <td align="left">Rata-Rata Lama Sekolah (MYS) </td>
                        <td align="center">6.93</td>
                        <td align="center">7.11</td>
                        <td align="center">7.12</td>
                        <td align="center">7.13</td>
                        <td align="center">7.16</td>
                        <td align="center">7.42</td>
                        <td align="center">Tahun</td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                    <tr>
                        <td align="center">8</td>
                        <td align="left">Angka Harapan Lama Sekolah (EYS) </td>
                        <td align="center">12.55</td>
                        <td align="center">12.68</td>
                        <td align="center">12.69</td>
                        <td align="center">13.78</td>
                        <td align="center">13.8</td>
                        <td align="center">13.10</td>
                        <td align="center">Tahun</td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                    <tr>
                        <td align="center">9</td>
                        <td align="left">Indeks Pembangunan Gender </td>
                        <td align="center">n/a</td>
                        <td align="center">86.20</td>
                        <td align="center">86.44</td>
                        <td align="center">86.81</td>
                        <td align="center">86.66</td>
                        <td align="center">0.78</td>
                        <td align="center">**</td>
                        <td align="center">Badan Pusat Statistik</td>
                    </tr>
                </tbody>
            </table>
        </div>
        Keterangan : ** data belum rilis

    </article>

    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 3rem;"></div>

@endsection
