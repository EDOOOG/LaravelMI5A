<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class DashboardController extends Controller
{
    public function index(){

        $mahasiswa = DB::select('SELECT prodis.nama,COUNT(*) AS jumlah
FROM mahasiswas
JOIN prodis ON mahasiswas.prodi.id = prodi.id
GROUP BY prodi.nama');
        return View('dashboard')->with('mahasiswa',$mahasiswa);

    }
    
    
}
