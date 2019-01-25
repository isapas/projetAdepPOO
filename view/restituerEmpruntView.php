<?php
include "view/template/header.php";
 ?>
<main class="container">
 <div class="row mt-5">
    <section class="col-md-6 mx-auto mt-4">
      <h2 class="historicalH2">Gestion des emprunts</h2>
      <div class="container-fluide">
        <div class="row">
          <table class="table table-hover fontTable">
            <thead class="lightBg">
              <tr>
                <th scope="col">Nom emprunteur</th>
                <th scope="col">Nom materiel</th>
                <th scope="col">Emprunté le</th>
                <th scope="col-2" >Rendre</th>
              </tr>
            </thead>
            <tbody>
              <?php
               foreach ($emprunts as $key => $value) {
              ?>
              <tr>
                <td><?php echo $value["nom"] . " " . $value["prenom"]; ?></td>
                <td><?php echo $value["nom_materiel"]; ?></td>
                <td><?php echo $value["dateEmprunt"]; ?></td>
                <td>
                  <div>
                    <a <?php setHref('emprunts/restituer',['id' => $value['id']]) ?> class='btn btn-warning btn-xs text-center <?php echo ($value['etat']== 1); ?> '> Rendre</a>
                  </div>
                </td>

              </tr>
              <?php
               }
               ?>
             </tbody>
           </table>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php
  include "view/template/footer.php";
   ?>
