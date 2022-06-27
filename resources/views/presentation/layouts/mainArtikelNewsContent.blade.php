@extends('presentation.layouts.mainNewsContent')

    @section('navigation')
    <header>

        


        <nav>
            @include('presentation.module.berita.navBerita')
            @include('presentation.module.home.portal.navSearch')
            @include('presentation.module.berita.navBeritaMenu')
            @include('presentation.module.home.portal.navBasedModal')
        </nav>
        
    </header>
    @endsection


    @section('pageContent')

    
    <main>
        <div id="ctn-utama" class="based-div-1">
            <div style="
                    background:linear-gradient(10deg, #ffffff,  #ffffff, #ffffff); 
                    opacity:0.9; content:'';  
                    position:absolute; top:0; bottom:0px; left:0px; right:0px; width:100%; ">
            </div>


            {{-- bottom tools --}}

            <div id="main-content"
                style="padding-bottom:25vh; opacity: 1; z-index:1; position: relative; max-height:100vh; overflow-y:auto; overflow-x:hidden;"
                class="scroller">


                <div class="xcontainer" id="p-1">


                    @yield('pageContentArtikel')

                    <!-- Load Facebook SDK for JavaScript -->


                    <!-- Your share button code -->

                    <div class="container">
                    <div><strong>Bagikan Artikel :</strong></div> <br>
                    <div style="display: inline-block; align-items:flex-start">
                        <div style="display:inline-block; float:left; margin:5px" class="fb-share-button"
                            data-href="{{ Request::url() }}" data-layout="button_count">
                        </div>
                        <div style="display:inline-block; float:left; margin:5px">
                            <a href="whatsapp://send?text={{ Request::url() }}" data-action="share/whatsapp/share"><i
                                    class="fab fa-whatsapp"></i></a>
                        </div>

                        <div onclick="copyToClipboard()" style="display:inline-block; float:left; margin:5px">
                            <input type="text" hidden id="id_share_this_link" value="{{ Request::url() }}">
                            <a data-action="share/whatsapp/share"><i class="fas fa-copy"></i></a>
                        </div>

                    </div>
                </div>

                </div>

            </div>

        </div>

    </main>
    @endsection


    @section('footer')
    <footer>
        @include('presentation.part.toolbarMain')

        {{-- <div class="bottom-based-tools-wrp" style="bottom: 0px !important">
            <div style="text-align: center; color:#000000fa; font-size:0.9rem;">
                &copy; {{ date('Y') }} Kami Melayani Sepenuh <i class="fas fa-heart"></i>
            </div>
        </div> --}}

        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <script>
            function copyToClipboard() {
                var copyText = $("#id_share_this_link");

                copyText.select(); // Selects the text inside the input
                document.execCommand('copy'); // Simply copies the selected text to clipboard 
                alert("Berhasil copy text")
                //  Swal.fire({         //displays a pop up with sweetalert
                //     icon: 'success',
                //     title: 'Text copied to clipboard',
                //     showConfirmButton: false,
                //     timer: 1000
                // });

            }


            function getListContact() {


                showBasedModal()
                $.ajax({
                    type: 'GET',
                    url: APP_URL + '/portal/list-kontak',
                    dataType: "html",
                    success: function(html) {
                        $("#navbar_based_modal_content").html(html);

                    },
                    error: function(err) {
                        $("#navbar_based_modal_content").html(
                            `<div style="text-align:center; font-size:1.5rem">Upss.. Maaf telah terjadi kendala saat menyiapkan data, saat ini konten belum bisa ditampilkan <br> Silakan dicoba kembali</div>`
                        );
                        console.log(err)
                    }
                })
            }

            function getListProfile() {


                showBasedModal()
                $.ajax({
                    type: 'GET',
                    url: APP_URL + '/portal/list-profile',
                    dataType: "html",
                    success: function(html) {
                        $("#navbar_based_modal_content").html(html);

                    },
                    error: function(err) {
                        $("#navbar_based_modal_content").html(
                            `<div style="text-align:center; font-size:1.5rem">Upss.. Maaf telah terjadi kendala saat menyiapkan data, saat ini konten belum bisa ditampilkan <br> Silakan dicoba kembali</div>`
                        );
                        console.log(err)
                    }
                })
            }




            $(() => {
                
                $('#topNav').addClass("show-element");
                $('#topNav').removeClass("hide-element");

                $("#toolbar-p-1").addClass("hide-element")
                

                var lastScrollTop = 0;
                var isClikedBtnJelajah = false;

               


                $("#main-content").scroll(function(e) {
                    var scrollTop = $(this).scrollTop()

                    if (scrollTop > 300) {
                        console.log(scrollTop)

                        // $('#topNav,#toolbar-bottom','').addClass("show-element");
                        // $('#topNav,#toolbar-bottom').removeClass("hide-element");
                        // $("#toolbar-p-1").addClass("bottom-based-tools-wrp")
                        // $("#toolbar-p-1-container").removeClass("bg-transparant");

                        if (scrollTop > 300 && scrollTop < 350) {
                            if (lastScrollTop < scrollTop && isClikedBtnJelajah == false) {

                            }
                        }

                        setTimeout(() => {
                            isClikedBtnJelajah = false
                        }, 200);

                    } else {



                        // $("#toolbar-p-1").removeClass("bottom-based-tools-wrp")
                        // $("#toolbar-p-1-container").addClass("bg-transparant");


                        // $('#topNav,#toolbar-bottom').removeClass("show-element");
                        // $('#topNav,#toolbar-bottom').addClass("hide-element");

                        isClikedBtnJelajah == false
                    }

                    lastScrollTop = $(this).scrollTop()

                });

            })
        </script>

        
    </footer>


    @parent
    @endsection

