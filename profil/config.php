<?php
session_start();

include_once("../connect.php");

if($_SESSION['login'] == false) {
    header("Location: ../index.php");
}

?>
<html>
<head>
<!-- Meta Data -->
    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="SnapSync UG" />
<meta name="description" content="Die Nerds Ihres Vertrauens.." />
    
<!-- Responsive -->
    
<meta name="viewport" content="width=devide-width, initial-scale=1.0" />

<!-- Bootstrap / CSS -->
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/intern.css">
<link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    
<!-- JQuery / JS -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/fileinput.js" type="text/javascript"></script>
<script src="../js/gallery.js" type="text/javascript"></script>

<!-- Custom Favicon -->
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="../images/favicon.ico" type="image/x-icon" />
    
<title>snapSync</title>
    
</head>
<body>
</body>
</html>