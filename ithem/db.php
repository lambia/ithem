<?
/*
 * Vendor:      lambia
 * Namespace:   ithem
 * Class:       db
 * Version:     release-beta 0.1
 * Status:      sketch
 *
 * Author:      Lambia
 * Link:        lambia.it
 * Date:        06/10/2016
 *
 * @returns {string} $risultato - commento
 *
 * ToDo List
 * A. prendere parametri da file .ini o da settings
 * B. sostituire i die con if(debug){die}else{log}
 * C. && checkare se ancora attiva
 * D. magari chiuderlo nella funzione query
 * 
 */

class db {
    public $mysqli;
    public $result;
    
    function __construct() {
        $settings = new settings();
        $this->mysqli = new mysqli($settings->db["host"],
                                   $settings->db["user"],
                                   $settings->db["pass"],
                                   $settings->db["db"]); //A
        if ($this->mysqli->connect_errno) {
            die("Connect failed: ".$this->mysqli->connect_error."<br/>"); //B
            exit();
        }
    }
    
    function __destruct() {
        if(is_object($this->result)) {
            $this->result->close(); //D
        }
        if(is_object($this->mysqli)) { //C
            $this->mysqli->close();
        }
    }
    
    function query($query) {
        /* Select @return resultset */
        if ($query && $result = $this->mysqli->query($query)) {
            $this->result = $result;
            return 1;
        } else {
            die($this->mysqli->error."<br/>"); //B
            return -1;
        }
    }
    
    
}