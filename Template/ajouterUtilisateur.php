<?php

include("menu.php");

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
                <label>Nom prÃ©nom:</label>
                <input class="form-control" type="text" name="fullname" required placeholder="Enter Your Full Name"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>mail:</label>
                <input class="form-control" type="email" name="email" required placeholder="Enter Your Email"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>mot de passse:</label>
                <input class="form-control" type="password" name="password" required placeholder="Enter Password"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Gender:</label><br/>
                <label><input type="radio" name="gender" required value="Male" checked /> Male</label>
                <label><input type="radio" name="gender" required value="Female" /> Female</label>
                <label><input type="radio" name="gender" required value="Other" /> Other</label>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="Submit"/>
            </div>
        </form>

</body>
