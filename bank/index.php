<html>
<head>
</head>
<body>

<?php
session_start();
    $zablokowana = false;
    if(isset($_SESSION['PIN']))
        if($_SESSION['PIN']>=3){
            echo "Karta została zablokowana<br>";
            $zablokowana = true;
        }
    else if(isset($_SESSION['MESSAGE'])){
        echo $_SESSION['MESSAGE']."<br>";
        if(!isset($_SESSION['LOGED']))echo "Pozostało prób: ".(3 - $_SESSION['PIN'])."<br>";
    }
    
    if(isset($_SESSION['LOGED']) && $_SESSION['LOGED'] == "1") {
        $_SESSION['hajs'] = 1000.00;
        header('Location: afterlog.php');
    }else {
    
    if($zablokowana == false){
        echo'
        <h1>Witaj w naszym banku</h1>
        <h2>Podaj PIN</h2>
        <form method="post" action="check.php">
            PIN: <input type="password" name="PIN"><br><br>
            <input type="submit">
        </form>';
    }
    }
?>
</body>
</html>