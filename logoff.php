<?php
session_start();

if(isset($_SESSION['log'])){

    session_destroy();
    header("location: index.php");
    exit();
}
?>
