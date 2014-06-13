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
		{{ Form::model($datos['activo'], $datos['form'] + array('files' => 'true') , array('role' => 'form')) }}
			<div class="row">
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('codigo', 'Código:') }}
			      {{ Form::text('codigo', null, array('placeholder' => 'Código', 'class' => 'form-control', 'required' => 'required')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('nombre', 'Nombre:') }}
			      {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control', 'required' => 'required')) }}
			    </div>
		        <div class="form-group col-sm-4 col-md-4 col-lg-4">
 				    {{ Form::label('fecha_compra', 'Fecha de Compra:') }}
    				{{ Form::date('fecha_compra', $datos['activo']->fecha_compra, array('class' => 'form-control', 'min' => '1950-01-01', 'max' => '2020-12-31')) }}
    			</div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('num_factura', 'Número de Factura:') }}
			      {{ Form::text('num_factura', null, array('placeholder' => 'Número de Factura', 'class' => 'form-control')) }}
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('costo', 'Costo:') }}
			      {{ Form::text('costo', null, array('placeholder' => 'Costo', 'class' => 'form-control')) }}
			    </div>
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('tipo', 'Tipo de Activo:') }}
			      {{ Form::select('tipo',  array('0' => 'SELECCIONE EL TIPO') + TipoActivo::lists('tipo', 'id'), $datos['activo']->id_tipo, array('class' => 'form-control')); }}    
			    </div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
			      {{ Form::label('marca', 'Marca:') }}
			      {{ Form::text('marca', null, array('placeholder' => 'Marca', 'class' => 'form-control')) }}
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
			    	{{ Form::textarea('descripcion', $datos['activo']->descripcion, array('placeholder' => 'Desripcion', 'class' => 'form-control', 'size' => '1x1')) }}        
			    </div>
			</div>
			<div class="form-group col-sm-12 col-md-12 col-lg-12">
			    <center>
			      {{ Form::button($datos['label'].' Activo', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
			      <a href="{{ route('datos.activos.index') }}" class="btn btn-info">Limpiar Campos</a>
			    </center>
 			</div>
		{{ Form::close() }}

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
	            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Activo" /><br>
	            <div class="overthrow"  style="overflow:auto;width:100%;">
	              <table class="table table-bordered table-hover" id="dev-table">
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
	                      <td>{{ TipoActivo::where('id', $activo->id_tipo)->first()->tipo }}</td>
	                      <td>{{ Agenda::where('id', $activo->id_proveedor)->first()->nombre_completo }}</td>
	                      <td>{{ Nivel::where('id', $activo->id_nivel)->first()->nivel }}</td>
	                      <td>{{ Ubicacion::where('id', $activo->id_ubicacion)->first()->ubicacion }}</td>
	                      <td>{{ $activo->costo }}</td>
	                      <td align="center">
							{{--<a href="{{ route('datos.mantenimientos.show', $activo->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"  title="Crear Mantenimiento"><span class="glyphicon glyphicon-list-alt"></span></a>--}}                         
	                        <a href="{{ route('datos.activos.edit', $activo->id) }}" class="btn btn-primary btn-sm" style="margin:3px 0px;" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
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
@stop