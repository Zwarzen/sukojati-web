@foreach ($galleryPartsKategori as $item)
<div style="background: #fafafa; border-radius:15px; padding:1rem; margin-bottom:1rem">
    <div style="font-size:1.2rem; font-weight:600">{{ $item['title'] }} <small
            style="float: right; font-size:0.9rem; line-height:2rem">Lainnya <i
                class="fas fa-chevron-right" style="margin-left:0.5rem; font-size:0.7rem"
                aria-hidden="true"></i> </small></div>
    <hr>
    <div class="row">
        <div class="col-12 col-md-4 col-lg-4">
            <a target="_blank" href="{{ route('galeri') . '/' . $item['pinned']['slug'] }}">
                <div style="width: 100%; height:350px; padding:0px;">



                    {{-- <div style="width: 100%; height:350px">
                    <img src="https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg"
                        alt="gambar-berita" style="border-radius:15px; width: inherit; height:inherit"
                        alt="">
                </div> --}}
                    <div style="
                                border-radius:15px;
                                background-color:#fafafa !important;
                                background-image:url('{{ url('media/galeri/thumbnail/'.$item['pinned']['img_thumb']) }}');
                                
                                background-repeat:no-repeat; 
                                background-size:cover;
                                background-position:center center;
                                width: 100%; height:350px">
                        <div
                            style="border-radius:inherit; height:100%; position:relative; left:0px; bottom:0px; width:100%; background:linear-gradient(to top, #030303b2, transparent )">
                            <div
                                style="position: absolute; bottom:0px; width:100%; padding:1rem; background:#47474700; color:#ffffff; font-weight:600">
                                {{ $item['pinned']['title'] }} </div>
                        </div>

                    </div>



                </div>
            </a>
            <div style="height: 1rem"></div>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
            <div> <strong>Populer dari galeri {{ $item['title'] }}</strong> </div>
            <div class="scroller" style="max-height:27rem; overflow-y:auto;">
                @php
                if(isset($item['populer']))
                {
                @endphp
                @foreach ($item['populer'] as $items)
                <a target="_blank" href="{{ route('galeri') . '/' . $items['slug'] }}">
                        <div class="ng-wrp-item" style="border-bottom: 1px solid #e9e9e9">
                            <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                background-image: url('media/galeri/thumbnail/{{ $items['img_thumb'] }}');
                                                background-size:cover;
                                                background-repeat:no-repeat; 
                                                background-position:center center; ">
                            </div>

                            <div style=" flex:1;padding-left:1rem;">
                                <div style="text-align: left; font-size:0.8rem; font-weight:600">
                                    {{ $items['title'] }}

                                </div>

                            </div>



                        </div>
                    </a>   
                @endforeach
                @php
                }
                @endphp

            </div>
            <div style="text-align:center; font-size:0.9rem; margin-top:1rem; margin-bottom:1rem">
                <a href="#">Lihat lainnya</a>
            </div>


        </div>


        <div class="col-12 col-md-4 col-lg-4">


            <div> <strong>Terbaru dari Galeri {{ $item['title'] }}</strong> </div>
            <div class="scroller" style="max-height:27rem; overflow-y:auto;">
            @php
            if(isset($item['terbaru']))
            {
            @endphp
            @foreach ($item['terbaru'] as $items)
                    <a target="_blank" style="margin-bottom: 1rem"
                        href="{{ route('galeri') . '/' . $items['slug'] }}">
                        <div class="ng-wrp-item" style="border-bottom: 1px solid #e9e9e9">
                            <div style="height: 5rem; width:5rem; border-radius:15px;   
                                                background-image: url('media/galeri/thumbnail/{{ $items['img_thumb'] }}');
                                                background-size:cover;
                                                background-repeat:no-repeat; 
                                                background-position:center center; ">
                            </div>

                            <div style=" flex:1;padding-left:1rem;">
                                <div style="text-align: left; font-size:0.9rem">
                                    {{ $items['title'] }}

                                </div>

                            </div>



                        </div>
                    </a>
            @endforeach            
            @php
            }
            @endphp
            </div>
            <div style="text-align:center; font-size:0.9rem; margin-top:1rem; margin-bottom:1rem">
                <a href="#">Lihat lainnya</a>
            </div>
        </div>
    </div>

</div>
@endforeach