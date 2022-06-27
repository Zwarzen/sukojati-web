<?php

use App\Models\Admin\OpdJenis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Presentation\Egov\EgovController;
use App\Http\Controllers\Presentation\Home\HomeController;
use App\Http\Controllers\Presentation\Home\PortalController;
use App\Http\Controllers\Presentation\Warga\WargaController;
use App\Http\Controllers\Presentation\Page\HalamanController;
use App\Http\Controllers\Presentation\Berita\BeritaController;
use App\Http\Controllers\Presentation\Bisnis\BisnisController;
use App\Http\Controllers\Presentation\Budaya\BudayaController;
use App\Http\Controllers\Presentation\Search\SearchController;
use App\Http\Controllers\Presentation\Wisata\WisataController;
use App\Http\Controllers\Presentation\Layanan\LayananController;
use App\Http\Controllers\Presentation\Bisnis\Bpom\BpomController;
use App\Http\Controllers\Presentation\Bisnis\Umkm\UmkmController;
use App\Http\Controllers\Presentation\Budaya\Adat\AdatController;
use App\Http\Controllers\Presentation\Berita\BeritaFotoController;
use App\Http\Controllers\Presentation\Galeri\GaleriFotoController;
use App\Http\Controllers\Presentation\Home\TransparansiController;
use App\Http\Controllers\Presentation\Berita\BeritaVideoController;
use App\Http\Controllers\Presentation\Bisnis\Pajak\PajakController;
use App\Http\Controllers\Presentation\Budaya\Musik\MusikController;
use App\Http\Controllers\Presentation\Wisata\Event\EventController;
use App\Http\Controllers\Presentation\Warga\Sosial\SosialController;
use App\Http\Controllers\Presentation\Bisnis\Tender\TenderController;
use App\Http\Controllers\Presentation\Budaya\Bahasa\BahasaController;
use App\Http\Controllers\Presentation\Budaya\Cerita\CeritaController;
use App\Http\Controllers\Presentation\Budaya\Tarian\TarianController;
use App\Http\Controllers\Presentation\Profil\ProfileDaerahController;
use App\Http\Controllers\Presentation\Warga\Ekonomi\EkonomiController;
use App\Http\Controllers\Presentation\Budaya\Inovasi\InovasiController;
use App\Http\Controllers\Presentation\Budaya\Sejarah\SejarahController;
use App\Http\Controllers\Presentation\Wisata\Kuliner\KulinerController;
use App\Http\Controllers\Presentation\Perencanaan\PerencanaanController;
use App\Http\Controllers\Presentation\Warga\Advokasi\AdvokasiController;
use App\Http\Controllers\Presentation\Pemerintahan\PemerintahanController;
use App\Http\Controllers\Presentation\Warga\Pekerjaan\PekerjaanController;
use App\Http\Controllers\Presentation\Bisnis\Investasi\InvestasiController;
use App\Http\Controllers\Presentation\Bisnis\Perijinan\PerijinanController;
use App\Http\Controllers\Presentation\Profil\ProfilPekerjaanUmumController;
use App\Http\Controllers\Presentation\Wisata\Akomodasi\AkomodasiController;
use App\Http\Controllers\Presentation\Wisata\Informasi\InformasiController;
use App\Http\Controllers\Presentation\Warga\Layanan112\Layanan112Controller;
use App\Http\Controllers\Presentation\Warga\Pendidikan\PendidikanController;
use App\Http\Controllers\Presentation\Pemerintahan\Eksekutif\Opd\OpdController;
use App\Http\Controllers\Presentation\Pemerintahan\Prestasi\PrestasiController;
use App\Http\Controllers\Presentation\Pemerintahan\VisiMisi\VisiMisiController;
use App\Http\Controllers\Presentation\Prioritas\PrioritasPembangunanController;
use App\Http\Controllers\Presentation\Wisata\Rekomendasi\RekomendasiController;
use App\Http\Controllers\Presentation\Warga\Kependudukan\KependudukanController;
use App\Http\Controllers\Presentation\Pemerintahan\Eksekutif\EksekutifController;
use App\Http\Controllers\Presentation\Pemerintahan\Yudikatif\YudikatifController;
use App\Http\Controllers\Presentation\Wisata\Transportasi\TransportasiController;
use App\Http\Controllers\Presentation\Pemerintahan\Legislatif\LegislatifController;
use App\Http\Controllers\Presentation\Pemerintahan\ProdukHukum\ProdukHukumController;
use App\Http\Controllers\Presentation\Pemerintahan\LambangDaerah\LambangDaerahController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [OpdController::class,'index'])->name('beranda');

