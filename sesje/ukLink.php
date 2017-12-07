<?php
    session_start();
    
        if(isset($_SESSION['nadanie']) &&($_SESSION['statusNad'] == '1')){
            echo $_SESSION['nadanie'];
            $_SESSION['statusNad'] = '0';
        }

            $check = 0;
            require_once "connectx.php";
	        $con = @new  mysqli($host,$db_user,$db_password,$db_name);
            $sql="select * from links where ukryty = 0;";
            if($result = @$con->query($sql)){
                while($row = $result->fetch_assoc()) {
                    foreach($row as $value) {
                        $opi = $row['opis'];
                        $odkName = $_POST['odk'];
                        if($opi == $odkName) {
                            @$con->query("update links set ukryty = 1 where opis = '$opi';");
                            echo "ukrycie linka udało się";
                            $check = 1;
                            break;
                        }
                    }
                }
            }
            else {
                $_SESSION['nadanie'] = '<span style="color:red">something go wrong but i dont know what its your problem not mine</span><br>';
                $_SESSION['statusNad'] = '1';
                header('Location: index.php');
            }
        if(!$check) {
                $_SESSION['nadanie'] = '<span style="color:red">usówanie linka nie udało się</span><br>';
                $_SESSION['statusNad'] = '1';
                header('Location: index.php');
        }
        else {
            $_SESSION['nadanie'] = '<span style="color:red">usuówanie linka udało się</span><br>';
            $_SESSION['statusNad'] = '1';
            header('Location: index.php');                      
        }
        
        ?> </div>
    </form>
    </div>
    </div>
    </section>
    <!-- Stopka strony -->
    </body>

    </html>