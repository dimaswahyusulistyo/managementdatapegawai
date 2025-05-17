<?php

namespace App\Http\Controllers;

use App\Models\Jenispegawai;
use Illuminate\Http\Request;

class JenispegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenispegawais = jenispegawai::all();
        return view('dimas-app.tablejenispegawai', compact('jenispegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dimas-app.formjenispegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenispegawai' => 'required',
        ]);

        // dd ($request);
        $jenispegawai = new JenisPegawai(); // Pastikan nama model sesuai
        $jenispegawai->jenispegawai = $request->jenispegawai;
        $jenispegawai->save();        
        return redirect('/tablejenispegawai');
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
        $jenispegawai = jenispegawai::findOrFail($id);
        return view('dimas-app.editjenispegawai', compact('jenispegawai'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenispegawai = jenispegawai::findOrFail($id);
        $jenispegawai->jenispegawai = $request->jenispegawai;
        $jenispegawai->save();
        return redirect('/tablejenispegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenispegawai = jenispegawai::findOrFail($id);
        $jenispegawai->delete();
        return redirect('/tablejenispegawai');

    }
}
