<?php
require 'conexao.php';
date_default_timezone_set('America/Cuiaba');

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];
$email = $_POST['email'];

$data = date('d-m-Y');
$status = "s";
$aut = "s";
$cod_pessoa = rand(0,8888);
$exp_senha = 30;

$testa_user = "select * from public.usuarios where login = '$usuario'";

$sql = "INSERT INTO public.usuarios (nome_usuario, login, email, senha, data_criacao, status_usuario, cod_autorizacao, cod_pessoa, tempo_expiracao_senha) VALUES
('$nome', '$usuario', '$email', '$senha', '$data', '$status', '$aut', '$cod_pessoa', '$exp_senha')";

try{
     $dbh = new PDO($dsn);

     $stmt = $dbh->query($testa_user);

     $linhas = $stmt->rowCount();

     if ($linhas > 0) {
       die("Usuario á existente!");
     }else {
       $stmt = $dbh->query($sql);

        if($stmt === false){
        die("Error executing the query: $sql");
        }else {
          $response = array("sucess"=> true);
          echo json_encode($response);
     }
   }
}catch (PDOException $e){
 echo $e->getMessage();
}

?>
