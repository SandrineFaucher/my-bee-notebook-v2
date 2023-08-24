<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruche;
use Illuminate\Support\Facades\Auth;

class RucheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // je valide mes données de formulaire
        $request->validate([
            'nom_ruche'     => 'min:1|max:191',
            'numero'        => 'min:1||max:191',
            'espece'        => 'required|min:1|max:191',
            'provenance'    => 'required|min:1|max:191',
            'lignee_reine'  => 'min:1|max:191',
            'nombre_cadres' => 'required|max:2',
        ]);
        
        
        //je sauvegarde en BDD les entrées du formulaire ajout d'une ruche 
        Ruche::create([
            'nom_ruche'     => $request->nom_ruche,
            'numero'        => $request->numero,
            'espece'        => $request->espece,
            'provenance'    => $request->provenance,
            'lignee_reine'  => $request->lignee_reine,
            'nombre_cadres' => $request->nombre_cadres,
            'rucher_id'     => $request->rucher_id,
        ]);
        return back()->with('message', 'Votre ruche a bien été ajoutée !');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
