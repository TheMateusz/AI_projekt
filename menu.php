<?php 
    include('server.php');
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "Musisz zalogowac sie poraz pierwszy";
        header('location: login.php');
    }
	if ($_SESSION['wer'] == "czeka") {
		header("location: weryfikacja_c.php");
	}
    $nick = $_SESSION['username'];
    $check;
    $cplec = $_SESSION['userplec'];
    $cwiek = $_SESSION['userwiek'];
    $chobby1 = $_SESSION['userhobby1'];
    $chobby2 = $_SESSION['userhobby2'];
    $chobby3 = $_SESSION['userhobby3'];
    $chobby4 = $_SESSION['userhobby4'];
    $chobby5 = $_SESSION['userhobby5'];
    $chobby6 = $_SESSION['userhobby6'];
    $chobby7 = $_SESSION['userhobby7'];
    $chobby8 = $_SESSION['userhobby8'];
    $chobby9 = $_SESSION['userhobby9'];
    $chobby10 = $_SESSION['userhobby10'];
    $cemail = $_SESSION['useremail'];
    if(isset($_SESSION['opis'])){$copis = $_SESSION['opis'];}
    $cpanstwo = $_SESSION['kraj'];
    $cmiasto = $_SESSION['miasto'];

	if (isset($_GET['clicker'])) {
        $check = $_GET['clicker'];
        $zapytanie = "SELECT * FROM usersinfo WHERE login='$check'";
        $results3 = mysqli_query($db, $zapytanie);
        $ilu_userow = $results3->num_rows;
        if($ilu_userow>0)
        {
            $wiersz = $results3->fetch_assoc();
            $cplec = $wiersz['plec'];
            $cwiek = $wiersz['wiek'];
            $chobby1 = $wiersz['hobby1'];
            $chobby2 = $wiersz['hobby2'];
            $chobby3 = $wiersz['hobby3'];
            $chobby4 = $wiersz['hobby4'];
            $chobby5 = $wiersz['hobby5'];
            $chobby6 = $wiersz['hobby6'];
            $chobby7 = $wiersz['hobby7'];
            $chobby8 = $wiersz['hobby8'];
            $chobby9 = $wiersz['hobby9'];
            $chobby10 = $wiersz['hobby10'];
            $cpanstwo = $wiersz['kraj'];
            $cmiasto = $wiersz['miasto'];
        }        
        $zapytanie2 = "SELECT * FROM users WHERE username='$check'";
        $results4 = mysqli_query($db, $zapytanie2);
        $ilu_userow1 = $results4->num_rows;
        if($ilu_userow1>0)
        {
            $wiersz = $results4->fetch_assoc();
            $cemail = $wiersz['email'];
            $copis = $wiersz['opis'];
        }    
        
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
    <title></title>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">  
    <link rel="shortcut icon" href="logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Turret+Road:500,700,800&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><script src="https://kit.fontawesome.com/db5c1be461.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="tesy3.css?<?php echo rand(); ?>">
    <link rel="stylesheet" href="tesy31.css?<?php echo rand(); ?>">
    <script>
    $(document).ready(function(){
    $("#autodata").load("profileload.php");
    setInterval(function(){
        $("#autodata").load("profileload.php");
        zmienKolorTekstu();
        },1000);
    });
    </script>
        <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
    
</head>

<body class="tlo2">
    <div class="tlo2 container-fluid">
        <div class="regrow row justify-content-md-center">
            <div class="col-12">
                <div class="menurow row justify-content-md-center">
                    <div class="text-center col-12">
                        <div class="row">
                            <div class="col-2 menuleftcol text-center">
                                <div class="row">
                                    <div class='menufriend col-12 text-center'>
                                        <h5 class='menufriendtitle'>LISTA PASUJĄCYCH OSÓB</h5>
                                        <div id="autodata">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class=" row justify-content-md-center">
                                    <div class=" col-12">
                                        <div class="row panelm">
                                            <div class="col-2">
                                                <img class="awatarnewfit2 img-fluid" src="<?php
                                                
                                                
                                                $plik1 = "profiles/".$check.".jpg";
                                                $plik2 = "profiles/".$check.".png";
                                                $plik3 = "profiles/".$check.".jpeg";
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
                                                    if ($cplec == "mezczyzna"){
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
                                                        <p class ="tekstnewfit11"><?php echo $check;?></p>
                                                    </div>
                                                    <div class=" col-12">
                                                        <br><p><?php echo $copis;?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 text-Center">
                                                <div class="row">
                                                    <div class=" col-12"><br><br>
                                                        <h6 class ="tekstnewfit12"><?php 

                                                        if ($cplec == "mezczyzna"){
                                                            echo "<i class='fas fa-male'></i> Mężczyzna";
                                                        }
                                                        else{
                                                            echo "<i class='fas fa-female'></i> Kobieta";
                                                        }
                                                        
                                                        
                                                        ?></h6>
                                                    </div>
                                                    <div class=" col-12">
                                                        <h6 class ="tekstnewfit12"><?php 

                                                            echo "<i class='fas fa-calendar-day'></i> ".$cwiek." Lat";
                                                        
                                                        ?></h6>
                                                    </div>
                                                    <div class=" col-12">
                                                        <h6 class ="tekstnewfit12"></i> <?php 

                                                        echo "<i class='fas fa-globe-europe'></i> ".$cpanstwo;

                                                        ?></h6>
                                                    </div>
                                                    <div class=" col-12">
                                                        <h6 class ="tekstnewfit12"></i> <?php 

                                                        echo "<i class='fas fa-city'></i>".$cmiasto;

                                                        ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                            <br>
                                            </div>
                                            <div class="col-6 text-center">
                                                <div class="row justify-content-md-center">
                                                    <div class="col-12 text-center">
                                                        <h5 class="tekstnewfit2"><?php echo $cemail;?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 text-center">
                                                <div class="row justify-content-md-center">
                                                    <div class="col-12 text-center">
                                                        <?php
                                                        
                                                        if ($check != $nick){
                                                            echo 
                                                                "
                                                                <a href='chat.php?do=".$check."'><button type='button' class='menufrienditem' name='get_user'>NAPISZ WIADOMOŚĆ</button></a>
                                                                ";
                                                        }
                                                        
                                                        ?> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="row justify-content-md-center">
                                                    <div class="col-12 text-center">
                                                        <br>
                                                        <h5 class="tekstnewfit1">ZAINTERESOWANIA</h5>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby1;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby1;?>.png">
                                                                <input type="checkbox"  value="gotowanie" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby2;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby2;?>.png">
                                                                <input type="checkbox"  value="lucznictwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby3;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby3;?>.png">
                                                                <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby4;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby4;?>.png">
                                                                <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby5;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby5;?>.png">
                                                                <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby6;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby6;?>.png">
                                                                <input type="checkbox"  value="gotowanie" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby7;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby7;?>.png">
                                                                <input type="checkbox"  value="lucznictwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby8;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby8;?>.png">
                                                                <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby9;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby9;?>.png">
                                                                <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                    <div class="col-1 text-center">
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $chobby10;?>">
                                                            <label class="main2">
                                                                <img class="img-fluid" src="img/<?php echo $chobby10;?>.png">
                                                                <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                                                <span class="mark2"></span>
                                                        </label></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class=" col-12">
                                        <div class="row justify-content-center panelm">
                                            <?php include('errors.php'); ?> 
                                            <?php include('succes.php'); ?> 
                                            <?php
                                            $nick = ($_SESSION['username']);
                                            $zapytanie2 = "SELECT * FROM post WHERE Autor='$check'";
                                            $results4 = mysqli_query($db, $zapytanie2);
                                            while ($row=mysqli_fetch_row($results4)){
                                                    if ($check == $nick){
                                                    echo '
                                                    <div class="col-12 text-right">
                                                    <form method="POST">
                                                    <input name="id" type="hidden" value="'.$row[0].'">
                                                        <button type="submit" name="remove_post" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    </form>';}
                                                    echo 
                                                    '
                                                    <div class="col-12">
                                                    <br>
                                                    <h3>'.$row[3].'</h3>
                                                    <br>
                                                    </div>
                                                    <div class="col-12 text-left">
                                                        <p>'.$row[2].'</p>
                                                    </div>
                                                    <div class="col-12 text-right">
                                                    <i class="fas fa-calendar-week"></i> '.$row[4].'
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <hr>
                                                    </div> 
                                            
                                                    ';
                                            }
                                            if ($check == $nick){
                                            echo '
                                                <div class="col-12"><form method="POST"> 
                                                    <textarea class="btn btn-dark btn-block txa" placeholder="Tytuł posta" rows="3" name="title"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <textarea class="btn btn-dark btn-block"placeholder="Treść posta" rows="3" maxlength="500" name="wiad"></textarea>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button class="regbutton" name="add_post" type="submit">DODAJ POST</button>  
                                                </div></form>';
                                            }?>
                                        </div>   
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-2">
                                <div class="rowmenu row">
                                    <div onclick="location.href='menu.php?clicker=<?php echo $nick;?>';" class="menuitem col-3">
                                        
                    <a href="#" data-toggle="tooltip" title="WYLOGUJ">                   <i class="ikonka fa fa-user"></i></a>
                                    </div>
                                    <div onclick="location.href='start.php';" class="menuitem col-3">                
                                        
                    <a href="#" data-toggle="tooltip" title="WYLOGUJ">                   <i class="ikonka fa fa-home"></i></a>
                                    </div>
                                    <div onclick="location.href='zmiany.php';" class="menuitem col-3">                
                                        
                    <a href="#" data-toggle="tooltip" title="WYLOGUJ">                   <i class="ikonka fa fa-gear"></i></a>
                                    </div>
                                    <div onclick="location.href=`index.php?logout='1'`" class="menuitem col-3">              
                                        
                    <a href="#" data-toggle="tooltip" title="WYLOGUJ">                   <i class="ikonka fa fa-sign-out"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body> 
</html>