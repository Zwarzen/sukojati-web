@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')

<style>
    .banner-radio{
        width: 250px;
        max-height: 200px;
        float:left;
        margin: 1rem;
        border-radius:15px;
        display: inline;
    }

    @media only screen and (max-width: 600px) {
        .banner-radio{
            width: 100%;
            max-height: 200px;
            display: block;
            margin: auto;

        }
    }
</style>

<div style="height: 5vh"></div>
<div style="height: 5vh"></div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <article class="article-justify container">

        <header>
            <h1 class="title-detail-berita">RADIO BLAMBANGAN 88.1FM</h1>
        </header>


        <h2>

            Radio Kabupaten Banyuwangi

        </h2>

        <br>

        <img class="banner-radio" src="{{ asset('uploads/media/gambar/blambanganfm_welcome_banner-01.jpg') }}" alt="">

        <p>
            BLAMBANGAN FM 88.1 Interaktif Inspirational Radio adalah salah satu Media Radio dibawah naungan Dinas Komunikasi, Informatika dan Persandian Kabupaten Banyuwangi.
            Dan merupakan salah satu Pusat Hiburan segmen masyarakat yang mengambil lapisan segmen anak muda disetiap program acara yang dikemas.
            Di Frekwensi siar 88.1 FM Radio BLAMBANGAN FM hadir dari pukul 07.00 s/d 24.00 WIB, setiap harinya.
        </p>
        <br>

        <p>

            <ul style="list-style: none; display:inline">
                <li style="list-style: none; display:inline">
                    <a href="https://radioblambanganfm.com/" target="_blank" style="padding: 0.5rem; border-radius:10px; background:#d325d9; color:#ffffff !important">Kunjungi Websitenya</a>
                </li>
            </ul>


        </p>




    </article>



    <div style="height: 3rem;"></div>


@endsection
