@extends ('layout')

@section('title')
  Iniciar Sesión
@stop
@section ('content')
 
    <div class="row" style="margin-top:0px">
        <div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
          <div class="contenedor">
              <div id="carousel-login" class="carousel slide cont-img" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="imgs/dna.jpg" style="width: 100%;height:240px;">
                  </div>
                  <div class="item">
                    <img src="imgs/dna2.jpg" style="width: 100%;height:240px;">
                  </div>
                  <div class="item">
                    <img src="imgs/dna3.jpg" style="width: 100%;height:240px;">
                  </div>
                  <div class="item">
                    <img src="imgs/dna4.jpg" style="width: 100%;height:240px;">
                  </div>
                </div>
              </div>
            <div class="logo"><img src="imgs/icono_login.png"></div>
            <div class="cont-login">
              {{ Form::open(array('url' => 'sigin', 'method' => 'POST', 'id' => 'sigin')) }} 
                  @if(isset($error_login))
                    <div class="alert alert-danger" role="alert" style="text-align:center;margin-top:13px;"><strong>{{ $error_login }}</strong></div>              
                  @else
                    <h3 class="font-login">Iniciar Sesión</h3>
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
                    <center><i class="fa fa-spinner fa-spin fa-3x" id="loading" style="color:#428bca;margin-bottom:10px;display:none;"></i></center>
                    {{ Form::submit('Ingresar', array('class' => 'btn btn-primary btn-block', 'id' => 'boton')) }} 
                  </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
    </div>
 
@stop