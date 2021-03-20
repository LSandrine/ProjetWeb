
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

<!--<form action="#" method="POST">
	<span class="labelC">Mail 3iL : </span><br><input class="champ" type="text" name="mail" value="<?php echo $mail; ?>"><br>
	<span class="labelC">Mot de passe : </span><br><input class="champ" type="password" name="mdp" value="<?php echo $mdp; ?>"><br>
	<input class="bouton" type="submit" value="Valider">
</form>-->

<?php
if(isset($_POST['mail'])){
  Configuration::setConfigurationFile('Database/configuration.ini');
  $db = Database::getInstance();
	$manageruser = new UtilisateurManager($db);
	$user = $manageruser->getUtAvecMailMdp($mail);
	if (password_verify($mdp, $user->getUtMdp())) {
			$_SESSION['idUtilisateur'] = $user->getUtId();
			$_SESSION['mail'] = $user->getUtMail();
			$_SESSION['delegue'] = $user->getUtDelegue();
			header('Location: index.php');
			exit();
	} else { ?>
	    	<div style='COLOR: red;text-align: center;'>Erreur, login ou mot de passe incorrect</div>;
	<?php }
}
?>
<body>
  <div class="login-form">
      <form action="" method="post">
          <h2 class="text-center">connexion</h2>
          <div class="form-group">
              <input  class="form-control" type="email" name="mail" required="required" placeholder="xyz@3il.fr">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" placeholder="mot de passe" required="required" name="mdp">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Log in</button>
          </div>

      </form>
  </div>
  </body>
