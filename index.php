<?php

/*
* EN COURS DE DEVELOPPEMENT
* Test de la database
*/

  require_once "Database/Configuration.php";
  require_once "Database/Database.php";
  require_once "Models/UtilisateurClass.php";
  require_once "Models/UtilisateurManager.php";

  Configuration::setConfigurationFile('database/configuration.ini');
  $db = Database::getInstance();
  print_r($db);
  $A = new UtilisateurManager($db);

  echo '<pre>';
  print_r($A->getAll());
  echo '</pre>';
?>
