<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratJSONController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserJSONController; 


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth::routes();

// Route::get('/', function () {
    // return view('auth.login');
// });

// tampilan kusus Super admin
// Route::group(['middleware'=>['auth','adminMidlleware:0']], function(){
    Route::get('user',[UserJSONController::class,'index'])->name('user.index');
    Route::get('user/create', [UserJSONController::class, 'create'])->name('user.create');
    Route::post('user/store',[UserJSONController::class,'store'])->name('user.store');  
    Route::get('user.editUser/{id}', [UserJSONController::class, 'edit'])->name('user.editUser');
    Route::put('user/{id}', [UserJSONController::class, 'update'])->name('user.update'); 
    Route::delete('user/{id}', [UserJSONController::class, 'destroy'])->name('user.destroy');
// });

// Tampilan kusus Super admin dan admin 
// Route::group(['middleware'=>['auth','adminMidlleware:0,1']], function(){      
Route::get('surat/create', [SuratJSONController::class, 'create'])->name('surat.create');
Route::post('surat/store', [SuratJSONController::class, 'store'])->name('surat.store');
Route::get('surat/{id}/edit', [SuratJSONController::class, 'edit'])->name('surat.edit');
Route::put('surat/{id}', [SuratJSONController::class, 'update'])->name('surat.update'); 
Route::delete('surat/{id}', [SuratJSONController::class, 'destroy'])->name('surat.destroy');
// });


// Tamilan umum
// Route::group(['middleware'=>['auth','adminMidlleware:0,1,2']], function(){
    Route::get('surat', [SuratJSONController::class, 'index'])->name('surat.index');
    Route::get('surat/{id}', [SuratJSONController::class, 'show'])->name('surat.show');

// });


Route::get('/admin',[SuratJSONController::class,'admin'])->name('admin.index');


Route::get('user/{id}',[UserJSONController::class,'show'])->name('user.show');
Route::get('/jenis',[SuratJSONController::class, 'showCard'])->name('jenis.index');
Route::get('/jenisSatu',[SuratJSONController::class, 'jenisSatu'])->name('jenis.satu');
Route::get('/jenisDua',[SuratJSONController::class, 'jenisDua'])->name('jenis.dua');

Route::get('userP',[UserJSONController::class,'index']);
Route::get('generatepdf',[UserJSONController::class,'generatepdf'])->name('user.pdf');








