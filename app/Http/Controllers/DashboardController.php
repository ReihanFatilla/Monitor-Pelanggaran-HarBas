<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $totalPelanggaran = Pelanggaran::count();
        $totalPelanggar = Pelanggaran::distinct('id_siswa')->count('id_siswa');
        $totalGuru = User::where('level', 'guru')->count();
        $totalSiswa = Siswa::count();

        $pelanggarTerbanyak = Pelanggaran::with(['siswa.user' => function ($query) {
            $query->select('id', 'name');
        }])
        ->select('id_siswa')
            ->selectRaw('count(id_siswa) as total')
            ->groupBy('id_siswa')
            ->orderBy('total', 'desc')
            ->limit(8)
            ->get();

            $labelPerDayWeekly = Pelanggaran::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->selectRaw('count(id) as total, dayname(created_at) as day')
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck("day");

            $totalPerDayWeekly = Pelanggaran::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->selectRaw('count(id) as total, dayname(created_at) as day')
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck("total");

        return view('dashboard.index', compact('totalPelanggaran', 'totalPelanggar', 'totalGuru', 'totalSiswa', 'pelanggarTerbanyak', 'totalPerDayWeekly', 'labelPerDayWeekly'));
    }
}
