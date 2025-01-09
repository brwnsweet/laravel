@extends('layout/aplikasi')
@section('konten')
        <h1>Halaman Kontak</h1>
        <p>Ini Halaman Blade Template Laravel</p>
        <p>
            <ul>
                <li>Email : {{$kontak['email']}}</li>
                <li>Instagram : {{$kontak['ig']}}</li>
            </ul>
        </p>
@endsection
 