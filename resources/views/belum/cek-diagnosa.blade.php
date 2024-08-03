@extends('layouts.app')
@extends('layouts.style')

@section('content')
    <div class="container mt-5">
        <h2 class="text-left mb-4 text-purple">Cek Gejala untuk Mengetahui <br>Diagnosa</h2>
        <p class="text-left mb-5">Pilih Gejala yang dirasakan</p>
        <form id="gejalaForm">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    @php
                        $half = ceil(count($gejala) / 2);
                    @endphp
                    @for ($i = 0; $i < $half; $i++)
                        <div class="form-check mb-4 d-flex align-items-start">
                            <input class="form-check-input me-3" type="checkbox" id="gejala{{ $gejala[$i]['kode_gejala'] }}"
                                name="gejala[]" value="{{ $gejala[$i]['kode_gejala'] }}" style="transform: scale(2);">
                            <label class="form-check-label" for="gejala{{ $gejala[$i]['kode_gejala'] }}"
                                style="font-size: 18px; text-transform: uppercase;">
                                {{ $gejala[$i]['nama_gejala'] }}
                            </label>
                        </div>
                    @endfor
                </div>
                <div class="col-md-6">
                    @for ($i = $half; $i < count($gejala); $i++)
                        <div class="form-check mb-4 d-flex align-items-start">
                            <input class="form-check-input me-3" type="checkbox" id="gejala{{ $gejala[$i]['kode_gejala'] }}"
                                name="gejala[]" value="{{ $gejala[$i]['kode_gejala'] }}" style="transform: scale(2);">
                            <label class="form-check-label" for="gejala{{ $gejala[$i]['kode_gejala'] }}"
                                style="font-size: 18px; text-transform: uppercase;">
                                {{ $gejala[$i]['nama_gejala'] }}
                            </label>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="background-color: purple; border-color: purple;" onclick="checkGejala()">
                    Cek Gejala
                </button>
                <button type="reset" class="btn btn">Hapus Pilihan</button>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column align-items-center justify-content-center text-center"
                        style="padding: 30px;">
                        <div id="resultContainer">
                            <h1 id="resultTitle"
                                style="font-family: 'Montserrat', sans-serif; font-weight: bold; color: #ff0000; font-size: 24px; margin-bottom: 10px;">
                                Mohon Maaf,
                            </h1>
                            <h2 id="penyakitNama"
                                style="font-family: 'Montserrat', sans-serif; font-weight: normal; color: #000000; font-size: 20px;">
                                Anda Perlu Daftar/Masuk terlebih dahulu untuk menggunakan Aplikasi
                                <br>
                                <strong id="penyakitResult"></strong>
                            </h2>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('masuk') }}" class="btn"
                                style="background-color: #8B008B; color: #FFFFFF; font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 16px;">
                                Masuk
                            </a>
                            <a href="{{ route('daftar') }}" class="btn"
                                style="background-color: #ffffff; color: #000000; font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 16px;">
                                Daftar
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
