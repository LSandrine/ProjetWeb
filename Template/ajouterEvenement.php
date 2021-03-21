<?php
echo $_SESSION['delegue'];
if(isset($_SESSION['delegue']) && !empty($_SESSION['delegue'])){
if($_SESSION['delegue'] == 1){

Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerevent=new EvenementManager($db);
$managerclasse=new ClasseManager($db);
$managermatiere=new MatiereManager($db);
$managertype=new TypeEvenementManager($db);
$ListClasse = $managerclasse->getAll();
$ListMat = $managermatiere->getAll();
$ListPromo = $managerclasse->getPromotion();
$ListGrp = $managerclasse->getGroupe();
$ListType = $managertype->getAll();

//Recup de la date du jour
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
//Recup de la date du jour

if(!isset($_POST['nom']) && !isset($_POST['dateEvt']) && !isset($_POST['descEvt']) && !isset($_POST['idMatiere']) && !isset($_POST['typeRendu']) && !isset($_POST['idClasse']) && !isset($_POST['idType'])) {
?>
<div class="containerEvent">
  <div class="box">
    <div class="box-form">
      <div class="box-login-tab"></div>
      <div class="box-login-title"><div class='i i-login'></div><h2>Nouvel événement</h2></div>
      <div class="box-login">
        <div class="fieldset-body">
          <div class="bodyBoxEvent">
            <form action="#" method="post">
              <div class="Evt">
                <label for="nom">Nom de l'événement </label>
                <input type="text" name="nom" id="nomEvt" class="form-control" placeholder="Saisissez le nom de l'événement">
                <label for="dateEvt">Date de l'événement </label>
                <input type="date" name="dateEvt" id="dateEvt" class="form-control" value="<?php echo $today;?>">
              </div>
              <div class="EvtDesc">
                <label for="description">Description de l'événement : </label>
                <textarea type="text" name="description" id="descEvt" class="form-control" placeholder="Saisissez une description de l'événement"></textarea>
                <div id="matiere">
                  <label for="idMatiere">Matière de l'événement </label>
                  <select name="idMatiere" id="matEvt" class="form-control" >
                    <?php foreach($ListMat as $matiere){ ?>
                    <option value="<?php echo $matiere->getMatId() ?>"><?php echo $matiere->getMatNom(); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <label for="typeRendu">Type de rendu de l'événement </label>
                <input type="text" name="typeRendu" id="typeR" class="form-control" placeholder="Moodle/Mail/etc.">
                <div id="classe">
                  <label>Classe concernée par l'événement </label>
                  <label>Promotion</label>
                  <select name="promoEvt" id="promoEvt" class="form-control" >
                    <?php foreach($ListPromo as $promo ) { ?>
                        <option id="promotion" value="<?php echo $promo["promotion"]; ?>" ><?php echo $promo["promotion"]; ?></option>
                     <?php } ?>
                  </select>
                  <label>Groupe</label>
                  <select name="grpEvt" id="grpEvt" class="form-control" >
                    <?php foreach($ListGrp as $grp){ ?>
                    <option value="<?php echo $grp["groupe"] ?>"><?php echo $grp["groupe"] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div id="type">
                  <label for="typeEvt">Type de l'événement </label>
                  <select name="typeEvt" id="typeEvt" class="form-control" >
                    <?php foreach($ListType as $type){ ?>
                    <option value="<?php echo $type->getTypeEvenementId() ?>"><?php echo $type->getTypeEvenementNom(); ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
          		<br>
          		<input class="bouton" type="submit" value="Valider">
            </form>
          </div><!-- class = bodyBoxEvent -->
        </div><!-- class = fieldset-body -->
      </div><!-- class = box-login -->
    </div><!-- class = box-form -->
  </div><!-- class = box -->
</div><!-- class = containerEvent -->

  <?php
}else{
        $classeChoose = $managerclasse->getClasseByPromoGrp($_POST['promoEvt'],$_POST['grpEvt']);
        $typeChoose = $managertype->getTypeEvtById($_POST['typeEvt']);
    	  $_POST['idClasse'] = $classeChoose->getClassId();
    	  $_POST['idType'] = $typeChoose->getTypeEvenementId();
    		$event = new Evenement($_POST);
    		$managerevent->add($event);
    		?> <p style="text-align: center; font-weight: bold;"> L'événement a bien été ajouté.</p>
<?php }
}else{?>
  <div style='COLOR: red;text-align: center;font-size:30px;'>OUPS ... Erreur 404, page not found !</div>
  <a class="nav-link" style='text-align: center;font-size:60px;' href="index.php?page=0">Retour à l'accueil</a>
<?php }
}else{?>
  <div style='COLOR: red;text-align: center;font-size:30px;'>OUPS ... Erreur 404, page not found !</div>
  <a class="nav-link" style='text-align: center;font-size:60px;' href="index.php?page=0">Retour à l'accueil</a>
<?php
}
?>
