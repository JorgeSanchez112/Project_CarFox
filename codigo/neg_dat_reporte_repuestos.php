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
    $this->Cell(170,10,'REPORTE REPUESTO',0,0,'C');
   
}


}


require 'conexion.php';

$consulta="SELECT * FROM observaciones";
$resultado = $db->query($consulta);

$pdf = new PDF();
$pdf->AddPage();

while ($row = $resultado->fetch_assoc()){
   
    $pdf->SetFont('Arial','',14);
    $pdf-> Ln(10);
    $pdf-> Write(10,'Codigo repuesto: ');

    $pdf-> Write(10,$row['cod_repuesto']);

    $codigo_repuesto = ($row['cod_repuesto']);
    
    $pdf->SetFont('Arial','',11);

    $consulta2="SELECT * FROM repuestos WHERE cod_repuesto = '$codigo_repuesto'";
    $resultado2 = $db->query($consulta2);

    while($row2 = $resultado2->fetch_assoc()){
        $pdf->SetFont('Arial','',14);
        $pdf-> Ln(10);
        $pdf-> Write(10,'Cantidad de entrada: ');
        $pdf-> write(10,$row2['entrada']);
        $pdf-> write(10,' ');
        $pdf->SetFont('Arial','',14);
        $pdf-> Ln(10);
        $pdf-> Write(10,'Cantidad de salida: ');
        $pdf-> write(10,$row2['salida']);
        $pdf-> Write(10,'Restante: ');
    }
    
    $pdf-> Ln(10);




$pdf->Output();

}

?>