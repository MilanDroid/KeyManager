<?php

namespace App\Helpers;

class Helper {
   public function getPass($name, $permissions) {
		// Starting the permissions on true
		$response = true;

		//  Checking all the permissions id and comparing with the existents user permissions
		if(isset($_SESSION['userId']['permissions'][$name])){
			foreach ($permissions as $key => $value) {
				// To prevent notices or warnings first we'll check if the permission exists on user permissions
				if(isset($_SESSION['userId']['permissions'][$name][$key])){
					if( $permissions[$key] != $_SESSION['userId']['permissions'][$name][$key] && !in_array($_SESSION['userId']['permissions'][$name][$key], $permissions[$key])) {
						$response = false;
					}
				} else {
					$response = false;
				}
			}
		} else {
			$response = false;
		}
		
		return $response;
	}

	public function inputValidation($type, $string) {
		// Regex expressions
		$regex = array();

		// Here comes all the patterns used to check the strig structure
		$regex = [
			// Email, check if the string has the basic email structure user@domain. 
			// User no contains special characters
			'email' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
			// Password need to have at least one lower case and an upper case,
			// 1 number and be between 12-20 characters
			'password' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{12,20}$/',
			// Letters, just lower case and upper case letters
			'letters' => '/^[a-zA-Z]+$/',
			// Number, just numbers between 0-9
			'numbers' => '/^[0-9]+$/',
			// Numbers Letters, numbers between 0-9, lower and upper case
			'numbersLetters' => '/^[a-zA-Z0-9]+$/',
			// Date, string with the date format YYYY-MM-DD or DD-MM-YYYY
			'date' => '/^\d{4}-\d{2}-\d{2}|\d{2}-\d{2}-\d{4}$/'
		];
		
		return preg_match($regex[$type], $string);
	}
}