<?php
session_start();
require 'conexao.php';

$aparelho = $_POST['aparelho'];
$cod_aparelho = $_POST['cod_aparelho'];

$id = $_SESSION['id'];
$p = "insert into aparelhos (descricao_aparelho, codigo_aparelho) values ('$aparelho', '$cod_aparelho')";

try{
	$dbh = new PDO($dsn);

	$stmt = $dbh->query($p);
	if($stmt === false){
		die("Error ao executar a consulta: $p");
	}else{
		$rel = $dbh->lastInsertId("aparelhos_id_aparelho_seq");
		$p2 = "insert into usuarios_aparelhos (id_usuario, id_aparelho) values ('$id', '$rel')";
		$i = $dbh->query($p2);
		if ($i === false) {
			die("Erro ao executar $p2");
		}else{
			$response = array("sucess"=>true);
			echo json_encode($response);
		}

	}
}catch(PDOException $e){
	echo $e->getMessage();
}



?>
