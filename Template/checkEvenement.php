<?php
include("../Database/Configuration.php");
include("../Database/Database.php");
include("../Models/EvenementManager.php");
Configuration::setConfigurationFile('../Database/configuration.ini');
$db = Database::getInstance();
$managerEvent = new EvenementManager($db);
if (isset($_POST['idUtilisateur']) AND !empty($_POST['idUtilisateur'])
    AND isset($_POST['idEvenement']) AND !empty($_POST['idEvenement']))
  {
      $managerEvent->changeCheckEvenement($_POST['idUtilisateur'], $_POST['idEvenement']);
  }
