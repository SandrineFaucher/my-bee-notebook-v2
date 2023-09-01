<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Rucher;

 


class PdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index() 
    {

        //Je récupère les données dont je vais avoir besoin pour générer mon pdf
        $user= User::find(Auth::user()->id);
        $user->load('adresses.rucher.ruches.visites');
       
        //j'ajoute une page
        $this->fpdf->AddPage('P','A4');

        //Titre en gras (B) ou '' si null - police (Arial)  - fontsize (11)
    	$this->fpdf->SetFont('Arial', '', 11);

        //Position du coin supérieur par rapport à la marge gauche 
        $this->fpdf->SetX(70);

        // fond de couleur gris (valeurs en RGB)
        $this->fpdf->setFillColor(255,255,255);

        //Titre page 
        $this->fpdf->Cell(70, 8, 'REGISTRE ELEVAGE', 1 , 1, 'C',1);

        // Saut de ligne 10 mm
        $this->fpdf->Ln(10);   

        // Nom, prénom, adresse et numéros napi et siret
        $this->fpdf->Cell(75,6, strtoupper($user->nom) ,0,1,'L',1);    
        $this->fpdf->Cell(75,6,ucfirst($user->prenom), 0,1,'L',1); 
        foreach($user->adresses as $adresse){
        if($adresse->napi){
        $presencenapi = true;
        $adressenapi = $adresse;
        $this->fpdf->Cell(75,6, $adresse->adresse, 0,1,'L',1);
        $this->fpdf->Cell(75,6, $adresse->code_postal.' '.$adresse->ville , 0,1,'L',1);   
        
        $this->fpdf->Ln(8); // saut de ligne 10mm
		$this->fpdf->Cell(80,6, 'N° API : ' .$adresse->napi, 0,1,'L',1);
        $this->fpdf->Cell(80,6, 'N° SIRET : ' .$adresse->siret, 0,1,'L',1);
        }
        //saut de ligne de 3 mm
        $this->fpdf->Ln(3);
        //bordure de séparation 	
        $this->fpdf->Cell(190, 0, '', 1 , 1, 'C',1);
        
        // saut de ligne 10mm
        $this->fpdf->Ln(8); 
        
        // Tableau des ruchers avec leurs ruches 
        foreach($user->ruchers as $rucher){
        $this->fpdf->Cell(100, 0, $rucher->nom_rucher, 0, 1, 'L', 1);


        }
        }
      
        
        
        

        
        
       
        $this->fpdf->Output();
        exit;

    }
}

        



