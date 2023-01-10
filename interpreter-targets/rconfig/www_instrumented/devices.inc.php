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
$____key = 221529123 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 110764561;
/* Includes */
require_once "../classes/db2.class.php";
include_once '../classes/paginator.class.php';
/* Instantiate DB Class */
$db2 = new db2();
/* Get Row count from nodes where NOT deleted */
$db2->query('SELECT COUNT(*) AS total FROM nodes WHERE status = 1');
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
        <form name ="searchForm" method="GET" action="devices.php" onsubmit="return searchValidateForm()">
            <select name="searchColumn" id="searchColumn" class="paginate">
                <option value="deviceName">Device Name</option>
                <option value="deviceIpAddr">IP Address</option>
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
    $____key = 46249707 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 23124853;
    echo "<span class=\"error\">" . $errors['searchField'] . "</span>";
}
$____key = 262545185 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 131272592;
?>
            <button type="submit">Go!</button> <?php 
//search logic below in this script
?>
            <button onClick="clearSearch()" type="button">Clear Search</button>
            <br />
            <font size="0.3em">use '*' as a wildcard</font>
        </form>
    </div> <!-- end searchForm -->	

    <div id="sortForm">
        <legend>Sort</legend>
        <form method="POST" action="devices.php">
            <span class="paginate">Sort by:</span>
            <select name="sortBy" class="paginate">
                <option selected></option>
                <option name="vendorId" value="vendorId">Vendor</option>
                <option name="deviceName" value="deviceName">Device Name</option>
                <option name="deviceIpAddr" value="deviceIpAddr">IP Address</option>
            </select>
            <span class="paginate">Asc/Desc:</span>
            <select name="ascDesc" class="paginate">
                <option selected></option>
                <option name="asc" value="ASC">Ascending</option>
                <option name="desc" value="DESC">Descending</option>
            </select>
            <button type="submit">Go!</button>
        </form> 
    </div>
</div>
<?php 
echo $pages->display_pages();
echo "<span class=\"\">" . $pages->display_jump_menu() . $pages->display_items_per_page() . "</span>";
echo "<div class=\"spacer\" style=\"padding-bottom:3px;\"></div>";
/* get Custom Column Names from Custom DB View TBL to complete full SELECT Query below */
$db2->query('SELECT * FROM customProperties');
$custColumns = $db2->resultsetCols();
$custProp_num_rows = $db2->rowCount();
// check if $custColumns is NOT empty and set to vars
if (!empty($custColumns)) {
    $____key = 79447461 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 39723730;
    $customArray = array();
    foreach ($custColumns as $key => $value) {
        $____key = 55564586 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 27782293;
        array_push($customArray, $value);
    }
    $____key = 203557078 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 101778539;
    $dynQueryStr = implode(", ", $customArray) . ', ';
} else {
    $____key = 19937277 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 9968638;
    $customArray = '';
    $dynQueryStr = '';
}
$____key = 120006780 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 60003390;
/* Search functionality
  1. set default query
  1. if search is set - nbuild new $query
  2. check all inputs and return errors if needed - to be done
  3. if search fields are complete, build the query with the search string, esle default query inc pagnation for use later
 */
