@extends('layout/index')
@section('konten')
<div>
    <a href="/siswa" class="btn btn-secondary"><< KEMBALI</a>
    <h1>{{$data->nama}}</h1>
    <p>
        <b>Nomor Induk Siswa: </b>{{$data->nis}}
    </p>
    <p>
        <b>Alamat: </b>{{$data->alamat}}
    </p>
</div>
@endsection