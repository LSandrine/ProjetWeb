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
echo "<pre>";
//print_r($ListDevByDate);
echo "</pre>";
?>
<div class="containerEvent">
  <div class="listeEvent">
    <?php foreach($ListDevByDate as $eventDate){?>
    <div class="elemDevoirs" style="border: 5px solid #ff0000;">
      <div class="txtJour"  style="border: 4px solid #9d00ff;">
        <p><?php echo $eventDate["date"] ?></p>
      </div><!-- class = txtJour -->
        <?php foreach($eventDate["evt"] as $event){?>
          <div class="txtDevoir"  style="border: 3px solid #001fff;">
              <div class="descDevoir"  style="border: 2px solid #00ff14;">
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
        </div><!-- class = elemDevoirs -->
      <?php } ?>
    <?php } ?>
  </div><!-- class = listeEvent -->
</div><!-- class = containerEvent -->
<?php }else{
  ?>
<p>Erreur, Vous devez être connecté pour accéder à vos devoirs.</p>
<?php } ?>
