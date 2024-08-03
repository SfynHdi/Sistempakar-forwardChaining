@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profil col-md-3">
        <h2>Pengaturan Profil</h2>
        <div class="profile-sidebar">
            <img src="{{ asset('images/pasfoto.jpg') }}" alt="Profile Picture">
            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-red">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>

    </div>

    <div class="profile-content col-md-9">
        <div>
            <h3>Riwayat Diagnosa</h3>
            <div class="diagnosa-content">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Gejala Dipilih</th>
                            <th>Hasil Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($riwayat_diagnosa as $riwayat)

                        <td>{{ $riwayat->created_at }}</td>
                        <td>
                            @if (is_array($riwayat->gejala_dipilih))
                            {{ implode(', ', $riwayat->gejala_dipilih) }}
                            @else
                            {{ $riwayat->gejala_dipilih }}
                            @endif
                        </td>
                        <td>
                            @if(is_array($riwayat->hasil_diagnosa) || is_object($riwayat->hasil_diagnosa))
                            <ul>
                                @foreach($riwayat->hasil_diagnosa as $key => $value)
                                <li>{{ $key }}: {{ is_array($value) ? json_encode($value, JSON_PRETTY_PRINT) : $value }}</li>
                                @endforeach
                            </ul>
                            @else
                            {{ $riwayat->hasil_diagnosa }}
                            @endif
                        </td>

                        <td>
                            <button class="action-button print" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-printer"></i></button>
                            <!-- Tombol Hapus -->
                            <a href="{{ route('print-diagnosa', ['id' => $riwayat->id]) }}" class="action-button print"><i class="bi bi-printer"></i></a>


                            <form action="{{ route('deleteRiwayatDiagnosa', $riwayat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button delete" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <!-- <form id="deleteForm" method="POST" action="" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button delete" data-id="{{ $riwayat->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form> -->
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Diagnosa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="namaPengguna" class="form-label">Nama Pengguna</label>
                                        <input type="text" class="form-control" id="namaPengguna" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailHP" class="form-label">Email / HP</label>
                                        <input type="text" class="form-control" id="emailHP" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gejalaDipilih" class="form-label">Gejala yang Dipilih</label>
                                        <textarea id="gejalaDipilih" class="form-control" rows="5" readonly></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hasilDiagnosa" class="form-label">Hasil Diagnosa</label>
                                        <input type="text" class="form-control" id="hasilDiagnosa" readonly>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="printButton">Print</button>
                                <button type="button" class="btn btn-warning" id="downloadButton">Download</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus riwayat diagnosa ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: auto;">Batal</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Fungsi untuk Print
    document.getElementById('printButtonCetak').addEventListener('click', function() {
        window.print();
    });

    // Fungsi untuk Download
    document.getElementById('downloadButton').addEventListener('click', function() {
        // Dapatkan ID diagnosa dari data-attribute atau elemen terkait di modal
        let diagnosaId = document.getElementById('exampleModal').getAttribute('data-diagnosa-id');
        let downloadUrl = `/print-diagnosa/${diagnosaId}`; // Sesuaikan dengan route Anda

        // Redirect untuk mengunduh PDF
        window.location.href = downloadUrl;
    });
</script>
<!-- Pastikan untuk menetapkan ID diagnosa saat menampilkan modal -->
<script>
    function showModal(diagnosaId) {
        // Set ID diagnosa ke data attribute modal
        document.getElementById('exampleModal').setAttribute('data-diagnosa-id', diagnosaId);

        // Tampilkan modal
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [0, "desc"]
            ], // Mengurutkan kolom waktu secara menurun
            scrollX: true,
            responsive: true,
            "columnDefs": [{
                "targets": 1, // Index dari kolom "Gejala Dipilih"
                "render": function(data, type, row) {
                    if (type === 'display') {
                        // Mengganti koma dengan <br> untuk menampilkan data dalam baris baru
                        return data.replace(/,/g, '<br>');
                    }
                    return data;
                }
            }]
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var form = document.getElementById('deleteForm');
                form.action = '/riwayat-diagnosa/' + id;
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var printButtons = document.querySelectorAll('.print');

        printButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var row = this.closest('tr');
                var gejalaDipilih = row.getAttribute('data-gejala');
                var hasilDiagnosa = row.getAttribute('data-hasil');

                if (gejalaDipilih) {
                    var gejalaArray = JSON.parse(gejalaDipilih);
                    var formattedGejala = Array.isArray(gejalaArray) ? gejalaArray.join(', ') :
                        gejalaArray;
                } else {
                    var formattedGejala = '';
                }

                document.getElementById('namaPengguna').value = '{{ auth()->user()->name }}';
                document.getElementById('emailHP').value = '{{ auth()->user()->email }}';
                document.getElementById('gejalaDipilih').value = formattedGejala;
                document.getElementById('hasilDiagnosa').value = hasilDiagnosa;
            });
        });

        document.getElementById('printButton').addEventListener('click', function() {
            var namaPengguna = document.getElementById('namaPengguna').value;
            var emailHP = document.getElementById('emailHP').value;
            var gejalaDipilih = document.getElementById('gejalaDipilih').value;
            var hasilDiagnosa = document.getElementById('hasilDiagnosa').value;

            var url = new URL(window.location.origin + '/sudah.cetak');
            url.searchParams.append('namaPengguna', namaPengguna);
            url.searchParams.append('emailHP', emailHP);
            url.searchParams.append('gejalaDipilih', gejalaDipilih);
            url.searchParams.append('hasilDiagnosa', hasilDiagnosa);

            window.location.href = url.toString();
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var downloadButton = document.getElementById('downloadButton');
        var printButton = document.getElementById('printButton');

        downloadButton.addEventListener('click', function() {
            var namaPengguna = document.getElementById('namaPengguna').value;
            var emailHP = document.getElementById('emailHP').value;
            var gejalaDipilih = document.getElementById('gejalaDipilih').value;
            var hasilDiagnosa = document.getElementById('hasilDiagnosa').value;

            var content = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Hasil Diagnosa ${namaPengguna}</title>
                    <style>
                        @page { size: A4; margin: 20mm; }
                        body { font-family: Arial, sans-serif; font-size: 18px; margin: 0; padding: 0; text-align: center; width: 210mm; height: 297mm; box-sizing: border-box; }
                        .container { width: 100%; height: 100%; padding: 20mm; box-sizing: border-box; }
                        .info-item { margin-bottom: 20px; text-align: left; display: flex; align-items: flex-start; width: 100%; }
                        .info-item span { display: inline-block; width: 150px; vertical-align: top; }
                        .info-item div { display: inline-block; width: calc(100% - 150px); text-align: left; }
                        .bold { font-weight: bold; }
                        .note { text-align: left; margin-top: 40px; }
                        p { margin: 10px 0; }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1 class="bold">Hasil Diagnosa</h1>
                        <p>Hasil diagnosa penyakit Hernia Nucleus Pulposus <br> menggunakan metode forward chaining.</p>
                        <br><br><br>
                        <div class="info-item">
                            <span>Nama Pengguna</span>:&nbsp;&nbsp;&nbsp;<div>${namaPengguna}</div>
                        </div>
                        <div class="info-item">
                            <span>Email/HP</span>:&nbsp;&nbsp;&nbsp;<div>${emailHP}</div>
                        </div>
                        <div class="info-item">
                            <span>Gejala Yang Dipilih</span>:&nbsp;&nbsp;&nbsp;<div>${gejalaDipilih}</div>
                        </div>
                        <div class="info-item">
                            <span>Hasil Diagnosa</span>:&nbsp;&nbsp;&nbsp;<div>${hasilDiagnosa}</div>
                        </div>
                        <div class="note">
                            <p>NB.<br>
                            Diagnosa dilakukan dengan menggunakan metode Forward Chaining, segera periksakan diri anda ke Dokter untuk pengangan lebih lanjut.</p>
                            <p class="bold">- Deteksi HNP</p>
                        </div>
                    </div>
                </body>
                </html>
            `;

            var iframe = document.createElement('iframe');
            iframe.style.position = 'absolute';
            iframe.style.width = '0';
            iframe.style.height = '0';
            iframe.style.border = 'none';
            document.body.appendChild(iframe);
            var doc = iframe.contentWindow.document;
            doc.open();
            doc.write(content);
            doc.close();
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
            document.body.removeChild(iframe);
        });

        printButton.addEventListener('click', function() {
            window.print();
        });
    });
</script>



<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .custom-header {
        background-color: #FCF0FF !important;
        color: #000 !important;
        font-weight: bold !important;
    }

    .profile-container {
        display: flex;
        flex-direction: column;
        margin: 20px;
    }

    .profile-content {
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .profile-sidebar,
    .diagnosa-content {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .profile-sidebar {
        text-align: center;
    }

    .profile-sidebar img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .profile-sidebar h2 {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .profile-sidebar p {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #fff;
        width: 100%;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-purple {
        background-color: #7b00a0 !important;
        color: white !important;
    }

    .btn-red {
        background-color: #ff4d4d !important;
        margin-top: 10px;
        color: white !important;
    }

    .btn i {
        margin-right: 8px;
    }

    .logout-form {
        display: inline;
    }

    .diagnosa-content h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .diagnosis-table {
        width: 100%;
        border-collapse: collapse;
    }

    .diagnosis-table th,
    .diagnosis-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .diagnosis-table th {
        background-color: #f2f2f2;
    }

    .diagnosis-table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .diagnosis-table tbody tr:nth-child(even) {
        background-color: #fff;
    }

    .action-button {
        background-color: #7b00a0;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .action-button.delete {
        background-color: #ff4d4d;
    }

    .action-button.print {
        background-color: #7b00a0;
    }

    .action-button i {
        margin-right: 0;
    }

    @media (min-width: 768px) {
        .profile-container {
            flex-direction: row;
        }

        .profile-content {
            flex-direction: column;
            flex-grow: 1;
        }

        .profile-sidebar {
            margin-right: 20px;
            flex-basis: 250px;
            flex-shrink: 0;
        }

        .diagnosa-content {
            flex-grow: 1;
        }
    }

    .dataTables_wrapper {
        width: 100%;
        overflow-x: auto;
    }
</style>

<!-- Include jQuery, Bootstrap, and DataTables -->
<link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
@endsection