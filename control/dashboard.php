<?php

	class Dashboard extends Control {

		function __construct(){
			parent::__construct();
			Session::init();
			$logged = Session::get("loggedIn");
			if($logged == false){
				
				Session::destroy();
				Redirect::to('user/login', true, 302);

			}else{
				//echo $logged;
			}
		}

		public function index(){
            
			//echo Session::get('username');
			echo $this->twig->render('dashboard/index.html', array('host' => HOST, 'username' => Session::get('username')));
		}

	}
