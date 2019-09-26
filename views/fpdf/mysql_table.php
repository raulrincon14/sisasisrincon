<?php
require('views/fpdf/fpdf.php');

class PDF_MySQL_Table extends FPDF
{
var $PHPprotectV507=false;
var $PHPprotectV508=array();
var $PHPprotectV509;
var $PHPprotectV510;
var $PHPprotectV511;
var $PHPprotectV512;

function Header()
{

	if($this->ProcessingTable)
		$this->TableHeader();
}

function TableHeader()
{
	$this->SetFont('Arial','B',10);
	$this->SetX($this->TableX);
	$PHPprotectV444=!empty($this->HeaderColor);
	if($PHPprotectV444)
		$this->SetFillColor($this->HeaderColor[0],$this->HeaderColor[1],$this->HeaderColor[2]);
	foreach($this->aCols as $PHPprotectV513)
		$this->Cell($PHPprotectV513['w'],6,$PHPprotectV513['c'],1,0,'C',$PHPprotectV444);
	$this->Ln();
}

function Row($PHPprotectV474)
{
	$this->SetX($this->TableX);
	$PHPprotectV514=$this->ColorIndex;
	$PHPprotectV444=!empty($this->RowColors[$PHPprotectV514]);
	if($PHPprotectV444)
		$this->SetFillColor($this->RowColors[$PHPprotectV514][0],$this->RowColors[$PHPprotectV514][1],$this->RowColors[$PHPprotectV514][2]);
	foreach($this->aCols as $PHPprotectV513)
		$this->Cell($PHPprotectV513['w'],5,$PHPprotectV474[$PHPprotectV513['f']],1,0,$PHPprotectV513['a'],$PHPprotectV444);
	$this->Ln();
	$this->ColorIndex=1-$PHPprotectV514;
}

function CalcWidths($PHPprotectV423,$PHPprotectV443)
{

	$PHPprotectV515=0;
	foreach($this->aCols as $PHPprotectV306=>$PHPprotectV513)
	{
		$PHPprotectV305=$PHPprotectV513['w'];
		if($PHPprotectV305==-1)
			$PHPprotectV305=$PHPprotectV423/count($this->aCols);
		elseif(substr($PHPprotectV305,-1)=='%')
			$PHPprotectV305=$PHPprotectV305/100*$PHPprotectV423;
		$this->aCols[$PHPprotectV306]['w']=$PHPprotectV305;
		$PHPprotectV515+=$PHPprotectV305;
	}

	if($PHPprotectV443=='C')
		$this->TableX=max(($this->w-$PHPprotectV515)/2,0);
	elseif($PHPprotectV443=='R')
		$this->TableX=max($this->w-$this->rMargin-$PHPprotectV515,0);
	else
		$this->TableX=$this->lMargin;
}

function AddCol($PHPprotectV516=-1,$PHPprotectV423=-1,$PHPprotectV517='',$PHPprotectV443='L')
{

	if($PHPprotectV516==-1)
		$PHPprotectV516=count($this->aCols);
	$this->aCols[]=array('f'=>$PHPprotectV516,'c'=>$PHPprotectV517,'w'=>$PHPprotectV423,'a'=>$PHPprotectV443);
}

function Table($PHPprotectV247,$PHPprotectV518=array())
{

	$PHPprotectV519=mysql_query($PHPprotectV247) or die('Erreur: '.mysql_error()."<BR>Requ�te: $PHPprotectV247");

	if(count($this->aCols)==0)
	{
		$PHPprotectV435=mysql_num_fields($PHPprotectV519);
		for($PHPprotectV306=0;$PHPprotectV306<$PHPprotectV435;$PHPprotectV306++)
			$this->AddCol();
	}

	foreach($this->aCols as $PHPprotectV306=>$PHPprotectV513)
	{
		if($PHPprotectV513['c']=='')
		{
			if(is_string($PHPprotectV513['f']))
				$this->aCols[$PHPprotectV306]['c']=ucfirst($PHPprotectV513['f']);
			else
				$this->aCols[$PHPprotectV306]['c']=ucfirst(mysql_field_name($PHPprotectV519,$PHPprotectV513['f']));
		}
	}

	if(!isset($PHPprotectV518['width']))
		$PHPprotectV518['width']=0;
	if($PHPprotectV518['width']==0)
		$PHPprotectV518['width']=$this->w-$this->lMargin-$this->rMargin;
	if(!isset($PHPprotectV518['align']))
		$PHPprotectV518['align']='C';
	if(!isset($PHPprotectV518['padding']))
		$PHPprotectV518['padding']=$this->cMargin;
	$PHPprotectV368=$this->cMargin;
	$this->cMargin=$PHPprotectV518['padding'];
	if(!isset($PHPprotectV518['HeaderColor']))
		$PHPprotectV518['HeaderColor']=array();
	$this->HeaderColor=$PHPprotectV518['HeaderColor'];
	if(!isset($PHPprotectV518['color1']))
		$PHPprotectV518['color1']=array();
	if(!isset($PHPprotectV518['color2']))
		$PHPprotectV518['color2']=array();
	$this->RowColors=array($PHPprotectV518['color1'],$PHPprotectV518['color2']);

	$this->CalcWidths($PHPprotectV518['width'],$PHPprotectV518['align']);

	$this->TableHeader();

	$this->SetFont('Arial','',8);
	$this->ColorIndex=0;
	$this->ProcessingTable=true;
	while($PHPprotectV7=mysql_fetch_array($PHPprotectV519))
		$this->Row($PHPprotectV7);
	$this->ProcessingTable=false;
	$this->cMargin=$PHPprotectV368;
	$this->aCols=array();
}
}

?>
