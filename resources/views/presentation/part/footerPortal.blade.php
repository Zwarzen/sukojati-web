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


    <script type="text/javascript" src="{{ asset('srcadmin/b-assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
    </script>


    <script src="{{ asset('presentation/tema/bwi/assets/plugins/slick/js/slick.min.js') }}"></script>

    {{-- <script type="text/javascript" src="code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="code.jquery.com/jquery-migrate-1.2.1.min.js"></script> --}}
    {{-- <script type="text/javascript" src="slick/slick.min.js"></script> --}}

    <script>
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
        <script src="{{ asset('srcadmin/x-assets/plugins/form-select2/select2.min.js') }}"></script>




    <!-- Menu boostrap 4 -->
    <script>

        

        function showBasedModal(){
            $("#navbar_based_modal").removeClass("show");
            setTimeout(() => {
                $('#ctn-utama, #topNav, .based-div-1, .bottom-based-tools-wrp').addClass("enableBlur");
                $('#ctn-utama, #topNav, .based-div-1, .bottom-based-tools-wrp').removeClass("disableBlur");
                $("#navbar_based_modal_content").html(`<center> <span style="color:#0888af" class="fas fa-spinner fa-pulse fa-32 text-center"> </span>  <div>Sedang menyiapkan data... </div> </center>`);
                setTimeout(() => {
                    $("#navbar_based_modal").toggleClass("show");
                }, 50);
            }, 50);
            
        }


        $(() => {



            // make it as accordion for smaller screens
            if ($(window).width() > 100) {
                $('.dropdown-menu a').click(function(e) {
                    e.preventDefault();
                    if ($(this).next('.submenu').length) {
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function() {
                        $(this).find('.submenu').hide();
                    })
                });

                //mobile out of canvas
                $("[data-trigger]").on("click", function(e) {
                    console.log("showing element ...")
                    e.preventDefault();
                    e.stopPropagation();

                    $("*").removeClass("show");
                    $("body").removeClass("offcanvas-active");

                    var offcanvas_id = $(this).attr('data-trigger');

                    $('#ctn-utama, #topNav, .based-div-1, .bottom-based-tools-wrp').addClass("enableBlur");
                    $('#ctn-utama, #topNav, .based-div-1, .bottom-based-tools-wrp').removeClass("disableBlur");


                    $(".screen-overlay").toggleClass("show");

                    setTimeout(() => {
                        $(offcanvas_id).toggleClass("show");
                    }, 100);


                    if (offcanvas_id == "#navbar_main_search") {
                        setTimeout(() => {
                            // $("#search-input-form").focus()
                        }, 100);

                    }
                });


                $(".btn-close, .screen-overlay").click(function(e) { 
                    $(".screen-overlay").removeClass("show");
                        $(".mobile-offcanvas").removeClass("show");
                        $("#navbar_based_modal_content").html(``) 

                    
                    setTimeout(() => {
                        $('#ctn-utama,#topNav, .based-div-1, .bottom-based-tools-wrp').removeClass("enableBlur");
                    $('#ctn-utama,#topNav, .based-div-1, .bottom-based-tools-wrp').removeClass("disableBlur");
                    }, 100);
                    
                    
                });


                $(".mobile-offcanvas").click(function(e) { 
                    if(e.target.className == "must-close mobile-offcanvas show"){
                        $(".screen-overlay").removeClass("show");
                            $(".mobile-offcanvas").removeClass("show");
                            $("#navbar_based_modal_content").html(``)

                        
                        setTimeout(() => {
                            $('#ctn-utama,#topNav, .based-div-1, .bottom-based-tools-wrp').removeClass("enableBlur");
                        $('#ctn-utama,#topNav, .based-div-1, .bottom-based-tools-wrp').removeClass("disableBlur");
                        }, 100);
                        
                    }

                });

            }


            console.log($("body"))

            $("body").on('scroll',()=>{ console.log(" on scrolll body ") })


        })
    </script>



    </body>

    </html>


@endsection
