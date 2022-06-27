@section('header')
@include('admin.part.header')

@show

@section('sidebar')
@include('admin.part.sidebar')

@show



@yield('content')

@section('footer')
@include('admin.part.footer')
@show

