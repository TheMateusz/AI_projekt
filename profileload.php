<?php 
    include('server.php');
    $nick = ($_SESSION['username']);
    $zapytanie2 = "SELECT * FROM usersfriends WHERE user='$nick'";
    $results4 = mysqli_query($db, $zapytanie2);
    while ($row=mysqli_fetch_row($results4)){

        if ($row[3] > 0){
            echo 
            "
            <div class='menufriend col-12 text-center'>
               <a href='menu.php?clicker=".$row[2]."'><button type='submit' class='menufrienditem' name='get_user'>".$row[2]." <span class='badge badge-warning'>".$row[3]."</span></button></a>
            </div>
    
            ";
        }
        else{
            echo 
            "
            <div class='menufriend col-12 text-center'>
               <a href='menu.php?clicker=".$row[2]."'><button type='submit' class='menufrienditem' name='get_user'>".$row[2]." </button></a>
            </div>
    
            ";
        }
    }
?>
