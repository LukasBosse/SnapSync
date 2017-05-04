<?php
session_start();

include("connect.php");
include("alertmessenger.php");
	 
    $imageURL = "uploads/" . basename($_FILES["url"]["name"]);
    $type = $_POST['optradio'];
    $email = $_SESSION['email'];
    $imageType = 0;
    
        if($type == "Standardbild 3") {
            
            $target_dir = "profil/uploads/";
            $target_file = addslashes($target_dir . basename($_FILES["url"]["name"]));
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["url"]["tmp_name"]);
            if(move_uploaded_file($_FILES['url']['tmp_name'], $target_file) == false) {
                echo $conn->error;
            } 
            $imageType = 2;
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            
        } else if($type == "Standardbild 2") {
            $imageType = 1;
            $imageURL = "../images/profile-placeholder_female.png";
        } else if($type == "Standardbild 1") {
            $imageType = 0;
            $imageURL = "../images/profile-placeholder.png";
        }

        $_SESSION['imageIndex'] = $imageType;
        $_SESSION['profilbild'] = $imageURL;

        if ($conn->query("UPDATE users SET profilbild = '" . $imageURL . "', imagetype = '" . $imageType . "' WHERE email = '" . $email . "'") === TRUE) {
            createmessage("Änderung - Erfolgreich","Ihre Änderung war erfolgreich.<br>",true,"#2f5972",3);
        } else {
            createmessage("Änderung - Nicht Erfolgreich","Ihre Änderung war erfolgreich.<br>",true,"#2f5972",3);
        } 
        
?>