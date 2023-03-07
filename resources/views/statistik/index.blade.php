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

    const listMonths = ["Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agus", "Sept", "Nov", "Des"]
    const listPelanggaran = [50, 40, 35, 67, 63, 23, 24, 53, 14, 19, 20, 28]


    new Chart(pelanggaranTahunChart, {
        type: 'line',
        data: {
            labels: listMonths,
            datasets: [{
                label: 'Pelanggaran',
                data: listPelanggaran,

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

<script>
    const kelasMingguChart = document.getElementById('kelas-chart-minggu');

    const listKelas = ["Kelas 10", "Kelas 11", "Kelas 12"];

    const listPelanggaranKelas = [8, 12, 23]

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

        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    const pelanggaranBulanChart = document.getElementById('pelanggaran-chart-bulan');

    const listBulan = @json($labels);
    const listPelanggaranTahun = @json($data);

    const listPelanggaranBulan = function(){
        var listPelanggaran = [];
        for(var i = 0; i<=30;i++){
            listPelanggaran.push(Math.floor(Math.random() * 50) + 1)
        }
        return listPelanggaran
    };

    new Chart(pelanggaranBulanChart, {
        type: 'bar',
        data: {
            labels: listBulan,
            datasets: [{
                label: 'Kelas 10',
                data: listPelanggaranTahun,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                ],
            }
            // ,{
            //     label: 'Kelas 11',
            //     data: listPelanggaranBulan(),
            //     backgroundColor: [
            //         'rgb(75, 192, 192)',
            //     ],
            //     borderColor: [
            //         'rgb(75, 192, 192)',
            //     ],
            // },{
            //     label: 'Kelas 12',
            //     data: listPelanggaranBulan(),
            //     backgroundColor: [
            //         'rgb(153, 102, 255)'
            //     ],
            //     borderColor: [
            //         'rgb(153, 102, 255)',
            //     ],
            // }
        ],
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