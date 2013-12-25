<?php

class Handler{

	function __construct(){
		

		if(isset($_GET['url'])){
			$url = explode('/', rtrim( $_GET['url'], "/"));
		}else{
			Redirect::to(DEFAULTURL, true, 302);
			//header('Location: '.DEFAULTURL, true, 302);
   			die();

		}
	
		if(isset($url[0])){
			$file = "control/".$url[0].".php";
			if(file_exists($file)){

				require $file;
				$control = new $url[0]();
				$control->loadModel($url[0]);

				if(isset($url[1])){

					if(method_exists($control, $url[1])){
						if(isset($url[2])){
							$control->{$url[1]}($url[2]);
						}else{
							$control->{$url[1]}();
						}
					}else{
						require "control/error.php";
						$error = new Error();
						$error->index();
						//return false;
					}

				}else{

					$control->{DEFAULTPAGE}();
				}
			}else{
				require "control/error.php";
				$error = new Error();
				$error->index();
				//return false;
			}
		}else{
			Redirect::to(DEFAULTURL, true, 302);
			//header('Location: '.DEFAULTURL, true, 302);
   			die();

		}
	}

}