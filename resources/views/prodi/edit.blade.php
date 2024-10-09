@extends('layouts.main')

@section('content')
    <h4>PRODI</h4>
    <form action="{{ route('prodi.update',$prodi['id']) }}" method="post">
        @csrf
        @method('PUT')
        Nama
        @error('nama')
        {{$message}}
        @enderror
        <input type="text" name="nama" id="" class="form-control mb-2"
        value="{{$prodi['nama']}}">

        Kaprodi
        @error('Kaprodi')
        {{$message}}
        @enderror
        <input type="text" name="Kaprodi" id="" class="form-control mb-2"
        value="{{$prodi['Kaprodi']}}">

        singkatan
        @error('singkatan')
        {{$message}}
        @enderror
        <input type="text" name="singkatan" id="" class="form-control mb-2"
        value="{{$prodi['singkatan']}}">
        Fakultas
         <select name="fakultas_id" class="form-control">
            @foreach ($fakultas as $item)
                <option value="{{ $item['id'] }}"{{$item['id'] == $prodi['fakultas_id']?"selected":null}}> {{ $item['nama']}}</option>
            @endforeach
        </select>

        
     
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection