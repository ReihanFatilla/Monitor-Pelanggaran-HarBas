@extends('layouts.web')

@section('content')
@include('users.modal')

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
                    return `<select class="form-select level-select" data-user-id="${row.id}" data-value="" onfocus="this.setAttribute('data-value', this.value);">
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
                            </div>
                            
                            <x-modal id="${row.id}" title="Edit User" formAction="/users/update/${row.id}" submitLabel="Update User">
                    <div class="mb-3">
                            <label for="kategori-input-edit" class="form-label">Name</label>
                            <input type="text" value="${row.name}" name="name" class="form-control" aria-describedby="emailHelp">
                    </div>
                </x-modal>`;
                }
            }]
        });

    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    $(document).ready(function() {
        let currentLevel = '';

        $('.level-select').on('focus', function() {
            currentLevel = $(this).val()
        })

        $('.level-select').on('change', function() {
            var levelSelect = $(this);
            var level = $(this).val();
            var userId = $(this).data('user-id');

            if (level == "siswa") {

                $('#student-modal').modal('show');

                $('#student-modal-save').on('click', function() {
                    var nisn = $('#siswa-nisn').val();
                    var id_kelas = $('#kelas-select').val();

                    $('#student-modal').modal('hide');

                    $.ajax({
                        type: "PUT",
                        url: "/users/updaterole/" + userId,
                        data: {
                            level: level,
                            nisn: nisn,
                            id_kelas: id_kelas
                        },
                        success: function(response) {
                            console.log('User role updated successfully | ' + response.level);
                            levelSelect.val(level)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error updating user role: ' + textStatus);
                        }
                    });

                });
            } else if (currentLevel == "siswa") {

                $('#delete-student-modal').modal('show');

                $('#delete-student-modal-save').on('click', function() {
                    $('#delete-student-modal').modal('hide');

                    $.ajax({
                        type: "PUT",
                        url: "/users/updaterole/" + userId,
                        data: {
                            level: level,
                            currentLevel: currentLevel
                        },
                        success: function(response) {
                            console.log('User role updated successfully | ' + response.level);
                            levelSelect.val(level)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error updating user role: ' + textStatus);
                        }
                    });

                })
            } else {
                $('#confirmation-modal').modal('show');

                $('#confirmation-modal-save').on('click', function() {
                    $('#confirmation-modal').modal('hide');

                    $.ajax({
                        type: "PUT",
                        url: "/users/updaterole/" + userId,
                        data: {
                            level: level,
                        },
                        success: function(response) {
                            console.log('User role updated successfully | ' + response.level);
                            levelSelect.val(level)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error updating user role: ' + textStatus);
                        }
                    });

                })
            }

            $('.close').on('click', function() {
                $('.modal').modal('hide');
                levelSelect.val(currentLevel)
            })

            $(".modal").on("hidden.bs.modal", function() {
                $('#confirmation-modal').modal('hide');
                levelSelect.val(currentLevel)
            });
        })



    })
</script>
@endsection