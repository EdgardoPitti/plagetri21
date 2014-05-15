@extends ('datos/layout')

@section ('title') {{ $datos['label'] }} M&eacute;dicos @stop

@section ('content')
	<h1>A&nacute;adir M&eacute;dico</h1>
	{{ Form::open(array('route' => 'datos.medicos.store', 'method' => 'POST'), array('role' => 'form')) }}

	  <div class="row">
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('cedula', 'N&uacute;mero de C&eacute;dula') }}
	      {{ Form::text('cedula', null, array('placeholder' => 'N&uacute;mero de C&eacute;dula', 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('primer_nombre', 'Primer Nombre') }}
	      {{ Form::text('primer_nombre', null, array('placeholder' => 'Primer Nombre', 'class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('segundo_nombre', 'Segundo Nombre') }}
	      {{ Form::text('segundo_nombre', null, array('placeholder' => 'Segundo Nombre', 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('apellido_paterno', 'Apellido Paterno') }}
	      {{ Form::text('apellido_paterno', null, array('placeholder' => 'Apellido Paterno', 'class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('apellido_materno', 'Apellido Materno') }}
	      {{ Form::text('apellido_materno', null, array('placeholder' => 'Apellido Materno', 'class' => 'form-control')) }}
	    </div>	   
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('sexo', 'Sexo') }}
	      {{--*/ $select = array('null' => '', '0' => 'Femenino', '1' => 'Masculino'); /*--}}
	      {{ Form::select('sexo', $select, null, array('class' => 'form-control')); }}
	    </div>
		<div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('id_especialidad_medicas', 'Especialidades M&eacute;dicas') }}
			
		</div>
	  </div>
	  {{ Form::button('A&ntilde;adir M&eacute;dico', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
	  
	{{ Form::close() }}
@stop