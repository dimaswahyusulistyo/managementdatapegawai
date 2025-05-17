<?php

namespace App\Http\Controllers;

use App\Models\Jeniskelamin;
use Illuminate\Http\Request;

class JeniskelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jeniskelamins = jeniskelamin::all();
        return view('dimas-app.tablejeniskelamin', compact('jeniskelamins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dimas-app.formjeniskelamin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jeniskelamin' => 'required',
        ]);

        // dd ($request);
        $jeniskelamin = new Jeniskelamin(); // Pastikan nama model sesuai
        $jeniskelamin->jeniskelamin = $request->jeniskelamin;
        $jeniskelamin->save();        
        return redirect('/tablejeniskelamin');
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
        $jeniskelamin = jeniskelamin::findOrFail($id);
        return view('dimas-app.editjeniskelamin', compact('jeniskelamin'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jeniskelamin = jeniskelamin::findOrFail($id);
        $jeniskelamin->jeniskelamin = $request->jeniskelamin;
        $jeniskelamin->save();
        return redirect('/tablejeniskelamin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jeniskelamin = jeniskelamin::findOrFail($id);
        $jeniskelamin->delete();
        return redirect('/tablejeniskelamin');

    }
}
