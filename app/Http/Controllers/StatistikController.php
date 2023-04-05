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

        $kelas10Tahun = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->where('kelas', 'LIKE', '%10%')
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $kelas11Tahun = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->where('kelas', 'LIKE', '%11%')
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $kelas12Tahun = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->where('kelas', 'LIKE', '%12%')
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

        $kelas10Tanggal = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->where('kelas', 'LIKE', '%10%')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');

        $kelas11Tanggal = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->where('kelas', 'LIKE', '%11%')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');

        $kelas12Tanggal = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->where('kelas', 'LIKE', '%12%')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count');

        $totalKelas10 = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->where('kelas', 'LIKE', '%10%')
            ->count();

        $totalKelas11 = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->where('kelas', 'LIKE', '%11%')
            ->count();

        $totalKelas12 = Pelanggaran::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->where('kelas', 'LIKE', '%12%')
            ->count();


        return view('statistik.index', compact('labelsTahun', 'kelas10Tahun', 'kelas11Tahun', 'kelas12Tahun', 'labelsTanggal', 'kelas10Tanggal', 'kelas11Tanggal', 'kelas12Tanggal', 'totalKelas10', 'totalKelas11', 'totalKelas12'));
    }
}
