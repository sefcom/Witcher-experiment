<?php

if (!array_key_exists("____instr", $GLOBALS)) {
    $GLOBALS["____instr"]["map"] = array();
    $GLOBALS["____instr"]["prev"] = 0;
    function ____instr_write_map()
    {
        $f = fopen("/var/instr/map." . (isset($_SERVER["HTTP_REQ_ID"]) ? $_SERVER["HTTP_REQ_ID"] : 0), "w+");
        foreach ($GLOBALS["____instr"]["map"] as $k => $v) {
            fwrite($f, $k . "-" . $v . "\n");
        }
        fclose($f);
    }
    register_shutdown_function("____instr_write_map");
}
$____key = 81107711 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 40553855;
/* Includes */
require_once '../classes/db2.class.php';
include_once '../classes/paginator.class.php';
/* Instantiate DB Class */
$db2 = new db2();
/* Get Row count from customProperties where NOT deleted */
$db2->query('SELECT COUNT(*) AS total FROM customProperties');
$row = $db2->resultsetCols();
$result["total"] = $row[0];
/* Instantiate Paginator Class */
$pages = new Paginator();
$pages->items_total = $result['total'];
$pages->mid_range = 7;
// Number of pages to display. Must be odd and > 3
$pages->paginate();
echo $pages->display_pages();
echo "<span class=\"\">" . $pages->display_jump_menu() . $pages->display_items_per_page() . "</span>";
echo "<div class=\"spacer\"></div>";
echo "<div class=\"spacer\" style=\"padding-bottom:3px;\"></div>";
/* GET all customProperties records from DB */
$db2->query("SELECT customProperty FROM customProperties {$pages->limit}");
$catRes = $db2->resultset();
// push rows to $itesm array
$items = array();
foreach ($catRes as $row) {
    $____key = 220222913 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 110111456;
    array_push($items, $row);
}
$____key = 87569830 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 43784915;
/* Create Multidimensional array for use later */
$result["rows"] = $items;
$i = 0;
# row counter  to enable alternate row coloring
?>

<table id="customPropTbl"  class="tableSimple">
    <thead>
    <th><input type="checkbox" disabled="disabled"/></th>
    <th align="left">Custom Property Name</th>
</thead>
<tbody>
    <?php 
/* do a foreach on the $result['rows'] array */
foreach ($result['rows'] as $rows) {
    $____key = 139363779 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 69681889;
    // next remove 'custom_' from returned data
    $customProperty = substr($rows['customProperty'], 7);
    /* This bit just updates the class='row' bit with an alternating 1 OR 0 for alternative row coloring */
    echo '<tr class="row' . $i++ % 2 . '">';
    ?>
    <td align="center"><input type="checkbox" name="tablecheckbox" id="<?php 
    echo $rows['customProperty'];
    ?>"/></td>
    <td align="left"><?php 
    echo $customProperty;
    ?></td>
    </tr>
<?php 
}
$____key = 40865007 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 20432503;
?>
</tbody>
</table>

<?php 
echo $pages->display_pages();
echo "<div class=\"spacer\"></div>";
echo "<p class=\"paginate\">Page: {$pages->current_page} of {$pages->num_pages}</p>\n";