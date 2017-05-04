<?php

session_start();
include_once("../connect.php");

if(isset($_POST['id'])) {

    $id = $_POST['id'];
    $src = $_POST['src'];
    $sql = "DELETE FROM gallery WHERE title = '" . $id . "'";
    
    if ($conn->query($sql) === TRUE) {
        unlink($src);
        echo "<script> window.location.replace('index.php?id=' + $_SESSION[id]) </script>";
    } else {
        echo $conn->error;
    } 

} else {
    echo "Error - Fehlende GET-Variable!";
}

?>