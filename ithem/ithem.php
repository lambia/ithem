<?php

//require_once "ithem/fx.php";
//$x = new ithem();

class ithem {
	public $name = "core";
	public $db;
	public $user;
	public $page;
	public $user2;

	function __construct($page=null, $user=null) {
        if( isDebug() ) { echo "Init: $this->name<br>"; }
		$this->db = new db;
		if($page!==null) {
			$this->page($page);
			if($user!==null) {
				$this->user($user);
			}
		}
	}

	function __destruct() {
        if( isDebug() ) { echo "Destroy: $this->name<br>"; }
	}

	function page($id) {
		$this->page = new page($this->db,$id);
		return $this->page;
	}

	function user($id, $avoid=null) {
		$this->user = new user($this->db, $id, "users", $avoid);
		return $this->user;
	}

	function custom($name, $id, $avoid=null) {
		$this->user2= new user($this->db, $id, $name, $avoid);
		return $this->user2;

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
