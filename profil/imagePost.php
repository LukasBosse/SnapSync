<?php

session_start();
include("../connect.php");

    $titel = $_POST['title'];

    $target_dir = "uploads/postings";
    $imageURL = mysqli_real_escape_string($conn,$target_dir . basename($_FILES["url"]["name"]));
    $ext=pathinfo($target_file,PATHINFO_EXTENSION);

    if(file_exists($imageURL)) {
        $imageURL = $imageURL.rand(1,500).".".$ext;
    } 

    if(move_uploaded_file($_FILES['url']['tmp_name'], $imageURL) == false) {
        echo $conn->error;
    } 

    if ($conn->query("INSERT INTO gallery (userID, title, src) VALUES ('" . $_SESSION['id'] . "','" . $titel . "', '" . $imageURL . "')") === TRUE) {
        echo "<script> window.location.replace('index.php?id=' + $_SESSION[id]) </script>";
    } else {
        echo $conn->error;
    } 

?>