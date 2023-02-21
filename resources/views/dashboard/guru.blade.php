@extends('layouts.web')

@section('content')
<p class="fs-4">Statistik Pelanggaran</p>

<link rel="stylesheet" href="{{ asset('css/dashboard-guru.css') }}">
<div class="row justify-content-evenly statistic">
    <div class="col-md-3">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-md-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-md-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-md-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-md-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-md-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-md-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row card-statistic shadow-lg m-1">
            <div class="col-md-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-md-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-5 fw-bold">102</p>
            </div>
        </div>
    </div>
</div>
@endsection