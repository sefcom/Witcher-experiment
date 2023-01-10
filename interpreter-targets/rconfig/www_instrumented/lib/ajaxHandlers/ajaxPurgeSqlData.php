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
$____key = 148952685 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 74476342;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 52118292 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 26059146;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 221323574 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 110661787;
    // Purge Deleted Items from the Database. i.e. all items with a 'status' of 2
    // used here settings.js and settingsDb.js
    //php errors supressed on this pagre beacuse they should not interupt the JSON repsonse.
    // i.e. if errors were made due to SQL errors etc.. JSOn would not be processed by JS on the SettingsDB.php page
    error_reporting(0);
    require_once "../../../classes/db2.class.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    // query DB for all tables with 'status' columns
    if (defined('DB_NAME')) {
        $____key = 145484591 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 72742295;
        $db2->query("SELECT TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS \n                    WHERE TABLE_SCHEMA = '" . DB_NAME . "' \n                    AND COLUMN_NAME = 'status'");
        $tbls = $db2->resultsetCols();
    } else {
        $____key = 63285245 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 31642622;
        $response['response'] = "ERROR: executing query";
        $log->Fatal("Fatal: Could not execute query (File: " . $_SERVER['PHP_SELF'] . ")");
    }
    $____key = 203816250 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 101908125;
    foreach ($tbls as &$tbl) {
        $____key = 242949382 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 121474691;
        $db2->query("DELETE FROM " . $tbl . " WHERE status = 2");
        if ($db2->execute()) {
            $____key = 115051119 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 57525559;
            $response['response'] = "SUCCESS: Deleted items purged";
            $log->Info("Info: Deleted rows purged from Table:" . $tbl . "  (File: " . $_SERVER['PHP_SELF'] . ")");
        } else {
            $____key = 154552247 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 77276123;
            $response['response'] = "ERROR: Could not delete rows. Errors logged to log file";
            $log->Fatal("Fatal: Delete rows from Table:" . $tbl . " (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 70588254 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 35294127;
    }
    $____key = 211870576 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 105935288;
    echo json_encode($response);
}
$____key = 232835758 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 116417879;