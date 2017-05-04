<?php
session_start();
include("connect.php");

if(isset($_POST['posting'])) {
    
    $id = $_SESSION['id'];
    $post = mysqli_real_escape_string($conn,$_POST['posting']);
    $date = date("y-m-d", time()); 
    
    $sql = "INSERT INTO postings (senderID, message, stamp) VALUES ('" . $id . "','" . $post . "','" . $date . "')";
    
    if($eintragen = mysqli_query($conn, $sql)) {  
        header("Location: profil/index.php?id=" . $_SESSION['id'] . "");
    } else {
        echo mysqli_error($conn);   
    }
    
}


?>