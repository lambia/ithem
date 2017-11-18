<?php
/*
 * recursive sons (menu ecc)
 * avoid should be an array
 *
 * improve templating
 * error handler -> template
 *
 * keep in memory (settings and db). tip: ithem is the beginning.
 *
 * user->query(".. FROM wrong...") => error
 * page use page_id not id
 * custom classes
 *
 * melt page and user
 * should be ithem(1,...)->page/user->db OR page/user->db
 *
 * debug: memusage, warning/error level, logs
 */

require_once "ithem/fx.php";
//$ithem = new ithem();

isDebug();

$db = new db();
//$page = new page($db,0);
//$content= new user($db,2,"ithems");

$user = new user($db,1,"users","password");
$user2= new user($db,2,"people");

echo "<br>";
//print_r( $page->sons );
//echo "<br>";
print_r( $user->sons );
echo "<br>";
print_r( $user2->sons );
//echo "<br>";
//print_r( $content->sons );
echo "<br>";
echo "<br>";

?>