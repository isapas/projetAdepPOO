<?php
require "model/dataBase.php";
require "model/entity/materiel.php";
require "model/materielManager.php";

class materielController{

  public function listMateriel() {
    $manager = new materielManager();
    //recuperation de la liste de tous les comptes dans la bdd
    $materiels = $manager->getList();
    // Affichage liste des comptes
    require "view/listMaterielView.php";
    }


  public function add(){
    $action = "add"; //pour choix du formulaire
    $title = "Ajout";
    $buttonTitle = "Ajouter";
    $buttonClass = "btn btn-primary";
    if (isset($_POST) && !empty($_POST)) {
      $manager = new materielManager();
      $materiel = new materiel($_POST);
      if ($manager->addMateriel($materiel))//ADD
          {
            array_push($_SESSION["codeMsg"], "3"); //ajoute le code msg à la session code
            redirectTo("materiels");
          }
      else
          {
            array_push($_SESSION["codeMsg"], "4");
            redirectTo("materiels");
          }
    }
    require "view/materielView.php";
  }

  public function edit(){
    $action = "edit";
    $title = "Modification";
    $buttonTitle = "Enregistrer";
    $buttonClass = "btn btn-primary";
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
      $id = intval($_GET["id"]);
      $manager = new materielManager();
      $materiel = $manager->getById($id);
    }

    if (isset($_POST) && !empty($_POST)) {
        $materiel = new materiel($_POST);
        if($manager->updateMateriel($materiel))//UPDATE
          {
            array_push($_SESSION["codeMsg"], "1");
            redirectTo("materiels");
          }
        else
          {
            array_push($_SESSION["codeMsg"], "2");
            //var_dump($materiel);
            redirectTo("materiels");
          }
    }
    require "view/materielView.php";
  }

  public function delete(){
    $action = "delete";
    $title = "Suppression";
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
      $id = intval($_GET["id"]);
    }
    $manager = new materielManager();
    $materiel = $manager->getById($id);
    $buttonTitle = "Supprimer";
    $buttonClass = "btn btn-warning";
    if (isset($_POST) && !empty($_POST)) {
      if ($manager->deleteMateriel($_POST["id"]))//DELETE
          {
            array_push($_SESSION["codeMsg"], "5");
            redirectTo("materiels");
          }
      else
          {
            array_push($_SESSION["codeMsg"], "6");
            redirectTo("materiels");
          }
    }
    require "view/materielView.php";
  }

}

 ?>
