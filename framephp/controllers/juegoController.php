<?php
class juegoController extends Controller{

    //metodo constructor
    public function __construct(){
        parent:: __construct();
    }

    //Recuerda que todas nuestras clases tendran un metodo index() asi este vacio
    public function index(){
        $objModel = $this ->loadModel ('juego');
        $this->_view->juego = $objModel->getJuegos();
        $this->_view->setJs(array('index'));
        $this->_view->renderizar('/index');
    }


    public function delJuego($id=''){
        $objModel = $this-> loadModel('juego');
        $objModel -> delJuego($id);
        $this->redireccionar('juego/index');
    }


    public function editJuego($id =''){
        $objModel = $this-> loadModel('juego');

        $this-> _view->juego = $objModel-> editJuego($id);

        $this->_view->setJs(array('edit'));
        $this-> _view-> renderizar('editJuego');
    }

    public function	updateJuego(){
        $id=$_POST['id'];
        $title =$_POST['title'];
        $players =$_POST['players'];
        $developer =$_POST['developer'];
        $genero =$_POST['genero'];
        $overview =$_POST['overview'];

        $objModel = $this->loadModel('juego');
        $error='';
        $error = $objModel->updateJuego($id,$title,$players,$developer,$genero,$overview);

        echo $error;
    }






    public function addJuego(){
        //antes que carge la vista, que carge el JS
        //el metodo setJs nos permite cargar varios archivos JS
        $this->_view->setJs(array('add'));
        $this->_view->renderizar('add');
    }


    public function recepcionJuego() {
        //trim elimina espacios a la izquierda y a la derecha
        $title = trim($_POST['title']);
        $players = trim($_POST['players']);
        $developer = trim($_POST['developer']);
        $genero = $_POST['genero'];
        $overview = trim($_POST['overview']);

        $objModel = $this->loadModel('juego');
        $error='';
        $error = $objModel->saveJuego($title,$players,$developer,$genero,$overview);
        // ??
        echo $error;
    }


}

?>