<?php

class emprunteurManager extends manager 
{
    // fonction qui affiche tout les emprunteurs
    public function getBorrower(){
        $emprunteurs = [];
        $req = $this->_db->query("SELECT * FROM emprunteur");
        while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
            $emprunteurs[] = new emprunteur($result);
        }
        $req->closeCursor();
        return $emprunteurs;
    }




}

?>