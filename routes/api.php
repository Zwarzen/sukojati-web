<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\BeritaController;



use App\Models\Berita;

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);
Route::post('get_user', [ApiController::class, 'get_user']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::group(['prefix' => 'berita'],function(){
        Route::get('/', [BeritaController::class, 'newRelease']);
        Route::get('/newRelease', [BeritaController::class, 'newRelease']);
        Route::get('/newRelease/{jml}', [BeritaController::class, 'newRelease']);
        
    });
    
});


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
});