@extends ('layout')

@section('title')
	Activos
@stop

@section('content')
		<h1>
		 <div style="position:relative;">
			<div style="position:absolute;left:0px;">
		    	<a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
			</div>
		 </div>
		  <center>Activos</center>
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
	          <div class="panel-body" style="display:block;">
	            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Activo" /><br>
	            
	            <div class="overthrow" style="height:200px;">
	              <table class="table table-hover table-bordered activos" cellpadding="0" cellspacing="0" id="dev-table">
	               <thead>
	                <tr class="info">
	                    <th>#</th>
	                    <th>Número de Activo</th>
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
	                        <a href="#" data-id="{{ $activo->id }}"  class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>                                            
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

		<div class="row">
	      <div class="col-md-12 col-sm-12 col-lg-12">
	        <div class="panel panel-primary">
	          <div class="panel-heading">
	            <h3 class="panel-title">Reporte de Garantia de Activos</h3>
	            <div class="pull-right">
	              <span class="clickable filter" data-toggle="tooltip" title="Buscar Activo" data-container="body">
	                <i class="glyphicon glyphicon-filter"></i>
	              </span>
	            </div>
	          </div>
	          <div class="panel-body" style="display:none;">
	          	Tiempo en Meses:<input type="number" class="form-control" id="meses"/><br>            
	            <div class="overthrow" style="height:200px;">
	              <table class="table table-hover table-bordered activos" cellpadding="0" cellspacing="0" id="dev-table">
	               <thead>
	                <tr class="info">
	                    <th>#</th>
	                    <th>Número de Activo</th>
	                    <th>Nombre</th>
	                    <th>Tipo</th>
	                    <th>Nivel</th>
	                    <th>Ubicación</th>
	                    <th>Fecha de Garantía</th>
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
	                      @if(empty($activo->fecha_garantia))
	                      	<td>NO DEFINIDO</td>
	                      @else
	                      	{{--*/$date = new DateTime($activo->fecha_garantia);/*--}}
	                      	<td>{{ $date->format('d-m-Y') }}</td>
	                      @endif
	                      <td>{{ $activo->costo }}</td>
	                      <td align="center">
							<a href="{{ route('datos.mantenimientos.show', $activo->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"  title="Crear Mantenimiento"><span class="glyphicon glyphicon-list-alt"></span></a>                       
	                        <a href="{{ route('datos.activos.edit', $activo->id) }}" class="btn btn-primary btn-sm" style="margin:3px 0px;" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
	                        <a href="#" data-id="{{ $activo->id }}"  class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>                                            
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
		{{ Form::model($datos['activo'], $datos['form'] + array('files' => 'true') , array('role' => 'form')) }}
			<div class="row">
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('num_activo', 'Número de Activo:') }}
			      {{ Form::text('num_activo', null, array('placeholder' => 'Número de Activo', 'class' => 'form-control', 'required' => 'required')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('nombre', 'Nombre:') }}
			      {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control', 'required' => 'required')) }}
			    </div>
		        <div class="form-group col-sm-4 col-md-4 col-lg-4">
 				    {{ Form::label('fecha_compra', 'Fecha de Compra:') }}
    				{{ Form::text('fecha_compra', $datos['activo']->fecha_compra, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd', 'min' => '1950-01-01', 'max' => '2020-12-31')) }}
    			</div>
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('tipo', 'Tipo de Activo:') }}
			      {{ Form::select('tipo', array('0' => 'SELECCIONE EL TIPO DE ACTIVO') + TipoActivo::lists('tipo', 'id'), $datos['activo']->id_tipo, array('class' => 'form-control')); }}    
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('marca', 'Marca:') }}
			      {{ Form::text('marca', null, array('placeholder' => 'Marca', 'class' => 'form-control')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('modelo', 'Modelo:') }}
			      {{ Form::text('modelo', null, array('placeholder' => 'Modelo', 'class' => 'form-control')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('serie', 'Serie:') }}
			      {{ Form::text('serie', null, array('placeholder' => 'Serie', 'class' => 'form-control')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('voltaje', 'Voltaje:') }}
			      {{ Form::text('voltaje', null, array('placeholder' => 'Voltaje', 'class' => 'form-control')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('consumo', 'Consumo:') }}
			      {{ Form::text('consumo', null, array('placeholder' => 'Consumo', 'class' => 'form-control')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('alimentacion', 'Alimentacion:') }}
			      {{ Form::text('alimentacion', null, array('placeholder' => 'Alimentacion', 'class' => 'form-control')) }}
			    </div>
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('id_tipo_fuente', 'Tipo de Fuente:') }}
			      {{ Form::select('id_tipo_fuente',  array('0' => 'SELECCIONE EL TIPO DE FUENTE') + TipoFuente::lists('tipo_fuente', 'id'), null, array('class' => 'form-control')); }}    
			    </div>
 				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('id_fecha_mantenimiento', 'Fecha de Mantenimiento:') }}
			      {{ Form::select('id_fecha_mantenimiento',  array('0' => 'SELECCIONE LA FECHA DE MANTENIMIENTO') + FechaMantenimiento::lists('fecha_mantenimiento', 'id'), null, array('class' => 'form-control')); }}    
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('protocolo', 'Protocolo de Mantenimiento:') }}
			      {{ Form::text('protocolo', null, array('placeholder' => 'Protocolo de Mantenimiento', 'class' => 'form-control')) }}
			    </div>
 				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('id_estado', 'Estado:') }}
			      {{ Form::select('id_estado',  array('0' => 'SELECCIONE EL ESTADO') + TipoEstado::lists('tipo_estado', 'id'), null, array('class' => 'form-control')); }}    
			    </div>
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('nivel', 'Nivel:') }}
			      {{ Form::select('nivel',  array('0' => 'SELECCIONE EL NIVEL') + Nivel::lists('nivel', 'id'), $datos['activo']->id_nivel, array('class' => 'form-control')); }}    
			    </div>
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('ubicacion', 'Ubicación:') }}
			      {{ Form::select('ubicacion',  array('0' => 'SELECCIONE LA UBICACION') + Ubicacion::lists('ubicacion', 'id'), $datos['activo']->id_ubicacion, array('class' => 'form-control')); }}    
			    </div>
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('proveedor', 'Proveedor:') }}
			      {{ Form::select('proveedor',  array('0' => 'SELECCIONE EL PROVEEDOR') + Agenda::lists('nombre_completo', 'id'), $datos['activo']->id_proveedor, array('class' => 'form-control')); }}    
			    </div>
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			    	{{ Form::label('descripcion', 'Descripcion:') }}
			    	{{ Form::textarea('descripcion', $datos['activo']->descripcion, array('placeholder' => 'Desripcion', 'class' => 'form-control', 'size' => '1x4')) }}        
			    </div>
			     <div class="form-group col-sm-4 col-md-4 col-lg-4">
 				    {{ Form::label('fecha_garantia', 'Fecha de Garantía:') }}
    				{{ Form::text('fecha_garantia', null, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd', 'min' => '1950-01-01', 'max' => '2020-12-31')) }}
    			</div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('num_factura', 'Número de Factura:') }}
			      {{ Form::text('num_factura', null, array('placeholder' => 'Número de Factura', 'class' => 'form-control')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('costo', 'Costo:') }}
			      {{ Form::text('costo', null, array('placeholder' => 'Costo', 'class' => 'form-control')) }}
			    </div>
			</div>
			<div class="form-group col-sm-12 col-md-12 col-lg-12">
			    <center>
			      {{ Form::button($datos['label'].' Activo', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
			      <a href="{{ route('datos.activos.index') }}" class="btn btn-info">Limpiar Campos</a>
			    </center>
 			</div>
		{{ Form::close() }}


@stop
  {{ Form::open(array('route' => array('datos.activos.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
  {{ Form::close() }}
