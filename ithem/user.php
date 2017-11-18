<?php
/*
*. Nothing yet
*/

//require_once "fx.php";
//$x = new user(1);

class user {
	public $sons;

	function __construct($userid,$db) {
		echo "init user<br>";
		//Initialize "controller"
		//$db = new db();
		
		//Get all the row of a user
		$query = $db->query("SELECT * from users WHERE id = $userid");
		$query = $query[0];

		//Slice the array in a new one without the password field, and keep keys instead of indexes
		foreach ( $query as $key => $value ) {
			if(!is_numeric($key) && $key!="password"){
		    	$this->sons[$key] = $value;
		    }
		}
	}

}

?>