@php
$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp


<div id="navbar_main_search" class="must-close mobile-offcanvas ">

    <div id="navbar_main_search_inner" class="container-fluid mobile-offcanvas-inner ">
        <div class="offcanvas-header">
            <button class="btn float-right btn-close"><i class="fas fa-times"></i> </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <div style="display: flex; flex-direction:row;">
                    <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" class="logo-beranda-img">
                    {{-- <div id="title-teks" class="logo-beranda">
                            <span class="title-teks-sub-a" style="color:#E3AF1C">BANYUWANGI</span>
                            <span class="title-teks-sub-b">Semakin Digital</span>
                        </div> --}}
                    <span class="title-teks" style="color: #303030"> {{ $opdProfile->alias }} </span>
                </div>
            </a>
        </div>
        <br>



        <style>
            .tagline-home-2 {
                text-align: center;
                font-family: 'Fauna One';
                font-size: 0.9rem
            }

            .search-container-inner {
                padding: 1rem 10% 1rem 10%;
                margin: auto;
                cursor: pointer;

            }

            @media all and (max-width:600px) {
                #search-container-p1 {
                    margin-top: 100px;
                    margin-bottom: -50px;
                }

                .tagline-home-2 {
                    font-size: 0.7rem;
                }

                .search-container-inner {
                    padding: 1rem 10% 1rem 10%;

                }
            }

        </style>

        <div style="search-container" id="search-container-p1">
            {{-- <div style="width: 100%; text-align:center">
                <h5 style="text-align:center; margin:auto;">Cari info menarik</h5>
            </div> --}}
            <div class="search-container-inner">
                <div style="padding:1rem; margin:auto">
                    <form action="{{ route('search') }}"
                        id="id-search-form-nav"
                        method="get"
                        style="color:inherit; margin:auto; align-self:center auto;"
                        class="form-inline search-form">

                        <input id="search-input-form"
                            name="q"
                            class="form-control search-input-form"
                            type="text"
                            placeholder="Cari info menarik ">

                            <i class="fa fa-search" onclick="submitSearchNav(event)"
                            style="cursor:pointer; color:#0b96e6"
                            aria-hidden="true"></i>

                        <i style="clear:both"></i>

                        {{-- @csrf --}}

                    </form>

                    {{-- <div class="tagline-home-2">"Telusuri Banyuwangi, Anda pasti ingin kembali "</div> --}}

                </div>
            </div>
        </div>




    </div>
</div>


<script>
    function submitSearchNav(e){
        $("#id-search-form-nav").submit()
    }


    function searchContent(event) {
        var tipeEvent = event.type;
        if (tipeEvent == "keypress") {
            var code = event.charCode;
            if (code == 13) {
                getListInformation()
            }else{
                // event.preventDefault()
            }

        } else if (tipeEvent == "click") {
            getListInformation()
        }
    }

    function getListInformation() {

        $.ajax({
            type: 'POST',
            url: APP_URL + '/portal/getListInformation',
            data:  {"_token":"{!! csrf_token() !!}","key":$('#search-input-field').val()},
            dataType: "html",
            beforeSend:function(){
                $("#id_search_list_content").html(`
                <div style="text-align:center; align-items:center; width:100%; padding:1rem;">

                <div style="border-radius:10rem; margin:auto; height:100px; width:100px; background:url('{!! asset("presentation/b-asset/img/loading3.gif")!!}') center center no-repeat;"></div>
            </div>
                `);
            },
            success: function(html) {
                $("#id_search_list_content").html(html);

            },
            error: function(err) {
                $("#id_search_list_content").html(
                    `<div style="text-align:center; font-size:1.5rem">Upss.. Maaf telah terjadi kendala saat menyiapkan data, saat ini konten belum bisa ditampilkan <br> Silakan dicoba kembali</div>`
                );
                console.log(err)
            }
        })
    }
</script>
