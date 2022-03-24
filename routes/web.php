<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashadminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Artisan;



Route::get('/', [PageController::class, 'index']);
Route::get('/info/{slug}', [PageController::class, 'konten']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/admin/phototag', [PhotoController::class, 'index']);
Route::get('/admin/phototag/{id}/edit', [PhotoController::class, 'editPhotoTag']);
Route::post('/admin/phototag', [PhotoController::class, 'storePhotoTag']);
Route::delete('/admin/phototag/{id}/hapus', [PhotoController::class, 'deletePhotoTag']);

Route::get('/admin/photo', [PhotoController::class, 'photo']);
Route::patch('/admin/photo', [PhotoController::class, 'storePhoto']);
Route::get('/admin/photo/{id}', [PhotoController::class, 'editPhoto']);
Route::patch('/admin/photo/{id}/edit', [PhotoController::class, 'editProcessPhoto']);
Route::get('/admin/photo/{id}/find', [PhotoController::class, 'findPhoto']);
Route::delete('/admin/photo/{id}/hapus', [PhotoController::class, 'deletePhoto']);

Route::get('/admin', [DashadminController::class, 'index'])->middleware('cekadmin');

Route::get('/admin/konten', [PenggunaController::class, 'index']);
Route::get('/admin/konten/{id}', [PenggunaController::class, 'ubahkonten']);
Route::patch('/admin/konten/ubah/{id}', [PenggunaController::class, 'updatekonten']);

Route::get('/admin/menu', [PenggunaController::class, 'menu']);
Route::get('/admin/menu/tambah', [PenggunaController::class, 'tambahmenu']);
Route::put('/admin/menu/simpan', [PenggunaController::class, 'simpanmenu']);
Route::delete('/admin/menu/hapus/{id}', [PenggunaController::class, 'hapusmenu']);
Route::get('/admin/menu/{id}', [PenggunaController::class, 'ubahmenu']);
Route::patch('/admin/menu/ubah/{id}', [PenggunaController::class, 'updatemenu']);

Route::get('/admin/menusub', [PenggunaController::class, 'menusub']);
Route::get('/admin/menusub/tambah', [PenggunaController::class, 'tambahmenusub']);
Route::put('/admin/menusub/simpan', [PenggunaController::class, 'simpanmenusub']);
Route::delete('/admin/menusub/hapus/{id}', [PenggunaController::class, 'hapusmenusub']);
Route::get('/admin/menusub/{id}', [PenggunaController::class, 'ubahmenusub']);
Route::patch('/admin/menusub/ubah/{id}', [PenggunaController::class, 'updatemenusub']);

Route::get('/admin/artikel', [PenggunaController::class, 'artikel']);
Route::get('/admin/artikel/tambah', [PenggunaController::class, 'tambahartikel']);
Route::put('/admin/artikel/simpan', [PenggunaController::class, 'simpanartikel']);
Route::delete('/admin/artikel/hapus/{id}', [PenggunaController::class, 'hapusartikel']);
Route::get('/admin/artikel/{id}', [PenggunaController::class, 'ubahartikel']);
Route::patch('/admin/artikel/ubah/{id}', [PenggunaController::class, 'updateartikel']);

Route::get('/admin/kategori', [PenggunaController::class, 'kategori']);
Route::get('/admin/kategori/tambah', [PenggunaController::class, 'tambahkategori']);
Route::put('/admin/kategori/simpan', [PenggunaController::class, 'simpankategori']);
Route::delete('/admin/kategori/hapus/{id}', [PenggunaController::class, 'hapuskategori']);
Route::get('/admin/kategori/{id}', [PenggunaController::class, 'ubahkategori']);
Route::patch('/admin/kategori/ubah/{id}', [PenggunaController::class, 'updatekategori']);

Route::get('/admin/pengguna', [PenggunaController::class, 'pengguna']);
Route::get('/admin/pengguna/tambah', [PenggunaController::class, 'tambahpengguna']);
Route::patch('/admin/pengguna/simpan', [PenggunaController::class, 'simpanpengguna']);
Route::delete('/admin/pengguna/hapus/{id}', [PenggunaController::class, 'hapuspengguna']);
Route::get('/admin/pengguna/{id}', [PenggunaController::class, 'ubahpengguna']);
Route::patch('/admin/pengguna/ubah/{id}', [PenggunaController::class, 'updatepengguna']);
Route::get('/admin/pengguna/reset/{id}', [PenggunaController::class, 'resetpengguna']);
Route::patch('/admin/pengguna/reset/{id}', [PenggunaController::class, 'savepassword']);

Route::get('/admin/akun/pass/{id}', [PenggunaController::class, 'passakun']);
Route::patch('/admin/akun/save/{id}', [PenggunaController::class, 'savepassakun']);

Route::get('/admin/slide', [PenggunaController::class, 'slide']);
Route::patch('/admin/slideupload', [PenggunaController::class, 'slideupload']);

Route::get('/search/hasil', [SearchController::class, 'index']);
Route::post('/search', [SearchController::class, 'index']);


Route::get('/logout', [LoginController::class, 'logout']);

// clear all cache
Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    dd("Cache Clear All");
});

//route artikel berita
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/{slug}', [ArtikelController::class, 'detail']);