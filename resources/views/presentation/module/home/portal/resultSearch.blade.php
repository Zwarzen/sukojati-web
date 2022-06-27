<style>
    .search-item-container {
        display: flex;
        flex-direction: row;
        padding: 0.5rem;
        box-shadow: 0 1px 20px rgb(0 0 0 / 0.1);
        background: #ffffff54;
        border-radius: 10px;
        width: 80%;
        align-self: center;
        margin: auto;
    }

    .search-item-text {
        flex: 1;
        padding-left: 1rem;
    }

    .search-item-text-title {
        text-align: left;
        font-size: 1.2rem;
        color: #047e94
    }

    .search-item-text-desc {
        text-align: left;
        font-size: 0.8rem;
    }

    @media all and (max-width:600px) {
        .search-item-container {
            display: flex;
            flex-direction: row;
            padding: 0.5rem;
            box-shadow: 0 1px 20px rgb(0 0 0 / 0.1);
            background: #ffffff54;
            border-radius: 10px;
            width: 100%;
        }

        .search-item-text {
            flex: 1;
            padding-left: 1rem;
        }

        .search-item-text-title {
            text-align: left;
            font-size: 1rem;
            color: #047e94
        }

        .search-item-text-desc {
            text-align: left;
            font-size: 0.7rem;
        }


    }

</style>

<ul class="navbar-nav ml-auto">


  @foreach ($listSearch as $item => $val)

      <li class="nav-item">
          <a class="nav-link" target="_blank" href="{{ route("berita").'/'.$val->alias  }}">
              <div class="search-item-container">

                  <div style="height: 4rem; width:4rem; border-radius:10px;   
                      background-image: url('https://banyuwangikab.go.id/media/berita/images/{{ $val->images }}');
                      background-size:100% 100%;
                      background-position:center center; ">
                  </div>

                  <div class="search-item-text">
                      <div class="search-item-text-title">
                          <strong>{{ $val->title }}</strong>

                      </div>
                      {{-- <div style="width: 90%; padding:0px; background:#ececec; border-radius:0px 10px 10px 0px;">
                  <div style="width: 100%; background:#868686; height:0.1rem; !important;   text-align:center; color:#ffffff; line-height:1rem; font-size:0.6rem"></div>
              </div> --}}

                      <div style="height: 0.5rem"></div>
                      <div class="search-item-text-desc">
                          {{ $val->title }}
                      </div>
                  </div>
              </div>

          </a>
      </li>
  @endforeach

</ul>