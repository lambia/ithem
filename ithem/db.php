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
 * A. testare con il resultset vuoto
 * B. sostituire i die con if(debug){die}else{log}. stilizzare errori.
 * C. testare meglio questo check
 * E. magari chiuderlo nella funzione query, ma poi viene passato il vuoto. testare con memUsage, ma pare che php si liberi da solo
 * 
 */

class db {
    public $mysqli;
    //public $result;
    
    function __construct() {
        $settings = new settings;
        $this->mysqli = new mysqli($settings->db["host"],
                                   $settings->db["user"],
                                   $settings->db["pass"],
                                   $settings->db["db"]);
        if ($this->mysqli->connect_errno) {
            die("Error: Connect failed.<br/>".$this->mysqli->connect_error."<br/>"); //B
            exit();
        }
    }
    
    function __destruct() {
        //if(is_object($this->result) && !$this->mysqli->connect_errno && !$this->mysqli->error) { //E
        //    $this->result->close(); //D
        //}
        if(is_object($this->mysqli) && !$this->mysqli->connect_errno && !$this->mysqli->error) { //C
            $this->mysqli->close();
        }
    }
    
    function query($query) {
        if ($query && $result = $this->mysqli->query($query)) {
            if ($result) {
                //$this->result = $result; //E
                //$result->close(); echo memory_get_usage() . "\n"; //E
                return $result;
            } else { return -1; }
        } else {
            die("Error: Wrong query syntax.<br/>".$this->mysqli->error."<br/>"); //B
            return -1;
        }
    }
    
    
}