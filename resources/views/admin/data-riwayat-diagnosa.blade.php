@extends('admin.app')

@section('title', 'Data Riwayat Diagnosa')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Riwayat Diagnosa</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Admin</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Riwayat Diagnosa</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="riwayatDiagnosaTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu</th>
                                        <th>Nama Pengguna</th>
                                        <th>Gejala Dipilih</th>
                                        <th>Hasil Diagnosa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat_diagnosa as $index => $riwayat)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $riwayat->created_at }}</td>
                                        <td>{{ $riwayat->user_name }}</td>
                                        <td>{!! $riwayat->gejala_dipilih !!}</td>
                                        <td>{{ $riwayat->hasil_diagnosa }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function() {
        $('#riwayatDiagnosaTable').DataTable();
    });
</script>
@endsection