<?php
require('fpdf.php');

/* Se instancia el objeto fpdf */
$pdf = new FPDF();
/* Para añadir paguina */
$pdf->AddPage();
/* Aqui configuramos la fuente y el tamaño */
$pdf->SetFont('Arial','B',16);
/* Aqui creamos una celda o linea que para el 
caso teien 40 de ancho y 10 de alto */
$pdf->Cell(40,10,utf8_decode('¡Hola, esta es la prueba para implementar los reportes!'));
/* esta ultima opción me permite imprimir el pdf */
$pdf->Output();
?>