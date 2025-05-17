<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikans = pendidikan::all();
        return view('dimas-app.tablependidikan', compact('pendidikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dimas-app.formpendidikan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendidikan' => 'required',
        ]);

        // dd ($request);
        $pendidikan = new Pendidikan(); // Pastikan nama model sesuai
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();        
        return redirect('/tablependidikan');
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
        $pendidikan = pendidikan::findOrFail($id);
        return view('dimas-app.editpendidikan', compact('pendidikan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pendidikan = pendidikan::findOrFail($id);
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();
        return redirect('/tablependidikan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pendidikan = pendidikan::findOrFail($id);
        $pendidikan->delete();
        return redirect('/tablependidikan');

    }
}
