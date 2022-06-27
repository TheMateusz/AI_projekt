<?php 
    include('server.php');
    if (isset($_GET['kod'])) {
        $check = $_GET['kod'];
        $zapytanie = "SELECT * FROM users WHERE kod='$check'";
        $results3 = mysqli_query($db, $zapytanie);
        $ilu_userow = $results3->num_rows;
        if($ilu_userow>0)
        {
            $wiersz = $results3->fetch_assoc();
            $_SESSION['player'] = $wiersz['username'];
            $_SESSION['kodzik'] = $wiersz['kod'];
            if ($_SESSION['kodzik'] == $check){
                $player = $_SESSION['player'];
                $zapytanie = "UPDATE users SET kod = 'true' WHERE username = '$player'";
                $results3 = mysqli_query($db, $zapytanie);
                $_SESSION['wer'] = "tak";
                array_push($succes, "Twoje konto zostało zweryfikowane"); 
            }
        }
        else{
            $check = "true";        
            $zapytanie = "SELECT * FROM users WHERE kod='$check'";
            $results3 = mysqli_query($db, $zapytanie);
            $ilu_userow = $results3->num_rows;
            if($ilu_userow>0)
            {
                array_push($succes, "Twoje konto zostało juz zweryfikowane");
            }
        }
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
        <div class="row justify-content-md-center text-center">
            <div class="col-6">
                <?php include('succes.php'); ?> 
                <a name="" id="" class="btn btn-success" href="index.php" role="button">PRZEJDZ DO LOGOWANIA</a>
            </div>
        </div>
    </div>
</body>
    
    
</html>