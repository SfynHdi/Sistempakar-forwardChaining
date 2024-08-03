@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="profile-heading text-center mb-4">Pengaturan Profil</h1>
        <form action="{{ route('profile.update') }}" method="POST" class="profile-form p-4 bg-light rounded shadow-sm">
            @csrf
            @method('PUT')
            <div class="profile-header mb-3">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center ">
                        <div class="profile-avatar">
                            <img src="{{ asset('images/pasfoto.jpg') }}" alt="Profile Picture" class="profile-img img-thumbnail rounded-circle border border-primary" style="width: 100px; height: auto;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>{{ auth()->user()->name }}</h3>
                    </div>
                    <div class="col-md-4 text-center text-md-end">
                        <button type="submit" class="btn btn-ungu save-btn">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
            <hr class="profile-divider">
            <div class="profile-body">
                <h3 class="mb-3">Ubah Profil</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="name">Nama Pengguna <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   id="name" placeholder="Nama Pengguna" value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Alamat Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   id="email" placeholder="alamat_email@gmail.com" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

