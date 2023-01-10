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
$____key = 247861635 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 123930817;
/* Includes */
require_once "../classes/db2.class.php";
include_once '../classes/paginator.class.php';
/* Instantiate DB Class */
// $db = new db(); -> not calling this here because it's already called in the /scheduler.php master file
/* Get Row count from tasks where NOT deleted */
$db2->query('SELECT COUNT(*) AS total FROM tasks WHERE status = 1');
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
/* GET all tasks records from DB */
$db2->query("SELECT * FROM tasks WHERE status = 1 ORDER BY id ASC {$pages->limit}");
$taskRes = $db2->resultset();
// push rows to $items array
unset($db2);
// need to close DB connection cause interferes with chooseCatDiv function call and throws errors
$items = array();
foreach ($taskRes as $row) {
    $____key = 204702315 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 102351157;
    array_push($items, $row);
}
$____key = 158185906 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 79092953;
/* Create Multidimensional array for use later */
$result["rows"] = $items;
$i = 0;
# row counter  to enable alternate row coloring
?>

<table id="taskTbl" class="tableSimple">
    <thead>
    <th><input type="checkbox" disabled="disabled"/></th>
    <th align="left" style="width:60px">Task ID</th>
    <th align="left">Task Name</th>
    <th align="left">Task Description</th>
    <th align="left">Created</th>
</thead>
<tbody>
    <?php 
/* do a foreach on the $result['rows'] array */
foreach ($result['rows'] as $rows) {
    $____key = 52662275 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 26331137;
    $id = $rows['id'];
    /* This bit just updates the class='row' bit with an alternating 1 OR 0 for alternative row coloring */
    echo '<tr class="row' . $i++ % 2 . '">';
    ?>
    <td align="center"><input type="checkbox" name="tablecheckbox" id="<?php 
    echo $id;
    ?>"/></td>
    <td align="left"><?php 
    echo $rows['id'];
    ?></td>
    <td align="left"><?php 
    echo $rows['taskname'];
    ?></td>
    <td align="left"><?php 
    echo $rows['taskDescription'];
    ?></td>
    <td align="left"><?php 
    echo $rows['dateAdded'];
    ?></td>
    </tr>
<?php 
}
$____key = 71390344 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 35695172;
?>
</tbody>
</table>

<?php 
echo "<div class=\"spacer\"></div>";
echo $pages->display_pages();
echo "<div class=\"spacer\"></div>";
echo "<p class=\"paginate\">Page: {$pages->current_page} of {$pages->num_pages}</p>\n";