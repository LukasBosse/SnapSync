<?php

include("connect.php");

if(isset($_GET['q'])) {
    
    $id = $_GET['q'];
    $sql = "SELECT * FROM postings WHERE ID = '" . $id . "'";
    
    $ergebnis = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($ergebnis);
    
    if($numrows > 0) {
      $result = mysqli_fetch_assoc($ergebnis);
      
      $username = getUserById($result['senderID']);
      $pic = getPicById($result['senderID']);
      $message = $result['message'];
      $stamp = $result['stamp'];
        
      echo '<form action="sendPost.php">
                <div class="form-group">
                  <textarea class="form-control" rows="5" id="comment" placeholder="Dein Kommentar"></textarea></div>';
      echo '<li class="list-group-item">
                <div class="panel-body"><div class="media">
                      <div class="media-left">
                          <img src="' . $pic . '" class="media-object" style="width:60px">
                      </div>
                      <div class="media-body">
                          <h4 class="media-heading">' . $username . '<span class="pull-right"></span></h4>
                          <p>' . $message . '</p>
                      </div>
                </div>';
    
    } else {
      echo "Fehler - Kein Match.";
    }
    
} else {
    echo "Error - Parameterfehler";
}

function getPicById($senderID) {
    
   include("connect.php");
   $sql = "SELECT profilbild FROM users WHERE id = '" . $senderID . "'";
   $ergebnis = mysqli_query($conn, $sql);
   $numrows = mysqli_num_rows($ergebnis);
    
   if($numrows > 0) {
       $result = mysqli_fetch_assoc($ergebnis);
       return $result['profilbild'];
   } else {
       return "Fehler - keine Übereinstimmung.";
   }
    
}

function getUserById($senderID) {
    
   include("connect.php");
   $sql = "SELECT username FROM users WHERE id = '" . $senderID . "'";
   $ergebnis = mysqli_query($conn, $sql);
   $numrows = mysqli_num_rows($ergebnis);
    
   if($numrows > 0) {
       $result = mysqli_fetch_assoc($ergebnis);
       return $result['username'];
   } else {
       return "Fehler - keine Übereinstimmung.";
   }
    
}

?>