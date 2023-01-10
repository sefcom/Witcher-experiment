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
$____key = 268309237 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 134154618;
/* Includes */
require_once "../classes/db2.class.php";
include_once '../classes/paginator.class.php';
/* Instantiate DB Class */
$db2 = new db2();
// get timezone for later
$db2->query("SELECT timeZone FROM settings");
$result = $db2->resultsetCols();
$timeZone = $result[0];
date_default_timezone_set($timeZone);
/* Get Row count from users where NOT deleted */
$db2->query('SELECT COUNT(*) AS total FROM users WHERE status = 1');
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
/* GET all nodes records from DB */
$db2->query("SELECT id, username, userlevel, email, timestamp FROM users WHERE status = 1 {$pages->limit}");
$resultSelect = $db2->resultset();
// push rows to $itesm array
$items = array();
foreach ($resultSelect as $row) {
    $____key = 43117358 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 21558679;
    array_push($items, $row);
}
$____key = 17025488 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 8512744;
/* Create Multidimensional array for use later */
$result["rows"] = $items;
$i = 0;
# row counter  to enable alternate row coloring
?>

<table id="userAddTbl" class="tableSimple">
    <thead>
    <th rowspan="2"><input type="checkbox" disabled="disabled"/></th>
    <th rowspan="2">Username</th>
    <th rowspan="2">E-mail</th>
    <th rowspan="2">User Level</th>
    <th rowspan="2">Last Login</th>
</thead>
<tbody>
    <?php 
foreach ($result['rows'] as $rows) {
    $____key = 105419752 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 52709876;
    $id = $rows['id'];
    /* This bit just updates the class='row' bit with an alternating 1 OR 0 for alternative row coloring */
    echo '<tr class="row' . $i++ % 2 . '">';
    ?>
    <td align="center"><input type="checkbox" name="tablecheckbox" id="<?php 
    echo $id;
    ?>"/></td>
    <td align="center"><strong><?php 
    echo $rows['username'];
    ?></strong></td>
    <td align="center"><?php 
    echo $rows['email'];
    ?></td>
    <td align="center">
        <?php 
    // quick check if userlevel =9 user is admin else, user is a User
    if ($rows['userlevel'] == 9) {
        $____key = 71090725 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 35545362;
        $userlevel = "Admin";
    } else {
        $____key = 124552251 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 62276125;
        $userlevel = "User";
    }
    $____key = 55059112 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 27529556;
    echo $userlevel;
    ?></td>
    <td align="center">
        <?php 
    // quick convert unix TimeStamp to normal times
    $lastLogin = date('H:i d-m-Y', $rows['timestamp']);
    echo $lastLogin;
    ?>
    </td>
    </tr>
<?php 
}
$____key = 15923913 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 7961956;
?>
</tbody>
</table>

<?php 
echo $pages->display_pages();
echo "<div class=\"spacer\"></div>";
echo "<p class=\"paginate\">Page: {$pages->current_page} of {$pages->num_pages}</p>\n";