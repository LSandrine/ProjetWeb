<?php
if(isset($_POST['change_submit'])) {
  Configuration::setConfigurationFile('Database/configuration.ini');
  $db = Database::getInstance();
  $manageruser = new UtilisateurManager($db);

    $mdp = htmlspecialchars($_POST['change_mdp']);
    $mdpc = htmlspecialchars($_POST['change_mdpc']);
    if(!empty($mdp) AND !empty($mdpc)) {
       if($mdp == $mdpc) {
          //$mdp = sha1($mdp);
          $manageruser->ModifMdp($_SESSION['recup_mail'],$mdp);
          header("Location: index.php?page=1");


       } else {
          echo " <div style='text-align:center;'><span style='color:red;'>Vos mots de passes ne correspondent pas</span></div>";

       }

 }
}







 ?>
<div class="login-form" style="border: 1px solid #9C9C9C;background-color: #EAEAEA; padding: 20px;margin-left: 25%;margin-right: 25%;margin-top: 100px;">
  <form method="post" style="TEXT-ALIGN: CENTER;">
     <input style="width: 30%;margin-bottom: 14px;" type="password" placeholder="Nouveau mot de passe" name="change_mdp" /><br/>
     <input  style="width: 30%;margin-bottom: 14px;" type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"/><br/>
     <!--<button type="button" class="btn btn-secondary btn-lg"  name="change_submit" >Valider</button>-->
     <input type="submit" value="Valider" name="change_submit"/>

  </form>
</div>
