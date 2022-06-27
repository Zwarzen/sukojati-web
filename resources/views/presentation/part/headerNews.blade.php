@section('header')

    <!DOCTYPE html>
    <!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
    <!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
    <!--[if gt IE 9]><!-->
    <html>
    <!--<![endif]-->

    <head>


        <title>{{ isset($pageTitle) ? $pageTitle : '' }}</title>
        <meta name="description" content="{{ isset($description) ? $description : '' }}" />

        @if(isset($og))
            @foreach ($og as $item => $val)
                <meta property="{{ $val['property'] }}" content="{{ $val['content'] }}" />
            @endforeach
        @endif


        @if(isset($twitter))
            @foreach ($twitter as $item => $val)
                <meta name="{{ $val['name'] }}" content="{{ $val['content'] }}" />
            @endforeach
        @endif


        <meta name="keywords" content="{{ isset($keywords) ? $keywords : '' }}" />
        <meta name="Author" content="Pemerintah Kabupaten Banyuwangi" />
        <meta name="theme-color" content="#84db94">
        <meta charset="utf-8" />




        
        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- WEB FONTS : use %7C instead of | (pipe) -->
        <link rel="shortcut icon" href="{{ asset('presentation/b-asset/img/logo_bwi_small.png') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('srcadmin/x-assets/fonts/fontawesome5/css/all.css') }}" /> --}}
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700"
            rel="stylesheet" type="text/css" />

        <!-- sweetalert CSS -->
        <script src="{{ asset('srcadmin/b-assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>

        <!-- CORE CSS -->

        <link rel="stylesheet" href="{{ asset('srcadmin/b-assets/lib/bootstrap/dist/css/bootstrap.min.css') }}"
            type="text/css" />
            
        {{-- <link rel="stylesheet" href="{{ asset('presentation/b-asset/css/bwidev.css') }}" type="text/css" /> --}}
        <link rel="stylesheet" href="{{ asset('presentation/b-asset/css/portal.css') }}" type="text/css" />
        {{-- <link rel="stylesheet" href="{{ asset('presentation/b-asset/css/timeline.css')}}" type="text/css" /> --}}

        <!-- THEME CSS -->
        {{-- <link href="{{ asset('presentation/tema/bwi/assets/css/layout.css') }}" rel="stylesheet"
        type="text/css" /> --}}

        <!-- PAGE LEVEL SCRIPTS -->
        {{-- <link href="{{ asset('presentation/tema/bwi/assets/css/header-1.css') }}" rel="stylesheet"
        type="text/css" />
        <link href="{{ asset('presentation/tema/bwi/assets/css/style.css') }}" rel="stylesheet"
        type="text/css" />
        <link href="{{ asset('presentation/tema/bwi/assets/css/animate.css') }}" rel="stylesheet"
        type="text/css" /> --}}

        <link rel="stylesheet" type="text/css"
            href="{{ asset('presentation/tema/bwi/assets/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('presentation/tema/bwi/assets/css/font-awesome.css') }}">



        <script src="{{ asset('presentation/tema/bwi/assets/plugins/fontawesome/fontawesome5.js') }}"></script>
        <script src="{{ asset('presentation/tema/bwi/assets/plugins/jquery/jquery-2.2.3.min.js') }}"></script>

        

        <link href="{{ asset('presentation/tema/bwi/assets/plugins/slick/css/slick.css') }}" rel="stylesheet"
            type="text/css" /> 
        
            <link href="{{ asset('presentation/tema/bwi/assets/plugins/slick/css/slick-theme.css') }}" rel="stylesheet"
        type="text/css" /> 

            {{-- <link href="{{ asset('presentation/tema/bwi/assets/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet"
        type="text/css" /> --}}

            <link href="{{ asset('presentation/tema/bwi/assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet"
        type="text/css" />

        <script src="{{ asset('presentation/tema/bwi/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>




        <link href="{{ asset('presentation/tema/bwi/assets/plugins/splide/css/splide.min.css') }}" rel="stylesheet"
        type="text/css" /> 

        <script src="{{ asset('presentation/tema/bwi/assets/plugins/splide/js/splide.min.js') }}"></script>


        <!-- tamabhan bootstrap -->
     

    </head>

    <body>

    @endsection
