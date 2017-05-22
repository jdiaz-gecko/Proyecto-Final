<?php 


class pdfController extends Controller{
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
	}
	
	public function ejemplo1(){
		$this->getLibrary('fpdf/fpdf');
		
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'¡Hola, Mundo!');
		$pdf->Output();
	}
	
	public function ejemplo2(){
		$this->getLibrary('fpdf/fpdf');
	
		$pdf = new FPDF('L');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		for($i=1;$i<=40;$i++)
			$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
			$pdf->Output();
	
	
	}
	
	
	public function ejemplo3(){
		$this->getLibrary('fpdf/fpdf');
		
		
		$pdf = new FPDF();
		
		// define la cabecera de la tabla
		$header = array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
	
		$data = array();
		// Carga de datos
		$data[] = array ('Austria','Vienna',838590,8075);
		$data[] = array ('Belgium','Brussels',30518,10192);
		$data[] = array ('Denmark','Copenhagen',43094,5295);
		$data[] = array ('Finland','Helsinki',304529,5147);
		$data[] = array ('France','Paris',543965,58728);
		$data[] = array ('Germany','Berlin',357022,82057);
		$data[] = array ('Ireland','Dublin',70723,3694);
		$data[] = array ('Italy','Roma',301316,57563);
		$data[] = array ('Luxembourg','Luxembourg',2586,424);
		$data[] = array ('Netherlands','Amsterdam',41526,15654);
	
		// define tipo de letra
		$pdf->SetFont('Arial','',14);
		//pagina en blanco
		$pdf->AddPage();
	
		foreach($header as $col)
			$pdf->Cell(40,7,$col,1);
	
			$pdf->Ln();
				
			// Datos
			foreach($data as $row)
			{
				foreach($row as $col)
					$pdf->Cell(40,6,$col,1);
					$pdf->Ln();
			}
	
	
			$pdf->AddPage();
			$w = array(40, 35, 45, 40);
			// Cabeceras
			for($i=0;$i<count($header);$i++)
				$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
				$pdf->Ln();
				// Datos
				foreach($data as $row)
				{
					$pdf->Cell($w[0],6,$row[0],'LR');
					$pdf->Cell($w[1],6,$row[1],'LR');
					$pdf->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
					$pdf->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
					$pdf->Ln();
				}
				// Línea de cierre
				$pdf->Cell(array_sum($w),0,'','T');
	
				$pdf->Output();
	
	}
	
	
	
}

?>