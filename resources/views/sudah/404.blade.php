@extends('layouts.app')

@section('title', 'NOT FOUND')

@section('content')
<div class="container text-center">
    <div class="page-inner">
        <div class="error-page">
            <h1 class="display-1 text-danger">404</h1>
            <h2 class="text-danger">NOT FOUND</h2>
            <p class="lead">
                Anda tidak memiliki izin untuk akses halaman Administrator.<br>
                Keluar dan Ganti Akun Khusus Administrator untuk melanjutkan.
            </p>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-red">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>        </div>
    </div>
</div>
@endsection
