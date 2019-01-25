<?php include "template/header.php"; ?>
<?php
//var_dump($_SESSION["codeMsg"][0]);
//var_dump($_POST);
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
            echo afficheErrorMsg($_SESSION["codeMsg"][0],"Votre emprunt");
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
  <section class="container">
    <div class="d-flex flex-column my-3">
      <div class="d-flex justify-content-between mb-0">
         <h1 class="col-6 mb-0 mt-0">Emprunter du matériel</h1>
         <?php require "form/sortEmpruntsListForm.php"; ?>
      </div>
    </div>
  </section>

    <div class="container">
      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col-2" >Matériel</th>
            <th scope="col-2" class="d-none d-md-table-cell text-center">Description</th>
            <th scope="col-2" class="d-none d-md-table-cell text-center">Etat</th>
            <th scope="col-2" class="d-none d-md-table-cell text-center">Accessibilité</th>
            <th scope="col-2" >Emprunter</th>
          </tr>
        </thead>
        <?php

        //récupère toutes les entrées de la table materiel
        //affiche les données sur chaque entrée dans le tableau
          foreach ($materiels as $key => $materiel) {
         ?>
        <tbody>
          <tr>
            <td scope="row"><?php echo $materiel->getNom(); ?></td>
            <td class="d-none d-md-table-cell text-center"><?php echo $materiel->getDescription(); ?> </td>
            <td class="d-none d-md-table-cell text-center"><?php echo ($materiel->getEtat()== 1)?"En stock":"Indisponible"; ?></td>
            <td class="d-none d-md-table-cell text-center"><?php echo ($materiel->getAcces()==1)?"Libre":"Restreint"; ?></td>
            <td>
              <div>
                <a <?php setHref('emprunter',['id' => $materiel->getId()]) ?> class='btn btn-primary btn-xs text-center <?php echo ($materiel->getEtat()== 0)?"disabled bts-secondary":""; ?> ' > Emprunter</a>
              </div>
            </td>
          </tr>
        <?php
          }
          ?>
        </tbody>
      </table>
    </div>
</main>
<?php include "view/template/footer.php"; ?>
