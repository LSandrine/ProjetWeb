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
  require_once "Models/MatiereClass.php";
  require_once "Models/MatiereManager.php";

  Configuration::setConfigurationFile('database/configuration.ini');
  $db = Database::getInstance();
  $C = new MatiereManager($db);

  echo '<pre>';
  print_r($C->getMatiereById(1));
  echo '</pre>';
?>
