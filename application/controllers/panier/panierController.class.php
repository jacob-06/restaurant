<?php  

	/**
	 * 
	 */
	class PanierController 
		{
			
			public function httpGetMethod(Http $http, array $queryFields)
			    {
			    	/*
			    	 * Méthode appelée en cas de requête HTTP GET
			    	 *
			    	 * L'argument $http est un objet permettant de faire des redirections etc.
			    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
			    	 */
					$pan = new PanierModel();
        	$panier = $pan->showpanier();
        	return ['key' => $panier];
			    $user = new UserSession();
					$var = $user->sessionshow();
					$uname = $_SESSION['user']['email'];
					$name = $_POST['name'];
					$qte = $_POST['qte'];
					$price = $_POST['price'];
					$result = $_POST['result'];
					$paniermodel = new PanierModel();
					$paniermodel->panier($uname,$name,$qte,$price,$result);
					return [ 'message' => 'Ok' ];
			    }

			public function httpPostMethod(Http $http, array $formFields)
			    {
			    	/*
			    	 * Méthode appelée en cas de requête HTTP POST
			    	 *
			    	 * L'argument $http est un objet permettant de faire des redirections etc.
			    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
			    	 */
			    	// $http->sendJsonResponse($formFields);
			    	// var_dump($formFields);
			    $user = new UserSession();
					$var = $user->sessionshow();
					$uname = $_SESSION['user']['email'];
					$name = $_POST['name'];
					$qte = $_POST['qte'];
					$price = $_POST['price'];
					$result = $_POST['result'];
					$paniermodel = new PanierModel();
					// $pan = new PanierModel();
        	$panier = $paniermodel->showpanier();
					if($paniermodel->panier($uname,$name,$qte,$price,$result)){
					var_dump($paniermodel);
					return [ 'message' => 'Ok', 'key' => $panier ];
					}
			    }
		}

?>