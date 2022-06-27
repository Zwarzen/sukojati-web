<div style="width: 100%; font-size:1.2rem; font-weight:600; line-height:2rem; padding:0.5rem">Ngetren <small
        style="float: right; font-size:0.9rem; line-height:2rem">
        <!-- Lainnya <i class="fas fa-chevron-right"
            style="margin-left:0.3rem; font-size:0.7rem"></i>  -->
        </small></div>
        
<div class="scroller" style="max-height:27rem; overflow-y:auto; padding:1rem">
    <div style="background: #ffffff">
        @foreach ($galeriNgetren as $item)
            <!-- <a target="_blank" href="{{ route('galeri') . '/' . $item['slug'] }}"> -->
            <a href="javascript:void(0)" onclick="openNav('{{ $item['id'] }}','Ngetren')">
                <div class="ng-wrp-item" style="border-bottom:1px solid #e9e9e9">
                    <div style="height: 5rem; width:5rem; border-radius:15px;   
                    background-image: url('/media/galeri/thumbnail/{{ $item['img_thumb'] }}');
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


</div>
