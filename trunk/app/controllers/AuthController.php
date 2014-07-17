<?php
	class AuthController extends BaseController{
		
		//Función para verificar los datos del usuario e iniciar sesión
		public function postLogin() {
		  $reglas = array(
	  			'user' => 'required', 
	  			'password' => 'required|alphaNum'
		  ); 	
		  $msg = array(
		  		'user.required' => 'El campo Usuario es obligatorio',
		  		'password.required' => 'El campo Password es obligatorio',
		  		'password.alphaNum' => 'El campo Password debe ser alfanumerico'
		  );

		  $validator = Validator::make(Input::all(), $reglas);

		  if($validator->fails()){
		  	return View::make('login')->withErrors($validator);
		  }else{

		      $user_data = array(
		         'user' => Input::get('user'),
		         'password' => Input::get('password')
		      );

		      if(Auth::attempt($user_data)){
		        return View::make('inicio');
		      }else{
		      	return View::make('login')->with('error', true);	      	
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

	    //Función para registrar usuario
	    public function register(){
	    	$rules = array(
	    		'usuario' => 'required|min:10|max:30', 
	    		'pass' => "required|alphaNum|min:12|max:25"
	    	);
	    	$mensaje = array(
	    		'required' => 'El campo :attribute es obligatorio',
	    		'min' => 'El campo :attribute no puede tener menos de :min caracteres',
	    		'max' => 'El campo :attribute no puede tener más de :max caracteres',
	    		'alphaNum' => 'El campo :attribute debe ser alfanumerico'
	    	);
	    	$datos = Input::all();
	    	$validar = Validator::make($datos, $rules, $mensaje);

	    	if($validar->fails()){
	    		return View::make('login')->with('activo', true)->withErrors($validar)->withInput();
	    	}else{
	    		
	    		$user = new User;
	    		$user->user = $datos['usuario'];
	    		$user->password = Hash::make($datos['pass']);
	    		$user->save();
	    		return Redirect::to('/');
	    	}
	    }
	}
?>