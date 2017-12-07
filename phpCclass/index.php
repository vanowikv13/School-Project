<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Warsztat samochodowy</title>
    </head>
    <body>
        <div class="top">
            <h2>Witaj w lakierni samochodowej</h2>
        </div>
        <div class="mid">
        <form method="post" action="second.php">
            Marka:
            <input type="text" name="marka"><br>
            Kolor po malowaniu:
            <select name="after"> 
              <option value="Biały">Biały</option>
              <option value="Czarny">Czarny</option>
              <option value="Czerwony">Czerwony</option>
              <option value="Żółty">Żółty</option>
            </select> <br>
            Rocznik:
            <input type="text" name="rocznik"><br>
            Przebieg:
            <input type="text" name="przebieg"><br>
            <input type="submit">
        </form>
        </div>
    </body>
</html>