<?php

//require_once "fx.php";
//$x = new page(1);

class page {
	public $sons;
    public $name = "page";

	function __construct($db,$pageid) {
        if( isDebug() ) { echo "Init: $this->name<br>"; }
		//Initialize "controller"
		//$db = new db();

		//Get all the row of a page
		$query = $db->query("SELECT content from contents WHERE page = $pageid");

		//We just need a field, we'll keep numeric indexes instead of keys
		//$query = $query->fetchAll(PDO::FETCH_COLUMN, 0);

		//For future use, better slice the array in a new one instead of fetching
		foreach ( $query as $value ) {
			$this->sons[] = $value["content"];
		}
	}

	function __destruct() {
        if( isDebug() ) { echo "Destroy: $this->name<br>"; }
	}
}

?>