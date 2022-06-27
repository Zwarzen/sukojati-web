@php 
          $listApps = [

              [
                  'title' => 'Beranda',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
              ],

              [
                  'title' => 'Ngretren',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
              ],

              [
                  'title' => 'Wisata',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
              ],


              [
                  'title' => 'Kesehatan',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Perencanaan Daerah',
              ],
          
              [
                  'title' => 'Ekonomi',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Transparansi Anggaran Daerah',
              ],
          
              [
                  'title' => 'Budaya',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
              ],

              [
                  'title' => 'Musik',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
              ],

              [
                  'title' => 'Olahraga',
                  'linkTo' => '#',
                  'imgSrc' => asset('presentation/b-asset/img/news_page.png'),
                  'textDesc' => 'Informasi Jaringan dan Dokumentasi Hukum Daerah',
              ],

          ];


      @endphp

      <style>
          .tools-sc-container{
              grid-template-columns: auto auto auto auto auto !important;
          }

          @media all and (max-width:600px){
              .tools-sc-container{
              grid-template-columns: auto auto auto  !important;
          }
          }

      </style>
      
      <div class="">
        <div style="display: flex; padding-top:1rem; padding-bottom:1rem;">
          <div style="flex:1; text-align:center; padding-top:1rem; font-size:1.2rem; cursor: pointer;" class="btn-kanal-left"><i class="fas fa-chevron-left"></i></div>
          <div id="md-kanalmenu" style="flex:10;">
            @foreach ($listApps as $item)
                    <a href="{{ $item['linkTo'] }}">
                        <div class="tool-items">
                            <img class="tool-items-icon" style="font-size:0.5rem; border-radius: 100px; border:4px solid violet;" title="{{ $item['title'] ." - ". $item['textDesc']}}"
                                src="{{ $item['imgSrc'] }}" alt=" {{ ' image '.$item['title'] }}">
                        </div>
  
                        <div class="tool-items-text" title="{{ $item['title'] ." - ". $item['textDesc'] }}">{{ $item['title'] }}</div>
  
                    </a>
            @endforeach
          </div>
          <div style="flex:1; text-align:center; padding-top:1rem; font-size:1.2rem; cursor: pointer;" class="btn-kanal-right"><i class="fas fa-chevron-right"></i></div>
        </div>
        
      </div>

      
      