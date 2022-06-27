<div style="text-align:center; font-size:1.5rem; padding:1rem;">
    <span>Profile Daerah Banyuwangi</span>
</div>

<style>
    .title-container{
        font-family: 'Rubik', 'Fauna One', 'Roboto';
        font-size: 1.1rem;
    }

    .tools-sc-container{
        grid-template-columns: auto auto auto auto auto !important;
    }

    @media all and (max-width:600px){
        .tools-sc-container{
        grid-template-columns: auto auto auto  !important;
    }
    }

</style>
<div class="container">
    <div class="title-container">
            Gambaran Umum
    </div>
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
</div>


<div class="container">

    
    <div>
        <div class="title-container">
            Pemerintahan
        </div>
        <div class="container">
            <div
                style=" margin-top:15px; border-radius:15px;  opacity:0.9; padding:1rem; width:100%;">
                {{-- <div style="text-align: center; font-size:1.2rem">
                            Pintasan Informasi
                        </div> --}}
                @php
                    $listApps = [
                        
                        
                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Lambang Daerah',
                            'linkTo' => route('pemerintahan.lambang-daerah'),
                            'imgSrc' => asset('presentation/b-asset/img/lambang-daerah.png'),
                            'textDesc' => '  ',
                            'justForward' => true,
                        ],

                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Visi Misi',
                            'linkTo' => route('pemerintahan.visi-misi'),
                            'imgSrc' => asset('presentation/b-asset/img/visi-misi.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],

                        
                    
                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'DPRD',
                            'linkTo' => url('https://dprd.banyuwangikab.go.id'),
                            'imgSrc' => asset('presentation/b-asset/img/icon-dprd.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],

                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Kepala Daerah',
                            'linkTo' => route('pemerintahan.kepala-daerah'),
                            'imgSrc' => asset('presentation/b-asset/img/kepala-daerah.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],
                    
                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Sekda',
                            'linkTo' => route('pemerintahan.sekda'),
                            'imgSrc' => asset('presentation/b-asset/img/icon-sekda.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],
                    
                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Dinas',
                            'linkTo' => route('pemerintahan.dinas'),
                            'imgSrc' => asset('presentation/b-asset/img/icon-dinas.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],
                    
                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Badan',
                            'linkTo' => route('pemerintahan.badan'),
                            'imgSrc' => asset('presentation/b-asset/img/icon-badan.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],
                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Inspektorat',
                            'linkTo' => route('pemerintahan.inspektorat'),
                            'imgSrc' => asset('presentation/b-asset/img/icon-inspektorat.png'),
                            'textDesc' => '',
                            'justForward' => true,
                        ],
                        [
                            'id' => '',
                            'slug' => '',
                            'title' => 'Kecamatan',
                            'linkTo' => route('pemerintahan.kecamatan'),
                            'imgSrc' => asset('presentation/b-asset/img/icon-kecamatan.png'),
                            'textDesc' => '',
                            'justForward' => true,
                            'action' => 'popup',
                            'parameter' => [
                                'link' => '',
                                'data' => [''],
                            ],
                        ],
                    ];
                    
                @endphp

                <div class="row ">
                    @foreach ($listApps as $item)
                        <div class="col-6 col-md-3 col-lg-3">
                            <div class="tools-sc-container-item tools-sc-bg-container-item">
                                <a
                                    {{ $item['justForward'] ? 'href=' . $item['linkTo'] : "onclick=openModal('oke')" }}>
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
        </div>


    </div>


</div>



  