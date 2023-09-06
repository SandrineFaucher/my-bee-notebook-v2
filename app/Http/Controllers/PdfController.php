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
        $user = User::find(Auth::user()->id);
        $user->load('adresses.rucher.ruches.visites');

        //j'ajoute une page
        $this->fpdf->AddPage('P', 'A4');

        //Titre en gras (B) ou '' si null - police (Arial)  - fontsize (11)
        $this->fpdf->SetFont('Arial', '', 11);

        //Position du coin supérieur par rapport à la marge gauche 
        $this->fpdf->SetX(70);

        // fond de couleur gris (valeurs en RGB)
        $this->fpdf->setFillColor(255, 255, 255);

        //Titre page 
        $this->fpdf->Cell(70, 8, 'REGISTRE ELEVAGE', 1, 1, 'C', 1);

        // Saut de ligne 10 mm
        $this->fpdf->Ln(10);

        // Nom, prénom, adresse et numéros napi et siret
        $this->fpdf->Cell(75, 8, strtoupper($user->nom), 0, 1, 'L', 1);
        $this->fpdf->Cell(75, 8, ucfirst($user->prenom), 0, 1, 'L', 1);
        foreach ($user->adresses as $adresse) {
            if ($adresse->napi) {
                $presencenapi = true;
                $adressenapi = $adresse;
                $this->fpdf->Cell(75, 10, mb_convert_encoding($adresse->adresse, 'ISO-8859-1'), 0, 1, 'L', 1);
                $this->fpdf->Cell(75, 10, $adresse->code_postal . ' ' . $adresse->ville, 0, 1, 'L', 1);

                $this->fpdf->Ln(8); // saut de ligne 10mm
                $this->fpdf->Cell(80, 10,  mb_convert_encoding('N° API : ' . $adresse->napi, 'ISO-8859-1'), 0, 1, 'L', 1);
                $this->fpdf->Cell(80, 10, mb_convert_encoding('N° SIRET : ' . $adresse->siret, 'ISO-8859-1'), 0, 1, 'L', 1);
            }
        }
        //saut de ligne de 3 mm
        $this->fpdf->Ln(3);
        //bordure de séparation 	
        $this->fpdf->Cell(190, 0, '', 1, 1, 'C', 1);

        // saut de ligne 10mm
        $this->fpdf->Ln(8);

        // Tableau des ruchers avec leurs ruches 
        foreach ($user->ruchers as $rucher) {
            
            //saut de ligne de 3 mm
            $this->fpdf->Ln(8);
            // couleur de fond de la cellule : gris foncé
            $this->fpdf->setFillColor(210, 210, 210);
            $this->fpdf->Cell(190, 8, mb_convert_encoding("Rucher : " . strtoupper($rucher->nom_rucher), 'ISO-8859-1'), 1, 1, 'C', 1);
            //bordure de séparation 	
            $this->fpdf->Cell(100, 0, '', 1, 1, 'L', 1);

            //création du tableau  

            // J'affiche mes entêtes avant mes boucles pour ne pas désorganiser les cellules
            
            // couleur de fond de la cellule : gris clair
            $this->fpdf->setFillColor(230, 230, 230);
            $this->fpdf->Cell(50, 8, mb_convert_encoding('Nom -  N°', 'ISO-8859-1'), 1, 0, 'C', 1); // Cellule 1
            $this->fpdf->Cell(45, 8, mb_convert_encoding('Date de la visite', 'ISO-8859-1'), 1, 0, 'C', 1); // Cellule 2
            $this->fpdf->Cell(45, 8, mb_convert_encoding('Nourrissement', 'ISO-8859-1'), 1, 0, 'C', 1); // Cellule 3
            $this->fpdf->Cell(50, 8, mb_convert_encoding('Traitement', 'ISO-8859-1'), 1, 0, 'C', 1); // Cellule 3 
            
            //Je boucle sur les ruches 
            foreach ($rucher->ruches as $ruche) {
                //je boucle sur les visites
                foreach ($ruche->visites as $visite) {
                    
                    // Remplissez le tableau avec vos données
                    $this->fpdf->Ln(8); // Passer à la ligne suivante
                    $this->fpdf->Cell(50, 8, mb_convert_encoding(ucfirst($ruche->nom_ruche ."  ". $ruche->numero) , 'ISO-8859-1'), 1, 0, 'C', 0);
                    $this->fpdf->Cell(45, 8, mb_convert_encoding(date('d/m/y', strtotime($visite->date_visite)), 'ISO-8859-1'), 1, 0, 'C', 0);
                    $this->fpdf->Cell(45, 8, mb_convert_encoding($visite->nourrissement, 'ISO-8859-1'), 1, 0, 'C', 0);
                    $this->fpdf->Cell(50, 8, mb_convert_encoding($visite->traitement, 'ISO-8859-1'), 1, 0, 'C', 0);
                    //saut de ligne de 3 mm
                    $this->fpdf->Ln(8);
                    $this->fpdf->MultiCell(190, 8, mb_convert_encoding("Observations sanitaires : " . $visite->detail_traitement, 'ISO-8859-1'), 1);
                }
            }
        }
        $this->fpdf->Output();
        exit;
    }
}
