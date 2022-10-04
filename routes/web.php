<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Middleware\IsAdmin;
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

// Route::get('login')->uses('App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

// Route::get('profildesa/{jenis}', [App\Http\Controllers\UserController::class, 'profildesa']);
// Route::get('potensidesa/{jenis}', [App\Http\Controllers\UserController::class, 'potensidesa']);
// Route::get('struktur', [App\Http\Controllers\UserController::class, 'struktur']);
// Route::get('strukturdtl/{id}', [App\Http\Controllers\UserController::class, 'strukturdtl']);
// Route::get('perangkatdesa', [App\Http\Controllers\UserController::class, 'perangkatdesa']);
// Route::get('lembagadesa', [App\Http\Controllers\UserController::class, 'lembagadesa']);
// Route::get('layanan', [App\Http\Controllers\UserController::class, 'layanan']);
// Route::get('informasi/{jenis}', [App\Http\Controllers\UserController::class, 'informasi']);
// Route::get('informasidtl/{jenis}/{id}', [App\Http\Controllers\UserController::class, 'informasidtl']);
// Route::get('galeri', [App\Http\Controllers\UserController::class, 'galeri']);
// Route::get('galeridtl/{id}', [App\Http\Controllers\UserController::class, 'galeridtl']);
// Route::get('download', [App\Http\Controllers\UserController::class, 'download']);
// Route::get('wisata', [App\Http\Controllers\UserController::class, 'wisata']);
// Route::get('umkm', [App\Http\Controllers\UserController::class, 'umkm']);
// Route::get('produkhukum', [App\Http\Controllers\UserController::class, 'produkhukum']);

Route::post('userauth', [App\Http\Controllers\Auth\LoginController::class, 'login']);
// Route::post('cekusername', [App\Http\Controllers\CampurController::class, 'cekusername']);
// Route::post('storeuser', [App\Http\Controllers\CampurController::class, 'storeuser']);


Route::middleware([IsAdmin::class])->group(function () {
    
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);

    Route::group(['prefix' => 'admin'], function(){
        Route::get('home', [App\Http\Controllers\AdminController::class, 'index']);
        Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'profil']);
        Route::post('/updateUserProfil', [App\Http\Controllers\ProfilController::class, 'update']);
        Route::post('/updateUserPassword', [App\Http\Controllers\ProfilController::class, 'updatepassword']);

        // Jenis Komoditas
        Route::get('jenis/{jenis}', [App\Http\Controllers\JenisController::class, 'index']);
        Route::post('storejenis', [App\Http\Controllers\JenisController::class, 'store']);
        Route::post('updatejenis/{jenis}/{id}', [App\Http\Controllers\JenisController::class, 'update']);
        Route::post('hapusjenis/{jenis}/{id}', [App\Http\Controllers\JenisController::class, 'destroy']); 

        // Komoditas
        Route::get('komoditas/{jenis}', [App\Http\Controllers\KomoditasController::class, 'index']);
        Route::post('storekomoditas', [App\Http\Controllers\KomoditasController::class, 'store']);
        Route::post('updatekomoditas/{jenis}/{id}', [App\Http\Controllers\KomoditasController::class, 'update']);
        Route::post('hapuskomoditas/{jenis}/{id}', [App\Http\Controllers\KomoditasController::class, 'destroy']); 

        // Status Nelayan
        Route::get('statusnelayan', [App\Http\Controllers\StatusNelayanController::class, 'index']);

        // Master Petani
        Route::get('menu', [App\Http\Controllers\MenuController::class, 'index']);
        Route::post('storemenu', [App\Http\Controllers\MenuController::class, 'store']);
        Route::post('updatemenu/{id}', [App\Http\Controllers\MenuController::class, 'update']);
        Route::post('hapusmenu/{id}', [App\Http\Controllers\MenuController::class, 'destroy']); 
        
        // Template
        Route::get('template', [App\Http\Controllers\AdminController::class, 'indextmp']);
        Route::post('/updatetemplate/{id}', [App\Http\Controllers\AdminController::class, 'updatetmp']);

        // User Join
        // Route::get('/user', [App\Http\Controllers\UserListController::class, 'index']);

    });
});

Route::post('getKabupaten', [App\Http\Controllers\CampurController::class, 'getKabupaten']);
Route::post('getKecamatan', [App\Http\Controllers\CampurController::class, 'getKecamatan']);
Route::post('getDesa', [App\Http\Controllers\CampurController::class, 'getDesa']);
// Auth::routes(); 
// Auth::routes(['login' => false]);       
Auth::routes(['register' => false]);       

// Route::group(['middleware' => 'IsAdmin'], function () {
    
// });



