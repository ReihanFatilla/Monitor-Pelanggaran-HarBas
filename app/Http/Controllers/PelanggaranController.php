<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggaran = Pelanggaran::with('kategori')->get();

        return view('pelanggaran.index', compact('pelanggaran'));
    }

    public function view_input()
    {
        $kategori = Kategori::all();
        $kelas = Kelas::pluck('nama');
        $guru = User::where('level', 'guru')->pluck('name');
        $nama = Siswa::with('user')->get()->map(function ($item) {
            return $item->user->name;
        });

        return view('pelanggaran.insert', compact('kategori', 'guru', 'kelas', 'nama'));
    }

    public function get_nisn(Request $request)
    {
        $name = $request->input('name');
        $user = Siswa::where('id_user', User::where('name', $name)->first()->id)->first();
        $nisn = $user->nisn;

        return response()->json(['nisn' => $nisn]);
    }

    public function get_nama_by_kelas(Request $request)
    {
        $kelas = $request->input('kelas');
        $nama = Siswa::where('id_kelas', Kelas::where('nama', $kelas)->first()->id)->get()->map(function ($item) {
            return $item->user->name;
        });

        return response()->json(['nama' => $nama]);
    }
}
