<?php include "view/template/header.php"; ?>
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
  <div class="container">
    <section class="d-flex flex-row justify-content-between">
      <h1 class="col-4 mt-0">Emprunter du matériel</h1>
      <?php require "form/sortEmpruntsListForm.php"; ?>

    </section>
    </div>
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
            <td scope="row"><?php echo $materiel['nom'] ?></td>
            <td class="d-none d-md-table-cell text-center"><?php echo $materiel->getDescription() ?> </td>
            <td class="d-none d-md-table-cell text-center"><?php echo ($materiel->getEtat() == 1)?"En stock":"Indisponible"; ?></td>
            <td class="d-none d-md-table-cell text-center"><?php echo ($materiel->getAcces() ==1)?"Libre":"Restreint"; ?></td>
            <td>
              <div>
                <a <?php setHref('emprunter/list') ?> class='btn btn-primary btn-xs text-center' <?php echo $materiel->getEtat()== 0)?"disabled bts-secondary":""; ?> ' > Emprunter</a>
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
 <!--href="<?php //echo 'service/empruntsTraitement.php?id='. $value['id'].'&etat=' . $value['etat']; ?>" -->
