<?php
    session_start();
    echo "Potwierdzenie pobrania pieniędzy<br>W wysokości: ".$_SESSION['money']."<br>";
    echo "Na koncie pozostało: ".$_SESSION['hajs']."<br>";
    echo "Wypłata wykonana: ".date("Y-m-d H:i")."<br>";
    echo "Bankomat znajduje się na ulicy. Maszewskiej<br> W ZS1 Goleniów w sali nr 8<br> Drugi komputer od projektora";
?>