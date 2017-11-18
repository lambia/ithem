<?php
/*
 * NOW ************************************
 *. htmlentities should not be done here
 * THEN ***********************************
 A. downgrade to ERRMODE_WARNING or silent should be done comparing with $settings->debug
 B. dbdriver should be also a setting
 C. persistent?
 E. use if-else with prepare
 *. memusage (see persistent(C))
 */

//require_once "fx.php";
//$x = new db();

class db {
    public $pdo;
    public $name = "database";
    
    function __construct() {
        if( isDebug() ) { echo "Init: $this->name<br>"; }
        $settings = new settings;
        try { //B
            $this->pdo = new PDO('mysql:host='.
                $settings->db["host"].
                ';port='.
                $settings->db["port"].
                ';dbname='.
                $settings->db["db"],
                $settings->db["user"],
                $settings->db["pass"],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true) //A+C
            );
        } catch (PDOException $e) {
            error( $e->getMessage() );
        }
    }
    
    function __destruct() {
        if( isDebug() ) { echo "Destroy: $this->name<br>"; }

        if($this->pdo) {
            $this->pdo = null;
        }
    }
    
    function query($query) {
        try {
            //$result = $this->pdo->prepare($query);
            //$result->execute();

            $result = $this->pdo->query($query);
            return $result->fetchAll();

            //->fetchAll(PDO::FETCH_COLUMN, 0);
            //->fetch(PDO::FETCH_ASSOC); //B

        } catch (PDOException  $e) {
            queryError($e);
        }
    }
}

?>