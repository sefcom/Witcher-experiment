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
$____key = 22684648 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 11342324;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 3212683 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 1606341;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 203608652 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 101804326;
    // get & set timezone from functions.inc.php
    getSetTimeZone();
    $today = date("Ymd");
    // get each dir in /home/rconfig except, backups, tmp
    $dirsToBackup = array();
    foreach (glob($config_app_basedir . '/*', GLOB_ONLYDIR) as $dir) {
        $____key = 32473514 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 16236757;
        if (basename($dir) != 'backups' && basename($dir) != 'tmp') {
            $____key = 97228479 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 48614239;
            $dirsToBackup[] .= basename($dir);
        }
        $____key = 17820124 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 8910062;
    }
    $____key = 229593774 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 114796887;
    // then zip each folder to a zip file in the tmp dir
    foreach ($dirsToBackup as $k => $v) {
        $____key = 215287769 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 107643884;
        //Then create dir backup and ZIP it
        $backupFile = $config_temp_dir . 'backup-' . $v . '-' . $today . '.zip';
        folderBackup('/home/rconfig/' . $v, $backupFile);
    }
    $____key = 19021873 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 9510936;
    //  backup MySQL DB - vars from ../../../config/config.inc.php
    $sqlBackupFile = sqlBackup(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, $config_temp_dir);
    /**
     * Then Zip all  zip files into one
     */
    $fullBackupFile = $config_backup_basedir . 'fullBackup-' . $today . '.zip';
    /**
     * create array of filenames in /home/tmp dir
     */
    $dirhandler = opendir($config_temp_dir);
    $nofiles = 0;
    while ($file = readdir($dirhandler)) {
        $____key = 171133852 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 85566926;
        // if $file isn't this directory or its parent
        // add to the $file_names array
        if ($file != '.' && $file != '..') {
            $____key = 188298928 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 94149464;
            $nofiles++;
            $file_names[$nofiles] = $config_temp_dir . $file;
        }
        $____key = 138181667 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 69090833;
    }
    $____key = 44271066 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 22135533;
    //close the handler
    closedir($dirhandler);
    /**
     * add all.zip files (array from above readdir) in /home/tmp to zip and create zip in /home/backups
     * below is a private function in functions file
     */
    folderBackup($config_temp_dir, $fullBackupFile);
    /**
     * delete all .zip files in /home/rconfig/tmp
     */
    foreach ($file_names as $file) {
        $____key = 21247438 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 10623719;
        unlink($file);
    }
    $____key = 146660683 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 73330341;
    if (file_exists($fullBackupFile)) {
        $____key = 49946678 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 24973339;
        $response = json_encode(array('success' => true));
    } else {
        $____key = 195549170 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 97774585;
        $response = json_encode(array('failure' => true));
    }
    $____key = 103464361 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 51732180;
    echo $response;
}
$____key = 202387561 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 101193780;
// end session check