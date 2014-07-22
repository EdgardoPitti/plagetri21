@extends ('layout')

@section('title')
  Iniciar Sesión
@stop
@section ('content')
 
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="well well-sm">
            {{ Form::open(array('url' => 'sigin', 'method' => 'POST')) }} 
              <fieldset style="padding:20px;">
                
                @if(isset($error_login))
                  <h3 style="color:#f00;text-align:center;">{{ $error_login }}</h3>              
                @else
                  <h3 style="text-align:center;">Introduzca Usuario y Contraseña</h3>
                @endif
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                  </span>        
                  {{ Form::text('user', null, array('class' => 'form-control', 'placeholder' => 'Usuario', 'required' => 'required')) }}                  
                </div>
                @if($errors->has())
                  <p style="color:#f00;text-align:center;"> {{ $errors->first('user') }}</p>                  
                @endif
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock">
                    </i>
                  </span>
                  {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña', 'required' => 'required')) }}                 
                </div>
                @if($errors->has())
                  <p style="color:#f00;text-align:center;">{{ $errors->first('password') }}</p>                  
                @endif
                <div class="form-group">
                  {{ Form::submit('Ingresar', array('class' => 'btn btn-primary btn-block')) }} 
                </div>
              </fieldset>
            {{ Form::close() }}
          </div>
        </div>
    </div>
 
@stop