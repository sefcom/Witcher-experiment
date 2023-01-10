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
$____key = 121721888 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 60860944;
require_once "../classes/db2.class.php";
require_once "../classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
function availableElems()
{
    $____key = 17191231 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 8595615;
    $db2 = new db2();
    $log = ADLog::getInstance();
    /*
     * Extract all Policy Elements for select list below
     */
    $q = "SELECT id, elementName FROM compliancePolElem WHERE status = 1 ORDER BY elementName ASC";
    $db2->query("SELECT id, elementName FROM compliancePolElem WHERE status = 1 ORDER BY elementName ASC");
    $result = $db2->resultset();
    $num_rows = $db2->rowCount();
    if (!$result || $num_rows < 0) {
        $____key = 157381517 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 78690758;
        $log->Warn("Failure: Problem Displaying compliancePolElem options (File: " . $_SERVER['PHP_SELF'] . ")");
        echo "Error displaying info for availableElems() function";
        return;
    }
    $____key = 55387420 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 27693710;
    if ($num_rows == 0) {
        $____key = 134598516 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 67299258;
        $log->Warn("Failure: Problem Displaying availableElems() - no options returned (File: " . $_SERVER['PHP_SELF'] . ")");
        echo "Database table empty";
        return;
    }
    $____key = 70404023 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 35202011;
    for ($i = 0; $i < $num_rows; $i++) {
        $____key = 142303070 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 71151535;
        $id = $result[$i]['id'];
        $elementName = $result[$i]['elementName'];
        echo "<option value=" . $id . ">" . $elementName . "</option>";
    }
    $____key = 128999215 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 64499607;
}