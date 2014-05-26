@extends ('layout')

@section('title')
	Men&uacute; Principal
@stop
@section ('content')
	<center>
		<h1>Menú Principal</h1><hr>
		<a href="{{ route('datos.citas.index') }}" class="btn btn-primary btn-lg btn-block">Citas de Tamizaje</a> <br><br>
        <a href="{{ route('datos.pacientes.index') }}" class="btn btn-primary btn-lg btn-block">Pacientes</a><br><br>
		<a href="{{ route('datos.medicos.index') }}" class="btn btn-primary btn-lg btn-block">M&eacute;dicos</a><br><br>
		<a href="{{ route('datos.pacientesmapas.index') }}" class="btn btn-primary btn-lg btn-block">Mapa</a>
	</center>
@stop
