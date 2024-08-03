<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyakitGejalaController extends Controller
{
    public function index()
    {
        $penyakitGejala = DB::table('penyakit_gejala')
            ->join('penyakit', 'penyakit_gejala.penyakit_id', '=', 'penyakit.id')
            ->join('gejala', 'penyakit_gejala.gejala_id', '=', 'gejala.id')
            ->select('penyakit_gejala.id', 'penyakit.nama_penyakit', 'gejala.nama_gejala', 'penyakit_gejala.penyakit_id', 'penyakit_gejala.gejala_id')
            ->get();

        // Fetch penyakit and gejala for use in modals
        $penyakit = DB::table('penyakit')->select('id', 'nama_penyakit')->get();
        $gejala = DB::table('gejala')->select('id', 'nama_gejala')->get();

        return view('admin.data-penyakitGejala', compact('penyakitGejala', 'penyakit', 'gejala'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakit,id',
            'gejala_ids' => 'required|array',
            'gejala_ids.*' => 'exists:gejala,id',
        ]);

        $penyakitId = $request->penyakit_id;
        $gejalaIds = $request->gejala_ids;

        // Insert data using Query Builder
        foreach ($gejalaIds as $gejalaId) {
            DB::table('penyakit_gejala')->insert([
                'penyakit_id' => $penyakitId,
                'gejala_id' => $gejalaId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('penyakit_gejala.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakit,id',
            'gejala_ids' => 'required|array',
            'gejala_ids.*' => 'exists:gejala,id',
        ]);

        $penyakitId = $request->penyakit_id;
        $gejalaIds = $request->gejala_ids;

        // Delete existing gejala for the specific penyakit_id
        DB::table('penyakit_gejala')
            ->where('penyakit_id', $penyakitId)
            ->delete();

        // Insert updated gejala
        foreach ($gejalaIds as $gejalaId) {
            DB::table('penyakit_gejala')->insert([
                'penyakit_id' => $penyakitId,
                'gejala_id' => $gejalaId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('penyakit_gejala.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Delete the specific record
        DB::table('penyakit_gejala')->where('id', $id)->delete();

        return redirect()->route('penyakit_gejala.index')->with('success', 'Data berhasil dihapus.');
    }
}
