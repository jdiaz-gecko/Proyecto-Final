<?php 
Class usuarioModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	
	public function validaUsuario($usuario,$clave){
		
		$sql ="select * from usuarios where idusuario='$usuario' and clave=SHA1('$clave')";
		//ejecutamos el query:    $this->_db->query($sql) or die("Error : $sql");
		$result = $this->_db->query($sql) or die('Error : '. $sql);
		
		if ($result->num_rows) 
			return true;
		else 
			return false;
	}

    public function editUsuario($idusuario) {
        $sql = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
        $result = $this-> _db-> query($sql) or die ('Error '.$sql);
        $reg = null;

        if($result -> num_rows){
            $reg = $result-> fetch_object();
        }
        return $reg;
    }
/*
    public function editar($idusuario,$nombre,$email,$rol){
        $sql = "UPDATE usuarios SET nombre = '$nombre',
										email = '$email',
										rol = '$rol',
										WHERE idusuario = '$idusuario'";
        $this->_db->query($sql);
		return $this->_db->errno;
    }
*/

    public function saveUsuario($usuario,$nombre,$email,$rol,$clave){
		
		$sql = "insert into usuarios set idusuario = '$usuario',
										 nombre = '$nombre',
										 email = '$email',
										 rol = '$rol',
										 clave = SHA1('$clave'),
										 fechareg = now()";
// 		or die() es si encuentras un error paraliza todo
		$this->_db->query($sql);
		return $this->_db->errno;
	}
	

	public function getUsuarios(){
		
		$sql = 'select idusuario, nombre, email, rol, fechareg from usuarios';
		$result = $this->_db->query($sql) or die ('Error'.$sql);
		return $result;
		
	}
	
	
	public function getUsuario($idusuario){
		$sql = "select * from usuarios where idusuario='$idusuario'";
		$result = $this->_db->query($sql) or die ('Error'.$sql);
		$reg=null;
		if ($result->num_rows){
			$reg= $result->fetch_object();
		}
		return $reg;
	}
	
	public function delUsuario($idusuario){
		$sql = "delete from usuarios where idusuario='$idusuario'";
		$this->_db->query($sql) or die ('Error'.$sql);
		return;
	}
	
	
	public function updateUsuario($idusuario, $nombre, $email, $rol){
		 $sql = "UPDATE usuarios SET nombre = '$nombre',
										email = '$email',
										rol = '$rol'
										WHERE idusuario = '$idusuario'";
		$this->_db->query($sql) or die ('Error'.$sql);
		return $this->_db->errno;
	}
	
	public	function updateUsuarioImg($idusuario, $mime, $data){
		$sql = "select idusuario from usuario_img where idusuario ='$idusuario'";
		$result = $this->_db->query($sql) or die ('Error'.$sql);
		if ($result->num_rows){
			$sql = "update usuario_img set mime='$mime', data='$data' where idusuario = '$idusuario'";
		}
		else{
			$sql = "insert into usuario_img set idusuario = '$idusuario', mime='$mime', data='$data'";
		}
		$this-> _db->query($sql) or die ('Error'.$sql);		
		return $this-> _db->errno;
		
	}
	
	public function getFoto($idusuario){
		$sql = "select * from usuario_img where idusuario='$idusuario'";
		$result = $this->_db->query($sql) or die ('Error'.$sql);
		$reg=null;
		if ($result->num_rows){
			$reg=$result->fetch_object();
		}
		return $reg;
	}
	
}

// mysqli es una clase se encarga de hacer la conexio con la BD, hacer los query.
//tiene diferentes propiedades:
// $this->_db->errno ... contiene el codigo de error numero, del error producido durante la conexion(si tiene error va ser 0 y si no hay error diferente de 0)
// $this->_db->error .... ESCUCHA TU CELULAR
// $this->_db->errno ... (lo podemos utilizar despues de haber lanzado un query)
// $this->_db->err ... (lo podemos utilizar despues de haber lanzado un query)
?>