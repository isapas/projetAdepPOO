<?php //var_dump($_SESSION["codeMsg"][0]); ?>
<?php include "view/template/header.php"; ?>
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
             echo afficheErrorMsg($_SESSION["codeMsg"][0],"Le matériel");
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
      <div class="d-flex justify-content-between mb-3">
            <h2>Gestion des matériels</h2>
            <div class="d-none d-md-block">
               <a <?php setHref("materiels/ajout"); ?> class="btn btn-success">Ajouter un matériel</a>
            </div>
            <div class="d-block d-md-none">
               <a <?php setHref("materiels/ajout"); ?> class="btn btn-success"><i class="fas fa-plus"></i></a>
            </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
                <thead class="thead-light">
                  <tr class="text-center d-flex">
                    <th class="col-4 text-left">Nom</th>
                    <th class="col-2 d-none d-md-table-cell">N° de série</th>
                    <th class="col-2 d-none d-lg-table-cell">Etat</th>
                    <th class="col-2 d-none d-lg-table-cell">Accessibilité</th>
                    <th class="col-4 col-md-3 col-lg-1">Modifier</th>
                    <th class="col-4 col-md-3 col-lg-1">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!is_null($materiels)) {
                    // On récupère tout le contenu de la table materiel
                    // On affiche chaque entrée une à une
                    foreach ($materiels as $key => $materiel) {
                  ?>
                  <tr class="text-center d-flex">
                    <td class="col-4 text-left"><?php echo $materiel->getNom(); ?></td>
                    <td class="col-2 d-none d-md-table-cell"><?php echo $materiel->getNumSerie(); ?></td>
                    <td class="col-2 d-none d-lg-table-cell"><?php echo ($materiel->getEtat() == 1)?"En stock":"Indisponible"; ?></td>
                    <td class="col-2 d-none d-lg-table-cell"><?php echo ($materiel->getAcces() == 1)?"Libre":"Restreint"; ?></td>
                    <td class="col-4 col-md-3 col-lg-1"><a <?php setHref("materiels/edit", ["id"=>$materiel->getId()]); ?> ><i class="fas fa-edit fa-2x"></i></a></td>
                    <td class="col-4 col-md-3 col-lg-1"><a <?php setHref("materiels/suppr", ["id"=>$materiel->getId()]); ?> ><i class="fas fa-times fa-2x"></i></a></td>
                  </tr>
                  <?php
                    }
                  }else { ?>
                    <tr>
											<td colspan="4" class="text-center">Aucun résultat</td>
										</tr>
                  <?php } ?>
              </tbody>
            </table>
      </div>

  </div>
</section>
</main>
<?php
include "view/template/footer.php";
// }else {
//   header("Location:index.php?message=0") ;
//   exit;
// }

 ?>
