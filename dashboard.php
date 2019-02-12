<?php
require 'conexao.php';
session_start();

if ($_SESSION['log'] != "ok") {
    header('Location: index.php');
}

try {
  $query = "select * from usuarios";

  $db = new PDO($dsn);
  $tb_us = $db->query($query);
  if ($tb_us === false) {
    die("erro ao executar $query");
  }else {
    $b = $tb_us->fetchAll();
  }
} catch(PDOException $e){
	echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="ref/bootstrap.min.css">
  <link rel="stylesheet" href="ref/projeto.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="ref/dashboard.js"></script>
  <script>
    $(function() {
      $("#tabs").tabs();
    });
  </script>
</head>
<body>
  <div class="container" id="tabs">
    <ul>
      <li><a href="#tabs-1">Perfil</a></li>
      <li><a href="#tabs-2">Cadastro Aparelho</a></li>
      <li><a href="#tabs-3">Relatorio</a></li>
    </ul>
    <div id="tabs-3">
		<div class="content-widget no-padding">
			<div class="panel panel-default table-responsive">
			  <table class="table table-hover table-dark tabela">
				<thead>
				  <caption>Listagem de Aparelhos por Usuarios</caption>
				  <tr>
					<th scope="col">#</th>
					<th scope="col">Usuario</th>
				  </tr>
				</thead>
				<tbody>
				  <?php
					foreach ($b as $user) {
					  $id_user = $user['id_usuario'];
					  $nome = $user['nome_usuario'];
					  ?>
					  <tr id="<?php echo $id_user; ?>" class="next">
						<th scope="row"><?php echo $id_user; ?></th>
						<td><?php echo $nome; ?></td>
					  </tr>
					  <?php
					}
				  ?>
				</tbody>
			  </table>
			  <a id="down"class="btn btn-default pull-right" onclick="location.href ='perfil.php';">Exportar PDF</a>
			  <a id="down"class="btn btn-default pull-left" onclick="location.href ='ref/csv.php';">Exportar CSV</a>
			</div>
		</div>
    </div>
    <div id="tabs-2">
      <div class="cadastro modal-body">
        <form id="cad_aparelho" method="post" name="cad_aparelho">
          <div class="form-group"><label for="nome">Aparelho: </label><input id="aparelho" name="aparelho" class="form-control" type="text"></div>
          <div class="form-group"><label for="login">Codigo do Aparelho: </label><input id="cod_aparelho" name="cod_aparelho" class="form-control" type="text"></div>
          <button type="button" id="cad" name="button" class="btn btn-success btn-block">Cadastrar</button>
		  <input style="display:none" type="reset" id="limpa" />
        </form>
      </div>
    </div>
    <div id="tabs-1">
      <div class="perfil modal-body">
        <form class="pp">
      		<?php
      			$id = $_SESSION['id'];
      			$p = "select * from usuarios where id_usuario = '$id'";
      			$dbh = new PDO($dsn);
      			$stmt = $dbh->query($p);
      			$r = $stmt->fetch();
      		?>
          <input style="display:none" id="<?php echo $_SESSION['id']; ?>">
          <div class="form-group"><label for="nome">Nome: </label><input id="nome" value="<?php echo $r['nome_usuario'];?>" readonly class="form-control" type="text"></div>
          <div class="form-group"><label for="login">Usuario: </label><input id="login" value="<?php echo $r['login'];?>" readonly class="form-control" type="text"></div>
          <div class="form-group"><label for="email">Email: </label><input id="email" value="<?php echo $r['email'];?>" readonly class="form-control" type="text"></div>
          <div class="form-group"><label for="data">Criação: </label><input id="data" value="<?php echo $r['data_criacao'];?>" readonly class="form-control" type="text"></div>
          <div class="form-group"><label for="exp_senha">Expira em: </label><input id="exp_senha" value="<?php echo $r['tempo_expiracao_senha'];?>" readonly class="form-control" type="text"></div>
          <div class="form-group"><label for="cod_aut">Cod. Autorizacao: </label><input id="cod_aut" value="<?php echo $r['cod_autorizacao'];?>" readonly class="form-control" type="text"></div>
          <div class="form-group"><label for="status">Status: </label><input id="status" value="<?php echo $r['status_usuario'];?>" class="form-control" readonly type="text"></div>
          <div class="form-group"><label for="cod_pessoa">Cod. Pessoa: </label><input id="cod_pessoa" value="<?php echo $r['cod_pessoa'];?>" readonly class="form-control" type="text"></div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
