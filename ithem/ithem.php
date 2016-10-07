<?
/*
 * Vendor:      lambia
 * Namespace:   ithem
 * Class:       ithem (core)
 * Version:     release-beta 0.1
 * Status:      sketch
 *
 * Author:      Lambia
 * Link:        lambia.it
 * Date:        06/10/2016
 *
 * @returns {string} $token - contiene la risposta in JSON
 *
 * ToDo list
 * .. Usare namespace?
 * A. Creare admin panel
 * B. Iffare?
 * C. return che poi serve per "Non ci sono contenuti"
 * D. overload - if not campi, campi = *
 * E. prevedere i children (title alt)
 * F. overload
 * G. se il campo "type" è presente, prevedere anche overload F2
 * H. separare style strings
 */

include "functions.php";

class ithem {
    public $sql2 = "INSERT INTO ithems (name,value,children) VALUES ('OOP','query',1)"; //A
    public $db;
    
    function init() {
        $this->db = new db(); //B
    }
    
    function get_list($limit, $campi, $type, $order) { //D
        $sql = "SELECT ".(is_string($campi) ? "(".$campi.")" : "*")." FROM ithems".(is_string($type) ? " WHERE (type='".$type."')" : "").(is_numeric($limit) ? " LIMIT ".$limit : "").(is_string($order) ? " ORDER BY ".$order : "");
                
        if($this->db) { //B-?
            $this->db->query($sql);
            if(is_object($this->db->result)) {
                $items = array();
                $c = 0;
                if ($this->db->result->num_rows > 0) {
                    while($row = $this->db->result->fetch_assoc()) {
                        $items[] = $row;
                        $c++;
                    }
                }
                return $items;
            } else { /* //C */ }
        }
    }
    
    function format_array($array) { //F1
        $c = 0;
        while ($c < count($array)) {
            if("img"==$array[$c]['type']) { //G
                echo "<img src='".$array[$c]['value']."' alt='".$array[$c]['name']."' title='".$array[$c]['name']."' />";
            } else if("txt"==$array[$c]['type']) {
                echo $array[$c]['value'];
            } else if("lnk"==$array[$c]['type']) {
                echo "<a href='".$array[$c]['value']."'>".$array[$c]['name']."</a>";
            }
            $c++;
        }
    }
    
    function format_retrieve($limit, $campi, $type, $order) { //F2
        $array = $this->get_list($limit, $campi, $type, $order);
        $this->format_array($array);
    }
}

?>