<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página

function Header()
{
    // Logo
    $this->Image('cabecera.jpg',10,8,33);
     // Arial bold 15
     $this->SetFont('Arial','B',15);
     // Movernos a la derecha
     $this->Cell(80);
     // Título
     $this->Cell(30,10,'Concultorios Medical\'s',0,0,'C');
     // Salto de línea
     $this->Ln(20);
     $this->Cell(80);
     // Título
     $this->Cell(30,10,'"Salvando Regios"',0,0,'C');
     // Salto de línea
     $this->Ln(15);
}



// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}


}
$id_receta=$_GET['id_receta'];
require ("conexion.php");
$consulta = "SELECT * FROM v_receta where id_receta='".$id_receta."'";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while ($row=$resultado->fetch_assoc()) {
	
	

    $pdf->Cell(30,10,utf8_decode('Dirección:'),0,0,'L',0);
    $pdf->Cell(90,10,$row['direccion_suc'],0,1,'L',0);

    $pdf->Cell(30,10,utf8_decode('Teléfono:'),0,0,'L',0);
	$pdf->Cell(90,10,$row['telefono_suc'],0,1,'L',0);
    
    $pdf->Cell(180,20,utf8_decode('Receta Médica'),0,0,'C',0);
    $pdf->Cell(10,20,$row['id_receta'],0,1,'R',0);

    $pdf->Cell(125,10,'Fecha:',0,0,'R',0);
    $pdf->Cell(40,10,$row['fecha_cita'],0,0,'C',0);
	$pdf->Cell(20,10,$row['hora_cita'],0,1,'L',0);

    $pdf->Cell(190,20,'Doctor:',0,1,'L',0);
    $pdf->Cell(150,10,$row['Doctor'],1,0,'C',0);
	$pdf->Cell(40,10,$row['telefono_empleado'],1,1,'C',0);

    $pdf->Cell(190,20,'Datos Del Paciente:',0,1,'L',0);
    $pdf->Cell(150,10,$row['paciente'],1,0,'C',0);
	$pdf->Cell(40,10,$row['telefono_paciente'],1,1,'C',0);

    $pdf->Cell(190,20,'Tratamiento:',0,1,'L',0);
    $pdf->Cell(190,30,$row['dosis_medicamento'],1,1,'C',0);
	$pdf->Cell(190,30,$row['frecuencia_medicamento'],1,1,'C',0);

    $pdf->Cell(190,20,'Prueba a Realizar:',0,1,'L',0);
    $pdf->Cell(40);
    $pdf->Cell(80,10,$row[utf8_decode('nombre_prueba')],1,0,'C',0);
	$pdf->Cell(40,10,$row['tipo_prueba'],1,1,'C',0);



} 

	$pdf->Output();
?>