<?php
require('fpdf17/fpdf.php');



require_once ('fonctions_Xslt.php');


/*$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$text = iconv('UTF-8', 'windows-1252',Xslt_create_pdf($id));

					$id=  isset($_GET["id"])    ? utf8_encode($_GET["id"])    : "*";
					$pdf->Cell(40,10,$text);
					
								
$pdf->Output();
*/
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World !');
$pdf->Output();
?>