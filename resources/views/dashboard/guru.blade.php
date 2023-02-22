@extends('layouts.web')

@section('content')
<p class="fs-4">Statistik Pelanggaran</p>

<link rel="stylesheet" href="{{ asset('css/dashboard-guru.css') }}">
<div class="row justify-content-evenly statistic">
    <div class="col-md-3">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-2">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-evenly mt-4">
    <div class="col-md-4">
        <div class="row card-statistic align-content-start shadow-lg m-1 p-3 h-100">
            <p class="fs-6 mt-3">Pelanggar Terbanyak</p>
            <div class="container mt-1">
                @php
                $pelanggar = [
                'Muhammad Reihan Fatilla',
                'Galang Davian Pradana',
                'Aldimas Fajar Kurniawan'
                ];

                $jumlahPelanggaran = [
                '15',
                '21',
                '10'
                ];

                $pelanggarSize = sizeof($pelanggar);
                @endphp

                @for($i = 0; $i < $pelanggarSize; $i++) 
                <div class="row">
                    <div class="col-8">
                        <p` class="fs-6">@php
                            $index = $i+1;
                            echo $index.". ".$pelanggar[$i];
                            @endphp
                        </p>
                    </div>
                    <div class="col-4">
                        <p class="fs-6 text-end">@php
                            echo $jumlahPelanggaran[$i];
                            @endphp
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="row card-statistic shadow-lg m-1 p-3 h-100">
        <p class="fs-4">Pelanggaran Minggu Ini</p>
        <canvas id="pelanggaran-chart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('pelanggaran-chart');


    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
            datasets: [{
                label: 'Pelanggaran',
                data: [5, 19, 3, 5, 2, 3, 1],

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