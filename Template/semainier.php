<?php
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerEvent = new EvenementManager($db);
$managerUser = new UtilisateurManager($db);
if(isset($_SESSION['idUtilisateur'])) {
$user = $managerUser->getUtilisateurById($_SESSION['idUtilisateur']);
$classe = $user->getUtClassId();
$week = $_GET['semaine'];
$lundi = strtotime("this week $week week + 0 day");
$mardi = strtotime("this week $week week + 1 day");
$mercredi = strtotime("this week $week week + 2 day");
$jeudi = strtotime("this week $week week + 3 day");
$vendredi = strtotime("this week $week week + 4 day");
$samedi = strtotime("this week $week week + 5 day");
$dimanche = strtotime("this week $week week + 6 day");
?>

 <body>

   <table class="table" style="width:95%; margin:auto;">
     <a class="float-left" style="margin-left:10px;" href="<?php echo previousWeek($week) ?>">
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
    <a class="float-right" style="margin-right:10px;" href="<?php echo nextWeek($week) ?>">
      <img border="0" alt="fleche droite" src="Css/images/fleche-droite.png" width="25" height="25">
    </a>
    <tbody>
      <tr>
        <td class="tdSemainier">
          <?php getDevoirs($managerEvent, $classe, $lundi); ?>
        </td>
        <td class="tdSemainier">
          <?php getDevoirs($managerEvent, $classe, $mardi); ?>
        </td>
        <td class="tdSemainier">
          <?php getDevoirs($managerEvent, $classe, $mercredi); ?>
        </td>
        <td class="tdSemainier">
            <?php getDevoirs($managerEvent, $classe, $jeudi); ?>
        </td>
        <td class="tdSemainier">
          <?php getDevoirs($managerEvent, $classe, $vendredi); ?>
        </td>
        <td class="tdSemainier">
          <?php getDevoirs($managerEvent, $classe, $samedi); ?>
        </td>
        <td class="tdSemainier">
          <?php getDevoirs($managerEvent, $classe, $dimanche); ?>
        </td>
      </tr>
    </tbody>
  </table>
</body>
<?php
}
function getDevoirs($managerEvent, $classe, $jour){
  $events = $managerEvent->getEvenementsByIdClasseAndDate($classe, date('Y-m-d', $jour));
  foreach($events as $event){
    echo '<div class=devoirsSemaine>';
    echo "Nom : " . $event->getEvtNom() . "<br>";
    echo "Description : " . $event->getEvtDescription() . "<br>";
    echo "Matière : " . ($event->getEvtMatiere())->getMatNom() . "<br>";
    echo "Type rendu : " . $event->getEvtTypeRendu() . "<br>";
    echo "Type : " . $event->getEvtType()->getTypeEvenementNom();
    echo '</div> <br>';
  }
}
function previousWeek($week){
  return "index.php?page=7&semaine=" . --$week;
}
function nextWeek($week){
  return "index.php?page=7&semaine=" . ++$week;
}
?>
