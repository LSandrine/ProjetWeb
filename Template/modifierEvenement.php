<?php
if(isset($_SESSION['delegue']) && !empty($_SESSION['delegue'])){
if($_SESSION['delegue'] == 1){

Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerevent=new EvenementManager($db);
$managerclasse=new ClasseManager($db);
$managermatiere=new MatiereManager($db);
$managertype=new TypeEvenementManager($db);
$ListType = $managertype->getAll();
$ListMat = $managermatiere->getAll();

//Recup de la date du jour
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
//Recup de la date du jour
if(isset($_GET['idEvent'])){
  $event = $managerevent->getEvenementById($_GET['idEvent']);
  if(!empty($_POST)){
    $ev = $managerevent->getEvenementById($_GET['idEvent']);
    $ev->$nom =$_POST['nom'];
    $ev->$description =$_POST['description'];
    $ev->idMatiere =$_POST['idMatiere'];
    $ev->typeRendu =$_POST['typeRendu'];
    $ev->idType =$_POST['typeEvt'];
    $managerevent->update($ev);
  }else{
    ?>
<div class="containerMEvent">
    <h1>Modifier l'événement <?php echo $event->getEvtNom(); ?></h1>
    <form action='#' method="POST">
      <span class="labelC">Nom : </span><input class="champ" type="text" name="nom" value="<?php echo $event->getEvtNom(); ?>">
    </br><span class="labelC">Matière : </span>
        <select name="idMatiere" id="matEvt" class="form-control" >
          <?php foreach($ListMat as $matiere){ ?>
          <option value="<?php echo $matiere->getMatId() ?>"><?php echo $matiere->getMatNom(); ?></option>
          <?php } ?>
        </select>
      </br><span class="labelC">Description : </span><input class="champ" type="text" name="description" value="<?php echo $event->getEvtDescription(); ?>">
      </br><span class="labelC">Type de devoir : </span>
      <select name="typeEvt" id="typeEvt" class="form-control" >
        <?php foreach($ListType as $type){ ?>
        <option value="<?php echo $type->getTypeEvenementId() ?>"><?php echo $type->getTypeEvenementNom(); ?></option>
        <?php } ?>
      </select>
    </br><span class="labelC">Type de rendu : </span><input class="champ" type="text" name="typeRendu" value="<?php echo $event->getEvtTypeRendu(); ?>">
      </br><input class="bouton" type="submit" value="Modifier">
    </form>
      <?php
  }
}
?>
</div><!-- class containerMEvent -->
<?php
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
