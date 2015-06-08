<?php
use JpGraph\JpGraph;
 
class GraficarController extends \BaseController {
 
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
          
     
    public function pintarGrafica($riesgo) {
        
      JpGraph::module('bar');        
		
		$riesgo = number_format($riesgo, 0, '', '');
		$valor_riesgo = 100/$riesgo;
				
		if($riesgo <= 385){
			$color_riesgo = '#d9534f';		
		}else {
			$color_riesgo = '#5cb85c';		
		}
		
		$tamiz = 320;
		$valor_tamiz = 100/$tamiz;
		
		if($tamiz <= 385){
			$color_tamiz = '#d9534f';		
		}else {
			$color_tamiz = '#5cb85c';		
		}
		
		$data = array($valor_riesgo,$valor_tamiz);

		// Instancia la gráfica recibiendo como parámetros ancho, alto
		$graph = new Graph(310,210);
		$graph->SetScale("textlin");
		//Muestra borde de la gráfica
		$graph->SetBox(true);
		
		$labelsX = array("Edad Solamente\n(1:".$riesgo.")", "Suero Tamíz\n(1:".$tamiz.")");
		$graph->xaxis->SetTickLabels($labelsX);	//muestra los labels de las gráficas de barra
		$graph->xaxis->SetLabelAlign('center','top','center');	//Centrar los labels	
		$graph->ygrid->SetFill(false); //oculta el fondo de la gráfica
		$graph->yaxis->SetTitle('1:385', "middle");	//Titulo de axis Y seteado a la mitad de la gráfica	
		$graph->yaxis->HideLabels(); //Oculta los valores de la axis Y		
		$graph->yaxis->HideTicks(false,false); //Oculta las líneas de la axis Y
		
		// Crea la gráfica de barra
		$suero = new BarPlot($data);
		
		// Agrega la gráfica de suero
		$graph->Add($suero);
		
		$suero->SetColor("white");
		$suero->SetFillColor(array($color_riesgo, $color_tamiz));
		$suero->SetWidth(0.6);		
		
		//línea intermedia de la gráfica
		$band = new PlotBand(HORIZONTAL,BAND_SOLID,0.2496,0.25,'black');
		$band->ShowFrame(false);
		$graph->Add($band);					
		$graph->title->Set('El Síndrome de Down');
		
		// Display the graph
		$graph->Stroke();
    }
 }