<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use Illuminate\Http\Request;



class AsramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request) {

        $request->validate([
            'nama_asrama' => 'required|string',
        ]);

        $asrama = Asrama::create([
            'nama_asrama' => $request->nama_asrama,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Asrama berhasil ditambahkan',
            'data' => $asrama
        ]);
    }

    public function index() {
        $asrama = Asrama::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar asrama',
            'data' => $asrama
        ]);
    }

    public function store(Request $request, $id) {

        $request->validate([
            'nama_asrama' => 'required|string',
        ]);

        $asrama = Asrama::find($id);
        $asrama->update([
            'nama_asrama' => $request->nama_asrama,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Asrama berhasil diubah',
            'data' => $asrama
        ]);
    }

    public function destroy($id) {
        $asrama = Asrama::find($id);
        $asrama->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Asrama berhasil dihapus',
            'data' => $asrama
        ]);
    }

    public function restore($id) {
        $asrama = Asrama::withTrashed()->find($id);
        $asrama->restore();

        return response()->json([
            'status' => 'success',
            'message' => 'Asrama berhasil direstore',
            'data' => $asrama
        ]);
    }
}
