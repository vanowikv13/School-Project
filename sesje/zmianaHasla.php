<?php

    session_start();
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }
	$login = $_POST["login"];
	$haslo = $_POST["oldPassword"];
	$newPass = $_POST["newPassword"];
	$con = @new mysqli('localhost', 'root', '', 'logowanie');
	$zap = "select * from uzyt;";
	$changePass = false;
	
	$result = @$con->query($zap);
	$users = $result->num_rows;
	if($users > 0) {
		while($row = $result->fetch_assoc()) {
			foreach($row as $value){
				if($row['login'] == $login && $haslo == $row['haslo']){
					if(!($row['haslo'] == $newPass)) {
						@$con->query("update uzyt set haslo = '$newPass' where login = '$login';");
						$changePass = true;
						break;
					}
					else {
						echo "podales takie samo haslo jak miałeś<br>";
						break;
					}
				}
			}
		}
		
	}
	else echo "Liczba uzytkownikow jest mniejsza niz 0 <br>";
	//write if haslo was change
	if($changePass) {
                $_SESSION['nadanie'] = '<span style="color:red">Zmiana hasła udała się</span><br>';
        $_SESSION['statusNad'] = '1';
        header('Location: index.php');
    }
	else {
                $_SESSION['nadanie'] = '<span style="color:red">Zmiana hasła nie udała się</span><br>';
        $_SESSION['statusNad'] = '1';
        header('Location: index.php');
    }
?>