$query = "SELECT \n\t\tn.id,\n\t\tv.vendorName,\n\t\tv.vendorLogo,\n\t\tn.deviceName,\n\t\tc.categoryName,\n\t\tn.deviceIpAddr,\n\t\tn.deviceUsername,\n\t\tn.devicePassword,\n\t\t" . $dynQueryStr . "\n\t\tn.vendorId\n\t\tFROM nodes n\n\tLEFT OUTER JOIN vendors v ON n.vendorId = v.id\n\tLEFT OUTER JOIN categories c ON n.nodeCatId = c.id\n\tWHERE n.status = 1\n\tORDER BY deviceName ASC\n\t{$pages->limit}";
if (isset($_GET['search'])) {
    $____key = 74209216 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 37104608;
    if (isset($_GET['searchColumn'])) {
        $____key = 231655555 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 115827777;
        $searchColumn = $_GET['searchColumn'];
    }
    $____key = 99095449 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 49547724;
    if (isset($_GET['searchOption'])) {
        $____key = 257098518 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 128549259;
        switch ($_GET['searchOption']) {
            case "contains":
                $____key = 259310168 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 129655084;
                $searchOption = "LIKE";
                break;
            case "equals":
                $____key = 13947409 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 6973704;
                $searchOption = "=";
                break;
            case "notContains":
                $____key = 237580575 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 118790287;
                $searchOption = "NOT LIKE";
                break;
        }
        $____key = 195655810 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 97827905;
    }
    $____key = 237526333 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 118763166;
    if (isset($_GET['searchField'])) {
        $____key = 55087222 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 27543611;
        $searchField = $_GET['searchField'];
        $searchField = str_replace("*", "%", $searchField);
        // swap * for % for SQL query
        if ($searchOption == "LIKE" || $searchOption == "NOT LIKE") {
            $____key = 125117775 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 62558887;
            $searchField = '%' . $searchField . '%';
        }
        $____key = 103526431 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 51763215;
    }
    $____key = 66773982 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 33386991;
    $query = "SELECT \n\t\tn.id,\n\t\tv.vendorName,\n\t\tv.vendorLogo,\n\t\tn.deviceName,\n\t\tc.categoryName,\n\t\tn.deviceIpAddr,\n\t\tn.deviceUsername,\n\t\tn.devicePassword,\n\t\t" . $dynQueryStr . "\n\t\tn.vendorId\n\t\tFROM nodes n\n\tLEFT OUTER JOIN vendors v ON n.vendorId = v.id\n\tLEFT OUTER JOIN categories c ON n.nodeCatId = c.id\n\tWHERE n.status = 1\n\tAND " . $searchColumn . " " . $searchOption . " '" . $searchField . "'\n\t{$pages->limit}";
} else {
    $____key = 189450651 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 94725325;
    // end hidden search check
    if (isset($_POST['sortBy'])) {
        $____key = 226059174 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 113029587;
        // sort by query
        $column = $_POST['sortBy'];
        $ascDesc = $_POST['ascDesc'];
        $sortbyQuery = "ORDER BY " . $column . " " . $ascDesc . " ";
        $query = "SELECT \n\t\t\tn.id,\n\t\t\tv.vendorName,\n\t\t\tv.vendorLogo,\n\t\t\tn.deviceName,\n\t\t\tc.categoryName,\n\t\t\tn.deviceIpAddr,\n\t\t\tn.deviceUsername,\n\t\t\tn.devicePassword,\n\t\t\t" . $dynQueryStr . "\n\t\t\tn.vendorId\n\t\t\tFROM nodes n\n\t\tLEFT OUTER JOIN vendors v ON n.vendorId = v.id\n\t\tLEFT OUTER JOIN categories c ON n.nodeCatId = c.id\n\t\tWHERE n.status = 1\n\t\t{$sortbyQuery}\n\t\t{$pages->limit}";
    }
    $____key = 91237342 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 45618671;
}
$____key = 49291250 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 24645625;
// end search
/* GET all nodes records from DB */
$db2->query($query);
$qRes = $db2->resultset();
/* Create Multidimensional array for use later */
$result["rows"] = $qRes;
$result["custom"] = $customArray;
$result["cust_num_rows"] = $custProp_num_rows;
$i = 0;
# row counter  to enable alternate row coloring
?>
<table id="devicesTbl" class="tableSimple">
    <thead>
    <th><input type="checkbox" disabled="disabled"/></th>
    <th align="left">Device Name</th>
    <th align="left">IP Address</th>
    <th align="left">Category</th>
    <th align="left">Vendor</th>
<?php 
/* Create and add new Customer Properties Headers to Table */
if (!empty($customArray)) {
    $____key = 30942310 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 15471155;
    foreach ($customArray as $customRows) {
        $____key = 169471467 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 84735733;
        // remove 'custom_' bit for display purposes
        $CustomHeader = substr($customRows, 7);
        ?>
            <th align="left">
            <?php 
        echo $CustomHeader;
        ?>
            </th>
                <?php 
    }
    $____key = 230280464 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 115140232;
}
$____key = 262828838 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 131414419;
// if !empty
?>
</thead>
<tbody>
<?php 
/* do a foreach on the $result['rows'] array to get devices key/value pairs */
foreach ($result['rows'] as $rows) {
    $____key = 84374055 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 42187027;
    $id = $rows['id'];
    /* This bit just updates the class='row' bit with an alternating 1 OR 0 for alternative row coloring */
    echo '<tr class="row' . $i++ % 2 . '">';
    ?>
    <td align="center"><input type="checkbox" name="tablecheckbox" id="<?php 
    echo $id;
    ?>"/></td>
    <td >
        <a href="devicemgmt.php?deviceId=<?php 
    echo $rows['id'];
    ?>&device=<?php 
    echo $rows['deviceName'];
    ?>" title="View <?php 
    echo $rows['deviceName'];
    ?> Configurations"><?php 
    echo $rows['deviceName'];
    ?>
    </td>
    <td align="left"><?php 
    echo $rows['deviceIpAddr'];
    ?></td>
    <td align="left"><?php 
    echo $rows['categoryName'];
    ?></td>
    <td align="left"><img src="<?php 
    echo $rows['vendorLogo'];
    ?>" /> <?php 
    echo $rows['vendorName'];
    ?></td>
    <?php 
    /*  Block extracts key from array that partial matchs 'custom_' 
         When a match happens - output the html with the actual value $v.
         This ensures, that no matter how many custom properties, the values get printed
         for the corrcet column names.
        */
    foreach ($rows as $k => $v) {
        $____key = 208493932 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 104246966;
        if (strpos($k, 'custom_') !== false) {
            $____key = 39038809 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 19519404;
            echo "<td align=\"left\">" . $v . "</td>";
        }
        $____key = 254073945 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 127036972;
        // end if
    }
    $____key = 60613844 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 30306922;
    // end foreach
    ?>
    </tr>
<?php 
}
$____key = 80322765 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 40161382;
?>
</tbody>
</table>
<?php 
echo $pages->display_pages();
echo "<div class=\"spacer\"></div>";
echo "<p class=\"paginate\">Page: {$pages->current_page} of {$pages->num_pages}</p>\n";