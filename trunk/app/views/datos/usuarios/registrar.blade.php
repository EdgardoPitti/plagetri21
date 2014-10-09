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
                {{ Form::select('grupo_usuario', array('0' => 'GRUPO DE USUARIO') + GrupoUsuario::lists('grupo_usuario', 'id'), null,array('class' => 'form-control')) }}                 
              </div>
              <div class="form-group">
                {{ Form::submit('Guardar', array('class' => 'btn btn-success btn-block')) }} 
              </div>
              @if(isset($user_save))
                <h4 style="color:#4cae4c;text-align:center;">{{ $user_save }}</h4>              
              @endif
            </fieldset>
          {{ Form::close() }}
      </div>
  </div>  
@stop