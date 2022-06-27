@section('header')

<!DOCTYPE html>
<html lang="en">



    @php

    $opdProfile = isset($opd) ? $opd : $opdViaServicesProvider;
    @endphp


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('srcadmin/b-assets/img/logo_bwi.png') }}">
    <title>Dashboard {{ $opdProfile->alias }} </title>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('srcadmin/b-assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('srcadmin/b-assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('srcadmin/x-assets/fonts/fontawesome5/css/all.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('srcadmin/b-assets/css/mlndev.css') }}" />
    <!-- CORE CSS -->
    <link href="{{ asset('srcadmin/b-assets/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{ asset('srcadmin/b-assets/css/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('srcadmin/b-assets/css/dropzone.css') }}" type="text/css" />
    <!-- <link rel="stylesheet" href="{{ asset('srcadmin/b-assets/css/sweetalert2.min.css') }}" type="text/css" /> -->
    <script src="{{ asset('srcadmin/b-assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('srcadmin/b-assets/js/sweetalert2.js') }}" type="text/javascript"></script> -->
    <!-- <script src="{{ asset('assets/') }}b-assets/lib/sweetalert/sweetalert2.polyfill.js" type="text/javascript"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('srcadmin/x-assets/plugins/form-select2/select2.css') }}" type="text/css" />

    <!-- include summernote css -->
    <link href=" {{ asset('srcadmin/b-assets/lib/summernote/0_8_18/summernote-bs4.min.css') }}" rel="stylesheet">



    <!-- include datatable css-->
    <link href=" {{ asset('srcadmin/b-assets/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- include datetimepicker css -->
    <link href=" {{ asset('srcadmin/x-assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet">

    <!-- include orgchart -->
    <link rel="stylesheet" href=" {{ asset('srcadmin/b-assets/lib/orgchart/css/orgchart.min.css') }}" />


    <style>
        .title-teks-sub-a {
            color: #187534;
            font-size: 14px !important;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            margin-bottom: 5px !important;
        }

        .title-teks-sub-b {
            font-size: 12px !important;
            /* color: #531875; */
            color: #187534;
        }
        </style>

</head>



<body>
    <div class="be-wrapper be-collapsible-sidebar ">
        <nav class="navbar navbar-expand fixed-top be-top-header">
            <div class="container-fluid">
                <div class="be-navbar-header">
                    <a class="" style="width:100%; padding:0.5rem;" href=" {{ url('/admin') }}">
                        <div style="display: flex; flex-direction:row;">
                            <img src="{{  asset('srcadmin/b-assets/img/logo_bwi.png')  }}" class="logo-beranda-img">
                            <div id="title-teks" class="logo-beranda">
                                <span style="color:black">
                                    <span class="title-teks-sub-a">{{ $opdProfile->alias }}</span><br>

                                    <span class="title-teks-sub-b">Panel</span>
                                </span>
                            </div>

                        </div>

                    </a>
                    <a class="be-toggle-left-sidebar" href="#"><span class="icon mdi mdi-menu"></span></a>
                </div>
                <div class="be-right-navbar">
                    <ul class="nav navbar-nav float-right be-user-nav">
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                aria-expanded="false">

                                @if(empty($user->user_img))
                                <img src="{{ asset('srcadmin/b-assets/img/avatar.png') }}" alt="Avatar">
								@else
                                <img src="{{ asset('assets/uploads/'.$user->user_img) }}"
                                    class="img-responsive img-circle" width="200" height="200" alt="">
                                @endif

                                <span class="user-name">  {{ !empty($user)?$user->username :'' }} </span>
                            </a> -->
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                aria-expanded="false">


                                @if(empty($user->user_img))
                                <img src="{{ asset('srcadmin/b-assets/img/avatar.png') }}" alt="Avatar">
								@else
                                <img src="{{ asset('assets/uploads/'.$user->user_img) }}"
                                    class="img-responsive img-circle" width="200" height="200" alt="">
                                @endif


                                <span class="user-name">    {{  Auth::check()? Auth::user()->username  :''}} </span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <div class="user-info">
                                <div class="user-name">   {{  Auth::check()? Auth::user()->username  :''}} </div>
                                    <div class="user-position online">Available</div>
                                </div>

                                <a class="dropdown-item" href="{{ route('admin.users.profile.setting', Auth::user()->id)  }}">
                                    <span class="icon mdi mdi-settings"></span>Settings
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span class="icon mdi mdi-power"></span>{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf


                                </form>
                                <!-- <a class="dropdown-item" href=" route('users/auth/logout') ?>">
                                    <span class="icon mdi mdi-power"></span>Logout
                                </a> -->
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right be-icons-nav">
                        <!-- <li class="nav-item dropdown"><a class="nav-link be-toggle-right-sidebar" href="#" role="button"
                                aria-expanded="false"><span class="icon mdi mdi-settings"></span></a></li> -->
                        <!-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown" role="button" aria-expanded="false"><span
                                    class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                            <ul class="dropdown-menu be-notifications">
                                <li>
                                    <div class="title">Notifications<span class="badge badge-pill">3</span></div>
                                    <div class="list">
                                        <div class="be-scroller-notifications">
                                            <div class="content">
                                                <ul>
                                                    <li class="notification notification-unread"><a href="#">
                                                            <div class="image"><img
                                                                    src="{{ asset('assets/') }}b-assets/img/avatar2.png"
                                                                    alt="Avatar"></div>
                                                            <div class="notification-info">
                                                                <div class="text"><span class="user-name">aa</span> bb.
                                                                </div><span class="date">2 min ago</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown" role="button" aria-expanded="false"><span
                                    class="icon mdi mdi-apps"></span></a>
                            <ul class="dropdown-menu be-connections">
                                <li>
                                    <div class="list">
                                        <div class="content">
                                            <div class="row">
                                                <div class="col"><a class="connection-item" href="#"><img
                                                            src="{{ asset('assets/') }}b-assets/img/github.png"
                                                            alt="Github"><span>GitHub</span></a></div>
                                                <div class="col"><a class="connection-item" href="#"><img
                                                            src="{{ asset('assets/') }}b-assets/img/bitbucket.png"
                                                            alt="Bitbucket"><span>Bitbucket</span></a></div>
                                                <div class="col"><a class="connection-item" href="#"><img
                                                            src="{{ asset('assets/') }}b-assets/img/slack.png"
                                                            alt="Slack"><span>Slack</span></a></div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><a class="connection-item" href="#"><img
                                                            src="{{ asset('assets/') }}b-assets/img/dribbble.png"
                                                            alt="Dribbble"><span>Dribbble</span></a></div>
                                                <div class="col"><a class="connection-item" href="#"><img
                                                            src="{{ asset('assets/') }}b-assets/img/mail_chimp.png"
                                                            alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                                <div class="col"><a class="connection-item" href="#"><img
                                                            src="{{ asset('assets/') }}b-assets/img/dropbox.png"
                                                            alt="Dropbox"><span>Dropbox</span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer"> <a href="#">More</a></div>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

@endsection
