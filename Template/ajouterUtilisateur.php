<?php

Configuration::setConfigurationFile('Database/configuration.ini');
$db = Database::getInstance();
$ClasseManager=new ClasseManager($db);
$utilisateur=new UtilisateurManager($db);
$RoleManager=new RoleManager($db);
?>
<?php
if( ( isset($_POST["mail"]) AND !empty($_POST["mail"]) ) AND ( isset($_POST["mdp"]) AND !empty($_POST["mdp"]))
 AND ( isset($_POST["groupe"]) AND !empty($_POST["groupe"]))  AND ( isset($_POST["promotion"]) AND !empty($_POST["promotion"])     )     )
 {
     $verifMail=$utilisateur->existeUtilisateur($_POST["mail"]);
     if($verifMail>0)
     {
       echo "<div style='COLOR: red;text-align: center;'>utilisateur existe déjà dans le systéme</div>";
     }else {
            $Classe=$ClasseManager->getClasseByPromoGrp($_POST["promotion"],$_POST["groupe"]);
            $_POST['idClasse'] = $Classe->getClassId();
            $idUtilisateur=$utilisateur->getLastId();

           if(isset($_POST["delegue"]) AND !empty($_POST["delegue"]))
           {
             $Util = new Utilisateur($_POST);
             $utilisateur->add($Util);
             $RoleManager->addLien("2",$idUtilisateur);
             $RoleManager->addLien("1",$idUtilisateur);
             header("Location: index.php?page=1");

           }else {
             $Util = new Utilisateur($_POST);
             $utilisateur->add($Util);
             $RoleManager->addLien("1",$idUtilisateur);
             header("Location: index.php?page=1");

           }
     }
 }

 ?>
  <div style="width: 500px;margin: auto;">
 <div class="containerAddUtilisateur">
 </div>
  <p class="h2 text-center" style="text-decoration: underline;">Formulaire d'inscription</p>
  <form action="" method="post" >
            <div class="preview text-center">
                <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
            </div>

            <div class="form-group">
                <label>mail 3il:</label>
                <input class="form-control" type="email" name="mail" required="required" placeholder="xyz@3il.fr" id="email" onkeyup="verifmail()"/>
                <span class="Error" id="varifemail" style="display:none;"> Veuillez renseigner correctement le champ</span>
            </div>
            <div class="form-group">
                <label>mot de passse:</label>
                <input class="form-control" type="password" name="mdp" required placeholder="mot de passe" id="password" onkeyup="verifPassword()"/>
                <span class="Error"id="varifpassword" style="display:none;">Veuillez renseigner bien le champ (mini 5 caractéres)</span>
            </div>
<?php
//Cryptage du mdp
	$salt = "48@!alsd";
	$_POST['mdp'] = sha1(sha1($_POST['mdp']).$salt);
 ?>
            <div class="form-group">
                <label>Promotion:</label><br/>
                <select class="form-control" name="promotion">

                  <?php foreach($ClasseManager->getPromotion() as $key ) {
                         echo '<option id="promotion" value='.$key['promotion'].'>'.$key['promotion'].'</option>';
                         } ?>
                </select>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Classe:</label><br/>
                <select class="form-control" name="groupe" >
                <?php foreach($ClasseManager->getGroupe() as $key ) {
                    echo '<option id="groupe" value='.$key['groupe'].'>'.$key['groupe'].'</option>';
                  } ?>

                </select>
                <span class="Error"></span>
            </div>
            <div class="form-check" style="margin-left: 193px;">
              <label class="form-check-label" >Délégué:</label>
              <input type="checkbox" name="delegue" value="1" style="margin-right: 63px;"/>
           </div>
            <div class="form-group">
              <button style="margin-bottom: 21px;"class="btn btn-primary btn-block" type="submit" name="button" onclick="inscription()" >inscription</button>
            </div>
        </form>

</div>
