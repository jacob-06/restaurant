<?php

/**
 * 
 */
class LogoutController
{
	
	public function HttpGetMethod(Http $http, array $queryFields){

		$session = new UserSession();

		$session->destrysession();

		$http->redirectTo('/');

	}
}