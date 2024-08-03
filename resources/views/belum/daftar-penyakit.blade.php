@extends('layouts.app')

@section('content')
    <style>
        .text-purple {
            font-weight: 700;
            color: purple;
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
            <div class="col-md-7">
                <h2 class="font-weight-bold text-purple">Apa Itu Hernia Nucleus Pulposus (HNP)?</h2>
                <p>Hernia Nucleus Pulposus (HNP) merupakan salah satu penyebab dari nyeri punggung bawah. Hernia Nucleus
                    Pulposus (HNP) adalah kondisi dimana terjadi dorongan pada disc intervertebralis yang disebabkan karena
                    pecahnya anulus fibrosus dan keluar serta menekan saraf tulang belakang. HNP adalah salah satu penyebab
                    nyeri punggung bawah yang terjadi pada lebih dari 90% kasus.</p>
                <p>HNP menyebabkan timbulnya penyempitan dan terjepitnya saraf-saraf tulang yang melalui tulang belakang.
                    Hernia Nucleus Pulposus juga sering menyebabkan nyeri yang menjalar dari punggung bawah ke kaki.</p>
            </div>
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/tulang.jpg') }}" alt="HNP" class="img-fluid rounded-circle">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-9">
                <h3 class="font-weight-bold text-purple">Daftar atau Jenis Penyakit HNP</h3>
                <p>Berdasarkan wawancara dengan seorang pakar penyakit saraf yaitu <strong> Isnaini Azhar, MMR, Sp.N, HNP
                    </strong> dapat
                    dikelompokkan menjadi 3 Stadium atau jenis penyakit berdasarkan gejala yang ditimbulkan, yaitu:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
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
            <div class="col-md-4 mb-4">
                <div class="card h-100 bg-FFF8D6">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Stadium 2 (Protusi)</h4>
                        <p class="card-text">Adapun gejala-gejala dari Stadium 2 adalah:</p>
                        <ul>
                            <li>Pegal atau Linu pada Pinggang.</li>
                            <li>Sering Merasa Kebas atau Kesemutan.</li>
                            <li>Rasa Nyeri Pada Pinggang disertai Rasa Panas.</li>
                            <li>Rasa Nyeri dari Pinggang Menjalar Sampai Kaki.</li>
                            <li>Nyeri Bertambah Ketika Beraktifitas.</li>
                        </ul>
                        <p class="card-text">Cara Penanganan Stadium 2 adalah :</p>
                        <ul>
                            <li>Pemberian obat-obatan(Resep Dokter).</li>
                            <li>Mengurangi Aktifitas Berat.</li>
                            <li>Disarankan untuk rutin berenang.</li>
                            <li>Jika masih sakit dalam jangka waktu panjang maka dapat mengajukan tindakan seperti operasi
                                (dilakukan atas saran Dokter dan dilakukan oleh Dokter).</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 bg-FFD3D3">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Stadium 3 (Sequestrasi)</h4>
                        <p class="card-text">Adapun gejala-gejala dari Stadium 3 adalah:</p>
                        <ul>
                            <li>Nyeri Pada Pinggang disertai Rasa Panas.</li>
                            <li>Pegal atau Linu pada Pinggang.</li>
                            <li>Rasa Nyeri dari Pinggang Menjalar sampai Kaki.</li>
                            <li>Nyeri Bertambah Ketika Beraktifitas.</li>
                            <li>sulit Berjalan atau Melakukan Aktifitas.</li>
                            <li>Kaki Sulit atau Tidak Bisa Bergerak (Kelumpuhan Kaki).</li>
                            <li>Gangguan Buang Air Besar dan Kecil.</li>
                        </ul>
                        <p class="card-text">Cara Penanganan Stadium 3 adalah :</p>
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
