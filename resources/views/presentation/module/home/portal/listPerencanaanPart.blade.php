<div style="text-align:center; font-size:1.5rem; padding:1rem;">
    <span>Transparansi Perencanaan Pembangunan Banyuwangi</span>
</div>

<style>
    .tools-sc-container{
        grid-template-columns: auto auto auto auto auto !important;
    }

    @media all and (max-width:600px){
        .tools-sc-container{
        grid-template-columns: auto auto auto  !important;
    }
    }

</style>


<div class="tools-sc-container ">

    @foreach ($listApps as $item)
        <div class="tools-sc-container-item">
            <a href="{{ $item['linkTo'] }}">
                <div class="tool-items">
                    <img class="tool-items-icon" title="{{ $item['title'] ." - ". $item['textDesc']}}"
                        src="{{ $item['imgSrc'] }}" alt=" {{ ' image '.$item['title'] }}">
                </div>

                <div class="tool-items-text" title="{{ $item['title'] ." - ". $item['textDesc'] }}">{{ $item['title'] }}</div>

            </a>
            

        </div>
    @endforeach
</div>



  