<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
// tampilan kusus Super admin
Route::group(['middleware'=>['auth','adminMidlleware:0']], function(){
    Route::get('user',[UserController::class,'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store',[Usercontroller::class,'store'])->name('user.store');  
    Route::get('user.editUser/{id}', [UserController::class, 'edit'])->name('user.editUser');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update'); 
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

// Tampilan kusus Super admin dan admin 
Route::group(['middleware'=>['auth','adminMidlleware:0,1']], function(){      
Route::get('surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('surat/store', [SuratController::class, 'store'])->name('surat.store');
Route::get('surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');
Route::put('surat/{id}', [SuratController::class, 'update'])->name('surat.update'); 
Route::delete('surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');



});
// Tamilan umum
Route::group(['middleware'=>['auth','adminMidlleware:0,1,2']], function(){
    Route::get('surat', [SuratController::class, 'index'])->name('surat.index');
    Route::get('surat/{id}', [SuratController::class, 'show'])->name('surat.show');

});


Route::get('/admin',[SuratController::class,'admin'])->name('admin.index');


Route::get('user/{id}',[UserController::class,'show'])->name('user.show');
Route::get('/jenis',[SuratController::class, 'showCard'])->name('jenis.index');
Route::get('/jenisSatu',[SuratController::class, 'jenisSatu'])->name('jenis.satu');
Route::get('/jenisDua',[SuratController::class, 'jenisDua'])->name('jenis.dua');

Route::get('userP',[UserController::class,'index']);
Route::get('generatepdf',[UserController::class,'generatepdf'])->name('user.pdf');



