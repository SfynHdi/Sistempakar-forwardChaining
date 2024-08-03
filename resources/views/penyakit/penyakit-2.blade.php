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
                <h2 class="font-weight-bold text-purple">Apa Itu Protusi?</h2>
                <p>Protusi adalah salah satu tahapan dari kondisi Hernia Nucleus Pulposus (HNP) atau dikenal juga sebagai
                    hernia cakram. Pada tahap protusi, terjadi penonjolan disc intervertebral (bantalan antar ruas tulang
                    belakang) yang lebih parah dibandingkan bulging, namun belum mencapai tahap ekstrusi atau sekuestrasi.
                </p>
                <p>Dalam tahap protusi, disc intervertebral menonjol keluar lebih jauh dari ruang di antara ruas tulang
                    belakang dan berpotensi menekan saraf-saraf di sekitar tulang belakang, menyebabkan rasa nyeri yang
                    lebih intens dan gejala lainnya.</p>
            </div>
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/tulang.jpg') }}" alt="HNP" class="img-fluid rounded-circle">
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <h3 class="font-weight-bold text-purple">Gejala & Cara Penanganan Protusi</h3>
                <p>Berdasarkan wawancara dengan seorang pakar penyakit saraf yaitu <strong>Isnaini Azhar, MMR, Sp.N,
                        HNP</strong> didapatkan informasi sebagai berikut:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 mb-4">
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
                        <p class="card-text">Cara Penanganan Stadium 2 adalah:</p>
                        <ul>
                            <li>Pemberian obat-obatan (Resep Dokter).</li>
                            <li>Mengurangi Aktifitas Berat.</li>
                            <li>Disarankan untuk rutin berenang.</li>
                            <li>Jika masih sakit dalam jangka waktu panjang maka dapat mengajukan tindakan seperti operasi
                                (dilakukan atas saran Dokter dan dilakukan oleh Dokter).</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
