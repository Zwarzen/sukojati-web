<div
style=" margin-top:15px; border-radius:15px; background: #ffffff5b; opacity:0.9; padding:1rem; width:100%;">
<div style="text-align: center; font-size:1.2rem">
    Pintasan Informasi
</div>
@php
    $listApps = [
        [
            'id' => '',
            'slug' => '',
            'title' => 'Wajib',
            'linkTo' => '#',
            'imgSrc' => 'https://banyuwangikab.go.id/images/icon/perencanaan.png',
            'textDesc' => 'Prioritas Pembangunan Daerah Wajib',
            'justForward' => false,
            'action' => [
                'onclick' => 'showListPrioritas'
            ],
            'param-action' => 'wajib'

        ],
    
        [
            'id' => '',
            'slug' => '',
            'title' => 'Unggulan',
            'linkTo' => '#',
            'imgSrc' => 'https://banyuwangikab.go.id/images/icon/transparansi.png',
            'textDesc' => 'Prioritas Pembangunan Daerah Wajib Unggulan',
            'justForward' => false,
            'action' => [
                'onclick' => 'showListPrioritas'
            ],
            'param-action' => 'unggulan'
        ],

        [
            'id' => '',
            'slug' => '',
            'title' => 'Penunjang',
            'linkTo' => '#',
            'imgSrc' => 'https://banyuwangikab.go.id/images/icon/transparansi.png',
            'textDesc' => 'Prioritas Pembangunan Daerah Wajib Penunjang',
            'justForward' => false,
            'action' => [
                'onclick' => 'showListPrioritas'
            ],
            'param-action' => 'penunjang'
        ],
    
       
    ];
    
@endphp

<div class="row ">
    @foreach ($listApps as $item)
        <div class="col-6 col-md-4 col-lg-4">
            <div class="tools-sc-container-item tools-sc-bg-container-item">
                <a
                    {{ (($item['justForward']) ? 'href=' . $item['linkTo'] : $item['action']['onclick'])? 
                    'onclick='.$item['action']['onclick'].'("'.$item['param-action'].'")' : '' }}>
                    <div class="tool-items">
                        <img class="tool-items-icon"
                            title="{{ $item['title'] . ' - ' . $item['textDesc'] }}"
                            src="{{ $item['imgSrc'] }}"
                            alt=" {{ ' image ' . $item['title'] }}">
                    </div>

                    <div class="tool-items-text"
                        title="{{ $item['title'] . ' - ' . $item['textDesc'] }}">
                        {{ $item['title'] }}</div>

                </a>
            </div>
        </div>
    @endforeach
</div>
</div>

<script>
    function showListPrioritas() {


        showBasedModal()
        $.ajax({
            type: 'GET',
            url: APP_URL + '/prioritas/showListPrioritas',
            dataType: "html",
            success: function(html) {
                $("#navbar_based_modal_content").html(html);

            },
            error: function(err) {
                $("#navbar_based_modal_content").html(
                    `<div style="text-align:center; font-size:1.5rem">Upss.. Maaf telah terjadi kendala saat menyiapkan data, saat ini konten belum bisa ditampilkan <br> Silakan dicoba kembali</div>`
                    );
                console.log(err)
            }
        })
    }

    
</script>
