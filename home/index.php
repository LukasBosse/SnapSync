<?php
session_start();
if($_SESSION['login'] == false) {
    header("Location: ../index.php");
} else {
    $id = $_SESSION['id'];
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
    
<!-- JQuery / JS -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom Favicon -->
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="images/favicon.ico" type="image/x-icon" />
    
<title>snapSync</title>
    
</head>
<body>

    <!-- Navi -->
    
    <nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid" style="font-weight: bold;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#head">snapSync</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="../profil/index.php?id=<?php echo $id; ?>">Profil</a></li>
      <li><a href="../orders">Aufträge</a></li>
      <li><a href="../profil/messenger.php"><div id="notificationCounter"></div></a></li>
      <li><a href="#contact">Kontakt</a></li>
    </ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="../disconnect.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
  </div>
</nav>
    
<!-- JQUERY / AXAJ -->
    
<script src="../js/load-notification.js" type="text/javascript"></script>

    
</body>
</html>
