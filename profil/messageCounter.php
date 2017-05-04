<?php
        
   session_start();
   include("../connect.php");

   $sql = "SELECT ID FROM messages WHERE recieverID = '" . $_SESSION['id'] . "' AND hasSeen = 0";
   $ergebnis = mysqli_query($conn, $sql);
   $numrows = mysqli_num_rows($ergebnis);

   echo "(" . $numrows . ") Nachrichten";

?>