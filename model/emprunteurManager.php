<?php
class emprunteurManager extends manager{

  public function loginEmprunteur(emprunteur $emprunteur) {
    // teste email existant
    $query = $this->_db->prepare("SELECT * FROM emprunteur WHERE email = ? ");
    $query->execute([$emprunteur->getEmail()]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    // si email existe, alors test du password
    if ($result) {
      if (password_verify($emprunteur->getPassword(),$result["password"])) {
        // si password ok, alors creation de l'objet emprunteur
        $emprunteur = new emprunteur($result);
      }
    }

    return $emprunteur;
  }


}

 ?>
