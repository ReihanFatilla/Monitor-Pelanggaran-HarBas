@extends('layouts.web')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card-custom shadow-lg m-1 p-5">
    <table id="user-table" class="table custom-table table-striped table-bordered table-hover" style="width: 100%;">
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    var listUser = @json($users);

    $(document).ready(function() {
        var pelanggaranTable = $('#user-table').DataTable({
            pagingType: 'simple_numbers',
            responsive: true,
            data: listUser,
            columns: [{
                    title: 'No',
                    data: 'id'
                },
                {
                    title: 'Nama',
                    data: 'name'
                },
                {
                    title: 'Email',
                    data: 'email'
                },
                {
                    title: 'Role',

                },
                {
                    title: 'Aksi',
                }
            ],
            columnDefs: [{
                target: 3,
                render: function(data, type, row) {
                    return `<select class="form-select level-select" data-user-id="${row.id}">
                    <option value="siswa" ${ row.level == 'siswa' ? 'selected' : '' }>Siswa</option>
                    <option value="guru" ${ row.level == 'guru' ? 'selected' : '' }>Guru</option>
                    <option value="admin" ${ row.level == 'admin' ? 'selected' : '' }>Admin</option>
                </select>`

                }
            }, {
                target: 4,
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
            <form class="" action="/users/delete/${row.id}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="dropdown-item">Delete</button>
            </form>
        </li>
    </ul>
</div>`;
                }
            }]
        });

    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.level-select').on('change', function() {
            var level = $(this).val();
            var userId = $(this).data('user-id');

            $.ajax({
                type: "PUT",
                url: "/users/updaterole/" + userId,
                data: {
                    level: level
                },
                success: function(response) {
                    console.log('User role updated successfully');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error updating user role: ' + textStatus);
                }
            });
        });
    })
</script>
@endsection