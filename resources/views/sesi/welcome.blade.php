@extends('layout/index')
@section('konten')
<div class="w-50 text-center border rounded px-3 py-3 max-auto">
    <h1>Selamat Datang</h1>
    <p>Silahkan LOGIN atau REGISTER untuk mengakses data SISWA dan KELAS</p>
    <a href="/siswa" class="btn btn-primary btn-lg">LOGIN</a>
    <a href="/siswa/register" class="btn btn-success btn-lg">REGISTER</a>
</div>
@endsection