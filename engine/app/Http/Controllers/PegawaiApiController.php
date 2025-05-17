<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\Jenispegawai;
use App\Models\Statuspegawai;
use App\Models\Pendidikan;
use App\Models\Jeniskelamin;

class PegawaiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexapi()
    {
        $pegawais = Pegawai::all();
        return response()->json($pegawais);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeapi(Request $request)
    {
        $validated = $request->validate([
            'nama_pegawai' => 'required',
            'nik' => 'required',
            'jenispegawai' => 'required',
            'statuspegawai' => 'required',
            'unit' => 'required',
            'subunit' => 'required',
            'pendidikan' => 'required',
            'tanggallahir' => 'required',
            'tempatlahir' => 'required',
            'jeniskelamin' => 'required',
            'agama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();

            // Simpan gambar ke penyimpanan (storage) Laravel
            $gambar->move('upload/', $gambarName);

            $pegawai = new Pegawai();
            $pegawai->nama_pegawai = $request->nama_pegawai;
            $pegawai->nik = $request->nik;
            $pegawai->jenispegawai = $request->jenispegawai;
            $pegawai->statuspegawai = $request->statuspegawai;
            $pegawai->unit = $request->unit;
            $pegawai->subunit = $request->subunit;
            $pegawai->pendidikan = $request->pendidikan;
            $pegawai->tanggallahir = $request->tanggallahir;
            $pegawai->tempatlahir = $request->tempatlahir;
            $pegawai->jeniskelamin = $request->jeniskelamin;
            $pegawai->agama = $request->agama;
            $pegawai->gambar = $gambarName;
            $pegawai->save();

            return response()->json(['message' => 'Data pegawai berhasil disimpan'], 201);
        } else {
            return response()->json(['message' => 'File gambar tidak ditemukan'], 400);
        }
    }


    /**
     * Display the specified resource.
     */
    public function showapi(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return response()->json($pegawai);
    }

    /**
     * Update the specified resource in storage.
     */

     public function updateapi(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama_pegawai' => 'required',
            'nik' => 'required',
            'jenispegawai' => 'required',
            'statuspegawai' => 'required',
            'unit' => 'required',
            'subunit' => 'required',
            'pendidikan' => 'required',
            'tanggallahir' => 'required',
            'tempatlahir' => 'required',
            'jeniskelamin' => 'required',
            'agama' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nik = $request->nik;
        $pegawai->jenispegawai = $request->jenispegawai;
        $pegawai->statuspegawai = $request->statuspegawai;
        $pegawai->unit = $request->unit;
        $pegawai->subunit = $request->subunit;
        $pegawai->pendidikan = $request->pendidikan;
        $pegawai->tanggallahir = $request->tanggallahir;
        $pegawai->tempatlahir = $request->tempatlahir;
        $pegawai->jeniskelamin = $request->jeniskelamin;
        $pegawai->agama = $request->agama;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move('upload/', $gambarName);
            $pegawai->gambar = $gambarName; // Simpan nama file gambar
        }

        $pegawai->save();

        return response()->json(['message' => 'Data pegawai berhasil diupdate'], 200);
    }
     

    /**
     * Remove the specified resource from storage.
     */
    public function destroyapi($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return response()->json(['message' => 'Pegawai deleted successfully'], 204);
    }
}
