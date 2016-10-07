<?
/*
 * Vendor:      lambia
 * Class:       ithem (core)
 * Version:     Release: beta 0.1
 * Status:      sketch
 *
 * Author:      Lambia
 * Link:        lambia.it
 * Date:        06/10/2016
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
    
    function __construct() {
       $this->db = new db(); //B
    }
    
    /*
     * Get the list of items in DB
     *
     * @param   {int/nll}   $limit  Get {n} fields of this type in this order
     * @param   {str/nll}   $campi  Get n {fields} of this type in this order
     * @param   {str/nll}   $type   Get n fields of this {type} in this order
     * @param   {str/nll}   $order  Get n fields of this type in this {order}
     *
     * @return  {arr}       $array  Bidimensional array with the list
     */ 
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
    
    /*
     * Echoes formatted contents, provided in 2D-array or got via query.
     * It's a Variadic Function (emulate C-like overloading), so accepts 1 or 4 arguments
     * @todo    {return}    $array  Instead of echoing everything
     * @todo    {throw}     $array  Instead of returning
     *
     * @param   {arr}       $array  Bidimensional array with the list
     *
     * @param   {int/nll}   $limit  Get {n} fields of this type in this order
     * @param   {str/nll}   $campi  Get n {fields} of this type in this order
     * @param   {str/nll}   $type   Get n fields of this {type} in this order
     * @param   {str/nll}   $order  Get n fields of this type in this {order}
     *
     * @return  {nll/int}           Code error (-1) or null
     *
     */
    function format() {
        if(1==func_num_args()) {
            $array = func_get_arg(0);
        } else if (4==func_num_args()) {
            $array = $this->get_list(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
        } else {
            //throw new Exception("Fatal error: ithem/format only accepts 1 or 4 arguments. Provided {".func_num_args()."}");
            return -1;
        }
        
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
        return null;
    }
}
?>