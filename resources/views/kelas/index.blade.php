@extends('layouts.web')

@section('content')
<div class="card-custom shadow-lg m-1 p-5">
    <form method="post" action="{{route('kelas.store')}}">
        @csrf
        <div class="mb-3 d-flex w-50 gap-3 align-items-center">
            <input type="text" name="nama" class="form-control" placeholder="ex: Perkelahian">
            <button type="submit" class="btn btn-primary" style="background-color: #009879;">Tambah</button>
        </div>
    </form>
    <table id="kelas-table" class="table table-striped table-bordered table-hover" style="width: 100%;">
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    var listKelas = @json($kelas);

    $(document).ready(function() {
        var pelanggaranTable = $('#kelas-table').DataTable({
            pagingType: 'simple_numbers',
            responsive: true,
            data: listKelas,
            columns: [{
                    title: 'No',
                    data: 'id'
                },
                {
                    title: 'Nama Kelas',
                    data: 'nama'
                },
                {
                    title: 'Jumlah Digunakan',
                    data: 'siswa_count'
                },
                {
                    title: 'Aksi',
                }
            ],
            columnDefs: [{
                target: 3,
                render: function(data, type, row) {
                    return `<div class="dropdown text-center">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu" style="min-width:0;" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                    <a class="dropdown-item editButton" data-bs-toggle="modal" data-bs-target="#exampleModal${row.id}">
                                        Edit
                                    </a>
                                    </li>
                                    <li>
                                    <form class="" action="/kelas/delete/${row.id}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="modal fade" id="exampleModal${row.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/kelas/update/${row.id}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="kelas-input-edit" class="form-label">Category</label>
                                                    <input type="text" value="${row.nama}" name="nama" class="form-control" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>`;
                }
            }]
        });

    });
</script>
@endsection