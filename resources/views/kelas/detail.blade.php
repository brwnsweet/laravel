@extends('layout/index')
@section('konten')
<div>
    <a href="/kelas" class="btn btn-secondary"><< KEMBALI</a>
    <h1>{{$data->nama_kelas}}</h1>
    <p>
        <b>Wali Kelas: </b>{{$data->walikelas}}
    </p>
    <p>
        <b>Jumlah: </b>{{$data->jumlah_siswa}}
    </p>
</div>
@endsection