<?php
/*
 * if custom("wrong",..) OR user->query(".. FROM wrong...") -> error
 * page use page_id not id
 *
 * melt page and user
 * should be ithem(1,...)->page/user->db OR page/user->db
 * custom classes with custom db fields
 * custom classes can override default one
 *
 * recursive sons (menu ecc)
 *
 * improve templating
 * error handler -> template
 *
 * show/hide destructors by $settings->debug
 * keep in memory (settings and db)
 */

require_once "ithem/fx.php";
$db = new db();
$page = new page(0,$db);
$user = new user(1,$db);
$user2= new custom("users",1,$db,"password");

echo "<br><br>";
print_r( $page->sons );
echo "<br><br>";
print_r( $user->sons );
echo "<br><br>";
print_r( $user2->sons );

?>