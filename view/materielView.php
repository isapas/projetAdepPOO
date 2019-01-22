<?php include "view/template/header.php";  ?>
<main>
  <section class="container">
    <div class="row my-3">
      <div class="container">
        <div class="d-flex justify-content-between mb-3">
          <h2><?php echo (isset($title))?$title:""; ?> </h2>
          <div class="">
            <a <?php setHref("materiels"); ?> class="btn btn-success">
              <span class="d-none d-md-block">Retour à la liste</span>
              <span class="d-block d-md-none"><i class="fas fa-arrow-left"></i></span>
            </a>
          </div>
        </div>
        <!-- Form materiel add or edit -->
        <?php include "view/form/materielForm.php"; ?>
      </div>
    </div>
  </section>
</main>
<?php include "view/template/footer.php"; ?>
