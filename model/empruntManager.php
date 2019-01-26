<?php 

  class empruntManager extends manager {

    //fonction pour ajouter un emprunt,qui attend un objet emprunt
    public function addEmprunt(emprunt $emprunt) {
      $now = (new DateTime('now'))->format('Y-m-d H:i:s');
      $query = $this->getDb()->prepare('INSERT INTO emprunt(idEmprunteur, idMateriel, dateEmprunt) VALUES( :idEmprunteur, :idMateriel, :dateEmprunt)');
        $result = $query->execute(array(
          'idEmprunteur' =>  $emprunt->getIdEmprunteur(),
           'idMateriel' => $emprunt->getIdMateriel(),
            'dateEmprunt' =>$now)
          );
        $query->closeCursor();
        return $result;
    }

    //fonction qui update l'état du matériel en fonction de son id quand l'utilisateur  clique sur emprunter page empruntsView.php
      public function updateEtatMateriel(emprunt $emprunt) {
        
        $query = $this->getDb()->prepare ('UPDATE materiel SET etat = :etat WHERE id = :id');
        $result = $query->execute(array(
          'id' => $emprunt->getIdMateriel(),
          'etat' =>  0)
          );
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
       $materiels = [];
       while ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
        $materiels[] = new materiel($result);
       }
       $requete->closeCursor();
       return $materiels;
       var_dump($materiels);
      }

      function getSortedMyEmprunts($emprunteur,$tri = null) {
        $text = "";
        switch ($tri) {
          case '0':
            $text .= " AND e.dateRetour IS NOT NULL";
          break;
          case '1':
            $text .= " AND e.dateRetour IS NULL";
          break;
        }

        $query = $this->getDb()->prepare('SELECT emp.prenom, emp.nom, m.nom as materiel, m.numSerie, e.dateEmprunt, e.dateRetour FROM `emprunt` e\n"
        . " inner join emprunteur emp on emp.id = e.idEmprunteur\n"
        . " inner join materiel m on m.id = e.idMateriel\n"
        . " WHERE  e.idEmprunteur =  ? '.$text.' order by dateEmprunt desc');
          $query->execute(array($emprunteur->getId()));
          while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
             $myEmprunts[] = new emprunt($result);
             var_dump($result);
          $query->closeCursor();
           return $myEmprunts;
       }
       
        //var_dump($myEmprunts);
      }

    }
 ?>

 