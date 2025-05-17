<?php

namespace App\Http\Controllers;

use App\Models\Jenispegawai;
use Illuminate\Http\Request;

class JenispegawaiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexapi()
    {
        $jenispegawais = Jenispegawai::all();
        return response()->json($jenispegawais);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeapi(Request $request)
    {
        $jenispegawai = JenisPegawai::create([
            'jenispegawai' => $request->jenispegawai,
        ]);

        return response()->json($jenispegawai,201);
    }

    /**
     * Display the specified resource.
     */
    public function showapi(string $id)
    {
        $jenispegawais = JenisPegawai::findOrFail($id);
        return response()->json($jenispegawais,200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateapi(Request $request, $id)
    {
        $jenispegawai = Jenispegawai::findOrFail($id);
        $jenispegawai->jenispegawai = $request->jenispegawai;
        $jenispegawai->save();
        return response()->json([
            'nama' => $jenispegawai,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyapi($id)
    {
        $jenispegawai = Jenispegawai::findOrFail($id);
        $jenispegawai->delete();
        return response()->json($jenispegawai,204);

    }
}
