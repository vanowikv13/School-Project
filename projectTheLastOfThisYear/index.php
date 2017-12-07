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
      <h1>Wybiesz swoje szczęśliwe liczby</h1>
      <div class="menu">
         <form action="result.php" method="post">
            <p>Pole Pierwsze: </p>
            <select name="field1" type="text">
            <?php
               for($i = 1; $i < 51; $i++){
               echo '<option>'.$i.'</option>';
               }
            ?>
         </select>

            <p>Pole Drugie: </p>
            <select name="field2" type="text">
            <?php
               for($i = 1; $i < 51; $i++){
               echo '<option>'.$i.'</option>';
               }
            ?>
         </select>
            <p>Pole Trzecie: </p>
            <select name="field3" type="text">
            <?php
               for($i = 1; $i < 51; $i++){
               echo '<option>'.$i.'</option>';
               }
            ?>
         </select>
            <p>Pole Czwarte: </p>
            <select name="field4" type="text">
            <?php
               for($i = 1; $i < 51; $i++){
               echo '<option>'.$i.'</option>';
               }
            ?>
         </select>
            <p>Pole Piąte: </p>
            <select name="field5" type="text">
            <?php
               for($i = 1; $i < 51; $i++){
               echo '<option>'.$i.'</option>';
               }
            ?>
         </select>
            <p>Pole Szóste: </p>
            <select name="field6" type="text">
            <?php
               for($i = 1; $i < 51; $i++){
               echo '<option>'.$i.'</option>';
               }
            ?>
         </select>
            <br>
            <input type="submit" value="wyślij">
         </form>
         <?php
            if(isset($_SESSION['message']) && $_SESSION['toread'] == true)
               echo $_SESSION['message'];
         
         ?>
      </div>
      <script>
         //alert("Witaj na stronie z totolotkiem, może to ty dzisiaj będziesz szcześćciażem");

         function write() {
            for (var i = 1; i <= 51; i++)
               document.getElementById("option").innerHTML = i;
         }

      </script>
   </body>

</html>
