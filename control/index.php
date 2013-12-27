<?php

	class Index extends Control{

		function __construct(){
			parent::__construct();
		}

		public function index(){
			echo $this->twig->render('home/index.html', array('host' => HOST));
		}

		public function about(){
			echo $this->twig->render('home/about.html', array('host' => HOST));
		}

	}