@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="article-justify container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Visi Misi Pemerintah Daerah Banyuwangi</h1>
        </header>


        <h2>Isi dan Detail Visi <span style="color: #0DCEDA;">Misi</span> </h2>
        <br>
        <div style="width: 100%; align-items:center; text-align:center; ">
            <img style="margin:auto;  height:240px; width:200px;"
                src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" />
        </div>


        <br>
        
        <p>
        <div style="text-align:left; color: #0DCEDA; font-size:1.2rem">VISI</div>
        <div style="text-align:center; color: #0e7e0e; font-size:1.8rem"><strong>"TERWUJUDNYA BANYUWANGI YANG SEMAKIN MAJU, SEJAHTERA DAN BERKAH" </strong></div>
        <br />

        <div>Visi tersebut dapat dijelaskan sebagai berikut :</div>
        </p>
        <br />

        <ol>
            <li style="text-align: justify;">Makna “SEMAKIN” yang disematkan dalam Visi Pembangunan ini mengandung nilai dan semangat untuk pencapaian pembangunan 5 tahun kedepan lebih baik dari yang ada saat ini. Tentu menjadi tantangan besar yang harus dijawab oleh pemerintahan saat ini. Dalam titik nol kondisi Banyuwangi yang relatif lebih maju saat ini, maksud dari kata “Semakin” ini harus dimaknai sebagai kondisi yang lebih. Lebih dalam hal kebaikan di bidang pembangunan.</li>
            <li style="text-align: justify;">Makna “Semakin Maju” dalam memahami Visi Pembangunan ini diorientasikan pada aspek kemajuan pembangunan ekonomi, kemajuan pembangunan fisik infrastruktur. Kedua aspek inilah yang diharapkan mampu menjadi pengungkit pembangunan di Banyuwangi. Selain itu makna maju juga dapat diartikan sebagai bentuk posisi Banyuwangi yang mampu berdaya saing dalam konstelasi Nasional maupun Global.</li>
            <li style="text-align: justify;">Makna “Semakin Sejahtera” ini merupakan manifestasi kondisi Banyuwangi yang harmonis kehidupan sosial masyarakatnya dan kondusif kondisi ketentraman dan ketertiban lingkungannya, dengan tetap menjunjung tinggi nilai-nilai lokalitas budaya dan karakter masyarakat Banyuwangi. Sejahtera dapat pula dimaknai sebagai bentuk pemenuhan kebutuhan dasar, baik secara lahir maupun batin, serta dilaksanakan dengan prinsip keadilan. Keadilan berkaitan dengan aspek kesempatan yang sama oleh masyarakat baik sebagai objek maupun subjek pembangunan.</li>
            <li style="text-align: justify;">Makna “Berkah” ini dapat diartikan sebagai karunia Tuhan yang mendatangkan kebaikan atau manfaat bagi kehidupan manusia. Artinya, pembangunan yang diberkahi pastilah akan mendatangkan manfaat dan kebaikan. Keberkahan pasti tidak bertentangan dengan nilai-nilai moral kehidupan sosial, maka pembangunan yang diberkahi pasti berdampak pada meningkatnya nilai kesalehan sosial masyarakat.</li>
        </ol><br /><br />

        <p>
        <div style="text-align:left; color: #0DCEDA; font-size:1.2rem">MISI</div>
        </p>
        <ol>
            <li style="text-align: justify;">Meningkatkan Pertumbuhan dan Ketahanan Ekonomi Lokal Berbasis Pertanian, Perikanan, UMKM, dan Pariwisata Fokus pada Keberdayaan Keluarga untuk Membuka Lapangan Kerja dan Mengurangi Kemiskinan.</li>
            <li style="text-align: justify;">Membangun SDM Unggul, Sehat Jasmani-Rohani, Produktif dan Berkarakter melalui Peningkatan Akses serta Kualitas Pelayanan Pendidikan, Kesehatan, dan Kebutuhan Dasar Lainnya.</li>
            <li style="text-align: justify;">Mewujudkan Masyarakat Berkarakter yang Memegang Teguh Nilainilai Keagamaan, Menjaga Keluhuran Adat Istiadat, serta Menguatkan Gotong Royong dan Kerukunan dalam Harmoni Kebhinekaan.</li>
            <li style="text-align: justify;">Mempercepat Pembangunan Infrastruktur Ekonomi dan Sosial yang Semakin Merata dengan Memperhatikan Daya Dukung Lingkungan.
            </li>
            <li style="text-align: justify;">Memantapkan Tata Kelola Pemerintahan yang Tangkas dan Dinamis melalui Transformasi Digital untuk Mewujudkan Birokrasi Produktif dan Kemudahan Berusaha.</li>
            
        </ol>


    </article>

    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 3rem;"></div>

@endsection
