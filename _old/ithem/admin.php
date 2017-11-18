<?php
/*
 * ToDo:        login
 * ToDo:        read/write db
 * ToDo:        in db insert elements with *type=head* elements (script, meta and so on)
 * ToDo:        insert filters for get_list within loop (es: limit)
 *
 */

require_once "ithem.php";
$core = new ithem($_SERVER['PHP_SELF']);

$list = $core->get_list(null, null, null, "*", "rel ASC");

echo "<input type='text' maxlength='4' size='4' style='text-align:center;' value='id' />\n<input type='text' value='name' />\n<input type='text' value='value' />\n<select>\n\t<option selected value='type'>type</option>";
$types = array_unique(array_column($list, 'type'));
                          
foreach($types as $type) {
    echo "\t<option value='$type'>".$type."</option>\n";
}

echo "</select>\n<select>\n\t<option selected value='rel'>rel</option>";

$rels = array_unique(array_column($list, 'rel'));
foreach($rels as $rel) {
    echo "\t<option value='$rel'>".$rel."</option>\n";
}
echo "</select>\n<select>\n\t<option selected value='children'>child</option>";

$children = array_unique(array_column($list, 'children'));
foreach($children as $child) {
    echo "\t<option value='$child'>".$child."</option>\n";
}
echo "</select>\n<br/>\n\n";

foreach ($list as $item) {
    
echo "<input type='text' disabled maxlength='4' size='4' style='text-align:center;' value='".$item['id']."' />\n<input type='text' value='".$item['name']."' />\n<input type='text' value='".$item['value']."' />\n<select>\n\t<option selected value='type' disabled>type</option>\n";
    
$types = array_unique(array_column($list, 'type'));
                          
foreach($types as $type) {
    echo "\t<option value='$type'";
    if($type == $item['type']) {
        echo "selected='selected'";
    }
    echo ">".$type."</option>\n";
}
    
echo "</select>\n<select>\n\t<option selected value='rel' disabled>rel</option>";

$rels = array_unique(array_column($list, 'rel'));
foreach($rels as $rel) {
    echo "\t<option value='$rel'";
    if($rel == $item['rel']) {
        echo "selected='selected'";
    }
    echo ">".$rel."</option>\n";
}
echo "</select>\n<select>\n\t<option selected value='children' disabled>child</option>";

$children = array_unique(array_column($list, 'children'));
foreach($children as $child) {
    echo "\t<option value='$child'";
    if($child == $item['children']) {
        echo "selected='selected'";
    }
    echo ">".$child."</option>\n";
}
echo "</select>\n<br/>\n\n";
}
?>