<?php
    require_once "connectx.php";
    $con = @new  mysqli($host,$db_user,$db_password,$db_name);
    $del = $_POST['delete'];
    if($con->query("delete from links WHERE opis = '$del'")){
            $_SESSION['nadanie'] = '<br><span style="color:red">Udało się usunąć linka</span><br>';
            $_SESSION['statusNad'] = '1';
            header('Location: index.php');
    }
    else {
            $_SESSION['nadanie'] = '<br><span style="color:red">Nie Udało się usunąć linka</span><br>';
            $_SESSION['statusNad'] = '1';
            header('Location: index.php');
    }
?>