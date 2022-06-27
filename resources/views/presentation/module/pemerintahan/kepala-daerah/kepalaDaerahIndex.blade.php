@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="container">
        <style>
        div.jarak {
            line-height: 80%;
        }
        </style>
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Kepala Daerah Pemerintah Kabupaten Banyuwangi</h1>
        </header>


        <h2>Bupati dan Wakil Bupati <span style="color: #0DCEDA;">Kabupaten Banyuwangi </span> </h2>
        <br>
        <div style="width: 100%; align-items:center; text-align:center; ">
            <img style="margin:auto;  height:150px; width:120px;"
                src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" />
        </div>

        <br> <br>

        <div class="row" style="background:#e4e4e425; border-radius:15px;  padding:1rem">
            <div class="col-12 col-md-6 col-lg-6" style="text-align:center; align-items:center; margin-bottom:1rem; ">
                <div style="background:  linear-gradient(to top, #e7e7e781, #ffffff) ; border-radius:15px; padding:1rem;">

                
                <img style="width: 250px; height:370px"
                    src="{{ asset('presentation/b-asset/img/bupati-wabup-01.png') }}" />

                <div> <strong>Ipuk Fiestiandani Azwar Anas </strong> </div>
                <div> Bupati Banyuwangi</div>
                <!-- <div style="height:2rem"></div>
                <div style="text-align: center">
                    <a href="#bupati">
                        <button class="btn" style="padding:1rem; border-radius: 15px; background:#fafafa !important;">Profile Bupati</button>
                    </a>
                    
                </div> -->

                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6" style="text-align:center;  align-items:center; margin-bottom:1rem;">
                <div style="background:  linear-gradient(to top, #e7e7e781, #ffffff) ; border-radius:15px; padding:1rem;">
                    <img style="width: 250px; height:370px"
                    src="{{ asset('presentation/b-asset/img/bupati-wabup-02.png') }}" />

                    <div> <strong> H. Sugirah </strong></div>
                    <div>Wakil Bupati Banyuwangi</div>
                    <!-- <div style="height:2rem"></div> -->
                    <!-- <div style="text-align: center">
                        <a href="#wabup">
                            <button class="btn" style="padding:1rem; border-radius: 15px; background:#fafafa !important;">Profile Wakil Bupati</button>
                        </a>
                        
                    </div> -->
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6" style="align-items:center; margin-bottom:1rem; ">
                <div class="ng-wrp-item" style="border-bottom: 1px solid #e9e9e9">

                    <div style="flex:1;padding-left:1rem; ">
                        <div style="text-align: center;  font-size:1rem; font-weight:600">
                            <div> <strong>Profil Bupati <br> Kabupaten Banyuwangi </strong> </div>
                        </div>
                        <div style="text-align: left;  font-size:0.85rem;  line-height: 10px;">
                            <div>
                                <label class="col-form-label col-md-4 col-sm-4" readonly>Nama Legkap </label>
                                <!-- <label class="col-form-label col-md-1 col-sm-1" readonly>:</label> -->
                                <label class="col-form-label col-md-7 col-sm-7" readonly>: Ipuk Fiestiandani Azwar Anas</label>
                            </div>
                            <div>
                                <label class="col-form-label col-md-4 col-sm-4" readonly>Tempat Tanggal Lahir </label>
                                <!-- <label class="col-form-label col-md-1 col-sm-1" readonly>:</label> -->
                                <label class="col-form-label col-md-7 col-sm-7" readonly>: Magelang, 10 September 1974 </label>
                            </div>
                            <div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly>Pendidikan Formal </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>: - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>TK Patra II</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>SD Negeri Cempaka Putih Barat II Pagi (lulus tahun 1986)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>SMP Negeri 216 Jakarta SMA Negeri 68 Jakarta (lulus tahun 1992)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>IKIP Jakarta (lulus tahun 1999)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Kursus pelayanan umum di Korea Selatan, Amerika Serikat, dan Eropa</label>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly>Riwayat Karier </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>: - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Tim Penggerak PKK (TP PKK) Kabupaten Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Anggota Dewan Penasehat Dharma Wanita Persatuan</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Yayasan Kesejahteraan dan Pendidikan Tuna Indra (YKPTI) Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Dewan Kerajinan Nasional Daerah (Dekranasda) Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Bunda PAUD Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Penasehat Gabungan Organisasi Wanita (GOW) Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Penasehat Ikatan Wanita Pengusaha (Iwapi) Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Forum Peningkatan Konsumsi Ikan (Forikan) Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Anggota Divisi Peningkatan Partisipasi dan Kesadaran Masyarakat-Pusat Pelayanan</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Terpadu Pemberdayaan Perempuan dan Anak Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Anggota Majelis Pembimbing Kwartir Cabang Gerakan Pramuka Banyuwangi</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Bupati Banyuwangi (2021-sekarang)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Anggota Dewan Penasehat Dharma Wanita Persatuan</label>
                                </div>
                            </div>
                            <div>
                                <label class="col-form-label col-md-4 col-sm-4" readonly>Prestasi </label>
                                <!-- <label class="col-form-label col-md-1 col-sm-1" readonly>:</label> -->
                                <label class="col-form-label col-md-7 col-sm-7" readonly>: uohsuo </label>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6" style="text-align:center; min-height: 200px; align-items:center; margin-bottom:1rem;">
                <div class="ng-wrp-item" style="border-bottom: 1px solid #e9e9e9">
                    <div style=" flex:1;padding-left:1rem;">
                        <div style="text-align: center;  font-size:1rem; font-weight:600">
                            <div> <strong>Profil Wakil Bupati <br> Kabupaten Banyuwangi </strong> </div>
                        </div>
                        <div style="text-align: left; font-size:0.85rem;  line-height: 5px;">
                            <div>
                                <label class="col-form-label col-md-4 col-sm-4" readonly>Nama Legkap </label>
                                <!-- <label class="col-form-label col-md-1 col-sm-1" readonly>:</label> -->
                                <label class="col-form-label col-md-7 col-sm-7" readonly>: H. Sugirah, S.Pd., M.Si.</label>
                            </div>
                            <div>
                                <label class="col-form-label col-md-4 col-sm-4" readonly>Tempat Tanggal Lahir </label>
                                <!-- <label class="col-form-label col-md-1 col-sm-1" readonly>:</label> -->
                                <label class="col-form-label col-md-7 col-sm-7" readonly>: Banyuwangi, 1 Februari 1964 </label>
                            </div>
                            <div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly>Pendidikan Formal </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>: - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>SD Negeri 2 Seneporejo (1970-1976) </label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>SMP Pesanggaran (1977-1980) </label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly></label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>SPPMA Jember (1980-1983)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly></label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>S-1 STKIP PGRI Jombang (1989-1994)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly></label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>S-2 Universitas WR Supratman (2008-2010)</label>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly>Riwayat Karier </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>: - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Guru Yayasan Faser (1990-1994) </label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Pengurus Anak Cabang PDI Perjuangan Pesanggaran (1998-sekarang) </label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly> </label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua BPD Desa Seneporejo </label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Gapoktan Sarinomo (2004-2009)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Lembaga Masyarakat Desa Hutan Wonolanggeng (2004-2009)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Wakil Ketua Forum Lembaga Masyarakat Desa Hutan Kabupaten Banyuwangi (2004-2009)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Bendahara DPC PDI Perjuangan Kabupaten Banyuwangi (2009-sekarang)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Fraksi PDI Perjuangan DPRD Kab. Banyuwangi (2009-2014)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Wakil Ketua Komisi II DPRD Kab. Banyuwangi (2009-2014)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Ketua Badan Kehormatan DPRD Kab. Banyuwangi (2014-2019)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Wakil Ketua Badan Kehormatan DPRD Kab. Banyuwangi (2019-2020)</label>
                                </div>
                                <div>
                                    <label class="col-form-label col-md-4 col-sm-4" readonly></label>
                                    <label class="col-form-label col-md-1 col-sm-1" readonly>&nbsp; - </label>
                                    <label class="col-form-label col-md-6 col-sm-6" readonly>Wakil Bupati Banyuwangi (2021-sekarang)</label>
                                </div>
                            </div>
                            <div>
                                <label class="col-form-label col-md-4 col-sm-4" readonly>Prestasi </label>
                                <!-- <label class="col-form-label col-md-1 col-sm-1" readonly>:</label> -->
                                <label class="col-form-label col-md-6 col-sm-6" readonly>: uohsuo </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 10rem;"></div>

@endsection
