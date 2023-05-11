@extends('layouts.web')

@section('content')
<div class="card-custom shadow-lg m-1 p-5">
    <div class="table-responsive">
        <table id="pelanggaran-table" class="hover custom-table" style="width: 100%;">
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    var listPelanggaran = @json($pelanggaran);
    console.log(listPelanggaran)

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
            pagingType: 'simple_numbers',
            data: listPelanggaran,
            columns: [
                {
                    title: 'No',
                    data: 'id'
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
                    data: 'created_at'
                },
                {
                    title: 'Jenis Pelanggaran',
                    data: 'kategori.nama_kategori'
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