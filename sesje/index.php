<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mariusz Nowicki Projekt</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet"> </head>

<body style="background-color:#adad85">
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="index.php">
                        Strona Główna
                    </a> </li>
                <?php
    session_start();
    if((isset($_SESSION['zalogowany']))) {
        if($_SESSION['admin'] == true) {
            echo "<li><a href='nadAdmin.php'>Nadanie Admina</a></li>";
            echo "<li><a href='zabAdmin.php'>Zabierz Admina</a></li>";
            echo "<li><a href='addLinks.php'>Nadanie Linka</a></li>";
            echo "<li><a href='deleteLink.php'>Usunięcie linka</a></li>";
            echo "<li><a href='OdkrycieLinka.php'>Odkrycie Linka</a></li>";
            echo "<li><a href='ukrycieLinka.php'>Ukrycie Linka</a></li>";
        }
        if($_SESSION['zalogowany']==true){
            echo "<li><a href='zmianaHasla1.php'>Zmiana Hasła</a></li>";
            echo "<li><a href='dane.php'>Informacje</a></li>";
            echo "<li><a href='logout.php'>Wyloguj</a></li>";
        }
    }
    else {
        echo "<li><a href='zal.php'>Logowanie</a></li>";
        echo "<li><a href='dodanie.php'>Rejestracja</a></li>";
    }

    ?>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Strona GŁówna</h1> <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Rozwin Menu</a> </div>
                    <div>
                        <br>
                        <script charset="UTF-8" src="http://edodatki.pl/code/zegar-cyfrowy?data%5BWidget%5D%5Btitle%5D=Zegar&data%5BWidget%5D%5Bcss%5D=1" type="text/javascript"></script>
                        <a href="http://www.dodatkowo.dbv.pl" title="Zegar cyfrowy na stronę"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right col-lg-12">
            <?php
            if(isset($_SESSION['nadanie']) &&($_SESSION['statusNad'] == '1')){
                echo $_SESSION['nadanie'];
                $_SESSION['statusNad'] = '0';
            }
            ?>
                <br>
                <h3>Lista Linków w bazie</h3>
                <?php

                    require_once "connectx.php";
	                $con = @new  mysqli($host,$db_user,$db_password,$db_name);
                    $sql="select * from links";
                    $result = @$con->query($sql);
                    $lk = $result->num_rows;
                    if($lk > 0) {
                        while($row = $result->fetch_assoc()) {
                            foreach($row as $value) {
                                $opi = $row['opis'];
                                $lin = $row['data'];
                                $uk = $row['ukryty'];
                                if(!$uk) {
                                echo "<a href=".$lin." target='_blank'>$opi</a><br>";
                                }
                                break;
                            }
                        }
                    }
                    else
                        echo "<label for='name'><strong>Brak danych w bazie</strong></label><br>";
                    
                        
                ?> </div>
    </div>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>