<div style="width: 100%; font-size:1.2rem; font-weight:600; line-height:2rem; padding:0.5rem">Rekomendasi
    <small style="float: right; font-size:0.9rem; line-height:2rem">
        <a target="_blank" href="{{ route('berita')}}">
            Lainnya <i class="fas fa-chevron-right"
            style="margin-left:0.3rem; font-size:0.7rem"></i>
        </a>
    </small>
</div>


<div class="scroller" style="max-height:27rem; overflow-y:auto; padding:1rem">
    <div style="background: #ffffff00">


        {{-- @if(isset($ngetrenBerita))
            @foreach ($ngetrenBerita as $item)

                <a target="_blank" href="{{ route('berita') . '/' . $item->slug }}">
                    <div class="ng-wrp-item" style="border-bottom:1px solid #e9e9e9">
                        <div style="height: 5rem; width:5rem; border-radius:15px;
                        background-image: url('{{ $item->img_thumb != '' || $item->img_thumb != null? $base_link_media_thumbnail.$item->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                        background-size:100% 100%;
                        background-position:center center; ">
                        </div>


                        <div style=" flex:1;padding-left:1rem;">
                            <div style="text-align: left; font-size:0.9rem">
                                {{ strlen($item->title)  > 60 ? ucwords(substr($item->title,0, 60)."...")  : ucwords($item->title)}}

                            </div>
                            <div style="text-align: left; font-size:0.9rem; color:#8b8b8b"><small>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></div>

                        </div>



                    </div>

                </a>





            @endforeach
        @endif --}}

        @if(isset($ngetrenBerita) && count($ngetrenBerita)>0)
        @php $data =[]; $data[] =  $ngetrenBerita[0]; ; @endphp

        @foreach ( $data as $item)
        <a target="_blank" href="{{ route('berita') . '/' . $item->slug }}">
            <div style="width: 100%; height:350px; padding:0px;">


                <div style="
                            border-radius:15px;
                            background-color:#fafafa00 !important;
                            background-image:url('{{ $item->img_thumb != '' || $item->img_thumb != null? $base_link_media_thumbnail.$item->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                            background-repeat:no-repeat;
                            background-size:cover;
                            background-position:center center;
                            width: 100%; height:350px">
                    <div
                        style="border-radius:inherit; height:100%; position:relative; left:0px; bottom:0px; width:100%; background:linear-gradient(to top, #030303b2, transparent )">
                        <div
                            style="position: absolute; bottom:0px; width:100%; padding:1rem; background:#47474700; color:#ffffff; font-weight:600">
                            <div>{{ $item->title }}</div>
                            <div style="color:#8b8b8b"><small>{{ \Carbon\Carbon::parse($item->publish_date)->diffForHumans() }}</small></div>

                        </div>
                    </div>

                </div>



            </div>
        </a>
        @endforeach
        @endif

    </div>


</div>
