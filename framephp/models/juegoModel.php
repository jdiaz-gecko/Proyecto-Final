<?php
class juegoModel extends Model {
    public function __construct() {
        parent::__construct ();
    }

    public function getJuegos() {
        $sql = 'select * from games';
        $result = $this->_db->query ( $sql ) or die ( 'Error' . $sql );
        return $result;
    }
    public function getJuego($id){
        $sql = "select * from games where id='$id'";
        $result = $this->_db->query($sql) or die ('Error'.$sql);
        $reg=null;
        if ($result->num_rows){
            $reg= $result->fetch_object();
        }
        return $reg;
    }


    public function editJuego($id) {
        $sql = "SELECT * FROM games WHERE id = '$id'";
        $result = $this->_db->query ( $sql ) or die ( 'Error ' . $sql );
        $reg = null;

        if ($result->num_rows) {
            $reg = $result->fetch_object ();
        }
        return $reg;
    }



    public function updateJuego($id,$title,$players,$developer,$genero,$overview){
        $sql = "UPDATE games SET GameTitle = '$title',
                                 Players = $players, 
                                 Developer = '$developer', 
                                 Genre = '$genero',
                                 Overview = '$overview'
                                 WHERE id = '$id'";
        $result = $this-> _db -> query($sql) or die ('Error: '.$sql);
        return $result;
    }




    public function delJuego($id){
        $sql = "delete from games where id='$id'";
        $this->_db->query($sql) or die ('Error'.$sql);
        return;
    }
    public function saveJuego($title,$players,$developer,$genero,$overview){

        $sql = "insert into games set GameTitle = '$title',
										 Players = '$players',
										 Developer = '$developer',
										 Genre = '$genero',
										 Overview = '$overview'";
// 		or die() es si encuentras un error paraliza todo
        $this->_db->query($sql) or die ('Error'.$sql);
        return $this->_db->errno;
    }

}

// mysqli es una clase se encarga de hacer la conexio con la BD, hacer los query.
// tiene diferentes propiedades:
// $this->_db->errno ... contiene el codigo de error numero, del error producido durante la conexion(si tiene error va ser 0 y si no hay error diferente de 0)
// $this->_db->error .... ESCUCHA TU CELULAR
// $this->_db->errno ... (lo podemos utilizar despues de haber lanzado un query)
// $this->_db->err ... (lo podemos utilizar despues de haber lanzado un query)
?>