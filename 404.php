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
<link rel="stylesheet" href="css/intern.css">
<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    
<!-- JQuery / JS -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/fileinput.js" type="text/javascript"></script>

<!-- Custom Favicon -->
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="images/favicon.ico" type="image/x-icon" />
    
<title>snapSync - 404</title>
    
</head>
<body>
 <!-- Header -->
    <div id="head"></div>
    <!-- Navi -->
    
    <nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid" style="font-weight: bold;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#head">snapSync</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../home">Home</a></li>
      <li class="active"><a href="index.php?id=<?php echo $_SESSION['id'];?>">Profil</a></li>
      <li><a href="../orders">Aufträge</a></li>
      <li><a href="#portfolio">Nachrichten</a></li>
      <li><a href="#contact">Kontakt</a></li>
    </ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="../disconnect.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="form-group">
          <li><input type="text" id="friendSearchBox" name="myBrowser" class="form-control friendSearch" placeholder="Suche nach Personen" role="combobox"></li>
        </div>
      </ul>
  </div>
</nav>
    
<div class="navbar navbar-inverse" id="friendSearch" style="display: none; position: absolute; top: 50px; left: 80%; color: white; z-index: 9999; width: 250px;">
<div class="panel-heading" style="background-color: white; color: black;">Suchergebnisse <i class="fa fa-link fa-1x"></i></div>
<div id='friends'>
</div>
</div>
    
 <div class="jumbotron text-center" style="position: relative; top: 150px !important;">
  <h1>- 404 -</h1>
  <p>Die Seite, die Person, der Ort oder das Event konnte nicht gefunden werden.</p>
     <p><kbd>Bitte versuchen Sie es erneut.</kbd></p>
</div>   
    
<! -- JQuery / AJAX -->
    
<script src="js/searchbox.js" type="text/javascript"></script>
    
</body>
</html>