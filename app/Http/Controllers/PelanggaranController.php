<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(){
        $pelanggaran = Pelanggaran::with('kategori')->get();

        
        return view('pelanggaran.index', compact('pelanggaran'));
    }

    public function view_input(){
        $input_pelanggaran = Pelanggaran::all();
        return view('pelanggaran.input-pelanggaran', compact('input_pelanggaran'));
    }
}
