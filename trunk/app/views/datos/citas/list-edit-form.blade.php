@extends ('layout')

@section('title')
	Citas de Tamizaje
@stop

@section('content')
		<h1>
		 <div style="position:relative;">
			<div style="position:absolute;left:0px;">
		    	<a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
			</div>
		 </div>
		  <center>Citas de Tamizaje</center>
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
					    <div class="overthrow" style="overflow:auto;width:100%;">
					        <table class="table table-bordered table-hover" id="dev-table">
							  	<thead>
							  		<tr class="info">
							  			<th>#</th>
							  			<th>Cédula</th>
							  			<th>Nombre Completo</th>
							  			<th>Edad</th>
							  			<th>Etnia</th>
							  			<th>Raza</th>
							  			<th>Diabetes</th>
							  			<th>Fuma</th>
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
							  			<td>{{ $paciente->fuma }}</td>
							  			<td align="center">
							  				<a href="{{ route('datos.citas.show', $paciente->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Crear Cita"><span class="glyphicon glyphicon-list-alt"></span></a>
							  				<a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar Paciente"><span class="glyphicon glyphicon-pencil"></span></a>
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
		
		@if(!empty($datos))
			<h3>Datos Generales del Paciente</h3>
			<div class="overthrow" style="overflow:auto;width:100%;">
				<table class="table table-bordered">
					<tr  class="info">
						<th style="width:100px">Cédula</th>
						<th>Nombre Completo</th>
						<th>Edad</th>
						<th>Fuma</th>
						<th>Diabetes</th>
						<th>Nacionalidad</th>
						<th>Etnia</th>
						<th>Raza</th>
						<th>Tipo de Sangre</th>
						<th>Casos Ant. con Trisomia</th>
					</tr>
					<tr class="white">
						<td>{{ $datos[0]->cedula }}</td>
						<td>{{ $datos[0]->primer_nombre.' '.$datos[0]->segundo_nombre.' '.$datos[0]->apellido_paterno.' '.$datos[0]->apellido_materno }}</td>
						<td>{{ $datos[0]->edad }}</td>
						<td>{{ $datos[0]->fuma }}</td>
						<td>{{ $datos[0]->diabetes }}</td>
						<td>{{ $datos[0]->nacionalidad }}</td>
						<td>{{ $datos[0]->etnia }}</td>
						<td>{{ $datos[0]->raza }}</td>
						<td>{{ $datos[0]->tipo_sangre }}</td>
						<td>{{ $datos[0]->embarazos_anteriores }}</td>
					</tr>
				</table>
			</div>
			<hr>
			<h3>Datos de Contacto del Paciente</h3>
			<div class="overthrow" style="overflow:auto;width:100%;">
				<table class="table table-bordered">
					<tr class="info">
						<th>Provincia</th>
						<th>Distrito</th>
						<th>Corregimiento</th>
						<th>Lugar</th>
						<th>Teléfono</th>
						<th>E-mail</th>
						<th>Celular</th>
					</tr>
					<tr class="white">
						<td>{{ $datos[0]->provincia_residencia }}</td>
						<td>{{ $datos[0]->distrito_residencia }}</td>
						<td>{{ $datos[0]->corregimiento_residencia }}</td>
						<td>{{ $datos[0]->lugar_residencia }}</td>
						<td>{{ $datos[0]->telefono }}</td>
						<td>{{ $datos[0]->email }}</td>
						<td>{{ $datos[0]->celular }}</td> 
					</tr>
				</table>
			</div>
			<hr>
			<h3>Datos de la Cita</h3>
			{{ Form::model($form['citas'], $form['datos'] , array('role' => 'form')) }}
				<div class="row">
					{{ Form::text('id_paciente', $datos[0]->id, array('style' => 'display:none', 'id' => 'id_paciente')) }}
					{{ Form::text('fecha_nacimiento', $datos[0]->fecha_nacimiento, array('style' => 'display:none', 'id' => 'fecha_nacimiento')) }}
					{{ Form::text('semana', null , array('style' => 'display:none', 'id' => 'semana')) }}
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				    	{{ Form::label('riesgo', 'Riesgo:') }}<div id="riesgo_pantalla">1/{{ $form['citas']->riesgo }}</div>
				    	{{ Form::text('riesgo', $form['citas']->riesgo, array('style' => 'display:none')) }}        
				    </div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('fecha_cita', 'Fecha de Cita:') }}
      					{{ Form::date('fecha_cita', $form['citas']->fecha_cita, array('id' => 'fecha_cita','class' => 'form-control', 'min' => '2014-01-01', 'max' => '2050-12-31', 'required' => 'required')) }}
    				</div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('fecha_flebotomia', 'Fecha de Flebotomia:') }}
      					{{ Form::date('fecha_flebotomia', $form['citas']->fecha_flebotomia, array('class' => 'form-control', 'min' => '2014-01-01', 'max' => '2050-12-31', 'required' => 'required')) }}
    				</div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('id_medico', 'Médico:') }}
      					{{ Form::select('id_medico', array('0' => 'SELECCION EL  MÉDICO') + Medico::select('id', DB::raw('concat(primer_nombre," ",segundo_nombre," ",apellido_paterno," ",apellido_materno) AS nombre_completo'))->lists('nombre_completo','id'), $form['citas']->id_medico, array('class' => 'form-control', 'required' => 'required')) }}
    				</div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				    	{{ Form::label('peso', 'Peso(kg):') }}
				    	{{ Form::text('peso', $form['citas']->peso, array('placeholder' => 'Peso', 'class' => 'form-control', 'required' => 'required')) }}        
				    </div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				    	{{ Form::label('estatura', 'Estatura(m):') }}
				    	{{ Form::text('estatura', $form['citas']->estatura, array('placeholder' => 'Estatura', 'class' => 'form-control')) }}        
				    </div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('fur', 'Fecha de Ultima Menstruación:') }}
      					{{ Form::date('fur', $form['citas']->fur, array('id' =>'fur','class' => 'form-control', 'min' => '2000-01-01', 'max' => '2050-12-31', 'required' => 'required')) }}
    				</div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('fpp', 'Fecha Probable de Parto:') }}
      					{{ Form::date('fpp', $form['citas']->fpp, array('class' => 'form-control', 'min' => '2000-01-01', 'max' => '2050-12-31')) }}
    				</div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				    	{{ Form::label('edad_gestacional', 'Edad Gestacional por Ultrasonido:') }}
				    	{{ Form::text('edad_gestacional', $form['citas']->edad_gestacional, array('placeholder' => 'Edad Gestacional', 'class' => 'form-control', 'required' => 'required')) }}        
				    </div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				    	{{ Form::label('hijos_embarazo', 'Cantidad de Hijos en Embarazo:') }}
      					{{ Form::select('hijos_embarazo', array('0' => 'SELECCION LA CANTIDAD DE HIJO', '1' => 'UNO', '2' => 'DOS', '3' => 'TRES', '4' => 'CUATRO', '5' => 'CINCO', '6' => 'SEIS'), $form['citas']->hijos_embarazo, array('class' => 'form-control', 'required' => 'required')) }}
				    </div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('fecha_ultrasonido', 'Fecha del Ultrasonido:') }}
      					{{ Form::date('fecha_ultrasonido', $form['citas']->fecha_ultrasonido, array('class' => 'form-control', 'min' => '2000-01-01', 'max' => '2050-12-31')) }}
    				</div>
    			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				    	{{ Form::label('observaciones', 'Observaciones:') }}
				    	{{ Form::textarea('observaciones', $form['citas']->observaciones, array('placeholder' => 'Observaciones', 'class' => 'form-control', 'size' => '1x1')) }}        
				    </div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('id_provincia_institucion', 'Provincia:') }}
      					{{ Form::select('id_provincia_institucion', array('0' => 'SELECCIONE LA PROVINCIA') + Provincia::lists('provincia', 'id_provincia'), $form['citas']->id_provincia , array('class' => 'form-control')) }}
    				</div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('id_tipo_institucion', 'Tipo de Institución:') }}
      					{{ Form::select('id_tipo_institucion', array('0' => 'SELECCIONE EL TIPO DE INSTITUCION') + Tipoinstitucion::lists('tipo_institucion', 'id'), $form['citas']->id_tipo, array('class' => 'form-control')) }}
    				</div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('id_institucion', 'Institución:') }}
      					{{ Form::select('id_institucion', array('0' => 'SELECCIONE LA INSTITUCIÓN') + Institucion::where('id_provincia', $form['citas']->id_provincia)->where('id_tipo_institucion', $form['citas']->id_tipo)->lists('denominacion', 'id'), $form['citas']->id_institucion, array('class' => 'form-control', 'required' => 'required')) }}
    				</div>
				</div>
				<h3>Marcadores</h3>
				<center>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<table style="width:100%">
								<tr align="center">
									<td></td>
									<td>			
										<div class="col-md-offset-2 col-sm-10 col-md-10 col-lg-10">
						    				{{ Form::label('met_general', 'Métodología en General:') }}
						    			</div>
						    		</td>
						    		<td>
						    			<div class="col-md-offset-2 col-sm-10 col-md-10 col-lg-10">
						    				{{ Form::select('met_general', array('0' => 'SELECCION EL  MÉTODO') + Metodologia::lists('metodologia','id'), null, array('class' => 'form-control')) }}
						    			</div>
						    		</td>
						    		<td></td>
						    	</tr>
						    @foreach (Marcador::all() as $marcadores)
								<tr>
									<td>
										<div class="form-group col-md-offset-2  col-sm-10 col-md-10 col-lg-10">
											{{ Form::label('valor_'.$marcadores->id, $marcadores->marcador.':') }}
						    				{{ Form::text('valor_'.$marcadores->id, $form['marcador_'.$marcadores->id.'']->valor, array('placeholder' => $marcadores->marcador, 'class' => 'form-control', 'onKeyUp' => 'Division('.$marcadores->id.','.$datos[0]->id_raza.')')) }}
										</div>
									</td>
									<td>
										<div class="form-group col-md-offset-2  col-sm-10 col-md-10 col-lg-10">
		      								{{ Form::label('metodo_'.$marcadores->id, 'Métodología para '.$marcadores->marcador.':') }}
		      								{{ Form::select('metodo_'.$marcadores->id, array('0' => 'SELECCION EL  MÉTODO') + Metodologia::lists('metodologia','id'), $form['marcador_'.$marcadores->id.'']->id_metodologia, array('class' => 'form-control')) }}
										</div>
									</td>
									<td>
										<div class="form-group col-md-offset-2  col-sm-10 col-md-10 col-lg-10">
		      								{{ Form::label('mom_'.$marcadores->id, 'MOM para '.$marcadores->marcador.':') }}
						    				{{ Form::text('mom_'.$marcadores->id, $form['marcador_'.$marcadores->id.'']->mom, array('placeholder' => 'MOM '.$marcadores->marcador, 'class' => 'form-control', 'readonly' => 'readonly')) }}	
						    			</div>
									</td>
									<td>
										<div class="form-group col-md-offset-2  col-sm-10 col-md-10 col-lg-10">
		      								{{ Form::label('corr_lineal_'.$marcadores->id, 'MOM Corregido Peso:') }}
						    				{{ Form::text('corr_lineal_'.$marcadores->id, $form['marcador_'.$marcadores->id.'']->corr_peso_lineal, array('placeholder' => 'MOM CORREGIDO', 'class' => 'form-control', 'readonly' => 'readonly')) }}	
						    			</div>
									</td>
									<td>
										<div class="form-group col-md-offset-2  col-sm-10 col-md-10 col-lg-10">
		      								{{ Form::label('corr_exp_'.$marcadores->id, 'MOM Corregido Peso Exponencial:') }}
						    				{{ Form::text('corr_exp_'.$marcadores->id, $form['marcador_'.$marcadores->id.'']->corr_peso_exponencial, array('placeholder' => 'MOM CORREGIDO', 'class' => 'form-control', 'readonly' => 'readonly')) }}	
						    			</div>
									</td>
								</tr>
						    @endforeach
							</table>
						</div>
					</div>
					{{ Form::button($form['label'].' Cita', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
					<a href="{{ route('datos.citas.show', $datos[0]->id) }}" class="btn btn-info"> Limpiar Campos</a>
				</center>
			{{ Form::close() }}		
			@if (!empty(Cita::where('id_paciente', $datos[0]->id)->first()->id))
				<div class="row">
					<div class="col-md-12 col-sm-12 col-lg-12">
				    	<div class="panel panel-primary">
				      		<div class="panel-heading">
				        		<h3 class="panel-title">Citas Anteriores</h3>
			        			<div class="pull-right">
				          			<span class="clickable filter" data-toggle="tooltip" title="Buscar Citas" data-container="body">
					            		<i class="glyphicon glyphicon-filter"></i>
				          			</span>
				        		</div>
				      		</div>
					    	<div class="panel-body">
						        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#tabla_citas" placeholder="Filtrar Citas" /><br>
							    <div class="overthrow" style="overflow:auto;width:100%;">
							        <table class="table table-bordered table-hover" id="tabla_citas">
									  	<thead>
									  		<tr class="info">
									  			<th>#</th>
									  			<th>Fecha de Cita</th>
									  			<th>Fecha de Flebotomía</th>
									  			<th>Institucion</th>
									  			<th>Peso</th>
									  			@foreach (Marcador::all() as $marcador)
									  				<th>{{ $marcador->marcador }}</th>
									  			@endforeach
									  			<th></th>
									  		</tr>
									  	</thead>
									  	<tbody>
									  		{{--*/ $n=1; /*--}}
									  		@foreach (Cita::where('id_paciente', $datos[0]->id)->get() as $citas)
										  		<tr align="center">
										  			<td>{{ $n++ }}.</td>
										  			<td>{{ $citas->fecha_cita }}</td>
										  			<td>{{ $citas->fecha_flebotomia }}</td>
										  			<td>{{ Institucion::where('id', $citas->id_institucion)->first()->denominacion }}</td>
										  			<td>{{ $citas->peso }}</td>
										  			@foreach (Marcador::all() as $marcador)
										  				 	<td>{{ $form['marcador_cita']->obtenerMarcador($marcador->id, $citas->id)->valor }}</td> 
										  			@endforeach
										  			<td align="center">
										  				<a href="{{ route('datos.citas.edit', $citas->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar Cita"><span class="glyphicon glyphicon-pencil"></span></a>
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
			@endif
		@endif
		<br>
	{{ HTML::script('assets/js/overthrow/overthrow-detect.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-init.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-polyfill.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-toss.js') }}
@stop