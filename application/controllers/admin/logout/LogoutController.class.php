<?php

/**
 * 
 */
class LogoutController
{
	
	public function HttpGetMethod(Http $http, array $queryFields){

		$session = new AdminSession();

		$session->destrysession();

		$http->redirectTo('/');

	}
}