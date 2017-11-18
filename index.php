<?php
/*
 * recursive sons (menu ecc)
 *
 * improve templating
 * error handler -> template
 *
 * keep in memory (settings and db). tip: ithem is the beginning.
 *
 * if custom("wrong",..) OR user->query(".. FROM wrong...") -> error
 * page use page_id not id
 *
 * melt page and user
 * should be ithem(1,...)->page/user->db OR page/user->db
 *
 * debug: memusage, warning/error level, logs
 */

require_once "ithem/fx.php";
//$ithem = new ithem();

isDebug(true);

$db = new db();
$page = new page($db,0);
$user = new user($db,1,"users","password");
$user2= new user($db,2,"people","");

echo "<br>";
print_r( $page->sons );
echo "<br>";
print_r( $user->sons );
echo "<br>";
print_r( $user2->sons );
echo "<br>";
echo "<br>";

?>