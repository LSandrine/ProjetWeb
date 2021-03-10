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
    <a class="navbar-brand" href="#">PLOME</a>
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
          <a class="nav-link" href="index.php?page=7">Semainier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=6">Liste</a>
        </li>
        <li class="nav-item">
          <!--<a class="nav-link" href="#">S'enregistrer</a>-->
    			<div id="connect">
    				<?php
    				if(isset($_SESSION['mail'])){
    					if(!is_null($_SESSION['idClasse'])){ ?>
    						<p>Utilisateur : <?php echo $_SESSION['mail']; ?> <a class="nav-link" href="index.php?page=2">Déconnexion</a></p>
    					<?php
    					}else{ ?>
                <a class="nav-link" href="index.php?page=1">Connexion</a>
    				  <?php
    					}
    				}else{ ?>
              <a class="nav-link" href="index.php?page=1">Connexion</a>
    				<?php } ?>
    			</div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- NAV -->
<!-- CAROUSEL -->
  <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselIndicators" data-slide-to="1"></li>
      <li data-target="#carouselIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('Css/images/mainDiplome.jpg');">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Votre Diplome</h3>
          <p class="lead">C'est cool d'obtenir son diplome !</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('Css/images/biblio.jpg');">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Liste des devoirs</h3>
          <p class="lead">La liste des devoirs vous permet de tenir à jour votre avancement !</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('Css/images/travail.jpg');">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Organisez vos révisions</h3>
          <p class="lead">Le semainier vous permet d'obtenir un point de vue de vos semaines à venir !</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Suivant</span>
    </a>
  </div>
<!-- CAROUSEL -->
<!-- Separation -->
<div class="separationHeader"></div>
  </head>
  	<body>
