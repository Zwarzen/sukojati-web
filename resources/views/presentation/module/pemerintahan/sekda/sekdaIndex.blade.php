@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Sekretaris Daerah Pemerintah Daerah Banyuwangi</h1>
        </header>


        <h2>Tugas dan Fungsi Sekretaris Daerah <span style="color: #0DCEDA;">Kabupaten Banyuwangi </span> </h2>
        <br>
        <div style="width: 100%; align-items:center; text-align:center; ">
            <img style="margin:auto;  height:150px; width:120px;"
                src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" />
        </div>
<br>
<br>

        <div class="row">
            <div class="col-12" style="text-align:center; align-items:center; padding:1rem">
                <div style="background:  linear-gradient(to top, #e7e7e781, #ffffff) ; border-radius:15px; padding:1rem">
                    <img style="width: 250px; height:300px" src="{{ asset('presentation/b-asset/img/sekda_bwi.png') }}"  />
                
                
                <div> <strong>Mujiono</strong> </div>
                <div> Sekretaris Daerah Kabupaten Banyuwangi</div>
            </div>
            </div>

        </div>


        <br>
        
        <p>
            <div class="heading-title heading-dotted text-center">
                <h4>KEDUDUKAN, TUGAS DAN FUNGSI</h4>
            </div>
            <Ul>
              <li> Sekretariat Daerah merupakan unsur staf.</li>
              <li>Sekretariat Daerah dipimpin oleh Sekretaris Daerah dan bertanggung jawab kepada Bupati.</li>
            <li>Sekretariat Daerah mempunyai tugas membantu Bupati dalam penyusunan kebijakan dan pengkoordinasian administratif terhadap pelaksanaan tugas Perangkat Daerah serta pelayanan administratif.</li>
            <li>Sekretariat Daerah dalam  melaksanakan tugas dan kewajiban menyelenggarakan  fungsi : <br/>
              <ul>
                <li>Pengkoordinasian penyusunan kebijakan Daerah;</li>
                <li>Pengkoordinasian pelaksanaan tugas  perangkat  daerah;    </li>
                <li>Pemantauan dan evaluasi pelaksanaan kebijakan  daerah;      </li>
                <li>Pelayanan   administratif   dan   pembinaan  Aparatur  Sipil  Negara pada  pemerintah daerah ;</li>
                <li>Pelaksanaan  fungsi  lain  yang  diberikan  oleh  bupati  sesuai dengan tugas dan fungsinya.</li>
              </ul>
            </li>
            </ul>
        </p>
        <br>
        <br>
        <p>
            <div class="heading-title heading-dotted text-center">
                <h4>SUSUNAN ORGANISASI SEKRETARIAT DAERAH KABUPATEN BANYUWANGI</h4>
            </div><BR>
            <li>Bupati Banyuwangi dan Wakil Bupati Banyuwangi</li>
            
            <ul>
                <li>Sekretaris Daerah</li>
                <li>Asisten Administrasi Pemerintahan dan Kesejahteraan Rakyat
                    <ul>
                        <li>Bagian Hukum</li>
                        <li>Bagian Pemerintahan</li>
                        <li>Bagian Pemerintahan Desa</li>
                        <li>Bagian Kesejahteraan Rakyat</li>
                    </ul>
                </li>
                <li>Asisten Perekonomian dan Pembangunan
                    <ul>
                        <li>Bagian Perekonomian</li>
                        <li>Bagian Pengadaan Barang dan Jasa</li>
                    </ul>
                </li>
                <li>Asisten Administrasi Umum
                    <ul>
                        <li>Bagian Organisasi</li>
                        <li>Bagian Perencanaan dan Keuangan</li>
                        <li>Bagian Umum</li>
                        <li>Bagian Protokol dan Komunikasi Pimpinan</li>
                     </ul>
                 </li>   
            </ul>
            
        </p>
      

    </article>

    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 10rem;"></div>

@endsection
