<?php
    //it's need to be top on the document
    session_start();
    if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}
	require_once "conect.php";
	//connect with database
	//@ - delete error comunicate
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
	//Muting the errors
	if($polaczenie->connect_errno!=0) {
		echo "Error:".$polaczenie->connect_errno;
	}else { //here we have connection
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$sql = "SELECT * FROM uzyt where login = '$login' and haslo = '$haslo'";
		//when something going wrong
        $rezultat;
		if($rezultat = @$polaczenie->query($sql)) {
			
			$users = $rezultat->num_rows;
			
			if($users > 0) {
				//association array we can use name column from db
                $_SESSION['zalogowany'] = true;
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['login'] = $wiersz['login'];
                $_SESSION['admin'] = $wiersz['status'];
                //copy data from dane_uzyt----------
                $sql = "SELECT * FROM dane_uzyt where login = '$login'";
                $rezultat = @$polaczenie->query($sql);
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['imie'] = $wiersz['imie'];
                $_SESSION['nazwisko'] = $wiersz['nazwisko'];
                $_SESSION['adres'] = $wiersz['adres'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['telefon'] = $wiersz['telefon'];
                //destroy variable
                unset($_SESSION['blad']);
				$rezultat->close();
                //change document
                header("Location: dane.php");
			}else {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: zal.php');
			}
		}
		
		$polaczenie->close();
	}
?>