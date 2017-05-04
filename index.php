<?php
session_start();
if(isset($_SESSION['login'])) {
    if($_SESSION['login']) {
        header("Location: home");
    }
}
?>
<html lang="de">
<title>snapSync</title>
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="SnapSync UG" />
<meta name="description" content="Die Nerds Ihres Vertrauens.." />
    
<!-- Responsive -->
<meta name="viewport" content="width=devide-width, initial-scale=1.0" />

<!-- Bootstrap CSS -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    
<!-- Custom Styles -->
<link rel="stylesheet" href="css/main.css">
    
<!-- Custom Favicon -->
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="images/favicon.ico" type="image/x-icon" />

<!-- Fonts -->
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />    
    
<!-- JQuery / JS -->
<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    
<script type="text/javascript" src="js/scrolltoanchor.js"></script>
<script type="text/javascript" src="js/tabbed.js"></script>
<script type="text/javascript" src="js/hoverBox.js"></script>
<script type="text/javascript" src="js/complexify.js"></script>
        
</head>
<body>
    
    <!-- Header -->
    <div id="head"></div>
    <!-- Navi -->
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" style="font-weight: bold;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#head" onclick="verifyLink('home');">snapSync</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" id="a_home"><a href="#head" onclick="verifyLink('home');">Home</a></li>
      <li id="a_about"><a href="#about" onclick="verifyLink('about');">About</a></li>
      <li class="dropdown" id="services">
        <a class="dropdown-toggle" id="a_services" onclick="verifyLink('services);" data-toggle="dropdown">Services
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#services" onclick="verifyLink('services');"><span><img src="images/entwicklung.png" class="menuIcons"> </span> Webdesign</a></li>
          <li><a href="#services" onclick="verifyLink('services');"><span><img src="images/windows.png" class="menuIcons"> </span> Windows</a></li>
          <li><a href="#services" onclick="verifyLink('services');"><span><img src="images/android.png" class="menuIcons"> </span> Android</a></li>
          <li><a href="#services" onclick="verifyLink('services');"><span><img src="images/office.png" class="menuIcons"> </span> MS Office</a></li>
        </ul>
      </li>
      <li id="a_portfolio"><a href="#portfolio" onclick="verifyLink('portfolio');">Portfolio</a></li>
      <li id="a_loc"><a href="#location" onclick="verifyLink('loc');">Location</a></li>
      <li id="a_contact"><a href="#contact" onclick="verifyLink('contact');">Contact</a></li>
    </ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
  </div>
</nav>
    
<?php
  if(isset($_GET['reg'])) {
    echo '<div class="alert alert-success alert-dismissible" style="position: fixed; top: 100px; width: 100%; opacity: 100;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Erfolg!</strong> Ihre Registrierung war erfolgreich.</div>';
  }  
?>
    
    <!-- Content -->
    
<div class="container" style="margin-top:100px">
  <div class="jumbotron header_main headblock">
    <h1 class="textHeadBlock">snapSync</h1>
      <blockquote>
    <p class="textHeadBlock">...what ever you want!</p>
        </blockquote>
  </div>
    
 <?php
    
    if(isset($_GET['reg'])) {
        echo '<div class="alert alert-success alert-dismissible" style="display: block; margin-top: 0;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Registrierung erfolgreich!</strong> Sie können Sich nun einloggen.
              </div>';
    } else if(isset($_GET['logout'])) {
         echo '<div class="alert alert-success alert-dismissible" style="display: block; margin-top: 0;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Abmeldung erfolgreich!</strong> Kommen Sie bald wieder.
              </div>';
    }
    ?>
    
    <!-- Content -->
    
    <!-- About us-->
    
  <div class="panel panel-default contentBlock">
      <div class="panel-heading borderBlock" id="about"><b>About us</b></div>
  <div class="panel-body">
      
      <center>
      
      <div class="row">
    <div class="col-sm-3">
        <h2><b>snapSync</b></h2>
      <p style="text-align: center;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At</p>
    </div>
     
    <div class="col-sm-3">
     <img src="images/profile-placeholder.png" class="img-thumbnail" alt="Lukas Bosse" width="200" height="100">
     <h2><b>Lukas Bosse (CEO)</b></h2>
      B.Sc. Wirtschaftsinformatik
    </div>
    
    <div class="col-sm-3">
    <img src="images/profile-placeholder.png" class="img-thumbnail" alt="Hendrik Schulze" width="200" height="100">
      <h2><b>Hendrik Schulze (CEO)</b></h2>
      B.Sc. Informatik
    </div>
          
    <div class="col-sm-3">
      <img src="images/profile-placeholder.png" class="img-thumbnail" style="width: 200px; height: 200px;"> 
        <h2><b>Thomas Turtle (Mascot)</b></h2>
      Lorem Ipsum...
    </div>           

      </div>
      </center>
      </div>
