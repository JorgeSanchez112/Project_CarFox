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
   
}



}

function Reporte($id_observaciones, $placa, $imagenentrada, $imagenreporte){

require 'conexion.php';

$consulta5="SELECT * FROM imagen_reporte WHERE nombre ='$imagenentrada'";
$resultado5 = $db->query($consulta5);

$consulta4="SELECT * FROM observaciones WHERE id_observaciones=$id_observaciones;";
$resultado4 = $db->query($consulta4);

$consulta3="SELECT * FROM imagen_reporte WHERE nombre ='$imagenreporte'";
$resultado3 = $db->query($consulta3);

$consulta1="SELECT * FROM vehiculos WHERE placa = '$placa'";
$resultado1 = $db->query($consulta1);

$consulta="SELECT fk_vehiculo, descripcion_entrada, fecha_entrada, imagenes_entrada, descripcion_reparacion, documento, fecha_salida, imagenes  FROM entrada_vehiculo INNER JOIN observaciones ON id_entrada=fk_entrada WHERE id_observaciones=$id_observaciones;";
$resultado = $db->query($consulta);


$pdf = new PDF();
$pdf->AddPage();


while ($row1 = $resultado1->fetch_assoc()){
   
    $doc_propietario = ($row1['doc_propietario']);

    $pdf->SetFont('Arial','',14);
    $pdf->Ln(10);
    $pdf->Write(10,'Nombre de propietario: ');
    
    $pdf->SetFont('Arial','',11);
    //INICIO funcion nombres propietario
    $consulta2="SELECT * FROM propietarios WHERE doc_propietario = '$doc_propietario'";
    $resultado2 = $db->query($consulta2);

    while($row2 = $resultado2->fetch_assoc()){
        $pdf->write(10,utf8_decode($row2['nombres']));
        $pdf->write(10,' ');
        $pdf->write(10,utf8_decode($row2['apellidos']));
    }
    $pdf->Ln(10);
    //FIN
}


while ($row = $resultado->fetch_assoc()){
    $pdf->SetFont('Arial','',14);

    $pdf->Write(10,'Descripcion de entrada: ');
    $pdf->SetFont('Arial','',11);
    $pdf->Write(10,utf8_decode($row['descripcion_entrada']));

    $pdf->Ln(10);


    $pdf->SetFont('Arial','',14);
    $pdf->Write(10,'Placa: ');
    $pdf->SetFont('Arial','',11);
    $pdf->Write(10,utf8_decode($row['fk_vehiculo']));
    $pdf->SetFont('Arial','',14);
    $pdf->Write(10,'  Mecanico: ');
    //INICIO funcion nombres mecanico
    $doc_mecanico= $row['documento'];

    $consulta2="SELECT * FROM usuarios WHERE documento = $doc_mecanico";
    $resultado2 = $db->query($consulta2);

    $pdf->SetFont('Arial','',11);

    while($row2 = $resultado2->fetch_assoc()){
        $pdf->write(10,utf8_decode($row2['nombres']));
        $pdf->write(10,' ');
        $pdf->write(10,utf8_decode($row2['apellidos']));
    }
    //FIN
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',14);
    $pdf->Write(10,'Fecha de entrada: ');
    $pdf->SetFont('Arial','',11);
    $pdf->Write(10,$row['fecha_entrada']);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',14);
    $pdf->Write(10,'Descripcion de reparacion: ');
    $pdf->SetFont('Arial','',11);
    $pdf->Write(10,utf8_decode($row['descripcion_reparacion']));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',14);
    $pdf->Write(10,'Fecha de salida: ');
    $pdf->SetFont('Arial','',11);
    $pdf->Write(10,$row['fecha_salida']);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',14);
    $pdf->Write(10,'Imagenes iniciales del vehiculo: ');
    $pdf->Ln(180);
    $pdf->Image('imagenes/'.$row['imagenes_entrada'],16,90,180,140);
    $pdf->Ln(20);
}

while ($row5 = $resultado5->fetch_assoc()){
    $pdf->Ln(20);
    $pdf->Cell(40,20);
    $pdf->Ln(10);
    $pdf->MultiCell(190,40, $pdf->Image('imagenes/'.$row5['urlimagen'], $pdf->GetX()+40, $pdf->GetY()+3, 100) ,0,"C");
    $pdf->Ln(20);
} 
    $pdf->Ln(40);

while ($row4 = $resultado4->fetch_assoc()){
    $pdf->Cell(1);
    $pdf->Ln(20);
    $pdf->Cell(20, 10, 'Imagenes del vehiculo reparado:');
    $pdf->SetFont('Arial','B',14);
    $pdf->Image('imagenes/'.$row4['imagenes'],16,50,180,140);
}

$pdf->Ln(170);

while ($row3 = $resultado3->fetch_assoc()){
    
    $pdf->Cell(40,20);
    $pdf->Ln(20);
    $pdf->MultiCell(190,40, $pdf->Image('imagenes/'.$row3['urlimagen'], $pdf->GetX()+40, $pdf->GetY()+3, 100) ,0,"C");
}

$pdf->Output();

}

Reporte($_POST['id_observaciones'],$_POST['placa'],$_POST['imagenentrada'],$_POST['imagenreporte']);
?>