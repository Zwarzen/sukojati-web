<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol> -->
    <div class="carousel-inner">
    @php $i=0; @endphp
    @foreach ($data as $row)
        <!-- <div class="carousel-item active">
        <img class="d-block w-100" src="..." alt="First slide">
        </div> -->
        <!-- <div class="carousel-item " style="background-image: url('https://codetheweb.blog/assets/img/posts/css-advanced-background-images/bg-size-2000px.png');">
            <div class="carousel-caption d-none d-md-block" style="background-color: #000000b0;padding-top: 4px;">
                <div class="row justify-content-center">
                    <img src="#">
                    <img src="#">
                    <img src="#">
                </div>
                <h5>Carousels don’t automatically normalize</h5>
                <p style="font-size: 12px;">Carousels don’t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. While carousels support previous/next controls and indicators, they’re not explicitly required. Add and customize as you see fit</p>
            </div>
        </div> -->
        <div class="carousel-item {{ ($jns!=''?($selected==$row->id?'active':''):($i==0?'active':'')) }}" style="background-image: url('media/galeri/original/{{ $row->img_raw!=''?$row->img_raw:'empty.jpg' }}')">
            <div class="carousel-caption d-none d-md-block" style="background-color: #000000b0;padding-top: 4px;">
                <h5>{{$row->title}}</h5>
                <p style="font-size: 12px;">{{$row->desc}}</p>
            </div>
        <!-- <img class="d-block w-100" src="https://wallpaperaccess.com/full/2219350.jpg" alt="Third slide"> -->
        </div>
        {{ $i++ }}
    @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>