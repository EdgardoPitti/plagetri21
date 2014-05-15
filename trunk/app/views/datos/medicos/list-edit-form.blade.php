@extends ('layout')

@section ('title') {{ $datos['label'] }} M&eacute;dicos @stop

@section ('content')
	<h1>{{ $datos['label'] }} M&eacute;dico</h1><hr>
	<div class="pull-right">
	    <a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Inicio</a>
	</div>
	{{ Form::model($datos['medico'], $datos['formulario'] , array('role' => 'form')) }}

	  <div class="row">
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('cedula', 'N&uacute;mero de C&eacute;dula:') }}
	      {{ Form::text('cedula', null, array('placeholder' => 'N&uacute;mero de C&eacute;dula', 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('primer_nombre', 'Primer Nombre:') }}
	      {{ Form::text('primer_nombre', null, array('placeholder' => 'Primer Nombre', 'class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('segundo_nombre', 'Segundo Nombre:') }}
	      {{ Form::text('segundo_nombre', null, array('placeholder' => 'Segundo Nombre', 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('apellido_paterno', 'Apellido Paterno:') }}
	      {{ Form::text('apellido_paterno', null, array('placeholder' => 'Apellido Paterno', 'class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('apellido_materno', 'Apellido Materno:') }}
	      {{ Form::text('apellido_materno', null, array('placeholder' => 'Apellido Materno', 'class' => 'form-control')) }}
	    </div>	   
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('sexo', 'Sexo:') }}
	      {{--*/ $select = array('null' => '', '0' => 'Femenino', '1' => 'Masculino'); /*--}}
	      {{ Form::select('sexo', $select, null, array('class' => 'form-control')); }}
	    </div>
		<div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('telefono', 'Tel&eacute;fono:') }}
			{{ Form::text('telefono', null, array('placeholder' => 'Tel&eacute;fono', 'class' => 'form-control')) }}			
		</div>
		<div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('celular', 'Celular:') }}
			{{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
		</div>
		<div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('email', 'E-mail:') }}
			{{ Form::text('email', null, array('placeholder' => 'E-mail', 'class' => 'form-control')) }}
		</div>
		<div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('id_especialidades_medicas', 'Especialidad M&eacute;dica:') }}
			{{ Form::select('id_especialidades_medicas', array('0' => 'SELECCIONE ESPECIALIDAD') + EspecialidadesMedicas::lists('descripcion', 'id_especialidades_medicas'), $datos['especialidad'], array('class' => 'form-control')) }}
		</div>
	  </div>
	  {{ Form::button($datos['label'].' M&eacute;dico', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
	  <a href="{{ route('datos.medicos.index') }}" class="btn btn-info">Limpiar Campos</a>
	{{ Form::close() }}
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Lista de M&eacute;dicos</h3>
					<div class="pull-right">
						<span class="clickable filter" data-toggle="tooltip" title="Activar/Desactivar Filtro" data-container="body">
							<i class="glyphicon glyphicon-filter"></i>
						</span>
					</div>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar M&eacute;dicos" />
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="dev-table">
						<thead>
							<tr>
								<th>#</th>
								<th>C&eacute;dula</th>
								<th>Nombre</th>
								<th>Tel&eacute;fono</th>
								<th>Celular</th>
								<th>E-mail</th>
								<th>Especialidad M&eacute;dica</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							{{--*/ $n = 1; /*--}}
							@foreach (Medico::all() as $medico) 
							{{--*/								
								$especialidad = EspecialidadesMedicas::where('id_especialidades_medicas', $medico->id_especialidades_medicas)->first(); 
							/*--}}
							<tr>
								<td>{{ $n++ }}</td>
								<td>{{ $medico->cedula }}</td>
								<td>{{ $medico->primer_nombre.' '.$medico->segundo_nombre.' '.$medico->apellido_paterno.' '.$medico->apellido_materno }} </td>
								<td>{{ $medico->telefono }}</td>
								<td>{{ $medico->celular }} </td>
								<td>{{ $medico->email }} </td>
								<td>{{ $especialidad->descripcion }}</td>
								<td>
									<a href="{{ route('datos.medicos.edit', $medico->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar</a>
				            		<a href="#" data-id="{{ $medico->id }}"  class="btn btn-danger btn-delete"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
								</td>					
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	{{ Form::open(array('route' => array('datos.medicos.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
  	{{ Form::close() }}
@stop