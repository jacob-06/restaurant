<?php  

	class UserSession
		{
			public function __construct()
				{
					if (empty($_SESSION)) 
						{
							session_start();
						}
				}
				
			public function newsession($email,$name)
				{
					$_SESSION['user']['email']= $email;
					$_SESSION['user']['name']= $name;
				}
			public function sessionshow()
				{
					return $_SESSION['user'];
				}
			public function checksession()
				{
					if (!empty($_SESSION['user'])) 
					{
						return true;
					}
					return false;
				}
			public function destrysession()
				{
					if (!empty($_SESSION['user'])) 
					{
						session_destroy();
					}
				}
		}

?>