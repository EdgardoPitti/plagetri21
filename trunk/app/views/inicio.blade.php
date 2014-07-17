@extends ('layout')

@section('title')
	Men&uacute; Principal
@stop
@section ('content')
	<center>
		<h1><strong>Menú Principal</strong></h1><hr>
	</center>
		<div class="row col-md-12">
			<a href="logout" title="Cerrar Sesión" class="btn btn-default pull-right">Salir</a>
		</div>		
		<div class="row nav-row">
			<a href="{{ route('datos.citas.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/citas.png" style="width:50px;padding-top:9px">
					<p>Citas de Tamizaje</p>
				</div>
			</a>
			<a href="{{ route('datos.pacientes.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/woman.png" style="width:45px;padding-top:9px">
					<p>Pacientes</p>
				</div>
			</a>
			<a href="{{ route('datos.medicos.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/medico.png" style="width:50px;padding-top:9px">
					<p>Médicos</p>
				</div>
			</a>
			<a href="{{ route('datos.mediana.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/marcadores.png" style="width:43px;height:59px;padding-top:9px">
					<p>Mediana Marcadores</p>
				</div>
			</a>
		</div>
		<div class="row nav-row menu-margen">
			<a href="{{ route('datos.activos.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/activo.png" style="width:43px;height:59px;padding-top:9px">
					<p>Activos</p>
				</div>
			</a>
			<a href="{{ route('datos.mantenimientos.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/mantenimiento.png" style="width:43px;height:59px;padding-top:9px">
					<p>Mantenimientos</p>
				</div>
			</a>
			<a href="{{ route('datos.agenda.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/agenda.png" style="width:46px;padding-top:9px">
					<p>Agenda Telefónica</p>
				</div>
			</a>
			<a href="{{ route('datos.pacientesmapas.index') }}">
				<div class="col-sm-3 col-md-3 col-lg-3">
					<img src="imgs/mapa.png" style="width:50px;padding-top:9px">
					<p>Localizar</p>
				</div>
			</a>
		</div>	 
@stop
