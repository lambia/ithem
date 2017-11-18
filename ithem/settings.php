<?php
/*
 * NOW ************************************
 B. Check if keys exists
 * THEN ***********************************
 A. Add a yesorno function
 C. folder should be retrieved from THIS folder
 D. if not [C] use at least getcwd() to guess the folder, otherwise must be changed manually when debugging this file
 */

//require_once "fx.php";
//$x = new settings();
 
class settings {
    //Let's say these are "constants"
    public $name = "settings";
    public $settingsFile = "ithem/settings.ini"; //C //D
    //List of configurable stuff's names
    public $cfgKeys   = array("ithem"=> array("version","debug","url"),
                              "db"   => array("host","port","user","pass","db") );
    //Configuration variables
    public $version;
    public $debug;
    public $url;
    public $db = array("host"=>null,"port"=>null,"user"=>null,"pass"=>null,"db"=>null);

    function __construct() {
        echo "init settings<br>";
      if ( file_exists($this->settingsFile) ) {
        $settingsIni = parse_ini_file($this->settingsFile,true,INI_SCANNER_RAW);

        //Assign settings or the default values //B
        $this->version = $settingsIni["ithem"]["version"] ?: "0.2";
        $this->debug = $settingsIni["ithem"]["debug"] ?: 0;
        $this->url = $settingsIni["ithem"]["url"] ?: "http://localhost/";
        $this->db["host"] = $settingsIni["db"]["host"] ?: 'localhost';
        $this->db["port"] = $settingsIni["db"]["port"] ?: '3306';
        $this->db["user"] = $settingsIni["db"]["user"] ?: 'root';
        $this->db["pass"] = $settingsIni["db"]["pass"] ?: '';
        $this->db["db"]   = $settingsIni["db"]["db"]   ?: 'ithems';

        //Check roughly if everything is ok
        if( array_diff(array_keys($settingsIni),          array_keys($this->cfgKeys)) ||
            array_diff(array_keys($settingsIni["ithem"]), $this->cfgKeys["ithem"])    ||
            array_diff(array_keys($settingsIni["db"]),    $this->cfgKeys["db"])       ){
          warning("configuration file is shorter or longer than expected. Check it out.");
        }

      } else {
        error("there is no settings file");
      }

    }
    function __destruct() {
      print "<br>Destroying " . $this->name . "<br>";
    }
}


?>