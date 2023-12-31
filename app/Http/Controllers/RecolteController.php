<?php

namespace App\Http\Controllers;

use App\Models\Recolte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ruche;
use Illuminate\Support\Carbon;



class RecolteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // je récupère les données de récoltes du user connecté pour les afficher 
        $user= User::find(Auth::user()->id);
        $user->load('recoltes');

                   
        //Charger les ruches du User connecté 
        $ruches = Ruche::whereHas('rucher', function($query){
            return $query->where('user_id', Auth::user()->id);
        })
        ->get();
       
        //je retourne dans ma vue recolte/index les récoltes du user connecté 'user'
        //et les ruches de celui-ci 'ruches', ainsi que les données pour mon graphique
        //dans cette meme vue. 
        return view('recolte/index', [
              'user' => $user,
              'ruches' => $ruches,
              'recoltes' => $user->recoltes,
            ]);

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
            'miel'          => 'nullable|min:1|max:6',
            'pollen'        => 'nullable|min:1|max:6',
            'gelee_royale'  => 'nullable|min:1|max:6',
            'propolis  '    => 'nullable|min:1|max:6',
        ]);

    
        //je sauvegarde en BDD les entrées du formulaire ajout d'une récolte
        $recolte = Recolte::create([
            'miel'              => $request->miel,
            'pollen'            => $request->pollen,
            'gelee_royale'      => $request->gelee_royale,
            'propolis'          => $request->propolis,
            'user_id'           => $request->user_id,
        ]);
        
        //Syntaxe de rattachement 
        foreach (Ruche::all() as $ruche) {
            if (isset($request['rucheId' . $ruche->id])) {
                $recolte->ruches()->attach($ruche->id);
            }
        }
        return back()->with('message', 'Votre récolte est bien enregistrée !');
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
    public function edit(Recolte $recolte)
    {
        // je récupère les données de récoltes du user connecté pour les afficher 
        $user= User::find(Auth::user()->id);
        
        //Charger les ruches du User connecté 
        $ruches = Ruche::whereHas('rucher', function($query){
            return $query->where('user_id', Auth::user()->id);
        })
        ->get();
     
        return view('recolte/edit', [
            'recolte' => $recolte,
            'user' => $user,
            'ruches' => $ruches
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recolte $recolte)
    {
        // je valide mes données de formulaire
        $request->validate([
            'miel'          => 'nullable|min:1|max:6',
            'pollen'        => 'nullable|min:1|max:6',
            'gelee_royale'  => 'nullable|min:1|max:6',
            'propolis  '    => 'nullable|min:1|max:6',
        ]);

    
        //je sauvegarde en BDD les entrées du formulaire de modification d'une récolte
        $recolte->update([
            'miel'              => $request->miel,
            'pollen'            => $request->pollen,
            'gelee_royale'      => $request->gelee_royale,
            'propolis'          => $request->propolis,
            'user_id'           => $request->user_id,
        ]);

        // Eager loading pour charger les ruches liées à la récolte
        $recolte->load('ruches');

        //on les retire ensuite de la table intermédiaire
        foreach ($recolte->ruches as $ruche) {
            $recolte->ruches()->detach($ruche);
        }

        //Syntaxe de rattachement 
        foreach (Ruche::all() as $ruche) {
            if (isset($request['rucheId' . $ruche->id])) {
                $recolte->ruches()->attach($ruche->id);
            }
        }

        //je retourne un message de confirmation à l'utilisateur 
        return redirect()->route('recoltes.index')->with('message', 'Votre récolte a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recolte $recolte)
    {
        // je supprime la ruche 
        $recolte->delete();
        return redirect()->route('recoltes.index')->with('message', 'Votre récolte a bien été supprimée !');
    }
}
