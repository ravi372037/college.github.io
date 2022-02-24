<?php
    $servername="localhost";
    $username="root";
    $password="";

    $dbname="college";

    $con= mysqli_connect($servername,$username,$password,$dbname);
    
    if(!$con)
    {
        echo "Connection Faild";
        exit();
    }
   
  
    

?>
