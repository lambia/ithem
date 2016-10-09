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
 * D. variadic - if not campi, campi = *
 * E. prevedere i children (title alt)
 * G. se il campo "type" è presente, prevedere anche overload F2
 * I. $classes = explode(" ",$array[$c]['type']); 
 * I. foreach or in_array 
 * J. to replace select* in future
 * K. formattare meglio il testo
 * L. formattare tutto con stringhe prese da settings
 * M. men-link=lnk
 *    apici in php, doppi apici in html
 *    core->format has to return the string (not echo)
 *    core->format has to accept $tabulation argument
 *    core->format and get_list has to accept less parameters
 * N. rel come prima: va impostato a 0 come argomento, altrimenti se null funziona da *
 */

require_once "functions.php";

class ithem {
    public $sql2 = "INSERT INTO ithems (name,value,children) VALUES ('OOP','query',1)"; //A
    public $db;
    public $page;
    
    function __construct($filename) {
        $this->db = new db; //B
        if(count($this->get_list(1, basename($filename,".php"), "page", "-1", null))) {
            $this->page = $this->get_list(1, basename($filename,".php"), "page", "-1", null)[0];
        }
    }
    
    /*
     * Get the list of items in DB
     *
     * @param   {int/nll}   $limit  Get {n} of type, x-related in order, with name
     * @param   {str/nll}   $name   Get n of type, x-related in order, with {name}
     * @param   {str/nll}   $type   Get n of {type}, x-related in order, with name
     * @param   {str/nll}   $rel    Get n of type, {x}-related in order, with name
     * @param   {int/nll}   $order  Get n of type, x-related in {order}, with name
     *
     * @return  {arr}       $array  Bidimensional array with the list
     */ 
    function get_list($limit, $name, $type, $rel, $order) { //D
        $fields = null; //J
        if(!$rel) { $rel = 0; } //N
        else if($rel=="*") { $rel=null; }
        
        $sql = "SELECT ".
            (is_string($fields) ? "('".$fields."')" : "*").
            " FROM ithems".
            ((is_string($type)||is_numeric($rel)||is_string($fields)) ? " WHERE (" : "").
            (is_string($type) ? "type='".$type."'" : "").
            ((is_string($type)&&(is_numeric($rel)||is_string($fields))) ? " AND " : "").
            (is_numeric($rel) ? "rel=".$rel : "").
            ((is_string($type)&&is_numeric($rel)&&is_string($name)) ? " AND " : "").
            (is_string($name) ? "name='".$name."'" : "").
            
            ((is_string($type)||is_numeric($rel)) ? ")" : "").
            (is_numeric($limit) ? " LIMIT ".$limit : "").
            (is_string($order) ? " ORDER BY ".$order : "");
        
        if($this->db) { //B-?
            $result = $this->db->query($sql);
            if(is_object($result)) {
                $items = array();
                $c = 0;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $items[] = $row;
                        $c++;
                    }
                }
                return $items;
            } else { /* //C */ }
        }
    }
    
    function set_list() {
        
    }
    
    /*
     * Echoes formatted contents, provided in 2D-array or got via query.
     * It's a Variadic Function (emulate C-like overloading), so accepts 1 or 4 arguments
     * @todo    {return}    $array  Instead of echoing everything
     * @todo    {throw}     $array  Instead of returning
     *
     * @param   {arr}       $array  Bidimensional array with the list
     *
     * @param   {int/nll}   $limit  Get {n} fields of type, x-related in order
     * @param   {str/nll}   $fields Get n {fields} of type, x-related in order
     * @param   {str/nll}   $type   Get n fields of {type}, x-related in order
     * @param   {int/nll}   $rel    Get n fields of type, {x}-related in order
     * @param   {str/nll}   $order  Get n fields of type, x-related in {order}
     *
     * @return  {nll/int}           Code error (-1) or null
     *
     */
    function format() {
        if(1==func_num_args()) {
            $array = func_get_arg(0);
        } else if (5==func_num_args()) {
            $array = $this->get_list(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
        } else {
            //throw new Exception("Fatal error: ithem/format only accepts 1 or 4 arguments. Provided {".func_num_args()."}");
            return -1;
        }
        
        $c = 0;
        while ($c < count($array)) {
            if(0==$array[$c]['rel']) {              //Top level items processor //L
                if("img"==$array[$c]['type']) { //G
                    echo "<img src='".$array[$c]['value']."' alt='".$array[$c]['name']."' title='".$array[$c]['name']."' id='img".$array[$c]['id']."' />\n"; //I
                } else if("txt"==$array[$c]['type']) { //K
                    echo $array[$c]['value']."\n";
                } else if("lnk"==$array[$c]['type']) {              //M
                    echo "<a href='".$array[$c]['value']."' id='link".$array[$c]['id']."'>".$array[$c]['name']."</a>\n";
                } else if ("js"==$array[$c]['type']) {
                    echo "<script src='".$array[$c]['value']."'></script>\n";
                } else if ("men"==$array[$c]['type'] && is_numeric($array[$c]['rel'])) {
                    echo "<ul id='".$array[$c]['type'].$array[$c]['id']."' class='".$array[$c]['type']."'>\n";
                    $this->format(null,null,null,$array[$c]['id'],null);
                    echo "</ul>\n";
                }
            } else if (0<$array[$c]['rel']) {       //Child items //I
                if( "men-lnk"==$array[$c]['type'] ) {               //M
                    echo "<li>";
                    echo "<a href='".$array[$c]['value']."' id='link".$array[$c]['id']."'>".$array[$c]['name']."</a>";
                    echo "</li>\n";
                }
            }
            $c++;
        }
        return null;
    }
}
?>