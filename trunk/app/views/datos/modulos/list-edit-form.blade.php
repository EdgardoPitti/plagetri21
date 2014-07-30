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
		  <center>Módulos ~ Usuarios </center>
		</h1>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12">
		    	<div class="panel panel-primary">
		      		<div class="panel-heading">
		        		<h3 class="panel-title">Grupos de Usuarios</h3>
	        			<div class="pull-right">
		          			<span class="clickable filter" data-toggle="tooltip" title="Buscar Grupo" data-container="body">
			            		<i class="glyphicon glyphicon-filter"></i>
		          			</span>
		        		</div>
		      		</div>
			    	<div class="panel-body">
				        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Grupos" /><br>
					    <div class="overthrow" style="overflow:auto;width:100%;">
					        <table class="table table-bordered table-hover" id="dev-table">
							  	<thead>
							  		<tr class="info">
							  			<th>#</th>
							  			<th>Grupo de Usuarios</th>
							  			<th>Cantidad de Usuarios</th>
							  			<th>Cargar Privilegios</th>
							  		</tr>
							  	</thead>
							  	<tbody>
							  		{{--*/ $n=1; /*--}}
							  		@foreach (GrupoUsuario::all() as $grupo)
							  		<tr align="center">
							  			<td>{{ $n++ }}.</td>
							  			<td>{{ $grupo->grupo_usuario }}</td>
							  			<td>{{ User::where('id_grupo_usuario', $grupo->id)->count() }}</td>
							  			<td align="center">
							  				<a href="{{ route('datos.modulos.show', $grupo->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Cargar Módulos"><span class="glyphicon glyphicon-list-alt"></span></a>
							  			</td>
							  		</tr>
							  		@endforeach
							  	</tbody>
							</table>
						</div>
			        </div>
		        </div>
		    </div>
		    @if(!is_null($tipousuario->id))
			    <center>
			    	<b>Grupo de Usuario:</b> {{ $tipousuario->grupo_usuario }}
			    	{{ Form::open(array('route' => 'datos.modulos.store', 'method' => 'POST'), array('role' => 'form')) }}
			    		<div class="row">
			    			{{ Form::text('id_grupo_usuario', $tipousuario->id , array('style' => 'display:none', 'id' => 'id_grupo_usuario')) }}
			    	@foreach ( Modulo::all() as $modulo)
							<div class="form-group col-sm-4 col-md-4 col-lg-4">
						    	{{ Form::label('modulo_'.$modulo->id.'', $modulo->modulo) }}
						    	{{ Form::checkbox('modulo_'.$modulo->id.'', 1, ModuloUsuario::where('id_grupo_usuario', $tipousuario->id)->where('id_modulo', $modulo->id)->where('inactivo', '0')->first(),  array('class' => 'form-control')) }}
						    </div>
			    	@endforeach
			    		</div>
		    			<div class="form-group col-sm-12 col-md-12 col-lg-12">
						    <center>
						      {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
						      <a href="{{ route('datos.modulos.index') }}" class="btn btn-info">Limpiar Campos</a>
						    </center>
			 			</div>
					{{ Form::close() }}
			    </center>
		   	@endif
		</div>
@stop