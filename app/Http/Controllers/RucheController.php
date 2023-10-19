<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruche;
use Illuminate\Support\Facades\Auth;
use App\Models\Rucher;
use Illuminate\Validation\Rules\Exists;

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
                'nom_ruche'     => 'nullable|min:1|max:191',
                'numero'        => 'required|min:1||max:191',
                'espece'        => 'required|min:1|max:191',
                'provenance'    => 'nullable|min:1|max:191',
                'lignee_reine'  => 'nullable|min:1|max:191',
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
    public function show(Ruche $ruche)
    {
        // je récupère mes ruches ainsi que ses visites associées avec un eager loading
        $ruche->load('visites');
      
                return view('ruche.show', ['ruche'=> $ruche]);
                 
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruche $ruche)
    {
        $user = Auth::user('ruchers');
        return view('ruche/edit', [
            'ruche' => $ruche,
            'user' => $user,
        ]);

    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Ruche $ruche , Request $request)
    {
        // je valide mes données de formulaire
        $request->validate([
            'nom_ruche'     => 'nullable|min:1|max:191',
            'numero'        => 'required|min:1||max:191',
            'espece'        => 'required|min:1|max:191',
            'provenance'    => 'nullable|min:1|max:191',
            'lignee_reine'  => 'nullable|min:1|max:191',
            'nombre_cadres' => 'required|max:2',
        ]);
        
        
        //je sauvegarde en BDD les entrées du formulaire ajout d'une ruche 
        $ruche->update([
            'nom_ruche'     => $request->nom_ruche,
            'numero'        => $request->numero,
            'espece'        => $request->espece,
            'provenance'    => $request->provenance,
            'lignee_reine'  => $request->lignee_reine,
            'nombre_cadres' => $request->nombre_cadres,
            'rucher_id'     => $request->rucher_id
        ]);
        return redirect()->route('ruchers.show', $ruche->rucher_id)->with('message', 'Votre ruche a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruche $ruche)
    {
        
        // je supprime la ruche 
        $ruche->delete();
        return redirect()->route('ruchers.show', $ruche->rucher_id)->with('message', 'Votre ruche a bien été supprimée !');

    }


    
}
