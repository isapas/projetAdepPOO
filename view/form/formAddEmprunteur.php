<section class="container">
  <div class="d-flex flex-column my-3">
  <div class="d-flex justify-content-between mt-3">
    <h2>Ajout</h2>
    <a <?php setHref("emprunteurs") ?>><button class="btn btn-success">Retour</button></a>
  </div>
  <form class="col-12 col-md-12 col-lg-12 mx-auto my-3" action="" method="post">
    <div class="form-group text-left">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="email">email</span>
        </div>
        <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
      </div>
    </div>
    <div class="form-group text-left">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="nom">Nom</span>
        </div>
        <input type="nom" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
      </div>
    </div>
    <div class="form-group text-left">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="prenom">Prenom</span>
        </div>
        <input type="prenom" class="form-control" id="prenom" name="prenom" placeholder="Votre prenom" required>
      </div>
    </div>
    <div class="form-group text-left">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="password">Password</span>
        </div>
        <input type="password" class="form-control" id="password" name="password" placeholder="Votre password" required>
      </div>
    </div>
    <div class="form-group text-left">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="confirmationpassword">confirmation de password</span>
        </div>
        <input type="confirmationpassword" class="form-control" id="confirmationpassword" name="confirmationpassword" placeholder="Votre confirmation de password" required>
      </div>
    </div>
    <div class="form-group text-left">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="status">Status</span>
        </div>
        <input type="status" class="form-control" id="status" name="status" placeholder="Votre status" required>
      </div>
    </div>
    <div class="form-group text-left">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="poste">Poste</span>
        </div>
        <input type="poste" class="form-control" id="poste" name="poste" placeholder="Votre poste" required>
      </div>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary float-right">Ajouter</button>
    </div>
  </form>
</section>
