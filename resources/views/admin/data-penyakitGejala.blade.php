@extends('admin.app')

@section('title', 'Data Penyakit dan Gejala')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Penyakit dan Gejala</h3>
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
                    <a href="#">Data Penyakit dan Gejala</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addPenyakitGejalaModal">
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
                                        <th>Nama Gejala</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($penyakitGejala as $pg)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pg->nama_penyakit }}</td>
                                        <td>{{ $pg->nama_gejala }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#editPenyakitGejalaModal" data-id="{{ $pg->id }}" data-penyakit-id="{{ $pg->penyakit_id }}" data-gejala-id="{{ $pg->gejala_id }}" style="cursor: pointer; font-size: 20px; color: #007bff;"></i>
                                                <form action="{{ route('deletePenyakitGejala', $pg->id) }}" method="POST" style="display: inline;">
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
                <div class="modal fade" id="editPenyakitGejalaModal" tabindex="-1" aria-labelledby="editPenyakitGejalaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editPenyakitGejalaModalLabel">Edit Penyakit dan Gejala</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editPenyakitGejalaForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="edit_penyakit_id">Penyakit</label>
                                        <select class="form-control @error('penyakit_id') is-invalid @enderror" name="penyakit_id" id="edit_penyakit_id" required>
                                            <option value="">Pilih Penyakit</option>
                                            @foreach ($penyakit as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_penyakit }}</option>
                                            @endforeach
                                        </select>
                                        @error('penyakit_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="edit_gejala_ids">Gejala</label>
                                        @foreach ($gejala as $g)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="gejala_ids[]" value="{{ $g->id }}" id="edit_gejala_{{ $g->id }}">
                                            <label class="form-check-label" for="edit_gejala_{{ $g->id }}">
                                                {{ $g->nama_gejala }}
                                            </label>
                                        </div>
                                        @endforeach
                                        @error('gejala_ids')
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
                <div class="modal fade" id="addPenyakitGejalaModal" tabindex="-1" aria-labelledby="addPenyakitGejalaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addPenyakitGejalaModalLabel">Tambah Penyakit dan Gejala</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('storePenyakitGejala') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="penyakit_id">Penyakit</label>
                                        <select class="form-control @error('penyakit_id') is-invalid @enderror" name="penyakit_id" id="penyakit_id" required>
                                            <option value="">Pilih Penyakit</option>
                                            @foreach ($penyakit as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_penyakit }}</option>
                                            @endforeach
                                        </select>
                                        @error('penyakit_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="gejala_ids">Gejala</label>
                                        @foreach ($gejala as $g)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="gejala_ids[]" value="{{ $g->id }}" id="gejala_{{ $g->id }}">
                                            <label class="form-check-label" for="gejala_{{ $g->id }}">
                                                {{ $g->nama_gejala }}
                                            </label>
                                        </div>
                                        @endforeach
                                        @error('gejala_ids')
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
        const editButtons = document.querySelectorAll('[data-bs-target="#editPenyakitGejalaModal"]');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const penyakitId = this.dataset.penyakitId;
                const gejalaIds = this.dataset.gejalaIds ? this.dataset.gejalaIds.split(',') : [];

                const modal = document.getElementById('editPenyakitGejalaModal');
                modal.querySelector('#edit_penyakit_id').value = penyakitId;
                modal.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = gejalaIds.includes(checkbox.value);
                });

                const form = modal.querySelector('#editPenyakitGejalaForm');
                form.action = `/admin/data-penyakit-gejala/${id}`;
            });
        });
    });
</script>
@endsection