Route::group(['prefix'=>'page'],function (){
    Route::get('/',[PortalController::class,'index'])->name('portal');
    Route::get('/tes',[PortalController::class,'tes'])->name('portal.tes');
    Route::get('/b',[PortalController::class,'b'])->name('portal.b');
    Route::post('/getListInformation',[PortalController::class,'getListInformation'])->name('portal.getListInformation');
    // Route::match(['get', 'post'],'/getListInformation',function(){
    //     return "oke";
    // })->name('portal.getListInformation');

    Route::get('/list-kontak',[PortalController::class,'listContactUsView'])->name('portal.list-kontak');
    Route::get('/radio-blambangan',[PortalController::class,'radioBlambangan'])->name('portal.radio-blambangan');
    Route::get('/list-popupinfo',[PortalController::class,'listPopupInfoView'])->name('portal.list-popupinfo');
    Route::get('/list-profile',[PortalController::class,'listProfileView'])->name('portal.list-profile');
    Route::get('/list-perencanaan',[PortalController::class,'listPerencanaanView'])->name('portal.list-perencanaan');
    Route::get('/list-transparansi',[PortalController::class,'listTransparansiView'])->name('portal.list-transparansi');
    Route::get('/list-prioritas-pembangunan/{slug}',[PortalController::class,'listProfileView'])->name('portal.list-prioritas-pembangunan.{slug}');
    Route::get('/index/transparansi',[PortalController::class,'index_transparansi'])->name('portal.index.transparansi');
    Route::get('/tentang/transparansi',[PortalController::class,'transparansi'])->name('portal.transparansi');


});

Route::group(['prefix'=>'halaman'],function (){

    Route::get('/transparansi',[TransparansiController::class,'transparansi'])->name('portal.transparansi');
    Route::get('/perencanaan',[PortalController::class,'transparansi'])->name('transaparansi.perencanaan');
    Route::get('/transparansi/pengelolaan/{tahun}/{id}',[TransparansiController::class,'transparansiPengelolaan'])->name('portal.transparansi.pengelolaan');


});


Route::group(['prefix'=>'halaman'],function (){

    Route::get('/',[HalamanController::class,'index'])->name('halaman');
    Route::get('/search',[HalamanController::class,'search'])->name('halaman.search');
    Route::get('/kanal/{any}',[HalamanController::class,'kanal'])->name('halaman.kanal.{any}');
    Route::get('/sorotan',[HalamanController::class,'sorotan'])->name('halaman.sorotan');
    Route::get('/video',[HalamanController::class,'video'])->name('halaman.video');
    Route::get('/tag/{any}',[HalamanController::class,'sorotan'])->name('halaman.tag.{any}');


    Route::get('/tentang/{any}',[HalamanController::class,'detail'])->name('halaman.tentang.{any}');
    Route::get('/{any}',[HalamanController::class,'detail'])->name('halaman.{any}');


});



// Route::get('/home', [HomeController::class,'index']);

// Route::get('/prioritas-pembangunan', [PrioritasPembangunanController::class,'index']);
// Route::group(['prefix'=>'prioritas-pembangunan'],function (){
//     Route::get('/',[PrioritasPembangunanController::class,'index'])->name('prioritas-pembangunan');
//     Route::get('/showListPrioritas/{slug}',[PrioritasPembangunanController::class,'showListPrioritasView'])->name('prioritas-pembangunan.showlistprioritas.{slug}');


// });


// Route::get('/layanan', [LayananController::class,'index']);




// Route::group(['prefix'=>'profil'],function (){
//     Route::get('/pekerjaan-umum',[ProfilPekerjaanUmumController::class,'index'])->name('profil-pekerjaan-umum');
//     Route::get('/pekerjaan-umum.html',[ProfilPekerjaanUmumController::class,'index'])->name('profil-pekerjaan-umum-html');
// });


