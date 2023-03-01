@extends('layouts.web')

@section('content')
<div class="card-custom shadow-lg m-1 p-3">
    <table id="pelanggaran-table" class="pelanggaran hover" style="width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Jenis Pelanggaran</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @for($i = 0; $i < 100; $i++) <tr>
                <td><?php echo $no ?></td>
                <td>Saleh Rashid</td>
                <td>XI RPL B</td>
                <td>23 Januari 2022</td>
                <td>Pemalakan</td>
                <td>Memalak adek kelas 500 juta</td>
                </tr>
                <?php $no++ ?>
                <td><?php echo $no ?></td>
                <td>Seprete Kurnimawan</td>
                <td>X TKJ C</td>
                <td>27 Maret 2022</td>
                <td>Bully</td>
                <td>memenggal kepala teman sekelas</td>
                </tr>
                <?php $no++ ?>
                <td><?php echo $no ?></td>
                <td>Pataris Lestanari</td>
                <td>XII TKJ A</td>
                <td>12 November 2022</td>
                <td>Seragam</td>
                <td>Memodifikasi seragam sendiri</td>
                </tr>
                <?php $no++ ?>
                @endfor
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#pelanggaran-table').DataTable();
    });
</script>

@endsection