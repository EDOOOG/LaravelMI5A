@extends('layouts.main')

@section('content')
    <h4>FAKULTAS</h4>
    <form action="{{ route('fakultas.update',$fakultas['id']) }}" method="post">
        @csrf
        @method('PUT')
        Nama
        @error('nama')
        {{$message}}
        @enderror
        <input type="text" name="nama" id="" class="form-control mb-2"
        value="{{$fakultas['nama']}}">

        Dekan
        @error('dekan')
        {{$message}}
        @enderror
        <input type="text" name="dekan" id="" class="form-control mb-2"
        value="{{$fakultas['dekan']}}">

        singkatan
        @error('singkatan')
        {{$message}}
        @enderror
        <input type="text" name="singkatan" id="" class="form-control mb-2"
        value="{{$fakultas['singkatan']}}">

        
     
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection