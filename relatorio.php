<?php
session_start();
require 'conexao.php';

$id = $_GET['usuario'];

try {
  $query = "select a.descricao_aparelho, a.codigo_aparelho from
            usuarios_aparelhos as b inner join aparelhos as a on a.id_aparelho = b.id_aparelho where
            b.id_usuario = '$id'";

  $db = new PDO($dsn);
  $rel = $db->query($query);
  if ($rel === false) {
    die("erro ao executar $query");
  }else {
    $b = $rel->fetchAll();
  }
} catch(PDOException $e){
	echo $e->getMessage();
}
?>
<div class="content-widget no-padding">
    <div class="panel panel-default table-responsive">
        <table class="table table-hover table-dark tabela">
          <thead>
            <caption>Listagem de Aparelhos por Usuarios</caption>
            <tr>
              <th scope="col">Codigo do Aparelho</th>
              <th scope="col">Descricao Aparelho</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($b as $aparelho) {
                $desc = $aparelho['descricao_aparelho'];
                $cod = $aparelho['codigo_aparelho'];
                ?>
                <tr>
                  <th scope="row"><?php echo $desc; ?></th>
                  <td><?php echo $cod; ?></td>
                </tr>
                <?php
              }
            ?>
          </tbody>
        </table>
    </div>
    <div class="modal-footer">
      <a id="down"class="btn btn-default pull-right" onclick="location.href ='rel_pdf.php?perfil=<?php echo $id?>';">Exportar PDF</a>
      <a id="down"class="btn btn-default pull-left" onclick="location.href ='dashboard.php';">Voltar</a>
    </div>
  </div>
