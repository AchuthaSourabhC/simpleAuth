<?php

class Redirect{

	public static function to($location, $withCode=false, $code=301){
		if($withCode){
			header('Location:'.HOST.'/'.$location, $withCode, $code);
			exit;
		}else{
			header('Location:'.HOST.'/'.$location);
			exit;
		}
	}

}