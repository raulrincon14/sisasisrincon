<?php
class PDF extends FPDF
{
// Cabecera de página

// Pie de página
    function Header(){
//$this->Image('views/images/marcos.png',0,0,0);
$this->SetFont('Arial', '', 8);
$this->Cell(11, 10, '', 0);
$this->SetFont('Arial', '', 9);
//$this->Cell(0,10,'Punto de Venta: '.$puntn,0,0,'R');
$this->Ln(8);
    }
function Footer(){
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    /* Número de página

    $this->Cell(10, 10, 'Emitido: '.date('d-m-Y'), 0,'L');
    $this->Cell(0,10,'Desarrollado por: RINCOSOFT E.I.R.L ',0,0,'C');
    $this->Cell(0,10,'Pagina: '.$this->PageNo().'/{nb}',0,0,'R');
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');*/
 }
}

?>
