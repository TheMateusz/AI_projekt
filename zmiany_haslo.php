<?php 
    include('server.php');
    $nick = ($_SESSION['username']);
    $check;
    $cplec = $_SESSION['cuserplec'];
    $cwiek = $_SESSION['cuserwiek'];
    $chobby1 = $_SESSION['cuserhobby1'];
    $chobby2 = $_SESSION['cuserhobby2'];
    $chobby3 = $_SESSION['cuserhobby3'];
    $chobby4 = $_SESSION['cuserhobby4'];
    $chobby5 = $_SESSION['cuserhobby5'];
    $cemail = $_SESSION['cuseremail'];

	if (isset($_GET['clicker'])) {
        $check = $_GET['clicker'];
        $zapytanie = "SELECT * FROM usersinfo WHERE login='$check'";
        $results3 = mysqli_query($db, $zapytanie);
        $ilu_userow = $results3->num_rows;
        if($ilu_userow>0)
        {
            $wiersz = $results3->fetch_assoc();
            $_SESSION['cuserplec'] = $wiersz['plec'];
            $_SESSION['cuserwiek'] = $wiersz['wiek'];
            $_SESSION['cuserhobby1'] = $wiersz['hobby1'];
            $_SESSION['cuserhobby2'] = $wiersz['hobby2'];
            $_SESSION['cuserhobby3'] = $wiersz['hobby3'];
            $_SESSION['cuserhobby4'] = $wiersz['hobby4'];
            $_SESSION['cuserhobby5'] = $wiersz['hobby5'];
        }        
        $zapytanie2 = "SELECT * FROM users WHERE username='$check'";
        $results4 = mysqli_query($db, $zapytanie2);
        $ilu_userow1 = $results4->num_rows;
        if($ilu_userow1>0)
        {
            $wiersz = $results4->fetch_assoc();
            $_SESSION['cuseremail'] = $wiersz['email'];
        }    
        
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
    }
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
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
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
    
</head>

<body class="tlo2">
    <div class="tlo2 container-fluid">
        <div class="regrow row justify-content-center">
            <div class="col-12">
                <div class="menurow row justify-content-center">                    
                    <div class="col-2 menuleftcol text-center">
                        <div class="row">
                            <div class='menufriend col-12 text-center'>
                                <h5 class='menufriendtitle'>USTAWIENIA</h5>
                                <div class='menufriend col-12 text-center'>
                                    <a href='zmiany_postawowe.php'><button type='submit' class='menufrienditem2' name='get_user'>PODSTAWOWE DANE</button></a>
                                </div>
                                <div class='menufriend col-12 text-center'>
                                    <a href='zmiany.php'><button type='submit' class='menufrienditem2' name='get_user'>ZDJECIE PROFILOWE</button></a>
                                </div>
                                <div class='menufriend col-12 text-center'>
                                    <a href='zmiany_haslo.php'><button type='submit' class='menufrienditem2' name='get_user'>ZMIANA HASŁA</button></a>
                                </div>
                                <div class='menufriend col-12 text-center'>
                                    <a href='zmiany_adresemail.php'><button type='submit' class='menufrienditem2' name='get_user'>ADRES EMAIL</button></a>
                                </div>
                                <div class='menufriend col-12 text-center'>
                                    <a href='zmiany_zainteresowania.php'><button type='submit' class='menufrienditem2' name='get_user'>ZAINTERESOWANIA</button></a>
                                </div>
                                <div class='menufriend col-12 text-center'>
                                    <a href='zmiany_opis.php'><button type='submit' class='menufrienditem2' name='get_user'>OPIS</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center col-8">      
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" row justify-content-center"> 
                                    <div class="col-sm-8">
                                        <br>
                                        <br>
                                        <?php include('errors.php'); ?>   
                                        <?php include('succes.php'); ?>  
                                        <br>
                                        <br> 
                                    </div>     
                                    <div class="colzmianyele col-7">
                                        <form method="post" >
                                            <div class="row justify-content-center">
                                                <div class="text-center col-sm-8">
                                                    <br>
                                                    <h3>ZMIANA HASŁA</h3>
                                                </div>
                                                <div class="col-10">
                                                    <input class="reginput" type="password" name="password" placeholder="Poprzednie hasło">
                                                </div>
                                                <div class="col-10">
                                                    <input class="reginput" type="password" name="newpassword_1" placeholder="Nowe hasło">
                                                </div>
                                                <div class="col-10">
                                                    <input class="reginput" type="password" name="newpassword_2" placeholder="Powtórz nowe hasło">
                                                </div>
                                                <div class="col-10">
                                                    <button class="regbutton" name="change_pass" type="submit">ZMIEŃ HASŁO</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>    
                                </div>    
                            </div> 
                        </div>
                    </div>
                    <div class="col-2 text-center">
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
            </div>
        </div>
    </div>
</body>
    
    
</html>