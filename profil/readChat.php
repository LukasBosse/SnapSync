<?php

session_start();
include("../connect.php");

if(isset($_GET['q'])) {

$sender = $_GET['q'];    
$sql = "SELECT * FROM messages WHERE (senderID = '" . $sender ."' OR recieverID = '" . $sender . "') AND (recieverID = '" . $_SESSION['id'] . "' OR senderID = '" . $_SESSION['id'] . "') ORDER BY posting DESC, ID ASC LIMIT 4";
    
     $ergebnis = mysqli_query($conn, $sql);
     $numrows = mysqli_num_rows($ergebnis);
     $counter = 0;
    
        if($numrows > 0) {

            while($row = mysqli_fetch_object($ergebnis)) {
                
                $counter = $counter + 1;
                
                $id = $row->ID;
                $message = $row->message; 
                $senderID = $row->senderID;
                $senderName = getNameById($senderID);
                $profilbild = getProfilBild($senderID);
                
                if($senderID !== $_SESSION['id']) {
                
                echo '<div class="media">
                        <div class="media-left">
                            <img src="'. $profilbild .'" class="media-object" style="width:60px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">'. $senderName .'</h4>
                            <p>'.$message.'</p>
                        </div>
                      </div>';
                    
                } else {
                    
                  echo '<div class="media">
                          <div class="media-body">
                          <h4 class="media-heading">Du</h4>
                           <p>'.$message.'</p>
                          </div>
                          <div class="media-right">
                            <img src="'. $profilbild .'" class="media-object" style="width:60px">
                          </div>
                        </div>';

                }
                
                setHasSeen($id);
                
                if($numrows <> $counter) {
                    echo '<hr>';
                }
                
            }

        } else {
            echo "Kein Datensatz gefunden.";
        }
    
} else {
    echo "ERROR - Parameterfehler!";
}

function setHasSeen($id) {
    
  include("../connect.php");
    
  $sql = "UPDATE messages SET hasSeen = '1' WHERE ID = '" . $id . "'";
  $ergebnis = mysqli_query($conn, $sql);
    
}

function getNameById($senderID) {

 include("../connect.php");
    
 $sql = "SELECT username FROM users WHERE id = '" . $senderID . "'";
 $ergebnis = mysqli_query($conn, $sql);
 $numrows = mysqli_num_rows($ergebnis);
    
 if($numrows > 0) {
     $result = mysqli_fetch_assoc($ergebnis);
     return $result['username']; 
 } else {
     return "Fehler - Name nicht gefunden.";
 }
    
}

function getProfilBild($senderID) {
   
 include("../connect.php");
    
 $sql = "SELECT profilbild FROM users WHERE id = '" . $senderID . "'";
 $ergebnis = mysqli_query($conn, $sql);
 $numrows = mysqli_num_rows($ergebnis);
    
 if($numrows > 0) {
     $result = mysqli_fetch_assoc($ergebnis);
     return $result['profilbild']; 
 } else {
     return "Fehler - Profilbild nicht gefunden.";
 }
    
}

?>