<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visite;

class VisiteController extends Controller
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
            'nombre_cadres_abeilles' => 'required|min:1|max:2',
            'nombre_cadres_couvain'  => 'required|min:1|max:2',
            'nombre_cadres_miel'     => 'required|min:1|max:2',
            'nombre_hausses'         => 'required|min:1|max:2',
            'reine_vue'              => 'required|min:1|max:191',
            'cellules_royales'       => 'required|min:1|max:2',
            'ruche_orpheline'        => 'required|min:1|max:20',
            'essaimage'              => 'required|min:1|max:191',
            'nourrissement'          => 'required|min:1|max:191',
            'traitement'             => 'required|min:1|max:191',
            'grille_reine'           => 'required|min:1|max:3',
            'chasse_abeilles'        => 'required|min:1|max:3',
            'grille_propolis'        => 'required|min:1|max:2',
            'date_visite'            => 'required',
            'force'                  => 'required|min:1|max:2',
            'commentaire'            => 'required|min:3|max:1000',
        ]);

        //je sauvegarde en BDD dans la table 'visites'
        
        $visite = Visite::create([
            'nombre_cadres_abeilles' => $request->nombre_cadres_abeilles,
            'nombre_cadres_couvain'  => $request->nombre_cadres_couvain,
            'nombre_cadres_miel'     => $request->nombre_cadres_miel,
            'nombre_hausses'         => $request->nombre_hausses,
            'reine_vue'              => $request->reine_vue,
            'cellules_royales'       => $request->cellules_royales,
            'ruche_orpheline'        => $request->ruche_orpheline,
            'essaimage'              => $request->essaimage,
            'nourrissement'          => $request->nourrissement,
            'traitement'             => $request->traitement,
            'grille_reine'           => $request->grille_reine,
            'chasse_abeilles'        => $request->chasse_abeilles,
            'grille_propolis'        => $request->grille_propolis,
            'date_visite'            => $request->date_visite,
            'force'                  => $request->force,
            'commentaire'            => $request->commentaire,
        ]);
        $visite->ruches()->attach($request->ruche_id);

        return back()->with('message', 'Votre visite est bien sauvegardée !');

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
