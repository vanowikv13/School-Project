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
	<form action="writeSection2.php" method="post">
		Dział do sprawdzenia
		<select name="section">
            <?php

                $sql = "select distinct stanowisko from pracownicy;";
                $conn = new mysqli("localhost","root","","firma_nowicki");
                if(!$result = $conn->query($sql)) {
                    echo "query is faild";
                }
                while($row = $result->fetch_array()){
                    echo "<option>".$row[0]."</option>";
                }

            ?>
        </select>
	<input type="submit">
	</form>
</div>
</body>
</html>