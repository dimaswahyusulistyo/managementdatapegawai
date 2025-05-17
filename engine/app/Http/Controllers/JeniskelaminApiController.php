<?php

namespace App\Http\Controllers;

use App\Models\Jeniskelamin;
use Illuminate\Http\Request;

class JeniskelaminApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexapi()
    {
        $jeniskelamins = jeniskelamin::all();
        return response()->json($jeniskelamins);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function storeapi(Request $request)
    {
        $jeniskelamin = Jeniskelamin::create([
            'jeniskelamin' => $request->jeniskelamin,
        ]);

        return response()->json($jeniskelamin,201);
    }

    /**
     * Display the specified resource.
     */
    public function showapi(string $id)
    {
        $jeniskelamin = Jeniskelamin::findOrFail($id);
        return response()->json($jeniskelamin,200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateapi(Request $request, $id)
    {
        $jeniskelamin = Jeniskelamin::findOrFail($id);
        $jeniskelamin->jeniskelamin = $request->jeniskelamin;
        $jeniskelamin->save();
        return response()->json([
            'jeniskelamin' => $jeniskelamin,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyapi($id)
    {
        $jeniskelamin = Jeniskelamin::findOrFail($id);
        $jeniskelamin->delete();
        return response()->json($jeniskelamin,204);

    }
}
