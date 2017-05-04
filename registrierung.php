<?php

include("connect.php");
include("alertmessenger.php");

if(isset($_POST['reg'])) {
    
    $vorname = $_POST['signup_vorname'];
    $nachname = $_POST['signup_nachname'];
    $email = $_POST['signup_email'];
    $pw5 = md5($_POST['signup_passwort']);
    $name = $vorname . ' ' . $nachname;
    
    $sql = "INSERT INTO users (email, passwort, vorname, nachname, username) VALUES ('" . $email . "','" .  $pw5 . "','" .  $vorname . "','" .  $nachname . "', '" . $name . "')";

    if($conn->query($sql) === TRUE) {
        createmessage("Registrierung - Erfolgreich","Ihre Registrierung war erfolgreich.<br>Bitte loggen Sie sich nun ein.",true,"#2f5972",1);
    } else {
        createmessage("Registrierung - Abgebrochen","Ihre Registrierung war leider nicht erfolgreich.<br>Bitte versuchen Sie es noch einmal.",false,"#722f37",1);
    }    
        
}

?>