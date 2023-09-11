<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rucher;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Adresse;


class RucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
            'nom_rucher'   => 'required|min:1|max:191',
            'environnement' => 'required|max:191',
            'adresse'      => 'required|min:3|max:191',
            'ville'        => 'required|min:3|max:191',
            'code_postal'  => 'required|max:5',
        ]);

        //je sauvegarde l'adresse dans la table "adresses" pour pouvoir récupérer l'adresse_id
        //dont j'ai besoin pour la table "ruchers" (afin de sauvegarder plusieurs adresses de ruchers)
        $adresse = Adresse::create($request->all());

        //je sauvegarde en BDD dans la table 'ruchers'
        Rucher::create([
            'nom_rucher'   => $request->nom_rucher,
            'environnement' => $request->environnement,
            'adresse_id'   => $adresse->id,
            'user_id'      => $request->user_id,
        ]);
        return redirect()->route('home')->with('message', 'Votre rucher a bien été créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rucher $rucher)
    {
        // je récupère mes ruchers ainsi que ses ruches associées avec un eager loading
        $rucher->load('ruches');
        return view('rucher.show', ['rucher'=> $rucher]);
              
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rucher $rucher)
    {
        return view('rucher/edit', ['rucher' => $rucher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rucher $rucher)
    {
        // je valide mes données de formulaire
        $request->validate([
            'nom_rucher'   => 'required|min:1|max:191',
            'environnement' => 'required|max:191',
            'adresse'      => 'required|min:3|max:191',
            'ville'        => 'required|min:3|max:191',
            'code_postal'  => 'required|max:5',
        ]);

        //je sauvegarde l'adresse dans la table "adresses" pour pouvoir récupérer l'adresse_id
        //dont j'ai besoin pour la table "ruchers" (afin de sauvegarder plusieurs adresses de ruchers)
        $adresse = Adresse::find($rucher->adresse_id);
        $adresse->update($request->all());

        //je sauvegarde en BDD dans la table 'ruchers'
        $rucher->update([
            'nom_rucher'   => $request->nom_rucher,
            'environnement' => $request->environnement,
            
        ]);
        return redirect()->route('home')->with('message', 'Votre rucher a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rucher $rucher)
    {
        //je charge les ruches du rucher
        $rucher->load('ruches');
     
        //je vérifie si le tableau des ruches est vide
        if (count($rucher->ruches) == 0) {

            // et si le rucher appartient au user connecté
            if (Auth::user()->id == $rucher->user_id) {

                // Si les conditions précédentes sont respectées je supprime le rucher
                $rucher->delete();

                //et je retourne le message de suppression
                return redirect()->route('home')->with('message', 'Le rucher a bien été supprimé !');
            } else {
                return redirect()->route('home')->withErrors(['erreur'=> 'Vous n\'êtes pas le propriétaire du rucher']);
            }

            // si non j'affiche le message d'impossibilité de suppression
        } else {

            return redirect()->route('home')->withErrors(['erreur' =>'Le rucher ne peut être supprimé car au moins une ruche lui est associée !']);
        }
    }
}
