<?php
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerevent=new EvenementManager($db);
$manageruser=new UtilisateurManager($db);
if(isset($_SESSION['idUtilisateur'])) {
$user = $manageruser->getUtilisateurById($_SESSION['idUtilisateur']);
$ListEvent = $managerevent->getEvenementsByIdClasse($user->getUtClassId());
$listDate = $managerevent->getAllDateByClasse($user->getUtClassId());
$ListDevByDate = $managerevent->getEventByDateId($listDate,$user->getUtClassId());
?>
<div class="containerEvent">
  <div class="listeEvent">
    <?php foreach($ListDevByDate as $eventDate){
      $d = new DateTime($eventDate["date"]);
      $jour = $d->format('w');
      $res = "Dimanche";$dateForm = $d->format('d/m/Y');
      switch($jour){
        case 1://lun
        $res = "Lundi";
        break;
        case 2://mar
        $res = "Mardi";
        break;
        case 3://mer
        $res = "Mercredi";
        break;
        case 4://jeu
        $res = "Jeudi";
        break;
        case 5://ven
        $res = "Vendredi";
        break;
        case 6://sam
        $res = "Samedi";
        break;
        default://dim
        $res = "Dimanche";
        break;
      }
      ?>
    <div class="elemDevoirs elemD<?php echo $jour; ?>">
      <div class="txtJour jourD<?php echo $jour; ?>">
        <?php echo "<span class=\"jourList\">".$res."  </span><span class=\"dateList\"> [".$dateForm."]</span>" ?>
      </div><!-- class = txtJour -->
        <?php foreach($eventDate["evt"] as $event){?>
          <div class="txtDevoir">
              <div class="descDevoir">
                  <span>Nom</span><p><?php echo $event->getEvtNom() ?></p>
                  <span>Desc</span><p><?php echo $event->getEvtDescription() ?></p>
                  <span>Matiere</span><p><?php echo (($event->getEvtMatiere())->getMatNom()) ?></p>
                  <span>Rendu</span><p><?php echo $event->getEvtTypeRendu() ?></p>
                  <span>Type</span><p><?php echo $event->getEvtType()->getTypeEvenementNom() ?></p>
              </div><!-- class = descDevoir -->
              <div class="cocheDevoir"  style="border: 2px solid #ffc800;">
                  <p><?php echo "Fait / Pas Fait" ?></p>
              </div><!-- class = descDevoir -->
          </div><!-- class = txtDevoir -->
      <?php } ?>
    </div><!-- class = elemDevoirs -->
    <?php } ?>
  </div><!-- class = listeEvent -->
</div><!-- class = containerEvent -->
<?php }else{
  ?>
<p>Erreur, Vous devez être connecté pour accéder à vos devoirs.</p>
<?php } ?>
