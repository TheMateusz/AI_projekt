<?php 
    include('server.php');
    echo "<link rel='stylesheet' type='text/css' href='main.css'>";
	if (isset($_SESSION['chatz'])) {
        $do = $_SESSION['chatz'];
        $nick = ($_SESSION['username']);
        $zapytanie1 = "SELECT * FROM usersinfo WHERE login='$nick'";
        $results2 = mysqli_query($db, $zapytanie1);
        while ($row=mysqli_fetch_row($results2)){
            $nickplec = $row[2];
        }
        $zapytanie1 = "SELECT * FROM usersinfo WHERE login='$do'";
        $results2 = mysqli_query($db, $zapytanie1);
        while ($row=mysqli_fetch_row($results2)){
            $doplec = $row[2];
        }
        $zapytanie2 = "SELECT * FROM userswiad WHERE plogin='$nick' AND clogin = '$do' OR plogin= '$do' AND clogin= '$nick' ORDER by id DESC Limit 15";
        echo "<link rel='stylesheet' type='text/css' href='CSS/main.css'>";
        $query4 = "UPDATE usersfriends SET nowawiad='0' WHERE friend='$do' AND user='$nick'";
        mysqli_query($db, $query4);
        $results4 = mysqli_query($db, $zapytanie2);
                        echo "<style>
.chatrow{
    margin-top: 10px;
    margin-bottom: 10px;
}
.chat_img{
    border: 1px solid #363636;
    background-color: #363636;
    border-radius: 25px;
    padding: 2px;
    transform: scale(1.0);
}
.chattext{
    margin-bottom: 0px;
    margin-top: 3px;
    border-radius: 10px;
    background-color: #363636;
    padding: 10px;
}
                    </style>";
        while ($row=mysqli_fetch_row($results4)){
            if ($row['1'] == $nick){
                echo "
                
                        <div class='row chatrow text-right'>
                            <div class='col-9 offset-1 chatcol'><p class='chattext'>".$row['3']."</p></div>
                            <div class='col-1'><img width='50px' class='img-fluid chat_img' src='img/".$nickplec.".png'></div>
                        </div>
                    ";
            }
            else{
                echo "
                    <div class='row chatrow text-left'>
                        <div class='col-1'><img width='50px' class='img-fluid chat_img' src='img/".$doplec.".png'></div>
                        <div class='col-9 chatcol'><p class='chattext'>".$row['3']."</p></div>
                    </div>
                ";
            }
        }
    }
?>
