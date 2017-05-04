<?php
    
session_start();
include("../connect.php");
    
$user = $_GET['q'];
$sql = "SELECT id, profilbild, vorname, nachname, email FROM users WHERE username LIKE '$user%'";

$ergebnis = mysqli_query($conn, $sql);
$result = "";

$numrows = mysqli_num_rows($ergebnis);
$counter = 0;

if($numrows > 0) {

    while($row = mysqli_fetch_object($ergebnis)) {
        
        $counter = $counter + 1;

        $name = $row->vorname . ' ' . $row->nachname;
        $profil = $row->profilbild;
        $id = $row->id;
        $email = $row->email;

        if($id !== $_SESSION['id']) {

            echo '<a href="index.php?id='.$id.'" style="text-decoration: none; color: white;">';
 
            echo '<div class="panel-body friendBoxLink">';
                        
            echo '<div class="col-sm-4"><img src="'.$profil.'" width="35px" height="35px"></div><div class="col-sm-8" style="font-weight: bold;">'. $name .'<br>' . $email .'</div></div></a>';

        } else {
            
            echo '<a href="index.php?id='.$id.'" style="text-decoration: none; color: white;">';
            
            if($counter == $numrows) {
            
                echo '<div class="panel-body friendBoxLink">';
                
            } else {
                
                echo '<div class="panel-body friendBoxLink" style="border-bottom: 1px solid;">';

                
            }
            
            echo '<div class="col-sm-4"><img src="'.$profil.'" width="35px" height="35px"></div><div class="col-sm-8" style="font-weight: bold;">Du<br>' . $email .'<br></div></div></a>';
        }    
    }
        
} else {

   echo '<div class="panel-body friendBoxLink">Es konnten keine Daten gefunden werden.</div>';  

}

?>