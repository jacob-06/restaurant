<?php 

	class adminModel
		{
			public function login($email,$password)
				{
					$db = new Database();
					$sql = "SELECT * FROM admin WHERE Ad_email = '".$email."' && Ad_password = '".$password."'";
					return $db->queryOne($sql);
				}
			public function food()
				{
					$db = new Database();
					$sql = "SELECT * FROM meals";
					return $db->queryOne($sql);
				}
		}


?>