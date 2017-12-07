<!DOCTYPE html>
<html lang="en">
<?php
   session_start();
?>


   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="Author" content="vanowikv13">
      <title>Document</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>

   <body>
      <h1>Porównaj Wyniki</h1>
      <div class="menu">
         <?php
            if($_SESSION['ready'] == true)
            {  
               echo "<table>";
                  echo "<tr>";
               for($i = 1; $i < 6; $i++){
                  echo "<td>".$_SESSION['own'.$i]." | </td>";
               }
               echo "<td>".$_SESSION['own'.$i]."</td>";
               echo "</tr>";
               echo"<tr>";
               for($i = 1; $i < 6; $i++){
                  echo "<td>".$_SESSION['field'.$i]." | </td>";
               }
               echo "<td>".$_SESSION['field'.$i]."   </td>";
               echo"</tr>";
               echo "</table>";
               echo "<h1>Ilość wspołnych wyników";
               
               $licznik = 0;
               
               for($i = 1; $i < 7; $i++){
                  
                  for($j = 1; $j < 7; $j++){
                     if($_SESSION['field'.$j] == $_SESSION['own'.$i]) {
                        echo "<h2>Trafiona: ".$_SESSION['field'.$j]."</h2>";
                        $licznik++;
                     }
                  }

               }
               
               if($licznik == 0)
                  echo"<h2>Brak wspólnych w wyników</h2>";
            }
         ?>
      </div>
   </body>

</html>
