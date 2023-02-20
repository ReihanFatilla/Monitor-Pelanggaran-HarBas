@extends('layouts.web')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard-guru.css') }}">
<div class="row">
    <div class="col-md-3 card-statistic shadow">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <i class='bx bx-info-circle nav_icon my-auto bx-md bx-light'></i>
            </div>
            <div class="col-md-8 center-block">
                <h5 class="fs-6 text-muted mt-3">Total Pelanggaran</h5>
                <p class="fs-4 fw-bold">102</p>
            </div>
        </div>
    </div>
</div>
@endsection