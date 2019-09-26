<?php
error_reporting(E_ALL ^ E_NOTICE);
require('views/fpdf/fpdf.php');
include("conectar.php");
include("views/fpdf/clase1.php");
require('funcion.php');
$link=Conectarse();
$grado=$_GET['g'];
$seccion=$_GET['s'];
$dfn1=$_GET['d1'];
$dfn2=$_GET['d2'];
$dfn=$dfn1." - ".$dfn2;
$aver=$grado." - ".$seccion;
$db = new Conexion();
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->AliasNbPages(); //total de páginas
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(0, 8, 'REPORTE DE ASISTENCIA ENTRE FECHAS', 0,'C');
$pdf->Ln(2);


$pdf->SetTextColor(252, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(52, 107, 155);
$pdf->SetDrawColor(56, 85, 85);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Ln(10);
$pdf->Cell(20, 5, 'AULA',1, 0 , 'L',true );
$pdf->SetTextColor(13, 6, 59);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(30, 5,$aver,1, 0 , 'L' );
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);


$pdf->SetTextColor(252, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(52, 107, 155);
$pdf->SetDrawColor(56, 85, 85);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(20, 5, 'FECHAS',1, 0 , 'L',true );
$pdf->SetTextColor(13, 6, 59);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(30, 5,$dfn,1, 0 , 'C' );
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);

$pdf->SetTextColor(252, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(52, 107, 155);
$pdf->SetDrawColor(56, 85, 85);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(20, 5, 'LEYENDA',1, 0 , 'L',true );
$pdf->SetTextColor(13, 6, 59);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(85, 5,'S=Sabado D=Domingo I=Inasistencia A=Asistencia Normal T=Tardanza',1, 0 , 'C' );
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(252, 255, 255);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Ln(10);
$fechaInicio=strtotime($dfn1);
$fechaFin=strtotime($dfn2);
$pdf->Cell(79, 8, '', 0);
  $he = new datetime('08:00:00');
for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
   $fecha=date("Y-m-d", $i)."<p>";
//  echo   $fecha=date("Y-m-d", $i)."<p>";
//  echo fechaCastellano($fecha)."<p>";

$pdf->Cell(5, 6, fechaCastellano1($fecha),1, 0 , 'C',true );
}
$pdf->Cell(14, 6,'Total',1, 0 , 'C',true );
$pdf->Cell(18, 6,'Total',1, 0 , 'C',true );
$pdf->Ln(5);
 // establece el color del fondo de la celda (en este caso es AZUL
// establece el color del fondo de la celda (en este caso es AZUL
$pdf->Cell(14, 6, 'idalumno',1, 0 , 'L',true );
$pdf->Cell(65, 6, 'Nombre',1, 0 , 'T',true );


for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
   $fecha=date("Y-m-d", $i)."<p>";
//  echo   $fecha=date("Y-m-d", $i)."<p>";
//  echo fechaCastellano($fecha)."<p>";

$pdf->Cell(5, 6, fechaCastellano($fecha),1, 0 , 'C',true );
}
$pdf->Cell(14, 6,'Tardanza',1, 0 , 'T',true );
$pdf->Cell(18, 6,'Inasistencia',1, 0 , 'T',true );
$pdf->Ln(6);
$pdf->SetFont('Arial', '', 6);
$pdf->SetFillColor(168, 226, 217);
$pdf->SetDrawColor(168, 226, 217);
$pdf->SetTextColor(13, 6, 59);
//CONSULTA
$fecha_actual=date("Y/m/d");
$pa1=$db->query("SELECT * FROM alumno WHERE a_grado='$grado' AND a_seccion='$seccion';");
 $bandera = false;
                    while($row1=$db->recorrer($pa1)){
      $ina=0;
      $tar=0;
      $estado="A";
  $pdf->Cell(14, 4,$row1['idalumno'],1, 0 , 'L', $bandera );
  $pdf->Cell(65, 4, $row1['a_apellido']." ".$row1['a_nombre'],1, 0 , 'L' , $bandera);
  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
      $fecha=date("Y-m-d", $i);
      $idconsultar=$row1['idalumno'];
      $pa2=$db->query("SELECT * FROM asistencia_alumno WHERE alumno_idalumno='$idconsultar' and a_fecha='$fecha';");
      //$row2=$db->recorrer($pa2);

      //echo $row2['a_estado']."dd";
      if ($row2=$db->recorrer($pa2)) {
        $hm = new datetime($row2['a_hora']);

        if ($hm<=$he) {
        $estado="A";
        }else {
        $estado="T";
        $tar++;
        }
      }else {
        $trr=fechaCastellano($fecha);

        if ($trr=="S") {
          // code...
          $estado="S";
        }elseif($trr=="D") {
          // code...
          $estado="D";
        }else {
          $estado="I";
          $ina++;// code...
        }

      }
  $pdf->Cell(5, 4,$estado,1, 0 , 'L', $bandera );
  //    echo "<td>".$estado."</td>";
  }
  $pdf->Cell(14, 4,$tar,1, 0 , 'C', $bandera );
  $pdf->Cell(18, 4,$ina,1, 0 , 'C', $bandera );

      $pdf->Ln(4);
$bandera = !$bandera;
}
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(114,8,'',0);
$pdf->Output();
?>
