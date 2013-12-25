<?php

class Resetuser_Model extends Model {

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

	public function resetUser($data){
		
		$cipher = new Cipher(KEY);
		$encryptpass = $cipher->encrypt($this->randomString());

		$searchUser = "SELECT * FROM details WHERE email = :email";
		$resetPass = "REPLACE INTO reset_user (token, user) VALUES (:token, :user)";
		
		$stmt = $this->db->prepare($searchUser);
		$stmt->execute(array(":email" => $data['email']));
		$count = $stmt->rowCount();

		if($count > 0){
			$stmt = $this->db->prepare($resetPass);
			$value = array(":token" => $encryptpass ,":user" => $data['email']);
			$res = $stmt->execute($value);
			if($res){
				$value['status'] = 1;
				return $value;
			}else{
				$value['status'] = 0;
				return $value;
			}
		}else{
			$value['status'] = 0;
			return $value;
		}
	}

	public function getResetToken($data){
		$query = "SELECT * FROM reset_user WHERE user = :user AND token = :token ";
		$stmt = $this->db->prepare($query);
		$res = $stmt->execute(array(":user" => $data['user'], ":token" => $data['token']));	
		if($stmt->rowCount() > 0){
			$resp = array("status" => 1,"user" => $data['user'], "token" => $data['token']);
			return $resp;
		}else{
			$resp = array("status" => 0,"user" => $data['user'], "token" => $data['token']);

			return $resp;
		}
	}

	public function setUserPass($data){

		$cipher = new Cipher(KEY);
		

		$getuser = "SELECT * FROM reset_user WHERE token = :token";
		$setPass = "UPDATE details SET password = :password WHERE email = :email";
		$stmt1 = $this->db->prepare($getuser);
		
		$stmt1->execute(array(":token" => $data['token']));
		if($stmt1->rowCount() > 0){

			$rows = $stmt1->fetchAll();
			$id = $rows[0]['user'];
			$encryptpass = $cipher->encrypt($data['password']);

			$stmt2 = $this->db->prepare($setPass);
			$res = $stmt2->execute(array(":password" => $encryptpass, ":email" => $id));
			
			if($res){
				$resp = array('status' => 1);
				return $resp;
			}else{
				$resp = array('status' => 0);
				return $resp;
			}
		}else{
			$resp = array('status' => 0);
			return $resp;
		}
	}

}