
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


  <div class="login-form" style="border: 1px solid #9C9C9C;background-color: #EAEAEA; padding: 20px;margin-left: 25%;margin-right: 25%;margin-top: 100px;">
      <form action="" method="post">
          <h2 class="text-center" style="margin-top: 17px;margin-bottom: 27px;">Bienvenue sur la platforme de gestion edt </h2>
          <div class="form-group">
						<?php if(isset($_SESSION['recup_mail']) and !empty($_SESSION['recup_mail'])){ ?>
              <input  class="form-control" type="email" name="mail" required="required" value= <?php echo"".$_SESSION['recup_mail'] ?> >
						<?php }else{ ?>
							<input  class="form-control" type="email" name="mail" required="required"  placeholder="xyz@3il.fr">
            <?php } ?>
          </div>
          <div class="form-group">
              <input type="password" class="form-control" placeholder="mot de passe" required="required" name="mdp">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Connexion</button>
          </div>
					<div style="text-align: center;font-weight: bold;margin-top: 20px;">
						<span>Vous avez oublié votre mot de passe ?<a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal"> Cliquez-ici</span></a></span>
					</div>
      </form>
  </div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 166px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Récuperer votre mot de passe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<label>Saisissez l'adresse e-mail associée à votre compte 3il. </label>
        <input  class="form-control" type="email" name="mail" required="required" id="mailSend" placeholder="xyz@3il.fr">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="envoyerMail()">Envoyer le mot de passe</button>
      </div>
    </div>
  </div>
</div>

</body>



	<script type="text/javascript">
	function envoyerMail()
	 {

		 	var inputMail=document.getElementById('mailSend').value;

		 $.ajax({
		 url: 'Template/recupMdp.php',
		 type: 'post',
		 data :{inputMail:inputMail},
		 success: function (resultat, statutListeSectionMachine) {
			 console.log(resultat);
					if(resultat==1)
						{

						alert("Le mail a bien été envoyé. Merci de consulter votre boite mail !");


						}else {
						 alert("Le mail n'a pas été envoyé ! CONTACTER UN ADMINISTRATEUR");
						}



		 },

		 error: function (resultatListeSection2, statutListeSection2) {
      console.log(resultatListeSection2);
			alert('UNE ERREUR EST SURVENUE ! CONTACTER UN ADMINISTRATEUR');
		 }

	 });

	 }

	</script>
