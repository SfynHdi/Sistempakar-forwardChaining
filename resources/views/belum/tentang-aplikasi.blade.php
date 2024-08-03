@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-7">
            <style>
                .page-title {
                    font-weight: bold;
                    color: purple;
                }
            </style>

            <h2 class="page-title">Tentang Aplikasi</h2>
            <p>Aplikasi ini dibuat untuk membantu masyarakat dalam melakukan diagnosa terkait penyakit HNP (Hernia Nucleus Pulposus) atau di Indonesia biasa disebut dengan <strong>saraf terjepit</strong>. Metode yang digunakan dalam diagnosa adalah metode forward chaining.</p>
            <p>Data pada aplikasi ini berasal dari studi literatur dan wawancara dengan seorang pakar penyakit saraf yaitu dr. Isnaini Azhar, MMR, Sp.N, yang saat ini bertugas di Rumah Sakit Umum Daerah Pringsewu, Lampung. Hasil wawancara sudah divalidasi dan ditandatangani oleh dr. Isnaini Azhar, MMR, Sp.N dan di cap resmi oleh pihak RSUD.</p>
            <p class="text-muted">Credit: Azka Elhanif (2020201022)</p>
        </div>
        <div class="col-md-5 text-center">
            <div class="position-relative">
                <img src="{{ asset('images/deteksi.png') }}" class="img-fluid">
                <!-- Optional: Anda bisa menambahkan konten tambahan di sini -->
            </div>
        </div>
    </div>
</div>
@endsection
