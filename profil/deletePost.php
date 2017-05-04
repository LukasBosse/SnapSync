<?php
session_start();
include("../connect.php");

if(isset($_GET['id'])) {
    
    $id = $_GET['id'];
      
    $sql = "DELETE FROM postings WHERE ID = '" . $id . "'";
    
    if($eintragen = mysqli_query($conn, $sql)) {  
        header("Location: index.php?id=" . $_SESSION['id'] . "");
    } else {
        echo mysqli_error($conn);   
    }
    
} else {
    echo "Missing ID!";
}

?>