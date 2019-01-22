<?php
include "view/template/header.php";

if (isset($_SESSION["codeMsg"][0])) { 
?>
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
            echo afficheErrorMsg($_SESSION["codeMsg"][0],"L'emprunteur");
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
                <h2>Gestion des emprunteurs</h2>
                <div class="d-none d-md-block">
                  <a <?php setHref("emprunteur/ajout"); ?> class="btn btn-success">Ajouter un emprunteur</a>
                </div>
                <div class="d-block d-md-none">
                  <a <?php setHref("emprunteur/ajout"); ?> class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
          </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="text-center display-6">
                <th scope="col" class="d-none d-md-table-cell col-3 text-left">N°</th>
                <th scope="col" class="col-2 d-none d-md-table-cell">Email</th>
                <th scope="col" class="col-3 d-md-table-cell">Nom</th>
                <th scope="col" class="col-2 d-none d-md-table-cell">Prenom</th>
                <th scope="col" class="col-1 d-none d-md-table-cell">Poste</th>
                <th scope="col" class="col-1 d-none d-md-table-cell">Statut</th>
                <th scope="col" class="col-1">Modifier</th>
                <th scope="col" class="col-1">Supprimer</th>
              </tr>
            </thead>
            <tbody>
            <?php
            foreach ($emprunteurs as $key => $emprunteur) {
            ?>
              <tr class="text-center display-5">
                <th scope="row" class="d-none d-md-table-cell text-left"><?php echo $emprunteur->getId();     ?></th>
                <td class="d-none d-md-table-cell"><?php echo $emprunteur->getEmail(); ?></td>
                <td class="d-md-table-cell"><?php echo $emprunteur->getNom(); ?></td>
                <td class="d-none d-md-table-cell"><?php echo $emprunteur->getPrenom(); ?></td>
                <td class="d-none d-md-table-cell"><?php echo $emprunteur->getPoste(); ?></td>
                <td class="d-none d-md-table-cell"><?php echo $emprunteur->getStatus(); ?></td>
                <td><a href="emprunteur/edit?id=<?php echo $emprunteur->getId(); ?>"><i class="fas fa-edit fa-2x"></i></a></td>
                <td><a href="emprunteur/suppr?id=<?php echo $emprunteur->getId(); ?>"><i class="fas fa-times fa-2x"></i></a></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
<?php
include "view/template/footer.php";
?>
