@extends('layout/index')
@section('konten')
<table class="table">
    <thead>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td><a href='{{ url('/siswa/'.$item->nis)}}' class='btn btn-secondary btn-sm'>Detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links() }}
@endsection