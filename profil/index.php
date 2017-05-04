<?php
session_start();

include_once("../connect.php");

if($_SESSION['login'] == false) {
    header("Location: ../index.php");
} else {
    
    if(isset($_GET['id'])) {
        
        if($_GET['id'] == $_SESSION['id']) {
            
            $profil   = $_SESSION['profilbild'];
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $erstelltam = $_SESSION['createdat'];
            $vorname = $_SESSION['vorname'];
            $nachname = $_SESSION['nachname'];
            $lastlogin = $_SESSION['lastlogin'];
            $imageIndex = $_SESSION['imageIndex']; 
            
        } else {
            
            $userdaten = mysqli_query($conn, "SELECT * FROM users WHERE id = '" . $_GET['id'] . "'");
            $result = mysqli_fetch_assoc($userdaten);
            $numrows = mysqli_num_rows($userdaten);
                
            if($numrows > 0) {
            
            $profil   = $result['profilbild'];
            $username = $result['username'];
            $email = $result['email'];
            $erstelltam = $result['created_at'];
            $vorname = $result['vorname'];
            $nachname = $result['nachname'];
            $lastlogin = $result['last_login'];
            $imageIndex = $result['imagetype']; 
                
            } else {
                header("Location: ../404.php");
            }
            
        }
        
    } else {
        header("Location: ../404.php");
    }
    
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
        <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />

        <!-- JQuery / JS -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/fileinput.js" type="text/javascript"></script>
        <script src="../js/gallery.js" type="text/javascript"></script>

        <!-- Custom Favicon -->
        <link rel="icon" href="../images/favicon.ico">
        <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="../images/favicon.ico" type="image/x-icon" />

        <title>snapSync</title>

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
                    <li>
                        <a href="messenger.php">
                            <div id="notificationCounter"></div>
                        </a>
                    </li>
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

        <div class="navbar navbar-inverse" id="friendSearch" style="display: none; color: white; z-index: 9999;  width: 300px;">
            <div class="panel-heading" style="background-color: white; color: black;">Suchergebnisse <i class="fa fa-link fa-1x"></i></div>
            <div id='friends'>
            </div>
        </div>

        <!-- Profil Content -->

        <div class="container target">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="" style="color: white;">
                        <?php echo $username; ?>
                    </h1>

                    <button type="button" class="btn btn-success">Folgen</button>
                    <button data-toggle="modal" data-target="#messengerModal" type="button" class="btn btn-info">Nachricht senden</button>
                    <br>
                </div>
                <div class="col-sm-2">
                    <?php  
        if($_GET['id'] == $_SESSION['id']) {
            echo '<a href="#" data-toggle="modal" data-target="#myModal" class="pull-right">';
        } 
            echo '<img title="profile image" class="img-circle img-responsive changeImage" src= "' .$profil .'">';  
            echo '</a></div>'; 
      ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <!--left col-->
                        <ul class="list-group">
                            <li class="list-group-item text-muted" contenteditable="false">Profil</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Vorname</strong></span>
                                <?php echo $vorname; ?>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Nachname</strong></span>
                                <?php echo $nachname; ?>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Beigetreten am</strong></span>
                                <?php echo date('d.m.Y',strtotime($erstelltam)); ?>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Letzte Anmeldung</strong></span>
                                <?php echo date('d.m.Y',strtotime($lastlogin));?>
                            </li>
                        </ul>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $vorname; if(substr($vorname, -1) != "s") { echo "'s"; } ?> Motto</div>
                            <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i> Yes, I am insured and bonded.

                            </div>
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item text-muted">Aktivitäten <i class="fa fa-dashboard fa-1x"></i></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Shares</strong></span> 125</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> 13</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Posts</strong></span> 37</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Followers</strong></span> 78</li>
                        </ul>

                    </div>
                    <!--/col-3-->
                    <div class="col-sm-6" style="" contenteditable="false">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $vorname; if(substr($vorname, -1) != "s") { echo "'s"; } ?> Kommentare</div>
                            <ul class="list-group">

                                <?php
                  
                    $ergebnis = mysqli_query($conn, "SELECT * FROM postings WHERE senderID = '" . $_GET['id'] . "'");
                    $num_rows = mysqli_num_rows($ergebnis);
                        
                    if($num_rows > 0) {
                                                
                        while($row = mysqli_fetch_object($ergebnis)) {
                        
                        $userdaten = mysqli_query($conn, "SELECT username, profilbild FROM users WHERE id = '" . $row->senderID . "'");
                        $result = mysqli_fetch_assoc($userdaten);
                        
                        $pic = $result['profilbild'];
                        $sender = $result['username'];
                        $message = $row->message;
                        $stamp = $row->stamp;
                            
                        $postid = $row->ID;
                                                
                        echo '<li class="list-group-item"><div class="panel-body"><div class="media">
                              <div class="media-left">
                              <img src="' . $pic . '" class="media-object" style="width:60px">
                              </div>
                              <div class="media-body">
                              <h4 class="media-heading">' . $sender . '<span class="pull-right">';
                        
                        if($_SESSION['id'] == $_GET['id']) {
                            echo '<form action="deletePost.php" methode="GET"><input type="hidden" name="id" value="'.$postid.'"><button type="submit" class="close">&times;</button></form>';
                        } 
             
                        echo '</span></h4>
                              <p>' . $message . '</p>
                               </div>
                              </div><div class="post-footer">
                           <hr>
                           <div class="post-footer-option container">
                                <ul class="list-unstyled">
                                    <li><a href="likePost.php?postID='. $postid .'&url='.$_GET['id'].'" data-toggle="tooltip" title='. $row->likes .'><i class="glyphicon glyphicon-thumbs-up"></i> '. $row->likes .'</a></li>
                                    <li><a href="#" id="test" title='.$postid.'><i class="glyphicon glyphicon-retweet"></i> '. $row->comment .'</a></li>
                                    <li><div class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-share-alt"></i> '. $row->shares .'</a></button>
                                    <ul class="dropdown-menu">
                                        <li style="width: 100%; padding-bottom: 0;"><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"> Facebook</i></a></li>
                                        <li style="width: 100%; padding-bottom: 0;"><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"> Twitter</i></a></li>
                                        <li style="width: 100%; padding-bottom: 0;"><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"> Google+</i></a></li>
                                   </ul>
                         </div></li>
                                </ul>
                            </div></div></div></li>';
                        
                    }
                        
                    } else {
                        echo '<li class="list-group-item"><div class="panel-body">Hier ist noch nichts los.</div></li>';
                    }
                    
                ?>

                            </ul>
                        </div>

                        <?php
            
                if($_GET['id'] == $_SESSION['id']) {
                    echo '<form action="../posting.php" method="post">
                        <div class="form-group">
                        <label for="comment" style="color: white;">Nachricht:</label>
                        <textarea class="form-control" name="posting" rows="5" id="posting" placeholder="Was machst Du gerade?" maxlength="200" required></textarea>
                        </div>
                        <div class="modal-footer">
                        <h6 class="pull-left" id="count_message" style="color: white;"></h6>
                        <button type="submit" class="btn btn-success">Senden</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                        </div>
                        </form>';
                }
            
            ?>

                    </div>

                    <div class="col-sm-3">
                        <div class="panel panel-default target">
                            <div class="panel-heading" contenteditable="false">
                                <?php echo $vorname; if(substr($vorname, -1) != "s") { echo "'s"; } ?> Fotos</div>
                            <div class="panel-body" style="margin: 0;">
                                <div class="row" style="margin: 0;">

                                    <?php
                        
                            $sql = "SELECT title, src FROM gallery WHERE userID = '" . $_GET['id'] . "' LIMIT 3";
                            $ergebnis = mysqli_query($conn, $sql);
                            $numrows = mysqli_num_rows($ergebnis);

                            if($numrows > 0) {

                                while($row = mysqli_fetch_object($ergebnis)) {
                                    $title = $row->title;
                                    $src = $row->src;
                                    echo "<div class='col-m-6'><a title='" . $title. "' href='#'><img class='thumbnail img-responsive' src='" . $src . "'></a></div>";
                                }
                                
                            } else {
                                  echo "<div class='col-m-6'><a title='Image 1' href='#'><img class='thumbnail img-responsive' src='//placehold.it/600x350'></a></div>";
                            }
                      
                        ?>

                                </div>
                                <?php
                        if($_GET['id'] == $_SESSION['id']) {
                            echo "<a href='#' data-toggle='modal' data-target='#imageModal'><div class='btn btn-primary' style='width: 100%; margin-top: 5px; margin-bottom: -5px;'>Bild hochladen</div></a>";
                        }
                    ?>
                            </div>

                            <div id="push"></div>
                        </div>

                    </div>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header borderBlock">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Profilbild wählen</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Bitte wählen Sie Sich ein Profilbild aus oder laden Sie ein Bild hoch.</p>

                                    <form action="../imageupdater.php" method="post" enctype="multipart/form-data">

                                        <label class="radio-inline"><center><img class="changeImage" src="../images/profile-placeholder.png" class="radioImage"><p></p><input type="radio" name="optradio" value="Standardbild 1" <?php  if($imageIndex == 0) echo"checked"; ?>>Standardbild 1</center></label>
                                        <label class="radio-inline"><center><img class="changeImage" src="../images/profile-placeholder_female.png" class="radioImage"><p></p><input type="radio" name="optradio" value="Standardbild 2" <?php  if($imageIndex == 1) echo"checked"; ?>>Standardbild 2</center></label>
                                        <label class="radio-inline"><center><img src="<?php if($imageIndex == 2) { echo $profil; } else { echo '../images/placeholder.jpg';} ?>" class="radioImage changeImageUpload"><p></p><input type="radio" name="optradio" value="Standardbild 3" <?php  if($imageIndex == 2) echo"checked"; ?>>Eigenes Bild</center></label>

                                        <p></p>

                                        <hr>
                                        <div class="form-group">
                                            <input id="file-0d" data-show-preview="false" class="file" name="url" type="file">
                                        </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Speichern</button>
                                    </form>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal (Messenger) -->
        <div id="messengerModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header borderBlock">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nachricht senden</h4>
                    </div>
                    <div class="modal-body">

                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="usr">Name:</label>
                                <input type="text" class="form-control" id="usr">
                            </div>
                            <div class="form-group">
                                <label for="comment">Nachricht:</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Senden</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal (Image-Upload) -->

        <div tabindex="-1" class="modal fade" id="imageModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">×</button>
                        <h3 class="modal-title">Bilder hochladen</h3>
                    </div>
                    <div class="modal-body">
                        <p>
                            <blogquote>Bitte wählen Sie hier Ihre Bilder aus, die Sie hochladen möchten.</blogquote>
                        </p>
                        <form action="imagePost.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Bildtitel" required>
                            </div>
                            <div class="form-group">
                                <input id="file-0d" data-show-preview="false" class="file" name="url" type="file">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal (Image Gallery) -->

        <div tabindex="-1" class="modal fade" id="imgModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">×</button>
                        <h3 id="IMGtitle" class="modal-title"></h3>
                    </div>
                    <div id="IMGbody" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <form id="form_deleteIMG" action="deleteIMG.php" method="POST">
                            <input type="text" id="hiddenID" name="id" hidden="true">
                            <button type="submit" class="btn btn-danger">Löschen</button>
                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal (Retweet) -->

        <div tabindex="-1" class="modal fade" id="tweetModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #337AB7; color: white;">
                        <button class="close" type="button" data-dismiss="modal">×</button>
                        <h3 id="modal-title" class="modal-title">Retweet</h3>
                    </div>
                    <div id="retweet-body" class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Teilen</button>
                    </form>
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <! -- JQuery / AJAX -->

        <script src="../js/searchbox.js" type="text/javascript"></script>
        <script src="../js/messagelimit.js" type="text/javascript"></script>
        <script src="../js/load-notification.js" type="text/javascript"></script>
        <script src="../js/tooltip.js" type="text/javascript"></script>
        <script src="../js/retweet.js" type="text/javascript"></script>

    </body>

    </html>
