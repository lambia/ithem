<?
/*
 * Vendor:      lambia
 * Namespace:   ithem
 * Class:       admin (core)
 * Version:     release-beta 0.1
 * Status:      sketch
 *
 * Author:      Lambia
 * Link:        lambia.it
 * Date:        06/10/2016
 *
 * ToDo:        login
 * ToDo:        read/write db
 * ToDo:        in db insert elements with *type=head* elements (script, meta and so on)
 * ToDo:        insert filters for get_list within loop (es: limit)
 *
 */

require_once "ithem.php";
$core = new ithem($_SERVER['PHP_SELF']);

$list = $core->get_list(null, null, null, "*", "rel ASC");

foreach ($list as $item) {
?>

<input type="text" disabled maxlength="4" size="4" style="text-align:center;" value="<?=$item['id']?>" />
<input type="text" value="<?=$item['name']?>" />
<input type="text" value="<?=$item['value']?>" />
<select>
    <option value=""><?=$item['type']?></option>
</select>
<select>
    <option value=""><?=$item['rel']?></option>
</select>
<select>
    <option value=""><?=$item['children']?></option>
</select>
<br/>

<?
}
?>