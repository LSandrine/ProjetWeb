<?php
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerevent=new EvenementManager($db);
$managerclasse=new ClasseManager($db);
$managermatiere=new MatiereManager($db);
$managertype=new TypeEvenementManager($db);
$ListClasse = $managerclasse->getAll();
$ListMat = $managermatiere->getAll();
$ListType = $managertype->getAll();
//if(!isset($_POST['nom']) && !isset($_POST['dateEvt']) && !isset($_POST['descEvt']) && !isset($_POST['idMatiere']) && !isset($_POST['typeRendu']) && !isset($_POST['idClasse']) && !isset($_POST['idType'])) {
?>
<div class="containerEvent">

<!-- Ajout d'une BD pour cocher les devoirs terminés

</div><!-- class = containerEvent -->
<?php //} ?>
