@extends ('datos/layout')

@section ('title') Mostrar Pacientes @stop

@section ('content')

	<h1>Datos de : {{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</h1>

	<p> 
    	<a href="{{ route('datos.pacientes.index') }}" class="btn btn-info">Lista de Pacientes</a>
  	</p>

	<table class="table table-striped">
		<tr>
			<td>C&eacute;dula: </td>
			<td>{{ $paciente->cedula }}</td>
		</tr>
		<tr>
			<td>Primer Nombre: </td>
			<td>{{ $paciente->primer_nombre }}</td>
		</tr>
		<tr>
			<td>Segundo Nombre: </td>
			<td>{{ $paciente->segundo_nombre }}</td>
		</tr>
		<tr>
			<td>Apellido Paterno: </td>
			<td>{{ $paciente->apellido_paterno }}</td>
		</tr>
		<tr>
			<td>Apellido Materno: </td>
			<td>{{ $paciente->apellido_materno }}</td>
		</tr>
		<tr>
			<td>Fecha de Nacimiento: </td>
			<td>{{ $paciente->fecha_nacimiento }}</td>
		</tr>
		<tr>
			<td>Peso: </td>
			<td>{{ $paciente->peso }}</td>
		</tr>
		<tr>
			<td>Lugar de Nacimiento: </td>
			<td>{{ $paciente->lugar_nacimiento }}</td>
		</tr>
		<tr>
			<td>Edad: </td>
			<td>{{ $paciente->edad_paciente }}</td>
		</tr>
	</table>

	<p>
		<a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>
	</p>

@stop

