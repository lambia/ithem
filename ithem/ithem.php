<?php

//require_once "ithem/fx.php";
//$x = new ithem();

class ithem {
	public $name = "core";
	public $db;
	//public $user;
	//public $page;

	function __construct() {
		echo "init ithem<br>";
		$this->db = new db;
	}

	function __destruct() {
		print "<br>Destroying " . $this->name;
	}

	function query($query) {
		/*foreach ( $this->db->query("SELECT * from ithems") as $res ) {
		    print_r( $res );
		    echo "<br>";
		    echo "<br>";
		}*/
		return $this->db->query($query)->fetchAll();
	}

}

?>
