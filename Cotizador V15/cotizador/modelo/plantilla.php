<?php
	require_once("fpdf/fpdf.php");
	

//ESTO LE DA EL FORMATO A LA HOJA DEL PDF

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../vista/img/grupo_mitta.png', 5, 5, 50 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode('SOLICITUD DE COTIZACIÓN'),0,0,'C');
			$this->Ln(10);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'MITTA '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>