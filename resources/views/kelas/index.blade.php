@extends('layout/index')
@section('konten')
<a href="/kelas/create" class="btn btn-primary">+ Tambah Data Kelas</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Jumlah siswa</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>
                @if ($item->foto)
                <img style="max-width:50%;max-height:50px" src="{{ url('foto'). '/' .$item->foto }}">
                @endif
            </td>
            <td>{{ $item->nama_kelas }}</td>
            <td>{{ $item->walikelas }}</td>
            <td>{{ $item->jumlah_siswa }}</td>
            <td>
                <a href='{{ url('/kelas/'.$item->id)}}' class='btn btn-secondary btn-sm'>Detail</a>
                <a href='{{ url('/kelas/'.$item->id.'/edit') }}' class='btn btn-warning btn-sm'>Edit</a>
                <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data??')" class="d-inline" action="{{'/kelas/'.$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links() }}
@endsection