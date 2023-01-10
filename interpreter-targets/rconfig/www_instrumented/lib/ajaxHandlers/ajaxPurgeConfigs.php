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
$____key = 246205406 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 123102703;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/config/functions.inc.php";
require_once "/home/rconfig/classes/ADLog.class.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 229230571 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 114615285;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 141689957 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 70844978;
    // loaded from www\js\configoverview.js.
    // php errors supressed on this page because they should not interrupt the JSON response.
    //i.e. if errors were made due to SQL errors etc.. JSON would not be processed by JS on the SettingsDB.php page
    require_once "../../../classes/db2.class.php";
    $log = ADLog::getInstance();
    // set vars
    $purgeDays = $_GET['purgeDays'];
    // tasks: delete all files entries in DB by ID and then delete all Dirs
    // 1. get all ids from DB older than X days
    $db2 = new db2();
    $db2->query("SELECT id FROM configs WHERE DATE_SUB(CURDATE(),INTERVAL " . $purgeDays . " DAY) >= configDate");
    $getIDs = $db2->resultset();
    $getIDs = flatten($getIDs);
    // logging below
    if ($getIDs) {
        $____key = 249688453 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 124844226;
        $log->Info("Info: Start manual " . $purgeDays . " day Config File Purge - GET DB IDs(File: " . $_SERVER['PHP_SELF'] . ")");
    } else {
        $____key = 7557622 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 3778811;
        $response['response'] = "ERROR: executing query getIDs, becuase there was a problem, or no configs were returned.";
        $log->Fatal($response['response'] . "  (File: " . $_SERVER['PHP_SELF'] . ")");
        echo json_encode($response);
    }
    $____key = 209662953 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 104831476;
    $iDlist = implode(", ", $getIDs);
    // 2. get all dirs using a group by from DB older than X days
    $db2->query("SELECT configLocation FROM configs WHERE DATE_SUB(CURDATE(),INTERVAL " . $purgeDays . " DAY) >= configDate GROUP BY configLocation;");
    $getDirRes = $db2->resultsetCols();
    if (count($getDirRes) > 0) {
        $____key = 29912538 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 14956269;
        $log->Info("Info: Start manual " . $purgeDays . " day Config File Purge - GET DIRs (File: " . $_SERVER['PHP_SELF'] . ")");
        // physically remove directories
        foreach ($getDirRes as $row) {
            $____key = 129880029 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 64940014;
            echo $row;
            exec('rm -fr ' . $row);
        }
        $____key = 60163814 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 30081907;
        // delete all empty Dirs under /home/rconfig/data/ for completeness
        exec('find /home/rconfig/data/. -type d -empty -delete');
        // 3. Delete all ids from DB older than X days - if these are delete first - step 2 cannot
        //    work as will not be able to get unique dirs older than X days
        if (!empty($iDlist)) {
            $____key = 93568522 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 46784261;
            $db2->query("DELETE FROM configs WHERE id IN ({$iDlist})");
            $executeRes = $db2->execute();
            if ($executeRes) {
                $____key = 79399351 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 39699675;
                $log->Info("Info: Start manual " . $purgeDays . " day Config File Purge - Delete DB Rows (File: " . $_SERVER['PHP_SELF'] . ")");
                $response['response'] = "SUCCESS: " . $purgeDays . " day Config File Purge Completed";
            } else {
                $____key = 178121145 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 89060572;
                $response['response'] = "ERROR: executing query Delete ID";
                $log->Fatal("Fatal: Could not Config File Purge - Delete DB Rows (File: " . $_SERVER['PHP_SELF'] . ")");
            }
            $____key = 32458811 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 16229405;
        }
        $____key = 191438335 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 95719167;
        echo json_encode($response);
    } else {
        $____key = 89564832 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 44782416;
        $response['response'] = "ERROR: executing query ";
        $log->Fatal("Fatal: Could not Config File Purge - GET DIRs (File: " . $_SERVER['PHP_SELF'] . ")");
    }
    $____key = 106512752 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 53256376;
}
$____key = 73591316 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 36795658;