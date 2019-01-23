<?php 


  class empruntManager extends manager {

    //fonction pour ajouter un emprunt,qui attend un objet emprunt
    public function addEmprunt(emprunt $emprunt) {
             $now = (new DateTime('now'))->format('Y-m-d H:i:s');
      $query = $this->getDb()->prepare('INSERT INTO emprunt(idEmprunteur, idMateriel, dateEmprunt) VALUES( :idEmprunteur, :idMateriel, :dateEmprunt)');
        $result = $query->execute(array(
          'idEmprunteur' =>  $idEmprunteur,
           'idMateriel' => $idMateriel,
            'dateEmprunt' =>$now)
          );
        $query->closeCursor();
        return $result;
    }

    //fonction qui update l'état du matériel en fonction de son id quand l'utilisateur  clique sur emprunter page empruntsView.php
      public function updateEtatMateriel($idMateriel) {
        
        $query = $this->getDb()->prepare ('UPDATE materiel SET etat = :etat WHERE id = :id');
        $result = $query->execute(array('id' => $idMateriel, 'etat' =>  0));
        $query->closeCursor();
        return $result;
      }

      public function getSortedMateriels($tri) {
        $text = "";
        switch ($tri) {
          case 'nomAZ':
            $text .= " ORDER BY nom ASC";
          break;
          case 'nomZA':
            $text .= " ORDER BY nom DESC";
          break;
          case 'etat':
            $text .= " WHERE etat = 1";
          break;
          }
       $requete = $this->getDb()->query('SELECT * FROM materiel'. $text);
       $result = $requete->fetchAll(PDO::FETCH_ASSOC);
       $requete->closeCursor();
       return $result;
      }

      function getSortedMyEmprunts($idEmprunteur,$tri) {
        $text = "";
        switch ($tri) {
          case '0':
            $text .= " AND e.dateRetour IS NOT NULL";
          break;
          case '1':
            $text .= " AND e.dateRetour IS NULL";
          break;
        }

        $query = $this-<getDb()->prepare('SELECT emp.prenom, emp.nom, m.nom as materiel, m.num_serie, e.dateEmprunt, e.dateRetour FROM `emprunt` e
                        inner join emprunteur emp on emp.id = e.idEmprunteur
                        inner join materiel m on m.id = e.idMateriel
                        WHERE  e.idEmprunteur = ? '.$text.' order by dateEmprunt desc');
        $query->execute([$id_emprunteur]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
      }


 ?>