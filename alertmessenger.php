<?php

session_start();

function createmessage($title, $message, $status, $bg, $type) {
    
 if($status == true) {
    
      $message = "<div class='alert alert-success alert-dismissible' style='position: fixed; top: 0px; width: 100%; opacity: 100;'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>$title</strong><p></p>$message</div>";
     
      if($type == 0) { 
     
        echo "<script> window.location.replace('home') </script>";
        exit();
          
      } else if($type == 1) {
          
        echo "<script> window.location.replace('index.php?reg=1') </script>";
        exit();
          
      } else if($type == 2) {
        
        echo "<script> window.location.replace('index.php') </script>";
        exit();
          
      } else if($type == 3) {
          
        echo "<script> window.location.replace('profil/index.php?id=' + $_SESSION[id]) </script>";
          
      }
     
 } else {
    
      $message = "<div class='alert alert-danger alert-dismissible' style='position: fixed; top: 0px; width: 100%; opacity: 100;'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>$title</strong><p></p>$message</div>";
     
      if($type == 0) {
     
        echo '<div class="container" style="position: relative; top: 100px;">
                <div class="well">
                    <form method="POST" action="login.php" name="login">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="email" name="signin_email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="pwd" name="signin_passwort" class="form-control" type="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><a href="index.php">Zurück zur Startseite</a></label>
                        </div>
                        <div class="button">
                            <button type="submit" name="login" class="btn btn-default">Login</button>
                        </div>
                    </form>
                </div>
            </div>';
                                
 } else if($type == 1) {
     
      echo'<div class="container" style="position: relative; top: 100px;">
            <div class="well">
               <form method="POST" action="registrierung.php" id="contact_form" name="reg">
                 <div class="form-group">
                      <div class="controls">
                   <label for="vorname">Vorname:</label>
                          <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input type="text" name="signup_vorname" class="form-control" id="vorname" data-validation="custom" data-validation-regexp="^([a-zA-Z\s]{3,})$" required>
                     </div>
                          </div>
                </div>
                 <div class="form-group">
                   <label for="nachname">Nachname:</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input type="text" name="signup_nachname" class="form-control" id="nachname" data-validation="custom" data-validation-regexp="^([a-zA-Z\s]{3,})$" required>
                </div>
                 </div>
                <div class="form-group">
                   <label for="email">Email address:</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                   <input type="email" name="signup_email" class="form-control" id="email" data-validation="email" data-validation="required" required>
                </div>
              </div>
                <div class="form-group">
                  <label for="passwordsignup">Password:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				   <input id="passwordsignup" data-minlength="6" type="password" name="signup_passwort" class="form-control" data-type="password" required>
                 </div>
                    <div class="help-block">Minimum of 6 characters</div>
            </div>
                 <div class="form-group">
                    <div class="progress">
                        <div id="complexity-bar" class="progress-bar" role="progressbar">
                            <span class="complexity-value">Ihr Passwort ist zu 0% sicher!</span>
                        </div>
                    </div>
                 </div>
                 <div class="form-group">
                        <label><a href="index.php">Zurück zur Startseite</a></label>
                 </div>
                <div class="button">
                  <button type="submit" name="reg" class="btn btn-default">Registrieren</button>
                </div>
              </form>
              </div>
              </div>';
     
     
     echo "<script type='text/javascript'>
                (function($) {

                $('#passwordsignup').complexify({}, function (valid, complexity) {
                    var progressBar = $('#complexity-bar');

                    progressBar.toggleClass('progress-bar-success', valid);
                    progressBar.toggleClass('progress-bar-danger', !valid);
                    progressBar.css({'width': complexity + '%'});

                    $('.complexity-value').text(Math.round(complexity) + '%');
                    });

                })(jQuery);

            </script>";
         
 } else if($type == 2) {
     
 } else if($type == 3) {
    echo "<script> window.location.replace('profil/index.php?id=' + $_SESSION[id]) </script>";
 }
     
 }

 echo $message;
 echo "<body style='background-color: $bg'>";
   
        
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="SnapSync UG" />
<meta name="description" content="Die Nerds Ihres Vertrauens.." />
    
<!-- Responsive -->
<meta name="viewport" content="width=devide-width, initial-scale=1.0" />

<!-- Bootstrap / CSS -->
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/intern.css">
    
<!-- JQuery / JS -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/complexify.js"></script>

<!-- Custom Favicon -->
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="images/favicon.ico" type="image/x-icon" />
    
<title>snapSync</title>

</head>
<body>     
</body>
</html>