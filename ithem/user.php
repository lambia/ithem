<?php
/*
*. Nothing yet
*/

//require_once "fx.php";
//$x = new user(1);

class user {
	public $sons;
    public $name = "user";

	function __construct($db,$userid,$name,$avoid=null) {
        if( isDebug() ) { echo "Init: $this->name<br>"; }
		//Initialize "controller"
		//$db = new db();
		
		//Get all the row of a user
		$query = $db->query("SELECT * from $name WHERE id = $userid");
		$query = $query[0];

		//Slice the array in a new one
		foreach ( $query as $key => $value ) {
			//Keep keys instead of indexes, skip the $avoid field
			if(!is_numeric($key) && $key!=$avoid){
		    	$this->sons[$key] = $value;
		    }
		}
	}

	function __destruct() {
        if( isDebug() ) { echo "Destroy: $this->name<br>"; }
	}

}

?>