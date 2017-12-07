<?php
session_start();
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }
?>

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
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<body style="background-color:#adad85">

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        Strona Główna
                    </a>
                </li>



<?php
    if((isset($_SESSION['zalogowany']))) {
        if($_SESSION['zalogowany']==true){
        echo "<li><a href='zmianaHasla1.php'>Zmiana Hasła</a></li>";
        echo "<li><a href='dane.php'>Informacje</a></li>";
        echo "<li><a href='logout.php'>Wyloguj</a></li>";
        }
        if($_SESSION['admin'] == true) {
            echo "<li><a href='nadAdmin.php'>Nadanie Admina</a></li>";
            echo "<li><a href='zabAdmin.php'>Zabierz Admina</a></li>";
            echo "<li><a href='addLinks.php'>Nadanie Linka</a></li>";
            echo "<li><a href='deleteLink.php'>Usunięcie linka</a></li>";
            echo "<li><a href='OdkrycieLinka.php'>Odkrycie Linka</a></li>";
            echo "<li><a href='ukrycieLinka.php'>Ukrycie Linka</a></li>";
        }
    }
    else {
        echo "<li><a href='zal.php'>Logowanie</a></li>";
        echo "<li><a href='dodanie.html'>Rejestracja</a></li>";
    }

    ?>
                            </ul>
        </div>
        
        <div id="page-content-wrapper">
            <div class="text-center">
                <div class="row">
                    <div class="col-lg-12">
						<h1>Dane o użytkowniku</h1>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Rozwin Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right col-lg-12">
            <h3 style="margin-right:20px;">Dane:</h3>
            
            <div class="col-lg-12 text-right">
                <?php
                    echo "<p>Witaj ".$_SESSION['login']."!<br>";
                    if($_SESSION['admin'] == true) {
                        echo "status: ADMINISTRATOR";
                    }
                    else {
                        echo "status: USER";
                    }
                    echo "<br>"." Dane osobowe: <br>";
                    echo "imie : ".$_SESSION['imie']."<br>";
                    echo "nazwisko : ".$_SESSION['nazwisko']."<br>";
                    echo "adres : ".$_SESSION['adres']."<br>";
                    echo "email : ".$_SESSION['email']."<br>";
                    echo "telefon : ".$_SESSION['telefon']."<br>";
                ?>
            </div>


            
        </div>
    </div>
            <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    </body>
</html>



