@extends('layouts.web')

@section('content')
<div class="row">
    <div class="col-md-6 ">
        <div class="row card-custom shadow-lg m-1 p-3">
            <p class="fs-6 fw-bold">Pelanggaran Tahun ini</p>
            <canvas id="pelanggaran-chart-tahun"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row card-custom shadow-lg m-1 p-3">
            <p class="fs-6 fw-bold">Pelanggar Sesuai Angkatan</p>
            <canvas id="kelas-chart-minggu"></canvas>
        </div>
    </div>
</div>

<div class="col-md-12 mt-5">
    <div class="row card-custom shadow-lg m-1 p-3">
        <p class="fs-6 fw-bold">Pelanggaran Bulan Ini</p>
        <canvas id="pelanggaran-chart-bulan"></canvas>
    </div>
</div>


<!-- Chart Js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const pelanggaranTahunChart = document.getElementById('pelanggaran-chart-tahun');

    const labelsTahun = @json($labelsTahun);
    const kelas10Tahun = @json($kelas10Tahun);
    const kelas11Tahun = @json($kelas11Tahun);
    const kelas12Tahun = @json($kelas12Tahun);


    new Chart(pelanggaranTahunChart, {
        type: 'line',
        data: {
            labels: labelsTahun,
            datasets: [{
                label: 'Kelas 10',
                data: kelas10Tahun,
            },{
                label: 'Kelas 11',
                data: kelas11Tahun,
            },{
                label: 'Kelas 12',
                data: kelas12Tahun,
            },

        ],
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
        },
    });
</script>

<script>
    const kelasMingguChart = document.getElementById('kelas-chart-minggu');

    const listKelas = ["Kelas 10", "Kelas 11", "Kelas 12"];

    listPelanggaranKelas = [@json($totalKelas10), @json($totalKelas11), @json($totalKelas12)];

    const listBorderColor = [
        'rgba(255, 99, 132)',
        'rgba(255, 159, 64)',
        'rgba(255, 205, 86)',
    ]

    new Chart(kelasMingguChart, {
        type: 'bar',
        data: {
            labels: listKelas,
            datasets: [{
                label: 'Pelanggaran',
                data: listPelanggaranKelas,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                ],
            }],
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
        },
    });
</script>

<script>
    const pelanggaranBulanChart = document.getElementById('pelanggaran-chart-bulan');

    const labelsTanggal = @json($labelsTanggal);
    const kelas10Tanggal = @json($kelas10Tanggal);
    const kelas11Tanggal = @json($kelas11Tanggal);
    const kelas12Tanggal = @json($kelas12Tanggal);

    new Chart(pelanggaranBulanChart, {
        type: 'bar',
        data: {
            labels: labelsTanggal,
            datasets: [{
                label: 'Kelas 10',
                data: kelas10Tanggal,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                ],
            }
            ,{
                label: 'Kelas 11',
                data: kelas11Tanggal,
                backgroundColor: [
                    'rgb(75, 192, 192)',
                ],
                borderColor: [
                    'rgb(75, 192, 192)',
                ],
            },{
                label: 'Kelas 12',
                data: kelas12Tanggal,
                backgroundColor: [
                    'rgb(153, 102, 255)'
                ],
                borderColor: [
                    'rgb(153, 102, 255)',
                ],
            }
        ],
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
        }
    });
</script>
@endsection