</div>
    
    <!-- Services -->
    
      <div class="panel panel-default contentBlock">
          <div class="panel-heading borderBlock" id="services"><b>Services</b></div>
         <div class="panel-body" style="height: 200px; text-align: center;"> 
    <div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>Webdesign</p>
        <center>
            <img src="images/entwicklung.png" class="img-responsive" style="width:125px; height: 125px; filter:drop-shadow(8px 8px 10px black);" alt="Image">
        </center>
    </div>
    <div class="col-sm-3"> 
      <p>Windows</p>
        <center>
            <img src="images/windows.png" class="img-responsive" style="width:125px; height: 125px; filter:drop-shadow(8px 8px 10px black);" alt="Image">
        </center>
    </div>
    <div class="col-sm-3"> 
      <p>Android</p>
        <center>
            <img src="images/android.png" class="img-responsive" style="width:125px; height: 125px; filter:drop-shadow(8px 8px 10px black);" alt="Image">
        </center>
    </div>
    <div class="col-sm-3">
      <p>MS Office</p>
        <center>
            <img src="images/office.png" class="img-responsive" style="width:125px; height: 125px; filter:drop-shadow(8px 8px 10px black);" alt="Image">
        </center>
    </div>
  </div>
             </div>
         </div>
</div><br>
    
    <!-- Portfolio -->
    
     <div class="panel panel-default contentBlock">
         <div class="panel-heading borderBlock" id="portfolio"><b>Portfolio</b></div>
         <div class="panel-body" style="height: 200px; text-align: center;"> 
    <div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
        <p><kbd>Energy World</kbd></p>
      <img onMouseOver="Box2Anzeigen(1)" onMouseOut="Box2Ausblenden()" src="images/energyworld.png" class="img-responsive" style="width:100%; filter:drop-shadow(8px 8px 10px black);" alt="Image">
    </div>
    <div class="col-sm-3"> 
        <p><kbd>StudentCal</kbd></p>
      <img onMouseOver="Box2Anzeigen(2)" onMouseOut="Box2Ausblenden()" src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%; filter:drop-shadow(8px 8px 10px black);" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p><kbd>Launching Toast</kbd></p>
        <a href=""><img onMouseOver="Box2Anzeigen(3)" onMouseOut="Box2Ausblenden()" src="images/launchingtoast.png" class="img-responsive" style="filter:drop-shadow(8px 8px 10px black); width:100%; height: 130px;" alt="Image"></a>
    </div>
    <div class="col-sm-3">
        <p><kbd>Wirtschaftsinformatik Tutorials</kbd></p>
      <img onMouseOver="Box2Anzeigen(4)" onMouseOut="Box2Ausblenden()" src="images/winfo.PNG" class="img-responsive" style="width:100%; height: 130px; filter:drop-shadow(8px 8px 10px black);" alt="Image">
    </div>
  </div>
    </div>
     </div>
</div><br>
    
