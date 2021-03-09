<?php
/*
* @class Database
* @author  Latour Renut Timimi
*
* EN COURS DE DEVELOPPEMENT
* Test de la database
*/

require_once "Template/header.php";
?>
<div id="corps">
<?php
//Database
require_once "Database/Configuration.php";
require_once "Database/Database.php";
//Models
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
//Templates
require_once "Template/ajouterEvenement.php";

//CORPS
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();


?>
</div>
<div id="spacer"></div>
<?php
//Footer
require_once "Template/footer.php"; ?>
