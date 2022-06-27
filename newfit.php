<?php 
    include('server.php');
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "Musisz zalogowac sie poraz pierwszy";
        header('location: login.php');
    }
    $nick = ($_SESSION['username']);
    $splec = ($_SESSION['suserplec']);
    $szgd = ($_SESSION['lastfituserzgd']);
    $swiek = ($_SESSION['suserwiek']);
    $suser = ($_SESSION['lastfituser']);
    $shobby1 = ($_SESSION['suserhobby1']);
    $shobby2 = ($_SESSION['suserhobby2']);
    $shobby3 = ($_SESSION['suserhobby3']);
    $shobby4 = ($_SESSION['suserhobby4']);
    $shobby5 = ($_SESSION['suserhobby5']);
    $shobby6 = ($_SESSION['suserhobby6']);
    $shobby7 = ($_SESSION['suserhobby7']);
    $shobby8 = ($_SESSION['suserhobby8']);
    $shobby9 = ($_SESSION['suserhobby9']);
    $shobby10 = ($_SESSION['suserhobby10']);
    $semail = ($_SESSION['suseremail']);
    $sopis = ($_SESSION['sopis']);
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
    <link rel="stylesheet" href="tesy3.css?<?php echo rand(); ?>"><script src="https://kit.fontawesome.com/db5c1be461.js" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
</head>

<body>
    <div class="tlo2 container-fluid">
        <div class="regrow row justify-content-md-center">
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
          
          
            <div class=" col-10">
                <div class="row justify-content-md-center">
                    <div class="col-10">
                        <div class=" row justify-content-md-center">
                            <div class=" col-12">
                                <div class="row panelm">
                                    <div class="col-12 text-center">
                                        <h3>Znaleźliśmy dla ciebie osobę</h3>
                                        <p class ="tekstnewfit11c">Zgodność</p><p class ="tekstnewfit12c"><?php echo $szgd;?> %</p>
                                    </div>
                                    <div class="col-2">
                                        <img class="awatarnewfit2 img-fluid" src="<?php
                                        
                                        
                                        $plik1 = "profiles/".$suser.".jpg";
                                        $plik2 = "profiles/".$suser.".png";
                                        $plik3 = "profiles/".$suser.".jpeg";
                                        $test1 = file_exists($plik1);
                                        $test2 = file_exists($plik2);
                                        $test3 = file_exists($plik3);
                                        if ($test1){
                                            echo $plik1."?d=".rand();
                                        }else if ($test2){
                                            echo $plik2."?d=".rand();
                                        }else if ($test3){
                                            echo $plik3."?d=".rand();
                                        }else{
                                            if ($splec == "mezczyzna"){
                                                echo "img/mezczyzna.png";
                                            }
                                            else {
                                                echo "img/kobieta.png";
                                            }
                                        }
                                        ?>">
                                    </div>
                                    <div class="col-6 text-left">
                                        <div class="row">
                                            <div class=" col-12">
                                                <p class ="tekstnewfit11"><?php echo $suser;?></p>
                                            </div>
                                            <div class=" col-12">
                                                <br><p><?php echo $sopis;?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-Center">
                                        <div class="row">
                                            <div class=" col-12"><br><br>
                                                <h6 class ="tekstnewfit12"><?php 

                                                if ($splec == "mezczyzna"){
                                                    echo "<i class='fas fa-male'></i> Mężczyzna";
                                                }
                                                else{
                                                    echo "<i class='fas fa-female'></i> Kobieta";
                                                }
                                                
                                                
                                                ?></h6>
                                            </div>
                                            <div class=" col-12">
                                                <h6 class ="tekstnewfit12"><?php 

                                                    echo "<i class='fas fa-calendar-day'></i> ".$swiek." Lat";
                                                
                                                ?></h6>
                                            </div>
                                            <div class=" col-12">
                                                <h6 class ="tekstnewfit12"><i class="fas fa-globe-europe"></i> Polska</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                    <br>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="row justify-content-md-center">
                                            <div class="col-12 text-center">
                                                <br>
                                                <h5 class="tekstnewfit1">ZAINTERESOWANIA</h5>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby1;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby1;?>.png">
                                                        <input type="checkbox"  value="gotowanie" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby2;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby2;?>.png">
                                                        <input type="checkbox"  value="lucznictwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby3;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby3;?>.png">
                                                        <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby4;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby4;?>.png">
                                                        <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby5;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby5;?>.png">
                                                        <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby6;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby6;?>.png">
                                                        <input type="checkbox"  value="gotowanie" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby7;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby7;?>.png">
                                                        <input type="checkbox"  value="lucznictwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby8;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby8;?>.png">
                                                        <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby9;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby9;?>.png">
                                                        <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                            <div class="col-1 text-center">
                                                <a href="#" data-toggle="tooltip" title="<?php echo $shobby10;?>">
                                                    <label class="main2">
                                                        <img class="img-fluid" src="img/<?php echo $shobby10;?>.png">
                                                        <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                        <span class="mark2"></span>
                                                </label></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2">
                                        <br>
                                        <form action="newfit.php" method="post" >
                                            <button class="menufrienditem" name="select" type="submit">ZNAJDZ MI NASTEPNA OSOBĘ</button>
                                        </form>
                                        <br>
                                    </div>
                                </div>   
                            </div>
                        </div>
            </div>
        </div>
    </div>
</body>
    
    
</html>