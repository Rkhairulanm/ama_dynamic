<?php

use App\Http\Controllers\AskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;

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

Route::get('/', [ViewController::class, 'beranda']);
Route::get('/tentang', [ViewController::class, 'tentang']);
Route::get('/aktifitas', [ViewController::class, 'aktifitas']);
Route::get('/artikel', [ViewController::class, 'artikel']);
Route::get('/artikel-detail-{id}', [ViewController::class, 'artikeldetail']);
Route::get('/acara', [ViewController::class, 'acara']);
Route::get('/acara-sebelumnya', [ViewController::class, 'oldacara']);
Route::get('/acara-detail-{id}', [ViewController::class, 'acaradetail']);
Route::get('/gallery', [ViewController::class, 'gallery']);
Route::get('/testimoni', [ViewController::class, 'testimoni']);
Route::get('/kontak', [ViewController::class, 'kontak']);
Route::post('/kontak-send', [AskController::class, 'kontak']);
Route::post('/subs-send', [AskController::class, 'subs']);