// start route pemerintahan
Route::group(['prefix'=>'pemerintahan'],function (){
    Route::get('/',[PemerintahanController::class,'index'])->name('pemerintahan');
    Route::get('/kepala-daerah',[PemerintahanController::class,'kepalaDaerah'])->name('pemerintahan.kepala-daerah');
    Route::get('/sekda',[PemerintahanController::class,'sekda'])->name('pemerintahan.sekda');
    Route::get('/lambang-daerah',[LambangDaerahController::class,'index'])->name('pemerintahan.lambang-daerah');
    Route::get('/gambaran-umum',[EksekutifController::class,'index'])->name('pemerintahan.gambaran-umum');
    Route::get('/pejabat',[PrestasiController::class,'index'])->name('pemerintahan.pejabat');
    Route::get('/prestasi',[PrestasiController::class,'prestasi'])->name('pemerintahan.prestasi');
    Route::get('/prestasi/cari',[PrestasiController::class,'cari'])->name('prestasi.cari');
    Route::get('/prestasi/filter',[PrestasiController::class,'filter'])->name('prestasi.filter');
    Route::get('/prestasi/{slug}',[PrestasiController::class,'detail'])->name('pemerintahan.prestasi.{slug}');
    Route::get('/visi-misi',[VisiMisiController::class,'index'])->name('pemerintahan.visi-misi');
    Route::get('/saran',[PrestasiController::class,'saran'])->name('pemerintahan.saran');
    Route::get('/dinas',[PemerintahanController::class,'dinasnew'])->name('pemerintahan.dinas');
    Route::get('/inspektorat',[PemerintahanController::class,'inspektorat'])->name('pemerintahan.inspektorat');
    Route::get('/badan',[PemerintahanController::class,'badannew'])->name('pemerintahan.badan');
    Route::get('/kecamatan',[PemerintahanController::class,'kecamatannew'])->name('pemerintahan.kecamatan');
    Route::get('/desa/{id}',[PemerintahanController::class,'desa'])->name('pemerintahan.desa');
    Route::get('/satpolpp',[PemerintahanController::class,'satpolpp'])->name('pemerintahan.satpolpp');

    Route::group(['prefix'=>'eksekutif'],function (){
        Route::get('/',[EksekutifController::class,'index'])->name('pemerintahan.eksekutif');
        Route::get('/dinas',[EksekutifController::class,'dinas'])->name('pemerintahan.eksekutif.dinas');
    });


    Route::get('/legislatif',[LegislatifController::class,'index'])->name('pemerintahan.legislatif');
    Route::get('/yudikatif',[YudikatifController::class,'index'])->name('pemerintahan.yudikatif');
    Route::get('/produk-hukum',[ProdukHukumController::class,'index'])->name('pemerintahan.produk_hukum');
});

// end route pemerintahan
// rout opd


Route::group(['prefix'=>'/opd'],function (){
    Route::get('/',[OpdController::class,'index'])->name('opd');
    Route::get('/{slug}//',[OpdController::class,'beranda'])->name('opd.index');
    Route::get('/{slug}/beranda',[OpdController::class,'beranda'])->name('opd.beranda');
    Route::get('/{slug}/visimisi',[OpdController::class,'visimisi'])->name('opd.visi_misi');
    Route::get('/{slug}/struktur',[OpdController::class,'struktur'])->name('opd.struktur');
    Route::get('/{slug}/program-kerja',[OpdController::class,'proker'])->name('opd.proker');
    Route::get('/{slug}/data',[OpdController::class,'data'])->name('opd.data');
    Route::get('/{slug}/publikasi',[OpdController::class,'publikasi'])->name('opd.publikasi');
    Route::get('/{slug}/kegiatan',[OpdController::class,'kegiatan'])->name('opd.kegiatan');
    Route::get('/{slug}/berita',[OpdController::class,'berita'])->name('opd.berita');
    Route::get('/{slug}/kontak',[OpdController::class,'kontak'])->name('opd.kontak');
});


/// route untuk opd
// $opds = OpdJenis::all();
//  ['dinas','kecamatan','rsud','badan','satpolpp','desa']; // ini bisa diambil dari kategori opd_jenis

// foreach ($opds as $key=>$opd) {
//     Route::group(['prefix'=>$opd->slug],function ()use($opds,$opd){
//         Route::get('/',[OpdController::class,'index'])->name($opd->slug);
//         Route::get('/{slug}//',[OpdController::class,'beranda'])->name($opd->slug.'.'.'beranda');
//         Route::get('/{slug}/beranda',[OpdController::class,'beranda'])->name($opd->slug.'.'.'beranda');
//         Route::get('/{slug}/visimisi',[OpdController::class,'visimisi'])->name($opd->slug.'.'.'visi_misi');
//         Route::get('/{slug}/struktur',[OpdController::class,'struktur'])->name($opd->slug.'.'.'struktur');
//         Route::get('/{slug}/program-kerja',[OpdController::class,'proker'])->name($opd->slug.'.'.'proker');
//         Route::get('/{slug}/data',[OpdController::class,'data'])->name($opd->slug.'.'.'data');
//         Route::get('/{slug}/publikasi',[OpdController::class,'publikasi'])->name($opd->slug.'.'.'publikasi');
//         Route::get('/{slug}/kegiatan',[OpdController::class,'kegiatan'])->name($opd->slug.'.'.'kegiatan');
//         Route::get('/{slug}/berita',[OpdController::class,'berita'])->name($opd->slug.'.'.'berita');
//         Route::get('/{slug}/kontak',[OpdController::class,'kontak'])->name($opd->slug.'.'.'kontak');
//         }
//     );

