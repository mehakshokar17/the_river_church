<?php
     $dbHost ="localhost";
     $dbUser ="root";
     $dbPass ="";
     $dbName ="church";

     $conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
      
     if($conn){
        //echo "Connected to DAta base";

     }
     else {
         die("Databases connection failed");
     }
    ?>