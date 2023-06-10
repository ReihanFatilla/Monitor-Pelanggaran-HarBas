@extends('layouts.web')

@section('content')
<link rel="stylesheet" href="{{ asset('css/input-pelanggaran.css') }}">
<style>
    body {
        background-color: #f8f9fa;
    }

    .card-header {
        background-color: #009879;
        color: #fff;
        font-weight: 600;
        font-size: 20px;
    }

    .form-select,
    .form-control {
        border-radius: 10px;
    }

    .btn-submit {
        background-color: #009879;
        color: #fff;
        border: none;
    }

    .btn-submit:hover {
        background-color: #007e6b;
        color: #fff;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card">
                <div class="card-header fw-semibold text-center">Input Pelanggaran</div>

                <div class="card-body">
                    <form method="post" action="{{route('pelanggaran.store')}}" class="m-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kelas</label>
                                    <select name="id_kelas" id="kelas-select" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Kelas</option>
                                        @foreach($kelas as $kelas)
                                        <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                    <select name="id_kategori" id="kategori-select" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Kategori</option>
                                        @foreach($kategori as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <select name="id_siswa" disabled id='nama-select' class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Kelas Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NISN</label>
                                    <input disabled type="number" class="form-control" id="nisn-form" aria-describedby="emailHelp" placeholder="NISN akan terisi automatis">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pelapor</label>
                                    <select name="id_user_pelapor" id="guru-select" class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Guru</option>
                                        @foreach($guru as $guru)
                                        <option value="{{$guru->id}}">{{$guru->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Catatan</label>
                                    <textarea name="catatan" class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#kelas-select').change(function() {
            $('#nama-select').removeAttr("disabled")

            var selectedKelas = $(this).children("option:selected").val();

            $('#nisn-form').val('NISN akan terisi automatis');
            console.log(selectedKelas)

            if ($(this).find('option:first').val() == 'Pilih Kelas') {
                $(this).find('option:first').remove();
            }

            $.ajax({
                url: "/get-nama-by-kelas",
                type: "GET",
                data: {
                    kelas: selectedKelas
                },
                success: function(response) {
                    var namaHtml = function() {
                        var listNama = []
                        listNama.push(`<option selected>Pilih Nama</option>`)

                        response.siswa.forEach(element => {
                            listNama.push(`<option value="${element.id}">${element.user.name}</option>`)
                        })
                        return listNama
                    }

                    $('#nama-select').html(namaHtml);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        })

        $('#nama-select').change(function() {
            var selectedNameId = $(this).children("option:selected").val();

            if ($(this).find('option:first').val() == 'Pilih Nama') {
                $(this).find('option:first').remove();
            }

            $.ajax({
                url: "/get-nisn",
                type: "GET",
                data: {
                    id: selectedNameId
                },
                success: function(response) {
                    $('#nisn-form').val(response.nisn);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $('#kategori-select').change(function() {
            if ($(this).find('option:first').val() == 'Pilih Kategori') {
                $(this).find('option:first').remove();
            }
        })

        $('#guru-select').change(function() {
            if ($(this).find('option:first').val() == 'Pilih Guru') {
                $(this).find('option:first').remove();
            }
        })
    });
</script>
@endsection
