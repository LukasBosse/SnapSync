<?php

include("connect.php");

if(isset($_POST['help'])) {
    
    $email = $_POST['email'];
    
      // Prepared Statements zum Verhindern von SQL-Injektionen
    if($stmt = $conn->prepare("SELECT id FROM users WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        // Holt Variablen vom result
        $stmt->bind_result($idUsers);
        $stmt->fetch();

        // Bereits vorhandener Nutzer
        if($stmt->num_rows == 0) {
            return false;
        } else {
            
        $passwort = md5(generateRandomString());   
        
            if(mysqli_query($conn,"UPDATE users SET password = '" . $passwort . "'")) {
                header("Location: SnapSync");
            }
            
            
        }
    
}
    
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>