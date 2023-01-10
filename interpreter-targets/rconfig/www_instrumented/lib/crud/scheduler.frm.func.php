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
$____key = 199906403 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 99953201;
require_once "../classes/db2.class.php";
require_once "../classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
function reportsOptions()
{
    $____key = 36443027 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 18221513;
    $db2 = new db2();
    $log = ADLog::getInstance();
    /*
     * Extract all Policy Elements for select list below
     */
    $db2->query("SELECT id, reportsName,  reportsDesc FROM complianceReports WHERE status = 1 ORDER BY id ASC");
    $result = $db2->resultset();
    $num_rows = $db2->rowCount();
    if (!$result || $num_rows < 0) {
        $____key = 96141179 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 48070589;
        $log->Warn("Failure: Problem Displaying complianceReports options (File: " . $_SERVER['PHP_SELF'] . ")");
        echo "Error displaying info for reportsOptions() function";
        return;
    }
    $____key = 165734410 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 82867205;
    if ($num_rows == 0) {
        $____key = 130805458 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 65402729;
        $log->Warn("Failure: Problem Displaying reportsOptions() - no options returned (File: " . $_SERVER['PHP_SELF'] . ")");
        echo "Database table empty";
        return;
    }
    $____key = 63009926 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 31504963;
    for ($i = 0; $i < $num_rows; $i++) {
        $____key = 134411961 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 67205980;
        $id = $result[$i]['id'];
        $reportsName = $result[$i]['reportsName'];
        echo "<option value=compliance-" . $id . ">" . $reportsName . "</option>";
    }
    $____key = 137624216 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 68812108;
}
function snippetsOptions()
{
    $____key = 82303288 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 41151644;
    $db2 = new db2();
    $log = ADLog::getInstance();
    /*
     * Extract all snippets for select list below
     */
    $db2->query("SELECT id, snippetName FROM snippets ORDER BY snippetName ASC");
    $result = $db2->resultset();
    $num_rows = $db2->rowCount();
    if (!$result || $num_rows < 0) {
        $____key = 216039524 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 108019762;
        $log->Warn("Failure: Problem Displaying snippetsOptions() options (File: " . $_SERVER['PHP_SELF'] . ")");
        echo "Error displaying info for reportsOptions() function";
        return;
    }
    $____key = 123373872 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 61686936;
    if ($num_rows == 0) {
        $____key = 236370005 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 118185002;
        $log->Warn("Failure: Problem Displaying snippetsOptions() - no options returned (File: " . $_SERVER['PHP_SELF'] . ")");
        echo "Database table empty";
        return;
    }
    $____key = 164421299 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 82210649;
    for ($i = 0; $i < $num_rows; $i++) {
        $____key = 239655938 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 119827969;
        $id = $result[$i]['id'];
        $snippetName = $result[$i]['snippetName'];
        echo "<option value=snippetId-" . $id . ">" . $snippetName . "</option>";
    }
    $____key = 52811948 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 26405974;
}