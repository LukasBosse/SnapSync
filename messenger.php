<?php

include("connect.php");
include("alertmessenger.php");

if(isset($_POST['contact'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "lukasbosse95@gmail.com";
 
    $email_subject = "Kontaktaufnahme: " . $_POST['name'];
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['comments'])) {
 
        createmessage("Senden - Abgebrochen","Ihre Nachricht wurde leider nicht erfolgreich übermittelt.<br>Bitte versuchen Sie es noch einmal.",false,"#722f37",2);
 
    }
  
    $name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required
 
    $comments = $_POST['comments']; // required
    
    $email_message = "Sie haben eine neue Benachrichtigung von " . $name . " (" . $email_from . "):\n\n\n" . $comments;
 
    $mail = mail($email_to, $email_subject, $email_message,$email_from);
    if($mail) {
      echo '<div class="alert alert-success alert-dismissible" style="position: fixed; top: 50px; width: 100%; opacity: 100;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Your contact message was sended successfull.</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible" style="position: fixed; top: 50px; width: 100%; opacity: 100;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong> Your contact message was not sended.</div>';
    }   
    
}


?>