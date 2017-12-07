<!DOCTYPE html>
<html>
    <head>
        <title>strona internetowa</title>
        <style>
            #baner,#stopka {
                color:white;
                background-color: #6F851E;
                padding: 10px;
                text-align: center;
                font-style: italic;
                float:none;
            }
            #lewyPanel {
                color:white;
                background-color: #7C9421;
                width: 30%;
                height: 400px;
                text-align: right;
                float:left;
            }
            #prawyPanel {
                width: 30%;
                height: 400px;
                text-align: center;
                float:right;
                background-color: white;
            }
            #srodek {
                float:left;
                width: 40%;
                height: 400px;
                background-color: red;
            }
        
        </style>
    </head>
    <body>
        <div id="baner"><H1>Baner</H1></div>
        <div id="lewyPanel">
        </div>
        <div id="srodek">
        <?php
            
            $con = new mysqli("localhost","root","","movedb");   
            if ($con->connect_error)
                die("Connection failed: " . $conn->connect_error);
            $sql = 'select * from pracownicy where nazwisko = "B*";'; 
            if(!$result = $con->query($sql))
                echo "zapytanie się nie powiodło";
        
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Nazwisko " . $row["Nazwisko"]. " " . $row["Firma"]. "<br>";
    }
}
        ?>
        </div>
        <div id="prawyPanel">
        </div>
        <div id="stopka"><h2>Stopka</h2></div>
    </body>
</html>