<?php
require_once("fpdf/fpdf.php");
require 'conexao.php';


$p = "select * from usuarios";
$dbh = new PDO($dsn);
$stmt = $dbh->query($p);
$perfil = $stmt->fetchAll();

$pdf= new FPDF("P","pt","A4");


foreach($perfil as $r){
	$pdf->AddPage();
	
	$pdf->SetFont('arial','B',18);
	$pdf->Cell(0,5,"Perfil",0,1,'C');
	$pdf->Cell(0,5,"","B",1,'C');
	$pdf->Ln(8);
	//nome
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(70,20,"Nome:",0,0,'L');
	$pdf->setFont('arial','',12);
	$pdf->Cell(0,20,$r['nome_usuario'],0,1,'L');

	//email
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(70,20,"E-mail:",0,0,'L');
	$pdf->setFont('arial','',12);
	$pdf->Cell(70,20,$r['email'],0,1,'L');

	//data de criaçao
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(110,20,"Data de criacao:",0,0,'L');
	$pdf->setFont('arial','',12);
	$pdf->Cell(70,20,$r['data_criacao'],0,1,'L');

	//expiracao da senha
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(110,20,"Senha expira em:",0,0,'L');
	$pdf->setFont('arial','',12);
	$pdf->Cell(70,20,$r['tempo_expiracao_senha'],0,1,'L');

	//codigo de autorizacao
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(150,20,"Codigo de autorizacao:",0,0,'L');
	$pdf->setFont('arial','',12);
	$pdf->Cell(70,20,$r['cod_autorizacao'],0,1,'L');

	//status do usuario
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(130,20,"Status do Usuario:",0,0,'L');
	$pdf->setFont('arial','',12);
	$pdf->Cell(70,20,$r['status_usuario'],0,1,'L');

	//Codigo pessoa
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(130,20,"Codigo de Pessoa:",0,0,'L');
	$pdf->setFont('arial','',12);
	$pdf->Cell(70,20,$r['cod_pessoa'],0,1,'L');

}
$pdf->Output("perfil.pdf","D");


?>
