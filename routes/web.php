<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CreateShortURLController;

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

Route::get('/', function () {
    return Redirect::to("https://matthewgilpin.com");
});


Route::get('/shorten', [CreateShortURLController:: class, 'index']);
Route::post('/shorten/me', [CreateShortURLController:: class, 'update'])->name('shorten');
Route::post('/shorten', [CreateShortURLController:: class, 'store']);
Route::get('/s/{shortURLKey}', '\AshAllenDesign\ShortURL\Controllers\ShortURLController');