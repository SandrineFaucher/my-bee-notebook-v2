<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Auth;

class AdresseController extends Controller
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
    public function store(Request $request) // $request = mes données de formulaire
    {
        $request->validate([
        //je valide mes données en précisant les critères exigés
        'adresse'     => 'required|min:3|max:191',
        'ville'       => 'required|min:3|max:191',
        'code_postal' => 'required|min:5|max:5',
        'napi'        => 'required|min:0|max:8',
        ]);

        $adresse = new Adresse;
        $adresse->adresse = $request->input('adresse');
        $adresse->code_postal = $request->input('code_postal');
        $adresse->ville = $request->input('ville');
        $adresse->napi = $request->input('napi');
        $adresse->user_id = $request->input('user_id');

        $adresse->save();

        return redirect()->route('user.edit', Auth::user())->with('message', 'Votre adresse a bien été enregistrée');


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
