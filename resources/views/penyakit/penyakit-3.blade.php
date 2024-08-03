@extends('layouts.app')

@section('content')
    <style>
        .text-purple {
            color: #6f2dbd;
        }

        .bg-DDFFD1 {
            background-color: #DDFFD1;
        }

        .bg-FFF8D6 {
            background-color: #FFF8D6;
        }

        .bg-FFD3D3 {
            background-color: #FFD3D3;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .card {
            border-radius: 15px;
            /* Adjust the border radius for the entire card */
            box-shadow: none;
            /* Remove box-shadow if any */
        }

        .card-body {
            border-radius: 15px;
            /* Adjust the border radius for the card body */
        }

        .card-title {
            color: #333;
        }

        .rounded-circle {
            border-radius: 80%;
        }
    </style>

    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="font-weight-bold text-purple">Apa Itu Sequestrasi?</h2>
                <p>Sequestrasi adalah salah satu tahap lanjut dari kondisi Hernia Nucleus Pulposus (HNP) atau dikenal juga
                    sebagai hernia cakram. Pada tahap sequestrasi, bagian dari disc intervertebral (bantalan antar ruas
                    tulang belakang) pecah dan material di dalam disc bocor ke luar, menyebabkan tekanan yang signifikan
                    pada saraf-saraf di sekitar tulang belakang.</p>
                <p>Dalam tahap sequestrasi, disc intervertebral tidak hanya menonjol keluar tetapi juga mengalami kebocoran
                    material yang dapat menyebabkan rasa nyeri yang sangat intens dan gejala neurologis lainnya.</p>
            </div>
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/tulang.jpg') }}" alt="HNP" class="img-fluid rounded-circle">
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <h3 class="font-weight-bold text-purple">Gejala & Cara Penanganan Sequestrasi</h3>
                <p>Berdasarkan wawancara dengan seorang pakar penyakit saraf yaitu <strong>Isnaini Azhar, MMR, Sp.N,
                        HNP</strong> didapatkan informasi sebagai berikut:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mb-4">
                <div class="card h-100 bg-FFD3D3">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Stadium 3 (Sequestrasi)</h4>
                        <p class="card-text">Adapun gejala-gejala dari Stadium 3 adalah:</p>
                        <ul>
                            <li>Nyeri Pada Pinggang disertai Rasa Panas.</li>
                            <li>Pegal atau Linu pada Pinggang.</li>
                            <li>Rasa Nyeri dari Pinggang Menjalar sampai Kaki.</li>
                            <li>Nyeri Bertambah Ketika Beraktifitas.</li>
                            <li>Sulit Berjalan atau Melakukan Aktifitas.</li>
                            <li>Kaki Sulit atau Tidak Bisa Bergerak (Kelumpuhan Kaki).</li>
                            <li>Gangguan Buang Air Besar dan Kecil.</li>
                        </ul>
                        <p class="card-text">Cara Penanganan Stadium 3 adalah:</p>
                        <ul>
                            <li>Segera ajukan tindakan Operasi karena harus segera ditangani, operasi dilakukan oleh Dokter.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection