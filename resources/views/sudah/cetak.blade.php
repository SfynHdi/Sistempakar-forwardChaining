<!DOCTYPE html>
<html>
<head>
    <title>Hasil Diagnosa_{{ $namaPengguna }}</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 210mm; /* A4 width */
            height: 297mm; /* A4 height */
            box-sizing: border-box;
        }
        .container {
            width: 100%;
            height: 100%;
            padding: 20mm;
            box-sizing: border-box;
        }
        .info-item {
            margin-bottom: 20px;
            text-align: left;
            display: flex;
            align-items: flex-start;
            width: 100%;
        }
        .info-item span {
            display: inline-block;
            width: 150px;
            vertical-align: top;
        }
        .info-item div {
            display: inline-block;
            width: calc(100% - 150px);
            text-align: left;
        }
        .bold {
            font-weight: bold;
        }
        .note {
            text-align: left;
            margin-top: 40px;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="bold">Hasil Diagnosa</h1>
        <p>Hasil diagnosa penyakit Hernia Nucleus Pulposus <br> menggunakan metode forward chaining.</p>
        <br><br><br>
        <div class="info-item">
            <span>Nama Pengguna</span>:&nbsp;&nbsp;&nbsp;<div>{{ $namaPengguna }}</div>
        </div>
        <div class="info-item">
            <span>Email/HP</span>:&nbsp;&nbsp;&nbsp;<div>{{ $emailHP }}</div>
        </div>
        <div class="info-item">
            <span>Gejala Yang Dipilih</span>:&nbsp;&nbsp;&nbsp;<div>{{ $gejalaDipilih }}</div>
        </div>
        <div class="info-item">
            <span>Hasil Diagnosa</span>:&nbsp;&nbsp;&nbsp;<div>{{ $hasilDiagnosa }}</div>
        </div>
        <div class="note">
            <p>NB.<br>
            Diagnosa dilakukan dengan menggunakan metode Forward Chaining, segera periksakan diri anda ke Dokter untuk pengangan lebih lanjut.</p>
            <p class="bold">- Deteksi HNP</p>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
