<div style="text-align:center; font-size:1.5rem; padding:1rem;">
    <header>
        <span>TRANSPARANSI</span>
    </header>
    
           
    
</div>
<div style="text-align:center; font-size:1rem; padding:0.5rem;">
    <dl>
        <dd>Sebagai wujud pelaksanaan Amanah Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, serta dalam rangka menindaklanjuti Instruksi Menteri Dalam Negeri Republik Indonesia Nomor : 188.52/1797/SJ tentang Peningkatan Transparansi Pengelolaan Anggaran Daerah, maka dibawah ini terdapat link dokumen yang terkait dengan Anggaran Pemerintah Daerah Kabupaten Banyuwangi. </dd>
    </dl>
</div>


<style>
    .tools-sc-container{
        grid-template-columns: auto auto auto auto auto !important;
    }

    @media all and (max-width:600px){
        .tools-sc-container{
        grid-template-columns: auto auto auto  !important;
    }
    }

</style>


<div class="tools-sc-container ">

    @foreach ($listApps as $item)
        <div class="tools-sc-container-item">
            <a href="{{ $item['linkTo'] }}">
                <div class="tool-items">
                    <img class="tool-items-icon" title="{{ $item['title'] ." - ". $item['textDesc']}}"
                        src="{{ $item['imgSrc'] }}" alt=" {{ ' image '.$item['title'] }}">
                </div>

                <div class="tool-items-text" title="{{ $item['title'] ." - ". $item['textDesc'] }}">{{ $item['title'] }}</div>

            </a>
            

        </div>
    @endforeach
</div>



  