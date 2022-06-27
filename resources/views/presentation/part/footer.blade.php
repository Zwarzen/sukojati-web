@section('footer')
<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>
<!-- JAVASCRIPT FILES -->



<script>
    var plugin_path = "{{ url('') }}/presentation/tema/bwi/assets/plugins/"
</script>


<script type="text/javascript" src="{{ asset('presentation/tema/bwi/assets/js/scripts.js') }}">
</script>
<script src="{{ asset('presentation/tema/bwi/app.js') }}"></script>


<script  type="text/javascript" src="{{ asset('srcadmin/b-assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}" >
</script>


<script src="{{ asset('presentation/tema/bwi/assets/plugins/slick/js/slick.min.js') }}"></script>





<!-- Menu boostrap 4 -->
<script>
// $(document).on('click', '.dropdown-menu', function(e) {
//     e.stopPropagation();
// });

// make it as accordion for smaller screens
if ($(window).width() < 992) {
    // $('.dropdown-menu').click(function(e) {
    //     console.log(e)
    //     e.preventDefault();
    //     if ($(this).next('.submenu').length) {
    //         $(this).next('.submenu').toggle();
    //     }
    //     $('.dropdown').on('hide.bs.dropdown', function() {
    //         $(this).find('.submenu').hide();
    //     })
    // });

    //mobile out of canvas
    $("[data-trigger]").on("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        var offcanvas_id = $(this).attr('data-trigger');
        $(offcanvas_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
        $(".screen-overlay").toggleClass("show");
    });

    $(".btn-close, .screen-overlay").click(function(e) {
        $(".screen-overlay").removeClass("show");
        $(".mobile-offcanvas").removeClass("show");
        $("body").removeClass("offcanvas-active");
    });

    //mobile out of canvasberita
    $("[data-trigger-berita]").on("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        var offcanvas_id = $(this).attr('data-trigger-berita');
        $(offcanvas_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
        $(".screen-overlay-berita").toggleClass("show");
    });

    $(".close-berita, .screen-overlay-berita").click(function(e) {
        $(".screen-overlay-berita").removeClass("show");
        $(".mobile-offcanvas-berita").removeClass("show");
        $("body").removeClass("offcanvas-active");
    });


}
</script>



</body>

</html>


@endsection
