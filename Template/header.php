<?php session_start(); ?>
<!Doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <?php		$title = "PLOME";?>
    <title>
    <?php echo $title ?>
    </title>
    <link rel="icon" type="image/png" href="Css/images/plome.png"/>
    <link rel="stylesheet" href="Css/jquery/jquery-3.5.1.min.js">
    <link rel="stylesheet" href="Css/popper/popper.js">
    <link rel="stylesheet" href="Css/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="Css/bootstrap-4.5.3-dist/js/bootstrap.min.js">

    <script src="Css/jquery/ajax.jquery.min.js"></script>
    <script src="Css/bootstrap-4.5.3-dist/js/ajax.bootstrap.js"></script>
    <link rel ="stylesheet" href="Css/style.css">
    <script src="Css/base.js"></script>
<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php?page=0">PLOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
    				<?php
    				if(isset($_SESSION['mail'])){
    					if(!is_null($_SESSION['idUtilisateur'])){ ?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=7&semaine=0">Semainier</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=6">Liste des devoirs</a>
                </li><?php
              if($_SESSION['delegue'] == 1){ ?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=3">Ajouter un evenement</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=3">Modifier un evenement</a>
                </li>
              <?php } ?>
                <li id="liCo" class="nav-item">
                  <span class="mailCo"><?php echo $_SESSION['mail'];?> </span>
                </li>
                <li class="nav-item">
                  <div id="connect">
                  <a class="nav-link" href="index.php?page=2">Déconnexion</a>
                  </div>
                </li>
    					<?php
            }else{ ?>
              <li class="nav-item">
                <div id="connect">
                  <a class="nav-link" href="index.php?page=1">Connexion</a>
          			</div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=5">S'inscrire</a>
              </li>
    				  <?php
    					}
    				}else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=5">S'inscrire</a>
          </li>
          <li class="nav-item">
            <div id="connect">
              <a class="nav-link" href="index.php?page=1">Connexion</a>
            </div>
          </li>
  				<?php } ?>
      </ul>
    </div><!--navbarResponsive-->
  </div><!--container-->
</nav>
<!-- NAV -->
<!-- Separation -->
<div class="separationHeader"></div>
  </head>
  	<body>
