<?php 
    include('server.php');
	if (isset($_SESSION['chatz'])) {
        $do = $_SESSION['chatz'];
        $nick = ($_SESSION['username']);
        $zapytanie2 = "SELECT * FROM userswiad WHERE plogin='$nick' AND clogin = '$do' OR plogin= '$do' AND clogin= '$nick' ORDER by id DESC Limit 15";
        $results4 = mysqli_query($db, $zapytanie2);
        while ($row=mysqli_fetch_row($results4)){
            if ($row['1'] == $nick){
                echo "<p style='padding-right: 25px; border-bottom: 1px solid gray; text-align: right;'>".$row['3']."</p>";
            }
            else{
                echo "<p style='padding-left: 25px; border-bottom: 1px solid gray; text-align: left;'><b style='color: green;'>".$row['1'].":</b> ".$row['3']."</p>";
            }
        }
    }
?>
