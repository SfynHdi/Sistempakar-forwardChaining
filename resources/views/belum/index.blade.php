@extends('layouts.app')
@section('content')
    <div id="cek-diagnosa" class="cek-diagnosa">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4 class="text-dark">Selamat Datang di Aplikasi Sistem Pakar</h4>
                <h1 class="heading-bold">Deteksi Penyakit Hernia Nucleus Pulposus (HNP)</h1>
                <p>Apakah kamu sering mengalami nyeri punggung yang tak kunjung hilang?</p>
                <p>Merasa kesemutan atau lemah pada bagian kaki?</p>
                <p>Jangan abaikan gejala tersebut, karena bisa jadi kamu mengalami Hernia Nucleus Pulposus (HNP)</p>
                @if (Auth::check())
                    <!-- Jika pengguna sudah login -->
                    <a href="{{ route('cek-diagnosa') }}" class="btn btn-ungu">Cek Diagnosa</a>
                @else
                    <!-- Jika pengguna belum login -->
                    <a href="{{ route('diagnosa-mandiri') }}" class="btn btn-ungu">Cek Diagnosa</a>
                @endif
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/dokter.png') }}" alt="Dokter" class="img-fluid">
            </div>
        </div>
    </div>
    <img src="{{ asset('images/hiasan.png') }}" alt="">
    <div id="pengertian-hnp" class="pengertian-hnp">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="heading-bold">Apa Itu Hernia Nucleus <br> Pulposus (HNP) ?</h1>
                <p class="custom-article-body">
                    Hernia Nucleus Pulposus (HNP) adalah salah satu penyebab dari nyeri punggung bawah, HNP juga merupakan
                    <strong>kondisi dimana terjadi <br> protrusi pada discus intervertebralis yang disebabkan karena injury
                        dan
                        beban mekanik yang salah dalam waktu yang lama.</strong>
                    Penyakit ini sering terjadi saat bantalan lunak diantara ruas-ruas tulang belakang dan mengalami tekanan
                    serta pecah.
                </p>
                <div class="text mt-4">
                    <a href="{{ route('daftar-penyakit') }}" class="btn btn-outline-ungu">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/tulang.jpg') }}" alt="HNP" class="img-fluid custom-image">
            </div>
        </div>
    </div>

    <h1 class="artikel-hnp">Artikel tentang HNP</h1>
    <div id="tentang-aplikasi" class="tentang-aplikasi">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card-custom">
                    <img src="images/sakit_boyok (1).jpg" alt="HNP Image" class="card-img-left">
                    <div class="card-content">
                        <div class="card-title">Penyebab Hernia Nucleus Pulposus</div>
                        <div class="card-text">Saraf kejepit terjadi saat saraf tertekan oleh jaringan tubuh di sekitarnya.
                        </div>
                        <a href="{{ url('/post/artikel-1') }}" class="card-button">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card-custom">
                    <img src="images/sakit_boyok (2).jpg" alt="HNP Image" class="card-img-left">
                    <div class="card-content">
                        <div class="card-title">Cara Mencegah Saraf Terjepit</div>
                        <div class="card-text">Saraf terjepit disebabkan oleh tekanan berlebih dari jaringan sekitarnya.
                        </div>
                        <a href="{{ url('/post/artikel-2') }}" class="card-button">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card-custom">
                    <img src="images/sakit_boyok (3).jpg" alt="HNP Image" class="card-img-left">
                    <div class="card-content">
                        <div class="card-title">Mengatasi Saraf Kejepit dengan Fisioterapi</div>
                        <div class="card-text">HNP terjadi saat bantalan tulang belakang menekan saraf tulang belakang.
                        </div>
                        <a href="{{ url('/post/artikel-3') }}" class="card-button">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card-custom">
                    <img src="images/sakit_boyok (4).jpg" alt="HNP Image" class="card-img-left">
                    <div class="card-content">
                        <div class="card-title">Gerakan Peregangan untuk Nyeri Saraf</div>
                        <div class="card-text">Sciatica adalah nyeri akibat saraf rusak atau terjepit, sering pada usia
                            lanjut.</div>
                        <a href="{{ url('/post/artikel-4') }}" class="card-button">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
