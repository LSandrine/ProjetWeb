<?php
if(isset($_SESSION['delegue']) && !empty($_SESSION['delegue'])){
if($_SESSION['delegue'] == 1){
Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$managerevent=new EvenementManager($db);
$managerclasse=new ClasseManager($db);
$managermatiere=new MatiereManager($db);
$managertype=new TypeEvenementManager($db);;

	if(isset($_GET['idEvent'])){
		$event = $managerevent->getEvenementById($_GET['idEvent']);
	?>
			<h1>Détail sur l' événement  <?php echo $event->getEvtNom(); ?></h1>
			<table>
				<tr>
					<th>Nom</th>
					<th>Date</th>
					<th>Matière</th>
					<th>Description</th>
					<th>Type de devoir</th>
					<th>Type de rendu</th>
				</tr>
				<tr>
					<td><?php echo $event->getEvtNom(); ?></td>
					<td><?php echo $event->getEvtDate(); ?></td>
					<td><?php echo ($event->getEvtMatiere())->getMatNom(); ?></td>
					<td><?php echo $event->getEvtDescription(); ?></td>
					<td><?php echo ($event->getEvtType())->getTypeEvenementNom(); ?></td>
					<td><?php echo $event->getEvtTypeRendu(); ?></td>
				</tr>
			</table>
	<?php }
	else{ ?>
		<h1>Liste des événements enregistrés</h1>
		<?php
			$listeEvent = $managerevent->getAll();
			$nbEv = count($listeEvent);
		?>
		<p>Actuellement <?php echo $nbEv; ?> événements enregistrés.</p>
		<table>
			<tr>
				<th>Numéro</th>
				<th>Nom</th>
			</tr>
			<?php
				foreach($listeEvent as $evt){ ?>
					<tr>
						<th><a href="index.php?page=9&idEvent=<?php echo $evt->getEvtId() ?>"><?php echo $evt->getEvtId() ?></a></th>
						<td><?php echo $evt->getEvtNom() ?></td>
					</tr>
				<?php }	?>
		</table>
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
