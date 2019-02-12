<?php

$dsn = "pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=trick";

try{
 // create a PostgreSQL database connection
 $con = new PDO($dsn);

 // display a message if connected to the PostgreSQL successfully
 if($con){
 }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

 ?>
