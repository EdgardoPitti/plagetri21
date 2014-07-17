@extends ('layout')

@section('title')
  Iniciar Sesión
@stop
@section ('content')
  <div class="container">
    <div class="row">
        
        
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#login" role="tab" data-toggle="tab">Iniciar Sesión</a></li>
          <li><a href="#register" role="tab" data-toggle="tab">Registrarse</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="login">
            <div class="col-md-6 col-md-offset-3">
              {{ Form::open(array('url' => 'sigin', 'method' => 'POST')) }} 
                  <fieldset style="padding:20px;">
                    @if(Session::has('error'))
                      <p style="color:#f00;text-align:center">Usuario o Contraseña Incorrectos</p>
                      @if($errors->has())
                        @if($errors->has('password'))
                          {{ $errors->first('password') }}
                        @endif
                      @endif
                    @else
                      <h4 style="text-align:center;">Introduzca Usuario y Contraseña</h4>
                    @endif
                    <div class="form-group input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span>        
                      {{ Form::text('user', null, array('class' => 'form-control', 'placeholder' => 'Usuario', 'required' => 'required')) }}
                    </div>
                    <div class="form-group input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock">
                        </i>
                      </span>
                      {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
                    </div>
                    <div class="form-group">
                      {{ Form::submit('Enviar', array('class' => 'btn btn-primary btn-block')) }} 
                    </div>
                  </fieldset>
                {{ Form::close() }}
              </div>
          </div>
          <div class="tab-pane" id="register">
            {{ Form::open(array('url' => 'registrar', 'method' => 'POST')) }}
              <fieldset style="padding:20px;">
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                  </span> 
                  {{ Form::text('usuario', null, array('class' => 'form-control', 'placeholder' => 'Nombre de Usuario', 'required' => 'required')) }}
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock"></i>
                  </span>
                  {{ Form::password('pass', array('class' => 'form-control', 'placeholder' => 'Ingrese Contraseña', 'required' => 'required')) }}
                </div>
                <div class="form-group">
                {{ Form::submit('Registrar', array('class' => 'btn btn-success btn-block')) }}
                </div>
              </fieldset>
            {{ Form::close() }}
          </div>
        </div>
     
      </div>
    </div>
@stop