@if(isset($latestGaleri) && $latestGaleri->count() > 0)
<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet"
        type="text/css" />

<style>
    .photo-gallery {
        color:#313437;
        background-color:#fff;
    }

    .photo-gallery p {
        color:#7d8285;
    }

    .photo-gallery h2 {
        font-weight:bold;
        margin-bottom:40px;
        padding-top:40px;
        color:inherit;
    }

    @media (max-width:767px) {
        .photo-gallery h2 {
            margin-bottom:25px;
            padding-top:25px;
            font-size:24px;
        }
    }

    .photo-gallery .intro {
        font-size:16px;
        max-width:500px;
        margin:0 auto 40px;
    }

    .photo-gallery .intro p {
        margin-bottom:0;
    }

    .photo-gallery .photos {
        padding-bottom:20px;
    }

    .photo-gallery .item {
        padding-bottom:30px;
    }


</style>

<div style="">
  <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Gallery Terbaru <small
          style="float: right; font-size:0.9rem; line-height:2rem"><a href="{{ route('galeri') }}">Lainnya </a><i
              class="fas fa-chevron-right" aria-hidden="true"></i> </small>
  </div>

  <div class="row">


            <div class="col-12" style="margin-bottom: 2rem">
                <div class="photo-gallery">
                    <div class="container">
                        <div class="intro">
                            <h2 class="text-center">Gallery / Photo</h2>
                        </div>
                        <div class="row photos">
                            @foreach ($latestGaleri as $item)

                            <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ asset('media/galeri/original/'.$item->img_raw) }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('media/galeri/thumbnail/'.$item->img_thumb) }}"></a></div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>



  </div>
</div>
<script src="{{ asset('js/lightbox.min.js') }}"></script>
@endif
