@extends('layouts.web')

@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<div class="container">
    <table id="myTable" style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < 10; $i++) <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection