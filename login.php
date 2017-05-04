<?php
session_start();

include("connect.php");
include("alertmessenger.php");

if(isset($_POST['login'])) {
	 
    $email = $_POST['signin_email'];
    $passwort = md5($_POST['signin_passwort']);

    $ergebnis = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email . "' AND passwort = '" . $passwort . "'");
    $num_rows = mysqli_num_rows($ergebnis);
    
    if($num_rows > 0) {
        while($row = mysqli_fetch_object($ergebnis)) {
            $_SESSION['id'] = $row->id;
            $_SESSION['username']   = $row->vorname . " " . $row->nachname;
            $_SESSION['profilbild'] = $row->profilbild;
            $_SESSION['vorname'] = $row->vorname;
            $_SESSION['nachname'] = $row->nachname;
            $_SESSION['createdat']  = $row->created_at;
            $_SESSION['lastlogin'] = $row->last_login;
            $_SESSION['imageIndex'] = $row->imagetype;
            $_SESSION['email'] = $email;
        }
        
        $_SESSION['login'] = true;
        $timestamp = date('Y-m-d h:i:s', time());
        
        if ($conn->query("UPDATE users SET last_login = '" . $timestamp . "', updated_at = '" . $timestamp . "' WHERE email = '" . $email . "'") === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
        }
          
        createmessage("Anmeldung - Erfolgreich","Ihre Anmeldung war erfolgreich.<br>",true,"#2f5972",0);
        
    } else {
        createmessage("Anmeldung - Abgebrochen","Ihre Anmeldung war leider nicht erfolgreich.<br>Bitte versuchen Sie es noch einmal.",false,"#722f37",0);
    }

}

?>