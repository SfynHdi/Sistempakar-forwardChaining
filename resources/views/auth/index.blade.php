@extends('layouts.app')

@section('content')
    <div class="profile-container">
        <div class="profil">
            <h2>Pengaturan Profil</h2>
            <div class="profile-sidebar">
                <img src="{{ asset('images/pasfoto.jpg') }}" alt="Profile Picture">
                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }}</p>
                <a href="/profile" class="btn btn-purple">
                    <i class="bi bi-pencil"></i> Ubah Profil
                </a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-red">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </button>
                </form>
            </div>

        </div>

        <div class="profile-content">
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
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($riwayat->waktu)->format('d/m/y') }}</td>
                                    <td>{{ $riwayat->gejala_dipilih }}</td>
                                    <td>{{ $riwayat->hasil_diagnosa }}</td>
                                    <td>
                                        <button class="action-button print"><i class="bi bi-printer"></i></button>
                                        <button class="action-button delete" data-id="{{ $riwayat->id }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="width: auto;">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                scrollX: true,

            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('deleteModal');
            var deleteForm = document.getElementById('deleteForm');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                deleteForm.action = '/sudah/riwayat-diagnosa/' + id;
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            scroll: true
        });
    </script>
@endsection
