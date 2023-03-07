<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(){
        $pelanggaran = Pelanggaran::with('kategori')->get();
        
        // $kategori = Pelanggaran::with("kategori")->get()->nama_kategori;
        return view('pelanggaran.index', compact('pelanggaran'));
    }
}
