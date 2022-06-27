<?php 
    include('server.php');
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }    
    $nick = ($_SESSION['username']);
    $query = "SELECT * FROM usersinfo WHERE login='$nick'";
    $results2 = mysqli_query($db, $query);
    if (mysqli_num_rows($results2) == 0 ) {header('location: register2.php');}
;
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}    
	if ($_SESSION['wer'] == "czeka") {
		header("location: weryfikacja_c.php");
	}
?>
<html lang="pl">
    
    
<head>
    <meta charset="utf-8">
    <meta name="author" content="MateuszMatusiak">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Turret+Road:500,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tesy3.css?<?php echo rand(); ?>">
    <script src="https://kit.fontawesome.com/db5c1be461.js" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
</head>

<body>
    <div class="tlo container-fluid">
        <div class="jezrow row">
            <div class="col-1">
                <div class="dropdown">
                  <button class="btnjezyk btn btn-success dropdown-toggle" type="button" id="przykladowaLista" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Język</button>
                  <div class="dropdown-menu" aria-labelledby="przykladowaLista">
                    <a class="dropdown-item" href="#">English</a>
                    <a class="dropdown-item" href="#">Polski</a>
                  </div>
                </div>
            </div>
            <div class="col-2 offset-lg-9 offset-sm-9  text-center">
                <div class="rowmenu row">
                    <div onclick="location.href='menu.php?clicker=<?php echo $nick;?>';" class="menuitem col-3">
                    <a href="#" data-toggle="tooltip" title="PROFIL/KONTAKTY">         
                        <i class="ikonka fa fa-user"></i>
                    </div></a>
                    
                    <div onclick="location.href='start.php';" class="menuitem col-3"> 
                    <a href="#" data-toggle="tooltip" title="STRONA GŁÓWNA">             
                        <i class="ikonka fa fa-home"></i>
                        </div></a>
                    <div onclick="location.href='zmiany.php';" class="menuitem col-3">
                    <a href="#" data-toggle="tooltip" title="USTAWIENIA KONTA">                         
                        <i class="ikonka fa fa-gear"></i>
                    </div></a>
                    <div onclick="location.href=`index.php?logout='1'`" class="menuitem col-3">    
                    <a href="#" data-toggle="tooltip" title="WYLOGUJ">                   
                        <i class="ikonka fa fa-sign-out"></i>
                    </div></a>
                </div>
            </div>
        </div>
        <div class="regrow row justify-content-center">
            <div class="startcol col-10">
                <form action="start.php" method="post" >
                    <div class="row justify-content-center">
                        <div class="text-center col-12">
                            <h2 class="starth1">CZY JESTEŚ GOTÓW POZNAĆ KOGOŚ NOWEGO?</h2>
                        </div>
                        <div class="text-center col-8">
                            <?php include('errors.php'); ?>
                            <br>
                        </div>
                        <div class="col-5">
                            <button class="startbutton" name="select" type="submit">TAK, ZACZYNAMY</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    
    
</html>