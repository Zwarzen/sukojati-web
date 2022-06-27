@if(count($latestPopupInfo) > 0)



<style>

    .mobile-offcanvas-inner{
        background: transparent !important;
        overflow: hidden !important;
        border: none !important;
    }

    
    
   

  .banner-top-wrp {
      overflow: hidden;
      height: 30rem;
      text-align: center;
      align-content: center;
      align-items: center;
      border-radius: 5px;
  }

  .banner-top-wrp:hover .banner-top-item,
  .banner-top-wrp:focus .banner-top-item {
      /* transform: scale(1.2); */
      /* transition: all ease-in-out .5s; */

  }

  .banner-top-wrp:hover .sub-bti-title,
  .banner-top-wrp:focus .sub-bti-title {
      transition: all ease-in-out .5s;
      color: #d426f7 !important;
  }


  .img-banner-top-item{
    height: inherit;
    border-radius: 15px;
    overflow: hidden;
    margin: auto auto;
  }

  .banner-top-item {
      height: inherit;
      align-items: bottom start;
      align-content: bottom start;
      text-align: left;
      -webkit-background-size: cover !important;
      -moz-background-size: cover !important;
      -o-background-size: cover !important;
      background-size: cover !important;
      background-position: center center !important;
      background-repeat: no-repeat !important;
      border-radius: 5px;
      overflow: hidden;
  }

  .bti-content {
      background: linear-gradient(to bottom, rgba(24, 24, 24, 0.63), rgba(61, 61, 61, 0));
      color: #ffffff;
      position: absolute;
      bottom: 0;
      left: 0;
      padding: 1rem;
      text-align: left;
      width: 100%;
      height: 100%;
      border-radius: 5px;
  }

  .bti-title {

      background: linear-gradient(to top, #363636ad 50%, rgba(61, 61, 61, 0));
      color: #ffffff;
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 3rem 1rem 1rem 1rem;
      text-align: left;
      border-radius: 0px 0px 15px 15px;
      /* font-family: 'Fauna One', sans-serif; */
  }


  .sub-bti-title {
      color: inherit;
      font-size: 1.5rem;

      /* font-family: 'Fauna One', sans-serif; */
  }

  .sub-bti-title:hover,
  .sub-bti-title:focus {
      transition: all ease-in-out .5s;
      color: #d426f7 !important;
  }


  @media all and (max-width:900px) {

    .img-banner-top-item{
        height: 100%;
        width: 100%;
        overflow: hidden;
    }

    .sub-bti-title {
        font-size: 1rem;
    }

  }


  @media all and (min-width: 992px) {
        .mobile-offcanvas{
            width: 100% !important;
            height: 100% !important;
            padding:1% !important;
        } 
    }  


</style>


<div class="owl-carousel owl-theme" id="dt-popupinfo-list" style="background:transparent; margin-bottom:1rem;">
    @foreach ($latestPopupInfo as $item)
        <?php  $forward = strlen($item->link_forward) > 10 ? 'yes':'no'; ?>
        @php $img_link = $item->img_raw !== '' || $item->img_raw !== null ? url($base_link_media_popupinfo_raw . $item->img_raw) : 
        asset('presentation/b-asset/img/lambang-daerah.png') @endphp


        <a href="{{ ($forward ==='yes') ? $item->link_forward : $img_link}}">
            <div class="banner-top-wrp">
                {{-- <div style="  
                    background:url('{{ $item->img_raw != '' || $item->img_raw != null? $base_link_media_popupinfo_raw . $item->img_raw: asset('presentation/b-asset/img/lambang-daerah.png') }}');"
                    class="banner-top-item ">

                </div> --}}

                <img class="img-banner-top-item " src="{{ $item->img_raw != '' || $item->img_raw != null? $base_link_media_popupinfo_raw . $item->img_raw: asset('presentation/b-asset/img/lambang-daerah.png') }}" alt="">
                {{-- <div style="text-align: center; font-weight:600"> Klik gambar untuk melihat lebih jelas </div> --}}
                {{-- <div class="bti-title">
                    <div class="sub-bti-title">
                        <strong>
                            {{ $item->title.''.$forward}} 
                        </strong>
                    </div>
                </div> --}}
            </div>

        </a>
    @endforeach
</div>

<script>
  let owl3 = $("#dt-popupinfo-list");
            owl3.owlCarousel({
                singleItem: true,
                autoPlay: true,
                autoPlayTimeout: 200,
            });
</script>

@else
@endif
