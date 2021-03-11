<h1>Pour vous connecter</h1>

<?php
$user = 0;
if(!isset($_POST['mail'])){
	$mail = "";
	$mdp = "";
}
else{
	$mail = $_POST['mail'];
	$mdp = $_POST['mdp'];
}
?>

<form action="#" method="POST">
	<span class="labelC">Mail 3iL : </span><br><input class="champ" type="text" name="mail" value="<?php echo $mail; ?>"><br>
	<span class="labelC">Mot de passe : </span><br><input class="champ" type="password" name="mdp" value="<?php echo $mdp; ?>"><br>
	<input class="bouton" type="submit" value="Valider">
</form>

<?php
if(isset($_POST['mail'])){
  Configuration::setConfigurationFile('Database/configuration.ini');
  $db = Database::getInstance();
	$manageruser = new UtilisateurManager($db);
	$salt = "48@!alsd";
	$mdp_crypte = sha1(sha1($mdp) . $salt);

	$user = $manageruser->getUtAvecMailMdp($mail, $mdp);

	if(!$user->isOk()){	// mauvais couple login/mdp ?>
		<p>Erreur, login ou mot de passe incorrect.</p>
	<?php }else{ // connexion réussi
		$_SESSION['idUtilisateur'] = $user->getUtId();
		$_SESSION['mail'] = $user->getUtMail();
		header('Location: index.php');
		exit();
	}
}
?>
