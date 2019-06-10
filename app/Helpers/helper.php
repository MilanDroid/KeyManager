<?php

namespace App\Helpers;

class Helper {
   public function getPass($permissions){
		$response = true;
	
		foreach ($permissions as $key => $value) {
			if(isset($_SESSION['userId']['userData'][$key]) && $permissions[$key] != $_SESSION['userId']['userData'][$key]){
				$response = false;
			}
		}
	
		return $response;
	}
}