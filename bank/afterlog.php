      
<?php
    session_start();
    function tran($trans) {
        echo "Masz na koncie ".$trans."zł<br>";
        echo '<form method="post" action="pay.php">
            ile chcesz wypłacić: <input type="text" name="money"><br>
            <input type="submit">
        </form>';
    }

    echo "Jesteś zalogowany<br>";
    if(isset($_SESSION['MESSAGE']))
        echo $_SESSION['MESSAGE'];
    if(isset($_SESSION['transaction'])){
        if($_SESSION['transaction'] == false)
            tran($_SESSION['hajs']);
        else {
            echo "Chcesz potwierdzenie ?<br>";
            echo '
            <form method="post" action="confirmation.php">
                <select name="options">
                    <option>YES</option>
                    <option>NO</option>
                </select>
                <input type="submit">
            </form>
            
            ';
        }
    }else
        tran($_SESSION['hajs']);
    echo '<a href="sessionEnd.php">Wyloguj</a>';

?>