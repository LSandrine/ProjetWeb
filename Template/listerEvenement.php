<?php
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerevent=new EvenementManager($db);
$manageruser=new UtilisateurManager($db);
$managerlien=new LienUtilisateurEvenementManager($db);
if(isset($_SESSION['idUtilisateur'])) {
$user = $manageruser->getUtilisateurById($_SESSION['idUtilisateur']);
$ListEvent = $managerevent->getEvenementsByIdClasse($user->getUtClassId());
$listDate = $managerevent->getAllDateByClasse($user->getUtClassId());
$ListDevByDate = $managerevent->getEventByDateId($listDate,$user->getUtClassId());

if(!isset($_POST["fait"]) && !isset($_POST["idEv"]) && !empty($_POST["fait"]) && !empty($_POST["idEv"])){
  if($_POST["fait"]==0){$_POST["fait"]==1;}else{$_POST["fait"]==0;}
  echo $_POST["fait"];
  $managerlien->setDevoirsCheck($user->getUtId(),$_POST["idEv"],$_POST["fait"]);
}
?>
<script type="text/javascript">
  function ajaxCheck(elem){
    console.log("COCHE");
    var idUt = elem.parentNode.id;
    var fait = encodeURIComponent(elem.checked);
    var ids = encodeURIComponent(idUt);
    if(fait != ""){
      /*$.ajax({
        type:"POST",
        data: {ids : ids,fait : fait},
        async: false,
        success: function(){
          console.log("Hooray, it worked!");
        }
      });*/
    }
  }
</script>
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
          <form method="post" action="#">
          <div class="txtDevoir">
              <div class="descDevoir">
                  <span class="nomDev"><?php echo $event->getEvtNom() ?></span>
                  <span class="matDev">[ <?php echo (($event->getEvtMatiere())->getMatNom()) ?> ]</span></br>
                  <span class="descDev"><?php echo $event->getEvtDescription() ?></span></br>
                  <span class="renDev">Rendre le devoir sur <?php echo $event->getEvtTypeRendu() ?></span></br>
                  <span class="typeDev"><?php echo $event->getEvtType()->getTypeEvenementNom() ?></span>
              </div><!-- class = descDevoir -->
              <div class="cocheDevoir" id="<?php echo $user->getUtId()."-".$event->getEvtId() ?>">
                  <input type="text" style="display:none;" name="idEv" id="ids" class="form-control" value="<?php echo $event->getEvtId() ?>">
                  <input type="text" style="display:none;" name="fait" id="fait" class="form-control" value="<?php
                     $fait = $managerlien->getDevoirsCheck($user->getUtId(),$event->getEvtId());
                     echo $fait->getFait(); ?>">
                  <input class="cocheButt <?php if($fait->getFait()==1){echo "yescheckB";}else{echo "nocheckB";} ?>" type="submit" value="">
              </div><!-- class = cocheDevoir -->
          </div><!-- class = txtDevoir -->
        </form>
      <?php } ?>
    </div><!-- class = elemDevoirs -->
    <?php } ?>
  </div><!-- class = listeEvent -->
</div><!-- class = containerEvent -->
<?php }else{
  ?>
<p>Erreur, Vous devez être connecté pour accéder à vos devoirs.</p>
<?php } ?>
