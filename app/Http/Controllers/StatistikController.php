<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {

        $kelas10Tahun = Pelanggaran::whereHas('siswa', function($siswa){
            $siswa->whereHas('kelas', function($kelas){
                $kelas->where('nama', 'LIKE', '%10%');
            });
        })->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $kelas11Tahun = Pelanggaran::whereHas('siswa', function($siswa){
            $siswa->whereHas('kelas', function($kelas){
                $kelas->where('nama', 'LIKE', '%11%');
            });
        })->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $kelas12Tahun = Pelanggaran::with(['siswa.kelas' => function ($query) {
            $query->where('nama', 'LIKE', '%12%');
        }])->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $labelsTahun = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month_name')
            ->map(function ($m) {
                return substr($m, 0, 3);
            });

        $labelsTanggal = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("DAY(created_at) as date"))
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('date');

        $kelas10Tanggal = Pelanggaran::with(['siswa.kelas' => function ($query) {
            $query->where('nama', 'LIKE', '%10%');
        }])->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');

        $kelas11Tanggal = Pelanggaran::with(['siswa.kelas' => function ($query) {
            $query->where('nama', 'LIKE', '%11%');

        }])->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');

        $kelas12Tanggal = Pelanggaran::with(['siswa.kelas' => function ($query) {
            $query->where('nama', 'LIKE', '%12%');

        }])->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');

        $totalKelas10 = Pelanggaran::with(['siswa.kelas' => function ($query) {
            $query->where('nama', 'LIKE', '%10%');
        }])->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->count();

        $totalKelas11 = Pelanggaran::with(['siswa.kelas' => function ($query) {
            $query->where('nama', 'LIKE', '%11%');
        }])->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->count();

        $totalKelas12 = Pelanggaran::with(['siswa.kelas' => function ($query) {
            $query->where('nama', 'LIKE', '%12%');
        }])->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->count();


        return view('statistik.index', compact('labelsTahun', 'kelas10Tahun', 'kelas11Tahun', 'kelas12Tahun', 'labelsTanggal', 'kelas10Tanggal', 'kelas11Tanggal', 'kelas12Tanggal', 'totalKelas10', 'totalKelas11', 'totalKelas12'));
    }
}
