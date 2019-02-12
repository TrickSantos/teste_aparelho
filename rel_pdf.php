<?php
require_once("fpdf/fpdf.php");
require 'conexao.php';

$id = $_GET['perfil'];
$p = "select a.descricao_aparelho, a.codigo_aparelho from
          usuarios_aparelhos as b inner join aparelhos as a on a.id_aparelho = b.id_aparelho where
          b.id_usuario = '$id'";
$dbh = new PDO($dsn);
$stmt = $dbh->query($p);
$r = $stmt->fetchAll();


$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();

$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,"Relatorio",0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);

//cabeçalho da tabela
$pdf->SetFont('arial','B',14);
$pdf->Cell(140,20,'Codigo do Aparelho',1,0,"L");
$pdf->Cell(160,20,'Descricao do Aparelho',1,1,"L");

//linhas da tabela
$pdf->SetFont('arial','',12);

foreach ($r as $aparelho) {
  $pdf->Cell(140,20,$aparelho['codigo_aparelho'],1,0,"L");
  $pdf->Cell(160,20,$aparelho['descricao_aparelho'],1,1,"L");
}

$pdf->Output("relatorio.pdf","D");

?>
