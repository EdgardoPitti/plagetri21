@extends ('layout')

@section ('title') {{ $datos['label'] }} M&eacute;dicos @stop

@section ('content')
	<h1>
		<div style="position:relative;">
			<div style="position:absolute;left:0px;">
		    	<a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
			</div>
		</div>
		<center>{{ $datos['label'] }} M&eacute;dico</center>
	</h1><hr>	

	<div class="modal fade" id="Show" tabindex="-1" role="dialog" aria-labelledby="showMedico" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header fondo-hd">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title"><i class="fa fa-plus-square"></i> M&eacute;dico &nbsp;
	      	</h4>
	      </div>
	      <div class="modal-body">
	      	<h4><label id="medico"></label></h4>
	      	<div class="row showDatos">      			
                <div class="col-md-3 col-lg-3" id="foto" align="center"> 
                	<!-- Img del medico-->
               	</div>
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Extenci&oacute;n:</td>
                        <td><label id="ext"></label></td>
                      </tr>
                      <tr>
                        <td>Tel&eacute;fono:</td>
                        <td><label id="tel"></label></td>
                      </tr>
                      <tr>
                        <td>Celular:</td>
                        <td><label id="cel"></label></td>
                      </tr>
                      <tr>
                        <td>Especialidad:</td>
                        <td><label id="esp"></label></td>
                      </tr>
                    </tbody>
                  </table>                  
                </div>
              </div>
	      </div>
	      <div class="modal-footer fondo-ft">	        
	        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
	       </div>
	    </div>
	  </div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Lista de M&eacute;dicos</h3>
					<div class="pull-right">
						<span class="clickable filter" data-toggle="tooltip" title="Buscar M&eacute;dicos" data-container="body">
							<i class="glyphicon glyphicon-filter"></i>
						</span>
					</div>
				</div>
				<div class="panel-body" style="display:block;">
					<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar M&eacute;dicos" /><br>		
					<div class="overthrow" style="height:250px;">
						<table class="table table-hover table-bordered table-fixed-header" cellpadding="0" cellspacing="0"  id="dev-table">
							<thead>
								<tr class="info">
									<th>#</th>
									<th>Foto</th>
									<th>Nombre</th>
									<th>Extensi&oacute;n</th>
									<th>Tel&eacute;fono</th>
									<th>Celular</th>									
									<th>Especialidad M&eacute;dica</th>
									<th></th>
								</tr>
							</thead>
							<tbody style="margin-top:25px">
								{{--*/ $n = 1; /*--}}
								@foreach (Medico::all() as $medico) 
								<tr>
									<td>{{ $n++ }}</td>
									<td>{{ HTML::image('imgs/'.$medico->datos_medico($medico->id)[0]->foto,null ,array('style' => 'width:50px;height:50px;')); }}</td>									
									<td>{{ $medico->primer_nombre.' '.$medico->segundo_nombre.' '.$medico->apellido_paterno.' '.$medico->apellido_materno }} </td>
									<td>{{ $medico->extension }}</td>
									<td>{{ $medico->telefono }}</td>
									<td>{{ $medico->celular }} </td>
									<td>{{ EspecialidadMedica::where('id_especialidades_medicas', $medico->id_especialidades_medicas)->first()->descripcion }}</td>
									<td align="center">
										<a href="{{ route('datos.medicos.edit', $medico->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"  title="Editar M&eacute;dico"><span class="glyphicon glyphicon-pencil"></span></a>
					            		<a href="#Show" onclick="obtener({{ $medico->id }})" id="{{ $medico->id }}"  class="btn btn-success btn-sm ver" data-toggle="modal"  title="Ver Médico" style="margin:3px 0px;"><span class="glyphicon glyphicon-eye-open"></span></a>
									</td>					
								</tr>
								@endforeach
							</tbody>
						</table>					
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>

	{{ Form::model($datos['medico'][0], $datos['formulario'] + array('files' => 'true'), array('role' => 'form')) }}

	  <div class="row">
	  	<div class="form-group col-sm-4 col-md-4 col-lg-4">
	      <center>
	        {{ Form::label('foto', 'Foto de Perfil') }}<br>
	        {{ HTML::image('imgs/'.$datos['medico'][0]->foto.'', null, array('id' => 'foto', 'name' => 'foto', 'style' => 'heigth:150px; width:150px;')) }} <br><br>	        
	        <div class="input-group image-preview">
	            <input type="text" class="form-control image-preview-filename" placeholder="Buscar Foto" disabled="disabled">
	            <span class="input-group-btn">
	                <!-- image-preview-clear button -->
	                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
	                    <span class="glyphicon glyphicon-remove"></span>
	                </button>
	                <!-- image-preview-input -->
	                <div class="btn btn-default image-preview-input">
	                    <span class="glyphicon glyphicon-folder-open"></span>
	                    <span class="image-preview-input-title"></span>
	                    {{ Form::file('foto', array('accept' => 'image/*')) }}
	                </div>
	            </span>
	        </div>   
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('cedula', 'N&uacute;mero de C&eacute;dula:') }}
	      {{ Form::text('cedula', null, array('placeholder' => 'N&uacute;mero de C&eacute;dula', 'class' => 'form-control', 'required' => 'required')) }}
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('primer_nombre', 'Primer Nombre:') }}
	      {{ Form::text('primer_nombre', null, array('placeholder' => 'Primer Nombre', 'class' => 'form-control', 'required' => 'required')) }}        
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('segundo_nombre', 'Segundo Nombre:') }}
	      {{ Form::text('segundo_nombre', null, array('placeholder' => 'Segundo Nombre', 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('apellido_paterno', 'Apellido Paterno:') }}
	      {{ Form::text('apellido_paterno', null, array('placeholder' => 'Apellido Paterno', 'class' => 'form-control', 'required' => 'required')) }}        
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('apellido_materno', 'Apellido Materno:') }}
	      {{ Form::text('apellido_materno', null, array('placeholder' => 'Apellido Materno', 'class' => 'form-control')) }}
	    </div>	   
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	      {{ Form::label('sexo', 'Sexo:') }}	     
	      {{ Form::select('sexo', array('0' => 'FEMENINO', '1' => 'MASCULINO'), null, array('class' => 'form-control', 'required' => 'required')); }}
	    </div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('id_especialidades_medicas', 'Especialidad M&eacute;dica:') }}
			{{ Form::select('id_especialidades_medicas', array('0' => 'SELECCIONE ESPECIALIDAD') + EspecialidadMedica::lists('descripcion', 'id_especialidades_medicas'), $datos['medico'][0]->id_especialidad_medica, array('class' => 'form-control', 'required' => 'required')) }}
		</div>
		<div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('extension', 'Extensi&oacute;n:') }}
			{{ Form::text('extension', null, array('placeholder' => 'Extensi&oacute;n', 'class' => 'form-control')) }}			
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
			{{ Form::label('id_nivel', 'Nivel:') }}
			{{ Form::select('id_nivel', array('0' => 'SELECCIONE NIVEL') + Nivel::lists('nivel', 'id'), null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group col-sm-4 col-md-4 col-lg-4">
			{{ Form::label('id_ubicacion', 'Ubicación:') }}
			{{ Form::select('id_ubicacion', array('0' => 'SELECCIONE UBICACI&Oacute;N') + Ubicacion::lists('ubicacion', 'id'), null, array('class' => 'form-control')) }}
		</div>
	    <div class="form-group col-sm-4 col-md-4 col-lg-4">
	    	{{ Form::label('observaciones', 'Observaciones:') }}
	    	{{ Form::textarea('observaciones', $datos['medico'][0]->observacion, array('placeholder' => 'Observaciones', 'class' => 'form-control', 'size' => '1x1')) }}        
	    </div>
	  </div>
	  <div class="form-group col-sm-12 col-md-12 col-lg-12">
    	<center>
		  {{ Form::button($datos['label'].' M&eacute;dico', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
		  <a href="{{ route('datos.medicos.index') }}" class="btn btn-info">Limpiar Campos</a>
		</center>
	  </div>
	{{ Form::close() }}
	<br>
  	{{ HTML::script('assets/js/overthrow/overthrow-detect.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-init.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-polyfill.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-toss.js') }}
@stop
