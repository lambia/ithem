<?
/*
 * Vendor:      lambia
 * Namespace:   ithem
 * Class:       settings
 * Version:     release-beta 0.1
 * Status:      sketch
 *
 * Author:      Lambia
 * Link:        lambia.it
 * Date:        06/10/2016
 *
 * @returns {string} $token - contiene la risposta in JSON
 *
 * ToDo List
 * 
 */
 
class settings {
    public $versione = "0.1";
    public $db = array("host"=>"localhost",
                       "port"=>"3306",
                       "user"=>"root",
                       "pass"=>"",
                       "db"=>"ithem_db");
    public $debug = false;
    public $url = "http://localhost/";

    function __construct() {
       //print "SONO VIVOOOO!\n";
    }
    function __destruct() {
       //print "Sto morendo, io.\n";
    }
}

?>