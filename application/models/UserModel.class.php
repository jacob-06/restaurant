<?php 

	class UserModel
		{
			public function signup($name,$email,$password,$image,$adress,$phone,$zip)
				{
					$db = new Database();
					$sql = "INSERT INTO users (Name, Email, Password, Image, Adress, Phone, Zip) VALUES ('".$name."','".$email."','".$password."','".$image."','".$adress."','".$phone."','".$zip."')";
					return $db->executeSql($sql);
				}
			public function login($email,$password)
				{
					$db = new Database();
					$sql = "SELECT * FROM users WHERE Email = '".$email."' && Password = '".$password."'";
					return $db->queryOne($sql);
				}
		}

?>