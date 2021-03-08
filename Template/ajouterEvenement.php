<?php
require("../menu.php");
Configuration::setConfigurationFile('../Database/configuration.ini');
$db = Database::getInstance();
$managerevent=new EvenementManager($db);
$managerclasse=new ClasseManager($db);
$managermatiere=new MatiereManager($db);
$ListClasse = $managerclasse->getAll();
$ListMat = $managermatiere->getAll();

//if(!isset($_POST['nomEvt']) && !isset($_POST['dateEvt']) && !isset($_POST['descEvt']) && !isset($_POST['matEvt']) && !isset($_POST['typeR'])) {
?>

<body>
<h1>Ajouter un événement</h1>
  <div class="container">
    <form action="#" method="post">
      <div class="Evt">
        <label for="nomEvt">Nom de l'événement </label>
        <input type="text" name="nomEvt" id="nomEvt" class="form-control" placeholder="Saisissez le nom de l'événement">
        <label for="dateEvt">Date de l'événement </label>
        <input type="text" name="dateEvt" id="dateEvt" class="form-control" placeholder="Saisissez la date de l'événement">
      </div>
      <div class="EvtDesc">
        <label for="descEvt">Description de l'événement : </label>
        <textarea type="text" name="descEvt" id="descEvt" class="form-control" placeholder="Saisissez une description de l'événement"></textarea>
        <div id="matiere">
          <label for="matEvt">Matière de l'événement </label>
          <select name="matEvt" id="matEvt" class="form-control" >
            <?php foreach($ListMat as $matiere){ ?>
            <option value="<?php echo $matiere->getMatId() ?>"><?php echo $matiere->getMatNom(); ?></option>
            <?php } ?>
          </select>
        </div>
        <label for="typeR">Type de rendu de l'événement </label>
        <input type="text" name="typeR" id="typeR" class="form-control" placeholder="Moodle/Mail/etc.">
        <div id="classe">
          <label>Classe concernée par l'événement </label>
          <label>Promotion</label>
          <select name="promoEvt" id="promoEvt" class="form-control" >
            <?php foreach($ListClasse as $classe){ ?>
            <option value="<?php echo $classe->getClassId() ?>"><?php echo $classe->getClassPromo(); ?></option>
            <?php } ?>
          </select>
          <label>Groupe</label>
          <select name="grpEvt" id="grpEvt" class="form-control" >
            <?php foreach($ListClasse as $classe2){ ?>
            <option value="<?php echo $classe2->getClassId() ?>"><?php echo $classe2->getClassGrp(); ?></option>
            <?php } ?>
          </select>
        </div>
        <div id="type">
          <label for="typeEvt">Type de l'événement </label>
          <select name="typeEvt" id="typeEvt" class="form-control" >
            <option selected>Open this select menu</option>
            <?php
            ?>
          </select>
        </div>
      </div>
    </form>
  </div>
</body>
