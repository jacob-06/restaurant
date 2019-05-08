<?php  

	class AdminSession
		{
			public function __construct()
				{
					if (empty($_SESSION)) 
						{
							session_start();
						}
				}
			public function destrysession()
				{
					if (!empty($_SESSION['admin'])) 
					{
						session_destroy();
					}
				}
			public function newsessionadmin($email,$name)
				{
					$_SESSION['admin']['email']= $email;
					$_SESSION['admin']['name']= $name;

					return true;
				}

				public function checksessionadmin()
				{
					if (!empty($_SESSION['admin'])) 
					{
						return true;
					}
					return false;
				}
		}

?>