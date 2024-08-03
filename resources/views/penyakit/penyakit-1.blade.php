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
                <h2 class="font-weight-bold text-purple">Apa Itu Bulging?</h2>
                <p>Bulging adalah salah satu tahapan awal dari kondisi Hernia Nucleus Pulposus (HNP) atau dikenal juga
                    sebagai hernia cakram. Pada tahap bulging, terjadi perubahan bentuk dan posisi dari disc intervertebral
                    (bantalan antar ruas tulang belakang) tanpa adanya penonjolan atau kebocoran material di dalam disc.</p>
                <p>Dalam tahap bulging, disc intervertebral tidak lagi berbentuk rata, melainkan menggelembung ke arah luar
                    dari ruang di antara ruas tulang belakang. Meskipun belum terjadi kebocoran, kondisi bulging ini sudah
                    dapat menyebabkan rasa sakit dan menekan saraf-saraf di sekitar tulang belakang.</p>
            </div>
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/tulang.jpg') }}" alt="HNP" class="img-fluid rounded-circle">
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <h3 class="font-weight-bold text-purple">Gejala & Cara Penanganan Bulging</h3>
                <p>Berdasarkan wawancara dengan seorang pakar penyakit saraf yaitu <strong> Isnaini Azhar, MMR, Sp.N, HNP
                    </strong> didapatkan informasi sebagai berikut:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mb-4">
                <div class="card h-100 bg-DDFFD1">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Stadium 1 (Bulging)</h4>
                        <p class="card-text">Adapun gejala-gejala dari Stadium 1 adalah:</p>
                        <ul>
                            <li>Pegal atau Linu pada Pinggang.</li>
                            <li>Nyeri Pada Pinggang.</li>
                            <li>Rasa Nyeri dari Pinggang Menjalar ke Paha.</li>
                            <li>Sering Merasa Kebas atau Kesemutan.</li>
                        </ul>
                        <p class="card-text">Cara Penanganan Stadium 1 adalah :</p>
                        <ul>
                            <li>Pemberian obat-obatan(Resep Dokter).</li>
                            <li>Mengurangi Aktifitas Berat.</li>
                            <li>Menjalankan Fisioterapi.</li>
                            <li>Disarankan untuk rutin berenang.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
