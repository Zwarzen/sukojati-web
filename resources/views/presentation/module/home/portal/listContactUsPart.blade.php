<div style="text-align:center; font-size:1.5rem; padding:1rem;">
    <span>Daftar Kontak</span>
</div>

<style>
    .tools-sc-container {
        grid-template-columns: auto auto auto auto auto !important;
    }

    @media all and (max-width:600px) {
        .tools-sc-container {
            grid-template-columns: auto auto auto !important;
        }
    }

</style>


<div class="tools-sc-container ">

    @foreach ($listApps as $item)
        <div class="tools-sc-container-item">
            <a href="{{ $item['linkTo'] }}">
                <div class="tool-items">
                    <img class="tool-items-icon" title="{{ $item['title'] . ' - ' . $item['textDesc'] }}"
                        src="{{ $item['imgSrc'] }}" alt=" {{ ' image ' . $item['title'] }}">
                </div>

                <div class="tool-items-text" title="{{ $item['title'] . ' - ' . $item['textDesc'] }}">
                    {{ $item['title'] }}</div>

            </a>


        </div>
    @endforeach
</div>


<div style="text-align: center">
    <div><strong>PEMERINTAH KABUPATEN BANYUWANGI</strong></div>
    <address> <small>

            <div>Jalan Ahmad Yani No. 100
            </div>
            <div>Kabupaten Banyuwangi</div>
            <div>Jawa Timur - Indonesia, 68425</div>
            <div>Telpon: 0333 425001 / Fax. 0333 417437</div>
            <div>Email: info@banyuwangikab.go.id</div>

        </small>
    </address>
</div>

<div style="text-align: center">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15795.184528346661!2d114.366449!3d-8.2232462!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfeaf66ef9d797dce!2sKantor%20Bupati%20Banyuwangi!5e0!3m2!1sid!2sid!4v1640764272478!5m2!1sid!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
