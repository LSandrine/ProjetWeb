<div id="pages">
<?php
if (!empty($_GET["page"])){$page=$_GET["page"];}else{$page=0;}
switch ($page) {
  case 0:
  	// inclure page accueil
  	include_once('Template/accueil.php');
  	break;
  case 1:
  	// inclure page connexion
  	include("Template/connexion.php");
      break;
  case 2:
  	// inclure page deconnexion
  	include("Template/deconnexion.php");
      break;
  case 3:
  	// inclure page ajouterEvenement
  	include("Template/ajouterEvenement.php");
      break;
  case 4:
  	// inclure page ajouterUtilisateur
  	include("Template/ajouterUtilisateur.php");
      break;
  case 5:
  	// inclure page inscription
  	include("Template/inscription.php");
      break;
  case 6:
  	// inclure page listerEvenement
  	include("Template/listerEvenement.php");
      break;
  case 7:
  	// inclure page semainier
  	include("Template/semainier.php");
      break;
  default : 	include_once('Template/accueil.php');
}
?>
</div>
