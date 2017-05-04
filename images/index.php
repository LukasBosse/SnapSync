<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=snapsoft', 'snapsoft', 'softsnap');
 
if(isset($_GET['login'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	
	$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	$result = $statement->execute(array('email' => $email));
	$user = $statement->fetch();
		
	//Überprüfung des Passworts
	if ($user !== false && password_verify($passwort, $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];
		die("<p>Die Anmeldung war erfolgreich. Sie werden in <span id='counter'>10</span> Sekunden weitergeleitet.</p>
<script type='text/javascript'>
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'admin/index.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
    
}
setInterval(function(){ countdown(); },1000);
</script><p>Wenn Sie nicht warten m&ouml;chten, klicken Sie <a href='admin/index.php'>hier</a>.</p>");
	} else {
		$errorMessage = "E-Mail oder Passwort war ungültig<br>";
	}
	
}

if(isset($_GET['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "lukasbosse95@gmail.com";
 
    $email_subject = "Kontaktaufnahme: " . $_POST['name'];
 
   function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
  
    $name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required
 
    $comments = $_POST['comments']; // required
    
    $email_message = "Sie haben eine neue Benachrichtigung von " . $name . " (" . $email_from . "):\n\n\n" . $comments;
 
$mail = mail($email_to, $email_subject, $email_message,$email_from);
if($mail) {
  echo '<div class="alert alert-success alert-dismissible" style="position: fixed; top: 50px; width: 100%; opacity: 100;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Your contact message was sended successfull.</div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible" style="position: fixed; top: 50px; width: 100%; opacity: 100;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> Your contact message was not sended.</div>';
}   
        }
?>
<html>
<head>
<style>
html, body {
    background-image: url('http://alex-hache.de/en/images/bg_aha.jpg');
 
}
    
#InfoBox2 {
position:absolute;
visibility:visible;
left:-1000px;
top:-2000px;
z-index:+2;
background:url(images/android.png) #ECF5FE bottom right no-repeat;
width:500px;
padding:0px 0px 0px 0px;
margin:0px;
border:5px solid #CCCCDD;
font-family:Verdana,Arial,Helvetica,sans-serif;
font-size:11px;
line-height:130%;
color:#5F5F5F;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/scrolltoanchor.js"></script>
<title>snapSync</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
        
</script>
<script type="text/javascript" language="JavaScript">
function showObject() {
document.getElementById('n1').style.visibility = "visible";
document.getElementById('n1').style.left = e.clientX;
docume.getElementById('n1').style.top = e.clientY;
}
</script>




</head>
<body>
    
    <!-- Header -->
    <div id="head"></div>
    <!-- Navi -->
    
    <nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#head">snapSync</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#head">Home</a></li>
      <li><a href="#about">About</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown">Services
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#services"><span><img src="images/webdesign.png" style="height: 30px; width: 50px;"> </span>Webdesign</a></li>
          <li><a href="#services"><span><img src="images/microsoft.png" style="height: 30px; width: 50px;"> </span>Windows</a></li>
          <li><a href="#services"><span><img src="images/android.png" style="height: 30px; width: 50px;"> </span>Android</a></li>
          <li><a href="#services"><span><img src="images/office.png" style="height: 30px; width: 50px;"> </span>MS Office</a></li>
        </ul>
      </li>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#location">Location</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
  </div>
</nav>
    
    <!-- Content -->
    
<div class="container">
  <div class="jumbotron header_main">
    <h1>snapSync</h1>
      <blockquote>
    <p>...what ever you want!</p>
        </blockquote>
  </div>
    
    <!-- Content -->
    
    <!-- About us-->
    
  <div class="panel panel-default">
      <div class="panel-heading" id="about"><b>About us</b></div>
  <div class="panel-body">
      
      <center>
      
      <div class="row">
    <div class="col-sm-3">
        <h2><b>snapSync</b></h2>
      <p style="text-align: center;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At</p>
    </div>
     
    <div class="col-sm-3">
     <img src="http://safariandmd.com/wp-content/uploads/2016/10/No-image-found.jpg" class="img-thumbnail" alt="Cinque Terre" width="200" height="100">
     <h2><b>Lukas Bosse (CEO)</b></h2>
      Lorem Ipsum...
    </div>
    
    <div class="col-sm-3">
    <img src="images/hendi.png" class="img-thumbnail" alt="Cinque Terre" width="200" height="100">
      <h2><b>Hendrik Schulze (CEO)</b></h2>
      Lorem Ipsum...
    </div>
          
    <div class="col-sm-3">
      <img src="images/Icon_t.PNG" style="width: 200px; height: 200px;"> 
        <h2><b>Thomas Turtle (Mascot)</b></h2>
      Lorem Ipsum...
    </div>
           
          
      </div>
      </center>
      </div>
</div>
    
    <!-- Services -->
    
      <div class="panel panel-default">
          <div class="panel-heading" id="services"><b>Services</b></div>
         <div class="panel-body" style="height: 200px; text-align: center;"> 
    <div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>Webdesign</p>
      <img src="images/webdesign.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Windows</p>
      <img src="images/microsoft.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Android</p>
      <img src="images/android.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>MS Office</p>
      <img src="images/office.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
             </div>
         </div>
</div><br>
    
    <!-- Portfolio -->
    
     <div class="panel panel-default">
         <div class="panel-heading" id="portfolio"><b>Portfolio</b></div>
         <div class="panel-body" style="height: 200px; text-align: center;"> 
    <div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>Some text..</p>
      <img onMouseOver="javascript:showObject();" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Some text..</p>
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
             </div>
         </div>
</div><br>
    <div id="n1" style="visibility:hidden;">Text</div>
    <!-- Location -->
    
     <div class="panel panel-default">
        <div class="panel-heading" id="location"><b>Location</b></div>
         <div class="panel-body">   
            <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyAS71Ti4rUDGfEdxY4N_6ToTyblblemsxI '></script><div style='overflow:hidden;height:370px;width:100%;'><div id='gmap_canvas' style='height:370px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://fliegengitter-express.de/'>Fliegengitter-express.de</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=4888f056848cc5a90ee190a3f84dd1548614aee4'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(52.3871907,9.670074999999997),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(52.3871907,9.670074999999997)});infowindow = new google.maps.InfoWindow({content:'<strong>snapSync UG</strong><br>Am Dornbusch 1, App.20<br>30453 Hannover<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
         </div>
        </div>
    
    <!-- Contact -->
    
    <div class="panel panel-default">
        <div class="panel-heading" id="contact"><b>Contact</b></div>
         <div class="panel-body">   
      <form class="form-horizontal" role="form" method="POST" action="?email=1">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Message</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="comments"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
		</div>
	</div>
</form>
        </div>
    </div>
    <!-- Footer -->
    
    <div class="panel panel-default">
         <div class="panel-body" style="text-align: center;"> 
             <span class="glyphicon glyphicon-envelope"> <a href="#" style="text-decoration:none; color: black;">Contact</a></span>
             <span>|</span>
             <span class="glyphicon glyphicon-map-marker"> Location</span>
             <span>|</span>
             <span class="glyphicon glyphicon-info-sign"> <a href="impressum.htm" style="text-decoration:none; color: black;" target="popup-beispiel" onClick="javascript:open('', 'popup-beispiel', 'height=400,width=400,resizable=no')">Impressum</a></span>
        </div>
    </div>
    
</div>
    
    <! -- Login Modal -->
    
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4f5c70; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
         <form method="POST" action="?login=1">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="passwort" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
      </div>
      <div class="modal-footer" style="background-color: #4f5c70;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    
</body>
</html>