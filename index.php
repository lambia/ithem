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
 * @returns {string} $token - contiene la risposta in JSON
 */

include "ithem/ithem.php";

$core = new ithem;
$core->init();
$core->format_retrieve(null,null,null,null);

?>