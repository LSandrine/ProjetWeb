<?php
require("../menu.php");
include_once '../Models/ClasseManager.php';
Configuration::setConfigurationFile('../database/configuration.ini');
$db = Database::getInstance();
$ClasseManager=new ClasseManager($db);
 ?>

 <body>

   <table class="table" style="width:95%; margin:auto;">
    <thead>
      <tr>
        <th class="semainier">Lundi</th>
        <th class="semainier">Mardi</th>
        <th class="semainier">Mercredi</th>
        <th class="semainier">Jeudi</th>
        <th class="semainier">Vendredi</th>
        <th class="semainier">Samedi</th>
        <th class="semainier">Dimanche</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          devoirs L
        </td>
        <td>
          devoirs Ma
        </td>
        <td>
          devoirs Me
        </td>
        <td>
          devoirs J
        </td>
        <td>
          devoirs V
        </td>
        <td>
          devoirs S
        </td>
        <td>
          devoirs D
        </td>
      </tr>
    </tbody>
  </table>

</body>
