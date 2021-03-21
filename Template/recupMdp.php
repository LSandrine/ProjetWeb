<?php
use PHPMailer\PHPMailer\PHPMailer;



if (isset($_POST['inputMail']) AND !empty($_POST['inputMail']))
  {
    $_SESSION['recup_mail']=htmlspecialchars($_POST['inputMail']);
    require_once  "PHPMailer/PHPMailer.php";
    require_once  "PHPMailer/SMTP.php";
    require_once  "PHPMailer/Exception.php";

      $mail = new PHPMailer();
      $mail->isSMTP();

      //Server settings
      $mail->SMTPDebug = false;                                       // Enable verbose debug output
      //$mail->isMail();                                        // Set mailer to use SMTP
      $mail->Host       = 'smtp.gmail.com';
      $mail->CharSet = "utf-8";  // Specify main and backup SMTP servers
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'ton adresse mail@gmail.fr';                     // SMTP username
      $mail->Password   = 'ton mot de passe'                               // SMTP password
      $mail->SMTPSecure = 'ssl';
      $mail->AuthType=true;                                // Enable TLS encryption, `ssl` also accepted
      $mail->Port  = 465;                                    // TCP port to connect to
      $mail -> isHTML(true);
      //Recipients
      $mail->setFrom('ton adresse mail@gmail.fr', '"3IL"');
      $mail->AddAddress($_POST['inputMail']);
      $mail->AddEmbeddedImage('img/download.png', 'logo_2u');

      $mail->Subject = 'Récupération de mot de passe <';
      $mail->Body    = (' <font color="#303030";>
                        <div align="center">

                           <tr>
                          <div align= "center"> <b> Bonjour,  </b>,</div>
                          veuillez cliquer pour récuperer votre mot de passe <a href="http://localhost/projetEi/ProjetWeb/index.php?page=8 ">ici</a>
                          </tr>
                    <tr>
                       <td align="center">
                          <font size="2">
                            Ceci est un email automatique, merci de ne pas y répondre
                          </font>
                        </td>
                      </tr>
                      </div> ' );

          if(!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
              echo '1';
          }

  }


 ?>
