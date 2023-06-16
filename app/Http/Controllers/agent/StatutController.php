<?php

namespace App\Http\Controllers\agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Statut;

class statutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function statuts()
    {
        $agent_id = auth()->user()->id;

        $statuts = Statut::whereNull('user_id')
            ->orWhere('user_id', $agent_id)
            ->get();

        return view('agent/statuts/statuts', compact('statuts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agent/statuts/ajouter_statut');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agent_id = auth()->user()->id;

        $validatedData = $request->validate([
            "nom" => "required",
        ]);

        statut::create([
            'nom' => $validatedData['nom'],
            'user_id' => $agent_id,
        ]);

        return redirect()->route('agent.statuts')->with("success", "La statut a bien été ajoutée.");
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
        $agent_id = auth()->user()->id;

        $statuts = Statut::whereNull('user_id')
            ->orWhere('user_id', $agent_id)
            ->get();

        return view('agent/statuts/modifier_statut', compact('statut'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $statut = statut::find($id);

        $validatedData = $request->validate([
            "nom" => "required",
        ]);

        $statut->update([
            'nom' => $validatedData['nom'],
        ]);

        return redirect()->route('admin.statuts', $statut->id)->with('success', "La statut a été modifiée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $statut = statut::find($id);

        $statut->delete();

        return redirect()->route('admin.statuts')->with('success', "La statut a été supprimée avec succès");
    }
}
