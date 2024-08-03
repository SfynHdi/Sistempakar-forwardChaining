@extends('admin.app')

@section('title', 'Data Gejala')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Gejala</h3>
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
                    <a href="#">Data Gejala</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addGejalaModal">
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
                                        <th>Nama Gejala</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($gejala as $gjl)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $gjl->nama_gejala }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $gjl->id }}" data-nama-gejala="{{ $gjl->nama_gejala }}" style="cursor: pointer; font-size: 20px; color: #007bff;">
                                                </i>
                                                <form action="{{ route('admin.data-gejala.delete', $gjl->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-bs-toggle="tooltip" title="Remove" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-trash" style="font-size: 20px; color: #dc3545;"></i>
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
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel">Edit Gejala</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editGejalaForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="edit_nama_gejala">Nama Gejala</label>
                                        <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" name="nama_gejala" id="edit_nama_gejala" placeholder="Nama Gejala" required>
                                        @error('nama_gejala')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Kirim Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Tambah Data-->
                <div class="modal fade" id="addGejalaModal" tabindex="-1" aria-labelledby="addGejalaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addGejalaModalLabel">Tambah Gejala</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('storeGejala') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="nama_gejala">Nama Gejala</label>
                                        <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" name="nama_gejala" id="nama_gejala" placeholder="Nama Gejala" value="{{ old('nama_gejala') }}" required>
                                        @error('nama_gejala')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Tutup</button>
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
                const id = this.dataset.id;
                const namaGejala = this.dataset.namaGejala;

                const modal = document.getElementById('editModal');
                modal.querySelector('#edit_nama_gejala').value = namaGejala;
                const form = modal.querySelector('#editGejalaForm');
                form.action = `/admin/data-gejala/${id}`;
            });
        });
    });
</script>
@endsection