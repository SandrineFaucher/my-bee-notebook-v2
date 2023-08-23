<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdresseController extends Controller
{
    
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // $request = mes données de formulaire
    {
        $request->validate([
        //je valide mes données en précisant les critères exigés
        'adresse'     => 'required|min:3|max:191',
        'ville'       => 'required|min:3|max:191',
        'code_postal' => 'required|max:5',
        'napi'        => 'required|max:8',
        ]);

        //je sauvegarde l'adresse 
        Adresse::create ([
        'adresse'     => $request->adresse,
        'ville'       => $request->ville,
        'code_postal' => $request->code_postal,
        'napi'        => $request->napi,
        'user_id'     => Auth::user()->id, // me permet d'accéder et de créer l'adresse pour le 
                                          // user connecté
    
        
        ]);   
        return redirect()->route('users.edit', Auth::user())->with('message', 'Votre adresse a bien été enregistrée');
        
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
    public function edit(Adresse $adresse)
    {
        return view('user/edit', ['adresse' => $adresse]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adresse $adresse)
    {
        $request->validate([
            //je valide mes données en précisant les critères exigés
            'adresse'     => 'required|min:3|max:191',
            'ville'       => 'required|min:3|max:191',
            'code_postal' => 'required|max:5',
            'napi'        => 'required|max:8',
            ]);
    
            //je sauvegarde l'adresse 
            $adresse->update ([
            'adresse'     => $request->adresse,
            'ville'       => $request->ville,
            'code_postal' => $request->code_postal,
            'napi'        => $request->napi,
            
            ]);
            return redirect()->route('users.edit', Auth::user())->with('message', 'Votre adresse a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
