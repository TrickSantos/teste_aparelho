<?php
require '..\conexao.php';
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=perfil.csv");

$saida = fopen('php://output','w');

$p = "select * from usuarios";
$dbh = new PDO($dsn);
$stmt = $dbh->query($p);
$perfil = $stmt->fetchAll();

foreach($perfil as $r){
	fputcsv($saida, $r);
}
?>