// }
// end route opd

// start route pemerintahan
// Route::group(['prefix'=>'profil-daerah'],function (){
//     Route::get('/',[ProfileDaerahController::class,'sejarah'])->name('profil-daerah.sejarah');
//     Route::get('/kinerja',[ProfileDaerahController::class,'kinerja'])->name('profil-daerah.kinerja');
//     Route::get('/sejarah',[ProfileDaerahController::class,'sejarah'])->name('profil-daerah.sejarah');
//     Route::get('/iklim',[ProfileDaerahController::class,'iklim'])->name('profil-daerah.iklim');
//     Route::get('/geologi',[ProfileDaerahController::class,'geologi'])->name('profil-daerah.geologi');
//     Route::get('/geografi',[ProfileDaerahController::class,'geografi'])->name('profil-daerah.geografi');
// });

// start route warga
// Route::group(['prefix'=>'warga'],function (){
//     Route::get('/',[WargaController::class,'index'])->name('warga');

//     Route::group(['prefix'=>'pendidikan'],function (){
//         Route::get('/',[PendidikanController::class,'index'])->name('pendidikan');
//     });

//     Route::group(['prefix'=>'pekerjaan'],function (){
//         Route::get('/',[PekerjaanController::class,'index'])->name('pekerjaan');
//     });

//     Route::group(['prefix'=>'kependudukan'],function (){
//         Route::get('/',[KependudukanController::class,'index'])->name('kependudukan');
//     });

//     Route::group(['prefix'=>'advokasi'],function (){
//         Route::get('/',[AdvokasiController::class,'index'])->name('advokasi');
//     });

//     Route::group(['prefix'=>'sosial'],function (){
//         Route::get('/',[SosialController::class,'index'])->name('sosial');
//     });

//     Route::group(['prefix'=>'ekonomi'],function (){
//         Route::get('/',[EkonomiController::class,'index'])->name('ekonomi');
//     });

//     Route::group(['prefix'=>'layanan112'],function (){
//         Route::get('/',[Layanan112Controller::class,'index'])->name('layanan112');
//     });

// });
// end route warga

// start route wisata

// Route::group(['prefix'=>'wisata'],function (){
//     Route::get('/',[WisataController::class,'index'])->name('wisata');

//     Route::group(['prefix'=>'rekomendasi'],function (){
//         Route::get('/',[RekomendasiController::class,'index'])->name('wisata.rekomendasi');
//     });

//     Route::group(['prefix'=>'informasi'],function (){
//         Route::get('/',[InformasiController::class,'index'])->name('wisata.informasi');
//     });

//     Route::group(['prefix'=>'akomodasi'],function (){
//         Route::get('/',[AkomodasiController::class,'index'])->name('wisata.akomodasi');
//         Route::get('/Villa/{nama}',[AkomodasiController::class,'villa']);
//     });

//     Route::group(['prefix'=>'kuliner'],function (){
//         Route::get('/',[KulinerController::class,'index'])->name('wisata.kuliner');
//     });

//     Route::group(['prefix'=>'event'],function (){
//         Route::get('/',[EventController::class,'index'])->name('wisata.event');
//     });

//     Route::group(['prefix'=>'transportasi'],function (){
//         Route::get('/',[TransportasiController::class,'index'])->name('wisata.transportasi');
//     });

//     Route::group(['prefix'=>'layanan112'],function (){
//         Route::get('/',[Layanan112Controller::class,'index'])->name('wisata.layanan112');
//     });

// });

// start route budaya

// Route::group(['prefix'=>'budaya'],function (){
//     Route::get('/',[BudayaController::class,'index'])->name('budaya');

//     Route::group(['prefix'=>'sejarah'],function (){

//         Route::get('/',[SejarahController::class,'index'])->name('budaya.sejarah');
//     });

//     Route::get('/bahasa',[BahasaController::class,'index'])->name('budaya.bahasa');
//     Route::get('/bahasa/cari',[BahasaController::class,'cari'])->name('budaya.cari');
//     // Route::get('/bahasa/cari','BahasaController@cari');
//     Route::get('/cerita',[CeritaController::class,'index'])->name('budaya.cerita');
//     Route::get('/musik',[MusikController::class,'index'])->name('budaya.musik');
//     Route::get('/tarian',[TarianController::class,'index'])->name('budaya.tarian');
//     Route::get('/adat',[AdatController::class,'index'])->name('budaya.adat');
//     Route::get('/inovasi',[InovasiController::class,'index'])->name('budaya.inovasi');
// });

