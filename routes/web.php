<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beliberasController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\mustahikController;
use App\Http\Controllers\muzakkiController;
use App\Http\Controllers\penghitunganController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
// Route::post('admin/login', 'Auth\AdminAuthController@postLogin');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/', 'berandaController@index')->name('beranda');

Route::get('/', [berandaController::class, 'index'])->name('beranda');

Route::get('importExportView', [MyController::class, 'importExportView']);
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');

Route::prefix('muzakki')->name('muzakki.')->group(function () {    
    Route::get('/', [muzakkiController::class,'index'])->name('index');

    // Muzaki Beras
    Route::get('/beras/tabel', [muzakkiController::class,'dataTableMuzakkiBeras'])->name('beras.tabel');
    Route::post('/beras/store', [muzakkiController::class,'storeBeras'])->name('beras.store');
    Route::get('/beras/create', [muzakkiController::class,'createBeras'])->name('beras.create');
    Route::get('/beras/show/{pesanan}', [muzakkiController::class,'showBeras'])->name('beras.show');
    Route::get('/beras/edit/{pesanan}', [muzakkiController::class,'editBeras'])->name('beras.edit'); 
    Route::put('/beras/update/{pesanan}', [muzakkiController::class,'updateBeras'])->name('beras.update'); 
    Route::delete('/beras/delete/{pesanan}', [muzakkiController::class,'destroyBeras'])->name('beras.destroy');
    Route::get('/excel/beras/export', [muzakkiController::class, 'exportMuzakkiBeras'])->name('export.muzakkiBeras');
    Route::post('/excel/beras/import', [muzakkiController::class, 'importMuzakkiBeras'])->name('import.muzakkiBeras');
    
    // Muzaki Uang
    Route::get('/uang/tabel', [muzakkiController::class,'dataTableMuzakkiUang'])->name('uang.tabel');
    Route::post('/uang/store', [muzakkiController::class,'storeUang'])->name('uang.store');
    Route::get('/uang/create', [muzakkiController::class,'createUang'])->name('uang.create');
    Route::get('/uang/show/{pesanan}', [muzakkiController::class,'showUang'])->name('uang.show');
    Route::get('/uang/edit/{pesanan}', [muzakkiController::class,'editUang'])->name('uang.edit'); 
    Route::put('/uang/update/{pesanan}', [muzakkiController::class,'updateUang'])->name('uang.update'); 
    Route::delete('/uang/delete/{pesanan}', [muzakkiController::class,'destroyUang'])->name('uang.destroy');
    Route::get('/excel/uang/export', [muzakkiController::class, 'exportMuzakkiUang'])->name('export.muzakkiUang');
    Route::post('/excel/uang/import', [muzakkiController::class, 'importMuzakkiUang'])->name('import.muzakkiUang');

});

Route::prefix('mustahik')->name('mustahik.')->group(function () {    
    Route::get('/', [mustahikController::class, 'index'])->name('index');
    // Mustahik
    Route::get('/tabel', [mustahikController::class, 'dataTableMustahik'])->name('tabel');
    Route::post('/store', [mustahikController::class, 'store'])->name('store');
    Route::get('/create', [mustahikController::class, 'create'])->name('create');
    Route::get('/show/{pesanan}', [mustahikController::class, 'show'])->name('show');
    Route::get('/edit/{pesanan}', [mustahikController::class, 'edit'])->name('edit'); 
    Route::put('/update/{pesanan}', [mustahikController::class, 'update'])->name('update'); 
    Route::delete('/delete/{pesanan}', [mustahikController::class, 'destroy'])->name('destroy');
    Route::get('/excel/export', [mustahikController::class, 'exportMustahik'])->name('export');
    Route::post('/excel/import', [mustahikController::class, 'importMustahik'])->name('import');
    
});

Route::prefix('penghitungan')->name('penghitungan.')->group(function () {    
    Route::get('/', [penghitunganController::class, 'index'])->name('index');
    Route::post('/update', [penghitunganController::class, 'update'])->name('update');
    
});

Route::prefix('beliberas')->name('beliberas.')->group(function () {    
    Route::get('/', [beliberasController::class, 'index'])->name('index');
    // Beliberas
    Route::get('/tabel', [beliberasController::class, 'dataTableBeliberas'])->name('tabel');
    Route::post('/store', [beliberasController::class, 'store'])->name('store');
    Route::get('/create', [beliberasController::class, 'create'])->name('create');
    Route::get('/show/{pesanan}', [beliberasController::class, 'show'])->name('show');
    Route::get('/edit/{pesanan}', [beliberasController::class, 'edit'])->name('edit'); 
    Route::put('/update/{pesanan}', [beliberasController::class, 'update'])->name('update'); 
    Route::delete('/delete/{pesanan}', [beliberasController::class, 'destroy'])->name('destroy');
    
});