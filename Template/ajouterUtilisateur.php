<?php

require("../menu.php");
include_once '../Models/ClasseManager.php';
Configuration::setConfigurationFile('../database/configuration.ini');
$db = Database::getInstance();
$ClasseManager=new ClasseManager($db);
?>


<body>
  <div style="width: 500px;margin: auto;">


 <div class="container">


 </div>
  <p class="h2 text-center" style="text-decoration: underline;">Formulaire d'inscription</p>
  <form action="inscription.php" method="post" >
            <div class="preview text-center">
                <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
            </div>

            <div class="form-group">
                <label>mail 3il:</label>
                <input class="form-control" type="email" name="email" required="required" placeholder="xyz@3il.fr" id="email" onkeyup="verifmail()"/>
                <span class="Error" id="varifemail" style="display:none;"> Veuillez renseigner correctement le champ</span>
            </div>
            <div class="form-group">
                <label>mot de passse:</label>
                <input class="form-control" type="password" name="password" required placeholder="mot de passe" id="password" onkeyup="verifPassword()"/>
                <span class="Error"id="varifpassword" style="display:none;">Veuillez renseigner bien le champ (mini 5 caractéres)</span>
            </div>

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
              <label class="form-check-label" for="exampleCheck1">Délégué</label>
              <input type="checkbox" class="form-check-input" id="exampleCheck1"  style="margin-right: 63px;">
           </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit" name="button" onclick="inscription()" >inscription</button>
            </div>
        </form>
        <div class="form-group">
          <span style="font-weight: bold;color: red;display:none;" id='verif'>Veuillez renseigner tous les champs</span>
        </div>
</div>
</body>

<script type="text/javascript">




</script>
