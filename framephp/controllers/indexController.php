<?php 
	class indexController extends Controller{
		
		//metodo constructor
		public function __construct(){
			parent:: __construct();
		}
		
		public function index(){
			//rendedirzar significa que estamos llamando a un mentodo de la vista de nombre index
			//true elimina el header y el footer y solamente carga la pagina principal
			$this->_view->renderizar('index',true);
		}
		
		public function login(){
			$usuario = $_POST['usuario'];
			$clave = $_POST['clave'];
			
			// Llamando al modelo
			//loadModel me permite invocar a un usuario
			$objModel = $this->loadModel('usuario');
			
			
			if ( $objModel->validaUsuario($usuario,$clave)){
				$_SESSION['usuario'] = $usuario;
				$this->redireccionar('juego/index');
			} else {
				$this->_view->renderizar('index',true);
			}
		}
		
		public function panel(){
			if(isset($_SESSION['usuario']))
				$this->_view->renderizar('juego');
			else 
				$this->redireccionar('juego/index');
		}
		
		public function logout(){
			//Elimina la variables de sesion
			unset($_SESSION['usuario']);
			$this->redireccionar('index/index');
		}
		
		
	}//fin de la clase indexController

?>