<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// Route::get('siswa', [SiswaController::class,'index']);
// Route::get('siswa/{id}', [SiswaController::class,'detail'])->where('id','[0-9]+');
Route::resource('siswa', SiswaController::class)->middleware('isLogin');


// // Route::get('/guru/{id}/{nama}', function ($id,$nama) {
// //      return "<h1>SAYA GURU ID $id DENGAN NAMA $nama</h1>";
// // })->where(['id'=>'[0-9]+','nama'=>'[A-Za-z]+']);


// Route::get('guru', action: [GuruController::class,'index']);
// Route::get('guru/{id}/{nama}', [GuruController::class, 'detail'])
//Route::get('kelas', action: [GuruController::class,'index']);
// Route::get('kelas/{id}', [GuruController::class, 'detail'])
// ->where(['id' => '[0-9]+']);
Route::resource('kelas', KelasController::class);

//Route::get('/', [HalamanController::class,'index']);
Route::get('/',function(){
    return view('sesi/welcome');
})->middleware('isAktif');
Route::get('/tentang', [HalamanController::class,'tentang']);
Route::get('/kontak', [HalamanController::class,'kontak']);

Route::get('/sesi', [SessionController::class,'index'])->middleware('isAktif');
Route::post('/sesi/login', [SessionController::class,'login'])->middleware('isAktif');
Route::get('/sesi/logout', [SessionController::class,'logout']);
Route::get('/sesi/register', [SessionController::class,'register'])->middleware('isAktif');
Route::post('/sesi/create', [SessionController::class,'create']);
