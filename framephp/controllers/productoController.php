<?php 
	class productoController extends Controller{
		
		//metodo constructor
		public function __construct(){
			parent:: __construct();
		}
		
		//Recuerda que todas nuestras clases tendran un metodo index() asi este vacio
		public function index(){
			$objModel = $this ->loadModel ('producto');
			$this->_view->productos = $objModel->getProductos();
			$this->_view->setJs(array('index'));
 			$this->_view->renderizar('/index');
		}
		
		
		
		public function editProducto($productCode =''){
			$objModel = $this-> loadModel('producto');
		
			$this-> _view->producto= $objModel-> editProducto($productCode);
		
			//$this->_view->setJs(array('edit'));
			$this-> _view-> renderizar('editProducto');
		}
		
		
		
		
		
		
		
		/*
		public function editar(){
			$productCode = trim($_POST['productCode']);
			$productName = trim($_POST['productName']);
            $productLine = trim($_POST['productLine']);
            $productScale = trim($_POST['productScale']);
            $productVendor = trim($_POST['productVendor']);
            $productDescription = trim($_POST['productDescription']);
            $quantityInStock = trim($_POST['quantityInStock']);
            $buyPrice = trim($_POST['buyPrice']);
            $MSRP = trim($_POST['MSRP']);
			
			
			
			$objModel = $this-> loadModel('producto');
			$result = $objModel -> editar($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,
					$quantityInStock,$buyPrice,$MSRP);
			
			//if ($result) echo 'Error';
			//else echo 'Ok';
			$this -> redireccionar('producto/index');
		}
		*/
		
		public function delProducto($productCode=''){
			$objModel = $this-> loadModel('producto');
			$objModel -> delProducto($productCode);
			$this->redireccionar('producto/index');
		}
		
		
		public function	updateProducto(){
			$productCode = $_POST['productCode'];
			$productName = $_POST['productName'];
            $productLine = $_POST['productLine'];
            $productScale = $_POST['productScale'];
            $productVendor = $_POST['productVendor'];
            $productDescription = $_POST['productDescription'];
            $quantityInStock = $_POST['quantityInStock'];
            $buyPrice = $_POST['buyPrice'];
            $MSRP = $_POST['MSRP'];
			$foto= null;
			if (isset($_FILES['foto'])){
				$nombrearchivo= basename($_FILES['foto']['name']);
				$destino_archivo = "temp/".$nombrearchivo ;
				if(move_uploaded_file($_FILES['foto']['tmp_name'],$destino_archivo))
				{
					/* array de tipos de permitidos */
					$mimes_permitidos = array('image/jpeg','image/jpg','image/png');
					$mime = $_FILES['foto']['type'];
					if (in_array($mime, $mimes_permitidos))
					{
						$fp = fopen($destino_archivo,"rb");
						$contenido = fread($fp, filesize($destino_archivo));
						$foto = addslashes($contenido);
						fclose($fp);
					}
					unlink($destino_archivo);
				}
			}
			$objModel = $this->loadModel('producto');
			$error='';
			$error = $objModel->updateProducto($productCode,$productName,$productLine,$productScale,$productVendor,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP);
			if ($foto!=null) $error = $objModel->updateProductoImg($productCode,$mime,$foto);
		
			echo $error;
		}
		public function getProducto($productCode){
			$objModel = $this->loadModel('producto');
			$reg = $objModel->getProducto($productCode);
			header("Content-type: ".$reg->mime);
			echo $reg->data;
		}
		
		public function ejemplo4(){
			$this->getLibrary('fpdf/fpdf');
				
			$pdf = new FPDF();
			
			// define la cabecera de la tabla
			$header = array('ProductCode', 'ProductName', 'BuyPrice');
			
			$objModel = $this ->loadModel ('producto');
			$productos = $objModel->getProductos();
			
			$data  = array();
			
			while ($reg = $productos->fetch_object()){
				$data[]=array($reg->productCode, $reg->productName,$reg->buyPrice);
			};
				
		
			// define tipo de letra
			$pdf->SetFont('Arial','',14);
			
				$pdf->AddPage();
				$w = array(40, 110, 30);
				// Cabeceras
				for($i=0;$i<count($header);$i++)
					$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
					$pdf->Ln();
					// Datos
					foreach($data as $row)
					{
						$pdf->Cell($w[0],6,$row[0],'LR');
						$pdf->Cell($w[1],6,$row[1],'LR');
						$pdf->Cell($w[2],6,number_format($row[2]),'LR',0,'L');
		
						$pdf->Ln();
					}
					// Línea de cierre
					$pdf->Cell(array_sum($w),0,'','T');
		
					$pdf->Output();
		
		}
		
		
		
	
	}

?>