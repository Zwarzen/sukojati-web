<!-- TOP NAV -->
<div>
    <div id="topNav" class="nav-portal">
        @if (isset($headlineNews))
            <div class="headline-main-header">
                <div class="container align-items-center justify-content-center text-center">
                    <a href='{{ url($headlineNews['urlHeadlineNews']) }}'>
                        <span style="color:white; text-align:center">
                            <h5 style="color:rgb(5, 5, 5); text-align:center">
                                <strong>{{ $headlineNews['titleHeadlineNews'] }}</strong>
                            </h5>
                            <span>{{ $headlineNews['contentHeadlineNews'] }}</span>
                        </span>
                    </a>
                </div>
            </div>
        @endif

        <style>
            .nav-utama{
                padding-top:10px; 
            }
            .search-container-berita{
                    padding: 0px;
                    flex:3;
                    float: left;
            }
            .search-container-inner {
                margin: auto;
                cursor: pointer;
                margin-top: 10px 0px 0px 0px  !important;
                
                

            }
            .search-form{
                width: 100% !important; 
                padding: 0px 15px 0px 15px !important;
            }


            @media all and (min-width:600px) and (max-width:824px){
                .container {
                    width: 1000px !important;
                }

                .search-container-berita{
                    padding: 0px;
                    flex:3;
                    float: left;
                }

                .search-container-inner {
                    margin: auto;
                    cursor: pointer;
                    margin-top: 10px  !important;
                    padding: 0% !important;

                }

                .search-form{
                    width: 100% !important; 
                    padding: 0px 15px 0px 15px !important;
                    margin: auto !important;
                }

                .search-input-form{
                    max-width: 90% !important;
                }

                
            }

            @media all and (max-width:600px) {
                
                #nav-berita-search {
                    margin-top: 0px;
                    margin-bottom: 0px;
                }

                .search-container-berita{
                    padding: 0px;
                    flex:4;
                    float: left;
                }

                .search-form{
                    background: none !important;
                    padding: none;
                }

                .search-container-inner {
                    margin-top: 10px  !important;
                    padding: 5px !important;
                }

                .search-input-form{
                    max-width: 90% !important;
                }




            }

            @media all and (max-width:360px) {
                .search-form {
                    padding: 0px !important;
                }

                .search-input-form{
                    width: 90px !important;
                }
            }

        </style>


        <!-- add .full-container for fullwidth -->
        <div class="container ">
            <div id="navbar-utama" class="navbar nav-utama">

                <a class="navbar-brand" data-trigger="#navbar_news">
                    <div class="navbar-brand-wrp">
                        <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" class="logo-beranda-img">
                        <span class="title-teks"><strong> KabarBwi </strong> </span>
                        {{-- <div id="title-teks" class="logo-beranda">
                            <span class="title-teks-sub-a">Banyuwangi</span>
                            <span class="title-teks-sub-b">Semakin Digital</span>
                        </div> --}}

                    </div>
                </a>

                
                    
            
                <div class="search-container-berita" id="nav-berita-search">
                    {{-- <div style="width: 100%; text-align:center">
                        <h5 style="text-align:center; margin:auto;">Cari info menarik</h5>
                    </div> --}}
                    <div class="search-container-inner">
                            <form action="{{ route('search') }}" 
                                id="id-search-form-nav"
                                method="get" 
                                style="color:inherit; margin:auto; align-self:center auto;"
                                class=" search-form form-inline ">
                                
                                <input id="search-input-form"
                                    name="q" 
                                    class="search-input-form form-control " 
                                    type="text" 
                                    placeholder="Cari info menarik ">
        
                                    <i class="fa fa-search" onclick="submitSearchNav(event)" 
                                    style="cursor:pointer;"
                                    aria-hidden="true"></i>
        
                                <i style="clear:both"></i>
        
                                {{-- @csrf --}}
                                
                            </form>
        
                    </div>
                </div>


                <div class="toolbar-nav ml-auto">
                    

                    {{-- <button data-trigger="#navbar_main_search" class="btn btn-default navbar-nav ">
                        <a >
                            <i class="fas fa-search"></i>
                        </a>

                        
                    </button> --}}

                    {{-- 
                    <button data-trigger="#navbar_main_weather" class="btn btn-default navbar-nav ">
                        <i class="fas fa-cloud-sun"></i>
                    </button> --}}


                    <button  class="btn btn-default navbar-nav ">
                        <a href="{{ route('portal') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </button>


                    {{-- <button data-trigger="#navbar_news" class="btn btn-default navbar-nav ">
                        <a >
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        
                    </button> --}}

                    {{-- <button data-trigger="#navbar_main" class="btn btn-default navbar-nav ">
                        <i class="fas fa-times"></i>
                    </button> --}}

                </div>
            </div>

            <style>
                .navbar-kategori{
                    /* max-width: 1000px; */
                }
                ul.list-inline {
                    text-align: center !important;
                    overscroll-behavior-x: scroll auto;
                }

            </style>


            <div id="navbar-kategori" class="navbar-kategori">

                @if(isset($beritaMainKategori))

                <ul class="list-inline">

                @foreach ($beritaMainKategori as $k => $item)

                    @if($k == 13){
                        <button data-trigger="#navbar_news" class="btn btn-default navbar-nav ">
                            <a >
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            
                        </button>
                    @else
                        <li class="list-inline-item">
                            <a href="{{ route('berita.kanal.{any}',$item->kanal_slug) }} ">
                                <strong>

                                
                                    {{-- <img class="tool-items-icon" style="height: 32px; width:32px;" title="{{ $item->name}}"
                                        src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt=" {{ ' image '.$item->name }}"> --}}

                                    <span class="xxxtool-items-text" title="{{ $item->kanal_slug }}">{{ $item->kanal_slug }}</span>

                                </strong>

                            </a>
                        
                        </li>
                    @endif
                    

                @endforeach

            </ul>
                @endif
                </div>


        </div>
    </div>


</div>
