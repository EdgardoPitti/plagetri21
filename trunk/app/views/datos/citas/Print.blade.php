<!DOCTYPE html>
<html>
<head>
    <title>Citas Médicas</title>
    <meta charset="UTF8">
    <style type="text/css">
    	html, body{
			height:100%;    	
    	}
    	body{
			margin:-20px;			
			padding: 20px;
			border:1px solid #000;
			border-radius:6px;    	
    	}    	
    	h1, h2,h4{
			margin: 0px;    	
    	}
    	h4{
    		padding-left: 23px;
    	}
    	div .texto{
    		position:absolute;
    		top:25%;
    		left:15%;
    		font-size:16px;
    		font-weight:bold;    	
    	}
    	.resultados{
		   width:40%;	    
    	}
    </style>    
</head>
<body>
	<center>
		<h1>HOSPITAL CHIRIQUÍ</h1>
		<h2>LABORAORIO</h2>
    </center>
    <br>
    <div>
    	<div class="texto">
    		Triple Marcador Maternal
    	</div>
    	<div style="position:absolute;right:20px;">
			<b>INFORMACIÓN DE LA PACIENTE</b><br>
			Nombre: {{ $datos[0]->apellido_paterno.' '.$datos[0]->apellido_materno.', '.$datos[0]->primer_nombre.' '.$datos[0]->segundo_nombre }}.<br>
			ID de Paciente: {{ $datos[0]->cedula }}.<br>
			FN: {{ $datos[0]->fecha_nacimiento }}.<br>
			FUR: {{ $cita->fur }}.<br>
			Lugar: {{ $institucion->denominacion }}.<br>
			Doctor: {{ $medico->primer_nombre.' '.$medico->apellido_paterno }}.
			
			<br><br><br>
			<b>LA INFORMACIÓN CLÍNICA</b><br>
			Edad Gestacional: {{ $cita->edad_gestacional_fur }} semanas usando FUR {{ $cita->fur }}.<br>
			Edad Materna: {{ $cita->edad_materna }} años.<br>
			Peso Materno: {{ $cita->peso }} kg.<br>
			Raza Materna: {{ $datos[0]->raza }}.<br>
			Etnia Materna: {{ $datos[0]->etnia }}.<br>
			Gestación: {{ $cita->hijos_embarazo }}.<br>
		</div> 
    </div>
    <div style="position:absolute;bottom:190px;">
	 	<h4>RESULTADOS DE LA PRUEBA</h4>
		<table class="resultados" cellspacing="0px">			
			<tr>
				<th>Ensayo</th>
				<th>Resultados</th>
				<th>MoM</th>
			</tr>
			@foreach($marcadores as $marcador)
			<tr align="center">
				<td>{{ Marcador::where('id', $marcador->id_marcador)->first()->marcador }}</td>
				<td>{{ $marcador->valor }} @if(!empty(Unidad::where('id', $marcador->id_unidad)->first()->unidad)){{ Unidad::where('id', $marcador->id_unidad)->first()->unidad }}@endif</td>
				<td>{{ $marcador->mom}}</td>
			</tr>
			@endforeach
		</table>
      <h4 style="padding:8px 0px 0px 8px;">Evaluación del Riesgo (a término)</h4>
		<table style="padding-left:10px;width:40%;">
			<tr>
				<td>Edad Solamente</td>
				<td>{{ '1:'.$cita->riesgo }}</td>			
			</tr>		
		</table><br>		
	
	<b>Interpretación* basado en la información suministrada:</b><br>
	<table style="width:100%;">
		@foreach($resultados as $resultado)
			<tr>
					<td><b>{{ $resultado->enfermedad }}</b></td>
					<td align="justify">
						<b>{{ $resultado->resultado }}</b><br>
						{{ $resultado->mensaje }}
					</td>
			</tr>
			<tr>	
				<td colspan="2"></td>
			</tr>
		@endforeach
	</table>
	</div>

</body>
</html>
