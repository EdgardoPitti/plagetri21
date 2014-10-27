<!DOCTYPE html>
<html>
<head>
    <title>Citas Médicas</title>
</head>
<body>
	<center>
		<h1>PLATAFORMA DE GESTIÓN DE TRISOMÍA 21</h1>
    </center>
    <br>
    <div>
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
    <br><br>
		<table>
			<tr>
				<td></td>	
				<td><b>RESULTADOS DE LA PRUEBA</b></td>
				<td></td>	
			</tr>
			<tr align="center">
				<td>Ensayo</td>
				<td>Resultados</td>
				<td>MoM</td>
			</tr>
			@foreach($marcadores as $marcador)
			<tr align="center">
				<td>{{ Marcador::where('id', $marcador->id_marcador)->first()->marcador }}</td>
				<td>{{ $marcador->valor }} @if(!empty(Unidad::where('id', $marcador->id_unidad)->first()->unidad)){{ Unidad::where('id', $marcador->id_unidad)->first()->unidad }}@endif</td>
				<td>{{ $marcador->mom}}</td>
			</tr>
			@endforeach
		</table>
    <br><b>Evaluación del Riesgo (a término)</b><br>
		&nbsp;&nbsp;  Edad Solamente  &nbsp;&nbsp; {{ '1:'.$cita->riesgo }}
	<br><br><b>Interpretación* basado en la información suministrada:</b><br>
	<table>
		@foreach($resultados as $resultado)
			<tr>
					<td><b>{{ $resultado->enfermedad }}</b></td>
					<td>{{ $resultado->resultado }}</td>
			</tr>
			<tr>
					<td></td>
					<td align="justify">{{ $resultado->mensaje }}</td>
			</tr>
			<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
			</tr>
		@endforeach
	</table>
		

</body>
</html>
