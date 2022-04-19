<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResultEnterController;
use App\Http\Controllers\ResultPrintController;
use App\Http\Controllers\AddReaktivController;
use App\Http\Controllers\ReportReaktivController;
use App\Http\Controllers\ArchiveController;

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
// -------------- Natijalarni kiritish uchun
Route::get('/resultenter', [ResultEnterController::class,'index'])->name('resultindex');
Route::get('/resultenter/{id}', [ResultEnterController::class,'show']);
Route::post('/resultenter', [ResultEnterController::class,'store'])->name('resultsave');

Route::get('/resultprint', [ResultPrintController::class,'index'])->name('resultprint');
Route::get('/resultprint/{id}', [ResultPrintController::class,'show']);


Route::get('/reaktiv', [AddReaktivController::class,'index'])->name('reaktiv');
Route::post('/reaktiv_in', [AddReaktivController::class,'reaktiv_in'])->name('reaktiv_in');
Route::post('/reaktiv_out', [AddReaktivController::class,'reaktiv_out'])->name('reaktiv_out');


Route::get('/report', [ReportReaktivController::class, 'index'])->name('report.index');
Route::post('/report', [ReportReaktivController::class, 'find'])->name('report.find');
Route::get('report/{id}', [ReportReaktivController::class, 'show'])->name('report.show');

Route::get('/archive', [ArchiveController::class,'index'])->name('archive.index');
Route::post('/archive', [ArchiveController::class,'find'])->name('archive.find');
Route::get('/archive/{id}', [ArchiveController::class,'show']);


// -------------- Natijalarni kiritish uchun

Route::get('/{save?}', [RegistrationController::class,'index'])->name('index');
Route::post('/reg', [RegistrationController::class,'add'])->name('reg');


