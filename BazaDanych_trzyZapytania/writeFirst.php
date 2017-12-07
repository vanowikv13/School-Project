<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="left">
	<a href="writeFirst.php">Wypisywanie po wartosci</a><br>
	<a href="writeDate.php">Wypisanie dzisiejszej daty</a><br>
	<a href="writeSection1.php">Ilu pracowników pracują w poszczególnym dziale</a>
    </div>
    <div class="right">
        <form action="writeSecond.php" method="post">
            Pole do wypisania
            <select name="toWrite">
                <?php

                    $sql = "show columns from pracownicy;";
                    $con = mysqli_connect("localhost","root","","firma_nowicki");
                    if(mysqli_connect_errno())
                        echo "Connect failed ".mysqli_connect_errno();

                    if(!$result = mysqli_query($con,$sql))
                        echo "query is faild";
                        
                    while($row = mysqli_fetch_array($result))
                        echo "<option>".$row["Field"]."</option>";


                ?>
            </select>
        <br>Wartość po jakiej chcesz wypisać <input type="text" name="value"><br>
        <input type="submit">
        </form>
</div>
</body>
</html>