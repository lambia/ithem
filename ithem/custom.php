<?php
/*
*. Nothing yet
*/

//require_once "fx.php";
//$x = new user(1);

class custom {
	public $sons;

	function __construct($name,$id,$db,$avoid=null) {
		echo "init custom<br>";
		//Initialize "controller"
		//$db = new db();
		
		//Get all the row of a user
		$query = $db->query("SELECT * from $name WHERE id = $id");
		$query = $query[0];

		//Slice the array in a new one
		foreach ( $query as $key => $value ) {
			//Keep keys instead of indexes, skip the $avoid field
			if(!is_numeric($key) && $key!=$avoid){
		    	$this->sons[$key] = $value;
		    }
		}
	}

}

?>