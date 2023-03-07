<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(){
        // return response()->json([
        //     'pelanggaran' => Pelanggaran::with('kategori')->get(),
        // ], 200);
        return view('pelanggaran.index');
    }
}
