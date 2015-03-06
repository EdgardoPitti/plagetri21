@extends ('layout')

@section('title')
  Registrar Usuario
@stop
@section ('content')

  <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6 col-md-offset-3">          
          {{ Form::open(array('url' => 'registrar', 'method' => 'POST')) }} 
            <fieldset style="padding:20px;">                                
              <h3 style="text-align:center;font-weight:bold;">Registre Nuevo Usuario</h3><hr>
              <div class="form-group">
                {{ Form::label('usuario', 'Nombre de Usuario:')}}      
                {{ Form::text('usuario', null, array('class' => 'form-control', 'placeholder' => 'Usuario', 'required' => 'required')) }}                  
              </div>
              @if($errors->has())
                <p style="color:#f00;text-align:center;"> {{ $errors->first('usuario') }}</p>                  
              @endif
              <div class="form-group">
                {{ Form::label('pass', 'Contraseña:')}}
                {{ Form::password('pass', array('class' => 'form-control', 'placeholder' => 'Contraseña', 'required' => 'required')) }}                 
              </div>
              @if($errors->has())
                <p style="color:#f00;text-align:center;">{{ $errors->first('pass') }}</p>                  
              @endif
              <div class="form-group">
                {{ Form::label('grupo_usuario', 'Grupo de Usuario:')}}
                {{ Form::select('grupo_usuario',GrupoUsuario::lists('grupo_usuario', 'id'), null,array('class' => 'form-control')) }}                 
              </div>
              <div class="form-group">
                {{ Form::submit('Guardar', array('class' => 'btn btn-success btn-block')) }} 
              </div>
              @if(isset($user_save))
                <h4 style="color:#4cae4c;text-align:center;">{{ $user_save }}</h4>              
              @endif
            </fieldset>
          {{ Form::close() }}
          
          
			<div class="col-md-12 col-sm-12 col-lg-12">
		    	<div class="panel panel-primary">
		      	<div class="panel-heading">
		        		<h3 class="panel-title">Usuarios</h3>
	        			<div class="pull-right">
		          			<span class="clickable filter" data-toggle="tooltip" title="Buscar Usuarios" data-container="body">
			            		<i class="glyphicon glyphicon-filter"></i>
		          			</span>
		        		</div>
		      	</div>
			    	<div class="panel-body" style="display:block;">
				       <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Usuarios" /><br>
					    <div class="overthrow" style="height:200px;">
					        <table class="table table-bordered table-hover modulo" id="dev-table">
							  	<thead>
							  		<tr class="info">
							  			<th>#</th>
							  			<th>Usuario</th>
							  			<th>Rol</th>
							  			
							  		</tr>
							  	</thead>
							  	<tbody>
							  		{{--*/ $n=1; /*--}}
							  		@foreach (User::all() as $usuario)
										<tr align="center">
											<td>{{ $n++ }}.</td>
											<td>{{ $usuario->user }}</td>
											<td>{{ GrupoUsuario::where('id', $usuario->id_grupo_usuario)->first()->grupo_usuario }}</td>

										</tr>
							  		@endforeach
							  	</tbody>
							</table>
						</div>
			        </div>
		        </div>
		    </div>
      </div>
  </div>  
@stop
