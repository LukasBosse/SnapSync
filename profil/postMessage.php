<?php

session_start();
include("../connect.php");

if(isset($_POST['senderID']) && isset($_POST['recieverID']) && isset($_POST['message'])) {

$senderID = $_POST['senderID'];
$recieverID = $_POST['recieverID'];
$message = mysqli_escape_string($conn, $_POST['message']);
$timestamp = date('Y-m-d h:i:s', time());
    
$sql = "INSERT INTO messages (recieverID, senderID, message, posting) VALUES ('" . $recieverID . "', '" . $senderID . "', '" . $message . "', '" . $timestamp . "')";

if ($conn->query($sql) === TRUE) {
    echo "<script> window.location.replace('messenger.php') </script>";
} else {
    echo $conn->error;
} 

}

?>