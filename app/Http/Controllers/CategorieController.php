<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function categories()
    {
        $categories = Categorie::all();

        return view('admin/categories/categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/categories/ajouter_categorie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nom" => "required",
        ]);

        Categorie::create([
            'nom' => $validatedData['nom'],
        ]);

        return redirect()->route('admin.categories')->with("success", "La catégorie a bien été ajoutée.");
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
        $categorie = Categorie::find($id);

        return view('admin/categories/modifier_categorie', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = Categorie::find($id);

        $validatedData = $request->validate([
            "nom" => "required",
        ]);

        $categorie->update([
            'nom' => $validatedData['nom'],
        ]);

        return redirect()->route('admin.categories', $categorie->id)->with('success', "La catégorie a été modifiée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::find($id);

        $categorie->delete();

        return redirect()->route('admin.categories')->with('success', "La catégorie a été supprimée avec succès");
    }
}
