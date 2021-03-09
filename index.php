<?php
/*
* @class Database
* @author  Latour Renut Timimi
*
* EN COURS DE DEVELOPPEMENT
* Test de la database
*/

  require_once "Database/Configuration.php";
  require_once "Database/Database.php";
  require_once "Models/UtilisateurClass.php";
  require_once "Models/UtilisateurManager.php";
  require_once "Models/ClasseClass.php";
  require_once "Models/ClasseManager.php";
  require_once "Models/EvenementClass.php";
  require_once "Models/EvenementManager.php";
  require_once "Models/TypeEvenementClass.php";
  require_once "Models/TypeEvenementManager.php";
  require_once "Models/MatiereClass.php";
  require_once "Models/MatiereManager.php";

  Configuration::setConfigurationFile('database/configuration.ini');
  $db = Database::getInstance();
  print_r($db);
  $A = new UtilisateurManager($db);
  $B = new ClasseManager($db);
  $C = new EvenementManager($db);
  echo '<pre>';
  print_r($B->getClasseByPromoGrp("I2","G1"));
  echo '</pre>';
?>
