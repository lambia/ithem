<?php
/*
 * Error and warning should forward to the template error page, passing the string via post
 * Add a yesorno function
 * Die should be retrieved via $settings->debug
 * Log error (and relative $settings)
 */

$debug=false;

function __autoload($class_name) {
    include $class_name . '.php';
}

function error($string, $die=null) {
	echo "<br>Error: " . $string . "<br>";
	if($die) { echo"die"; die(); }
}

function warning($string) {
	echo "<br>Warning: " . $string . "<br>";
}

function queryError($string, $die=null) { 
    //echo 'Connection failed:<br>' . $e->getMessage() ."<br><br>";
    echo "<br>Database error (State: ".
    $this->pdo->errorInfo()[0].
    " - Error: ".
    $this->pdo->errorInfo()[1].
    "): <br>".
    $this->pdo->errorInfo()[2];
	if($die) { echo"die"; die(); }
}

function isDebug($value=null) {
    global $debug;

    //If the argument is provided, set the value
    if($value) {
        $debug = $value;
    }

    //Get the current value
    return $debug;
}

?>