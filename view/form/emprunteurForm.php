<form class="needs-validation text-right" action="" method="post" novalidate >

  <input type='hidden' value="<?php echo (isset($emprunteur))?$emprunteur->getId():""; ?>" name='id'>

<?php if ($action != "delete") { ?>

  <div class="form-row">
    <div class="form-group col-md-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text" for="name">Nom</label>
        </div>
        <input type="text" required="required" class="form-control" value="<?php echo (isset($emprunteur))?$emprunteur->getNom():""; ?>" name="nom" placeholder="Nom de l'emprunteur" >

        <!-- <div class="invalid-feedback">Veuillez saisir un nom produit.</div> -->
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text" for="prenom">Prénom</label>
        </div>
        <input type="text" required="required" class="form-control" value="<?php echo (isset($emprunteur))?$emprunteur->getPrenom():""; ?>" name="prenom" placeholder="Prénom de l'emprunteur" >
    <!-- <div class="invalid-feedback">Veuillez saisir un prénom</div> -->
      </div>
    </div>


    <div class="form-group col-md-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text" for="email">Email</label>
        </div>
        <input type="email" required="required" class="form-control" value="<?php echo (isset($emprunteur))?$emprunteur->getEmail():""; ?>" name="email" placeholder="Email de l'emprunteur" >
      <!-- <div class="invalid-feedback">Veuillez saisir un Email.</div> -->
      </div>
    </div>


    <div class="form-group col-md-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text" for="password">Password</label>
        </div>
        <input type="text" required="required" class="form-control" value="<?php echo (isset($emprunteur))?$emprunteur->getPassword():""; ?>" name="password" placeholder="Password de l'emprunteur" >
      <!-- <div class="invalid-feedback">Veuillez saisir un Email.</div> -->
      </div>
    </div>

    <div class="form-group col-md-6">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text" for="poste">Poste</label>
        </div>
        <input type="text" required="required" class="form-control" value="<?php echo (isset($emprunteur))?$emprunteur->getPoste():""; ?>" name="poste" placeholder="Poste de l'emprunteur" >
    <!-- <div class="invalid-feedback">Veuillez saisir un prénom</div> -->
      </div>
    </div>
    <div class="form-group col-md-4">
      <div class="input-group">
        <div class="input-group-prepend">
          <label class="input-group-text" for="status">Status</label>
        </div>
        <select class="custom-select" name="status">
          <option <?php echo (isset($emprunteur) && $emprunteur->getStatus() == "admin")?'selected="selected"':'';  ?> value="admin">Admin</option>
          <option <?php echo (isset($emprunteur) && $emprunteur->getStatus() == "user")?'selected="selected"':'';  ?> value="user">User</option>
        </select>
      </div>
    </div>
  </div>


<?php } else {  ?>
  <div class="alert alert-warning text-center" role="alert">
        <h3>Voulez-vous supprimer cet utilisateur ?</h3>
        <h4><?php echo $emprunteur->getNom(); ?></h4>
 </div>

<?php } ?>
<div class="d-flex justify-content-end mb-2">
    <button class="<?php echo $buttonClass; ?>" type="submit"><?php echo $buttonTitle; ?></button>
</div>
</form>
