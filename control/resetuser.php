<?php

	class Resetuser extends Control {
	
		function __construct(){
			parent::__construct();	
			Session::init();	
		}

	private function sendMail($to_email, $subject, $body, $from_email){
		require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer(true);

		//Send mail using gmail

	    $mail->IsSMTP(); // telling the class to use SMTP
	    $mail->SMTPAuth = true; // enable SMTP authentication
	    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	    $mail->Port = 465; // set the SMTP port for the GMAIL server
	    $mail->Username = "sourabh.0mail@gmail.com"; // GMAIL username
	    $mail->Password = "geek A/c"; // GMAIL password

		
		//Typical mail data
		$mail->AddAddress($to_email);
		$mail->SetFrom($from_email);
		$mail->Subject = $subject;
		$mail->Body = $body;

		try{
		    $mail->Send();
		    return 1;
		} catch(Exception $e){
		    //Something went bad
		   return 0;
		}
	}

	public function forgotPass(){
		if(Session::exists('mailError')){
			$error = Session::flash('mailError');
			echo $this->twig->render('user/forgotpass.html', array('host' => HOST, 'error' => 1));
		}else{
			echo $this->twig->render('user/forgotpass.html', array('host' => HOST));
		}
	}

	public function sendPass(){

		$data = array("email" => $_POST["email"]);
		$res = $this->model->resetUser($data);
		
		$body = "Click the link below to reset password\r\n";
		$body = $body."localhost/".HOST."/resetuser/resetPassGet"."?user=".urlencode($res[':user'])."&token=".urlencode($res[':token']);

		if($res['status']){
				$subj = "Reset Password";
				$res = $this->sendMail($res[':user'], $subj, $body, "webmaster@localhost");
				if($res){
					echo "Success Check your mail";
				}else{
					echo "Failed";
				}
				
		}else{
			Session::flash("mailError", 1);
			Redirect::to("resetuser/forgotPass", true, 302);
		}

	}

	public function resetPassGet(){
		$data = array("token" => $_GET['token'], "user" => $_GET['user']);
		$resp = $this->model->getResetToken($data);

		if($resp['status']){
			Session::init();
			Session::set("token", $data['token']);
			echo $this->twig->render('user/changepass.html', array('host' => HOST));
			//Redirect::to("user/resetPassDone", true, 302);
		}else{
			Session::flash("mailError", 1);
			Redirect::to("resetuser/forgotPass", true, 302);
		}
	}

	public function changePass(){

		$token = Session::get("token");
		Session::destroy();

		$data = array("password" => $_POST['password'], "token" => $token );
		$resp = $this->model->setUserPass($data);
		if($resp['status']){
			Redirect::to("user/login", true, 302);
		}else{
			
			Session::flash("mailError", 1);
			Redirect::to("resetuser/forgotPass", true, 302);
		}
	}


	public function index(){
		if(Session::exists('mailError')){
			$error = Session::flash('mailError');
			echo $this->twig->render('user/forgotpass.html', array('host' => HOST, 'error' => 1));
		}else{
			echo $this->twig->render('user/forgotpass.html', array('host' => HOST));
		}
	}

}