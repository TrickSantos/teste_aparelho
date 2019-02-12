<?php
session_start();
require 'conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$query = "select id_usuario from usuarios where login = '$login' and senha = '$senha'";

try {

  $dbh = new PDO($dsn);

  $stmt = $dbh->query($query);
  $conta = $stmt->rowCount();

  if($conta == 0){
    die("Usuario ou senha não encontrados!");
    }else {
      $s = $stmt->fetch();
      $id = $s['id_usuario'];
      $_SESSION['id'] = $id;
	  $_SESSION['log'] = "ok";
      header("location: dashboard.php");
    }

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
