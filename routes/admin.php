<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OpdController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\HalamanController;
use App\Http\Controllers\Admin\PopupInfoController;
use App\Http\Controllers\Admin\BeritaFotoController;
use App\Http\Controllers\Admin\KanalBeritaController;
use App\Http\Controllers\Admin\KategoriGaleriController;
use App\Http\Controllers\Admin\Transparansi\PertanggungJawabanController;
use App\Http\Controllers\Admin\Transparansi\PengelolaanAnggaranController;
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


Route::group(['prefix'=>'admin'],function (){

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', array('as' => 'admin', 'uses' => 'Admin\AdminController@index'));
    Route::get('/dashboard',[AdminController::class,'dash']);
    Route::get('/home', [AdminController::class, 'index'])->name('home');

    /** /admin/transparansi */
    Route::group(['prefix' => 'transparansi'],function(){
        Route::group( ['middleware' => 'role:SuperAdmin|Admin|Bpkad|Opd'] , function(){
            Route::group(['prefix' => 'pengelolaan'],function(){
                Route::get('/', [PengelolaanAnggaranController::class, 'index'])
                ->name('admin.transparansi.pengelolaan.index');

                Route::get('/data', [PengelolaanAnggaranController::class, 'dataKelola'])
                ->name('admin.transparansi.pengelolaan.data');

                Route::get('/create', [PengelolaanAnggaranController::class, 'create'])
                ->name('admin.transparansi.pengelolaan.create');


                Route::post('/store', [PengelolaanAnggaranController::class, 'store'])
                ->name('admin.transparansi.pengelolaan.store');


                Route::post('/update', [PengelolaanAnggaranController::class, 'update'])
                ->name('admin.transparansi.pengelolaan.update');


                Route::delete('/delete/{id}', [PengelolaanAnggaranController::class, 'delete'])
                    ->name('admin.master.kategorigaleri.delete');


                Route::get('/edit/{id}', [PengelolaanAnggaranController::class, 'edit'])
                ->name('admin.transparansi.pengelolaan.edit');


                /// kategori pengelolaan

                Route::get('/kategori', [PengelolaanAnggaranController::class, 'kategori'])
                ->name('admin.transparansi.pengelolaan.kategori');

                Route::get('/kategoriCreate', [PengelolaanAnggaranController::class, 'kategoriCreate'])
                ->name('admin.transparansi.pengelolaan.kategoriCreate');

                Route::post('/kategoriStore', [PengelolaanAnggaranController::class, 'kategoriStore'])
                ->name('admin.transparansi.pengelolaan.kategoriStore');


                Route::post('/kategoriUpdate', [PengelolaanAnggaranController::class, 'kategoriUpdate'])
                ->name('admin.transparansi.pengelolaan.kategoriUpdate');


                Route::delete('/kategoriDelete/{id}', [PengelolaanAnggaranController::class, 'kategoriDelete'])
                    ->name('admin.master.kategorigaleri.kategoriDelete');


                Route::get('/kategoriEdit/{id}', [PengelolaanAnggaranController::class, 'kategoriEdit'])
                ->name('admin.transparansi.pengelolaan.kategoriEdit');


            });

            Route::group(['prefix' => 'pertanggungjawaban'],function(){
                Route::get('/', [PertanggungJawabanController::class, 'index'])
                ->name('admin.transparansi.pertanggungjawaban.index');
            });



        });
    });

    /** /admin/master */
    Route::group(['prefix' => 'master'],function(){
        Route::group( ['middleware' => 'role:SuperAdmin|Admin|Operator|Opd'] , function(){

            Route::group( ['middleware' => 'role:SuperAdmin|Admin|Operator|Opd'] , function(){

                Route::group(['prefix' => 'kategorigaleri'],function(){
                    Route::get('/', [KategoriGaleriController::class, 'index'])
                    ->name('admin.master.kategorigaleri.index');

                    Route::get('/index', [KategoriGaleriController::class, 'index'])
                    ->name('admin.master.kategorigaleri.index');

                    Route::get('/getlist', [KategoriGaleriController::class, 'getlist'])
                    ->name('admin.master.kategorigaleri.getlist');

                    Route::get('/create', [KategoriGaleriController::class, 'create'])
                    ->name('admin.master.kategorigaleri.create');

                    Route::post('/store', [KategoriGaleriController::class, 'store'])
                    ->name('admin.master.kategorigaleri.store');

                    Route::get('/edit/{id}', [KategoriGaleriController::class, 'edit'])
                    ->name('admin.master.kategorigaleri.edit');

                    Route::post('/update', [KategoriGaleriController::class, 'update'])
                    ->name('admin.master.kategorigaleri.update');

                    Route::delete('/delete/{id}', [KategoriGaleriController::class, 'delete'])
                    ->name('admin.master.kategorigaleri.delete');

                });

                Route::group(['prefix' => 'kanalberita'],function(){
                    Route::get('/', [KanalBeritaController::class, 'index'])
                    ->name('admin.master.kanalberita.index');

                    Route::get('/index', [KanalBeritaController::class, 'index'])
                    ->name('admin.master.kanalberita.index');

                    Route::get('/getlist', [KanalBeritaController::class, 'getlist'])
                    ->name('admin.master.kanalberita.getlist');

                    Route::get('/create', [KanalBeritaController::class, 'create'])
                    ->name('admin.master.kanalberita.create');

                    Route::post('/store', [KanalBeritaController::class, 'store'])
                    ->name('admin.master.kanalberita.store');

                    Route::get('/edit/{id}', [KanalBeritaController::class, 'edit'])
                    ->name('admin.master.kanalberita.edit');

                    Route::post('/update', [KanalBeritaController::class, 'update'])
                    ->name('admin.master.kanalberita.update');

                    Route::delete('/delete/{id}', [KanalBeritaController::class, 'delete'])
                    ->name('admin.master.kanalberita.delete');

                });

                Route::group(['prefix' => 'halaman'],function(){
                    Route::get('/', [HalamanController::class, 'index'])
                    ->name('admin.master.halaman.index');

                    Route::get('/index', [HalamanController::class, 'index'])
                    ->name('admin.master.halaman.index');

                    Route::get('/getlist', [HalamanController::class, 'getlist'])
                    ->name('admin.master.halaman.getlist');

                    Route::get('/create', [HalamanController::class, 'create'])
                    ->name('admin.master.halaman.create');

                    Route::post('/store', [HalamanController::class, 'store'])
                    ->name('admin.master.halaman.store');

                    Route::get('/edit/{id}', [HalamanController::class, 'edit'])
                    ->name('admin.master.halaman.edit');

                    Route::post('/update', [HalamanController::class, 'update'])
                    ->name('admin.master.halaman.update');

                    Route::delete('/delete/{id}', [HalamanController::class, 'deletePage'])
                    ->name('admin.master.halaman.delete');

                });

            });
        });

    });


    Route::group(['prefix' => 'transaksi'],function(){

        Route::group( ['middleware' => 'role:Operator|Admin|SuperAdmin|Opd'] , function(){


            Route::group( ['middleware' => 'role:Operator|Admin|SuperAdmin|Opd'] , function(){
                Route::group(['prefix' => 'galeri'],function(){
                    Route::get('/', [GaleriController::class, 'index'])
                    ->name('admin.transaksi.galeri.index');

                    Route::get('/index', [GaleriController::class, 'index'])
                    ->name('admin.transaksi.galeri.index');

                    Route::get('/getlist', [GaleriController::class, 'getlist'])
                    ->name('admin.transaksi.galeri.getlist');

                    Route::get('/create', [GaleriController::class, 'create'])
                    ->name('admin.transaksi.galeri.create');

                    Route::post('/store', [GaleriController::class, 'store'])
                    ->name('admin.transaksi.galeri.store');

                    Route::get('/edit/{id}', [GaleriController::class, 'edit'])
                    ->name('admin.transaksi.galeri.edit');

                    Route::post('/update', [GaleriController::class, 'update'])
                    ->name('admin.transaksi.galeri.update');

                    Route::delete('/delete/{id}', [GaleriController::class, 'delete'])
                    ->name('admin.transaksi.galeri.delete');


                });


                Route::group(['prefix' => 'popupinfo'],function(){
                    Route::get('/', [PopupInfoController::class, 'index'])
                    ->name('admin.transaksi.popupinfo.index');

                    Route::get('/index', [PopupInfoController::class, 'index'])
                    ->name('admin.transaksi.popupinfo.index');

                    Route::get('/getlist', [PopupInfoController::class, 'getlist'])
                    ->name('admin.transaksi.popupinfo.getlist');

                    Route::get('/create', [PopupInfoController::class, 'create'])
                    ->name('admin.transaksi.popupinfo.create');

                    Route::post('/store', [PopupInfoController::class, 'store'])
                    ->name('admin.transaksi.popupinfo.store');

                    Route::get('/edit/{id}', [PopupInfoController::class, 'edit'])
                    ->name('admin.transaksi.popupinfo.edit');

                    Route::post('/update', [PopupInfoController::class, 'update'])
                    ->name('admin.transaksi.popupinfo.update');

                    Route::delete('/delete/{id}', [PopupInfoController::class, 'delete'])
                    ->name('admin.transaksi.popupinfo.delete');


                });


            });



            Route::group(['prefix' => 'berita'],function(){
                Route::get('/', [BeritaController::class, 'index'])
                ->name('admin.transaksi.berita.index');

                Route::get('/index', [BeritaController::class, 'index'])
                ->name('admin.transaksi.berita.index');

                Route::get('/getlist', [BeritaController::class, 'getlist'])
                ->name('admin.transaksi.berita.getlist');

                Route::get('/create', [BeritaController::class, 'create'])
                ->name('admin.transaksi.berita.create');

                Route::post('/store', [BeritaController::class, 'store'])
                ->name('admin.transaksi.berita.store');

                Route::get('/edit/{id}', [BeritaController::class, 'edit'])
                ->name('admin.transaksi.berita.edit');

                Route::post('/update', [BeritaController::class, 'update'])
                ->name('admin.transaksi.berita.update');

                Route::delete('/delete/{id}', [BeritaController::class, 'delete'])
                ->name('admin.transaksi.berita.delete');

                Route::put('/saveToDraftData/{id}', [BeritaController::class, 'saveToDraftData'])
                ->name('admin.transaksi.berita.saveToDraftData');

                Route::put('/publishData/{id}', [BeritaController::class, 'publishData'])
                ->name('admin.transaksi.berita.publishData');


            });


            Route::group(['prefix' => 'beritafoto'],function(){
                Route::get('/', [BeritaFotoController::class, 'index'])
                ->name('admin.transaksi.beritafoto.index');

                Route::get('/index', [BeritaFotoController::class, 'index'])
                ->name('admin.transaksi.beritafoto.index');

                Route::get('/getlist', [BeritaFotoController::class, 'getlist'])
                ->name('admin.transaksi.beritafoto.getlist');

                Route::get('/create', [BeritaFotoController::class, 'create'])
                ->name('admin.transaksi.beritafoto.create');

                Route::get('/addFoto/{id}', [BeritaFotoController::class, 'addFoto'])
                ->name('admin.transaksi.beritafoto.addFoto.{id}');

                Route::post('/store', [BeritaFotoController::class, 'store'])
                ->name('admin.transaksi.beritafoto.store');

                Route::post('/storeFoto', [BeritaFotoController::class, 'storeFoto'])
                ->name('admin.transaksi.beritafoto.storeFoto');

                Route::get('/editfoto/{id}', [BeritaFotoController::class, 'editfoto'])
                ->name('admin.transaksi.beritafoto.editfoto');

                Route::get('/edit/{id}', [BeritaFotoController::class, 'edit'])
                ->name('admin.transaksi.beritafoto.edit');



                Route::post('/update', [BeritaFotoController::class, 'update'])
                ->name('admin.transaksi.beritafoto.update');

                Route::post('/updateFoto', [BeritaFotoController::class, 'updateFoto'])
                ->name('admin.transaksi.beritafoto.updateFoto');

                Route::delete('/delete/{id}', [BeritaFotoController::class, 'delete'])
                ->name('admin.transaksi.beritafoto.delete');

                Route::put('/saveToDraftData/{id}', [BeritaFotoController::class, 'saveToDraftData'])
                ->name('admin.transaksi.beritafoto.saveToDraftData');

                Route::put('/publishData/{id}', [BeritaFotoController::class, 'publishData'])
                ->name('admin.transaksi.beritafoto.publishData');

                Route::delete('/deleteFotoItem/{id}', [BeritaFotoController::class, 'deleteFotoItem'])
                ->name('admin.transaksi.beritafoto.deleteFotoItem');

                Route::put('/saveToDraftDataFotoItem/{id}', [BeritaFotoController::class, 'saveToDraftDataFotoItem'])
                ->name('admin.transaksi.beritafoto.saveToDraftDataFotoItem');

                Route::put('/publishDataFotoItem/{id}', [BeritaFotoController::class, 'publishDataFotoItem'])
                ->name('admin.transaksi.beritafoto.publishDataFotoItem');

                Route::put('/makePrimaryFotoItem/{id}', [BeritaFotoController::class, 'makePrimaryFotoItem'])
                ->name('admin.transaksi.beritafoto.makePrimaryFotoItem');





            });

         });


    });



    Route::group(['prefix' => 'opd'],function(){
        Route::group( ['middleware' => 'role:SuperAdmin|Admin'] , function(){

            // Route::resource('opd','Admin\OpdController');

            Route::get('/users', [OpdController::class, 'users'])
            ->name('admin.opd.users');

            Route::get('/addUsers', [OpdController::class, 'addUsers'])
            ->name('admin.opd.addUsers');

            Route::post('/doAddUsers', [OpdController::class, 'doAddUsers'])
            ->name('admin.opd.doAddUsers');

            Route::delete('/deleteUsers/{id}', [OpdController::class, 'deleteUsers'])
            ->name('admin.opd.deleteUsers');

            Route::get('/getUserComponentNotIn/{id_opd}', [OpdController::class, 'getUserComponentNotIn'])
            ->name('admin.opd.getUserComponentNotIn');



        });


        Route::group( ['middleware' => 'role:SuperAdmin|Admin|Opd'] , function(){

            // Route::resource('opd','Admin\OpdController');

            Route::get('/profile', [OpdController::class, 'profile'])
            ->name('admin.opd.profile');

            Route::post('/profile/update', [OpdController::class, 'profileUpdate'])
            ->name('admin.opd.profile.update');





        });
    });



    Route::group(['prefix' => 'usersProfile'],function(){

            Route::get('/setting/{id}', [UsersController::class, 'setting'])
            ->name('admin.users.profile.setting');

            Route::post('/updateProfile', [UsersController::class, 'updateProfile'])
            ->name('admin.users.profile.updateProfile');

            Route::group( ['middleware' => 'role:SuperAdmin|Admin'] , function(){

                //// permission

                Route::get('/indexpermission', [UsersController::class, 'indexpermission'])
                ->name('admin.users.permission.index');


                Route::get('/getlistpermission', [UsersController::class, 'getlistpermission'])
                ->name('admin.users.permission.getlist');

                Route::get('/createpermission', [UsersController::class, 'createpermission'])
                ->name('admin.users.permission.create');

                Route::get('/createpermission', [UsersController::class, 'createpermission'])
                ->name('admin.users.permission.create');

                Route::post('/storepermission', [UsersController::class, 'storepermission'])
                ->name('admin.users.permission.store');

                Route::post('/hiteditpermission/{id}', [UsersController::class, 'hiteditpermission'])
                ->name('admin.users.permission.hitedit');

                Route::delete('/deletepermission/{id}', [UsersController::class, 'deletepermission'])
                ->name('admin.users.permission.delete');


                Route::get('/editpermission/{id}', [UsersController::class, 'editpermission'])
                ->name('admin.users.permission.edit');

                ////role

                Route::get('/indexrole', [UsersController::class, 'indexrole'])
                ->name('admin.users.role.index');

                Route::get('/getlistrole', [UsersController::class, 'getlistrole'])
                ->name('admin.users.role.getlistrole');

                Route::post('/storerole', [UsersController::class, 'storerole'])
                ->name('admin.users.role.storerole');

                Route::get('/createrole', [UsersController::class, 'createrole'])
                ->name('admin.users.role.create');


                Route::post('/hiteditrole/{id}', [UsersController::class, 'hiteditrole'])
                ->name('admin.users.role.hiteditrole');

                Route::delete('/deleterole/{id}', [UsersController::class, 'deleterole'])
                ->name('admin.users.role.delete');



                Route::get('/editrole/{id}', [UsersController::class, 'editrole'])
                ->name('admin.users.role.edit');






                //// profile

                Route::get('/index', [UsersController::class, 'index'])
                ->name('admin.users.profile.index');

                Route::get('/useropd', [UsersController::class, 'useropd'])
                ->name('admin.users.profile.useropd');

                Route::get('/getlist', [UsersController::class, 'getlist'])
                    ->name('admin.users.profile.getlist');

                Route::get('/', [UsersController::class, 'index'])
                    ->name('admin.users.profile.index');


                Route::post('/store', [UsersController::class, 'store'])
                ->name('admin.users.profile.store');

                Route::get('/create', [UsersController::class, 'create'])
                ->name('admin.users.profile.create');

                Route::get('/edit/{id}', [UsersController::class, 'edit'])
                ->name('admin.users.profile.edit');



                Route::post('/hitedit/{id}', [UsersController::class, 'hitedit'])
                ->name('admin.users.profile.hitedit');



                Route::post('/update', [UsersController::class, 'update'])
                ->name('admin.users.profile.update');

                Route::delete('/delete/{id}', [UsersController::class, 'delete'])
                ->name('admin.users.profile.delete');



                //// opd
                Route::delete('/delete/{id}', [UsersController::class, 'delete'])
                ->name('admin.users.profile.delete');


        });

    });


});



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
