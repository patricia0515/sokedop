<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.jpg',10,8,33);
    // Salto de línea
    $this->Ln(10);
    // Arial bold 20
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,10,utf8_decode('Reporte de Estudiantes'),0,0,'C');
    // Salto de línea
    $this->Ln(07);
    // Times bold 14
    $this->SetFont('Times','',10);
    //Fecha de Impresión   
    $this->Cell(95,10,utf8_decode('Fecha de Impresión:'),0,0,'R');
    date_default_timezone_set('America/Bogota');
    $this->Cell(32,10,date('d-m-Y H:i:s',time()),0,1,'R');
    // Salto de línea
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    /* AQUI PONEMOS LOS ENCABEZADOS DE LA LISTA */
    $this->cell(6);
    $this->cell(20,10,utf8_decode('Tipo Doc'),1,0,'C',0);
    $this->cell(40,10,utf8_decode('No. Documento'),1,0,'C',0);
    $this->cell(50,10,utf8_decode('Nombre'),1,0,'C',0);
    $this->cell(35,10,utf8_decode('Categoria'),1,0,'C',0);
    $this->cell(30,10,utf8_decode('Tel Acudiente'),1,1,'C',0);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-30);
    // Arial italic 8
    $this->SetFont('Arial','I',12);
    // Número de página
    $this->cell(190,10,utf8_decode('Club Deportivo Coaching FC '),0,0,'C',0);
    $this->Ln(05);
    $this->cell(190,10,utf8_decode('Reconocimiento deportivo IDRD 339'),0,0,'C',0);
    $this->Ln(07);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}

}
$searchText = isset($_REQUEST['searchText']) ? $_REQUEST['searchText']:null;
require_once("../../modelo/modelo_estudiante.php");
$est = new estudiante();
if ($resultado=$est->index($searchText))
{
    /* Se instancia el objeto fpdf */
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
foreach ($resultado as $valor)
{
    $pdf->cell(6);
    $pdf->cell(20,10,utf8_decode($valor['Tipo_doc']),1,0,'C',0);
    $pdf->cell(40,10,utf8_decode($valor['Documento']),1,0,'C',0);
    $pdf->cell(50,10,utf8_decode($valor['Nombre'].' '.$valor['Apellido']),1,0,'C',0);
    $pdf->cell(35,10,utf8_decode($valor['Categoria']),1,0,'C',0);
    $pdf->cell(30,10,utf8_decode($valor['Tel_acu']),1,1,'C',0);
   /*  $directorio = '../imagenes/estudiantes/';
    $pdf->Cell(20,30, $pdf->Image($directorio.$valor['Foto'], $pdf->GetX(), $pdf->GetY(),20),1,'C');  */
}
$pdf->Output();
}
?>