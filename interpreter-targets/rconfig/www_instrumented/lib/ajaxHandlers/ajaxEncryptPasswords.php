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
$____key = 168509167 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 84254583;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
require_once "/home/rconfig/classes/updater.class.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 173028986 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 86514493;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 98785266 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 49392633;
    require_once "../../../classes/db2.class.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    $update = new updater();
    // check if encryption already set in DB and alert if it is
    $db2->query("SELECT passwordEncryption from settings");
    if ($db2->resultsetCols()[0] == 1) {
        $____key = 91326153 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 45663076;
        // double verification as button for encryption is not shown if encryption set to one in DB
        echo json_encode(array('status' => 'error', 'message' => 'Password encryption already set on this database. Process failed!'));
        die;
    } else {
        $____key = 32056918 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 16028459;
        // carry on
        $sourceConfigFile = '/home/rconfig/config/config.inc.php';
        $tmpConfigFile = '/home/rconfig/tmp/config.inc.php.tmp';
        if ($update->backupConfigFile($sourceConfigFile, $tmpConfigFile)) {
            $____key = 208916215 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 104458107;
            $response['configFileBackup'] = 'rConfig Configuration file backed up successfully';
            $log->Info("Copied file " . $sourceConfigFile . "... (File: " . $_SERVER['PHP_SELF'] . ")");
        } else {
            $____key = 34204104 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 17102052;
            $response['configFileBackup'] = 'failed to copy ' . $sourceConfigFile;
            $log->Warn("failed to copy " . $sourceConfigFile . "...  (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 245455555 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 122727777;
        //update copied config file with secret
        $update->updateSecretKey($_POST['secret'], $tmpConfigFile);
        copy($tmpConfigFile, $sourceConfigFile);
        unlink($tmpConfigFile);
        // add encryption to Db
        $db2->query("SELECT id, devicePassword, deviceEnablePassword FROM nodes");
        $allNodes = $db2->resultset();
        foreach ($allNodes as $k => $v) {
            $____key = 11254007 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 5627003;
            if (!empty($v['devicePassword'])) {
                $____key = 89958410 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 44979205;
                $db2->query("UPDATE nodes SET devicePassword = :devicePassword WHERE id = " . $v['id']);
                $db2->bind(":devicePassword", first_time_encrypt($v['devicePassword'], $_POST['secret']));
                $db2->execute();
            }
            $____key = 176747620 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 88373810;
            if (!empty($v['deviceEnablePassword'])) {
                $____key = 4658302 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 2329151;
                $db2->query("UPDATE nodes SET deviceEnablePassword = :deviceEnablePassword WHERE id = " . $v['id']);
                $db2->bind(":deviceEnablePassword", first_time_encrypt($v['deviceEnablePassword'], $_POST['secret']));
                $db2->execute();
            }
            $____key = 264475584 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 132237792;
        }
        $____key = 52909939 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 26454969;
        $db2->query("UPDATE settings SET passwordEncryption = 1");
        if ($db2->execute()) {
            $____key = 212618027 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 106309013;
            $log->Info("Password encryption enabled and updated in the database: (File: " . $_SERVER['PHP_SELF'] . ")");
        } else {
            $____key = 177641685 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 88820842;
            echo json_encode(array('status' => 'error', 'message' => 'Cloud not update database for password encryption. Process failed!'));
        }
        $____key = 166402967 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 83201483;
        echo json_encode(array('status' => 'success', 'message' => 'Device passwords successfully encrypted'));
    }
    $____key = 190358804 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 95179402;
}
$____key = 28992092 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 14496046;