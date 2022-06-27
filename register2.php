<?php 
    include('server.php');
	if ($_SESSION['wer'] == "czeka") {
		header("location: weryfikacja_c.php");
	}
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "Musisz zalogowac sie poraz pierwszy";
        header('location: login.php');
    }    
    $username = $_SESSION['username'];
    $query = "SELECT * FROM usersinfo WHERE login='$username'";
    $results2 = mysqli_query($db, $query);

   if (mysqli_num_rows($results2) == 1 ) {
      $_SESSION['success'] = "Zostałes pomyślnie zalogowany";
        header('location: start.php');
   }  

?>
<html lang="pl">
    
    
<head>
    <meta charset="utf-8">
    <meta name="author" content="MateuszMatusiak">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Turret+Road:500,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tesy3.css">
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
</head>

<body>
    <div class="tlo container-fluid"><br><br><br><br>
        <div class="regrow row justify-content-sm-center">
            <div class="regcolmain col-lg-8 col-sm-10">
                <form action="register2.php" method="post" >
                    <div class="row justify-content-md-center">
                        <div class="text-center col-10">
                            <h2>USTAWIENIA KONTA</h2>
                            <?php include('errors.php'); ?>
                        </div>
                        <div class="col-4 col-sm-4">
                            <input class="reginput" type="text" name="wiek" placeholder="Wiek">
                        </div>
                        <div class="col-4 col-sm-4">
                            <input class="reginput" type="text" name="miasto" placeholder="Miasto">
                        </div>
                        <div class="col-4 col-sm-4">
                            <select name="kraj" class="reginput browser-default custom-select">
                              <option class="register_kraj" selected >Kraj pochodzenia</option>
                              <option class="kraj" value="polska" style="color: black;">Polska</option>
                              <option  class="kraj" value="wlochy" style="color: black;">Włochy</option>
                            </select>
                        </div>
                        <div class="col-3 col-sm-3 text-center">
                            <label class="main">KOBIETA
                              <input type="radio" placeholder="KOBIETA" checked="checked" value="kobieta" name="radio">
                              <span class="mark"></span>
                            </label>
                        </div>
                        <div class="col-4  text-center">
                            <h5 class="reg2text1">Wybierz swoją płeć</h5>
                        </div>
                        <div class="col-3 text-center">
                            <label class="main">MĘŻCZYZNA
                              <input type="radio" placeholder="MĘŻCZYZNA" name="radio" value="mezczyzna">
                              <span class="mark"></span>
                            </label>
                        </div>
                        <div class="col-12 text-center">
                            <h4 class="reg2text2">Wybierz swoje zainteresowania</h4>
                            <small>wybierz maksymalnie 10 zainteresowań</small>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                        </div>
                       
         
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="GOTOWANIE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/gotowanie.png">
                                  <input type="checkbox"  value="gotowanie" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>

                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="ŁUCZNICTWO">
                                <label class="main2">
                                    <img class="img-fluid" src="img/lucznictwo.png">
                                  <input type="checkbox"  value="lucznictwo" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="KOLARSTWO">
                                <label class="main2">
                                    <img class="img-fluid" src="img/kolarstwo.png">
                                  <input type="checkbox"  value="kolarstwo" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="GRY PLANSZOWE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/gry_planszowe.png">
                                  <input type="checkbox" value="gry_planszowe" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="KSIĄŻKI">
                                <label class="main2">
                                    <img class="img-fluid" src="img/ksiazki.png">
                                  <input type="checkbox"  value="ksiazki" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
       
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="SAMOCHODY">
                                <label class="main2">
                                    <img class="img-fluid" src="img/samochody.png">
                                  <input type="checkbox"  value="samochody" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
     
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="NURKOWANIE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/nurkowanie.png">
                                  <input type="checkbox"  value="nurkowanie" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="MECHANIKA">
                                <label class="main2">
                                    <img class="img-fluid" src="img/mechanika.png">
                                  <input type="checkbox"  value="mechanika" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="ŁOWIENIE RYB">
                                <label class="main2">
                                    <img class="img-fluid" src="img/lowienie_ryb.png">
                                  <input type="checkbox"  value="lowienie_ryb" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="MOTORY">
                                <label class="main2">
                                    <img class="img-fluid" src="img/motory.png">
                                  <input type="checkbox"  value="motory" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="ORIGAMI">
                                <label class="main2">
                                    <img class="img-fluid" src="img/origami.png">
                                  <input type="checkbox"s  value="origami" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="ZWIERZwĘTA">
                                <label class="main2">
                                    <img class="img-fluid" src="img/zwierzeta.png">
                                  <input type="checkbox"s  value="zwierzeta" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="GRA NA INSTRUMENCIE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/gra_na_instrumencie.png">
                                  <input type="checkbox"s  value="gra_na_instrumencie" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="FOTOGRAFIA">
                                <label class="main2">
                                    <img class="img-fluid" src="img/fotografia.png">
                                  <input type="checkbox"s  value="fotografia" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="PROGRAMOWANIE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/programowanie.png">
                                  <input type="checkbox"s  value="programowanie" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="JEŹDZIECTWO">
                                <label class="main2">
                                    <img class="img-fluid" src="img/jezdziectwo.png">
                                  <input type="checkbox"s  value="jezdziectwo" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="BIEGANIE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/bieganie.png">
                                  <input type="checkbox"s  value="bieganie" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="SPORTY ZIMOWE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/sporty_zimowe.png">
                                  <input type="checkbox"s  value="sporty_zimowe" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="KOLEKCJONERSTWO">
                                <label class="main2">
                                    <img class="img-fluid" src="img/kolekcjonerstwo.png">
                                  <input type="checkbox"s  value="kolekcjonerstwo" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="MAJSTERKOWANIE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/majsterkowanie.png">
                                  <input type="checkbox"s  value="majsterkowanie" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="PODRÓŻOWANIE">
                                <label class="main2">
                                    <img class="img-fluid" src="img/podrozowanie.png">
                                  <input type="checkbox"s  value="podrozowanie" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="TREKKING">
                                <label class="main2">
                                    <img class="img-fluid" src="img/trekking.png">
                                  <input type="checkbox"s  value="trekking" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-1 col-sm-1 text-center">
                            <a href="#" data-toggle="tooltip" title="MUZYKA">
                                <label class="main2">
                                    <img class="img-fluid" src="img/muzyka.png">
                                  <input type="checkbox"s  value="muzyka" name="checkbox[]">
                                  <span class="mark2"></span>
                            </label></a>
                        </div>
                        <div class="col-10">
                            <button class="regbutton" name="reg_user_two" type="submit">ZAPISZ USTAWIENIA</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    
    
</html>