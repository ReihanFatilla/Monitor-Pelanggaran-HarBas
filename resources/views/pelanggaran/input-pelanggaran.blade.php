@extends('layouts.web')

@section('content')
<link rel="stylesheet" href="{{ asset('css/input-pelanggaran.css') }}">

<!-- Font Awesome -->
<!-- <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/> -->
<!-- Google Fonts -->
<!-- <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/> -->
<!-- MDB -->
<!-- <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/> -->

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card">
                <div class="card-header fw-semibold text-center">Input Pelanggaran</div>

                <div class="card-body">

                    <form action="#" method="post" class="m-3">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type your name...">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NISN</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Type your number...">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kelas</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Choose...</option>
                                        <option value="1">Kelas A</option>
                                        <option value="2">Kelas B</option>
                                        <option value="3">Kelas C</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Choose...</option>
                                        <option value="1">Masalah Gede</option>
                                        <option value="2">Masalah Kicik</option>
                                        <option value="3">Masalah Sedeng</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pelapor</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Choose...</option>
                                        <option value="1">Guru...</option>
                                        <option value="2">Guru...</option>
                                        <option value="3">Guru...</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Catatan</label>
                                    <textarea class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
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

<!-- MDB -->
<!-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script> -->
@endsection
