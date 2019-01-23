<?php

  require "model/empruntManager.php";
  require "model/materielManager.php"; //pour les fonctions qui servent à l'emprunt
  //var_dump(implode(',',getdate()));
  require "service/errorMsg.php";

  class empruntController {

  	public function emprunter() {
	  $idEmprunteur = intval($_SESSION['user'->getId());
	  if ((isset($_GET['id'])) && (!empty($_GET['id']))) {
	      $id_materiel = intval($_GET['id']);
	      if(addEmprunt($idMateriel, $idEmprunteur)) {
	        if(updateEtatMateriel( $idMateriel)) {
	          array_push($_SESSION["codeMsg"], "3"); //ajoute le code msg à la session code
	          redirectTo("emprunter/list");
	        }
	        else {
	          array_push($_SESSION["codeMsg"], "4");
	          redirectTo("emprunter/list");
	        }
	      }
	      else {
	        array_push($_SESSION["codeMsg"], "4");
	        redirectTo("emprunter/list");
	      }
	  }
	    require "view/empruntView.php";
	}


  }




function sortAllMaterielsList() {
  if(isset($_POST) && !empty($_POST)) {
    //alors fonction avec requete de tri
    if(getMaterielsEmprunts($_POST['triMaterielsEmprunts'])){
      $materiels =  getMaterielsEmprunts($_POST['triMaterielsEmprunts']);
    }
    else {
      $materiels = NULL;
    }
  }
  else {
    if(getMaterielsEmprunts('nomAZ')){
      $materiels =  getMaterielsEmprunts('nomAZ');
    }
    else {
      $materiels = NULL;
    }
  }
  require "view/empruntsView.php";
}

//fonction qui affiche tous les emprunts en cours dans la vue
function allEmprunts() {
  $emprunts = getEmprunts();
  require "view/restituerEmpruntView.php";

function myEmprunts(){
  if (isset($_POST) && !empty($_POST)) {
    if(getMyEmpruntsTri($_SESSION['user']['id'],$_POST['tri'])){
      $myEmprunts = getMyEmpruntsTri($_SESSION['user']['id'],$_POST['tri']);
    }else {
      $myEmprunts = NULL;
    }

  }
  else {
    if(getMyEmpruntsTri($_SESSION['user']['id'],2)){
      $myEmprunts = getMyEmpruntsTri($_SESSION['user']['id'],2);
    }else {
      $myEmprunts = NULL;
    }
  }


  require "view/listMyEmpruntsView.php";
}
}

function restituer() {
  updateDateRendu();
  updateEtatMaterielRendu();
  require "view/restituerEmpruntView.php";
}

?>