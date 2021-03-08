<?php
require("../menu.php");
include_once '../Models/EvenementManager.php';
Configuration::setConfigurationFile('../Database/configuration.ini');
$db = Database::getInstance();
$event=new EvenementManager($db);
?>

<body>
  <div class="container">
    <form action="" method="post">
      <div class="Event">
        <label for="nomEvent">Nom de l'événement </label>
        <input type="text" name="nomEvent" id="nomEvent" class="form-control" placeholder="Saisissez le nom de l'événement">
        <label for="dateEvent">Date de l'événement </label>
        <input type="text" name="dateEvent" id="dateEvent" class="form-control" placeholder="Saisissez la date de l'événement">
      </div>
      <div class="EventDesc">
        <label for="descEvent">Description de l'événement : </label>
        <textarea type="text" name="descEvent" id="descEvent" class="form-control" placeholder="Saisissez votre nom de famille"></textarea>
      </div>
    </form>
  </div>
</body>
