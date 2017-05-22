<?php 
	class usuarioController extends Controller{
		
		//metodo constructor
		public function __construct(){
			parent:: __construct();
		}
		
		//Recuerda que todas nuestras clases tendran un metodo index() asi este vacio
		public function index(){
			$objModel = $this ->loadModel ('usuario');
			$this->_view->usuarios = $objModel->getUsuarios();
			$this->_view->setJs(array('index'));
			$this->_view->renderizar('index');
		}


		public function delUsuario($idusuario=''){
			$objModel = $this-> loadModel('usuario');
			$objModel -> delUsuario($idusuario);
			$this->redireccionar('usuario/index');
		}

	
		
        public function editUsuario($idusuario =''){
            $objModel = $this-> loadModel('usuario');
            
            $this-> _view-> usuario= $objModel-> editUsuario($idusuario);
            
            $this->_view->setJs(array('edit'));
            $this-> _view-> renderizar('editUser');
        }
        
        /*
        public function editar(){
            $idusuario = trim($_POST['idusuario']);
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $rol = $_POST['rol'];

            $objModel = $this-> loadModel('usuario');
            $result = $objModel -> editar($idusuario,$nombre,$email,$rol);
       
            if ($result) echo 'Error';
            else echo 'Ok';
        }
		*/





        //sera el metodo que a�adera un usuario
		//http://192.168.15.52/framework/usuario/addUsuario
		public function addUsuario(){
			//antes que carge la vista, que carge el JS
			//el metodo setJs nos permite cargar varios archivos JS
			$this->_view->setJs(array('add'));
			$this->_view->renderizar('add');
		}
		
		//recepcionando los datos del formulario
		public function recepcionUsuario() {
			//trim elimina espacios a la izquierda y a la derecha
			$usuario = trim($_POST['usuario']);
			$nombre = trim($_POST['nombre']);
			$email = trim($_POST['email']);
			$rol = $_POST['rol'];
			$clave1 = trim($_POST['clave1']);
			//le quitamos clave2 por que ya validamos por jQuery
// 			$clave2 = trim($_POST['clave2']);
		
			$objModel = $this->loadModel('usuario');
			$result = $objModel->saveUsuario($usuario,$nombre,$email,$rol,$clave1);
			// ??
			if ($result) echo 'Error';
			//este ok es el que recibe jQuery para ver si hay error o no
			else echo 'Ok';
// 			$this->redireccionar('index/panel');
		}
		
		public function	updateUsuario(){
			$usuario =$_POST['usuario'];
			$nombre =$_POST['nombre'];
			$email =$_POST['email'];
			$rol =$_POST['rol'];
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
			$objModel = $this->loadModel('usuario');
			$error=''; 
			$error = $objModel->updateUsuario($usuario,$nombre,$email,$rol);
			if ($foto!=null) $error = $objModel->updateUsuarioImg($usuario,$mime,$foto);
		
			echo $error;
		}
		
		public function getFoto($idusuario){
			$objModel = $this->loadModel('usuario');
			$reg = $objModel->getFoto($idusuario);
			header("Content-type: ".$reg->mime);
			echo $reg->data;
		}

		
	}
?>