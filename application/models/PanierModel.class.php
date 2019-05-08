<?php  

	class PanierModel
		{
			public function panier($uname,$name,$qte,$price,$result)
				{
					$db = new Database();
					$sql = "INSERT INTO panier (user_name, order_name, order_qte, order_price, order_tprice) VALUES ('".$uname."','".$name."','".$qte."','".$price."','".$result."')";
					return $db->executeSql($sql);
				}
			public function showpanier()
				{
					$db = new Database();
					$sql = "SELECT * FROM panier";
					return $db->query($sql);
				}
		}

?>
