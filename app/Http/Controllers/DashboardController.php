<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class DashboardController extends Controller
{
    public function index() {
        $mahasiswa = DB::select
        ('SELECT prodis.nama, COUNT(*) as jumlah 
            FROM mahasiswas
            JOIN prodis ON mahasiswas.prodi_id = prodis.id
            GROUP BY prodis.nama');

        $mahasiswa_tempat_lahir = DB::select
        ('SELECT mahasiswas.tempat_lahir, COUNT(*) as jumlah 
                 FROM mahasiswas
                 GROUP BY mahasiswas.tempat_lahir ');
        return view('dashboard')
            ->with('mahasiswa', $mahasiswa)
            ->with('mahasiswa_tempat_lahir', $mahasiswa_tempat_lahir);
    }
}