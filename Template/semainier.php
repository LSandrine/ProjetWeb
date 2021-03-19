<?php
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$ClasseManager=new ClasseManager($db);
$managerevent=new EvenementManager($db);
$manageruser=new UtilisateurManager($db);
if(isset($_SESSION['idUtilisateur'])) {
$user = $manageruser->getUtilisateurById($_SESSION['idUtilisateur']);
$week=0;
?>

 <body>

   <table class="table" style="width:95%; margin:auto;">
     <a class="float-left" style="margin-left:10px;" href="">
       <img border="0" alt="fleche gauche" src="Css/images/fleche-gauche.png" width="25" height="25">
     </a>
    <thead>
      <tr>
        <th class="semainier">Lundi <?php echo date('d/m', strtotime("this week + $week week + 0 day")) ?></th>
        <th class="semainier">Mardi <?php echo date('d/m', strtotime("this week + $week week + 1 day")) ?></th>
        <th class="semainier">Mercredi <?php echo date('d/m', strtotime("this week + $week week + 2 day")) ?></th>
        <th class="semainier">Jeudi <?php echo date('d/m', strtotime("this week + $week week + 3 day")) ?></th>
        <th class="semainier">Vendredi <?php echo date('d/m', strtotime("this week + $week week + 4 day")) ?></th>
        <th class="semainier">Samedi <?php echo date('d/m', strtotime("this week + $week week + 5 day")) ?></th>
        <th class="semainier">Dimanche <?php echo date('d/m', strtotime("this week + $week week + 6 day")) ?></th>
      </tr>
    </thead>
    <a class="float-right" style="margin-right:10px;">
      <img border="0" alt="fleche droite" src="Css/images/fleche-droite.png" width="25" height="25">
    </a>
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

  <?php
  $date = date("Y-m-d");
  $numSemaine = strftime("%U");
  echo $date . " : " . $numSemaine . "<br>";
  echo date ("WY", strtotime($date))  . "<br>";
  $firstday = date('l - d/m', strtotime("this week"));
  echo $firstday
   ?>
</body>
<?php } ?>
