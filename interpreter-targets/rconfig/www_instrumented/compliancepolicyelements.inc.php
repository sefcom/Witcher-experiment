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
$____key = 192476870 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 96238435;
/* Includes */
require_once "../classes/db2.class.php";
include_once '../classes/paginator.class.php';
/* Instantiate DB Class */
$db2 = new db2();
/* Get Row count from compliancePolElem where NOT deleted */
$db2->query('SELECT COUNT(*) AS total FROM compliancePolElem WHERE status = 1');
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
        <form name ="searchForm" method="GET" action="compliancepolicyelements.php" onsubmit="return searchValidateForm()">
            <select name="searchColumn" id="searchColumn" class="paginate">
                <option value="elementName">Name</option>
                <option value="singleLine1">Code</option>
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
    $____key = 131486336 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 65743168;
    echo "<span class=\"error\">" . $errors['searchField'] . "</span>";
}
$____key = 76270382 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 38135191;
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
    $____key = 79744019 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 39872009;
    if (isset($_GET['searchColumn'])) {
        $____key = 22561372 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 11280686;
        $searchColumn = $_GET['searchColumn'];
    }
    $____key = 71449739 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 35724869;
    if (isset($_GET['searchOption'])) {
        $____key = 162347941 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 81173970;
        switch ($_GET['searchOption']) {
            case "contains":
                $____key = 15436580 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 7718290;
                $searchOption = "LIKE";
                break;
            case "equals":
                $____key = 94371276 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 47185638;
                $searchOption = "=";
                break;
            case "notContains":
                $____key = 88740483 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 44370241;
                $searchOption = "NOT LIKE";
                break;
        }
        $____key = 3885551 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 1942775;
    }
    $____key = 180863219 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 90431609;
    if (isset($_GET['searchField'])) {
        $____key = 34120448 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 17060224;
        $searchField = $_GET['searchField'];
        $searchField = str_replace("*", "%", $searchField);
        // swap * for % for SQL query
        if ($searchOption == "LIKE" || $searchOption == "NOT LIKE") {
            $____key = 173147675 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 86573837;
            $searchField = '%' . $searchField . '%';
        }
        $____key = 127190880 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 63595440;
    }
    $____key = 140791486 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 70395743;
    $db2->query("SELECT id, elementName,  elementDesc, singleParam1, singleLine1 FROM compliancePolElem WHERE status = 1 AND " . $searchColumn . " " . $searchOption . " '" . $searchField . "' ORDER BY id ASC {$pages->limit}");
    $queryResult = $db2->resultset();
} else {
    $____key = 119697795 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 59848897;
    /* GET all records from DB */
    $db2->query("SELECT id, elementName,  elementDesc, singleParam1, singleLine1 FROM compliancePolElem  WHERE status = 1 ORDER BY id ASC {$pages->limit}");
    $queryResult = $db2->resultset();
}
$____key = 4253357 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 2126678;
// push rows to $items array
$items = array();
foreach ($queryResult as $row) {
    $____key = 238435511 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 119217755;
    array_push($items, $row);
}
$____key = 171175212 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 85587606;
/* Create Multidimensional array for use later */
$result["rows"] = $items;
$i = 0;
# row counter  to enable alternate row coloring
?>

<table id="polElemTbl" class="tableSimple">
    <thead>
    <th><input type="checkbox" disabled="disabled"/></th>
    <th align="left">Name</th>
    <th align="left">Description</th>
    <th align="left">Parameter</th>
    <th align="left">Code</th>
</thead>
<tbody>
    <?php 
foreach ($result['rows'] as $rows) {
    $____key = 151388209 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 75694104;
    $id = $rows['id'];
    $elementName = $rows['elementName'];
    $elementDesc = $rows['elementDesc'];
    $singleParam1 = $rows['singleParam1'];
    $singleLine1 = $rows['singleLine1'];
    // change $singleParam1 values to text for output display
    switch ($singleParam1) {
        case 1:
            $____key = 55295458 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 27647729;
            $singleParam1 = 'equals';
            break;
        case 2:
            $____key = 52406534 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 26203267;
            $singleParam1 = 'contains';
            break;
        case 3:
            $____key = 171602110 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 85801055;
            $singleParam1 = 'not contains';
            break;
        default:
            $____key = 109010529 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 54505264;
            $singleParam1 = 'incorrect value';
    }
    $____key = 196932469 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 98466234;
    /* This bit just updates the class='row' bit with an alternating 1 OR 0 for alternative row coloring */
    echo '<tr class="row' . $i++ % 2 . '">';
    echo '<td align="center"><input type="checkbox"  name="tablecheckbox" id="' . $id . '"></td>';
    echo '<td align="left">' . $elementName . '</td>';
    echo '<td align="left">' . $elementDesc . '</td>';
    echo '<td align="left">' . $singleParam1 . '</td>';
    echo '<td align="left">' . $singleLine1 . '</td>';
    echo '</tr>';
}
$____key = 227347603 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 113673801;
?>

</tbody>
</table>

<?php 
echo $pages->display_pages();
echo "<div class=\"spacer\"></div>";
echo "<p class=\"paginate\">Page: {$pages->current_page} of {$pages->num_pages}</p>\n";