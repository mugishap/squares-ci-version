<?php

require('assets/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);


$pdf->Cell('32', '16', 'Title', '1', '0', 'C');
$pdf->Cell('96', '16', 'Description', '1', '0', 'C');
$pdf->Cell('24', '16', 'Amount', '1', '0', 'C');
$pdf->Cell('32', '16', 'Price', '1', '0', 'C');

$pdf->Ln();
$i=0;
while ($i < count($products)) {
    $pdf->Cell('32', '14', $products[$i]->title, '1', '0', 'C');
    $pdf->Cell('96', '14', $products[$i]->description, '1', '0', 'L');
    $pdf->Cell('24', '14', $products[$i]->amount, '1', '0', 'C');
    $pdf->Cell('32', '14', $products[$i]->price, '1', '0', 'C');
    $pdf->Ln();
    $i++;
}



$pdf->Output();

print_r($products);
?>
