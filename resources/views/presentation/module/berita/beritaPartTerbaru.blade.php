
 @if(isset($latestBerita) && $latestBerita->count() > 0)


<div style="">
  <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Berita Terbaru <small
          style="float: right; font-size:0.9rem; line-height:2rem"><a href="{{ route('berita') }}">Lainnya </a><i
              class="fas fa-chevron-right" aria-hidden="true"></i> </small>
  </div>

  <div class="row">

   
        
      @foreach ($latestBerita as $item)
          <div class="col-6 col-md-6 col-lg-3">
              <a href="{{ route('berita')."/".$item->slug }}" title="{{ $item->title }}">

                  <div style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff; margin-bottom:1rem;">
                      <div style="
                          border-radius:15px 15px 0px 0px;
                          width:100%;
                          height:150px;
                          background-image: url('{{ $item->img_thumb != '' || $item->img_thumb != null? $base_link_media_thumbnail.$item->img_thumb : asset('presentation/b-asset/img/lambang-daerah.png') }}');
                          background-size:cover; 
                          background-position:center;
                          overflow:hidden;
                          float:right;
                          ">
                         
                      </div>
                      <div
                          style="background: #ffffff; padding:1rem; border-radius: 15px 15px 15px 15px ; text-align:left; font-weight:600">
                          {{ strlen($item->title)  > 60 ? ucwords(substr($item->title,0, 60)."...")  : ucwords($item->title)}}
                      </div>

                  </div>
              </a>

          </div>
      @endforeach

    
  </div>
</div>

@endif