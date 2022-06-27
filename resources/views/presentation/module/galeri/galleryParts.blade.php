<style>
    .overlay {
    height: 0%;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-y: hidden;
    transition: 0.5s;
    }

    .overlay-content {
    position: relative;
    /* top: 25%; */
    width: 100%;
    text-align: center;
    margin-top: 0;
    }

    .overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
    }

    .overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
    }

    .overlay .closebtn {
    position: absolute;
    top: 1px;
    right: 35px;
    font-size: 40px;
    color: white !important;
    }

    /* @media screen and (max-height: 450px) {
    .overlay {overflow-y: auto;}
    .overlay a {font-size: 20px}
    .overlay .closebtn {
    font-size: 40px;
    top: 1px;
    right: 35px;
    color: white !important;
    }
    } */
    /* Smaller than standard 960 (devices and browsers) */
    .carousel-indicators {
        position: fixed;
    }
    .carousel-item {
        height: 100vh;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }
    .carousel-control-next-icon {
        top: 50%;
        position: absolute;
        bottom: 50%;
    }
    .carousel-control-prev-icon {
        top: 50%;
        position: absolute;
        bottom: 50%;
    }
    .carousel-control-next {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .carousel-control-prev {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<div style=" margin-top:15px; border-radius:15px; background: #ffffff00; opacity:0.9;width:100%;">

    @php
    //print_r($data);
        $listImgGallery = [
            [
                'id' => '',
                'slug' => 'abstract',
                'title' => 'Pulau Merah',
                'linkTo' => '#',
                'imgSrc' => asset('presentation/b-asset/img/pulau_merah.jpg'),
                'textDesc' => 'Prioritas Pembangunan Daerah Wajib',
                'justForward' => false,
                'action' => [
                    'onclick' => 'showListPrioritas',
                ],
                'param-action' => 'wajib',
            ],
        
            [
                'id' => '',
                'slug' => 'Gandrung-Sewu',
                'title' => 'Gandrung Sewu',
                'linkTo' => '#',
                'imgSrc' => asset('presentation/b-asset/img/gandrung-sewu-bwidev.jpeg'),
                'textDesc' => 'Prioritas Pembangunan Daerah Wajib',
                'justForward' => false,
                'action' => [
                    'onclick' => 'showListPrioritas',
                ],
                'param-action' => 'wajib',
            ],
        
            [
                'id' => '',
                'slug' => 'Red-Island',
                'title' => 'Red Island',
                'linkTo' => '#',
                'imgSrc' => asset('presentation/b-asset/img/pulau_merah2.jpg'),
                'textDesc' => 'Prioritas Pembangunan Daerah Wajib',
                'justForward' => false,
                'action' => [
                    'onclick' => 'showListPrioritas',
                ],
                'param-action' => 'wajib',
            ],
        
            [
                'id' => '',
                'slug' => 'Ijen-Crater',
                'title' => 'Ijen Crater',
                'linkTo' => '#',
                'imgSrc' => asset('presentation/b-asset/img/ijen-bwidev.jpg'),
                'textDesc' => 'Prioritas Pembangunan Daerah Wajib',
                'justForward' => false,
                'action' => [
                    'onclick' => 'showListPrioritas',
                ],
                'param-action' => 'wajib',
            ],
            [
                'id' => '',
                'slug' => 'Ijen-Crater',
                'title' => 'Ijen Crater',
                'linkTo' => '#',
                'imgSrc' => asset('presentation/b-asset/img//gallery/img10.jpg'),
                'textDesc' => 'Prioritas Pembangunan Daerah Wajib',
                'justForward' => false,
                'action' => [
                    'onclick' => 'showListPrioritas',
                ],
                'param-action' => 'wajib',
            ],
            [
                'id' => '',
                'slug' => 'Ijen-Crater',
                'title' => 'Ijen Crater',
                'linkTo' => '#',
                'imgSrc' => asset('presentation/b-asset/img/gallery/img11.jpg'),
                'textDesc' => 'Prioritas Pembangunan Daerah Wajib',
                'justForward' => false,
                'action' => [
                    'onclick' => 'showListPrioritas',
                ],
                'param-action' => 'wajib',
            ],
        ];
        
    @endphp


    <div class="galery-container">
        @foreach ($data as $item)
            <a href="javascript:void(0)" onclick="openNav('{{ $item->id }}','{{ $item->name }}')">
                <div class="galery-container-item">
                    <div style="background: url('media/galeri/thumbnail/{{ $item->img_thumb!=''?$item->img_thumb:'empty.jpg' }}'); background-size: cover;
                        background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                        <div class="galery-container-text">
                            {{ $item->name }}
                        </div>

                    </div>
                </div>
            </a>
        @endforeach

    </div>


</div>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <span id="titleImg" style="color: #acabab;width: fit-content;display: block;padding-right: 20px;background: #2f2f2f;padding-left: 10px;border-top-right-radius: 25px;border-bottom-right-radius: 25px;padding-top: 5px;padding-bottom: 2px;max-width: 80%;" class=""><h5 class="typewriter title-text-single coloring-text-logo" style="font-size: 38px;padding: 0px;" id="titleKatImg">Ini Percobaan</h5></span>
  <div class="overlay-content" id="myNav-konten">
    <!-- <div style="width: fit-content;margin: 0px auto;">
        <img src="https://cdn.timesmedia.co.id/images/2021/03/02/Bupati-Ipuk.jpg">
        <div style="display: inline-block;width: 160px;background: #00000087;height: 100%;position: absolute;margin-left: -160px;">
            <span style="height: 100%;">tes</span>
        </div>
    </div> -->
    
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
    
    function openNav(ids,nm_kat) {
        $('#topNav').removeClass('show-element');
        document.getElementById("myNav").style.height = "100%";
        $('#titleKatImg').text(nm_kat);
        $('#topNav').addClass('hide-element');
        
        $("#myNav-konten").html(
            '<div class="spinner-border text-info" role="status" style="position: fixed;top: 50%;">\
                <span class="sr-only">Loading...</span>\
            </div>'
        );
        jnis='';
        if(nm_kat == 'Ngetren' || nm_kat == 'Terbaru')
        {
            jnis=nm_kat;
        }
        $.ajax({
            type: 'POST',
            url: APP_URL + '/galeri/showListFotoByKategori',
            dataType: "html",
            data:{id:ids,jns:jnis,_token:'{{ csrf_token() }}'},
            success: function(html) {
                $("#myNav-konten").html(html);
            },
            error: function(err) {
                $("#myNav-konten").html(
                    '<div style="text-align:center; font-size:1.5rem;color: #b0b0b0;">Upss.. Maaf telah terjadi kendala saat menyiapkan data, saat ini konten belum bisa ditampilkan <br> Silakan dicoba kembali</div>'
                );
                console.log(err)
            }
        })
    }

    function closeNav() {
        $('#topNav').removeClass('hide-element');
        $('#titleKatImg').text('');
        document.getElementById("myNav").style.height = "0%";
        $('#topNav').addClass('show-element');
    }
</script>
