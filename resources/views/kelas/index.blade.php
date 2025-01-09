@extends('layout/index')
@section('konten')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
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
            <td>{{ $item->nama_kelas }}</td>
            <td>{{ $item->walikelas }}</td>
            <td>{{ $item->jumlah_siswa }}</td>
            <td><a href='{{ url('/kelas/'.$item->id)}}' class='btn btn-secondary btn-sm'>Detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links() }}
@endsection