// end route budaya


// Route::group(['prefix'=>'bisnis'],function (){
//     Route::get('/',[BisnisController::class,'index'])->name('bisnis');

//     Route::group(['prefix'=>'umkm'],function (){
//         Route::get('/',[UmkmController::class,'index'])->name('bisnis.umkm');
//     });

//     Route::group(['prefix'=>'tender'],function (){
//         Route::get('/',[TenderController::class,'index'])->name('bisnis.tender');
//     });

//     Route::group(['prefix'=>'pajak'],function (){
//         Route::get('/',[PajakController::class,'index'])->name('bisnis.pajak');
//     });

//     Route::group(['prefix'=>'perijinan'],function (){
//         Route::get('/',[PerijinanController::class,'index'])->name('bisnis.perijinan');
//     });

//     Route::group(['prefix'=>'investasi'],function (){
//         Route::get('/',[InvestasiController::class,'index'])->name('bisnis.investasi');
//     });

//     Route::group(['prefix'=>'bpom'],function (){
//         Route::get('/',[BpomController::class,'index'])->name('bisnis.bpom');
//     });

// });

Route::group(['prefix'=>'berita'],function (){

    Route::get('/',[BeritaController::class,'index'])->name('berita');

    // df3cadae0352c08af0e7b5e04426aed4.jpg gambar temp berita damkar

    Route::get('/search',[BeritaController::class,'search'])->name('berita.search');
    Route::get('/kanal/{any}',[BeritaController::class,'kanal'])->name('berita.kanal.{any}');
    Route::get('/sorotan',[BeritaController::class,'sorotan'])->name('berita.sorotan');
    Route::get('/video',[BeritaVideoController::class,'video'])->name('berita.video');
    Route::get('/tag/{any}',[BeritaController::class,'sorotan'])->name('video.tag.{any}');


    Route::group(['prefix'=>'video'],function (){
        Route::get('/',[BeritaVideoController::class,'video'])->name('berita.video');
        Route::get('/search',[BeritaVideoController::class,'search'])->name('berita.video.search');
        Route::get('/kanal/{any}',[BeritaVideoController::class,'kanal'])->name('berita.video.kanal.{any}');
        Route::get('/sorotan',[BeritaVideoController::class,'sorotan'])->name('berita.video.sorotan');
        Route::get('/tag/{any}',[BeritaVideoController::class,'tag'])->name('berita.video.tag.{any}');
        Route::get('/{any}',[BeritaVideoController::class,'videoDetail'])->name('berita.video.{any}');
    });

    Route::group(['prefix'=>'foto'],function (){
        Route::get('/',[BeritaFotoController::class,'foto'])->name('berita.foto');
        Route::get('/search',[BeritaFotoController::class,'search'])->name('berita.foto.search');
        Route::get('/kanal/{any}',[BeritaFotoController::class,'kanal'])->name('berita.foto.kanal.{any}');
        Route::get('/sorotan',[BeritaFotoController::class,'sorotan'])->name('berita.foto.sorotan');
        Route::get('/tag/{any}',[BeritaFotoController::class,'tag'])->name('berita.foto.tag.{any}');
        Route::get('/{any}',[BeritaFotoController::class,'fotoDetail'])->name('berita.foto.{any}');
    });




    Route::get('/{any}',[BeritaController::class,'detail'])->name('berita.{any}');



});




Route::group(['prefix'=>'galeri'],function (){
    Route::get('/',[GaleriFotoController::class,'index'])->name('galeri');
    Route::get('/foto',[GaleriFotoController::class,'index'])->name('galeri-foto');
    Route::post('/showListFotoByKategori',[GaleriFotoController::class,'showListFotoByKategori'])->name('showListFotoByKategori');
    Route::get('/{any}',[GaleriFotoController::class,'detail'])->name('galeri.{any}');
});

// Route::group(['prefix'=>'egov'],function (){
//     Route::get('/',[EgovController::class,'index'])->name('egov');
// });


Route::group(['prefix'=>'search'],function (){
    Route::get('/',[SearchController::class,'index'])->name('search');
});

Route::group(['prefix'=>'perencanaan'],function (){
    Route::get('/',[PerencanaanController::class,'perencanaan'])->name('perencanaan');
    Route::get('/cari',[PerencanaanController::class,'cari'])->name('perencanaan.cari');
    Route::get('/{slug}',[PerencanaanController::class,'detail'])->name('perencanaan.{slug}');
});


/// uri apapun selain di atas akan diarahkan ke judul berita

Route::get('/{any}',[BeritaController::class,'detail']);
