@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="article-justify container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Geologi</h1> 
        </header>
        

        <h2>Keadaan Geologi <span style="color: #0DCEDA;">Banyuwangi</span> </h2>

            
        <p align="justify">
            Kondisi geologi setiap wilayah bervariasi, serta memiliki peran bagi terbentuknya suatu bentukan lahan di wilayah tersebut. Jenis Tanah di Kabupaten Banyuwangi berdasarkan strukturg eologi terdapat berbagai susunan/struktur geologi seperti pada tabel dan grafik di bawah ini: 
        </p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color:#f0ecec; font-weight:bold;">
                        <td align="center" rowspan="2" style="padding: 10px 0px;">Strukktur Geologi</td>
                        <td align="center" colspan="2">Luas</td>
                    </tr>
                    <tr style="background-color:#f0ecec; font-weight:bold;">
                        <td align="center">Ha</td>
                        <td align="center">%</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left">Hasil Gunung Api kwarter muda</td>
                        <td align="center">170,310.5</td>
                        <td align="center">29.5</td>
                    </tr>
                    <tr>
                        <td align="left">Aluvium</td>
                        <td align="center">134,525.0</td>
                        <td align="center">23.3</td>
                    </tr>
                    <tr>
                        <td align="left">Miosen falses semen</td>
                        <td align="center">89,177.3</td>
                        <td align="center">15.4</td>
                    </tr>
                    <tr>
                        <td align="left">Miosen falses batu gamping</td>
                        <td align="center">77,536.5</td>
                        <td align="center">13.4</td>
                    </tr>
                    <tr>
                        <td align="left">Hasil Gunung Api kwarter tua</td>
                        <td align="center">59,283.0</td>
                        <td align="center">10.3</td>
                    </tr>
                    <tr>
                        <td align="left">Andesit</td>
                        <td align="center">47,417.8</td>
                        <td align="center">8.2</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p align="right"><i>Sumber : Rencana Tata Ruang Wilayah Kabupaten Banyuwangi Tahun 2012-2032</i></p>
        
        <hr/>
        <p align="justify">
            Berdasarkan struktur geologi, luas tanah di Kabupaten Banyuwangi sebagian besar merupakan hasil Gunung Api Kwarter Muda (30%) dan Aluvium (23%) yang berupa tanah liat, halus dan dapat menampung air hujan sehingga cocok untuk dimanfaatkan sebagai lahan pertanian. Struktur geologi lainnya adalah Miosen falses semen 16%, Miosen falses batu gamping 13%, hasil Gunung Api Kwarter tua dengan luas 10% dan struktur geologi Andesit merupakan struktur geologi terendah di Kabupaten Banyuwangi dengan luas hanya sebesar 8%. Gambar dibawah ini adalah jenis-jenis struktur geologi yang ada di Kabupaten Banyuwangi: 
        </p>
        
        <p class="text-center">
            <img src="{{ asset('presentation/b-asset/img/luas-tanah-banyuwangi-2019.jpg') }}" class="img-responsive" style="max-width: 500px;margin-bottom: 20px;" /></p>
        
        <p align="justify">
            Adapun keadaan jenis tanah di Kabupaten Banyuwangi terdiri dari regosol, litosol, latosol, podsolik dan gambut. Jenis tanas untuk Kabuapten Banyuwangi terluas adalah jenis tanah Podsolik dengan luas 348,684.75 Ha atau 60.4% dari luas area Kabupaten Banyuwangi, jenis tanah Regosol 24%, Lithosol 6.8%, Gambut 6.5% dan jenis tanah Lathosol hanaya 2.4% dari luas area di Kabupaten Banyuwangi. Jenis Tanah ini dapat terlihat pada tabel dan grafik berikut : 
        </p>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color:#f0ecec; font-weight:bold;">
                        <td align="center" rowspan="2" style="padding: 10px 0px;">Strukktur Geologi</td>
                        <td align="center" colspan="2">Luas</td>
                    </tr>
                    <tr style="background-color:#f0ecec; font-weight:bold;">
                        <td align="center">Ha</td>
                        <td align="center">%</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="left">Podsolik</td>
                        <td align="center">348,684.8</td>
                        <td align="center">60.4</td>
                    </tr>
                    <tr>
                        <td align="left">Aluvium</td>
                        <td align="center">138,490.9</td>
                        <td align="center">24</td>
                    </tr>
                    <tr>
                        <td align="left">Lithosol</td>
                        <td align="center">39,031.9</td>
                        <td align="center">6.8</td>
                    </tr>
                    <tr>
                        <td align="left">Gambut</td>
                        <td align="center">37,433.7</td>
                        <td align="center">6.5</td>
                    </tr>
                    <tr>
                        <td align="left">Lathosol</td>
                        <td align="center">14,109.3</td>
                        <td align="center">2.4</td>
                    </tr>
                    <tr>
                        <td align="left">Andesit</td>
                        <td align="center">47,417.8</td>
                        <td align="center">8.2</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <p align="right"><i>Sumber : Rencana Tata Ruang Wilayah Kabupaten Banyuwangi Tahun 2012-2032</i></p>
        <p align="justify" style="margin-bottom: 10px;">
            Daerah di Banyuwangi memiliki jenis tanah yang berbeda-beda diantaranya:
        <ol>
        <li>Tanah regosol yang terdapat pada wilayah Kecamatan Wongsorejo, Kalipuro, Glagah, Songgon, Glenmore, Gambiran, Bangorejo, Cluring, Muncar, Purwoharjo dan Tegaldlimo.</li>
        <li>Tanah lithosol yang terdapat pada wilayah Kecamatan Kalibaru, Glenmore dan Pesanggaran.</li>
        <li>Tanah lathosol yang terdapat pada wilayah Kecamatan Purwoharjo dan Tegaldlimo.</li>
        <li>Tanah podsolik yang hampir terdapat pada seluruh wilayah Kecamatan di Kabupaten Banyuwangi kecuali wilayah Kecamatan Cluring, Purwoharjo dan Muncar hanya sebagian kecil terdapat tanah podsolik.</li>
        </ol>
        </p>
        <p class="text-center"><img src="{{ asset('presentation/b-asset/img/jenis-tanah-banyuwangi-2019.jpg') }} " class="img-responsive" style="max-width: 500px;margin-bottom: 20px;" /></p>
        
        <p align="justify">
            KLIMATOLOGI Kabupaten Banyuwangi terletak di selatan equator yang dikelilingi oleh Laut Jawa, Selat Bali dan Samudera Indonesia dengan iklim tropis yang terbagi menjadi 2 musim yaitu musim penghujan dan musim kemarau.
        </p>
        <p align="justify">1. Rata-rata curah hujan selama tahun 2020 mencapai 192,4 mm. Curah hujan terendah terjadi pada Bulan November sebesar 28,6 mm, sedangkan curah hujan tertinggi terjadi pada Bulan Februari sebesar 257 mm</p>
        <p align="justify">2. Persentase rata-rata penyinaran matahari pada tahun 2020 sebesar 71,2%. Rata-rata penyinaran matahari terendah terjadi pada bulan Januari sebesar 74% dan tertinggi pada Bulan Mei, Oktober dan Desember sebesar 81%.</p>
        <p align="justify">3. Rata-rata kelembaban udara pada tahun 2020 sebesar 78,92 %. Kelembaban terendah terjadi pada Bulan Oktober dengan rata-rata kelembaban udara sebesar 69 %.Sebaliknya kelembaban tertinggi terjadi pada Bulan Januari dengan besaran 83%.</p>
        <p align="justify">4. Rata-rata suhu udara pada tahun 2020 sebesar 27,5 ℃. Suhu udara terendah terjadi pada Bulan Juli dan Agustus sebesar 26,3℃ derajat celcius dan yang tertinggi pada Bulan April sebesar 28,7 ℃.</p>
        <p class="text-center"><img src="{{ asset('presentation/b-asset/img/rata-rata-suhu-bulanan-2020.jpg') }} " class="img-responsive" style="max-width: 500px;margin-bottom: 20px;" /></p>



    </article>

    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 3rem;"></div>

@endsection
