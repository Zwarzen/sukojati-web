<div style="">
  <div style="font-size:1.2rem; font-weight:600; margin-bottom:1rem">Video <small
          style="float: right; font-size:0.9rem; line-height:2rem"><a href="{{ route('berita.video') }}">Lainnya </a><i
              class="fas fa-chevron-right" aria-hidden="true"></i> </small>
  </div>

  <div class="row">
      @foreach (['3', '3', '3', '3'] as $item)
          <div class="col-6 col-md-6 col-lg-3">
              <a href="{{ route('berita.video') }}">

                  <div style="overflow:hidden; display:flex; flex-direction:column;  border-radius:15px; background: #ffffff; margin-bottom:1rem;">
                      <div style="
                          border-radius:15px 15px 0px 0px;
                          width:100%;
                          height:150px;
                          background-image: url('https://banyuwangikab.go.id/media/berita/images/0fc1f58a0c064d6abc5364aefce98c19.jpg');
                          background-size:cover; 
                          background-position:center;
                          overflow:hidden;
                          float:right;
                          ">
                          <div
                              style=" padding:0.5rem; font-size:1rem; background: linear-gradient(to right,#33333323,#33333300 ); color:#ffffff">
                              <i class="fas fa-play-circle"></i>
                          </div>

                      </div>
                      <div
                          style="background: #ffffff; padding:1rem; border-radius: 15px 15px 15px 15px ; text-align:left; font-weight:600">
                          Upaya Geopark Ijen Masuk Jaringan Dunia, Bupati Ipuk Ikuti Forum dengan
                          Sekjen UGG
                      </div>

                  </div>
              </a>

          </div>
      @endforeach
  </div>
</div>