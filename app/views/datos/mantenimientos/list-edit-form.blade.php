@extends ('layout')

@section('title')
	Mantenimientos
@stop

@section('content')
		<h1>
		 <div style="position:relative;">
			<div style="position:absolute;left:0px;">
		    	<a href="{{URL::to('/')}}" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
			</div>
		 </div>
		  <center>Mantenimientos</center>
		</h1>
		<div class="row">
	      <div class="col-md-12 col-sm-12 col-lg-12">
	        <div class="panel panel-primary">
	          <div class="panel-heading">
	            <h3 class="panel-title">Lista de Activos</h3>
	            <div class="pull-right">
	              <span class="clickable filter" data-toggle="tooltip" title="Buscar Activo" data-container="body">
	                <i class="glyphicon glyphicon-filter"></i>
	              </span>
	            </div>
	          </div>
	          <div class="panel-body">
	          	<div class="overthrow" style="height:200px;">
	              <table id="table-activo" data-sort-name="costo">
		            <thead>
		                <tr class="info">
		                    <th data-field="num" data-align="center">#</th>
		                    <th data-field="num_activo" data-align="center">Número de Activo</th>
		                    <th data-field="nombre" data-align="center" class="nombre">Nombre</th>
		                    <th data-field="tipo" data-align="center">Tipo</th>
		                    <th data-field="nivel" data-align="center">Nivel</th>
		                    <th data-field="ubicacion" data-align="center">Ubicación</th>
		                    <th data-field="costo" data-align="center" data-sortable="true">Costo</th>
		                    <th data-field="urls" data-align="center">Opciones</th>
		                </tr>
		            </thead>	             
	              </table>
	            </div>
	          </div>
	        </div>
	      </div>

	      {{--*/
	      		$hoy = Carbon::now();
	      		$lunes = new Carbon('last Monday'); 
	      		$domingo = new Carbon('next Sunday');
	      /*--}}
	      @if($hoy->format('l') == 'Monday')
				{{--*/$lunes = $hoy;/*--}}	      
	      @elseif($hoy->format('l') == 'Sunday')
	      		{{--*/$domingo = $hoy;/*--}}
	      @endif
	      <div class="col-md-12 col-sm-12 col-lg-12">
	        <div class="panel panel-primary" s tyle="max-height:300px;">
	          <div class="panel-heading">
	            <h3 class="panel-title">Mantenimientos para esta Semana</h3>
	            <div class="pull-right">
	              <span class="clickable filter" data-toggle="tooltip" title="Buscar Activo" data-container="body">
	                <i class="glyphicon glyphicon-filter"></i>
	              </span>
	            </div>
	          </div>
	          <div class="panel-body">
	            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#tabla_mantenimientos" placeholder="Filtrar Mantenimientos" /><br>
	            <div class="table-responsive overthrow"  style="height:170px;">
	              <table class="table table-bordered table-hover mantenimientos" id="tabla_mantenimientos">
	                <thead>
	                <tr class="info">
	                    <th>#</th>
	                    <th>Código</th>
	                    <th>Nombre</th>
	                    <th>Marca</th>
	                    <th>Proveedor</th>
	                    <th>Nivel</th>
	                    <th>Ubicación</th>
	                    <th>Próximo Mantenimiento</th>
	                    <th></th>
	                </tr>
	              </thead>
	              <tbody>
	                {{--*/ $x = 1; /*--}}
	                @foreach (Mantenimiento::whereBetween('proximo_mant', array($lunes->format('Y-m-d'), $domingo->format('Y-m-d')))->get() as $mantenimiento)
	                  <tr>
	                      <td>{{ $x++ }}.</td>
	                      <td>{{ Activo::where('id', $mantenimiento->id_activo)->first()->codigo }}</td>
	                      <td>{{ Activo::where('id', $mantenimiento->id_activo)->first()->nombre }}</td>
	                      <td>{{ Activo::where('id', $mantenimiento->id_activo)->first()->marca }}</td>
	                      @if(empty(Agenda::where('id', Activo::where('id', $mantenimiento->id_activo)->first()->id_proveedor)->first()->nombre_completo))
							<td>No Definido</td>
	                      @else
							<td>{{ Agenda::where('id', Activo::where('id', $mantenimiento->id_activo)->first()->id_proveedor)->first()->nombre_completo }}</td>
	                      @endif
	                      @if(empty(Nivel::where('id', $activo->id_nivel)->first()->nivel))
							<td>No Definido</td>
	                      @else
							<td>{{ Nivel::where('id', $activo->id_nivel)->first()->nivel }}</td>
	                      @endif
	                      @if(empty(Ubicacion::where('id', Activo::where('id', $mantenimiento->id_activo)->first()->id)->first()->ubicacion))
							<td>No Definido</td>
	                      @else
							<td>{{ Ubicacion::where('id', Activo::where('id', $mantenimiento->id_activo)->first()->id)->first()->ubicacion }}</td>
	                      @endif
	                      <td>{{ $mantenimiento->proximo_mant }}</td>
	                      <td align="center">
							<a href="{{ route('datos.mantenimientos.edit', $mantenimiento->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar Mantenimiento"><span class="glyphicon glyphicon-list-alt"></span></a>
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

	    @if (!empty($datos['activo']))
	    	<div class="table-responsive overthrow" style="overflow:auto;width:100%;">
				<table class="table table-bordered">
					<tr class="info">
						<th>Código</th>
						<th>Nombre</th>
						<th>Tipo</th>
						<th>Marca</th>
						<th>Nivel</th>
						<th>Ubicación</th>
						<th>Proveedor</th>
						<th>Costo</th>
						<th>Tiempo de Mant.</th>
					</tr>
					<tr class="white">
						<td>{{ $datos['activo']->codigo }}</td>
						<td>{{ $datos['activo']->nombre }}</td>
						@if(empty(TipoActivo::where('id', $datos['activo']->id_tipo)->first()->tipo))
							<td>No Definido</td>
						@else
							<td>{{ TipoActivo::where('id', $datos['activo']->id_tipo)->first()->tipo }}</td>
						@endif
						<td>{{ $datos['activo']->marca }}</td>
						@if(empty(Nivel::where('id', $datos['activo']->id_nivel)->first()->nivel))
							<td>No Definido</td>
						@else
							<td>{{ Nivel::where('id', $datos['activo']->id_nivel)->first()->nivel }}</td>
						@endif
						@if(empty(Ubicacion::where('id', $datos['activo']->id_ubicacion)->first()->ubicacion))
							<td>No Definido</td>
						@else
							<td>{{ Ubicacion::where('id', $datos['activo']->id_ubicacion)->first()->ubicacion }}</td>
						@endif
						@if(empty(Agenda::where('id', $datos['activo']->id_proveedor)->first()->nombre_completo))
							<td>No Definido</td>
						@else
							<td>{{ Agenda::where('id', $datos['activo']->id_proveedor)->first()->nombre_completo }}</td>
						@endif
						<td>{{ $datos['activo']->costo }}</td>
						@if($datos['activo']->id_fecha_mantenimiento == 1)
							<td>7 DÍAS</td>
						@elseif($datos['activo']->id_fecha_mantenimiento == 2)
							<td>15 DÍAS</td>
						@elseif($datos['activo']->id_fecha_mantenimiento == 3)
							<td>MENSUALES</td>
						@elseif($datos['activo']->id_fecha_mantenimiento == 4)
							<td>TRIMESTRALES</td>
						@elseif($datos['activo']->id_fecha_mantenimiento == 5)
							<td>SEMESTRALES</td>
						@elseif($datos['activo']->id_fecha_mantenimiento == 6)
							<td>Anuales</td>
						@else
							<td>NO DEFINIDO</td>
						@endif
					</tr>					
				</table>
			</div>
			{{ Form::model($datos['mantenimiento'], $datos['form'] + array('files' => 'true'), array('role' => 'form')) }}
				{{ Form::text('id_activo', $datos['activo']->id, array('style' => 'display:none')) }}
				{{ Form::text('id_fecha_mantenimiento', $datos['activo']->id_fecha_mantenimiento, array('style' => 'display:none', 'id' => 'id_fecha_mantenimiento'))}}
				<div class="row">
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
	  					{{ Form::label('fecha', 'Fecha de Realización:') }}
	  					{{ Form::text('fecha', $datos['mantenimiento']->fecha_realizacion, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd', 'min' => '2014-01-01', 'max' => '2050-12-31', 'required' => 'required')) }}
					</div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
				      {{ Form::label('realizado_por', 'Realizado por:') }}
				      {{ Form::text('realizado_por', null, array('placeholder' => 'Realizado Por', 'class' => 'form-control', 'required' => 'required')) }}
				    </div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
				      {{ Form::label('aprobado_por', 'Aprobado por:') }}
				      {{ Form::text('aprobado_por', null, array('placeholder' => 'Aprobado', 'class' => 'form-control')) }}
				    </div>
				    <div class="form-group col-sm-4 col-md-4 col-lg-4">
				    	{{ Form::label('observacion', 'Observación:') }}
				    	{{ Form::textarea('observacion', $datos['mantenimiento']->observacion, array('placeholder' => 'Observación', 'class' => 'form-control', 'size' => '1x3')) }}        
				    </div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
	  					{{ Form::label('proximo', 'Próximo Mantenimiento:') }}
	  					{{ Form::text('proximo', $datos['mantenimiento']->proximo_mant, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd', 'min' => '2014-01-01', 'max' => '2050-12-31')) }}
					</div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
				      {{ Form::label('costo_mantenimiento', 'Costo de Mantenimiento:') }}
				      {{ Form::text('costo_mantenimiento', null, array('placeholder' => 'Costo de Mantenimiento', 'class' => 'form-control', 'required' => 'required')) }}
				    </div>
				</div>
				<div class="form-group col-sm-12 col-md-12 col-lg-12">
				    <center>
				      {{ Form::button($datos['label'].' Mantenimiento', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
				      <a href="{{ route('datos.mantenimientos.show', $datos['activo']->id) }}" class="btn btn-info">Limpiar Campos</a>
				    </center>
	 			</div>
			{{ Form::close() }}
			@if (!empty(Mantenimiento::where('id_activo', $datos['activo']->id)->first()->id))
				<div class="row">
					<div class="col-md-12 col-sm-12 col-lg-12">
				    	<div class="panel panel-primary">
				      		<div class="panel-heading">
				        		<h3 class="panel-title">Mantenimientos de este Activo</h3>
			        			<div class="pull-right">
				          			<span class="clickable filter" data-toggle="tooltip" title="Buscar Mantenimiento" data-container="body">
					            		<i class="glyphicon glyphicon-filter"></i>
				          			</span>
				        		</div>
				      		</div>
					    	<div class="panel-body">
						        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#tabla_citas" placeholder="Filtrar Citas" /><br>
							    <div class="table-responsive overthrow" style="overflow:auto;width:100%;max-height:240px;">
							        <table class="table table-bordered table-hover" id="tabla_citas">
									  	<thead>
									  		<tr class="info">
									  			<th>#</th>
									  			<th>Fecha de Mantenimiento</th>
									  			<th>Realizado</th>
									  			<th>Aprobado</th>
									  			<th>Próximo Mantenimiento</th>
									  			<th>Observación</th>
									  			<th></th>
									  		</tr>
									  	</thead>
									  	<tbody>
									  		{{--*/ $x=1; /*--}}
									  		@foreach (Mantenimiento::where('id_activo', $datos['activo']->id)->orderBy('fecha_realizacion', 'asc')->get() as $mantenimiento)
									  			<tr>
									  				<td>{{ $x++ }}</td>
									  				<td>{{ $mantenimiento->fecha_realizacion }}</td>
									  				<td>{{ $mantenimiento->realizado_por }}</td>
									  				<td>{{ $mantenimiento->aprobado_por }}</td>
									  				<td>{{ $mantenimiento->proximo_mant }}</td>
									  				<td>{{ $mantenimiento->observacion }}</td>
									  				<td align="center">
									  					<a href="{{ route('datos.mantenimientos.edit', $mantenimiento->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar Mantenimiento"><span class="glyphicon glyphicon-list-alt"></span></a>
									  					 <a href="#" data-id="{{ $mantenimiento->id }}"  class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>                                            
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
@stop

