<div class="col-lg-12 col-md-12">

  <style>
      .md-nlstmenu-wrp {
          display: flex;
          flex-direction: row;
          width: 100%;
      }

      .pills {
          text-align: center;
          margin: 5px;
          border-radius: 10px;
          background: #f8f8f8;
          padding: 5px 15px 5px 15px;
          color: #03b5d4;
          border: 2px solid #03b5d4;
          font-size: 0.8rem;
          min-width: 5rem;
      }

      .md-nlstmenu-wrp>.btn-left,
      .btn-right {

          width: 100%;
          text-align: center;
          align-items: center;
          align-content: center;


      }

      .btn-left,
      .btn-right {
          text-align: center !important;
          align-items: center !important;
          align-content: center !important;
          cursor: pointer;
      }

      .btn-left,
      .btn-right>i {
          color: #03b5d4;
          line-height: 20px !important;
      }

      .md-nlstmenu {
          width: 100%;
      }

  </style>


  {{-- <div class="btn-left"><i
      style="margin: auto; vertical-align:middle; align-self:center !important;"
      class="fas fa-chevron-up"></i></div> --}}

  <div class="md-nlstmenu-wrp">
      <div id="md-nlstmenu" class="md-nlstmenu"
          style="background: transparent !important">
          <a target="_blank"
              href="https://banyuwangikab.go.id/berita-daerah/akhir-pekan-ini-banyuwangi-gelar-moslem-fashion-festival-di-dermaga-yacht-marina-boom.html">
              <div
                  style="width: 100%; display: flex; flex-direction:row; padding:0.5rem; background: #ffffff5b; opacity:0.9;border-radius:15px;">

                  <div style="flex:1; padding-right:1rem;">
                      <div style="text-align: left; font-size:1rem">
                          @php
                          $title = 'Akhir Pekan Ini, Banyuwangi Gelar Moslem Fashion Festival di Dermaga Yacht Marina Boom'; @endphp
                          <strong>{{ $title }}</strong>

                      </div>
                      <div
                          style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                          <div
                              style="width: 90%; height:0.1rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem">
                          </div>
                      </div>

                      <div style="height: 0.5rem"></div>
                      <div style="text-align:left; font-size:0.7rem;">
                          @php
                              $a = "BANYUWANGI – Sektor ekonomi kreatif di Banyuwangi terus bergeliat 
                                                                                                                                                                                                                                                                                                                                                      untuk mendorong pemulihan ekonomi. Akhir pekan ini, Sabtu 23 Oktober 2021, Pemkab Banyuwangi
                                                                                                                                                                                                                                                                                                                                                      berkolaborasi dengan Bank Indonesia (BI) menggelar Moslem Fashion Festival (MFF),
                                                                                                                                                                                                                                                                                                                                                      sebuah pergelaran busana muslim di dermaga yacht Pantai Marina Boom.";
                              if (strlen($title) > 70) {
                                  $b = substr($a, strpos($a, '--') + 0, 70) . ' ...';
                              } else {
                                  $b = substr($a, strpos($a, '--') + 0, 100);
                              }
                              
                          @endphp

                          {{ $b }}

                      </div>


                  </div>


                  <div
                      style="height: 7rem; width:7rem; border-radius:1rem;   
                                                      background-image: url('{{ asset('presentation/b-asset/img/festival_muslim.jpg') }}');
                                                      background-size:100% 100%;
                                                      background-position:center center; ">
                  </div>
              </div>
          </a>

          <a target="_blank"
              href="https://banyuwangikab.go.id/berita-daerah/upaya-geopark-ijen-masuk-jaringan-dunia-bupati-ipuk-ikuti-forum-dengan-sekjen-ugg.html">
              <div
                  style="width: 100%; display: flex; flex-direction:row; padding:0.5rem;  box-shadow: 0 1px 20px rgb(0 0 0 / 0.1); background:#ffffff54; border-radius:20px;">

                  <div style="flex:1; padding-right:1rem;">
                      <div style="text-align: left; font-size:1rem">
                          @php
                          $title = 'Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan Sekjen UGG'; @endphp
                          <strong>{{ $title }}</strong>

                      </div>
                      <div
                          style="width: 100%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                          <div
                              style="width: 90%; height:0.1rem; !important;  background:#03b5d4; text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem">
                          </div>
                      </div>

                      <div style="height: 0.5rem"></div>
                      <div style="text-align:left; font-size:0.7rem;">
                          @php
                              $a = 'BANYUWANGI –  Upaya menyukseskan Geopark Ijen yang telah diusulkan menjadi UNESCO Global Geopark (UGG) alias jaringan geoparak dunia terus dilakukan. Dalam rangka persiapan assessment aspiring (penilaian calon) UGG, Kementerian Perencanaan Pembangunan Nasional (PPN)/Bappenas menggelar Virtual Advisory Mission (VAM) yang disupervisi langsung oleh Sekretaris Jenderal UNESCO Global Geopark Network, Guy Martini.';
                              if (strlen($title) > 70) {
                                  $b = substr($a, strpos($a, '--') + 0, 70) . ' ...';
                              } else {
                                  $b = substr($a, strpos($a, '--') + 0, 100);
                              }
                              
                          @endphp

                          {{ $b }}

                      </div>


                  </div>


                  <div
                      style="height: 7rem; width:7rem; border-radius:1rem;   
                          background-image: url('https://banyuwangikab.go.id/media/berita/images/9dc1abc5cea09403df9c31f143618649.jpg');
                          background-size:100% 100%;
                          background-position:center center; ">
                  </div>
              </div>
          </a>

      </div>



  </div>

</div>