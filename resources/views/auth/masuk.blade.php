@extends('layouts.app')
@extends('layouts.style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8 col-lg-10">
                <div class="card shadow card-custom" style="border-radius: 25px; border: none;">
                    <div class="row no-gutters">
                        <div class="col-md-5 d-none d-md-block">
                            <img src="{{ asset('images/daftar.png') }}" alt="Daftar Image" class="img-fluid"
                                style="border-top-left-radius: 25px; border-bottom-left-radius: 25px; width: 100%; height: auto; object-fit: cover;">
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="card-body">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mb-4">
                                <h3 class="text-purple">Masuk Akun</h3>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Masukan Email Anda Disini"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Kata Sandi</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="password" placeholder="Masukan Kata Sandi Anda Disini" required
                                                autocomplete="current-password">
                                            <span class="input-group-text" id="toggle-password" style="cursor: pointer;">
                                                <i class="bi bi-eye" id="toggle-icon"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-ungu text-white w-100 mb-3">Login ></button>
                                    <div>
                                        <span style="color: #7b00a0;">Belum Punya Akun?</span>
                                        <a href="{{ route('daftar') }}" class="btn btn-link">Daftar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var toggleIcon = document.getElementById('toggle-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        });
    </script>
@endsection
