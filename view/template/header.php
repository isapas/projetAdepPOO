    <!doctype html>
    <html class="no-js" lang="fr">
    <?php //var_dump($_SESSION["user"]["status"]); ?>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Adep Project</title>
      <meta name="description" content="Logiciel de gestion des prêts">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="manifest" href="site.webmanifest">
      <link rel="apple-touch-icon" href="icon.png">
      <!-- Place favicon.ico in the root directory -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="stylesheet" href=<?php echo "http://".$_SERVER['SERVER_NAME']."/Lab/projet_adep/public/css/normalize.css"; ?> >
      <link rel="stylesheet" href=<?php echo "http://".$_SERVER['SERVER_NAME']."/Lab/projet_adep/public/css/main.css"; ?> >
    </head>
    <body class="d-flex flex-column justify-content-between">
    <header class="jumbotron jumbotron-fluid py-0 mb-0">
      <div class="container d-flex justify-content-between">
        <!-- Logo and title ADEP -->
        <div id="logoHeader" class="">
          <a href="https://www.adep-roubaix.fr/" target="_blank"><img src=<?php echo "http://".$_SERVER['SERVER_NAME']."/Lab/projet_adep/public/img/adep-logo.png"; ?> class="img-fluid" alt="Logo de l'ADEP"></a>
        </div>
        <!-- Title -->
        <div class="d-flex align-items-center justify-content-center ">
          <h1 id="titreHeader">Gestion des prêts</h1>
        </div>
        <!-- My account -->
        <?php if (isLogged()) { ?>
        <div class="d-flex justify-content-end">
            <div class="mt-2">
              <a class="btn btn-dark" <?php setHref("logout"); ?>>Se déconnecter</a>
            </div>
        </div>
      <?php } ?>

        <!-- Navigation Mobile -->
        <!-- Affichage du menu si User connecté -->
        <?php if (isLogged()) { ?>
        <div class="mobile align-items-center"> <!-- d-flex -->
          <a class="mobile" href="javascript:void(0);" onclick="menuMobile()"><i id="navIcon" class="fas fa-bars fa-2x transformIcon"></i></a>
          <nav id="navMobile" class="menuVisible">
                <ul class="nav flex-column">

                    <li class="nav-item"><a class="nav-link" <?php setHref('emprunter/list') ?> >Emprunter</a></li>
                    <!-- //Si l'emprunteur est admin -->
                      <?php if ($_SESSION["user"]["status"] === "admin") { ?>
                      <li class="nav-item"><a class="nav-link" <?php setHref("materiels"); ?> >Les matériels</a></li>
                      <li class="nav-item"><a class="nav-link" <?php setHref("emprunteurs"); ?> >Les emprunteurs</a></li>
                      <li class="nav-item"><a class="nav-link" <?php setHref("historique"); ?> >L'historique</a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" <?php setHref("logout"); ?>>Se déconnecter</a></li>

                </ul>
          </nav>
        </div>
        <?php } ?>
      </div>
      </header>
      <!-- Navigation Tab and Screen -->
      <!-- Affichage du menu si User connecté -->
      <?php if (isLogged()) { ?>
        <nav class="tab navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="container collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
              <a class="navbar-brand" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION["user"]["prenom"]." ".$_SESSION["user"]["nom"]; ?></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <li class="nav-item">
                <a class="nav-link" <?php setHref('emprunts/list') ?> >Mes emprunts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" <?php setHref('emprunter/list') ?> >Emprunter</a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <!-- //Si l'emprunteur est admin -->
                <?php if ($_SESSION["user"]["status"] === "admin") { ?>
                <li class="nav-item">
                  <a class="nav-link" <?php setHref("historique"); ?>>L'historique</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" <?php setHref("materiels"); ?>>Les matériels</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" <?php setHref("emprunteurs"); ?>>Les emprunteurs</a>
                </li>
              <?php } ?>
            </ul>

          </div>


        </nav>

      <?php } ?>
