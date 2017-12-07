<?php
session_start();
if($_POST['PIN'] == "1234") {
    $_SESSION['LOGED'] = "1";
    $_SESSION['MESSAGE'] = "";
}
else{
    $_SESSION['MESSAGE'] = "błędny PIN";
    if(!isset($_SESSION['PIN'])){
        $_SESSION['PIN'] = 1;
    }
    else
        $_SESSION['PIN']++;

}



header('Location: index.php');

?>