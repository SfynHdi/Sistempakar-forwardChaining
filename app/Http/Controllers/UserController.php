<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(); // Sesuaikan dengan logika pengambilan data yang Anda butuhkan

        return view('sudah.index', compact('users'));
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect()->route('data-pasien')->with('success', 'Pengguna berhasil dihapus.');
    }

}
