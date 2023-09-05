<?php

use App\Http\Controllers\ArtikelApiController;
use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/artikel', [ArtikelApiController::class, 'index']);
Route::get('/artikel', function () {
    $all_artikel = Artikel::with('kategori', 'user')->latest()->limit(6)->get();
    return $all_artikel;
});