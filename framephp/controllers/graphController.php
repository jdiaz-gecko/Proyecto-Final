<?php

class graphController extends Controller
{
	public function __construct() {
		parent::__construct();

	}

	public function index()
	{
			
	}

	public function imagen1()
	{

		$im = @imagecreate(200, 200);
		$red = imagecolorallocate($im, 255,0,0);
		$blue = imagecolorallocate($im, 0,0,255 );
		$green = imagecolorallocate($im, 0,255,0 );
		$yellow = imagecolorallocate($im, 0,255,0 );
		$black = imagecolorallocate($im, 0,0,0 );
		imageline( $im, 0, 0, 199, 199, $blue );
		imageline( $im, 0, 199, 199, 0, $green );
		imageline( $im, 100, 0, 100, 200, $black );
		header("Content-type: image/png");
		imagepng($im);
		imagedestroy($im);
	}

	public function imagen2()
	{

		$lienzo = imagecreatetruecolor(200, 200);

		// Asignar colores
		$rosa = imagecolorallocate($lienzo, 255, 105, 180);
		$blanco = imagecolorallocate($lienzo, 255, 255, 255);
		$verde = imagecolorallocate($lienzo, 132, 135, 28);

		// Dibujar tres rectángulos, cada uno con su color
		imagerectangle($lienzo, 50, 50, 150, 150, $rosa);
		imagerectangle($lienzo, 45, 60, 120, 100, $blanco);
		imagerectangle($lienzo, 100, 120, 75, 160, $verde);

		// Imprimir y liberar memoria
		header('Content-Type: image/jpeg');
		imagejpeg($lienzo);
		imagedestroy($lienzo);
	}

	public function imagen3()
	{
		$imagen = imagecreatetruecolor(400, 300);

		// Seleccionar el color de fondo.
		$fondo = imagecolorallocate($imagen, 0, 0, 0);

		// Escoger un color para la elipse.
		$col_ellipse = imagecolorallocate($imagen, 255, 255, 255);

		// Dibujar la elipse
		imageellipse($imagen, 200, 150, 300, 200, $col_ellipse);


		// rellena la elipse con el mismo color
		imagefill($imagen, 200, 150, $col_ellipse);

		// Imprimir la imagen
		header("Content-type: image/png");
		imagepng($imagen);
		imagedestroy($imagen);
	}

	public function imagen4()
	{

		
		$img = imagecreate(200, 200);

		// definir los colores
		$white = imagecolorallocate($img, 255, 255, 255);
		$black = imagecolorallocate($img, 0, 0, 0);
			
		// dibujar un circulo negro
		imagearc($img, 100, 100, 150, 150, 0,270, $black);

		// mostrar la imagen en el navegador
		header("Content-type: image/png");
		imagepng($img);
		imagedestroy($img);
	}

	public function imagen5()
	{
		// Variables que indican el archivo de la imagen y el nuevo tamano
		$filename ='public/img/linux_force.jpg';
		$percent = 0.1;

		// Se obtienen las nuevas dimensiones
		list($width, $height) = getimagesize($filename);
		$newwidth = $width * $percent;
		$newheight = $height * $percent;

		// Cargar la imagen
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		$source = imagecreatefromjpeg($filename);

		// Redimensionar
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		// Mostrar la nueva imagen
			// Content-type para el navegador
		header('Content-type: image/jpeg');
		imagejpeg($thumb);
	}

	public function imagen6($num)
	{
		$score =$num;
		$imgname= "public/img/blank.png";
		//
		$im = @imagecreatefrompng($imgname)  or die("Error creando la imagen");

		//color del texto
		$rojo = imagecolorallocate($im, 255, 0, 0);
		// calcula el centro
		$px     = (imagesx($im) - 7.5 * strlen($score)) / 2;
		// escribe el texto
		imagestring($im, 3, $px, 1, $score, $rojo);

		header("Content-type: image/png");
		//salida conservando el canal alfa

		imagesavealpha($im,true);
		imagepng($im);

	}


