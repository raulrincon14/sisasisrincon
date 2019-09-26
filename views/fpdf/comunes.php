<?php
class PDF extends FPDF
{

function Header()
{


    $this->Image('views/iconos/logo.jpg',20,8,150);
    $this->Ln(25);
}


function Footer()
{

    $this->SetFont('Arial','',6);
	$this->SetY(-21);
	$this->Cell(0,10,'Derechos Reservados a: Agrusam y Servicios S.A.C.',0,0,'C');
	$this->SetY(-18);
	$this->Cell(0,10,html_entity_decode('Desarrollado por: RincoSoft e.i.r.l'),0,0,'C');
	$this->SetY(-15);
	$this->Cell(0,10,html_entity_decode('Programador:Rincon Jara Raul.'),0,0,'C');
	$this->SetY(-12);
    $this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');
}

}

?>
