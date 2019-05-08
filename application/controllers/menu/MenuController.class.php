<?php

class MenuController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */

        $session = new UserSession();
        $verify = $session->checksession();

        if($verify){
            $email = $_SESSION['user']['email'];
        }else{
            $email = '';
        }
        
        // var_dump($_SESSION);

        $meal = new MealModel();
        $meals = $meal->listAll();
        $user = new MealModel();
        $users = $user->user($email);
        return ['meal' => $meals, 'user' => $users, 'verify' => $verify];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}