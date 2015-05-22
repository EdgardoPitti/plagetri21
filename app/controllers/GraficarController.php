<?php
use JpGraph\JpGraph;
 
class GraficarController extends \BaseController {
 
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
          
     
    public function pintarGrafica() {
        
        JpGraph::module('bar');        
       /* $grafica = new Graph(300, 200);
		  $grafica->img->SetMargin(50,40,20,0);
		
		/*Define el tipo de escala que va a utilizar y el
		valor minimo y maximo para el eje y
		$grafica->SetScale("textlin");
		
		// Asigna el titulo de la gráfica
		$grafica->title->Set("Estadísticas del tiempo");
		
		// Asigna el titulo y la alineacion para el eje x
		$grafica->xaxis->SetTitle("Dias","middle");
		
		//Asigna el titulo y la alineacion para el eje y
		//$grafica->yaxis->SetTitle("Grados centigrados","middle");
		$grafica->yaxis->SetTickPositions(array(0.001, 0.002, 0.003, 0.004, 0.005), array(0.0015, 0.0025, 0.0035, 0.0045));
		$grafica->SetBox(false);
		//Define una serie, en este caso para un grafico de barras
		$temperaturas = new BarPlot( array(0.0026,0.0019,0.001,0.005) );
		
		//Asigna la leyenda para la serie
		$temperaturas->SetLegend('Temperatura');
		
		//agrega la serie temperatura al grafico
		$grafica->Add($temperaturas);
		
		//Muestra el grafico
		$grafica->Stroke();*/
		$data1y=array(47,80,40,116);
$data2y=array(61,30,82,105);
$data3y=array(115,50,70,93);


// Create the graph. These two calls are always required
$graph = new Graph(350,200,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
$b3plot = new BarPlot($data3y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$b2plot->SetColor("white");
$b2plot->SetFillColor("#11cccc");

$b3plot->SetColor("white");
$b3plot->SetFillColor("#1111cc");

$graph->title->Set("Bar Plots");

// Display the graph
$graph->Stroke();
    }
 }