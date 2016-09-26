<?php 
session_start();
if($_SESSION['NOMS']){
	require "../navi.php";
 

require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World Pavithra!');
$pdf->Output();
<?php
}else{
	 header('Location:../../../index.php');
}
?>