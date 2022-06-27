<?php 
    include('server.php');
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "Musisz zalogowac sie poraz pierwszy";
        header('location: login.php');
    }
    $nick = ($_SESSION['username']);
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
    }
	if ($_SESSION['wer'] == "tak") {
		header("location: register2.php");
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
            <div class="col-2 offset-lg-9 text-center">
                <div class="rowmenu row">
                    <div onclick="location.href='menu.php?clicker=<?php echo $nick;?>';" class="menuitem col-3">
                        <i class="ikonka fa fa-user"></i>
                    </div>
                    <div onclick="location.href='start.php';" class="menuitem col-3">                
                        <i class="ikonka fa fa-home"></i>
                    </div>
                    <div onclick="location.href='zmiany.php';" class="menuitem col-3">                
                        <i class="ikonka fa fa-gear"></i>
                    </div>
                    <div onclick="location.href=`index.php?logout='1'`" class="menuitem col-3">              
                        <i class="ikonka fa fa-sign-out"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="regrow row justify-content-md-center">
            <div class="startcol col-10">
                <?php include('errors.php'); ?>
                <?php include('succes.php'); ?> 
                <form action="weryfikacja_c.php" method="post" >
                    <div class="row justify-content-lg-center">
                        <div class="text-center col-10">
                            <h1 class="weryfikacja_c1">Wysłaliśmy Ci wiadomość z potwierdzeniem rejestracji na twój adres email</h1>
                            <h2 class="weryfikacja_c2">Pamietaj ze wiadomość może znajdować sie w folderze SPAM. Jeśli jednak nie dostaniesz wiadomości kliknij w poniższy przycisk. W razie dalszych problemów skontaktuj sie z administracją pod adresem: <b>excenticstudio@gmail.com</b></h2>
                        </div>
                        <div class="col-5">
                            <button class="startbutton" name="wiadomosc" type="submit">NOWA WIADOMOŚĆ WERYFIKACYJNA</button>
                        </div>
                        <div class="col-5">
                            <a href="zmiany.php"><button class="startbutton" name="zmiany" type="button">CHCE ZMIENIĆ ADRES EMAIL</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    
    
</html>