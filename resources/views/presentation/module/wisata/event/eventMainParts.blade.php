<div class="pad-main-resume">

    {{-- TITLE MODUL --}}
    <div class="sg-title">
        <div class="sg-ic-wrp">
            <img class="sg-ic" src="{{ asset('presentation/b-asset/img/icon-wisata.png') }}" alt="">
            <div class="sg-text">Event Kabupaten Banyuwangi</div>
        </div>

    </div>


</div>
<br>


<br>
{{-- MOST WIDGET --}}

    <div class="row">
        @foreach ($modulItems as $item)
            <div class="col-lg-4 col-md-4 col-sm-6">

                <a class="link-wrp" href="{{ url($item['link']) }}">
                    <div class="sg-widget-wrapper">
                        <div class="wg-ic-wrp">
                            <img class="ic" src="{{ asset($item['icon']) }}" alt="">
                        </div>
                        <div class="sg-div-wrp">
                            <h4 class="dt-slick-txt-header"> {{ $item['name'] }}</h4>
                            <small> <i>{{ $item['desc'] }}</i> </small>
                            @if (isset($item['data']))
                                <div class="dt-slick-budaya">
                                    @foreach ($item['data'] as $v)
                                        <div class="dt-slick-txt">
                                            <span> {{ $v }}</span>
                                        </div>
                                        <div class="dt-slick-txt">
                                            <span> {{ $v }}</span>
                                        </div>
                                    @endforeach

                                </div>
                            @endif

                        </div>

                    </div>
                </a>

            </div>
        @endforeach


    </div>
<br>
<br>

<!-- <h2 style="background: #4ea1ac; padding:1rem; ">Catatan:: konten halaman ini silakan merujuk pada web
    <a style="color:blue" href="https://banyuwangikab.go.id/bwidev/">https://banyuwangikab.go.id/bwidev</a>
</h2> -->

<div class="row">
    <div class="col-md-3 col-lg-3">
      <div class="card">
        <h5 class="card-header">Sort By</h5>
        <div class="card-body">
          <div class="form-check sort-by">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              Newest Listings
            </label>
          </div>
          <div class="form-check sort-by">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
            <label class="form-check-label" for="defaultCheck2">
              Recommendations
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 col-lg-9">
    @foreach ($list as $row)
    <div class="card" >
      <div class="row">
        <div class=" col-md-4">
          <img class="card-img-top img-list" src="{{$row->img}}" alt="Card image cap">
        </div>
        <div class=" col-md-8">
          <div class="card-body">
            <h4 class="card-title">{{$row->nama}} </h4>
            <p class="card-text">{{$row->deskripsi}}</p>
            <div class="col-lg-11 footer-info ">
              <a href="{{url('wisata/akomodasi/villa/'.$row->nama)}}" class="btn btn-outline-dark float-right" >Selengkapnya....</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
</div>


<script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip({
        placement : 'top'
    });
        $('.dt-slick-budaya').slick({
            autoplay: true,
            autoplaySpeed: 1000,
            dots: false,
            infinite: true,
            speed: 1000,
            prevArrow: false,
            nextArrow: false,
            fade: true,
            cssEase: 'ease-in-out',
            touchThreshold: 100,
            draggable: true,

        });
    })
</script>
