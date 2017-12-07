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

echo "<h1>".date("Y-m-d")."<h1>";

?>
</div>
</body>
</html>