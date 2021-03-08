<?php

require("../menu.php");
include_once '../Models/ClasseManager.php';
Configuration::setConfigurationFile('../database/configuration.ini');
$db = Database::getInstance();
$ClasseManager=new ClasseManager($db);
?>


<body>
 <div class="container">
   <div class="Back">
          <i class="fa fa-arrow-left" onclick="Back()"></i>
      </div>
 </div>
  <p class="h2 text-center">Form</p>
  <form action="" method="post">
            <div class="preview text-center">
                <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
                <div class="browse-button">
                    <i class="fa fa-pencil-alt"></i>
                    <input class="browse-input" type="file" required name="UploadedFile" id="UploadedFile"/>
                </div>
                <span class="Error"></span>
            </div>

            <div class="form-group">
                <label>mail 3il:</label>
                <input class="form-control" type="email" name="email" required placeholder="Enter Your Email"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>mot de passse:</label>
                <input class="form-control" type="password" name="password" required placeholder="Enter Password"/>
                <span class="Error"></span>
            </div>

            <div class="form-group">
                <label>Promotion:</label><br/>
                <select class="form-control" >
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <span class="Error"></span>
            </div>
              <?php var_dump($ClasseManager->getPromotion());  ?>
            <div class="form-group">
                <label>Classe:</label><br/>
                <select class="form-control" >
                <?php echo " ".$ClasseManager->getPromotion();  ?>
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="Submit"/>
            </div>
        </form>



<span class="Error"></span>
</div>



<div class="form-group">
<label>mail de 3il:</label>
<input class="form-control" type="email" name="email" required placeholder="Enter Your Email"/>
<span class="Error"></span>
</div>



<div class="form-group">
<label>mot de passse:</label>
<input class="form-control" type="password" name="password" required placeholder="Enter Password"/>
<span class="Error"></span>
</div>



<div class="form-group">
<label>Promotion:</label><br/>
<select class="form-control" >
<option selected>Open this select menu</option>
<option value="1">One</option>
<option value="2">Two</option>
<option value="3">Three</option>
</select>
<span class="Error"></span>
</div>
<?php var_dump($ClasseManager->getPromotion()); ?>
<div class="form-group">
<label>Classe:</label><br/>
<select class="form-control" >
<?php echo " ".$ClasseManager->getPromotion(); ?>
<option selected>Open this select menu</option>
<option value="1">One</option>
<option value="2">Two</option>
<option value="3">Three</option>
</select>
<span class="Error"></span>
</div>
<div class="form-group">
<input class="btn btn-primary btn-block" type="submit" value="Incription"/>
</div>
</form>



</body>
