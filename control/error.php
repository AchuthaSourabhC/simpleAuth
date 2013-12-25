<?php

class Error extends Control{

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
			echo $this->twig->render('error/404.html', array());
			return false;
	}

}