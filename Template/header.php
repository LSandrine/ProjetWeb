<?php session_start(); ?>
<!Doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <?php		$title = "Bienvenue sur PLOME !";?>
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
<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php?page=0">PLOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?page=0">Accueil
                <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
    			<div id="connect">
    				<?php
    				if(isset($_SESSION['mail'])){
    					if(!is_null($_SESSION['idClasse'])){ ?>
						      <p>Utilisateur : <?php echo $_SESSION['mail']; ?> <a class="nav-link" href="index.php?page=2">Déconnexion</a></p>
            			</div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=6">Liste</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=7">Semainier</a>
                </li>
    					<?php
    					}else{ ?>
                  <a class="nav-link" href="index.php?page=1">Connexion</a>
          			</div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=5">S'inscrire</a>
              </li>
    				  <?php
    					}
    				}else{ ?>
              <a class="nav-link" href="index.php?page=1">Connexion</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=5">S'inscrire</a>
          </li>
    				<?php } ?>
      </ul>
    </div>
  </div>
</nav>
<!-- NAV -->
<!-- Separation -->
<div class="separationHeader"></div>
  </head>
  	<body>
