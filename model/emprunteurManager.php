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



  // CREATE
  public function addEmprunteur(emprunteur $emprunteur){
    $query = $this->_db->prepare('INSERT INTO emprunteur(nom, prenom, email, password, poste, status)
                                  VALUES(:nom, :prenom, :email, :password, :poste, :status)');
    $result = $query->execute(array('nom' => $emprunteur->getNom(),
                                    'prenom' => $emprunteur->getPrenom(),
                                    'email' => $emprunteur->getEmail(),
                                    'password' => $emprunteur->getPassword(),
                                    'poste' => $emprunteur->getPoste(),
                                    'status' => $emprunteur->getStatus()));
    $query->closeCursor();
    return $result;
  }



  // READ ALL
  public function getList(){
    $emprunteurs = [];
    $query = $this->_db->query('SELECT * FROM emprunteur ORDER BY nom');
    while ($result = $query->fetch(PDO::FETCH_ASSOC))
    {
      $emprunteurs[] = new emprunteur($result);
    }
    $query->closeCursor(); // Termine le traitement de la requête
    return $emprunteurs;
  }


  // READ BY ID
  public function getById(int $id){
    $query = $this->_db->prepare('SELECT * FROM emprunteur where id= ?');
    $query->execute(array($id));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result)
      {$emprunteur = new emprunteur($result);}
    $query->closeCursor();
    return $emprunteur;
  }


  // UPDATE
  public function updateEmprunteur(emprunteur $emprunteur){
    $query = $this->_db->prepare('UPDATE emprunteur SET nom = :nom, prenom = :prenom, email = :email, password = :password, poste = :poste, status = :status
                                  WHERE id = :id');
    $result = $query->execute(array('id' => $emprunteur->getId(),
                                    'nom' => $emprunteur->getNom(),
                                    'prenom' => $emprunteur->getPrenom(),
                                    'email' => $emprunteur->getEmail(),
                                    'password' => $emprunteur->getPassword(),
                                    'poste' => $emprunteur->getPoste(),
                                    'status' => $emprunteur->getStatus()));
    $query->closeCursor();
    return $result;
  }



  // DELETE
  public function deleteEmprunteur(int $id){
    $query = $this->_db->prepare('DELETE FROM emprunteur where id= ?');
    $result = $query->execute(array($id));
    return $result;
  }

}

 ?>
