<?php
  
  require "model/empruntManager.php";
  require "model/emprunteurManager.php";
  require "model/materielManager.php"; //pour les fonctions qui servent à l'emprunt
  //var_dump(implode(',',getdate()));
  require "service/errorMsg.php";

  class empruntController {

      public function sortMaterielList() {
        $manager = new empruntManager();
      
        if(isset($_POST) && !empty($_POST)) {
          //alors fonction avec requete de tri
          if($manager->getSortedMateriels($_POST['triMaterielsEmprunts'])){
            $materiels = $manager->getSortedMateriels($_POST['triMaterielsEmprunts']);
          }
          else {
            $materiels = NULL;
          }
        }
        else {
          if($manager->getSortedMateriels('nomAZ')){
          $materiels = $manager->getSortedMateriels('nomAZ');
          }
          else {
            $materiels = NULL;
          }
        }
        require "view/empruntView.php";
        }

         public function myEmpruntsList(){
          $manager = new empruntManager();
          $myEmprunts = $manager->getSortedMyEmprunts($_SESSION['user']);
          //var_dump($myEmprunts);

          
          require "view/listMyEmpruntsView.php";
      }

    public function restituer() {
      updateDateRendu();
      updateEtatMaterielRendu();
      require "view/restituerEmpruntView.php";
      }

    	public function emprunter() {
        $manager = new empruntManager();
    	  $emprunteur = $_SESSION['user'];
        $idEmprunteur = $emprunteur->getId();
        $idEmprunteur = intval($idEmprunteur);
       // var_dump($idEmprunteur);

    	  if ((isset($_GET['id'])) && (!empty($_GET['id']))) {
  	      $idMateriel = intval($_GET['id']);
            $emprunt= new emprunt(['idMateriel'=>$idMateriel , 'idEmprunteur'=>$idEmprunteur]);
         // var_dump($idMateriel);
  	      if($manager->addEmprunt($emprunt)) {
  	        if($manager->updateEtatMateriel($emprunt)) {
  	          //array_push($_SESSION["codeMsg"], "3"); //ajoute le code msg à la session code

  	          redirectTo("emprunter/list");
  	        }
  	        else {
  	        //  array_push($_SESSION["codeMsg"], "4");
  	          redirectTo("emprunter/list");
  	        }
  	      }
  	      else {
  	      //  array_push($_SESSION["codeMsg"], "4");
  	        redirectTo("emprunter/list");
  	      }
  	    }
  	    require "view/empruntView.php";
  	  }

	  //fonction qui affiche tous les emprunts en cours dans la vue
	 /* public function allEmpruntsList() {
  		$emprunts->getEmprunts();
  		require "view/restituerEmpruntView.php";
  	}*/

  
   
  }

?>