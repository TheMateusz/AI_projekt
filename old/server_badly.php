<?php 
	session_start();
	$username = "";
	$email = "";
	$errors = array(); 
	$_SESSION['success'] = "";
    $wiek = "";
    $plec = "";
    $z1 = "brak";
    $z2 = "brak";
    $z3 = "brak";

	$db = mysqli_connect('localhost', 'root', '', 'test');

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

		if (empty($username)) {
			array_push($errors, "Nie podałes nazwy");
		}
		if (empty($password)) {
			array_push($errors, "Nie podałes hasła");
		}

        
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
                
            $zapytanie = "SELECT * FROM users WHERE username='$username'";
			$results3 = mysqli_query($db, $zapytanie);
            $ilu_userow = $results3->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $results3->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['username'];
				$_SESSION['email'] = $wiersz['email'];
				
			}
                
            }else {
                array_push($errors, "Błędne dane logowania");
            }
		}
	}







	if (isset($_POST['reg_user_two'])) {
		$wiek = mysqli_real_escape_string($db, $_POST['wiek']);
		$plec = mysqli_real_escape_string($db, $_POST['radio']);
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
        if (count($zainteresowania) >3){
			array_push($errors, "Mozesz wybrac tylko 3 zainteresowania");
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
                    $query = "INSERT INTO usersinfo (login, plec, wiek, hobby1, hobby2, hobby3) VALUES('$user', '$plec', '$wiek', '$z1', '$z2', '$z3')";
                    mysqli_query($db, $query);
                    $_SESSION['success'] = "Twoje dane zostały zapisane";
                    header('location: start.php');
                }
            }
            else{
                echo "Nie zalogowany";
            }
        }
    }
?>