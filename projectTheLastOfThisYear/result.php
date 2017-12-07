<?php
   session_start();
///losowanie
   $tab[] = rand(1,50);
   for($i = 1; $i <7; $i++) {
      do {
         $act = rand(1,50);
         for($j = 0; $j<$i+1;$j++) {
            if($act == $tab[$j])
               continue;
            else {
               $tab[] = $act;
               break;
            }
         }

      }while(false);
   }
for($i= 0; $i<6;$i++) 
   echo $tab[$i]."<br>";
   $_SESSION['ready'] = true;
   for($i =0; $i < 6; $i++) {
      $_SESSION[("field".($i+1))] = $tab[$i];
      $_SESSION[("own".($i+1))] = $_POST['field'.($i+1)];
   }

   //connect with database and insert data
   $con = mysqli_connect("localhost","root","","totolotek");
   if(mysqli_connect_errno())
      echo "Connect failed ".mysqli_connect_errno();
   $sql = "insert into wpisane(nr1,nr2,nr3,nr4,nr5,nr6) VALUES(".$_POST['field1'].",".$_POST['field2'].",".$_POST['field3'].",".$_POST['field4'].",".$_POST['field5'].','.$_POST['field6'].');';

   if(!$result = mysqli_query($con,$sql))
      echo "operacja wpisana dla użytkownika danych nie udała się";


 $sql = "insert into wylosowane(nr1,nr2,nr3,nr4,nr5,nr6) VALUES(".$_SESSION['field1'].",".$_SESSION['field2'].",".$_SESSION['field3'].",".$_SESSION['field4'].",".$_SESSION['field5'].','.$_SESSION['field6'].');';

   if(!$result = mysqli_query($con,$sql))
      echo "operacja wpisana dla użytkownika danych nie udała się";
   header('Location: resultAfter.php');
?>
