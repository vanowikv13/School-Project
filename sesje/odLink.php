<?php
    session_start();
    echo "<a href='index.php'>Strong Główna</a><br>";
        if(isset($_SESSION['nadanie']) &&($_SESSION['statusNad'] == '1')){
            echo $_SESSION['nadanie'];
            $_SESSION['statusNad'] = '0';
        }

            $check = 0;
            require_once "connectx.php";
	        $con = @new  mysqli($host,$db_user,$db_password,$db_name);
            $sql="select * from links where ukryty = 1;";
            if($result = @$con->query($sql)){
                while($row = $result->fetch_assoc()) {
                    foreach($row as $value) {
                        $opi = $row['opis'];
                        $odkName = $_POST['odk'];
                        if($opi == $odkName) {
                            @$con->query("update links set ukryty = 0 where opis = '$opi';");
                            echo "okdrycie linka udało się";
                            $check = 1;
                            break;
                        }
                    }
                }
            }
            else {
                $_SESSION['nadanie'] = '<span style="color:red">something go wrong but i dont know what its your problem not mine</span><br>';
                $_SESSION['statusNad'] = '1';
                header('Location: index.php');
            }
        if(!$check) {
                $_SESSION['nadanie'] = '<span style="color:red">Odkrycie linka nie udało się</span><br>';
                $_SESSION['statusNad'] = '1';
                header('Location: index.php');
        }
        else {
            $_SESSION['nadanie'] = '<span style="color:red">Odkrycie linka udało się</span><br>';
            $_SESSION['statusNad'] = '1';
            header('Location: index.php');                      
        }
        
    ?>