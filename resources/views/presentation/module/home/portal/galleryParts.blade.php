<div style=" margin-top:15px; border-radius:15px; background: #ffffff00; opacity:0.9;width:100%;">

    <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Galeri <small
        style="float: right; font-size:0.9rem; line-height:2rem"><a href="{{ route('berita') }}">Lainnya </a><i
            class="fas fa-chevron-right" aria-hidden="true"></i> </small>
</div>

    <div class="galery-container">
        @foreach ($galeriKategori as $item)
            <a href="javascript:void(0)" onclick="openNav('{{ $item->name }}')">
                <div class="galery-container-item">
                    <div style="background: url('media/galeri/thumbnail/{{ $item->img_thumb!=''?$item->img_thumb:'empty.jpg' }}'); background-size: cover;
                        background-repeat: no-repeat; background-position:center;" class="galery-container-img">
                        <div class="galery-container-text">
                            {{ $item->name }}
                        </div>

                    </div>
                </div>
            </a>
        @endforeach

    </div>

</div>

<script>
    function openNav(name){
        location.href = `{{ url('/galeri') }}`
    }
</script>
