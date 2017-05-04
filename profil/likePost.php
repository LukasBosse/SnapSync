<?php

   if(isset($_GET['postID'])) {
       if(isset($_GET['url'])) {
           
           include("../connect.php");

           $postID = $_GET['postID'];
           $postURL = $_GET['url'];
           
           $sql = "UPDATE postings SET likes = likes + 1 WHERE ID = " . $postID . "";
           

           if(mysqli_query($conn, $sql)) {
               echo "<script>window.location.replace('index.php?id=' + $postURL)</script>";
           } else {
               echo "Error - Es ist ein Fehler aufgetreten.";
           }
     
       }
       
   }

?>