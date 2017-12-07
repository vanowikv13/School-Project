<?php 
    session_start();
    if (!isset($_SESSION['zalogowany']) && ($_SESSION['status'] == true))
    {
	   header('Location: index.php');
	   exit();
    } 
    $value = 0;
    require_once "connectx.php";
    $con = @new mysqli('localhost','root','','link');
    $lk = $_POST['link'];
    $op = $_POST['opis'];

    if($_POST['hide'] == '1')
        $uk = 1;
    else
        $uk = 0;
    $sql = "insert into links(data,opis,ukryty)values('$lk','$op','$uk')";
    if($con->query($sql)) {
        $value = 1;
    }
    

    if($value == 1){    
        $_SESSION['nadanie'] = '<span style="color:red">Nadanie linka udało się</span><br>';
        $_SESSION['statusNad'] = '1';
        header('Location: index.php');
    }
    else {
        $_SESSION['nadanie'] = '<span style="color:red">Nadanie linka nie udało się</span><br>';
        $_SESSION['statusNad'] = '1';
        header('Location: index.php');
    }
?>