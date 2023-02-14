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
    $this->Cell(170,10,'REPORTE REPARACION',0,0,'C');
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

function Reporte($id_observaciones, $placa){

require 'conexion.php';

$consulta1="SELECT * FROM vehiculos WHERE placa = '$placa'";
$resultado1 = $db->query($consulta1);

$consulta="SELECT * FROM observaciones WHERE id_observaciones = $id_observaciones";
$resultado = $db->query($consulta);


$pdf = new PDF();
$pdf->AddPage();


while ($row1 = $resultado1->fetch_assoc()){
   
    $doc_propietario = ($row1['doc_propietario']);

    $pdf->SetFont('Arial','',14);

    $pdf-> Write(10,'Nombre de propietario: ');
    
    $pdf->SetFont('Arial','',11);

    $consulta2="SELECT * FROM propietarios WHERE doc_propietario = '$doc_propietario'";
    $resultado2 = $db->query($consulta2);

    while($row2 = $resultado2->fetch_assoc()){
        $pdf-> write(10,$row2['nombres']);
        $pdf-> write(10,' ');
        $pdf-> write(10,$row2['apellidos']);
    }
    $pdf-> Ln(10);

    $pdf->SetFont('Arial','',14);

    $pdf-> Write(10,'Descripcion de entrada: ');

    $pdf->SetFont('Arial','',11);

    $pdf-> write(10,$row1['descripcion']);
}
$pdf-> Ln(10);


$pdf->SetFont('Arial','',14);

$pdf-> Write(10,'Placa: ');

$pdf->SetFont('Arial','',11);

while ($row = $resultado->fetch_assoc()){
	$pdf-> Write(10,$row['fk_placa']);
    $pdf->SetFont('Arial','',14);
    $pdf-> Write(10,'  Mecanico: ');
    $pdf->SetFont('Arial','',11);
    $pdf-> Write(10,$row['documento']);
    $pdf-> Ln(10);
    $pdf->SetFont('Arial','',14);
    $pdf-> Write(10,'Fecha de entrada: ');
    $pdf->SetFont('Arial','',11);
    $pdf-> Write(10,$row['fecha_entrada']);
    $pdf-> Ln(10);
    $pdf->SetFont('Arial','',14);
    $pdf-> Write(10,'Descripcion de reparacion: ');
    $pdf->SetFont('Arial','',11);
    $pdf-> Write(10,$row['descripcion_reparacion']);
    $pdf-> Ln(10);
    $pdf->SetFont('Arial','',14);
    $pdf-> Write(10,'Fecha de salida: ');
    $pdf->SetFont('Arial','',11);
    $pdf-> Write(10,$row['fecha_salida']);
    $pdf-> Ln(10);
    $pdf->SetFont('Arial','',14);
    $pdf-> Write(10,'IMAGENES: ');
    $pdf-> Image('imagenes/'.$row['imagenes'],36,110,140,70);

}

$pdf->Output();

}



Reporte($_POST['id_observaciones'],$_POST['placa']);
?>