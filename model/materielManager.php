<?php
class materielManager extends manager{
  // CREATE
  public function addMateriel(materiel $materiel){
    $query = $this->_db->prepare('INSERT INTO materiel(nom, description, etat, acces, numSerie)
                                  VALUES(:nom, :description, :etat, :acces, :numSerie)');
    $result = $query->execute(array('nom' => $materiel->getNom(),
                                    'description' => $materiel->getDescription(),
                                    'etat' => $materiel->getEtat(),
                                    'acces' => $materiel->getAcces(),
                                    'numSerie' => $materiel->getNumSerie()));
    $query->closeCursor();
    return $result;
  }

  // READ ALL
  public function getList(){
    $materiels = [];
    $query = $this->_db->query('SELECT * FROM materiel ORDER BY nom');
    while ($result = $query->fetch(PDO::FETCH_ASSOC))
    {
      $materiels[] = new materiel($result);
    }
    $query->closeCursor(); // Termine le traitement de la requête
    return $materiels;
  }

  // READ BY ID
  public function getById(int $id){
    $query = $this->_db->prepare('SELECT * FROM materiel where id= ?');
    $query->execute(array($id));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result)
      {$materiel = new materiel($result);}
    $query->closeCursor();
    return $materiel;
  }

  // UPDATE
  public function updateMateriel(materiel $materiel){
    $query = $this->_db->prepare('UPDATE materiel SET nom = :nom, description = :description, etat = :etat, acces = :acces, numSerie = :numSerie
                                  WHERE id = :id');
    $result = $query->execute(array('id' => $materiel->getId(),
                                    'nom' => $materiel->getNom(),
                                    'description' => $materiel->getDescription(),
                                    'etat' => $materiel->getEtat(),
                                    'acces' => $materiel->getAcces(),
                                    'numSerie' => $materiel->getNumSerie()));
    $query->closeCursor();
    return $result;
  }



  // DELETE
  public function deleteMateriel(int $id){
    $query = $this->_db->prepare('DELETE FROM materiel where id= ?');
    $result = $query->execute(array($id));
    return $result;
  }

}

 ?>
