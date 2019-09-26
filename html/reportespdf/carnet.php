<?php
error_reporting(E_ALL ^ E_NOTICE);
require('views/fpdf/fpdf.php');
include('views/phpqrcode/qrlib.php');
//include("conectar.php");
//include("views/fpdf/clase1.php");

//$link=Conectarse();
$id_codigo=$_SESSION['idpuntov'];

class PDF extends FPDF{
   //Columna actual
   protected $col = 0; // Columna actual
   protected $y0;      // Ordenada de comienzo de la columna
   //Cabecera de página


   function Header()
   {
       // Cabacera
       global $title;

       $this->SetFont('Arial','B',15);
       $w = $this->GetStringWidth($title)+6;
       $this->SetX((210-$w)/2);
       $this->SetDrawColor(0,80,180);
       $this->SetFillColor(230,230,0);
       $this->SetTextColor(220,50,50);
       $this->SetLineWidth(1);
       $this->Ln(10);
       // Guardar ordenada
       $this->y0 = $this->GetY();
   }
   function SetCol($col)
   {
       // Establecer la posición de una columna dada
       $this->col = $col;
       $x = 10+$col*133;
       $this->SetLeftMargin($x);
       $this->SetX($x);
   }

   function AcceptPageBreak()
   {
       // Método que acepta o no el salto automático de página
       if($this->col<1)
       {
           // Ir a la siguiente columna
           $this->SetCol($this->col+1);
           // Establecer la ordenada al principio
           $this->SetY($this->y0);
           // Seguir en esta página
           return false;
       }
       else
       {
           // Volver a la primera columna
           $this->SetCol(0);
           // Salto de página
           return true;
       }
     }



   function ChapterBody($file)
   {
       // Abrir fichero de texto
       //$txt = file_get_contents($file);
       // Fuente
       $rr = 0;
       $db = new Conexion();
       $pa1=$db->query("SELECT * FROM alumno WHERE a_duplicado='si';");
      // $pa1=$db->query("SELECT * from alumno where dni='72019178';");
        $bandera = false;
        $rr=1;
                           while($row1=$db->recorrer($pa1)){

        $rr++;
      $this->SetFont('Times','',12);

      //Image('marcos.png',0,0,0);
      // Imprimir texto en una columna de 6 cm de ancho
      $this->SetTextColor(252, 255, 255);  // Establece el color del texto (en este caso es blanco)


      $this->SetFont('Arial', 'B', 8);
      $this->Cell(1, 70, 'P '.$rr.'',0, 0 , 'L',false );
      $this->Image('views/images/marco.png' ,$this->GetX(),$this->GetY(), 0 , 0,'PNG');
      $this->Ln(1);
      $this->Cell(28, 5,'',0, 0 , 'C' );
      $this->Cell(9, 10,$this->Image('views/images/insignia.jpg', $this->GetX(), $this->GetY(),8,10),0);
      $this->SetTextColor(72, 22, 180);
      $this->Cell(50, 5,utf8_decode('I.E. "ROQUE SAENZ PEÑA"'),0, 0 , 'C' );
      $this->Ln(3);
      $this->Cell(37, 6,'',0, 0 , 'C' );
      $this->SetTextColor(157, 13, 13);
      $this->Cell(50, 5,utf8_decode('TARJETA DE ACCESO'),0, 0 , 'C' );
      $this->Ln(7);
      $this->Ln(1);
      $this->Cell(5, 6,'',0, 0 , 'C' );
      if (is_file('views/images/alumnosfoto/'.$row1['idalumno'].'.jpg')) {
      $this->Cell(35,49,$this->Image('views/images/alumnosfoto/'.$row1['idalumno'].'.jpg', $this->GetX(), $this->GetY(),35,48),0);  // code...
      } else {
      $this->Cell(35,49,$this->Image('views/images/alumnosfoto/sinfoto.png', $this->GetX(), $this->GetY(),35,48),0);
      }
      $this->Cell(5, 6,'',0, 0 , 'C' );
      $contenido = $row1['dni'];

      // Exportamos una imagen llamado resultado.png que contendra el valor de la avriable $content
      QRcode::png($row1['idalumno'],'views/images/codigoqr/'.$row1['idalumno'].'.png',QR_ECLEVEL_L,10,0);
      $this->Cell(55,55,$this->Image('views/images/codigoqr/'.$row1['idalumno'].'.png', $this->GetX(), $this->GetY(),53,53),0);
      //$this->Cell(55,55,$this->Image('views/images/codigoqr/74136447.png', $this->GetX(), $this->GetY(),55,55),0);
      $this->Cell(34, 6,'',0, 0 , 'C' );
      $this->Ln(49);
      $this->SetFont('Arial', 'B', 6);
      $this->SetTextColor(13, 75, 157);
      $this->Cell(45, 3,$row1['a_apellido'],0, 0 , 'C' );
      $this->Ln(2);
      $this->Cell(45, 3,$row1['a_nombre'],0, 0 , 'C' );
      $this->Ln(2);
      $this->Cell(45, 2,'',0, 0 , 'C' );
      $this->SetFont('Arial', '', 6);
      $this->SetTextColor(1, 4, 9);
      $this->Cell(55, 3,'ACERCA LA IMAGEN QR A LA CAMARA',0, 0 , 'C' );
      $this->Ln(2);
      $this->SetTextColor(149, 14, 14);
      $this->Cell(45, 3,$row1['a_grado'].' "'.$row1['a_seccion'].'" de '.$row1['a_nivel'],0, 0 , 'C' );
      $this->SetTextColor(0, 4, 9);
      $this->Cell(55, 3,utf8_decode('PARA UNA RÁPIDA LECTURA'),0, 0 , 'C' );

      $this->SetDrawColor(56, 85, 85);
      $this->SetFillColor(52, 107, 155);

      $this->Ln(10);
      $this->SetFillColor(52, 107, 55);
        }


       //$this->MultiCell(110,5,$txt);
       $this->Ln();
       // Cita en itálica
       $this->SetFont('','I');

       // Volver a la primera columna
       $this->SetCol(0);
   }

   function PrintChapter($num, $title, $file)
   {
       // Añadir capítulo
       $this->AddPage();
       //$this->Image('views/images/marcos.png',0,0,0);
       //$this->ChapterTitle($num,$title);
       //$this->Image('marcos.png',0,0,0);
       $this->ChapterBody($file);
   }
   }

   $pdf = new PDF('L','mm','A4');


   $pdf->PrintChapter(1,'Archivo de prueba','html/reporte/pdf/prueba1.txt');

 //$pdf->PrintChapter(2,'Archivo de prueba','pdf/prueba2.txt');
 //$pdf->PrintChapter(2,'LOS PROS Y LOS CONTRAS','20k_c2.txt');
   $pdf->Output();




//$pa=$db->query("SELECT * from alumno where idpunto='000001'");
//$row=$db->recorrer($pa);


//fin 2 carnets

?>
