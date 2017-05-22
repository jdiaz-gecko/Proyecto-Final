<?php
class productoModel extends Model {
	public function __construct() {
		parent::__construct ();
	}
	
	public function getProductos() {
		$sql = 'select * from Products';
		$result = $this->_db->query ( $sql ) or die ( 'Error' . $sql );
		return $result;
	}
	public function editProducto($productCode) {
		$sql = "SELECT * FROM Products WHERE productCode = '$productCode'";
		$result = $this->_db->query ( $sql ) or die ( 'Error ' . $sql );
		$reg = null;
		
		if ($result->num_rows) {
			$reg = $result->fetch_object ();
		}
		return $reg;
	}
	
	/*
	public function editar($productCode,$productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $MSRP) {
		$sql = "UPDATE Products SET
		productName = '$productName',
		productLine = '$productLine',
		productScale = '$productScale',
		productVendor = '$productVendor',
		productDescription = '$productDescription',
		quantityInStock = $quantityInStock,
		buyPrice = $buyPrice,
		MSRP = $MSRP
		WHERE productCode = '$productCode'";
		
		//$this->_db->query ( $sql );
		//return $this->_db->errno;
		$result = $this -> _db -> query($sql) or die ('Error: '. $sql);
		return $result;
	}
	*/
	public function delProducto($productCode){
		$sql = "delete from Products where productCode='$productCode'";
		$this->_db->query($sql) or die ('Error'.$sql);
		return;
	}
	public function updateProducto($productCode,$productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $MSRP){
		$sql = "UPDATE Products SET 
		productName = '$productName',
		productLine = '$productLine',
		productScale = '$productScale',
		productVendor = '$productVendor',
		productDescription = '$productDescription',
		quantityInStock = $quantityInStock,
		buyPrice = $buyPrice,
		MSRP = $MSRP
		WHERE productCode = '$productCode'";
		$this->_db->query($sql) or die ('Error'.$sql);
		return $this->_db->errno;
	}
	
	public	function updateProductoImg($productCode, $mime, $data){
		$sql = "select productCode from producto_img where productCode ='$productCode'";
		$result = $this->_db->query($sql) or die ('Error'.$sql);
		if ($result->num_rows){
			$sql = "update producto_img set mime='$mime', data='$data' where productCode = '$productCode'";
		}
		else{
			$sql = "insert into producto_img set productCode = '$productCode', mime='$mime', data='$data'";
		}
		$this-> _db->query($sql) or die ('Error'.$sql);
		return $this-> _db->errno;
	
	}
	
	public function getProducto($productCode){
		$sql = "select * from producto_img where productCode='$productCode'";
		$result = $this->_db->query($sql) or die ('Error'.$sql);
		$reg=null;
		if ($result->num_rows){
			$reg=$result->fetch_object();
		}
		return $reg;
	}
	
	
}

// mysqli es una clase se encarga de hacer la conexio con la BD, hacer los query.
// tiene diferentes propiedades:
// $this->_db->errno ... contiene el codigo de error numero, del error producido durante la conexion(si tiene error va ser 0 y si no hay error diferente de 0)
// $this->_db->error .... ESCUCHA TU CELULAR
// $this->_db->errno ... (lo podemos utilizar despues de haber lanzado un query)
// $this->_db->err ... (lo podemos utilizar despues de haber lanzado un query)
?>