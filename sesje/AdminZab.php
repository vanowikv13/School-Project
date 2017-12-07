<?php
session_start();
if (!isset($_SESSION['zalogowany']) && ($_SESSION['status'] == true))
{
	header('Location: index.php');
	exit();
}
$value = 0;
require_once "conect.php";
$con = @new mysqli('localhost','root','','logowanie');
if ($con->connect_errno!=0)
{
	echo "Error: ".$polaczenie->connect_errno;
}
else {
    if($_SESSION['login'] == $_POST['login']) {
        $sql = "select * from uzyt where status = true";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()) {
            foreach($row as $value){
                if($value == $_POST['delete']){
                    $log = $_POST['delete'];
                    if($con->query("update uzyt set status = '0' where login = '$log';"))
                        $value = 1;
                }
            }
        }
    }
}

    if($value == 1){    
        $_SESSION['nadanie'] = '<span style="color:red">Zabranie admina udało się</span><br>';
        $_SESSION['statusNad'] = '1';
        header('Location: index.php');
    }
    else {
        $_SESSION['nadanie'] = '<span style="color:red">Zabranie admina nie udało się</span><br>';
        $_SESSION['statusNad'] = '1';
        header('Location: index.php');
    }

?>