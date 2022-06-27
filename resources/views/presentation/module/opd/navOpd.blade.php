<!-- TOP NAV -->
<style>
    .d-xs-none{
        display: block;
    }

    .title-teks-sub-opd-a{
        max-width: 200px !important;
        overflow: hidden;
    }
    .logo-beranda-img{

    }


    @media only screen and (max-width: 800px) {
        .d-xs-none{
            display: none !important;
        }
    }



    /* @media (min-width: 992px) { */
        .dropdown-menu .dropdown-toggle:after {
            border-top: .3em solid transparent;
            border-right: 0;
            border-bottom: .3em solid transparent;
            border-left: .3em solid;
        }

        .dropdown-menu .dropdown-menu {
            margin-left: 0;
            margin-right: 0;
        }

        .dropdown-menu li {
            position: relative;
        }

        .nav-item .submenu {
            display: none;
            position: absolute;
        }

        .nav-item .submenu-left {

            right: auto;
            left: 50%;


            /* right: 5% !important;
            left: 20% !important;
            bottom: 50px;
            width: fit-content;
            padding: 5px;
            transition: all ease 0.5ms;
            background: #efefef;
            margin-bottom: 5%; */

        }

        .dropdown-menu>li:hover {
            background-color: #f5fbfd
        }

        .dropdown-menu>li:hover>.submenu {
            display: block;
            transition: all ease 0.5ms;
            background: #efefef;

        }
    /* } */


    @media (max-width: 991px) {
        .nav-item .submenu-left {
            position: relative !important;
            right: 0px !important;
            left: 0px !important;
            top: 0px;
            bottom: 0px !important;
            background: #efefef;

        }


        .dropdown-menu-right{
            /* background: red !important; */
            transform: translate3d(0px, 38px, 0px) !important;
            width: 100% !important;
        }
    }


</style>


@php

$opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
@endphp


<div>
    <div id="topNav" class="nav-portal hide-element">
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

        <!-- add .full-container for fullwidth -->
        <div class="container">
            <div id="navbar-utama" class="navbar navbar-utama  navbar-expand-lg">

                <a class="navbar-brand" href="">
                    <div class="navbar-brand-wrp">
                        <img src="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}" class="logo-beranda-img">
                        {{-- <span class="title-teks"><strong> {{ $opd->nama }} </strong> </span> --}}
                        <div id="title-teks" class="logo-beranda">
                            <span class="title-teks-sub-opd-a">{{ $opdProfile->alias }}</span>
                            <span class="title-teks-sub-opd-b">Kabupaten Banyuwangi</span>
                        </div>

                    </div>
                </a>


                <div class="d-lg-block d-md-none d-sm-none d-xs-none ml-auto">
                    @include('presentation.module.opd.navMenuOpd')
                </div>


                <button data-trigger="#navbar_main_opd"
                    class="btn btn-default d-lg-none ml-auto"> <i
                        class="fas fa-ellipsis-v"></i> </button>

            </div>
        </div>

    </div>


</div>
