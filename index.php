<?
/*
 * Vendor:      lambia
 * Namespace:   ithem
 * Class:       index (core)
 * Version:     release-beta 0.1
 * Status:      sketch
 *
 * Author:      Lambia
 * Link:        lambia.it
 * Date:        06/10/2016
 *
 * ToDo:        core->format has to return the string (not echo)
 * ToDo:        core->format has to accept $tabulation argument
 * ToDo:        core->format and get_list has to accept less parameters
 * ToDo:        in db -1 = 0 and 0 = 1
 *
 */

require_once "ithem/ithem.php";
$core = new ithem($_SERVER['PHP_SELF']);

echo "<html>\n\t<head>\n\t\t<title>".$core->page["value"]."</title>\n\t</head>\n";
echo "\t<body>\n";
$core->format(null,null,"men",null,null);
$core->format(null,null,"img",null,null);
echo"\t</body>\n</html>";
//$core->format(null,"fields","type","rel","order");
//$core->format(null,null,null,null,null);
//$core->format(null,null,"men",null,null);

?>