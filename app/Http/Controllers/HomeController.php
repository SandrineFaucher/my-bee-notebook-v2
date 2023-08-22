<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //Je récupère le user connecté dans une variable
       $user = User::find(Auth::user()->id);
       //je charge les ruchers de mon user connecté 
       $user->load('ruchers');
       
       //je les renvoie dans la vue Home
       return view('home', ['user'=> $user]);
       
    }
}
