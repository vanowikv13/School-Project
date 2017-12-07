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
	$sql1 = "show columns from pracownicy;";
	
	if(!$result1 = $conn->query($sql1)){
		echo "query is faild1";
	}
	$value = $_POST['value'];
	$sql = "select * from pracownicy where ".$_POST['toWrite']." = '$value';";
	if(!$result = $conn->query($sql)){
		echo "query is faild";
	}
    /*if($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_array(MYSQLI_NUM)) {
                    echo $row1[0].": ".$row[$row1[0]]."<br>";
                }
            }
        }
    }*/
        
    if($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_array()) {
            
            echo "nr_akt: ".$row['nr_akt']."<br>";
            echo "nazwisko: ".$row['nazwisko']."<br>";
            echo "stanowisko: ".$row['stanowisko']."<br>";
            echo "kierownik: ".$row['kierownik']."<br>";
            echo "data zatrudnienia: ".$row['data_zatr']."<br>";
            if($row['data_zwol']!=NULL)
                echo "data zwolnienia: ".$row['data_zwol']."<br>";
            echo "placa: ".$row['placa']."<br>";
            echo "dodatek funkcyjny: ".$row['dod_funk']."<br>";
            echo "prowizja: ".$row['prowizja']."<br>";
            echo "dział: ".$row['dzial']."<br>";
            if($i < $result->num_rows-1)
                echo "<br><hr><br>";
            $i++;
            
        }
    }

?>
        
</div>
</body>
</html>