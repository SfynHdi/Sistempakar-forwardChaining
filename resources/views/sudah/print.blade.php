<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa_{{ $namaPengguna }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .center {
            text-align: center;
            margin: 0;
        }

        .right {
            text-align: left;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 8px;
            vertical-align: top;
        }

        .label {
            font-weight: normal;
        }

        .colon {
            width: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Diagnosa</h1>
        <p class="center">Hasil diagnosa penyakit Hernia Nucleus Pulposus</p>
        <p class="center">menggunakan metode forward chaining.</p><br><br>
        <br> <br>
        <table>
            <tr>
                <td class="label">Nama Pengguna</td>
                <td class="colon">:</td>
                <td>{{ $namaPengguna }}</td>
            </tr>
            <tr>
                <td class="label">Email/HP</td>
                <td class="colon">:</td>
                <td>{{ $emailHP }}</td>
            </tr>
            <tr>
                <td class="label">Gejala Yang Dipilih</td>
                <td class="colon">:</td>
                <td>{{ $gejalaDipilih }}</td>
            </tr>
            <tr>
                <td class="label">Hasil Diagnosa</td>
                <td class="colon">:</td>
                <td>{{ $hasilDiagnosa }}</td>
            </tr>
        </table>
        <div>
            <p class="right">NB.</p>
            <p class="right">Diagnosa dilakukan dengan menggunakan metode Forward Chaining, segera periksakan diri anda ke Dokter untuk penanganan lebih lanjut.</p>
            <p><strong>Deteksi HNP</strong></p>
        </div>
    </div>
</body>

</html>