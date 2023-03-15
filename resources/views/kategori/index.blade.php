@extends('layouts.web')

@section('content')
<div class="card-custom shadow-lg m-1 p-5">
    <table id="kategori-table" class="hover" style="width: 100%;">
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    var listKategori = @json($amountUsedKategori);
    let kategori = []

    for (const [key, value] of Object.entries(listKategori)) {
        kategori.push({
            'nama_kategori': key,
            'jumlah': value
        })
    }

    console.log(kategori)

    $(document).ready(function() {
        var pelanggaranTable = $('#kategori-table').DataTable({
            pagingType: 'simple_numbers',
            data: kategori,
            columns: [{
                    title: 'no',
                    data: 'nama_kategori',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    title: 'Nama Kategori',
                    data: 'nama_kategori'
                },
                {
                    title: 'Jumlah Digunakan',
                    data: 'jumlah'
                }
            ],
        });
    });
</script>
@endsection