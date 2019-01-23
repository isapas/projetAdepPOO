<?php
require "model/dataBase.php";
require "model/entity/emprunteur.php";
require "model/emprunteurManager.php";
// // require "service/formChecker.php";
// require "service/errorMsg.php";
 ?>

<?php
class indexController {

function connect() {
  if (isset($_POST)) {
    if (!empty($_POST)) {
      $user = new emprunteur($_POST);
      $manager = new emprunteurManager();
      if ($manager->loginEmprunteur($user)) {
          $emprunteur = $manager->loginEmprunteur($user);
          //var_dump($emprunteur);
            initializeUserSession($emprunteur);
            if ($_SESSION["user"]->getStatus() === "admin") {
              redirectTo("materiels");
            }else {
              redirectTo("emprunter/list");
            }
        }
        else {
          initializeMsgSession();
          array_push($_SESSION["codeMsg"], "2"); //ajoute le code msg à la session code
        }
    }
    // else {
    //   initializeMsgSession();
    //   array_push($_SESSION["codeMsg"], "1"); //ajoute le code msg à la session code
    // }
  }
require "view/indexView.php";
}


 function deconnect(){
   logout();
   redirectTo("login");
 }

}
 ?>
