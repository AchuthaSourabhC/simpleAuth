<?php

	class User extends Control {
	
		function __construct(){
			parent::__construct();
			Session::init();		
		}

		public function login(){
			if(Session::exists("loginError")){
				$message = Session::flash("loginError");$error = 1;
				echo $this->twig->render('user/login.html', array('host' => HOST, "message" => $message, "error" => $error));
			
			}else{
				$error = 0;
				echo $this->twig->render('user/login.html', array('host' => HOST, "error" => $error));

			}
		}
		public function check(){
			$creds = array('email' => $_POST["email"], 'pass' => $_POST["password"] );
			$res = $this->model->login($creds);
			
			if($res['status'] > 0){
				//session_start();
				Session::set("loggedIn", true);
				Session::set("username", $res['username']);
				Session::set("user_id", $res['user_id']);
				//echo Session::get("username");
				//Session::set("user_data", $res);
				
				Redirect::to('dashboard/index', true, 302);
	
			}else{
				Session::flash("loginError", "Incorrect email or password");
				Redirect::to('user/login', true, 302);

			}
		}

		public function register(){
			if(Session::exists("message")){
				$message = Session::flash("message");
				$error = 1;
				echo $this->twig->render('user/register.html', array('public' => public_dir, 'host' => HOST, 'error' => $error, 'message' => $message));

			}else{
				$error = 0;
				echo $this->twig->render('user/register.html', array('public' => public_dir, 'host' => HOST, 'error' => $error));

			}
		}

		public function newuser(){
			$values = array("username" => $_POST['username'], "email" => $_POST['email'], 
					"name" => $_POST['name'], "pass" => $_POST['password'], "dob" => $_POST['datepicker']);
			$resp = $this->model->create($values);
			Session::flash("message", $resp);

			if($resp['status']){
				Redirect::to('user/login', true, 302);
				
			}else{
				Redirect::to('user/register', true, 302);
				
			}
		}

		public function logout(){
			Session::destroy();
			Redirect::to('user/login', true, 302);
		}

		public function index(){
            if(Session::exists('loggedIn') && Session::get('loggedIn')){
              
                echo $this->twig->render('user/index.html', array('host' => HOST, 'loggedIn' => 1));
         
            }else{
                echo $this->twig->render('user/index.html', array('host' => HOST, 'loggedIn' => 0));
 
            }
		}
	}