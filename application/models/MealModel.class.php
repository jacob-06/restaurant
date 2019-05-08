<?php 

	class MealModel
		{
			public function listAll()
				{
					$db = new Database();
					$sql = 'SELECT * FROM Meal';
					return $db->query($sql);
				}


			public function listOne($id)
				{
					$db = new Database();
					$sql = "SELECT * FROM Meal WHERE id = '".$id."'";
					return $db->queryOne($sql);
				}
			public function user($email)
				{
					$db = new Database();
					$sql = "SELECT * FROM users WHERE Email = '".$email."'";
					return $db->queryOne($sql);
				}
			
		}

?>