<?php  

	class orderModel
		{
			public function order($uname,$oname,$oprice,$oqte,$otprice)
				{
					$db = new Database();
					$sql = "INSERT INTO orders (Client, O_name, O_price, O_qte, O_tprice) VALUES ('".$uname."','".$oname."','".$oprice."','".$oqte."','".$otprice."')";
					return $db->executeSql($sql);
				}
			public function clear($uname)
				{
					$db = new Database();
					$sql = "DELETE FROM panier WHERE user_name = '".$uname."'";
					return $db->executeSql($sql);
				}
		}

?>