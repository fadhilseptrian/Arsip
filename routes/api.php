<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratJSONController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserJSONController; 
use App\Http\Controllers\LoginJSONController; 


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
    Route::get('user',[UserJSONController::class,'index'])->name('user.index')->middleware(['auth:sanctum']);
    Route::get('user/create', [UserJSONController::class, 'create'])->name('user.create')->middleware(['auth:sanctum']);
    Route::post('user/store',[UserJSONController::class,'store'])->name('user.store')->middleware(['auth:sanctum']);
    Route::get('user.editUser/{id}', [UserJSONController::class, 'edit'])->name('user.editUser')->middleware(['auth:sanctum']);
    Route::put('user/{id}', [UserJSONController::class, 'update'])->name('user.update')->middleware(['auth:sanctum']);
    Route::delete('user/{id}', [UserJSONController::class, 'destroy'])->name('user.destroy')->middleware(['auth:sanctum']);
// });

// Tampilan kusus Super admin dan admin 
// Route::group(['middleware'=>['auth','adminMidlleware:0,1']], function(){      
Route::get('surat/create', [SuratJSONController::class, 'create'])->name('surat.create')->middleware(['auth:sanctum']);
Route::post('surat/store', [SuratJSONController::class, 'store'])->name('surat.store')->middleware(['auth:sanctum']);
Route::get('surat/{id}/edit', [SuratJSONController::class, 'edit'])->name('surat.edit')->middleware(['auth:sanctum']);
Route::put('surat/{id}', [SuratJSONController::class, 'update'])->name('surat.update')->middleware(['auth:sanctum']);
Route::delete('surat/{id}', [SuratJSONController::class, 'destroy'])->name('surat.destroy')->middleware(['auth:sanctum']);
// });


// Tamilan umum
// Route::group(['middleware'=>['auth','adminMidlleware:0,1,2']], function(){
    Route::get('surat', [SuratJSONController::class, 'index'])->name('surat.index')->middleware(['auth:sanctum']);
    Route::get('surat/{id}', [SuratJSONController::class, 'show'])->name('surat.show')->middleware(['auth:sanctum']);

// });


Route::get('/admin',[SuratJSONController::class,'admin'])->name('admin.index')->middleware(['auth:sanctum']);


Route::get('user/{id}',[UserJSONController::class,'show'])->name('user.show')->middleware(['auth:sanctum']);
Route::get('/jenis',[SuratJSONController::class, 'showCard'])->name('jenis.index')->middleware(['auth:sanctum']);
Route::get('/jenisSatu',[SuratJSONController::class, 'jenisSatu'])->name('jenis.satu')->middleware(['auth:sanctum']);
Route::get('/jenisDua',[SuratJSONController::class, 'jenisDua'])->name('jenis.dua')->middleware(['auth:sanctum']);

Route::get('userP',[UserJSONController::class,'index'])->middleware(['auth:sanctum']);
Route::get('generatepdf',[UserJSONController::class,'generatepdf'])->name('user.pdf')->middleware(['auth:sanctum']);


Route::post('/login',[LoginJSONController::class,'login']);