	public function grafico1(){

		$this->getLibrary('src/jpgraph');
		$this->getLibrary('src/jpgraph_line');

		// Creamos un nuevo grafico de 350x250
		$this->_graph = new Graph(350, 250, "auto");
		
		// Creamos el array de datos
		$ydata = array(11, 3, 8, 12, 5, 1, 9, 13, 5, 7);
		$xdata = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct");

		$this->_graph->SetScale("textlin");
		
		//define  los datos del eje X
		$this->_graph->xaxis->SetTickLabels($xdata);
		

		// Creamos el grafico basado en el array
		$lineplot = new LinePlot($ydata);
		$lineplot->SetColor("blue");

		// Agregamos el grafico a la imagen
		$this->_graph->Add( $lineplot);

		// Mostramos la imagen
		$this->_graph->Stroke();
	}

	public function grafico2(){

		$this->getLibrary('src/jpgraph');
		$this->getLibrary('src/jpgraph_line');
		
		
		$this->_graph = new Graph(350, 250, "auto");
		$ydata = array(11, 3, 8, 12, 5, 1, 9, 13, 5, 7);
		$xdata = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct");
		
		
		$this->_graph->SetScale( "textlin");
		$this->_graph->xaxis->SetTickLabels($xdata);
		
		$this->_graph->img->SetMargin(40, 20, 20, 40);
		$this->_graph->title->Set("Ejemplo 2 ");
		$this->_graph->xaxis->title->Set("Meses");
		$this->_graph->yaxis->title->Set("Miles soles");

		$lineplot = new LinePlot($ydata);
		$lineplot->SetColor("blue");

		$this->_graph->Add($lineplot);
		$this->_graph->Stroke();

	}
	public function grafico3(){
		$this->getLibrary('src/jpgraph');
		$this->getLibrary('src/jpgraph_line');
		$ydata1 = array(11, 3, 8, 12, 5, 1, 9, 13, 5, 7);
		$ydata2 = array(1, 19, 15, 7, 22, 14, 5, 9, 21, 13);
		$xdata = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct");

		$this->_graph = new Graph(350, 250, "auto");
		$this->_graph->SetScale( "textlin");
		$this->_graph->xaxis->SetTickLabels($xdata);
		
		$this->_graph->img->SetMargin(40, 20, 20, 40);

		$this->_graph->title->Set("Ejemplo 3");

		$this->_graph->xaxis->title->Set("Meses");
		$this->_graph->yaxis->title->Set("Miles soles");

		$lineplot1 = new LinePlot($ydata1);
		$lineplot1->SetColor("blue");
		$lineplot2 = new LinePlot($ydata2);
		$lineplot2->SetColor("orange");

		$this->_graph->Add($lineplot1);
		$this->_graph->Add($lineplot2);
		$this->_graph->Stroke();

	}
	public function grafico4(){

		$this->getLibrary('src/jpgraph');
		$this->getLibrary('src/jpgraph_bar');

		$ydata = array(11, 3, 8, 12, 5, 1, 9, 13, 5, 7);
		$xdata = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct");
		
		$this->_graph = new Graph(350, 250, "auto");

		$this->_graph->SetScale("textlin");
		$this->_graph->xaxis->SetTickLabels($xdata);
		
		$this->_graph->img->SetMargin(40, 20, 20, 40);

		$this->_graph->title->Set("Ejemplo 4");

		$this->_graph->xaxis->title->Set("Meses" );
		$this->_graph->yaxis->title->Set("Miles soles" );

		$barplot =new BarPlot($ydata);
		$barplot->SetColor("orange");
		$this->_graph->Add($barplot);
		$this->_graph->Stroke();


	}
	public function grafico5(){
		$this->getLibrary('src/jpgraph');
		$this->getLibrary('src/jpgraph_pie');
		$this->getLibrary('src/jpgraph_pie3d');
		// la data
		$data = array(40,21,17,27,23);

		// Crea el grafico de PIE
		$graph = new PieGraph(400,200,'auto');
		$graph->SetShadow();

		// Define el texto y la fuente
		$graph->title->Set("Ejemplo 5");
		$graph->title->SetFont(FF_FONT1,FS_BOLD);

		// Crea el PIE
		$p1 = new PiePlot3D($data);
		$p1->SetLegends(array("Ene (%d)","Feb","Mar","Abr","May","Jun","Jul"));

		// define la etiquetas
		$p1->SetLabelType(1);
		$p1->value->SetFormat("%d $");

		// Centra el PIE
		$p1->SetCenter(0.4,0.5);
		$graph->Add($p1);
		$graph->Stroke();

	}
	public function grafico6(){
		
		// generar un grafico que permita representar los 2 productos mas vendidos en la tienda virtual
	}
	
	
	
}

?>