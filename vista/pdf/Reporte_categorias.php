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
    $this->Cell(80,10,utf8_decode('Reporte de Cátegorias'),0,0,'C');
    // Salto de línea
    $this->Ln(07);
    // Times bold 14
    $this->SetFont('Times','',10);
    //Fecha de Impresión   
    $this->Cell(100,10,utf8_decode('Fecha de Impresión:'),0,0,'R');
    $this->Cell(20,10,date('d/m/Y'),0,1,'R');
    // Salto de línea
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    /* AQUI PONEMOS LOS ENCABEZADOS DE LA LISTA */
    $this->cell(50,10,utf8_decode('Nombre'),1,0,'C',0);
    $this->cell(140,10,utf8_decode('Descripción'),1,1,'C',0);
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
require_once("../../modelo/modelo_categoria.php");
$cat = new categoria();
if ($resultado=$cat->buscar('categoria',"nombre like '%".$searchText."%' and condicion = '1' order by id_categoria desc"))
{
    /* Se instancia el objeto fpdf */
$pdf = new PDF();
$pdf->AliasNbPages();
/* Para añadir paguina */
$pdf->AddPage();
/* Aqui configuramos la fuente y el tamaño */
$pdf->SetFont('Arial','',13);

    
    foreach ($resultado as $valor)
{
    $pdf->cell(50,10,utf8_decode($valor['nombre']),1,0,'L',0);
    $pdf->cell(140,10,utf8_decode($valor['descripcion']),1,1,'L',0);
}

/* esta ultima opción me permite imprimir el pdf */
$pdf->Output();
}
?>