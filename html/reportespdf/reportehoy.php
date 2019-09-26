<?php
error_reporting(E_ALL ^ E_NOTICE);
require('views/fpdf/fpdf.php');
include("conectar.php");
include("views/fpdf/clase1.php");
$link=Conectarse();
$grado=$_GET['g'];
$seccion=$_GET['s'];
$aver=$grado." - ".$seccion;
$db = new Conexion();
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages(); //total de páginas
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(0, 8, 'REPORTE DE ASISTENCIA', 0,'C');
$pdf->Ln(5);


$pdf->SetTextColor(252, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(52, 107, 155);
$pdf->SetDrawColor(56, 85, 85);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Ln(10);
$pdf->Cell(35, 6, 'AULA',1, 0 , 'L',true );
$pdf->SetTextColor(13, 6, 59);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(90, 6,$aver,1, 0 , 'L' );
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Ln(10);
 // establece el color del fondo de la celda (en este caso es AZUL
// establece el color del fondo de la celda (en este caso es AZUL
$pdf->Cell(25, 6, 'idalumno',1, 0 , 'L',true );
$pdf->Cell(80, 6, 'Nombre',1, 0 , 'T',true );
$pdf->Cell(20, 6, 'Grado',1, 0 , 'C',true );
$pdf->Cell(20, 6, 'Seccion',1, 0 , 'C',true );
$pdf->Cell(20, 6, 'Hora',1, 0 , 'C',true );
$pdf->Cell(20, 6, 'Fecha',1, 0 , 'C',true );
$pdf->Ln(6);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(168, 226, 217);
$pdf->SetDrawColor(168, 226, 217);
$pdf->SetTextColor(13, 6, 59);
//CONSULTA
$fecha_actual=date("Y/m/d");
//$fecha_actual=date("2019/09/17");
$toal=0;
$pa1=$db->query("SELECT idalumno, a_apellido, a_nombre, a_grado, a_seccion, a_hora, a_fecha
FROM asistencia_alumno AS asi INNER JOIN alumno AS alu ON
asi.alumno_idalumno=alu.idalumno WHERE a_fecha='$fecha_actual' AND a_grado='$grado' AND a_seccion='$seccion' GROUP BY idalumno ORDER BY a_hora;");
 $bandera = false;
                    while($row1=$db->recorrer($pa1)){
  $pdf->Cell(25, 6,$row1['idalumno'],1, 0 , 'L', $bandera );
  $pdf->Cell(80, 6, $row1['a_apellido']." ".$row1['a_nombre'],1, 0 , 'L' , $bandera);
  $pdf->Cell(20, 6, $row1['a_grado'],1, 0 , 'C' , $bandera);
  $pdf->Cell(20, 6, $row1['a_seccion'],1, 0 , 'C' , $bandera);
  $pdf->Cell(20, 6, $row1['a_hora'],1, 0 , 'C' , $bandera);
  $pdf->Cell(20, 6, $row1['a_fecha'],1, 0 , 'C' , $bandera);
  $toal=$toal+1;
      $pdf->Ln(6);
$bandera = !$bandera;
}
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(168, 226, 217);
$pdf->SetTextColor(13, 6, 59);
//$pdf->Ln();
$pdf->Cell(145, 5, '',0, 0 , 'L',true );
$pdf->Cell(20, 5, 'TOTAL',1, 0 , 'L',true );
$pdf->Cell(20, 5,$toal." Alumnos",1, 0 , 'L' );
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(114,8,'',0);
$pdf->Output();
?>
