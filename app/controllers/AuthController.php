<?php
	class AuthController extends BaseController{
		
		
		//Función para verificar los datos del usuario e iniciar sesión
		public function postLogin() {
		  $reglas = array(
	  			'user' => 'required', 
	  			'password' => 'required|alpha_num'
		  ); 	
		  
		  $validator = Validator::make(Input::all(), $reglas);

		  if($validator->fails()){
		  	return Redirect::to('/')->withErrors($validator)->withInput();
		  }else{

		      $user_data = array(
		         'user' => Input::get('user'),
		         'password' => Input::get('password')
		      );

		      if(Auth::attempt($user_data)){
		        return View::make('inicio');
		      }else{
		      	return View::make('login')->with('error_login', 'Usuario o Contraseña Incorrectos');	      	
		      }		  	
		  }	     
	    } 
	    
	    //Funcion para cerrar sesión
	    public function getLogout(){
	      if(Auth::check()){
	         Auth::logout();
	      }
	      return Redirect::to('/');
	    }

	    //Función para mostrar formulario de registro
	    public function getRegistro(){
	    	return View::make('datos/usuarios/registrar');
	    }

	    //Función para registrar usuario
	    public function register(){
	    	$rules = array(
	    		'usuario' => 'required|max:30', 
	    		'password' => "required|alpha_num|min:6|max:20"
	    	);
	    	
	    	$datos = Input::all();
	    	$validar = Validator::make($datos, $rules);

	    	if($validar->fails()){
	    		return Redirect::to('registro')->withErrors($validar)->withInput();
	    	}else{
	    		
	    		$user = new User;
	    		$user->user = $datos['usuario'];
	    		$user->password = Hash::make($datos['password']);
	    		$user->id_grupo_usuario = $datos['grupo_usuario'];
	    		$user->save();
	    		return View::make('datos/usuarios/registrar')->with('user_save', 'Usuario Agregado Correctamente');
	    	}
	    }
	    
	}
?>
