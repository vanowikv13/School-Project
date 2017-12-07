<?php
session_start();
$mes;
if($_SESSION['hajs'] < $_POST['money']) {
    
    $mes = $_POST['money'] - $_SESSION['hajs'];
    $_SESSION['MESSAGE'] = "Za mało środków na koncie<br />Brakuje ci: $mes<br />";
    $_SESSION['transaction'] = false;
}
else {
    $mes = $_SESSION['hajs'] - $_POST['money'];
    $mes = "Tranzakcja przebiegła pomyślnie<br>Na koncie zostało ci: $mes<br>";
    $_SESSION['MESSAGE'] = $mes;
    $_SESSION['transaction'] = true;
    $_SESSION['hajs'] =$_SESSION['hajs'] - $_POST['money'];
    $_SESSION['money'] = $_POST['money'];
}

header('Location: afterlog.php');

?>