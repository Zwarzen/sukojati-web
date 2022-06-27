<div style="width: 100%; font-size:1.2rem; font-weight:600; line-height:2rem">Ngretren  <small style="float: right; font-size:0.9rem; line-height:2rem">Lainnya <i class="fas fa-chevron-right"></i> </small></div>

<style>
    .ng-wrp-item {
        width: 100%;
        display: flex;
        flex-direction: row;
        padding: 0.5rem;
        /* box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); */
        background: #ffffff;
        border-radius: 15px;
        margin-bottom: 1rem;
    }

</style>

@php
$listNgetren = [
    [
        'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
        'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
        'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
        'poster' => 'https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg',
        'kanal-name' => 'News',
        'publish-date' => '2021-09-03 20:21:22',
    ],

    [
        'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
        'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
        'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
        'poster' => 'https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg',
        'kanal-name' => 'News',
        'publish-date' => '2021-09-03 20:21:22',
    ],
    [
        'title' => 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG',
        'slug' => "Upaya-Geopark-Ijen-Masuk-Jaringan-Dunia-Bupati-Ipuk-Ikuti-Forum-dengan-Sekjen-UGG'",
        'shortdesc' => 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.',
        'poster' => 'https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg',
        'kanal-name' => 'News',
        'publish-date' => '2021-09-03 20:21:22',
    ]
    
];
@endphp
<div class="scroller" style="max-height:27rem; overflow-y:auto; padding:1rem">
    @foreach ($listNgetren as $item)
        <a target="_blank" style="margin-bottom: 1rem" href="{{ route('berita.video') . '/' . $item['slug'] }}">
            <div class="ng-wrp-item">
                <div style="height: 5rem; width:5rem; border-radius:15px;   
                background-image: url('{{ $item['poster'] }}');
                background-size:100% 100%;
                background-position:center center; ">
                </div>

                <div style=" flex:1;padding-left:1rem;">
                    <div style="text-align: left; font-size:0.9rem">
                        {{ $item['title'] }}

                    </div>

                </div>


                
            </div>
        </a>
    @endforeach


</div>
