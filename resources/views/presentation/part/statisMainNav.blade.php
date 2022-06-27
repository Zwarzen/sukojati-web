<div id="header" class="sticky dark header-md translucent noborder clearfix">
    <!-- <div class="headline-main-header">
					<div class="container align-items-center justify-content-center text-center">
						<a href='#'>
							<span style="color:white;"> 
								<strong>super headline, contoh: pencegahan Corona virus telah dilakukan Pemkab banyuwangi</strong> 
							</span>
						</a>
					</div>
				</div> -->

    <!-- TOP NAV -->
    <header id="topNav">
        <div class="container-fluid">
            <!-- add .full-container for fullwidth -->
            <nav class="navbar navbar-expand-lg ">

                <b class="screen-overlay"></b>
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <div style="display: flex; flex-direction:row;">
                        <img src="<?= base_url().'public/b-asset/img/dprd_logo.png'?>" class="logo-beranda-img">
                        <div id="title-teks" class="logo-beranda">
                            <span class="title-teks-sub-a">BANYUWANGI.GO.ID</span>
                            <span class="title-teks-sub-b">Kabupaten Banyuwangi</span>
                        </div>
                    </div>
                </a>
                <button data-trigger="#navbar_main"
                    class="btn btn-default d-lg-none navbar-nav ml-auto a-nav navbar-dark"> <i
                        class="fas fa-ellipsis-v"></i> </button>

                <nav id="navbar_main" class="ml-auto mobile-offcanvas navbar navbar-expand-lg navbar-dark ">
                    <div class="offcanvas-header">
                        <button class="btn float-right btn-close a-nav"><i class="fas fa-times"></i> </button>
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <div style="display: flex; flex-direction:row;">
                                <img src="<?= base_url().'public/b-asset/img/dprd_logo.png'?>" class="logo-beranda-img">
                                <div id="title-teks" class="logo-beranda">
                                    <span class="title-teks-sub-a">SIPRADA DPRD BANYUWANGI</span>
                                    <span class="title-teks-sub-b">Kabupaten Banyuwangi</span>
                                </div>
                            </div>
                        </a>

                    </div>


                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item dropdown a-nav">
                            <a class="nav-link dropdown-toggle a-nav " href="#" data-toggle="dropdown">  First level 3  </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Second level 1 </a></li>
                            <li><a class="dropdown-item" href="#"> Second level 2 &raquo </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="fdfsdf"> Third level 1</a></li>
                                    <li><a class="dropdown-item" href="sdfsdf"> Third level 2</a></li>
                                    <li><a class="dropdown-item" href="sdfsd"> Third level 3 &raquo </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="sdfsd"> Fourth level 1</a></li>
                                        <li><a class="dropdown-item" href="sdfds"> Fourth level 2</a></li>
                                    </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="sdfs"> Second level  4</a></li>
                                    <li><a class="dropdown-item" href="sdfsdf"> Second level  5</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                            <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
                            </ul>
                        </li> -->

                        

                        <?php


                            $dtMenuMain  = list_page(["a.is_private"=>'0']); 
                            

							function getCMainMenu($dtMenuMain,$p) {
								$r = array();
								foreach($dtMenuMain as $row) {
								if ($row->parent_id ==$p) {
									$row->child = getCMainMenu($dtMenuMain,$row->id);
									$r[$row->id] = $row;
								}
								}
								return $r;
							}
							
							$nav = getCMainMenu($dtMenuMain,0);

                            function mylMainSubMenu($nn){
                                foreach($nn as $k => $row){
                                    if(count($row->child)>0){
                                        echo '<li> 
                                        <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"> 
                                        '.$row->nama.'
                                        </a>';
                                            echo ' <ul title="'.$row->keterangan.'" 
                                            class="submenu submenu-left dropdown-menu" >';
                                            mylMainSubMenu($row->child);
                                            echo '</ul>';
                                        

										echo "</li>";
									}else{
                                        myLMainMenu($row->child);
                                    }
                                }
                            }


							function myLMainMenu($n,$sub = null){
								
								foreach($n as $k => $row){
									$fontweight = count($row->child)>0? 'bold' : $row->parent_id==0? 'bold':'normal';
									$parent = count($row->child)>0? "xparent":null;
									$active = (uri_string() == $row->url ? 'xactive' : '');

									if(count($row->child)>0){

                                        if($row->parent_id != 0){
                                            if($sub!=null){
                                                echo '<li> 
                                                <a class="dropdown-item dropdown-toggle" href="#"> 
                                                '.$row->nama.'
                                                </a>';
                                                    echo ' <ul title="'.$row->keterangan.'" 
                                                    class="submenu submenu-left dropdown-menu" >';
                                                    myLMainMenu($row->child,"submenu");
                                                    echo '</ul>';
                                                

                                                echo "</li>";
                                            }else{
                                                echo '<li> 
                                                <a class="dropdown-item dropdown-toggle" href="#"> 
                                                '.$row->nama.'
                                                </a>';
                                                    echo ' <ul title="'.$row->keterangan.'" 
                                                    class="submenu submenu-left dropdown-menu" >';
                                                    myLMainMenu($row->child,"submenu");
                                                    echo '</ul>';
                                                

                                                echo "</li>";
                                            }
                                        }else{
                                            echo '<li class="nav-item dropdown"> 
                                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> 
                                            '.$row->nama.'
                                            </a>';
                                                echo ' <ul title="'.$row->keterangan.'" 
                                                class="dropdown-menu dropdown-menu-right" >';
                                                myLMainMenu($row->child);
                                                echo '</ul>';
                                            

                                            echo "</li>";
                                        }
                                        
                                        
									}
									
									else{
										if(count($row->child)==0 && $row->parent_id ==0  ){
                                            if($row->is_statis == 1){
                                                $base = base_url(). $row->url."/".$row->slug;
                                            }else{
                                                $base = base_url(). $row->url;
                                            }
											echo '<li  class=" nav-item  "> 
                                            <a title="'.$row->keterangan.'"  
                                            href="'.$base.'"
                                            onclick="loc(\''.$base.'\')"
                                             class="nav-link">
                                             '.$row->nama.'
                                             </a> </li>';
                                        
										}else{
                                            if($row->is_statis == 1){
                                                $base = base_url(). $row->url."/".$row->slug;
                                            }else{
                                                $base = base_url(). $row->url;
                                            }


											echo '<li class=" nav-item  ">
                                            <a class="dropdown-item" title="'.$row->keterangan.'" 
                                            href="'.$base.'"
                                            onclick="loc(\''.$base.'\')"
                                            class="nav-link">
											'.$row->nama.' 
											</a>';
											echo "</li>";

										}
									}
								};
							}
					
							myLMainMenu($nav);
						
						
						?>


                        <!-- <li class="nav-item dropdown a-nav">
                                <a class="nav-link dropdown-toggle a-nav " href="#" id="tentangDprd"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tentang
                                </a>
                                <div class="dropdown-menu fade-up" aria-labelledby="tentangDprd">
                                    <a class="dropdown-item" href="tentang/sejarah">
                                    </a>
                                    <a class="dropdown-item" href="tentang/tatib">Tata tertib</a>
                                    <a class="dropdown-item" href="tentang/keanggotaan">Keanggotaan</a>
                                    <a class="dropdown-item" href="tentang/Sekretariat">Sekretariat</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown a-nav">
                                <a class="nav-link dropdown-toggle a-nav " href="#" id="alatKelengkapan"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Alat Kelengkapan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="alatKelengkapan">
                                    <a class="dropdown-item" href="#">Pimpinan DPRD</a>
                                    <a class="dropdown-item" href="#">Badan Musyawarah</a>
                                    <a class="dropdown-item" href="#">Badan Kehormatan</a>
                                    <a class="dropdown-item" href="#">Badan Anggaran</a>
                                    <a class="dropdown-item" href="#">Bapemperda</a>
                                    <a class="dropdown-item" href="#">Komisi</a>
                                </div>
                            </li>


                            <li class="nav-item dropdown a-nav">
                                <a class="nav-link dropdown-toggle a-nav " href="#" id="anggotaDprd"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Anggota
                                </a>
                                <div class="dropdown-menu" aria-labelledby="anggotaDprd">
                                    <a class="dropdown-item" href="#">Keanggotaan </a>
                                    <a class="dropdown-item" href="<?= bs() ?>anggota">Daftar Anggota</a>
                                </div>
                            </li>
                            

                            <li class="nav-item dropdown a-nav">
                                <a class="nav-link dropdown-toggle a-nav " href="#" id="jdihDprd" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    JDIH
                                </a>
                                <div class="dropdown-menu" aria-labelledby="jdihDprd">
                                     <a class="dropdown-item" href="https://jdih.banyuwangikab.go.id/perda">PERDA </a>
                                <a class="dropdown-item" href="https://jdih.banyuwangikab.go.id/perda_braille">PERDA BRAILE</a>
                                <a class="dropdown-item" href="https://jdih.banyuwangikab.go.id/perda_inggris">TERJEMAHAN PERDA BAHASA INGGRIS</a>
                                    <a class="dropdown-item" href="<?= bs() ?>jdih/keputusan_dprd">KEPUTUSAN DPRD</a>
                                    <a class="dropdown-item" href="<?= bs() ?>jdih/keputusan_pimpinan">KEPUTUSAN
                                        PIMPINAN DPRD</a>
                                    <a class="dropdown-item" href="<?= bs() ?>jdih/keputusan_bk">KEPUTUSAN BK</a>
                                    <a class="dropdown-item" href="<?= bs() ?>jdih/berita_acara">BERITA ACARA</a>
                                    <a class="dropdown-item" href="<?= bs() ?>jdih/naskah_akademik">NASKAH AKADEMIK</a>
                                    <a class="dropdown-item" href="<?= bs() ?>jdih/notulensi">NOTULENSI</a>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link a-nav" href="<?= bs() ?>propemperda ">
                                    Propemperda
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link a-nav" href="<?= bs() ?>berita">
                                    Berita
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link a-nav" href="<?= bs() ?>akun">
                                    Akun
                                </a>
                            </li> -->



                    </ul>
                </nav>
            </nav>


        </div>
    </header>

</div>
<script>
function loc(url){
    window.location.href = url;
}
</script>