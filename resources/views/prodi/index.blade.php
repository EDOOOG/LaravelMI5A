@extends('layouts.main')

@section('content')
<h4>Program Studi</h4>
<a href="{{ route ('prodi.create')}}" class="btn btn-primary">Tambah</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Program Studi</th>
            <th>Nama Dekan</th>
            <th>Singkatan</th>
            <th>Fakultas</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prodi as $row )
        <tr>
            <td>{{$row['nama']}}</td>
            <td>{{$row['Kaprodi']}}</td>
            <td>{{$row['singkatan']}}</td>
            <td>{{$row['fakultas']['nama']}}</td>
            <td><a href="{{route('prodi.edit', $row['id'])}}" class="btn btn-xs btn-warning">Ubah</a>
            <form action="{{route('prodi.destroy',$row['id'])}}" method="post" 
            style="display:inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-xs btn-danger">Hapus</button>
            </form>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection