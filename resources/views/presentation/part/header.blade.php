@section('header')

<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>{{ isset($pageTitle)? $pageTitle : '' }}</title>
    <meta name="keywords" content="{{ isset($keywords)? $keywords : '' }}" />
    <meta name="description" content="{{ isset($description)? $description : '' }}" />
    <meta name="Author" content="" />
    <meta name="theme-color" content="#84db94">

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link rel="shortcut icon" href="{{ asset('presentation/b-asset/img/logo_bwi.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('srcadmin/x-assets/fonts/fontawesome5/css/all.css') }}" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700"
        rel="stylesheet" type="text/css" />

    <!-- sweetalert CSS -->
    <script src="{{ asset('srcadmin/b-assets/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>
    
    <!-- CORE CSS -->

    <link rel="stylesheet" href="{{ asset('srcadmin/b-assets/lib/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('presentation/b-asset/css/bwidev.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('presentation/b-asset/css/timeline.css')}}" type="text/css" />

    <!-- THEME CSS -->
    <link href="{{ asset('presentation/tema/bwi/assets/css/layout.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->
    <link href="{{ asset('presentation/tema/bwi/assets/css/header-1.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('presentation/tema/bwi/assets/css/style.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('presentation/tema/bwi/assets/css/animate.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('presentation/tema/bwi/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('presentation/tema/bwi/assets/css/font-awesome.css') }}">

   

    <script src="{{ asset('presentation/tema/bwi/assets/plugins/fontawesome/fontawesome5.js') }}"></script>
    <script src="{{ asset('presentation/tema/bwi/assets/plugins/jquery/jquery-2.2.3.min.js') }}"></script>

    <link href="{{ asset('presentation/tema/bwi/assets/plugins/slick/css/slick.css') }}" rel="stylesheet"
        type="text/css" />

        
    <link href="{{ asset('presentation/tema/bwi/assets/plugins/slick/css/slick-theme.css') }}" rel="stylesheet"
    type="text/css" />

{{-- 
    
    <link href="{{ asset('presentation/tema/bwi/assets/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet"
    type="text/css" /> --}}

    
    <link href="{{ asset('presentation/tema/bwi/assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet"
    type="text/css" />

    <script src="{{ asset('presentation/tema/bwi/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>


    <!-- tamabhan bootstrap -->
    <style>
    @media (min-width: 992px) {
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
            left: 100%;
            top: -7px;
        }

        .nav-item .submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover {
            background-color: #f1f1f1
        }

        .dropdown-menu>li:hover>.submenu {
            display: block;
        }
    }

    .navbar-expand-lg {
        background: inherit;
    }
    </style>

    <style>
    .offcanvas-header {
        display: none;
    }

    .screen-overlay {
        height: 100%;
        z-index: 30;
        position: fixed;
        top: 0;
        left: 0;
        opacity: 0;
        visibility: hidden;
        background-color: rgba(34, 34, 34, 0.6);
        transition: opacity .2s linear, visibility .1s, width 1s ease-in;
    }

    .screen-overlay.show {
        transition: opacity .5s ease, width 0s;
        opacity: 1;
        width: 100%;
        visibility: visible;
    }

    .offcanvas-header-berita {
        display: none;
    }

    .screen-overlay-berita {
        height: 100%;
        z-index: 31;
        position: fixed;
        top: 0;
        left: 0;
        opacity: 0;
        visibility: hidden;
        background-color: rgba(34, 34, 34, 1);
        transition: opacity .2s linear, visibility .1s, width 1s ease-in;
    }

    .screen-overlay-berita.show {
        transition: opacity .5s ease, width 0s;
        opacity: 1;
        width: 100%;
        visibility: visible;
    }



    @media all and (max-width:992px) {

        .offcanvas-header {
            display: block;
        }

        .mobile-offcanvas {
            visibility: hidden;
            transform: translateX(-100%);
            border-radius: 0;
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 1200;
            width: 90%;
            overflow-y: scroll;
            overflow-x: hidden;
            transition: visibility .2s ease-in-out, transform .2s ease-in-out;

        }

        .mobile-offcanvas.show {
            visibility: visible;
            transform: translateX(0);
            background: black;
            opacity: 0.9;
        }

        .offcanvas-header-berita {
            display: block;
        }

        .mobile-offcanvas-berita {
            visibility: hidden;
            transform: translateX(-100%);
            border-radius: 0;
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 9999;
            width: 90%;
            overflow-y: scroll;
            overflow-x: hidden;
            transition: visibility .2s ease-in-out, transform .2s ease-in-out;

        }

        .mobile-offcanvas-berita.show {
            visibility: visible;
            transform: translateX(0);
            background: black;
            opacity: 1;
            margin-top: 5rem;
            overflow: auto
        }

    }
    </style>

    <style>
    @media (min-width: 992px) {
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
            left: 100%;
            top: -7px;
        }

        .nav-item .submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover {
            background-color: #f1f1f1
        }

        .dropdown-menu>li:hover>.submenu {
            display: block;
        }
    }
    </style>

</head>
<body>

@endsection