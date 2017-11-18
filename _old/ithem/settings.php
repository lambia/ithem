<?php
/*
 * A. Recuperare parametri durante il setup da un .ini e inserirli qui durante il setup
 */
 
class settings {
    public $versione = "0.1";
    public $db = array("host"=>"localhost",
                       "port"=>"3306",
                       "user"=>"root",
                       "pass"=>"",
                       "db"=>"ithem_db"); //A
    public $debug = false;
    public $url = "http://localhost/";

    function __construct() {
       //print "I'm alive!\n";
    }
    function __destruct() {
       //print "I'm cold. So cold.\n";
    }
}

?>