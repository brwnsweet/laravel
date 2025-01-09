<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return VIEW('welcome');
// });

// // // 127.0.0.1:8000/siswa dan menampilkan
// // // teks SAYA SISWA H1
// // Route::get('/siswa', function () {
// //     return "<h1>SAYA SISWA</h1>";
// // });

// // // 127.0.0.1:8000/siswa dan menampilkan
// // // teks "SAYA SISWA ID 1" H1
// // Route::get('/siswa/{id}', function ($id) {
// //     return "<h1>SAYA SISWA $id</h1>";
// // })->where(['id'=>'[0-9]+']);

// // Route::get('/siswa/{id}/{nama}', function ($id,$nama) {
// //     return "<h1>SAYA SISWA $id DENGAN NAMA $nama</h1>";
// // })->where(['id'=>'[0-9]+','nama'=>'[A-Za-z]+']);

Route::get('siswa', [SiswaController::class,'index']);
Route::get('siswa/{id}', [SiswaController::class,'detail'])->where('id','[0-9]+');


// // Route::get('/guru/{id}/{nama}', function ($id,$nama) {
// //      return "<h1>SAYA GURU ID $id DENGAN NAMA $nama</h1>";
// // })->where(['id'=>'[0-9]+','nama'=>'[A-Za-z]+']);


// Route::get('guru', action: [GuruController::class,'index']);
// Route::get('guru/{id}/{nama}', [GuruController::class, 'detail'])
Route::get('kelas', action: [GuruController::class,'index']);
Route::get('kelas/{id}', [GuruController::class, 'detail'])
->where(['id' => '[0-9]+']);

Route::get('/', [HalamanController::class,'index']);
Route::get('/tentang', [HalamanController::class,'tentang']);
Route::get('/kontak', [HalamanController::class,'kontak']);