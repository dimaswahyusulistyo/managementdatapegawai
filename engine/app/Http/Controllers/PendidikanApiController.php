<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexapi()
    {
        $pendidikans = Pendidikan::all();
        return response()->json($pendidikans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeapi(Request $request)
    {
        $pendidikan = Pendidikan::create([
            'pendidikan' => $request->pendidikan,
        ]);

        return response()->json($pendidikan,201);
    }

    /**
     * Display the specified resource.
     */
    public function showapi(string $id)
    {
        $pendidikans = Pendidikan::findOrFail($id);
        return response()->json($pendidikans,200); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pendidikan = pendidikan::findOrFail($id);
        return view('dimas-app.editpendidikan', compact('pendidikan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateapi(Request $request, $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();
        return response()->json([
            'pendidikan' => $pendidikan,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyapi($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();
        return response()->json($pendidikan,204);

    }
}
