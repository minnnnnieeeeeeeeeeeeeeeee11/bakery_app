<?php
require('../pdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->SetFont('THSarabunNew','',16);
$pdf->Cell(80);
$pdf->Cell(40,10,'Create PHP to PDF','','','C');
$pdf->Ln(20);
$pdf->Output();
?>