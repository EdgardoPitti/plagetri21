@extends ('layout')

@section('title')
	Mantenimientos
@stop

@section('content')
		<h1>
		 <div style="position:relative;">
			<div style="position:absolute;left:0px;">
		    	<a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
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
	            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#list-act" placeholder="Filtrar Activo" />
	          </div>
	            <div class="table-responsive overthrow" style="padding:10px 10px;height:170px;">
	              <table class="table table-bordered table-hover list-act" id="list-act">
	                <thead>
		                <tr class="info">
		                    <th>#</th>
		                    <th>Código</th>
		                    <th>Nombre</th>
		                    <th>Tipo</th>
		                    <th>Proveedor</th>
		                    <th>Nivel</th>
		                    <th>Ubicación</th>
		                    <th>Costo</th>
		                    <th></th>
		                </tr>
		             </thead>
		             <tbody>
	                {{--*/ $x = 1; /*--}}
	                @foreach (Activo::all() as $activo)
	                  <tr>
	                      <td>{{ $x++ }}.</td>
	                      <td>{{ $activo->codigo }}</td>
	                      <td>{{ $activo->nombre }}</td>
	                      @if(empty(TipoActivo::where('id', $activo->id_tipo)->first()->tipo))
							<td>No Definido</td>
	                      @else
							<td>{{ TipoActivo::where('id', $activo->id_tipo)->first()->tipo }}</td>
	                      @endif
	                      @if(empty(Agenda::where('id', $activo->id_proveedor)->first()->nombre_completo))
							<td>No Definido</td>
	                      @else
							<td>{{ Agenda::where('id', $activo->id_proveedor)->first()->nombre_completo }}</td>
	                      @endif
	                      @if(empty(Nivel::where('id', $activo->id_nivel)->first()->nivel))
							<td>No Definido</td>
	                      @else
							<td>{{ Nivel::where('id', $activo->id_nivel)->first()->nivel }}</td>
	                      @endif
	                      @if(empty(Ubicacion::where('id', $activo->id_ubicacion)->first()->ubicacion))
							<td>No Definido</td>
	                      @else
							<td>{{ Ubicacion::where('id', $activo->id_ubicacion)->first()->ubicacion }}</td>
	                      @endif
	                      <td>{{ $activo->costo }}</td>
	                      <td align="center">
							<a href="{{ route('datos.mantenimientos.show', $activo->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"  title="Crear Mantenimiento"><span class="glyphicon glyphicon-list-alt"></span></a>                        
	                        <a href="{{ route('datos.activos.edit', $activo->id) }}" class="btn btn-primary btn-sm" style="margin:3px 0px;" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
	                      </td>
	                  </tr>
	                @endforeach
	                </tbody> 
	              </table>
	            </div>
	        </div>
	      </div>
	      <div class="col-md-12 col-sm-12 col-lg-12">
	        <div class="panel panel-primary" s tyle="max-height:300px;">
	          <div class="panel-heading">
	            <h3 class="panel-title">Lista de Mantenimientos por hacer de este Mes</h3>
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
	                @foreach (Mantenimiento::whereBetween('proximo_mant', array($objeto->mes(0), $objeto->mes(3)))->get() as $mantenimiento)
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
	    	<div class="overthrow" style="overflow:auto;width:100%;">
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
					</tr>					
				</table>
			</div>
			{{ Form::model($datos['mantenimiento'], $datos['form'] + array('files' => 'true'), array('role' => 'form')) }}
				{{ Form::text('id_activo', $datos['activo']->id, array('style' => 'display:none')) }}
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
				    	{{ Form::textarea('observacion', $datos['mantenimiento']->observacion, array('placeholder' => 'Observación', 'class' => 'form-control', 'size' => '1x1')) }}        
				    </div>
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
	  					{{ Form::label('proximo', 'Próximo Mantenimiento:') }}
	  					{{ Form::text('proximo', $datos['mantenimiento']->proximo_mant, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd', 'min' => '2014-01-01', 'max' => '2050-12-31')) }}
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
							    <div class="overthrow" style="overflow:auto;width:100%;height:100%;max-height:240px;">
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
  {{ Form::open(array('route' => array('datos.mantenimientos.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
  {{ Form::close() }}
