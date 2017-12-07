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
<?php

	$conn = new mysqli("localhost","root","","firma_nowicki");
    $section = $_POST['section'];
    $sql = 'select count(stanowisko) from pracownicy where stanowisko = \''.$section.'\'';
	if(!$result = $conn->query($sql)){
		echo "query is faild";
	}
    $row = $result->fetch_array(MYSQLI_NUM);
    echo "Pracowników w dziale: ".$section." Pracuje: ".$row[0];
    
    
?>
        
</div>
</body>
</html>