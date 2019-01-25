<?php
// require "model/dataBase.php";
// //require "model/entity/emprunteur.php";
// require "model/emprunteurManager.php";
require "service/errorMsg.php";

class emprunteurController{

  public function listEmprunteur() {
    $manager = new emprunteurManager();
    //recuperation de la liste de tous les comptes dans la bdd
    $emprunteurs = $manager->getList();
    // Affichage liste des comptes
    require "view/listEmprunteurView.php";
    }


  public function add(){
    $action = "add"; //pour choix du formulaire
    $title = "Ajout";
    $buttonTitle = "Ajouter";
    $buttonClass = "btn btn-primary";

    if (isset($_POST) && !empty($_POST)) {
      $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $manager = new emprunteurManager();
      $emprunteur = new emprunteur($_POST);
      if ($manager->addEmprunteur($emprunteur))//ADD
          {
            array_push($_SESSION["codeMsg"], "3"); //ajoute le code msg à la session code
            // var_dump($emprunteur);
            redirectTo("emprunteurs");
          }
      else
          {
            array_push($_SESSION["codeMsg"], "4");
            // var_dump($emprunteur);
            redirectTo("emprunteurs");
          }
    }
    require "view/emprunteurView.php";
  }


  public function edit(){
    $action = "edit";
    $title = "Modification";
    $buttonTitle = "Enregistrer";
    $buttonClass = "btn btn-primary";
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
      $id = intval($_GET["id"]);
      $manager = new emprunteurManager();
      $emprunteur = $manager->getById($id);
    }

    if (isset($_POST) && !empty($_POST)) {
        $newEmprunteur = new emprunteur($_POST);
        if($newEmprunteur->getPassword() !== $emprunteur->getPassword()) {
          $newEmprunteur->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
        }
        if($manager->updateEmprunteur($newEmprunteur))//UPDATE
          {
            array_push($_SESSION["codeMsg"], "1");
            redirectTo("emprunteurs");
          }
        else
          {
            array_push($_SESSION["codeMsg"], "2");
            // var_dump($emprunteur);
            redirectTo("emprunteurs");
          }
    }
    require "view/emprunteurView.php";
  }

  public function delete(){
    $action = "delete";
    $title = "Suppression";
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
      $id = intval($_GET["id"]);
    }
    $manager = new emprunteurManager();
    $emprunteur = $manager->getById($id);
    $buttonTitle = "Supprimer";
    $buttonClass = "btn btn-warning";
    if (isset($_POST) && !empty($_POST)) {
      if ($manager->deleteEmprunteur($_POST["id"]))//DELETE
          {
            array_push($_SESSION["codeMsg"], "5");
            redirectTo("emprunteurs");
          }
      else
          {
            array_push($_SESSION["codeMsg"], "6");
            redirectTo("emprunteurs");
          }
    }
    require "view/emprunteurView.php";
  }

}

 ?>
