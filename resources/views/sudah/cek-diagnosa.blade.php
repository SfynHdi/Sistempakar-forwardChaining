<!-- resources/views/diagnosa.blade.php -->
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
                @for ($i = 0; $i < $half; $i++) <div class="form-check mb-4 d-flex align-items-start">
                    <input class="form-check-input me-3" type="checkbox" id="gejala{{ $gejala[$i]->id }}" name="gejala_ids[]" value="{{ $gejala[$i]->id }}" style="transform: scale(1.5);">
                    <label class="form-check-label" for="gejala{{ $gejala[$i]->id }}" style="font-size: 18px; text-transform: uppercase;">
                        {{ $gejala[$i]->nama_gejala }}
                    </label>
            </div>
            @endfor
        </div>
        <div class="col-md-6">
            @for ($i = $half; $i < count($gejala); $i++) <div class="form-check mb-4 d-flex align-items-start">
                <input class="form-check-input me-3" type="checkbox" id="gejala{{ $gejala[$i]->id }}" name="gejala_ids[]" value="{{ $gejala[$i]->id }}" style="transform: scale(1.5);">
                <label class="form-check-label" for="gejala{{ $gejala[$i]->id }}" style="font-size: 18px; text-transform: uppercase;">
                    {{ $gejala[$i]->nama_gejala }}
                </label>
        </div>
        @endfor
</div>
</div>
<div class="text-center mt-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: purple; border-color: purple;" onclick="checkGejala()">
        Cek Gejala
    </button>
    <button type="reset" class="btn btn-secondary">Hapus Pilihan</button>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hasil Diagnosa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center justify-content-center text-center" style="padding: 30px;">
                <div id="resultContainer">
                    <h1 id="resultTitle" style="font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 24px; margin-bottom: 10px;">
                        Gejala Sesuai
                    </h1>
                    <h2 id="penyakitNama" style="font-family: 'Montserrat', sans-serif; font-weight: normal; color: #000000; font-size: 20px;">
                        Nama Penyakit:
                        <br>
                        <strong id="penyakitResult"></strong>
                    </h2>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a id="lihatDetailBtn" class="btn" style="background-color: #8B008B; color: #FFFFFF; font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 16px;">
                        Lihat Detail
                    </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: transparent; color: #000000; font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-left: 16px;">
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function checkGejala() {
        const selectedGejala = [];
        document.querySelectorAll('input[name="gejala_ids[]"]:checked').forEach((checkbox) => {
            selectedGejala.push(checkbox.value);
        });

        fetch('{{ route('proses-diagnosa') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        gejala_ids: selectedGejala
                    })
                })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('penyakitResult').innerText = data.hasil.join(', ');
                } else {
                    document.getElementById('penyakitResult').innerText = 'Tidak ada penyakit yang ditemukan';
                }
            });
    }
</script>
@endsection


<script>
    function checkGejala() {
        let selectedGejala = [];
        document.querySelectorAll('input[name="gejala_ids[]"]:checked').forEach((checkbox) => {
            selectedGejala.push(checkbox.value);
        });

        // Log gejala yang dipilih ke console
        console.log('Selected Gejala:', selectedGejala);

        fetch('{{ route('proses-diagnosa') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        gejala_ids: selectedGejala
                    })
                })
            .then(response => response.json())
            .then(data => {
                let resultTitle = document.getElementById('resultTitle');
                let penyakitResult = document.getElementById('penyakitResult');
                let lihatDetailBtn = document.getElementById('lihatDetailBtn');

                if (data.status === 'success') {
                    let penyakitNama = data.diagnosis.length > 0 ? data.diagnosis.join(', ') : 'Penyakit tidak ditemukan';
                    resultTitle.innerHTML = 'Gejala Sesuai';
                    resultTitle.style.color = '#00853E'; // Color green for success
                    penyakitResult.innerHTML = `<strong>${penyakitNama}</strong>`;

                    // For demonstration, we'll use a placeholder URL for detail
                    let penyakitUrl = '#';

                    lihatDetailBtn.href = penyakitUrl;
                    lihatDetailBtn.style.display = 'inline-block'; // Show the button
                } else {
                    resultTitle.innerHTML = 'Gejala Tidak Sesuai';
                    resultTitle.style.color = '#FF0000'; // Color red for error
                    penyakitResult.innerHTML = '<strong>Penyakit tidak ditemukan</strong>';
                    lihatDetailBtn.style.display = 'none'; // Hide the button
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('resultTitle').innerHTML = 'Gejala Tidak Sesuai';
                document.getElementById('resultTitle').style.color = '#FF0000'; // Color red for error
                document.getElementById('penyakitResult').innerHTML = '<strong>Penyakit tidak ditemukan</strong>';
                let lihatDetailBtn = document.getElementById('lihatDetailBtn');
                lihatDetailBtn.style.display = 'none'; // Hide the button
            });
    }
</script>
