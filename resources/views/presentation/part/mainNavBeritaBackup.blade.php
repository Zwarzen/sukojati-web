<div id="header" class="sticky dark header-md translucent noborder clearfix">
    


    <!-- TOP NAV -->
    <header id="topNav">
        @if (isset($headlineNews))
        <div class="headline-main-header" >
            <div class="container align-items-center justify-content-center text-center" >
                <a href='{{ url($headlineNews['urlHeadlineNews']) }}'>
                    <span style="color:white; text-align:center">
                        <h5 style="color:rgb(5, 5, 5); text-align:center">
                            <strong>{{ $headlineNews["titleHeadlineNews"] }}</strong>
                        </h5>
                        <span>{{ $headlineNews["contentHeadlineNews"]  }}</span>
                    </span>
                </a>
            </div>
        </div>
    @endif

        <div class="container-fluid">
            <!-- add .full-container for fullwidth -->
            <nav class="navbar navbar-expand-lg ">

                <b class="screen-overlay"></b>
                <a class="navbar-brand" href="{{ url('/berita')  }}">
                    <div style="display: flex; flex-direction:row;">
                        <img src="{{ asset('srcadmin/b-assets/img/logo_bwi.png') }}" class="logo-beranda-img">
                        <div id="title-teks" class="logo-beranda">
                            <span class="title-teks-sub-a">{{ isset($navigationPart["navBrandTitle"]) ? $navigationPart["navBrandTitle"] : 'BANYUWANGI' }}</span>
                            <span class="title-teks-sub-b">{{ isset($navigationPart["navBrandSubTitle"]) ? $navigationPart["navBrandSubTitle"] :'Dalam Berita' }} </span>
                        </div>
                    </div>
                </a>
                <button data-trigger="#navbar_main"
                    class="btn btn-default d-lg-none navbar-nav ml-auto a-nav navbar-dark"> <i
                        class="fas fa-ellipsis-v"></i> </button>

                <nav id="navbar_main" class="ml-auto mobile-offcanvas navbar navbar-expand-lg navbar-dark ">
                    <div class="offcanvas-header">
                        <button class="btn float-right btn-close a-nav"><i class="fas fa-times"></i> </button>
                        <a class="navbar-brand" href="{{ url('')  }}">
                            <div style="display: flex; flex-direction:row;">
                                <img src="{{ asset('srcadmin/b-assets/img/logo_bwi.png') }}" class="logo-beranda-img">
                                <div id="title-teks" class="logo-beranda">
                                    <span class="title-teks-sub-a">{{ isset($navigationPart["navBrandTitle"]) ? $navigationPart["navBrandTitle"] : 'BANYUWANGI' }}</span>
                            <span class="title-teks-sub-b">{{ isset($navigationPart["navBrandSubTitle"]) ? $navigationPart["navBrandSubTitle"] :'Dalam Berita' }} </span>
                                </div>
                            </div>
                        </a>

                    </div>


                    <ul class="navbar-nav ml-auto">
                        {{-- <li class="nav-item dropdown a-nav">
                            <a class="nav-link dropdown-toggle a-nav " href="#" data-toggle="dropdown"> Pemerintahan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"> Second level 1 </a></li>
                                <li><a class="dropdown-item" href="#"> Second level 2 &raquo </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="fdfsdf"> Third level 1</a></li>
                                        <li><a class="dropdown-item" href="sdfsdf"> Third level 2</a></li>
                                        <li><a class="dropdown-item" href="sdfsd"> Third level 3 &raquo </a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item" href="sdfsd"> Fourth level 1</a></li>
                                                <li><a class="dropdown-item" href="sdfds"> Fourth level 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="sdfs"> Second level 4</a></li>
                                        <li><a class="dropdown-item" href="sdfsdf"> Second level 5</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                                <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
                            </ul>
                        </li> --}}

                        {{-- <li class="nav-item dropdown a-nav">
                            <a class="nav-link dropdown-toggle a-nav " href="#" data-toggle="dropdown"> Pemerintahan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"> Second level 1 </a></li>
                                <li><a class="dropdown-item" href="#"> Second level 2 &raquo </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="fdfsdf"> Third level 1</a></li>
                                        <li><a class="dropdown-item" href="sdfsdf"> Third level 2</a></li>
                                        <li><a class="dropdown-item" href="sdfsd"> Third level 3 &raquo </a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item" href="sdfsd"> Fourth level 1</a></li>
                                                <li><a class="dropdown-item" href="sdfds"> Fourth level 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="sdfs"> Second level 4</a></li>
                                        <li><a class="dropdown-item" href="sdfsdf"> Second level 5</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                                <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
                            </ul>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link a-nav" href="{{ url('') }}">
                                Portal Kabupaten
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link a-nav" href="{{ url('') }}">
                                Beranda
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link a-nav" href="{{ url('') }}">
                                Ngetren
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link a-nav" href="{{ url('') }}">
                                Kesehatan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link a-nav" href="{{ url('') }}">
                                Ekonomi
                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link a-nav" href="{{ url('') }}">
                                Wisata
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link a-nav" href="{{ url('') }}">
                                Musik
                            </a>
                        </li>


                    </ul>
                </nav>
            </nav>


        </div>
    </header>

</div>
