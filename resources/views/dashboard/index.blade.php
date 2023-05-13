@extends('layouts.web')

@section('content')
<p class="fs-4">Statistik Pelanggaran</p>
<div class="row justify-content-evenly statistic">
    <div class="col-md-3">
        <div class="row card-custom shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">{{ $totalPelanggaran }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-custom shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bxs-user-x nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggar</h5>
                <p class="fs-5 fw-bold">{{ $totalPelanggar }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-custom shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bxs-group nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Siswa</h5>
                <p class="fs-5 fw-bold">{{ $totalSiswa }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-custom shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bxs-user-check nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Guru</h5>
                <p class="fs-5 fw-bold">{{ $totalGuru }}</p>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-evenly mt-4">
    <div class="col-md-4">
        <div class="row card-custom align-content-start shadow-lg m-1 p-3 h-100">
            <p class="fs-6 mt-3">Pelanggar Terbanyak</p>
            <div class="container mt-1">
                @foreach($pelanggarTerbanyak as $pelanggar)
                <div class="row">
                    <div class="col-10">
                        <p` class="fs-6">@php
                            echo $loop->iteration.". ".$pelanggar->siswa->user->name;
                            @endphp
                            </p>
                    </div>
                    <div class="col-2">
                        <p class="fs-6 text-end">@php
                            echo $pelanggar->total;
                            @endphp
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row card-custom shadow-lg m-1 p-3 h-100">
            <p class="fs-4">Pelanggaran Minggu Ini</p>
            <canvas id="pelanggaran-chart"></canvas>
        </div>
    </div>

    <!-- Chart Js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('pelanggaran-chart');
        
        var totalPerDayWeekly = @json($totalPerDayWeekly);
        var labelPerDayWeekly = @json($labelPerDayWeekly);
        

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelPerDayWeekly,
                datasets: [{
                    label: 'Pelanggaran',
                    data: totalPerDayWeekly,

                }],
                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    @endsection