<div id="InfoBox2" style="height:140px;"></div>
    
    <!-- Location -->
    
     <div class="panel panel-default contentBlock">
        <div class="panel-heading borderBlock" id="location"><b>Location</b></div>
         <div class="panel-body" style="padding: 0 !important;">   
            <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyAS71Ti4rUDGfEdxY4N_6ToTyblblemsxI '></script><div style='overflow:hidden;height:370px;width:100%;color:black;'><div id='gmap_canvas' style='height:370px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(52.3871907,9.670074999999997),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(52.3871907,9.670074999999997)});infowindow = new google.maps.InfoWindow({content:'<strong>snapSync UG</strong><br>Am Dornbusch 1, App.20<br>30453 Hannover<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
         </div>
    </div>
    
    <!-- Contact -->
    
    <div class="panel panel-default contentBlock">
        <div class="panel-heading borderBlock" id="contact"><b>Contact</b></div>
         <div class="panel-body">   
      <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="contact">
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
    
    <div class="panel panel-default contentBlock">
         <div class="panel-body" style="text-align: center;"> 
             <span class="glyphicon glyphicon-envelope"> <a href="#" style="text-decoration:none; color: white;">Contact</a></span>
             <span>|&nbsp;</span>
             <span class="glyphicon glyphicon-map-marker"> <a href="location.php" style="text-decoration:none; color: white;" target="popup-beispiel" onClick="javascript:open('', 'popup-beispiel', 'height=400,width=400,resizable=no')">Location</a></span>
             <span>|&nbsp;</span>
             <span class="glyphicon glyphicon-info-sign"> <a href="impressum.htm" style="text-decoration:none; color: white;" target="popup-beispiel" onClick="javascript:open('', 'popup-beispiel', 'height=400,width=400,resizable=no')">Impressum</a></span>
        </div>
    </div>
    
</div>
    
    <! -- Login Modal -->
        
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      
             
      <div id="login" class="w3-container w3-display-container city">
      
        <!-- Login Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #337AB7; color: white;">
            <button type="button" class="close" style="color: white;" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login</h4>
          </div>
          <div class="modal-body">
             <form method="POST" action="login.php" name="login">
                <div class="form-group">
                   <label for="email">Email address:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input type="email" name="signin_email" class="form-control" id="email" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                    <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="pwd" name="signin_passwort" class="form-control" type="password" required>
                 </div>
                    </div>
                 <div class="form-group">
                  <label><a href="#" onclick="openCity('help')">Passwort vergessen</a> |</label>
                  <label><a href="#" onclick="openCity('reg')">Noch kein Kunde?</a></label>
                 </div>
                <div class="button">
                  <button type="submit" name="login" class="btn btn-default">Login</button>
                </div>
              </form>
          </div>
        </div>
          
      </div>
            
        <!-- Reg Modal content-->
      <div id="reg" class="w3-container w3-display-container city" style="display: none;">
      
        <div class="modal-content">
          <div class="modal-header" style="background-color: #337AB7; color: white;">
            <button type="button" class="close" style="color: white;" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Registrierung</h4>
          </div>
          <div class="modal-body">
             <form method="POST" action="registrierung.php" id="contact_form" name="reg">
                 <div class="form-group">
                      <div class="controls">
                   <label for="vorname">Vorname:</label>
                          <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input type="text" name="signup_vorname" class="form-control" id="vorname" data-validation="custom" data-validation-regexp="^([a-zA-Z\s]{3,})$" required>
                     </div>
                          </div>
                </div>
                 <div class="form-group">
                   <label for="nachname">Nachname:</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input type="text" name="signup_nachname" class="form-control" id="nachname" data-validation="custom" data-validation-regexp="^([a-zA-Z\s]{3,})$" required>
                </div>
                 </div>
                <div class="form-group">
                   <label for="email">Email address:</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                   <input type="email" name="signup_email" class="form-control" id="email" data-validation="email" data-validation="required" required>
                </div>
              </div>
                <div class="form-group">
                  <label for="passwordsignup">Password:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				   <input id="passwordsignup" data-minlength="6" type="password" name="signup_passwort" class="form-control" data-type="password" required>
                 </div>
                    <div class="help-block">Minimum of 6 characters</div>
            </div>
                 <div class="form-group">
                    <div class="progress">
                        <div id="complexity-bar" class="progress-bar" role="progressbar">
                            <span class="complexity-value">Ihr Passwort ist zu 0% sicher!</span>
                        </div>
                    </div>
                 </div>
                 <div class="form-group">
                  <label><a href="#" onclick="openCity('login')">Zum Login</a> |</label>
                  <label><a href="#" onclick="openCity('help')">Passwort vergessen</a></label>
                 </div>
                <div class="button">
                  <button type="submit" name="reg" class="btn btn-default">Registrieren</button>
                </div>
              </form>
            </div>
            
            </div>
                
            </div>

          
    <!-- Forgot Modal content-->
          
         
    <div id="help" class="w3-container w3-display-container city" style="display: none;">
      
        <div class="modal-content">
          <div class="modal-header" style="background-color: #337AB7; color: white;">
            <button type="button" class="close" style="color: white;" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Passwort vergessen</h4>
          </div>
          <div class="modal-body">
             <form method="POST" action="forgotten.php" name="help">
                <div class="form-group">
                   <label for="email">Email address:</label>
                   <input type="email" name="email" class="form-control" id="email" required>
                </div>
                 <div class="form-group">
                  <label><a href="#" onclick="openCity('login')">Zum Login</a> |</label>
                  <label><a href="#" onclick="openCity('reg')">Noch kein Kunde?</a></label>
                 </div>
                <div class="button">
                  <button type="submit" name="help" class="btn btn-default">Absenden</button>
                </div>
              </form>
        </div>
            
            </div>
          
          </div>
</div>
    </div>
    
<script type="text/javascript">
  (function($) {

	$('#passwordsignup').complexify({}, function (valid, complexity) {
		var progressBar = $('#complexity-bar');

		progressBar.toggleClass('progress-bar-success', valid);
		progressBar.toggleClass('progress-bar-danger', !valid);
		progressBar.css({'width': complexity + '%'});

		$('.complexity-value').text(Math.round(complexity) + '%');
	});

})(jQuery);
    
</script>
   
<script type="text/javascript" src="js/linkverification.js"></script>
    
</body>
</html>