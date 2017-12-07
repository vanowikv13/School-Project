<?php
    $imie = $_POST["name"];
    $nazwisko = $_POST["surname"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $adres = $_POST["adres"];
    $telefon = $_POST["phone"];
    $haslo = $_POST["password"];
    $con = @new mysqli('localhost','root','','logowanie');
    $sql = "insert into dane_uzyt(login,nazwisko,imie,email,adres,telefon)values('$login','$nazwisko','$imie','$email','$adres','$telefon');";
    $con->query($sql);
    if($con->query("insert into uzyt(login,haslo) values('$login','$haslo'
    );")) {
            $_SESSION['nadanie'] = '<br><span style="color:red">Dodanie uzytkownika powiodło się</span><br>';
            $_SESSION['statusNad'] = '1';
            header('Location: index.php');
    }

            $_SESSION['nadanie'] = '<br><span style="color:red">Dodanie uzytkownika nie powiodło się</span><br>';
            $_SESSION['statusNad'] = '1';
            header('Location: index.php');
?>