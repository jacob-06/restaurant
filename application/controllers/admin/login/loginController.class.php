<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */

        $session = new AdminSession();

        var_dump($session->checksessionadmin());
        // return ['message' => ''];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
        $message = '';
        $password = md5($_POST['password']);
        $email = strtolower($_POST['email']);
        $usermodel = new adminModel();
        if ($usermodel->login($email,$password)) 
            {
                $username = $usermodel->login($email,$password);
                $user = new AdminSession();
                $user->newsessionadmin($email, $username['Ad_name']);
                // var_dump($username);
                $message = "done! welcome as a new user";
    
    			return  [ 'message' => $message ];
 			}
}
}