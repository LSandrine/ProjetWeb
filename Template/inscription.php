<?php

Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$ClasseManager=new ClasseManager($db);

if( ( isset($_POST["email"]) AND !empty($_POST["email"])) AND ( isset($_POST["password"]) AND !empty($_POST["password"]))
 AND ( isset($_POST["groupe"]) AND !empty($_POST["groupe"]))  AND ( isset($_POST["promotion"]) AND !empty($_POST["promotion"])     )     )

   {
    $Classe=$ClasseManager->getIdclasse($_POST["promotion"],$_POST["groupe"]);
    echo " ".$Classe->getClassId();
    //$utilisateur= array($_POST["email"],$_POST["password"], "Toyota");



  echo "ooo";




 }
?>
