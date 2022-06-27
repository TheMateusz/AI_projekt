<?php 
    include('server.php');
    $nick = ($_SESSION['username']);

    $zapytanie = "SELECT * FROM usersinfo WHERE login='$nick'";
    $results3 = mysqli_query($db, $zapytanie);
    $ilu_userow = $results3->num_rows;
    if($ilu_userow>0)
    {
        $wiersz = $results3->fetch_assoc();
        $_SESSION['cuserplec'] = $wiersz['plec'];
    }  
    $cplec = $_SESSION['cuserplec'];       

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
                            <div class="col-12">
                                <div class=" row justify-content-center">
                                    <div class="col-7">
                                        <br>
                                        <br>
                                        <?php include('errors.php'); ?>   
                                        <?php include('succes.php'); ?>  
                                        <br>
                                        <br>
                                    </div> 
                                    <div class="colzmianyele col-7">
                                        <form method="post" enctype='multipart/form-data'>
                                            <div class="row justify-content-md-center">
                                                <div class="text-center col-sm-10">
                                                <br>
                                                    <h3>ZMIANA ZDJECIA PROFILOWEGO</h3>
                                                </div>
                                                <div class="text-center col-sm-10">
                                                <br>
                                                    <h5>Wymogi grafiki:</h5>
                                                </div>
                                                <div class="text-center col-sm-10 text-left">
                                                <br>
                                                    <p>- Umieszczając zdjęcie potwierdzasz że posiadasz prawa autorskie<br>- Dostepne formaty to ( .JPG, .PNG, .JPEG )<br>- Maksymalny rozmiar to 2MB</p><br>
                                                </div>
                                                <!--<div class="text-center col-sm-3">
                                                    <img class="awatarnewfit img-fluid" src="<?php
                                                    
                                                    
                                                    $plik = "profiles/".$nick.".jpg";
                                                    $test = file_exists($plik);
                                                    if (!$test){
                                                        if ($cplec == "mezczyzna"){
                                                            echo "img/mezczyzna.png";
                                                        }
                                                        else {
                                                            echo "img/kobieta.png";
                                                        }
                                                    }else{
                                                        echo $plik;
                                                    }
                                                    ?>">
                                                <br>
                                                </div>-->
                                                <div class="col-10">
                                                    <input class="btn btn-dark btn-block" type="file" name="file">
                                                </div>
                                                <div class="col-10 text-center">
                                                    <button class="regbutton" name="upload_submit" type="submit">ZMIEŃ ZDJECIE</button>
                                                </div>
                                                <br>
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