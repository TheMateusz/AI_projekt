<?php 

// error_reporting(0);
// ini_set('display_errors', 0);

	session_start();
	$username = "";
	$email = "";
	$errors = array(); 
	$succes = array(); 
	$_SESSION['success'] = "";
    $wiek = "";
    $plec = "";
    $z1 = "brak";
    $z2 = "brak";
    $z3 = "brak";
    $z4 = "brak";
    $z5 = "brak";
    $z6 = "brak";
    $z7 = "brak";
    $z8 = "brak";
    $z9 = "brak";
    $z10 = "brak";


	$db = mysqli_connect('sql81.lh.pl', 'serwer147806_projektst', 'matusiak123', 'serwer147806_projektst');

	if (isset($_POST['wiadomosc'])) {
        $username = $_SESSION['username'];
        $zapytanie = "SELECT * FROM users WHERE username='$username'";
        $results3 = mysqli_query($db, $zapytanie);
        $ilu_userow = $results3->num_rows;
        if($ilu_userow>0)
        {
            $wiersz = $results3->fetch_assoc();
            $_SESSION['kod'] = $wiersz['kod'];
            $_SESSION['email'] = $wiersz['email'];

        }
        $email = $_SESSION['email'] ;
        $kod = $_SESSION['kod'];
        $tytul = "wiadomość weryfikacyjna";
        $tekst = "Quicksand";
        $tresc = 
            '
            <html lang="pl">
            <head>
                <meta charset="utf-8">
                <meta name="author" content="MateuszMatusiak">
                <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
            </head>

            <body style="font-family: '.$tekst.', sans-serif;">
                <div style="padding: 25px; background-color: navajowhite; margin: auto;width: 80%; text-align: center;">
                    <h1>EMAIL WERYFIKACYJNY</h1>
                    <h4 style="font-weight: 100;">Ta wiadomość została automatycznie wygenerowana w celu potwierdzenia twojego adresu email połaczonego z kontem o loginie:'.$username.'.Jesli dane sie zgadzaja wcisnij przycisk ponizej, natomiast jeśli wiadomość trafiła do ciebie przypadkiem pomiń ją lub usuń.</h4>
                    <a href="http://mateusz-matusiak.pl/weryfikacja.php?kod='.$kod.'"><button style="color: white;border: 0px; background-color: limegreen;padding: 10px;width: 20%;font-weight: 600;font-size: 15px; font-family:'.$tekst.', sans-serif;" type="button" class="">WERYFIKACJA</button></a>
                        <h5>Pozdrawia administracja serwer.pl</h5>
                </div>
            </body>
            </html>

            ';
        $headers = "Content-type:text/html;charset=UTF-8";
        mail($email, $tytul, $tresc, $headers);
        array_push($succes, "Email weryfikacyjny został ponownie wysłany");

	}
	if (isset($_POST['reg_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        
		if (empty($username)) { array_push($errors, "Nie podałes nazwy"); }
		if (empty($email)) { array_push($errors, "Nie podałes adresu email"); }
		if (empty($password_1)) { array_push($errors, "Nie podałes hasła"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Podane hasła są różne");
		}
 
        if (count($errors) == 0) {       
            $uppercase = preg_match('@[A-Z]@', $password_1);
            $lowercase = preg_match('@[a-z]@', $password_1);
            $number    = preg_match('@[0-9]@', $password_1);
            $specialChars = preg_match('@[^\w]@', $password_1);
            if (strlen($password_1) >= 8){
                if (!$uppercase){
                    array_push($errors, "Twoje hasło musi zawierać conajmniej jedna dużą literę");
                }                
                if (!$lowercase){
                    array_push($errors, "Twoje hasło musi zawierać conajmniej jedna małą literę");
                }             
                if (!$number){
                    array_push($errors, "Twoje hasło musi zawierać liczbe");
                }
            }
            else {
                array_push($errors, "Twoje hasło jest za słabe");
            }
        }
        
        if (count($errors) == 0) {
			$query = "SELECT * FROM users WHERE username='$username'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) >= 1) {
				array_push($errors, "Jest juz konto o takiej nazwie");
			}
		}
        
        if (count($errors) == 0) {
			$query = "SELECT * FROM users WHERE email='$email'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) >= 1) {
				array_push($errors, "Jest juz konto o takim adresie email");
			}
		}

		if (count($errors) == 0) {
			$password = md5($password_1);
			$kod = md5($username);
			$query = "INSERT INTO users (username, email, password, kod) 
					  VALUES('$username', '$email', '$password', '$kod')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['wer'] = "czeka";
			$_SESSION['useremail'] = $email;
			$_SESSION['success'] = "Twoje konto zostało pomyślnie założone"; 
            $tytul = "MRSIHORO.PL wiadomość weryfikacyjna";
            $kod = md5($username);
    		$query3 = "UPDATE users SET kod='$kod' WHERE username='$username'";
    		mysqli_query($db, $query3);
            $tekst = "Quicksand";
            $tresc = 
                '
                <html lang="pl">
                <head>
                    <meta charset="utf-8">
                    <meta name="author" content="MateuszMatusiak">
                    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
                </head>

                <body style="font-family: '.$tekst.', sans-serif;">
                    <div style="padding: 25px; background-color: navajowhite; margin: auto;width: 80%; text-align: center;">
                        <h1>EMAIL WERYFIKACYJNY</h1>
                        <h4 style="font-weight: 100;">Ta wiadomość została automatycznie wygenerowana w celu potwierdzenia twojego adresu email połaczonego z kontem o loginie:'.$username.'.Jesli dane sie zgadzaja wcisnij przycisk ponizej, natomiast jeśli wiadomość trafiła do ciebie przypadkiem pomiń ją lub usuń.</h4>
                        <a href="http://mateusz-matusiak.pl/weryfikacja.php?kod='.$kod.'"><button style="color: white;border: 0px; background-color: limegreen;padding: 10px;width: 20%;font-weight: 600;font-size: 15px; font-family:'.$tekst.', sans-serif;" type="button" class="">WERYFIKACJA</button></a>
                            <h5>Pozdrawia administracja serwer.pl</h5>
                    </div>
                </body>
                </html>
    
                ';
            $headers = "Content-type:text/html;charset=UTF-8";
            mail($email, $tytul, $tresc, $headers);
    		header('location: weryfikacja_c.php');
            array_push($succes, "Twoje konto zostało poprawnie utworzone");
            
		}

	}
    if (isset($_POST['change_email'])) {
        $user = $_SESSION['username'];
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$new_email_1 = mysqli_real_escape_string($db, $_POST['new_email_1']);
		$new_email_2 = mysqli_real_escape_string($db, $_POST['new_email_2']);
        
		if (empty($new_email_1)) { array_push($errors, "Nie podałes nowego maila"); }
		if (empty($password)) { array_push($errors, "Nie podałes hasła"); }

		if ($new_email_1 != $new_email_2) {
			array_push($errors, "Podane maile są różne");
		}
        
        if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT username FROM users WHERE username='$user' and password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 0) {
				array_push($errors, "Błedne hasło");
			}
		}

		if (count($errors) == 0) {
			$query = "UPDATE users SET email='$new_email_2' WHERE username='$user'";
			mysqli_query($db, $query);
            array_push($succes, "Email został poprawnie zmieniony");
		}

	}
    if (isset($_POST['change_pass'])) {
        $user = $_SESSION['username'];
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$newpassword_1 = mysqli_real_escape_string($db, $_POST['newpassword_1']);
		$newpassword_2 = mysqli_real_escape_string($db, $_POST['newpassword_2']);
        
		if (empty($newpassword_1)) { array_push($errors, "Nie podałes nowego hasła"); }
		if (empty($password)) { array_push($errors, "Nie podałes hasła"); }

		if ($newpassword_1 != $newpassword_2) {
			array_push($errors, "Podane hasła są różne");
		}
        
        if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT username FROM users WHERE username='$user' and password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 0) {
				array_push($errors, "Błedne hasło");
			}
		}

		if (count($errors) == 0) {
			$password = md5($newpassword_2);
			$query = "UPDATE users SET password='$password' WHERE username='$user'";
			mysqli_query($db, $query);
            array_push($succes, "Hasło zostało poprawnie zmienione");
		}

    }
    if (isset($_POST['add_post'])) {
        $user = $_SESSION['username'];
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$wiad = mysqli_real_escape_string($db, $_POST['wiad']);
        
		if (empty($title)) { array_push($errors, "Nie podałes tytułu posta"); }
		if (empty($wiad)) { array_push($errors, "Nie podałes treści posta"); }

		if (count($errors) == 0) {
            $data = date('Y-m-d');
			$query = "INSERT INTO post (autor, tresc, tyt, dzien) VALUES('$user', '$wiad', '$title', '$data')";
			mysqli_query($db, $query);
			//header('location: #');
            array_push($succes, "Twój post został dodany");

		}
    }
    if (isset($_POST['remove_post'])) {
        $user = $_SESSION['username'];
		$id = mysqli_real_escape_string($db, $_POST['id']);
		if (empty($id)) { array_push($errors, "Brak id posta"); }

		if (count($errors) == 0) {
            $query = "DELETE FROM post WHERE id='$id'";
            mysqli_query($db, $query);
			header('location: #');
            array_push($succes, "Twój post został usuniety");

		}
    }



    if (isset($_POST['change_des'])) {
        $user = $_SESSION['username'];
		$description = mysqli_real_escape_string($db, $_POST['opis']);
        
		if (empty($description)) { array_push($errors, "Nie podałes zadnej wiadomosci"); }

		if (count($errors) == 0) {
			$query = "UPDATE users SET opis='$description' WHERE username='$user'";
			mysqli_query($db, $query);
			header('location: ');
            array_push($succes, "Twój opis został zmieniony");

		}

    }
    
    if (isset($_POST['change_wiek'])) {
        $user = $_SESSION['username'];
		$wiek = mysqli_real_escape_string($db, $_POST['wiek']);
        
		if (empty($wiek)) { array_push($errors, "Nie podałes wieku"); }

		if (count($errors) == 0) {
			$query = "UPDATE usersinfo SET wiek='$wiek' WHERE login='$user'";
			mysqli_query($db, $query);
			header('location: ');
            array_push($succes, "Twój wiek został zmieniony");

		}

    }
    
    if (isset($_POST['change_pol'])) {
        $user = $_SESSION['username'];
        $miasto = "";
		$miasto = mysqli_real_escape_string($db, $_POST['miasto']);
		$panstwo = mysqli_real_escape_string($db, $_POST['panstwo']);
        
		if (empty($panstwo)) { array_push($errors, "Nie podałes państwa"); }

		if (count($errors) == 0) {
			$query = "UPDATE usersinfo SET kraj='$panstwo', miasto='$miasto' WHERE login='$user'";
			mysqli_query($db, $query);
			header('location: ');
            array_push($succes, "Twóje miejsce zamieszkania zostało zmienione");

		}

    }
    
    
	if (isset($_POST['get_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
        
		if (empty($username)) { array_push($errors, "Nie podałes nazwy"); }
		if (empty($email)) { array_push($errors, "Nie podałes adresu email"); }
		if (empty($password_1)) { array_push($errors, "Nie podałes hasła"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Podane hasła są różne");
		}
        
        if (count($errors) == 0) {
			$nick = md5($username);
			$query = "SELECT * FROM users WHERE username='$username'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) >= 1) {
				array_push($errors, "Jest juz konto o takiej nazwie");
			}
		}
        
        if (count($errors) == 0) {
			$nick = md5($email);
			$query = "SELECT * FROM users WHERE email='$email'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) >= 1) {
				array_push($errors, "Jest juz konto o takim adresie email");
			}
		}

		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Twoje konto zostało pomyślnie założone";
			header('location: register2.php');
		}

	}
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		if (empty($username)) {array_push($errors, "Nie podałes nazwy");}
		if (empty($password)) {array_push($errors, "Nie podałes hasła");}
		if (count($errors) == 0) {
			$password = md5($password);
            
			$query = "SELECT * FROM users WHERE username='$username' OR email='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
                $zapytanie = "SELECT * FROM users WHERE username='$username' OR email='$username'";
                $results3 = mysqli_query($db, $zapytanie);
                $ilu_userow = $results3->num_rows;
                if($ilu_userow>0)
                {
                    $wiersz = $results3->fetch_assoc();
                    $_SESSION['kod'] = $wiersz['kod'];
                    $_SESSION['useremail'] = $wiersz['email'];
                    $_SESSION['username'] = $wiersz['username'];

                }
                $username = $_SESSION['username'];
                $zapytanie = "SELECT * FROM usersinfo WHERE login='$username'";
                $results3 = mysqli_query($db, $zapytanie);
                $ilu_userow = $results3->num_rows;
                if($ilu_userow>0)
                {
                    $wiersz = $results3->fetch_assoc();
                    $_SESSION['userplec'] = $wiersz['plec'];
                    $_SESSION['userwiek'] = $wiersz['wiek'];
                    $_SESSION['userhobby1'] = $wiersz['hobby1'];
                    $_SESSION['userhobby2'] = $wiersz['hobby2'];
                    $_SESSION['userhobby3'] = $wiersz['hobby3'];
                    $_SESSION['userhobby4'] = $wiersz['hobby4'];
                    $_SESSION['userhobby5'] = $wiersz['hobby5'];
                    $_SESSION['userhobby1'] = $wiersz['hobby6'];
                    $_SESSION['userhobby2'] = $wiersz['hobby7'];
                    $_SESSION['userhobby3'] = $wiersz['hobby8'];
                    $_SESSION['userhobby4'] = $wiersz['hobby9'];
                    $_SESSION['userhobby5'] = $wiersz['hobby10'];
                } 
                array_push($errors, $_SESSION['kod']);
                if ($_SESSION['kod'] == "true"){
                    $_SESSION['wer'] = "tak";
                    $query = "SELECT * FROM usersinfo WHERE login='$username'";
                    $results2 = mysqli_query($db, $query);

                    if (mysqli_num_rows($results2) == 1 ) {
                        header('location: start.php');
                    }
                    else{
                        header('location: register2.php');
                    }
                }
                else{
                    header('location: weryfikacja_c.php');
                }
            }else 
            {array_push($errors, "Błędne dane logowania");}
		}
	}
	if (isset($_POST['select'])) {
        $user = $_SESSION['username']; 
        $zapytanie = "SELECT * FROM usersinfo WHERE login='$user'";
        $results3 = mysqli_query($db, $zapytanie);
        $ilu_userow = $results3->num_rows;
        if($ilu_userow>0)
        {
            $wiersz = $results3->fetch_assoc();
            $_SESSION['plec'] = $wiersz['plec'];
            $_SESSION['wiek'] = $wiersz['wiek'];
            $_SESSION['hobby1'] = $wiersz['hobby1'];
            $_SESSION['hobby2'] = $wiersz['hobby2'];
            $_SESSION['hobby3'] = $wiersz['hobby3'];
            $_SESSION['hobby4'] = $wiersz['hobby4'];
            $_SESSION['hobby5'] = $wiersz['hobby5'];
            $_SESSION['hobby6'] = $wiersz['hobby6'];
            $_SESSION['hobby7'] = $wiersz['hobby7'];
            $_SESSION['hobby8'] = $wiersz['hobby8'];
            $_SESSION['hobby9'] = $wiersz['hobby9'];
            $_SESSION['hobby10'] = $wiersz['hobby10'];
            $_SESSION['kraj'] = $wiersz['kraj'];
        }
        
        $wiekmin = ($_SESSION['wiek']-2);
        $wiekmax = ($_SESSION['wiek']+2);
		$zapytanie2 = "SELECT * FROM usersinfo";
        $results4 = mysqli_query($db, $zapytanie2);
        while ($row=mysqli_fetch_row($results4)){
            $friend = $row['1'];
            $query = "SELECT * FROM usersfriends WHERE user='$user' AND friend='$friend'";
            $results2 = mysqli_query($db, $query);

            if (mysqli_num_rows($results2) == 0 && $row['1'] != $_SESSION['username']){
                $zgodnosc = 1;
                if ( $_SESSION['hobby1'] != "brak"  && ($row['4'] == $_SESSION['hobby1'] || $row['5'] == $_SESSION['hobby1'] || $row['6'] == $_SESSION['hobby1'] || $row['7'] == $_SESSION['hobby1']  || $row['8'] == $_SESSION['hobby1'] || $row['9'] == $_SESSION['hobby1'] || $row['10'] == $_SESSION['hobby1'] || $row['11'] == $_SESSION['hobby1'] || $row['12'] == $_SESSION['hobby1'] || $row['13'] == $_SESSION['hobby1']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby2'] != "brak"  && ($row['4'] == $_SESSION['hobby2'] || $row['5'] == $_SESSION['hobby2'] || $row['6'] == $_SESSION['hobby2'] || $row['7'] == $_SESSION['hobby2']  || $row['8'] == $_SESSION['hobby2'] || $row['9'] == $_SESSION['hobby2'] || $row['10'] == $_SESSION['hobby2'] || $row['11'] == $_SESSION['hobby2'] || $row['12'] == $_SESSION['hobby2'] || $row['13'] == $_SESSION['hobby2']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby3'] != "brak"  && ($row['4'] == $_SESSION['hobby3'] || $row['5'] == $_SESSION['hobby3'] || $row['6'] == $_SESSION['hobby3'] || $row['7'] == $_SESSION['hobby3']  || $row['8'] == $_SESSION['hobby3'] || $row['9'] == $_SESSION['hobby3'] || $row['10'] == $_SESSION['hobby3'] || $row['11'] == $_SESSION['hobby3'] || $row['12'] == $_SESSION['hobby3'] || $row['13'] == $_SESSION['hobby3']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby4'] != "brak"  && ($row['4'] == $_SESSION['hobby4'] || $row['5'] == $_SESSION['hobby4'] || $row['6'] == $_SESSION['hobby4'] || $row['7'] == $_SESSION['hobby4']  || $row['8'] == $_SESSION['hobby4'] || $row['9'] == $_SESSION['hobby4'] || $row['10'] == $_SESSION['hobby4'] || $row['11'] == $_SESSION['hobby4'] || $row['12'] == $_SESSION['hobby4'] || $row['13'] == $_SESSION['hobby4']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby5'] != "brak"  && ($row['4'] == $_SESSION['hobby5'] || $row['5'] == $_SESSION['hobby5'] || $row['6'] == $_SESSION['hobby5'] || $row['7'] == $_SESSION['hobby5']  || $row['8'] == $_SESSION['hobby5'] || $row['9'] == $_SESSION['hobby5'] || $row['10'] == $_SESSION['hobby5'] || $row['11'] == $_SESSION['hobby5'] || $row['12'] == $_SESSION['hobby5'] || $row['13'] == $_SESSION['hobby5']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby6'] != "brak"  && ($row['4'] == $_SESSION['hobby6'] || $row['5'] == $_SESSION['hobby6'] || $row['6'] == $_SESSION['hobby6'] || $row['7'] == $_SESSION['hobby6']  || $row['8'] == $_SESSION['hobby6'] || $row['9'] == $_SESSION['hobby6'] || $row['10'] == $_SESSION['hobby6'] || $row['11'] == $_SESSION['hobby6'] || $row['12'] == $_SESSION['hobby6'] || $row['13'] == $_SESSION['hobby6']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby7'] != "brak"  && ($row['4'] == $_SESSION['hobby7'] || $row['5'] == $_SESSION['hobby7'] || $row['6'] == $_SESSION['hobby7'] || $row['7'] == $_SESSION['hobby7']  || $row['8'] == $_SESSION['hobby7'] || $row['9'] == $_SESSION['hobby7'] || $row['10'] == $_SESSION['hobby7'] || $row['11'] == $_SESSION['hobby7'] || $row['12'] == $_SESSION['hobby7'] || $row['13'] == $_SESSION['hobby7']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby8'] != "brak"  && ($row['4'] == $_SESSION['hobby8'] || $row['5'] == $_SESSION['hobby8'] || $row['6'] == $_SESSION['hobby8'] || $row['7'] == $_SESSION['hobby8']  || $row['8'] == $_SESSION['hobby8'] || $row['9'] == $_SESSION['hobby8'] || $row['10'] == $_SESSION['hobby8'] || $row['11'] == $_SESSION['hobby8'] || $row['12'] == $_SESSION['hobby8'] || $row['13'] == $_SESSION['hobby8']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby9'] != "brak"  && ($row['4'] == $_SESSION['hobby9'] || $row['5'] == $_SESSION['hobby9'] || $row['6'] == $_SESSION['hobby9'] || $row['7'] == $_SESSION['hobby9']  || $row['8'] == $_SESSION['hobby9'] || $row['9'] == $_SESSION['hobby9'] || $row['10'] == $_SESSION['hobby9'] || $row['11'] == $_SESSION['hobby9'] || $row['12'] == $_SESSION['hobby9'] || $row['13'] == $_SESSION['hobby9']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                if ( $_SESSION['hobby10'] != "brak"  && ($row['4'] == $_SESSION['hobby10'] || $row['5'] == $_SESSION['hobby10'] || $row['6'] == $_SESSION['hobby10'] || $row['7'] == $_SESSION['hobby10']  || $row['8'] == $_SESSION['hobby10'] || $row['9'] == $_SESSION['hobby10'] || $row['10'] == $_SESSION['hobby10'] || $row['11'] == $_SESSION['hobby10'] || $row['12'] == $_SESSION['hobby10'] || $row['13'] == $_SESSION['hobby10']))
                {
                    $zgodnosc = $zgodnosc+1;
                }
                $zgd=ceil((9*$zgodnosc));
                $user=$_SESSION['username']; 
                $user2=$row['1'];
                echo $user2." _ ".$zgd."<br>";
                $query = "INSERT INTO usersfit (slogin, zlogin, zgodnosc) VALUES('$user', '$user2', '$zgd')";
                mysqli_query($db, $query);
            }
            else {
            }

        }
        $zapytanie2 = "SELECT * FROM usersfit WHERE slogin='$user'";
        $results5 = mysqli_query($db, $zapytanie2);
        if (mysqli_num_rows($results5) > 0){
            $zapytanie = "SELECT slogin,zlogin,zgodnosc FROM usersfit WHERE slogin='$user' ORDER BY zgodnosc DESC LIMIT 1";
            $results3 = mysqli_query($db, $zapytanie);
            if($ilu_userow>0)
            {
                $wiersz = $results3->fetch_assoc();
                $_SESSION['lastfituser'] = $wiersz['zlogin'];
                $_SESSION['lastfituserzgd'] = $wiersz['zgodnosc'];
            }  
            echo "Wybrany: ".$_SESSION['lastfituser'];
            $userszuk = $_SESSION['lastfituser'];
            $zapytanie = "SELECT * FROM usersinfo WHERE login='$userszuk'";
            $results3 = mysqli_query($db, $zapytanie);
            if($ilu_userow>0)
            {
                $wiersz = $results3->fetch_assoc();
                $_SESSION['suserplec'] = $wiersz['plec'];
                $_SESSION['suserwiek'] = $wiersz['wiek'];
                $_SESSION['suserhobby1'] = $wiersz['hobby1'];
                $_SESSION['suserhobby2'] = $wiersz['hobby2'];
                $_SESSION['suserhobby3'] = $wiersz['hobby3'];
                $_SESSION['suserhobby4'] = $wiersz['hobby4'];
                $_SESSION['suserhobby5'] = $wiersz['hobby5'];
                $_SESSION['suserhobby6'] = $wiersz['hobby6'];
                $_SESSION['suserhobby7'] = $wiersz['hobby7'];
                $_SESSION['suserhobby8'] = $wiersz['hobby8'];
                $_SESSION['suserhobby9'] = $wiersz['hobby9'];
                $_SESSION['suserhobby10'] = $wiersz['hobby10'];
            }        
            $zapytanie = "SELECT * FROM users WHERE username='$userszuk'";
            $results3 = mysqli_query($db, $zapytanie);
            if($ilu_userow>0)
            {
                $wiersz = $results3->fetch_assoc();
                $_SESSION['suseremail'] = $wiersz['email'];
                $_SESSION['sopis'] = $wiersz['opis'];
                header('location: newfit.php');
            }
            $query = "INSERT INTO usersfriends (user, friend) VALUES('$user', '$userszuk')";
            mysqli_query($db, $query);
            $query = "INSERT INTO usersfriends (user, friend) VALUES('$userszuk', '$user')";
            mysqli_query($db, $query);
        }
        else {
            array_push($errors, "Niestety w tej chwili nie mamy dla ciebie żadnej osoby wpadnij za jakis czas");
        }
        $query = "DELETE FROM usersfit WHERE slogin = '$user'";
        mysqli_query($db, $query);

    }
	if (isset($_POST['change_hobby'])) {
		$zainteresowania = $_POST['checkbox'];
		if (empty($zainteresowania)) {
			array_push($errors, "Nie wybrałes co cie interesuje");
		}
        if (count($zainteresowania) >10){
			array_push($errors, "Mozesz wybrac tylko 10 zainteresowania");
        }
        for ($i = 0; $i <count($zainteresowania);$i++){           
            if ($zainteresowania[$i] != null){ 
                if ($z1 == "brak"){
                    $z1 = $zainteresowania[$i];
                }
                else{
                    if ($z2 == "brak"){
                        $z2 = $zainteresowania[$i];
                    }
                    else{
                        if ($z3 == "brak"){
                            $z3 = $zainteresowania[$i];
                        }
                        else{
                            if ($z4 == "brak"){
                                $z4 = $zainteresowania[$i];
                            }
                            else{
                                if ($z5 == "brak"){
                                    $z5 = $zainteresowania[$i];
                                }
                                else{
                                    if ($z6 == "brak"){
                                        $z6 = $zainteresowania[$i];
                                    }
                                    else{
                                        if ($z7 == "brak"){
                                            $z7 = $zainteresowania[$i];
                                        }
                                        else{
                                            if ($z8 == "brak"){
                                                $z8 = $zainteresowania[$i];
                                            }
                                            else{
                                                if ($z9 == "brak"){
                                                    $z9 = $zainteresowania[$i];
                                                }
                                                else{
                                                    if ($z10 == "brak"){
                                                        $z10 = $zainteresowania[$i];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }  
                }
            }
        }
        $user = $_SESSION['username'];
        if (count($errors) == 0) {
            if ($_SESSION['username'] != null){
                $query = "UPDATE usersinfo SET hobby1='$z1', hobby2='$z2', hobby3='$z3', hobby4='$z4', hobby5='$z5', hobby6='$z6', hobby7='$z7', hobby8='$z8', hobby9='$z9', hobby10='$z10' WHERE login='$user'";
                mysqli_query($db, $query);
                array_push($succes, "Twoje zainteresowania zostały poprawnie zmienione");
            }
            else{
                echo "Nie zalogowany";
            }
        }
    }
	if (isset($_POST['reg_user_two'])) {
		$wiek = mysqli_real_escape_string($db, $_POST['wiek']);
		$plec = mysqli_real_escape_string($db, $_POST['radio']);
        $kraj = mysqli_real_escape_string($db, $_POST['kraj']);
        $miasto = "";
		$miasto = mysqli_real_escape_string($db, $_POST['miasto']);
		$zainteresowania = $_POST['checkbox'];
		if (empty($wiek)) {
			array_push($errors, "Nie podałes swojego wieku");
		}
		if (empty($plec)) {
			array_push($errors, "Nie wybrałes płci");
		}
		if (empty($zainteresowania)) {
			array_push($errors, "Nie wybrałes co cie interesuje");
		}
		if (empty($kraj)) {
			array_push($errors, "Nie podałes kraju pochodzenia");
		}
        if (count($zainteresowania) >10){
			array_push($errors, "Mozesz wybrac tylko maksymalnie 10 zainteresowan");
        }
        for ($i = 0; $i <count($zainteresowania);$i++){           
            if ($zainteresowania[$i] != null){ 
                if ($z1 == "brak"){
                    $z1 = $zainteresowania[$i];
                }
                else{
                    if ($z2 == "brak"){
                        $z2 = $zainteresowania[$i];
                    }
                    else{
                        if ($z3 == "brak"){
                            $z3 = $zainteresowania[$i];
                        }
                        else{
                            if ($z4 == "brak"){
                                $z4 = $zainteresowania[$i];
                            }
                            else{
                                if ($z5 == "brak"){
                                    $z5 = $zainteresowania[$i];
                                }
                                else{
                                    if ($z6 == "brak"){
                                        $z6 = $zainteresowania[$i];
                                    }
                                    else{
                                        if ($z7 == "brak"){
                                            $z7 = $zainteresowania[$i];
                                        }
                                        else{
                                            if ($z8 == "brak"){
                                                $z8 = $zainteresowania[$i];
                                            }
                                            else{
                                                if ($z9 == "brak"){
                                                    $z9 = $zainteresowania[$i];
                                                }
                                                else{
                                                    if ($z10 == "brak"){
                                                        $z10 = $zainteresowania[$i];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }  
                }
            }
        }
        $user = $_SESSION['username'];
        if (count($errors) == 0) {
            if ($_SESSION['username'] != null){
                $query = "SELECT * FROM usersinfo WHERE login='$user'";
                $results2 = mysqli_query($db, $query);

                if (mysqli_num_rows($results2) == 1 ) {
                    array_push($errors, "Twoje dane są już zapisane w bazie");
                }
                else{
                    $query = "INSERT INTO usersinfo (login, plec, wiek, hobby1, hobby2, hobby3, hobby4, hobby5,hobby6, hobby7, hobby8, hobby9, hobby10, kraj, miasto) VALUES('$user', '$plec', '$wiek', '$z1', '$z2', '$z3', '$z4', '$z5', '$z6', '$z7', '$z8', '$z9', '$z10','$kraj' ,'$miasto')";
                    mysqli_query($db, $query);
                    $_SESSION['success'] = "Twoje dane zostały zapisane";
                    $_SESSION['userplec'] = $plec;
                    $_SESSION['userwiek'] = $wiek;
                    $_SESSION['userhobby1'] = $z1;
                    $_SESSION['userhobby2'] = $z2;
                    $_SESSION['userhobby3'] = $z3;
                    $_SESSION['userhobby4'] = $z4;
                    $_SESSION['userhobby5'] = $z5;
                    $_SESSION['userhobby6'] = $z6;
                    $_SESSION['userhobby7'] = $z7;
                    $_SESSION['userhobby8'] = $z8;
                    $_SESSION['userhobby9'] = $z9;
                    $_SESSION['userhobby10'] = $z10;
                    $_SESSION['kraj'] = $kraj;
                    $_SESSION['miasto'] = $miasto;
                    //header('location: start.php');
                }
            }
            else{
                echo "Nie zalogowany";
            }
        }
    }
	if (isset($_POST['wiadomosc_send'])) {
        if (isset($_SESSION['chatz'])) {
            $plogin = $_SESSION['username'];
            $clogin = $_SESSION['chatz'];
            $lastwiad = $_SESSION['lastwiad'];
            $wiadomosc = mysqli_real_escape_string($db, $_POST['wiadomosc2']);
            if ($wiadomosc != null && $_SESSION['lastwiad'] != $wiadomosc){
                $query = "INSERT INTO userswiad (id, plogin, clogin, wiad) 
                      VALUES('','$plogin', '$clogin', '$wiadomosc')";
                mysqli_query($db, $query);
                $liczba;
                $_SESSION['lastwiad'] = $wiadomosc;
                $zapytanie2 = "SELECT * FROM usersfriends WHERE user='$clogin' AND friend='$plogin'";
                $results4 = mysqli_query($db, $zapytanie2);
                while ($row=mysqli_fetch_row($results4)){
                    $liczba = $row['3'];
                    $liczba++;
                }
                $query4 = "UPDATE usersfriends SET nowawiad='$liczba' WHERE friend='$plogin' AND user='$clogin'";
                mysqli_query($db, $query4);
            }
        }
    }

    if(isset($_POST['upload_submit'])){
        $user = $_SESSION['username'];
        $file= $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $filesError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        
        $fileExt = explode('.',$_FILES['file']['name']);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','png','jpeg');
        if(in_array($fileActualExt,$allowed)){
            if($_FILES['file']['error'] ===  0){
                    $filename = "profiles/$user.png";
                    @unlink($filename);
                    if(is_file($filename)) {
                       echo "file was locked (or permissions error)";
                    }  

                    $filename = "profiles/$user.jpg";
                    @unlink($filename);
                    
                    if(is_file($filename)) {
                       echo "file was locked (or permissions error)";
                    }

                    
                    $filename = "profiles/$user.jpeg";
                    @unlink($filename);
                    
                    if(is_file($filename)) {
                       echo "file was locked (or permissions error)";
                    }

                    
                    $fileNameNew = $user.".".$fileActualExt;
                    $fileDestination = 'profiles/'.$fileNameNew;
                    move_uploaded_file($_FILES['file']['tmp_name'],$fileDestination);
                    array_push($succes, "Twoje zdjecie zostało poprawnie zmienione. Pamietaj jednak ze załadowanie nowego zdjecia na stronie moze chwile potrwać");
            }else{
                array_push($errors, "Wystapił problem przy przesyłaniu twojego pliku");
            }
        }else{
			array_push($errors, "Nie mozesz przesłac pliku w takim formacie");
        }

    }
?>