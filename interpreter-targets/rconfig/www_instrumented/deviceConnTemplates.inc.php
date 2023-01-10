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
$____key = 264911780 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 132455890;
/* Includes */
require_once "../classes/db2.class.php";
include_once '../classes/paginator.class.php';
/* Instantiate DB Class */
$db2 = new db2();
/* Get Row count from vendors where NOT deleted */
$db2->query('SELECT COUNT(*)  AS total FROM templates WHERE status = 1 ');
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
echo "<div class=\"spacer\" style=\"padding-bottom:3px;\"></div>";
/* GET all vendor records from DB */
$db2->query("SELECT `id`, `fileName`, `name`, `desc`, dateAdded, dateLastEdit, addedby FROM templates WHERE status = 1 {$pages->limit}");
$queryResult = $db2->resultset();
// push rows to $items array
$items = array();
foreach ($queryResult as $row) {
    $____key = 189859227 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 94929613;
    array_push($items, $row);
}
$____key = 215725767 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 107862883;
/* Create Multidimensional array for use later */
$result["rows"] = $items;
$i = 0;
# row counter  to enable alternate row coloring
?>

<table id="templatesTbl" class="tableSimple">
    <thead>
    <th align="left">Template Filename</th>
    <th align="left">Template Name</th>
    <th align="left">Template Description</th>
    <th align="left">Date</th>
    <th align="left">Created  By</th>
</thead>
<tbody>
    <?php 
/* do a foreach on the $result['rows'] array */
foreach ($result['rows'] as $rows) {
    $____key = 77085879 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 38542939;
    $id = $rows['id'];
    /* This bit just updates the class='row' bit with an alternating 1 OR 0 for alternative row coloring */
    echo '<tr  id="' . $id . '" class="row' . $i++ % 2 . '">';
    // check fr which date is most recent
    if (!empty($rows['dateLastEdit']) && $rows['dateLastEdit'] > $rows['dateAdded']) {
        $____key = 98088611 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 49044305;
        $date = $rows['dateLastEdit'];
    } else {
        $____key = 153807024 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 76903512;
        $date = $rows['dateAdded'];
    }
    $____key = 55137704 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 27568852;
    ?>
    <td><a href="javascript:void(0);" onclick="editTemplate(<?php 
    echo $id;
    ?>);"><?php 
    echo $rows['fileName'];
    ?></a></td>
    <td ><?php 
    echo $rows['name'];
    ?></td>
    <td ><?php 
    echo $rows['desc'];
    ?></td>
    <td ><?php 
    echo $rows['dateAdded'];
    ?></td>
    <td ><?php 
    echo $rows['addedby'];
    ?></td>
    </tr>
<?php 
}
$____key = 124547737 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 62273868;
?>
</tbody>
</table>

<?php 
echo $pages->display_pages();
echo "<div class=\"spacer\"></div>";
echo "<p class=\"paginate\">Page: {$pages->current_page} of {$pages->num_pages}</p>\n";