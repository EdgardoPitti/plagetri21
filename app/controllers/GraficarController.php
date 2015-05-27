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
		$data1 = array($valor_riesgo,0.3125);

		// Create the graph. These two calls are always required
		$graph = new Graph(310,200, 'auto');
		$graph->SetScale("textlin");
		
		$theme_class=new UniversalTheme;
		$graph->SetTheme($theme_class);
		
		//$graph->yaxis->SetTickPositions(array(0,0.2,0.4,0.6), array(0.1,0.3,0.5));
		$graph->SetBox(false);
		
		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels(array('Edad Solamente (1:'.$riesgo.')', 'Suero Tamíz (1:'.$tamiz.')'));
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);
		
		// Create the bar plots
		$suero = new BarPlot($data1);
		//$suero->SetLegend('Suero Tamiz');
		
		/*$edad = new BarPlot($data2y);
		$edad->SetLegend('Edad Tamiz');	*/	
		
		// Create the grouped bar plot
		//$gbplot = new GroupBarPlot(array($suero, $edad));
		// ...and add it to the graPH
		$graph->Add($suero);
		
		$suero->SetColor("white");
		$suero->SetFillColor(array($color_riesgo, $color_tamiz));
		$suero->SetWidth(80);		
		/*
		$edad->SetColor("white");
		$edad->SetFillColor("#00ff00");
		$edad->SetWidth(80);*/
		$band = new PlotBand(HORIZONTAL,BAND_SOLID,0.2496,0.25,'black');
		$band->ShowFrame(false);
		$graph->Add($band);						
		$graph->title->Set('El Síndrome de Down');
		
		// Display the graph
		$graph->Stroke();
    }
 }