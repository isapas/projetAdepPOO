<?php
//var_dump($_POST);
//require "service/errorManager.php";
//We load header
include "view/template/header.php";
 ?>
 <?php
 //Affichage du message de confirmation ou d'erreur
 if (isset($_SESSION["codeMsg"][0])) { ?>
   <!-- Modal -->
   <div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-dialog-centered">
       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
           <div class="alert alert-success text-center mt-2" role="alert">
             <?php
             echo afficheConnexionMsg($_SESSION["codeMsg"][0]);
             array_pop($_SESSION["codeMsg"]); //retire le code de la session
             ?>
           </div>
         </div>
         <div class="modal-footer">
         </div>
       </div>
     </div>
   </div>
   <?php } ?>

<main>
  <!-- Form Login -->
  <?php include "view/form/loginForm.php"; ?>
</main>

<?php include "view/template/footer.php"; ?>
