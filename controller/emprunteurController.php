<?php
require "model/dataBase.php";
require "model/emprunteurManager.php";
require "model/entity/emprunteur.php";

class emprunteurController 
{
    // fonction qui affiche tout les emprunteurs
    public function getEmprunteur(){
        $emprunteurManager = new emprunteurManager();
        $emprunteurs = $emprunteurManager->getBorrower();
        // var_dump($emprunteur);
        require "view/emprunteurView.php";
    }



}

?>