@extends('admin.app')

@section('title', 'Data Diagnosa')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Diagnosa</h3>
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
                        <a href="#">Data Diagnosa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addDiagnosaModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penyakit</th>
                                            <th>Gejala</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @foreach ($diagnosa as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data['nama_penyakit'] }}</td>
                                                <td>{{ $data['gejala'] }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <i class="fa fa-edit" data-bs-toggle="modal"
                                                            data-bs-target="#editModal"
                                                            data-kode-penyakit="{{ $data['kode_penyakit'] }}"
                                                            data-nama-penyakit="{{ $data['nama_penyakit'] }}"
                                                            data-gejala="{{ $data['gejala'] }}"
                                                            style="cursor: pointer; font-size: 20px; color: #007bff;">
                                                        </i>
                                                        <form
                                                            action="{{ route('admin.data-diagnosa.delete', $data['kode_penyakit']) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" data-bs-toggle="tooltip" title="Remove"
                                                                class="btn btn-link btn-danger"
                                                                data-original-title="Remove">
                                                                <i class="fa fa-trash"
                                                                    style="font-size: 20px; color: #dc3545;"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit Data-->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Diagnosa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editDiagnosaForm" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label for="edit_kode_penyakit">Kode Penyakit</label>
                                            <input type="text"
                                                class="form-control @error('kode_penyakit') is-invalid @enderror"
                                                name="kode_penyakit" id="edit_kode_penyakit" placeholder="Kode Penyakit"
                                                required>
                                            @error('kode_penyakit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="edit_nama_penyakit">Nama Penyakit</label>
                                            <input type="text"
                                                class="form-control @error('nama_penyakit') is-invalid @enderror"
                                                name="nama_penyakit" id="edit_nama_penyakit" placeholder="Nama Penyakit"
                                                required>
                                            @error('nama_penyakit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="edit_gejala">Gejala</label>
                                            <input type="text"
                                                class="form-control @error('gejala') is-invalid @enderror"
                                                name="gejala" id="edit_gejala" placeholder="Gejala" required>
                                            @error('gejala')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger me-2"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Kirim Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Tambah Data-->
                    <div class="modal fade" id="addDiagnosaModal" tabindex="-1" aria-labelledby="addDiagnosaModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addDiagnosaModalLabel">Tambah Diagnosa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('storeDiagnosa') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="kode_penyakit">Kode Penyakit</label>
                                            <input type="text"
                                                class="form-control @error('kode_penyakit') is-invalid @enderror"
                                                name="kode_penyakit" id="kode_penyakit" placeholder="Kode Penyakit"
                                                value="{{ old('kode_penyakit') }}" required>
                                            @error('kode_penyakit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="nama_penyakit">Nama Penyakit</label>
                                            <input type="text"
                                                class="form-control @error('nama_penyakit') is-invalid @enderror"
                                                name="nama_penyakit" id="nama_penyakit" placeholder="Nama Penyakit"
                                                value="{{ old('nama_penyakit') }}" required>
                                            @error('nama_penyakit')
                                                <span
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="gejala">Gejala</label>
                                                <input type="text"
                                                    class="form-control @error('gejala') is-invalid @enderror"
                                                    name="gejala" id="gejala" placeholder="Gejala"
                                                    value="{{ old('gejala') }}" required>
                                                @error('gejala')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger me-2"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Kirim Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('[data-bs-target="#editModal"]');
    
                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const kodePenyakit = this.dataset.kodePenyakit;
                        const namaPenyakit = this.dataset.namaPenyakit;
                        const gejala = this.dataset.gejala;
    
                        const modal = document.getElementById('editModal');
                        modal.querySelector('#edit_kode_penyakit').value = kodePenyakit;
                        modal.querySelector('#edit_nama_penyakit').value = namaPenyakit;
                        modal.querySelector('#edit_gejala').value = gejala;
                        const form = modal.querySelector('#editDiagnosaForm');
                        form.action = `/admin/data-diagnosa/${kodePenyakit}`;
                    });
                });
            });
        </script>
    @endsection
    