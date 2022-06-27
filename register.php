<?php include('server.php') ?>
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
    <link rel="stylesheet" href="tesy3.css?<?php echo rand(); ?>">
</head>

<body>
    <div class="tlo container-fluid">
        <div class="row justify-content-md-center">
            <div class="regcolmain col-lg-4 col-sm-6">
                <form action="register.php" method="post" >
                    <div class="row justify-content-md-center">       
                        <div class="text-center col-sm-8">
                            <h2>REJESTRACJA</h2>
                            <?php include('errors.php'); ?>
                        </div>
                        <div class="col-10">
                            <input class="reginput" type="text" name="username" placeholder="Login">
                        </div>
                        <div class="col-10">
                            <input class="reginput" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-10">
                            <input class="reginput" type="password" name="password_1" placeholder="Hasło">
                        </div>
                        <div class="col-10">
                            <input class="reginput" type="password" name="password_2" placeholder="Powtórz hasło">
                        </div>
                        <div class="col-10">
                            <button class="regbutton" name="reg_user" type="submit">STWÓRZ KONTO</button>
                        </div>
                        <div class="text-center regminitext col-10">Masz już konto? <button class="regbuttonmini"> <a href="login.php">ZALOGUJ SIE</a> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    
    
</html>