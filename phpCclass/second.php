<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Warsztat samochodowy</title>
    </head>
    <body>
        <div class="mid">
<?php
    class Auto {
        public $marka = "";
        public $kolorPo = "";
        public $kolorPrzed = "";
        public $rocznik = "";
        public $przebieg = "";
        
        function RandomColor() {
            $x = rand(0,3);
            switch($x) {
                case 0:
                    return "Zielony";
                case 1:
                    return "Biały";
                case 2:
                    return "Czarny";
                case 3:
                    return "Czerwony";
                default:
                    return "Niebieski";
            }
        }
        
        function write() {
            echo "Marka: ".$this->marka."<br>Kolor po przemalowaniu: ".$this->kolorPo."<br>Kolor przed przemalowaniem: ".$this->kolorPrzed."<br>Rocznik: ".$this->rocznik."<br>Przebieg: ".$this->przebieg;
        }
        

    }



    $auto = new Auto;
    $auto->marka = $_POST['marka'];
    $auto->rocznik = $_POST['rocznik'];
    $auto->kolorPo = $_POST['after'];
    $auto->przebieg = $_POST['przebieg'];
    $auto->kolorPrzed = $auto->RandomColor();
    $auto->write();
?>
        </div>
        </body>
</html>