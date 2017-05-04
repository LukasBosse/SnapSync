<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title>Location</title>
</head>
<body>
<div class="well">
<form action="http://maps.google.com/maps" method="get" target="_blank">
    <div class="form-group">
    <label for="txt">Start:</label>
    <input type="text" class="form-control" name="saddr" id="txt">
  </div>
  <div class="form-group">
    <label for="pwd">Target:</label>
    <input type="text" class="form-control" name="daddr" id="txt" value="Am Dornbusch 1, 30453 Hannover">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
    
</form>
     <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyAS71Ti4rUDGfEdxY4N_6ToTyblblemsxI '></script><div style='overflow:hidden;height:270px;width:100%;'><div id='gmap_canvas' style='height:270px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://fliegengitter-express.de/'>Fliegengitter-express.de</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=4888f056848cc5a90ee190a3f84dd1548614aee4'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(52.3871907,9.670074999999997),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(52.3871907,9.670074999999997)});infowindow = new google.maps.InfoWindow({content:'<strong>snapSync UG</strong><br>Am Dornbusch 1, App.20<br>30453 Hannover<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
    </div>
       
</body>
</html>