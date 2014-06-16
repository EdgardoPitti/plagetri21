@extends ('layout')

@section('title')
	Men&uacute; Principal
@stop
@section ('content')
	<center>
		<h1>Menú Principal</h1><hr>
	</center>		
		<div class="row nav-row">
			<a href="{{ route('datos.citas.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-list-alt"></span>
					<p>Citas de Tamizaje</p>
				</div>
			</a>
			<a href="{{ route('datos.pacientes.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-user"></span>
					<p>Pacientes</p>
				</div>
			</a>
			<a href="{{ route('datos.medicos.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-user"></span>
					<p>Médicos</p>
				</div>
			</a>
			<a href="{{ route('datos.mediana.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-leaf"></span>
					<p>Mediana Marcadores</p>
				</div>
			</a>
		</div>
		<div class="row nav-row">
			<a href="{{ route('datos.activos.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-time"></span>
					<p>Activos</p>
				</div>
			</a>
			<a href="{{ route('datos.mantenimientos.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-cog"></span>
					<p>Mantenimientos</p>
				</div>
			</a>
			<a href="{{ route('datos.agenda.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-calendar"></span>
					<p>Agenda Telefónica</p>
				</div>
			</a>
			<a href="{{ route('datos.pacientesmapas.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<span class="glyphicon glyphicon-globe"></span>
					<p>Localizar</p>
				</div>
			</a>
		</div>

@stop
