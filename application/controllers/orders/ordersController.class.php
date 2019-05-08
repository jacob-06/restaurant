<?php

class ordersController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
        $stck = $_POST['stck'];
        $qte = $_POST['qte'];
        $price = $_POST['price'];
        $name = $_POST['name'];
        $result = $_POST['result'];

        $meal = new MealModel();

        $meals = $meal->listOne($id);

        return [ 'meals' => $meals ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
        $user = new UserSession();
        $var = $user->sessionshow();
        // $uname = $_SESSION['user']['email'];
        $uname = $_POST['uname'];
        $oname = $_POST['oname'];
        $oprice = $_POST['oprice'];
        $oqte = $_POST['oqte'];
        $otprice = $_POST['otprice'];
        $paniermodel = new orderModel();

        // return ['message' => $otprice[0]];
        for($i = 0; $i<count($uname); $i++){

            $name = $uname[$i];

            $on = $oname[$i];

            $op = $oprice[$i];

            $oq = $oqte[$i];

            $otp = $otprice[$i];

           if($paniermodel->order($name,$on,$op,$oq,$otp)){
            // var_dump($paniermodel->order($name,$on,$op,$oq,$otp));
            // return [ 'message' => 'Ok' ];
            // echo 'ok';
            } 
        }
        $paniermodel->clear($name);
        
    }
}