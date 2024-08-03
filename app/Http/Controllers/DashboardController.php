<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function beranda()
    {
        return view('belum.index');
    }
    public function admindashboard()
    {
        if (auth()->check() && auth()->user()->email === 'admin@cekhnp.online') {
            return $this->dashboard();
        } else {
            return response()->view('sudah.404', [], 404);
        }
    }

    public function cekDiagnosaSudah()
    {
        // Ambil data dari database
        $gejala = Gejala::all();

        return view('sudah.cek-diagnosa', ['gejala' => $gejala]);
    }




    public function dataDiagnosa()
    {
        // Fetch all diagnosa records
        $diagnosa = DB::table('hasil_diagnosa')
        ->join('users', 'hasil_diagnosa.user_id', '=', 'users.id')
        ->select(
            'users.name as user_name',
            'hasil_diagnosa.gejala_yang_dipilih',
            'hasil_diagnosa.hasil',
            'hasil_diagnosa.created_at'
        )
            ->get();

        // Process and format data
        $diagnosa = $diagnosa->map(function ($item) {
            return [
                'user_name' => $item->user_name,
                'gejala_yang_dipilih' => json_decode($item->gejala_yang_dipilih),
                'hasil' => json_decode($item->hasil),
                'created_at' => $item->created_at,
            ];
        });

        return view('admin.data-diagnosa', ['diagnosa' => $diagnosa]);
    }



    public function dataPengguna()
    {
        $users = DB::table('users')->get();
        return view('admin.data-pengguna', ['users' => $users]);
    }

    public function deletePengguna($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('dataPengguna')->with('success', 'User deleted successfully');
    }

    public function storePengguna(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect back to the data pengguna page with a success message
        return redirect()->route('dataPengguna')->with('success', 'User added successfully');
    }
    public function updatePengguna(Request $request, $id)
    {
        $request->validate([
        ]);

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dataPengguna')->with('success', 'Gejala updated successfully');
    }

    public function dataPenyakit()
    {
        $penyakit = DB::table('penyakit')->get();
        return view('admin.data-penyakit', ['penyakit' => $penyakit]);
    }

    public function storePenyakit(Request $request)
    {
        $request->validate([
            'nama_penyakit' => 'required|string|max:255|unique:penyakit',
        ]);

        DB::table('penyakit')->insert([
            'nama_penyakit' => $request->nama_penyakit,
            'created_by' => auth()->user()->id, // Assuming created_by is set to the ID of the currently authenticated user
            'updated_by' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('dataPenyakit')->with('success', 'Data penyakit berhasil ditambahkan');
    }

    public function updatePenyakit(Request $request, $id)
    {
        $request->validate([
            'nama_penyakit' => 'required|string|max:255',
        ]);

        DB::table('penyakit')->where('id', $id)->update([
            'nama_penyakit' => $request->nama_penyakit,
            'updated_by' => auth()->user()->id,
            'updated_at' => now(),
        ]);

        return redirect()->route('dataPenyakit')->with('success', 'Data penyakit berhasil diperbarui');
    }

    public function deletePenyakit($id)
    {
        DB::table('penyakit')->where('id', $id)->delete();

        return redirect()->route('dataPenyakit')->with('success', 'Data penyakit berhasil dihapus');
    }

    public function dataGejala()
    {
        $gejala = DB::table('gejala')->get();
        return view('admin.data-gejala', ['gejala' => $gejala]);
    }

    public function storeGejala(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255|unique:gejala',
        ]);

        DB::table('gejala')->insert([
            'nama_gejala' => $request->nama_gejala,
            'created_by' => auth()->user()->id, // Assuming created_by is set to the ID of the currently authenticated user
            'updated_by' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('dataGejala')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function updateGejala(Request $request, $id)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        DB::table('gejala')->where('id', $id)->update([
            'nama_gejala' => $request->nama_gejala,
            'updated_by' => auth()->user()->id,
            'updated_at' => now(),
        ]);

        return redirect()->route('dataGejala')->with('success', 'Gejala berhasil diperbarui');
    }

    public function deleteGejala($id)
    {
        DB::table('gejala')->where('id', $id)->delete();
        return redirect()->route('dataGejala')->with('success', 'Gejala berhasil dihapus');
    }

    public function dataRiwayat()
    {
        $gejala = DB::table('hasil_diagnosa')->get();
        return $this->dashboard(); // Ensuring dashboard data is included
    }

    public function riwayatDiagnosa()
    {
        // Get the diagnosis history joined with user data
        $riwayat_diagnosa = DB::table('hasil_diagnosa')
        ->join('users', 'hasil_diagnosa.user_id', '=', 'users.id')
        ->select('hasil_diagnosa.*', 'users.name as user_name')
        ->get();

        // Get the lists of symptoms and diseases
        $gejalaList = DB::table('gejala')->pluck('nama_gejala', 'id')->toArray();
        $penyakitList = DB::table('penyakit')->pluck('nama_penyakit', 'id')->toArray();

        // Process each diagnosis record
        foreach ($riwayat_diagnosa as $riwayat) {
            // Decode the JSON or handle comma-separated values
            $gejalaCodes = json_decode($riwayat->gejala_yang_dipilih, true) ?? explode(',', $riwayat->gejala_yang_dipilih);

            // Map symptom IDs to their names
            $riwayat->gejala_dipilih = implode('<br>', array_map(function ($id) use ($gejalaList) {
                return $gejalaList[$id] ?? $id;
            }, $gejalaCodes));

            // Map diagnosis result ID to the disease name
            if (is_array($riwayat->hasil)) {
                $riwayat->hasil_diagnosa = implode(', ', array_map(function ($result) use ($penyakitList) {
                    return $penyakitList[$result] ?? $result;
                }, $riwayat->hasil));
            } else {
                $riwayat->hasil_diagnosa = $penyakitList[$riwayat->hasil] ?? $riwayat->hasil;
            }
        }

        return view('admin.data-riwayat-diagnosa', ['riwayat_diagnosa' => $riwayat_diagnosa]);
    }


    public function riwayatDiagnosaSudah()
    {
        $userId = auth()->user()->id; // Mendapatkan ID pengguna yang sedang login

        // Mengambil riwayat diagnosa untuk pengguna yang sedang login
        $riwayatDiagnosa = DB::table('hasil_diagnosa')
        ->where('user_id', $userId)
            ->get();

        // Mengambil daftar gejala dan penyakit untuk digunakan dalam pemetaan
        $gejalaList = DB::table('gejala')->pluck('nama_gejala', 'id')->toArray();
        $penyakitList = DB::table('penyakit')->pluck('nama_penyakit', 'id')->toArray();

        // Menambahkan nama gejala dan hasil diagnosa ke setiap entri riwayat
        foreach ($riwayatDiagnosa as $riwayat) {
            // Mengubah JSON gejala_yang_dipilih menjadi array jika valid
            $gejalaCodes = json_decode($riwayat->gejala_yang_dipilih, true);
            if (is_array($gejalaCodes)) {
                $riwayat->gejala_dipilih = array_map(function ($id) use ($gejalaList) {
                    return $gejalaList[$id] ?? $id; // Menampilkan nama gejala atau ID jika tidak ditemukan
                }, $gejalaCodes);
            } else {
                $riwayat->gejala_dipilih = []; // Atau tangani sesuai kebutuhan jika JSON tidak valid
            }

            // Menampilkan nama penyakit atau ID jika tidak ditemukan
            $riwayat->hasil_diagnosa = $penyakitList[$riwayat->hasil] ?? $riwayat->hasil;
        }

        return view('sudah.index', ['riwayat_diagnosa' => $riwayatDiagnosa]);
    }


    public function deleteRiwayatDiagnosa($id)
    {
        // Hapus riwayat diagnosa berdasarkan ID
        DB::table('hasil_diagnosa')->where('id', $id)->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('riwayat-diagnosa-sudah')->with('success', 'Riwayat diagnosa berhasil dihapus');
    }


    public function dashboard()
    {
        $jumlahPasien = DB::table('users')->count();
        $jumlahPenyakit = DB::table('penyakit')->count();
        $jumlahGejala = DB::table('gejala')->count();
        $jumlahRiwayat = DB::table('hasil_diagnosa')->count();

        return view('admin.index', compact('jumlahPasien', 'jumlahPenyakit', 'jumlahGejala', 'jumlahRiwayat'));
    }
}