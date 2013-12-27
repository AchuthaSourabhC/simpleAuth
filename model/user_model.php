<?php

class User_Model extends Model {

	function __construct(){
		parent::__construct();
	}
		private function randomString($passwordLength=8){
		$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$password_characters = str_split($characters);
		$password=''; 

		for($i=0;$i<$passwordLength;$i++){ 
			$password.=$password_characters[rand(0,count($password_characters)-1)];
		}
		return $password;
	}

	public function login($creds){
		$cipher = new Cipher(KEY);
		$encryptpass = $cipher->encrypt($creds['pass']);
		$query = "SELECT * FROM details WHERE email = :email AND password = :password";
		$stmt = $this->db->prepare($query);
		$stmt->execute(array(":email"=> $creds['email'],
								":password"=> $encryptpass));
		//$ret = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count){
			$rows = $stmt->fetchAll();
			$resp = array( "status" => 1, "username" => $rows[0]['username'], "user_id" =>  $rows[0]['id']);
			return $resp;
		}else{
			$resp = array( "status" => 0);
			return $resp;
		}
		
	}

	public function create($values){

		$cipher = new Cipher(KEY);
		$encryptpass = $cipher->encrypt($values['pass']);
		$checkuser = "SELECT * FROM details WHERE username = :username";
		$checkemail = "SELECT * FROM details WHERE email = :email";
		
		$insertquery = "INSERT INTO details (username, email, name, password, dob) VALUES (:username, :email, :name, :password, :dob )";

		$stmt = $this->db->prepare($insertquery);
		$result = $stmt->execute(array(":username" => $values['username'], ":email" => $values['email'], ":name" => $values['name'], ":password" => $encryptpass, ":dob" => $values['dob']));

		if ($result) 
		{
			$resp = array("status" => 1);
			return $resp;	
		}
		else
		{
			$myeCode = $stmt->errorInfo();
			
			if($myeCode[0] == 23000){
				$stmt1 = $this->db->prepare($checkuser);
				$stmt2 = $this->db->prepare($checkemail);
				$res1 = $stmt1->execute(array(":username" => $values['username']));
				
				if($stmt1->rowCount()){
					$resp = array("status" => 0, "username" => "Username is Already being used", "email" => "" );
					return $resp;	
				}else{
					$res2 = $stmt2->execute(array(":email" => $values['email']));
					
					if($stmt2->rowCount()){
						$resp = array("status" => 0, "email" => "Email is Already being used", "username" => ""  );
						return $resp;	
					}else{
						$resp = array("status" => 0, "username" => "Registeration Failed!  Please try again...");
					}
				}
			}
		}
	}


}