<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Komis Samochodowy</title>
    <link rel="stylesheet" type="text/css" href="auto.css" />
</head>
<body>
    <div class="Baner">
        SAMOCHODY
    </div>
    <div class="Left">
        <h2>Wykaz samochodów</h2>
        <?php

            $conn = new mysqli("localhost","root","","komis");
            $file = fopen("kwerendy.txt","r");
            $sql1 = fgets($file);
            $sql2 = fgets($file);
            if(!$result = $conn->query($sql1))
                echo "zapytanie się nie powiodło<br>";
            echo "<ul>";
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                    echo "<li>".$row["id"]." ".$row["marka"]." ".$row["model"]."</li>";
            }
            echo "</ul>";
            echo "<h2>Zamówienie</h2>";
            echo "<ul>";
            if(!$result = $conn->query($sql2))
                echo "zapytanie się nie powiodło<br>";
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                    echo "<li>".$row["id"]." ".$row["Klient"]."</li>";
            }
            echo "</ul>";
            
            

        ?>
    </div>
    <div class="Right">
        <h2>Pełne dane: Fiat</h2><br>
        <?php
            $conn = new mysqli("localhost","root","","komis");
            $file = fopen("kwerendy.txt","r");
            for($i=0;$i<3;$i++)
                $sql = fgets($file);
            if(!$result = $conn->query($sql))
                echo "zapytanie się nie powiodło<br>";
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                    echo $row["id"]." / ".$row["marka"]." / ".$row["model"]." / ".$row["rocznik"]." / ".$row["kolor"]." / ".$row["stan"],"<br>";
            }
        ?>
    </div>
    <div class="Stopka">
        <table>
            <tr>
                <td><a href="kwerendy.txt">Kwerendy</a></td>
                <td>Autor: Mariusz Nowicki</td>
                <td><img src="egzamin/auto.png" alt="komis samochodowy"/></td>
            </tr>
        </table>
    </div>
</body>
</html>