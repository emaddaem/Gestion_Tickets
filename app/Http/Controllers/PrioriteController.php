<?php

namespace App\Http\Controllers;

use App\Models\Priorite;
use Illuminate\Http\Request;

class PrioriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function priorites()
    {
        $priorites = priorite::all();

        return view('admin/priorites/priorites', compact('priorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/priorites/ajouter_priorite');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nom" => "required",
        ]);

        priorite::create([
            'nom' => $validatedData['nom'],
        ]);

        return redirect()->route('admin.priorites')->with("success", "La priorite a bien été ajoutée.");
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
    public function edit(string $id)
    {
        $priorite = priorite::find($id);

        return view('admin/priorites/modifier_priorite', compact('priorite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $priorite = priorite::find($id);

        $validatedData = $request->validate([
            "nom" => "required",
        ]);

        $priorite->update([
            'nom' => $validatedData['nom'],
        ]);

        return redirect()->route('admin.priorites', $priorite->id)->with('success', "La catégorie a été modifiée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $priorite = priorite::find($id);

        $priorite->delete();

        return redirect()->route('admin.priorites')->with('success', "La catégorie a été supprimée avec succès");
    }
}
