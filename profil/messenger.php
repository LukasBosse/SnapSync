<?php

session_start();

    if($_SESSION['login']) {
        
            include("../connect.php");
            $profil   = $_SESSION['profilbild'];
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $erstelltam = $_SESSION['createdat'];
            $vorname = $_SESSION['vorname'];
            $nachname = $_SESSION['nachname'];
            $lastlogin = $_SESSION['lastlogin'];
            $imageIndex = $_SESSION['imageIndex'];
        
    } else {
        
            header("Location: ../404.php");
        
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
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../css/messenger.css" media="all" rel="stylesheet" type="text/css" />

    <!-- JQuery / JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script src="../js/gallery.js" type="text/javascript"></script>
    <script src="../js/messenger.js" type="text/javascript"></script>

    <!-- Custom Favicon -->
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="../images/favicon.ico" type="image/x-icon" />

    <title>snapSync</title>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid" style="font-weight: bold;">
            <div class="navbar-header">
                <a class="navbar-brand" href="#head">snapSync</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="../home">Home</a></li>
                <li><a href="index.php?id=<?php echo $_SESSION['id'];?>">Profil</a></li>
                <li><a href="../orders">Aufträge</a></li>
                <li class="active"><a href="messenger.php"><div id="notificationCounter"></div></a></li>
                <li><a href="#contact">Kontakt</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $username; ?>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-content">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="<?php echo $profil; ?>" alt="Alternate Text" class="img-responsive" />
                                        <p class="text-center small">
                                            <a href="#" data-toggle='modal' data-target='#myModal'>Avatar ändern</a></p>
                                    </div>
                                    <div class="col-md-7">
                                        <span><?php echo $username; ?></span>
                                        <p class="text-muted small">
                                            <?php echo $email; ?>
                                        </p>
                                        <div class="divider">
                                        </div>
                                        <a href="#" class="btn btn-primary btn-sm active">Profile bearbeiten</a>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-footer">
                                <div class="navbar-footer-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" class="btn btn-default btn-sm">Password ändern</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="../disconnect.php" class="btn btn-default btn-sm pull-right">Abmelden</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <div class="form-group">
                    <li><input type="text" id="friendSearchBox" name="myBrowser" class="form-control friendSearch" placeholder="Suche nach Personen" role="combobox"></li>
                </div>
            </ul>
        </div>
    </nav>

    <div class="navbar navbar-inverse" id="friendSearch" style="display: none; color: white; z-index: 9999; width: 300px;">
        <div class="panel-heading" style="background-color: white; color: black;">Suchergebnisse <i class="fa fa-link fa-1x"></i></div>
        <div id='friends'>
        </div>
    </div>


    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-m-6" style="width: 400px; float: left;">
                <div class="panel panel-default">
                    <div class="panel-heading c-list">
                        <span class="title">Kontakte</span>
                        <ul class="pull-right c-controls">
                            <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Toggle Search"><i class="glyphicon glyphicon-search fa fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>

                    <div class="row" style="display: none;">
                        <div class="col-xs-12">
                            <div class="input-group c-search">
                                <input type="text" class="form-control" id="contact-list-search">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group" id="contact-list">

                        <?php
                        
                        $userdaten = mysqli_query($conn, "SELECT * FROM users WHERE id <> '" . $_SESSION['id'] . "'");
                        $numrows = mysqli_num_rows($userdaten);

                        if($numrows > 0) {                            
                            
                            while($row = mysqli_fetch_object($userdaten)) {
                            
                            $id = $row->id;
                            $profil   = $row->profilbild;    
                            $username = $row->username;
                            $mail = $row->email;
                            $hasSeen = hasMessagesSeen($id);
                                                                                            
                            echo '<a href="#" class="chatContact" style="text-decoration: none; color: black;"  title="' . $id .'"><li class="list-group-item">
                                    <div class="col-xs-12 col-sm-3">
                                        <img src="' . $profil . '" alt="Scott Stevens" class="img-responsive img-circle" />
                                    </div>
                                    <div class="col-xs-12 col-sm-6" style="vertical-align: middle !Important;">
                                      <div class="row"> </div>
                                      <div class="row"><span class="name">' . $username . '</span><br/></div>
                                      <div class="row"><span class="email">' . $mail . '</span><br/></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">';
                                
                            if($hasSeen > 0) {
                                echo '<div id="notificationIcon"><span class="glyphicon glyphicon-envelope" style="margin-top: 50%;"></span></div>';
                            }
                                
                            echo '</div>
                                  <div class="clearfix"></div>
                                  </li></a>';
                            
                            }
                            
                        }
                        
                        function hasMessagesSeen($id) {
                            include("../connect.php");
                            $abfrage = mysqli_query($conn, "SELECT ID FROM messages WHERE hasSeen = '0' AND senderID = '" . $id . "' AND recieverID = '" . $_SESSION['id'] . "'");
                            $numrow = mysqli_num_rows($abfrage);
                            return $numrow;
                        }
                        
                        ?>
                        
                    </ul>
                </div>
            </div>

            <div class="col-m-4" style="width:600px; float: left;">

                <div class="panel panel-default">
                    <div class="panel-heading c-list">
                        <span class="title">Nachrichten</span>
                    </div>
                    <div class="panel-body" id="chatLoader">
                        Bitte wählen Sie Ihren Chatpartner aus.
                    </div>
                    <div class="panel-footer">
                        <form action="postMessage.php" method="post">
                            <div class="form-inline"> 
                                <input type="text" name="message" class="form-control mb-2 mr-sm-2 mb-sm-0" style="width:86%;" placeholder="Verfasse eine Nachricht" required>
                                <input type="text" name="senderID" id="senderID" value="<?php echo $_SESSION['id']; ?>" hidden="hidden">
                                <input type="text" name="recieverID" id="recieverID" hidden="hidden">
                                <input type="submit" class="btn btn-success" value="Senden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    
<div id="messageAlert" class="alert alert-success" style="position: absolute; bottom: 0; right: 0; display: none;">
    <strong>Hurra!</strong> Du hast neue Nachricht erhalten.
</div>

    <! -- JQuery / AJAX -->

    <script src="../js/searchbox.js" type="text/javascript"></script>
    <script src="../js/chatbycontact.js" type="text/javascript"></script>
    <script src="../js/load-notification.js" type="text/javascript"></script>
    
</body>

</html>