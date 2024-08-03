@extends('admin.app')

@section('title', 'Data Penyakit')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Penyakit</h3>
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
                    <a href="#">Data Penyakit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addPenyakitModal">
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
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($penyakit as $pyk)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pyk->nama_penyakit }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#editPenyakitModal" data-id="{{ $pyk->id }}" data-nama-penyakit="{{ $pyk->nama_penyakit }}" style="cursor: pointer; font-size: 20px; color: #007bff;">
                                                </i>
                                                <form action="{{ route('deletePenyakit', $pyk->id) }}" method="POST" style="display: inline;">
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
                <div class="modal fade" id="editPenyakitModal" tabindex="-1" aria-labelledby="editPenyakitModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editPenyakitModalLabel">Edit Penyakit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editPenyakitForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="edit_nama_penyakit">Nama Penyakit</label>
                                        <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" name="nama_penyakit" id="edit_nama_penyakit" placeholder="Nama Penyakit" required>
                                        @error('nama_penyakit')
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
                <div class="modal fade" id="addPenyakitModal" tabindex="-1" aria-labelledby="addPenyakitModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addPenyakitModalLabel">Tambah Penyakit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('storePenyakit') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="nama_penyakit">Nama Penyakit</label>
                                        <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" name="nama_penyakit" id="nama_penyakit" placeholder="Nama Penyakit" value="{{ old('nama_penyakit') }}" required>
                                        @error('nama_penyakit')
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
        const editButtons = document.querySelectorAll('[data-bs-target="#editPenyakitModal"]');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const namaPenyakit = this.dataset.namaPenyakit;

                const modal = document.getElementById('editPenyakitModal');
                modal.querySelector('#edit_nama_penyakit').value = namaPenyakit;
                const form = modal.querySelector('#editPenyakitForm');
                form.action = `/admin/data-penyakit/${id}`;
            });
        });
    });
</script>
@endsection