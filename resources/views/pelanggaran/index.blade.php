@extends('layouts.web')

@section('content')
<div class="card-custom shadow-lg m-1 p-5">
    <table id="pelanggaran-table" class="hover" style="width: 100%;">
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    var listPelanggaran = function(){
        var list = [];
        var no = 1;
        for(var i = 0;i < 100;i++){
            list.push({
            no: no++,
            nama: 'Saleh Rashid',
            kelas: 'XI RPL B',
            tanggal: '23 Januari 2022',
            jenis: 'Pemalakan',
            catatan: 'Memalak adek kelas 500 juta',
            pelapor: 'Andinata',
            nisn: '1234567890'
        },{
            no: no++,
            nama: 'Galang Davian Pradana',
            kelas: 'XII TKR A',
            tanggal: '10 Maret 2022',
            jenis: 'Pembullyan',
            catatan: 'membully teman sekelas',
            pelapor: 'Supriyadi',
            nisn: '1234920890'
        },{
            no: no++,
            nama: 'Rizky Fauzan',
            kelas: 'X TKJ C',
            tanggal: '30 Agustus 2022',
            jenis: 'Sampah',
            catatan: 'Buang sampah sembarangan',
            pelapor: 'Kapsarudi',
            nisn: '10291567890'
        })
        }
        return list
    }

    function format(d) {
        return (
            '<div class="slider">'+
            '<table style="table" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Dilaporkan Oleh:</td>' +
            '</td>' +
            '<td>' +
            d.pelapor +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>NISN:</td>' +
            '<td>' +
            d.nisn +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Action:</td>' +
            '<td>' +
            "<div class='row d-flex justify-content-center'>" +
            "<div class='col-6'>" +
            '<button type="button" class="btn btn-primary">Edit</button>' +
            '</div>' +
            "<div class='col-6'>" +
            '<button type="button" class="btn btn-danger">Delete</button>' +
            '</div>' +
            '</div>' +
            '</td>' +
            '</tr>' +
            '</table>'+
            '</div>'
        );
    }

    $(document).ready(function() {
        var pelanggaranTable = $('#pelanggaran-table').DataTable({
            data: listPelanggaran(),
            columns: [
                {
                    title: 'No',
                    data: 'no'
                },
                {
                    title: 'Nama',
                    data: 'nama'
                },
                {
                    title: 'Kelas',
                    data: 'kelas'
                },
                {
                    title: 'Tanggal',
                    data: 'tanggal'
                },
                {
                    title: 'Jenis Pelanggaran',
                    data: 'jenis'
                },
                {
                    title: 'Catatan',
                    data: 'catatan'
                },
            ],
        });

        $('#pelanggaran-table tbody').on('click', 'tr', function() {
            var tr = $(this).closest('tr');
            var row = pelanggaranTable.row($(this));

            if (row.child.isShown()) {
                // This row is already open - close it
                $('div.slider', row.child()).slideUp(function () {
                    row.child.hide();
                });
            } else {
                // Open this row
                row.child(format(row.data()), 'no-padding ').show();
                $('div.slider', row.child()).slideDown();
            }
        });
    });
</script>

@endsection