<section class="container py-3 d-flex flex-column justify-content-center align-items-center ">
      <div id="formConnexion" class="d-flex flex-column justify-content-center h-75 py-4">
        <h5 class="text-center">
          <span class="d-none d-md-block">Pour accéder à l'interface d'emprunt de matériels, <br></span>
          Veuillez saisir vos identifiants :
        </h5>
        <!-- new -->
        <form  action="" method="post" name="Connexion" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="email">Votre Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Votre@email.com" required autofocus>
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="password">Votre mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" placeholder="Votre mot de passe" required>
            <small id="passwordHelp" class="form-text text-muted">Doit contenir une majuscule, un chiffre et 6 caractères minimum.</small>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Se connecter</button>
          </div>
        </form>
      </div>
      <div id="errorsConnexion" class="w-100 h-25">
        <?php
        //If a message was transmitted by the url we retrieve it and we display it
        //displayMessages();
         ?>
      </div>
</section>
