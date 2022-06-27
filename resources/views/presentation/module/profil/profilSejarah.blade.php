@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="article-justify container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Sejarah dan Legenda Banyuwangi</h1> 
        </header>
        

        <h2>Sejarah <span style="color: #0DCEDA;">Banyuwangi</span> </h2>
        <p align="justify">Merujuk data sejarah yang ada, sepanjang sejarah Blambangan kiranya tanggal 18 Desember 1771 merupakan
        peristiwa sejarah yang paling tua yang patut diangkat sebagai hari jadi Banyuwangi. Sebelum peristiwa puncak
        perang Puputan Bayu tersebut sebenarnya ada peristiwa lain yang mendahuluinya, yang juga heroik-patriotik,
        yaitu peristiwa penyerangan para pejuang Blambangan di bawah pimpinan Pangeran Puger ( putra Wong Agung
        Wilis ) ke benteng VOC di Banyualit pada tahun 1768.</p>

        <img style="float:right; padding-left:1rem; width:400px;" src="{{ asset('uploads/wallpaper/gb-gesibu.jpg') }}" />

        <p align="justify">Namun sayang peristiwa tersebut tidak tercatat secara lengkap pertanggalannya, dan selain
            itu terkesan bahwa dalam penyerangan tersebut kita kalah total, sedang pihak musuh hampir tidak
            menderita kerugian apapun. Pada peristiwa ini Pangeran Puger gugur, sedang Wong Agung Wilis, setelah
            Lateng dihancurkan, terluka, tertangkap dan kemudian dibuang ke Pulau Banda ( Lekkerkerker, 1923 ).</p>
        Berdasarkan data sejarah nama Banyuwangi tidak dapat terlepas dengan keajayaan Blambangan. Sejak jaman
        Pangeran Tawang Alun (1655-1691) dan Pangeran Danuningrat (1736-1763), bahkan juga sampai ketika Blambangan
        berada di bawah perlindungan Bali (1763-1767), VOC belum pernah tertarik untuk memasuki dan mengelola
        Blambangan ( Ibid.1923 :1045 ).
        <p align="justify">Pada tahun 1743 Jawa Bagian Timur ( termasuk Blambangan ) diserahkan oleh Pakubuwono II
            kepada VOC, VOC merasa Blambangan memang sudah menjadi miliknya. Namun untuk sementara masih dibiarkan
            sebagai barang simpanan, yang baru akan dikelola sewaktu-waktu, kalau sudah diperlukan. Bahkan ketika
            Danuningrat memina bantuan VOC untuk melepaskan diri dari Bali, VOC masih belum tertarik untuk melihat
            ke Blambangan (Ibid 1923:1046).</p>
        <p align="justify">Namun barulah setelah Inggris menjalin hubungan dagang dengan Blambangan dan mendirikan
            kantor dagangnya (komplek Inggrisan sekarang) pada tahun 1766 di bandar kecil Banyuwangi ( yang pada
            waktu itu juga disebut Tirtaganda, Tirtaarum atau Toyaarum), maka VOC langsung bergerak untuk segera
            merebut Banyuwangi dan mengamankan seluruh Blambangan. Secara umum dalam peprangan yang terjadi pada
            tahun 1767-1772 ( 5 tahun ) itu, VOC memang berusaha untuk merebut seluruh Blambangan. Namun secara
            khusus sebenarnya VOC terdorong untuk segera merebut Banyuwangi, yang pada waktu itu sudah mulai
            berkembang menjadi pusat perdagangan di Blambangan, yang telah dikuasai Inggris.</p>
        <p align="justify">Dengan demikian jelas, bahwa lahirnya sebuah tempat yag kemudian menjadi terkenal dengan
            nama Banyuwangi, telah menjadi kasus-beli terjadinya peperangan dahsyat, perang Puputan Bayu. Kalau
            sekiranya Inggris tidak bercokol di Banyuwangi pada tahun 1766, mungkin VOC tidak akan buru-buru
            melakukan ekspansinya ke Blambangan pada tahun 1767. Dan karena itu mungkin perang Puputan Bayu tidak
            akan terjadi ( puncaknya ) pada tanggal 18 Desember 1771. Dengan demikian pasti terdapat hubungan yang
            erat perang Puputan Bayu dengan lahirnya sebuah tempat yang bernama Banyuwangi. Dengan perkataan lain,
            perang Puputan Bayu merupakan bagian dari proses lahirnya Banyuwangi. Karena itu, penetapan tanggal 18
            Desember 1771 sebagai hari jadi Banyuwangi sesungguhnya sangat rasional.</p>

           
    </article>

    <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside>

    <div style="height: 3rem;"></div>

@endsection
