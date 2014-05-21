@extends ('layout')

@section('title')
	Citas Médicas
@stop

@section('content')
		<h1>
		  <div class="pull-left">
		    <a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Inicio</a>
		  </div>
		  <center>Citas Médicas</center>
		</h1>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12">
		    	<div class="panel panel-primary">
		      		<div class="panel-heading">
		        		<h3 class="panel-title">Lista de Pacientes</h3>
	        			<div class="pull-right">
		          			<span class="clickable filter" data-toggle="tooltip" title="Buscar Paciente" data-container="body">
			            		<i class="glyphicon glyphicon-filter"></i>
		          			</span>
		        		</div>
		      		</div>
			    	<div class="panel-body">
				        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Pacientes" /><br>
					    <div class="table-responsive">
					        <table class="table table-bordered table-hover" id="dev-table">
							  	<thead>
							  		<tr>
							  			<th>#</th>
							  			<th>Cédula</th>
							  			<th>Nombre Completo</th>
							  			<th>Edad</th>
							  			<th>Etnia</th>
							  			<th>Raza</th>
							  			<th>Diabetes</th>
							  			<th>Accesos</th>
							  		</tr>
							  	</thead>
							  	<tbody>
							  		{{--*/ $n=1; /*--}}
							  		@foreach ($pacientes as $paciente)
							  		<tr align="center">
							  			<td>{{ $n++ }}.</td>
							  			<td>{{ $paciente->cedula }}</td>
							  			<td>{{ $paciente->primer_nombre.' '.$paciente->segundo_nombre.' '.$paciente->apellido_paterno.' '.$paciente->apellido_materno }}</td>
							  			<td>{{ $paciente->edad }}</td>
							  			<td>{{ $paciente->etnia }}</td>
							  			<td>{{ $paciente->raza }}</td>
							  			<td>{{ $paciente->diabetes }}</td>
							  			<td>
							  				<a href="{{ route('datos.citas.show', $paciente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Crear Cita</a>
							  				<a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar</a>
							  			</td>
							  		</tr>
							  		@endforeach
							  	</tbody>
							</table>
						</div>
			        </div>
		        </div>
		    </div>
		</div>
		<hr>
		
		@if(!empty($datos))
			<h3>Datos Generales del Paciente</h3>
			<table class="table table-striped">
				<tr>
					<th>Cédula</th>
					<th>Nombre Completo</th>
					<th>Edad</th>
					<th>Diabetes</th>
					<th>Nacionalidad</th>
					<th>Etnia</th>
					<th>Raza</th>
					<th>Tipo de Sangre</th>
				</tr>
				<tr>
					<td>{{ $datos[0]->cedula }}</td>
					<td>{{ $datos[0]->primer_nombre.' '.$datos[0]->segundo_nombre.' '.$datos[0]->apellido_paterno.' '.$datos[0]->apellido_materno }}</td>
					<td>{{ $datos[0]->edad }}</td>
					<td>{{ $datos[0]->diabetes }}</td>
					<td>{{ $datos[0]->nacionalidad }}</td>
					<td>{{ $datos[0]->etnia }}</td>
					<td>{{ $datos[0]->raza }}</td>
					<td>{{ $datos[0]->tipo_sangre }}</td>
				</tr>
			</table>
			<hr>
			<h3>Datos de Contacto del Paciente</h3>
			<table class="table table-striped">
				<tr>
					<th>Provincia</th>
					<th>Distrito</th>
					<th>Corregimiento</th>
					<th>Lugar</th>
					<th>Teléfono</th>
					<th>E-mail</th>
					<th>Celular</th>
				</tr>
				<tr>
					<td>{{ $datos[0]->provincia_residencia }}</td>
					<td>{{ $datos[0]->distrito_residencia }}</td>
					<td>{{ $datos[0]->corregimiento_residencia }}</td>
					<td>{{ $datos[0]->lugar_residencia }}</td>
					<td>{{ $datos[0]->telefono }}</td>
					<td>{{ $datos[0]->email }}</td>
					<td>{{ $datos[0]->celular }}</td> 
				</tr>
			</table>
			<hr>
			<h3>Datos de la Cita</h3>
			{{ Form::model($form['citas'], $form['datos'] , array('role' => 'form')) }}
				<div class="row">
					{{ Form::text('id_paciente', $datos[0]->id, array('style' => 'display:none')) }}
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('fecha', 'Fecha de la Consulta:') }}
      					{{ Form::date('fecha', $form['citas']->fecha, array('class' => 'form-control', 'min' => '2014-01-01', 'max' => '2050-12-31')) }}
    				</div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('id_medico', 'Médico:') }}
      					{{ Form::select('id_medico', array('0' => 'SELECCION EL  MÉDICO') + Medico::lists('primer_nombre','id'), $form['citas']->id_medico, array('class' => 'form-control')) }}
    				</div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				      {{ Form::label('edad_gestacional', 'Edad Gestacional por Ultrasonido:') }}
				      {{ Form::text('edad_gestacional', null, array('placeholder' => 'Edad Gestacional', 'class' => 'form-control')) }}        
				    </div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('fecha_ultrasonido', 'Fecha del Ultrasonido:') }}
      					{{ Form::date('fecha_ultrasonido', $form['citas']->fecha_ultrasonido, array('class' => 'form-control', 'min' => '2000-01-01', 'max' => '2050-12-31')) }}
    				</div>				    
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				      {{ Form::label('fuma', 'Fuma:') }}<br>
				      {{ Form::label('si', 'Si') }}
				      {{ Form::radio('fuma', 1, $form['citas']->fuma); }}   
				      {{ Form::label('no', 'No') }}
				      {{ Form::radio('fuma', 0, $form['citas']->fuma); }}    
				    </div> 
				</div>
			{{ Form::close() }}
		@endif

@stop