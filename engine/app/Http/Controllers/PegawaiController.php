<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\Jenispegawai;
use App\Models\Statuspegawai;
use App\Models\Pendidikan;
use App\Models\Jeniskelamin;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    $pegawais = Pegawai::all();
    //    return view('dimas-app.tablepegawai', compact('pegawais')); 
    $pegawais = Pegawai::all();
    $agamas = Agama::all(); // Ambil semua data agama
    $jenispegawais = Jenispegawai::all();
    $statuspegawais = Statuspegawai::all();
    $pendidikans = Pendidikan::all();
    $jeniskelamins = Jeniskelamin::all();
    return view('dimas-app.tablepegawai', compact('pegawais', 'agamas', 'jenispegawais', 'statuspegawais', 'pendidikans', 'jeniskelamins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agamas = Agama::all();
        $jenispegawais = Jenispegawai::all();
        $statuspegawais = Statuspegawai::all();
        $pendidikans = Pendidikan::all();
        $jeniskelamins = Jeniskelamin::all();
        return view('dimas-app.formpegawai', compact('agamas', 'jenispegawais', 'statuspegawais', 'pendidikans', 'jeniskelamins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        return redirect('/tablepegawai');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $agamas = Agama::all();
        $jenispegawais = Jenispegawai::all();
        $statuspegawais = Statuspegawai::all();
        $pendidikans = Pendidikan::all();
        $jeniskelamins = Jeniskelamin::all();
        return view('dimas-app.editpegawai', compact('pegawai', 'agamas', 'jenispegawais', 'statuspegawais', 'pendidikans', 'jeniskelamins'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $pegawai = Pegawai::findOrFail($id);
    //     $pegawai->nama_pegawai = $request->nama_pegawai;
    //     $pegawai->nik = $request->nik;
    //     $pegawai->jenispegawai = $request->jenispegawai;
    //     $pegawai->statuspegawai = $request->statuspegawai;
    //     $pegawai->unit = $request->unit;
    //     $pegawai->subunit = $request->subunit;
    //     $pegawai->pendidikan = $request->pendidikan;
    //     $pegawai->tanggallahir = $request->tanggallahir;
    //     $pegawai->tempatlahir = $request->tempatlahir;
    //     $pegawai->jeniskelamin = $request->jeniskelamin;
    //     $pegawai->agama = $request->agama;
    //     $pegawai->save();
    //     return redirect('/tablepegawai');
    // }

    public function update(Request $request, $id)
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

        return redirect('/tablepegawai');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect('/tablepegawai');

    }
}
