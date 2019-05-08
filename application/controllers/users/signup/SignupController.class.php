<?php

class SignupController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    
        return ['message' => '','_form' => new SignupForm()];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
        $type = $formFields['checkup'];

        if( $type == 'login' ){
            $message = '';
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $usermodel = new UserModel();
            // var_dump($usermodel->login($email,$password));
            if ($usermodel->login($email,$password)) 
                {
                    $username = $usermodel->login($email,$password);
                    $user = new UserSession();
                    $user->newsession($email, $username['Name']);
                    $message = "done! welcome as a new user";
                }
        }else{
            $name = strtolower($formFields['name']);
        $email = strtolower($formFields['email']);
        $password = md5($formFields['password']);
        $phone = md5($formFields['phone']);
        $adress = strtolower($formFields['adress']);
        $zip = md5($formFields['zip']);
        if($http->hasUploadedFile('image') == true){
            $image = $http->moveUploadedFile('image', '/images/users');
        }

        $usermodel = new UserModel();
        if ($usermodel->signup($name,$email,$password,$image,$adress,$phone,$zip)) 
            {
                $message = "done! welcome as a new user";
            }
        }
        
        return  [ 'message' => $message ];
    }
}