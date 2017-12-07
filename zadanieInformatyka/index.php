<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Strona internetowa</title>
    <meta charset="utf-8">
</head>




<body>
    <div class="baner">
        Baner
    </div>
    <div class="left">
        <?php
        $conn = new mysqli("localhost","root","","movedb");
        $result = $conn->query("select * from pracownicy where Nazwisko like 'B%';");
        while($row = $result->fetch_assoc()) {
            echo "Nazwisko: ".$row["Nazwisko"]."<br>";
        }

        ?>
    </div>
    <div class="right">
        Arka gdynia
    </div>
</body>

</html>