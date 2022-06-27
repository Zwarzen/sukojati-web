<div style="width: 100%; font-size:1.2rem; font-weight:600; line-height:2rem; padding:0.5rem">Ngetren 
    <small style="float: right; font-size:0.9rem; line-height:2rem">
        <a target="_blank" href="{{ route('berita.video')}}">
            Lainnya <i class="fas fa-chevron-right"
            style="margin-left:0.3rem; font-size:0.7rem"></i> 
        </a>
    </small>
</div>


<div class="scroller" style="max-height:27rem; overflow-y:auto; padding:1rem">
    <div style="background: #ffffff">


        @if(isset($ngetrenBeritaFoto))
            @foreach ($ngetrenBeritaFoto as $item)

                <a target="_blank" href="{{ route('berita.foto') . '/' . $item->slug }}">
                    <div class="ng-wrp-item" style="border-bottom:1px solid #e9e9e9">
                        <div style="height: 5rem; width:5rem; border-radius:15px;   
                        background-image: url('{{ $item->img_thumb_nya != '' || $item->img_thumb_nya != null? $base_link_media_thumbnail.$item->img_thumb_nya : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                        background-size:100% 100%;
                        background-position:center center; ">
                        <div
                            style=" border-radius: 15px 15px 0px 0px !important;  padding:0.5rem; font-size:1rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                            <i class="fas fa-images"></i>
                        </div>
                        </div>
                        

                        <div style=" flex:1;padding-left:1rem;">
                            <div style="text-align: left; font-size:0.9rem">
                                {{ strlen($item->title)  > 60 ? substr($item->title,0, 60)."..."  : $item->title}}
                                <br>
                                <small style="color:#aaaaaa">
                                <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse( $item->created_at)->diffForHumans() }}
                                </small>
                            </div>

                        </div>



                    </div>

                </a>





            @endforeach
        @endif

    </div>


</div>
