<?php 
    include('server.php');
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }  
    $nick = $_SESSION['username'];
	if (isset($_GET['do'])) {
        $_SESSION['chatz'] = $_GET['do'];
    }
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        
    $(document).ready(function(){
        $("#autodata").load("chatload.php");
        setInterval(function(){
            $("#autodata").load("chatload.php");
            },1000);
    });
    </script>
    
    
</head>

<body class="tlo2">
    <div class="tlo2 container-fluid">
        <div class="regrow row justify-content-center">
            <div class="col-sm-12">
                <div class="jezrow row">
                    <div class="col-sm-1">
                        <div class="dropdown">
                          <button class="btnjezyk btn btn-success dropdown-toggle" type="button" id="przykladowaLista" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Język</button>
                          <div class="dropdown-menu" aria-labelledby="przykladowaLista">
                            <a class="dropdown-item" href="#">English</a>
                            <a class="dropdown-item" href="#">Polski</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-2 offset-sm-9 text-center">
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
                <div class="menurow row justify-content-center">
                    <div class="text-center col-sm-12">
                        <br>
                        <div class="row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class=" row justify-content-md-center">
                                    <div class=" col-sm-10">
                                        <form action="" method="post" >
                                            <div class="row justify-content-md-center">
                                                <div class="col-sm-7">
                                                    <br>
                                                    <input class="reginput" type="text" name="wiadomosc2" placeholder="">
                                                </div>
                                                <div class="col-sm-3">
                                                    <br>
                                                    <button class="regbutton" name="wiadomosc_send" type="submit">Wyslij</button>
                                                <br>
                                                </div>
                                                <br>
                                            </div>
                                        </form>
                                    </div>       
                                </div>    
                            </div> 
                        </div>
                        <div class="rowchat col-sm-10 offset-sm-1" id="autodata">
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
    
</html>