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
$____key = 90903643 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 45451821;
/* Includes */
require_once "../classes/db2.class.php";
include_once '../classes/paginator.class.php';
/* Instantiate DB Class */
$db2 = new db2();
/* Get Row count from compliancePolicies where NOT deleted */
$db2->query('SELECT COUNT(*) AS total FROM compliancePolicies WHERE status = 1');
$row = $db2->resultsetCols();
$result["total"] = $row[0];
/* Instantiate Paginator Class */
$pages = new Paginator();
$pages->items_total = $result['total'];
$pages->mid_range = 7;
// Number of pages to display. Must be odd and > 3
$pages->paginate();
?>
<!-- begin Search form -->
<div id="deviceActionDiv">
    <div id="searchForm"> 
        <legend>Search</legend>
        <form name ="searchForm" method="GET" action="compliancepolicies.php" onsubmit="return searchValidateForm()">
            <select name="searchColumn" id="searchColumn" class="paginate">
                <option value="policyName">Name</option>
            </select>
            <select name="searchOption" id="searchOption" class="paginate">
                <option value="contains" selected>Contains</option>
                <option value="notContains">Not Contains</option>
                <option value="equals">Equals</option>
            </select>
            <input type="text" id="searchField" name="searchField" placeholder="search text" class="paginate">
            <input type="hidden" id="search" value="search" name="search">
            <?php 
if (isset($errors['searchField'])) {
    $____key = 29643770 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 14821885;
    echo "<span class=\"error\">" . $errors['searchField'] . "</span>";
}
$____key = 267081718 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 133540859;
?>
            <br/>
            <button type="submit" class="paginate">Go!</button> <?php 
//search logic below in this script
?>
            <button onClick="clearSearch()" type="button" class="paginate">Clear Search</button>
            <br />
            <font size="0.3em">use '*' as a wildcard</font>
        </form>
    </div> <!-- end searchForm -->	
</div>
<div class="spacer"></div>
<?php 
echo $pages->display_pages();
echo "<span class=\"\">" . $pages->display_jump_menu() . $pages->display_items_per_page() . "</span>";
echo "<div class=\"spacer\" style=\"padding-bottom:3px;\"></div>";
/* Search functionality
  1. check if hidden search input is set (i.e. submit for search for was pressed)
  2. check all inputs and return errors if needed - to be done
  3. if search fields are complete, build the query with the search string, esle default query inc pagnation for use later
 */
if (isset($_GET['search'])) {
    $____key = 41308408 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 20654204;
    if (isset($_GET['searchColumn'])) {
        $____key = 126380298 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 63190149;
        $searchColumn = $_GET['searchColumn'];
    }
    $____key = 77629120 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 38814560;
    if (isset($_GET['searchOption'])) {
        $____key = 45875643 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 22937821;
        switch ($_GET['searchOption']) {
            case "contains":
                $____key = 37961044 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 18980522;
                $searchOption = "LIKE";
                break;
            case "equals":
                $____key = 74429368 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 37214684;
                $searchOption = "=";
                break;
            case "notContains":
                $____key = 163192618 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 81596309;
                $searchOption = "NOT LIKE";
                break;
        }
        $____key = 266186283 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 133093141;
    }
    $____key = 238065660 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 119032830;
    if (isset($_GET['searchField'])) {
        $____key = 242599104 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 121299552;
        $searchField = $_GET['searchField'];
        $searchField = str_replace("*", "%", $searchField);
        // swap * for % for SQL query
        if ($searchOption == "LIKE" || $searchOption == "NOT LIKE") {
            $____key = 43460659 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 21730329;
            $searchField = '%' . $searchField . '%';
        }
        $____key = 154386323 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 77193161;
    }
    $____key = 134077772 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 67038886;
    $db2->query("SELECT id, policyName, policyDesc FROM compliancePolicies WHERE status = 1 AND " . $searchColumn . " " . $searchOption . " '" . $searchField . "' {$pages->limit}");
    $resultQuery = $db2->resultset();
} else {
    $____key = 82116180 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 41058090;
    /* GET all records from DB */
    $db2->query("SELECT id, policyName,  policyDesc FROM compliancePolicies WHERE status = 1 {$pages->limit}");
    $resultQuery = $db2->resultset();
}
$____key = 245084208 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 122542104;
// push rows to $items array
$items = array();
foreach ($resultQuery as $row) {
    $____key = 38852486 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 19426243;
    array_push($items, $row);
}
$____key = 141409359 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 70704679;
/* Create Multidimensional array for use later */
$result["rows"] = $items;
$i = 0;
# row counter  to enable alternate row coloring
?>

<table id="policyTbl" class="tableSimple">
    <thead>
    <th><input type="checkbox" disabled="disabled"/></th>
    <th align="left">Name</th>
    <th align="left">Description</th>
</thead>
<tbody>
    <?php 
foreach ($result['rows'] as $rows) {
    $____key = 188975382 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 94487691;
    $id = $rows['id'];
    $policyName = $rows['policyName'];
    $policyDesc = $rows['policyDesc'];
    /* This bit just updates the class='row' bit with an alternating 1 OR 0 for alternative row coloring */
    echo '<tr class="row' . $i++ % 2 . '">';
    echo '<td align="center"><input type="checkbox"  name="tablecheckbox" id="' . $id . '"></td>';
    echo '<td align="left">' . $policyName . '</td>';
    echo '<td align="left">' . $policyDesc . '</td>';
    echo '</tr>';
}
$____key = 41340773 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 20670386;
?>

</tbody>
</table>

<?php 
echo $pages->display_pages();
echo "<div class=\"spacer\"></div>";
echo "<p class=\"paginate\">Page: {$pages->current_page} of {$pages->num_pages}</p>\n";