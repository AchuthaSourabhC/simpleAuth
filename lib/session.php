<?php

class Session {

	function __construct(){
		
	}

	public static function init(){
		@session_start();
	}

	public static function exists($key){
		if(isset($_SESSION[$key]))
			return true;
		else
			return false;
	}

	public static function set($key,$value){
		$_SESSION[$key] = $value;
	}

	public static function get($key){
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return NULL;
	}

	public static function destroy(){
		session_destroy();
	}

	public static function flash($key, $values = array()){
		self::init();
		if(self::exists($key)){
			$session = self::get($key);
			self::destroy();
			return $session;
		}else{
			self::set($key, $values);
		}

	}

}