<?php

namespace App\Http\Controllers;

use App\Models\Statuspegawai;
use Illuminate\Http\Request;

class StatuspegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuspegawais = statuspegawai::all();
        return view('dimas-app.tablestatuspegawai', compact('statuspegawais'));
    }

    public function indexapi()
    {
        $statuspegawais = statuspegawai::all();
        return response()->json($statuspegawais);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dimas-app.formstatuspegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'statuspegawai' => 'required',
        ]);

        // dd ($request);
        $statuspegawai = new StatusPegawai(); // Pastikan nama model sesuai
        $statuspegawai->statuspegawai = $request->statuspegawai;
        $statuspegawai->save();        
        return redirect('/tablestatuspegawai');
    }

    public function storeapi(Request $request)
    {

        $statuspegawai = StatusPegawai::create([
            'statuspegawai' => $request->statuspegawai,
        ]);

        return response()->json($statuspegawai,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showapi($id)
    {
        $statuspegawai = Statuspegawai::findOrFail($id);
        return response()->json($statuspegawai,200); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $statuspegawai = statuspegawai::findOrFail($id);
        return view('dimas-app.editstatuspegawai', compact('statuspegawai'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $statuspegawai = statuspegawai::findOrFail($id);
        $statuspegawai->statuspegawai = $request->statuspegawai;
        $statuspegawai->save();
        return redirect('/tablestatuspegawai');
    }

    public function updateapi(Request $request, $id)
    {
        $statuspegawai = statuspegawai::findOrFail($id);
        $statuspegawai->statuspegawai = $request->statuspegawai;
        $statuspegawai->save();
        return response()->json([
            'statuspegawai' => $statuspegawai,
        ],200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $statuspegawai = statuspegawai::findOrFail($id);
        $statuspegawai->delete();
        return redirect('/tablestatuspegawai');

    }

    public function destroyapi($id)
    {
        $statuspegawai = statuspegawai::findOrFail($id);
        $statuspegawai->delete();
        return response()->json($statuspegawai,204);

    }
}
