<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexapi()
    {
        $agamas = Agama::all();
        return response()->json($agamas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeapi(Request $request)
    {

        $agama = Agama::create([
            'nama' => $request->nama,
        ]);

        return response()->json($agama,201);

    }

    /**
     * Display the specified resource.
     */
    public function showapi($id)
    {
        $agamas = Agama::findOrFail($id);
        return response()->json($agamas,200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateapi(Request $request, $id)
    {
        $agama = Agama::findOrFail($id);
        $agama->nama = $request->nama;
        $agama->save();
        return response()->json([
            'nama' => $agama,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyapi($id)
    {
        $agama = Agama::findOrFail($id);
        $agama->delete();
        return response()->json($agama,204);

    }
}
