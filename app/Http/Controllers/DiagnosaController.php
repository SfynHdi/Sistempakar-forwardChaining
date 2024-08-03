<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class DiagnosaController extends Controller
{
    public function index()
    {
        // Fetch all gejala
        $gejala = Gejala::all();

        // Fetch all penyakit along with their related diagnosa and gejala
        $penyakit = Penyakit::with('diagnosa.gejala')->get();
        $gejala = Gejala::all()->toArray(); // Mengambil data sebagai array

        // Lakukan natural sorting pada array
        usort($gejala, function ($a, $b) {
            return strnatcmp($a['kode_gejala'], $b['kode_gejala']); // Pastikan $a dan $b adalah array
        });

        // Kembalikan data ke collection setelah sorting
        $gejala = collect($gejala);
        return view('belum.cek-diagnosa', compact('gejala', 'penyakit'));
    }
    public function cetak(Request $request)
    {
        $namaPengguna = $request->input('namaPengguna');
        $emailHP = $request->input('emailHP');
        $gejalaDipilih = $request->input('gejalaDipilih');
        $hasilDiagnosa = $request->input('hasilDiagnosa');

        return view('sudah.cetak', compact('namaPengguna', 'emailHP', 'gejalaDipilih', 'hasilDiagnosa'));
    }
    public function prosesDiagnosa(Request $request)
    {
        // Gejala yang dipilih oleh user
        $gejala_yang_dipilih = $request->input('gejala_ids'); // array of gejala_id

        // Ambil semua penyakit
        $penyakit = DB::table('penyakit')->get();

        $hasil = [];

        // Loop through each penyakit to check if it matches the selected gejala
        foreach ($penyakit as $p) {
            $penyakitGejala = DB::table('penyakit_gejala')
            ->where('penyakit_id', $p->id)
                ->pluck('gejala_id')
                ->toArray();

            if (count(array_intersect($penyakitGejala, $gejala_yang_dipilih)) === count($penyakitGejala)) {
                $hasil[] = $p->nama_penyakit;
            }
        }

        // Simpan hasil diagnosa
        DB::table('hasil_diagnosa')->insert([
            'user_id' => Auth::id(), // Assuming the user is authenticated
            'gejala_yang_dipilih' => json_encode($gejala_yang_dipilih),
            'hasil' => json_encode($hasil),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'status' => 'success',
            'hasil' => $hasil
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_diagnosa' => 'required|unique:diagnosa,kode_diagnosa',
            'kode_penyakit' => 'required|exists:penyakit,kode_penyakit',
            'kode_gejala' => 'required|exists:gejala,kode_gejala',
        ]);

        DB::table('diagnosa')->insert([
            'kode_diagnosa' => $validated['kode_diagnosa'],
            'kode_penyakit' => $validated['kode_penyakit'],
            'kode_gejala' => $validated['kode_gejala'],
        ]);

        return redirect()->back()->with('success', 'Data Diagnosa berhasil ditambahkan.');
    }

    public function update(Request $request, $kodeDiagnosa)
    {
        $validated = $request->validate([
            'kode_penyakit' => 'required|exists:penyakit,kode_penyakit',
            'kode_gejala' => 'required|exists:gejala,kode_gejala',
        ]);

        DB::table('diagnosa')->where('kode_diagnosa', $kodeDiagnosa)->update([
            'kode_penyakit' => $validated['kode_penyakit'],
            'kode_gejala' => $validated['kode_gejala'],
        ]);

        return redirect()->back()->with('success', 'Data Diagnosa berhasil diperbarui.');
    }

    public function destroy($kodeDiagnosa)
    {
        DB::table('hasil_diagnosa')->where('id', $kodeDiagnosa)->delete();

        return redirect()->back()->with('success', 'Data Diagnosa berhasil dihapus.');
    }

    public function printDiagnosa($diagnosaId)
    {
        // Ambil data dari tabel hasil_diagnosa
        // Ambil data dari tabel hasil_diagnosa
        $hasilDiagnosa = DB::table('hasil_diagnosa')->where('id', $diagnosaId)->first();

        if (!$hasilDiagnosa) {
            abort(404, 'Data tidak ditemukan.');
        }

        // Ambil data pengguna berdasarkan user_id
        $user = DB::table('users')->where('id', $hasilDiagnosa->user_id)->first();

        // Ambil nama penyakit berdasarkan hasil diagnosa
        $penyakit = DB::table('penyakit')->where('id', $hasilDiagnosa->hasil)->first();

        // Ambil nama gejala
        $gejalaIds = json_decode($hasilDiagnosa->gejala_yang_dipilih, true);
        $gejalaList = DB::table('gejala')
        ->whereIn('id', $gejalaIds)
        ->pluck('nama_gejala')
        ->toArray();

        // Konversi hasil diagnosa dari JSON string menjadi array
        $hasilDiagnosaList = json_decode($hasilDiagnosa->hasil, true);
        $hasilDiagnosaText = is_array($hasilDiagnosaList) ? implode(', ', $hasilDiagnosaList) : $hasilDiagnosa->hasil;

        // Siapkan data untuk view PDF
        $data = [
                'namaPengguna' => $user->name,
                'emailHP' => $user->email,
                'gejalaDipilih' => implode(', ', $gejalaList),
                'hasilDiagnosa' => $hasilDiagnosaText,
            ];

        // Generate PDF
        $pdf = PDF::loadView('sudah.print', $data);
        return $pdf->download('Hasil_Diagnosa_' . $user->name . '.pdf');
    }

    
}