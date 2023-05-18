@extends('layouts.web')

@section('content')
<link rel="stylesheet" href="{{asset ('css/detail-siswa.css')}}">
<div class="container up-detail d-flex flex-column align-items-center">
    <img src="{{asset ('images/ava.avif')}}" alt="" class="img-fluid img-ava">

    <p class="nama-lengkap fs-1 fw-bold">{{Auth::user()->name}}</p>

    <p class="kelas fs-3">{{Auth::user()->kelas}}</p>
</div>

<div class="container d-flex justify-content-center align-items-center w-100 mt-4">
    <div class="row w-100">

        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column mb-3">
            <p class="email fw-bold mb-1">Email</p>
            <div class="email-content w-100">
                <p class="py-2 px-5 d-flex justify-content-center align-items-center">{{Auth::user()->email}}</p>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column mb-3">
            <p class="nisn fw-bold mb-1">NISN</p>
            <div class="nisn-content w-100">
                <p class="py-2 px-5 d-flex justify-content-center align-items-center">0020399393</p>
            </div>
        </div>

    </div>
</div>

<div class="container pelanggaran w-75 border border-primary ">
    <p class="title fw-bold p-3">Pelanggaran</p>
    <p class="title fw-bold px-4">Macam-Macam:</p>

    <div class="table-responsive px-5 mb-5">
        <table class="table table-borderless">
            <tr class="fw-bold">
                <td>No</td>
                <td>Masalah</td>
                <td>Point</td>
            </tr>
            <tr>
                <td>1</td>
                <td>tess</td>
                <td>tessss</td>
            </tr>
            <tr>
                <td>2</td>
                <td>tessri</td>
            </tr>
        </table>
    </div>

    <div class="container d-flex justify-content-center align-items-center w-100 mt-5">
        <div class="row w-100">

            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column mb-3">
                <p class=" fw-bold mb-1">Total Masalah</p>
                <div class="w-100">
                    <p class="py-2 px-5 d-flex justify-content-center align-items-center">3</p>
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column mb-3">
                <p class=" fw-bold mb-1">Total Point</p>
                <div class="w-100">
                    <p class="py-2 px-5 d-flex justify-content-center align-items-center">350</p>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
