<div id="toolbar-p-1" class="">
    <div id="toolbar-p-1-container" class="tools-wrp-bottom-container">
        <div onclick="getListProfile()">
            <div class="tools-wrp-bottom">
                <div class="tool-bottom-wrp-icon">
                    <img class="tool-bottom-icon" title="Profil"
                        src="{{ asset('presentation/b-asset/img/icon-bwimap.png') }}" alt="">
                </div>

                <div class="tool-bottom-text" title="Profil">Profil</div>

            </div>
        </div>


        <div onclick="getListContact()" class="tools-wrp-bottom">
            <div class="tool-bottom-wrp-icon">
                <img class="tool-bottom-icon" title="Kontak"
                    src="{{ asset('presentation/b-asset/img/customer_service.png') }}" alt="">
            </div>

            <div class="tool-bottom-text">Kontak</div>

        </div>

        <div class="tools-wrp-bottom">
            <a href="{{ route('berita') }}">
                <div class="tool-bottom-wrp-icon">
                    <img class="tool-bottom-icon" title="Berita"
                        src="{{ asset('presentation/b-asset/img/news_page.png') }}" alt="">
                </div>

                <div class="tool-bottom-text">Berita</div>
            </a>

        </div>

        <div class="tools-wrp-bottom">
            <a href="https://data.banyuwangikab.go.id/">
                <div class="tool-bottom-wrp-icon">
                    <img class="tool-bottom-icon" title="Satu Data"
                        src="{{ asset('presentation/b-asset/img/satu-data-yellow.png') }}" alt="">
                </div>

                <div class="tool-bottom-text">Satu Data</div>
            </a>

        </div>


        


        <div data-trigger="#navbar_main" class="tools-wrp-bottom">
            <div class="tool-bottom-wrp-icon">
                <img class="tool-bottom-icon" title="Kontak"
                    src="{{ asset('presentation/b-asset/img/icon-menu.png') }}" alt="">
            </div>

            <div class="tool-bottom-text">Lainnya</div>

        </div>


    </div>
</div>
<script>
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
</script>
