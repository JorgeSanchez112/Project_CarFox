<?php
require('fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(10);
    // Título
    $this->Cell(60,10,'Reporte observaciones',0,0,'C');
    // Salto de línea
    $this->Ln(20);
  
   
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-29);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/1',10,0,'C');
}
}

require 'conexion.php';
$consulta="SELECT * FROM observaciones";
$resultado = $db->query($consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while ($row = $resultado->fetch_assoc()){
	$pdf-> cell(30,10,$row['fk_placa'],1,0,'C',0);
    $pdf-> cell(30,10,$row['cod_repuesto'],1,0,'C',0);
    $pdf-> cell(30,10,$row['documento'],1,0,'C',0);
    $pdf-> cell(30,10,$row['fecha_entrada'],1,0,'C',0);
    $pdf-> cell(30,10,$row['fecha_salida'],1,0,'C',0);
    $pdf-> cell(30,10,$row['imagenes'],1,1,'C',0);
}
$pdf->Output();
?>