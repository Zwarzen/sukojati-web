@section('header')
  @include('presentation.part.header')
@show

@yield('navigation')

@yield('content')

@section('footer')
  @include('presentation.part.footer')
@show

