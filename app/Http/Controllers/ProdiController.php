<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Panggil model fakultas
        $result = Prodi::all();
        //dd($result);

        //kirim data $result ke views fakultas index.php
        return view('prodi.index')->with('prodi', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view(view: 'prodi.create')->with('fakultas', $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //validasi input sblm simpan
        $input = $request->validate( [
            "nama" => "required|unique:prodis",
            "Kaprodi" => "required",
            "singkatan" => "required",
            "fakultas_id"=>"required"
        ]);

        //simpan
        Prodi::create($input);

        //redirect beserta pesan success
        return redirect()->route('prodi.index')->with('success',
        $request->nama.' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $prodi = prodi::find($id);
         $fakultas = fakultas::all();
      // dd($fakultas);
       return view('prodi.edit')
       ->with('prodi',$prodi)
       ->with('fakultas',$fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $prodi= Prodi::find($id);
        //dd($prodi);
        //validasi input sblm simpan
        $input = $request->validate( [
            "nama" => "required",
            "Kaprodi" => "required",
            "singkatan" => "required",
            "fakultas_id" => "required"
        ]);

        //update data
        $prodi->update($input);

        //redirect beserta pesan success
        return redirect()->route('prodi.index')->with('success',
        $request->nama.' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $prodi = prodi::find($id);
       // dd($fakultas);
       $prodi->delete();
       return redirect()->route('prodi.index')->with('success','Data prodi berhasil dihapus');
    }
}