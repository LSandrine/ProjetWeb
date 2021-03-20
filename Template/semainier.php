<?php
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerEvent = new EvenementManager($db);
$managerUser = new UtilisateurManager($db);
if(isset($_SESSION['idUtilisateur'])) {
$user = $managerUser->getUtilisateurById($_SESSION['idUtilisateur']);
$classe = $user->getUtClassId();
$week = 0;
$lundi = strtotime("this week + $week week + 0 day");
$mardi = strtotime("this week + $week week + 1 day");
$mercredi = strtotime("this week + $week week + 2 day");
$jeudi = strtotime("this week + $week week + 3 day");
$vendredi = strtotime("this week + $week week + 4 day");
$samedi = strtotime("this week + $week week + 5 day");
$dimanche = strtotime("this week + $week week + 6 day");
?>

 <body>

   <table class="table" style="width:95%; margin:auto;">
     <a class="float-left" style="margin-left:10px;" href="<?=previousWeek() ?>">
       <img border="0" alt="fleche gauche" src="Css/images/fleche-gauche.png" width="25" height="25">
     </a>
    <thead>
      <tr>
        <th class="semainier">Lundi <?php echo date('d/m', $lundi) ?></th>
        <th class="semainier">Mardi <?php echo date('d/m', $mardi) ?></th>
        <th class="semainier">Mercredi <?php echo date('d/m', $mercredi) ?></th>
        <th class="semainier">Jeudi <?php echo date('d/m', $jeudi) ?></th>
        <th class="semainier">Vendredi <?php echo date('d/m', $vendredi) ?></th>
        <th class="semainier">Samedi <?php echo date('d/m', $samedi) ?></th>
        <th class="semainier">Dimanche <?php echo date('d/m', $dimanche) ?></th>
      </tr>
    </thead>
    <a class="float-right" style="margin-right:10px;">
      <img border="0" alt="fleche droite" src="Css/images/fleche-droite.png" width="25" height="25">
    </a>
    <tbody>
      <tr>
        <td>
          devoirs L

          <?php getDevoirs($managerEvent, $classe, $lundi); ?>
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
<?php
}
function getDevoirs($managerEvent, $classe, $jour){
  $managerEvent->getEvenementsByIdClasseAndDate($classe, date('Y-m-d', $jour));
  echo $managerEvent->getEvtNom();
  echo $managerEvent->getEvtDescription();
  echo ($managerEvent->getEvtMatiere())->getMatNom();
  echo $managerEvent->getEvtTypeRendu();
  echo $managerEvent->getEvtType()->getTypeEvenementNom();
}

function previousWeek(){
  $week--;
  echo $week;
}

function nextWeek(){
  $week++;
}
?>
