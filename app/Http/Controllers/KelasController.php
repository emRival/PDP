<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request) {

        $request->validate([
            'nama_kelas' => 'required|string',
        ]);

        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil ditambahkan',
            'data' => $kelas
        ]);
    }

    public function index() {
        $kelas = Kelas::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar kelas',
            'data' => $kelas
        ]);
    }

    public function store(Request $request, $id) {

        $request->validate([
            'nama_kelas' => 'required|string',
        ]);

        $kelas = Kelas::find($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil diubah',
            'data' => $kelas
        ]);
    }

    public function destroy($id) {
        $kelas = Kelas::find($id);
        $kelas->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil dihapus',
            'data' => $kelas
        ]);
    }

    public function restore($id) {
        $kelas = Kelas::onlyTrashed()->find($id);
        $kelas->restore();

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil direstore',
            'data' => $kelas
        ]);
    }
}
