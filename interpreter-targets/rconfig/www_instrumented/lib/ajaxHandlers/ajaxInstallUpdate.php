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
$____key = 255002096 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 127501048;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 216989821 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 108494910;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 180853817 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 90426908;
    require_once "../../../classes/updater.class.php";
    /* Updater Steps 
     * 1. get latest version from rconfig.com
     * 2. set or correct owner permissions to all /home/rconfig/ to apache account
     * 3. Assume correct version file uploaded and extract zip file completely to /home/rconfig/tmp/update-x.x.x/
     * 4. backup /home/rconfig/config/config.inc.php to updater files directory
     * 5. change version in config.inc.php to $latestVer
     * 6. Copy all from tmp update folder to prod rconfig folder
     * 7. Check installed version on config.inc.php 
     * 8. check for sql file in update tmp folder
     * 9. execute sql changes if file is present
     * 10. delete all tmp update files/folders using Linux rm command * 
     * 
     * */
    // initiate classes
    $log = ADLog::getInstance();
    $update = new updater();
    //Setting the timeout properly without messing with ini values:
    $ctx = stream_context_create(array('http' => array('timeout' => 5)));
    // here we assume we can already connect to net as ../www/updater.php will not allow us to proceed to this point i.e. no error check
    $latestVer = file_get_contents("http://www.rconfig.com/downloads/version.txt", 0, $ctx);
    $updateFileName = 'rconfig-' . $latestVer . '.zip';
    $updateFile = $config_temp_dir . $updateFileName;
    //extracted files path
    $extractDir = '/home/rconfig/tmp/update-' . $latestVer;
    // set json array for ultimate response to updater.php
    $response = array();
    // set chwon apache on /home/rconfig/ in case any are misconfigured
    shell_exec('chown -R apache ' . $config_app_basedir);
    // check if update file exists
    if ($update->checkForUpdateFile($updateFile)) {
        $____key = 207771060 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 103885530;
        if ($update->extractUpdate($updateFile, $extractDir)) {
            $____key = 187527470 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 93763735;
            $response['zip'] = 'ZIP file successfully extracted';
            $log->Info("ZIP successfully extracted - " . $updateFile . " (File: " . $_SERVER['PHP_SELF'] . ")");
        } else {
            $____key = 175097830 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 87548915;
            $response['zip'] = 'Could not extract ZIP - ' . $updateFile;
            $log->Warn("Could not extract ZIP - " . $updateFile . " (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 219736789 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 109868394;
        // backup /home/rconfig/config/config.inc.php to update Dir
        $sourceConfigFile = '/home/rconfig/config/config.inc.php';
        $destinationConfigFile = '/home/rconfig/tmp/update-' . $latestVer . '/rconfig/config/config.inc.php';
        if ($update->backupConfigFile($sourceConfigFile, $destinationConfigFile)) {
            $____key = 54512374 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 27256187;
            $response['configFileBackup'] = 'rConfig Configuration file backed up successfully';
            $log->Info("Copied file " . $sourceConfigFile . "... (File: " . $_SERVER['PHP_SELF'] . ")");
        } else {
            $____key = 134350556 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 67175278;
            $response['configFileBackup'] = 'failed to copy ' . $sourceConfigFile;
            $log->Warn("failed to copy " . $sourceConfigFile . "...  (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 47096212 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 23548106;
        //update copied config file with new version info
        $update->updateConfigVersionInfo($latestVer, $destinationConfigFile);
        // Copy App folders only
        $folderstoCopy = array('classes', 'config', 'lib', 'www', 'vendor');
        $update->copyAppDirsToProd($latestVer, $folderstoCopy);
        // check version updated correctly
        if ($config_version == $latestVer) {
            $____key = 187856038 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 93928019;
            $response['configFileVersionUpdate'] = 'rConfig application files updated';
            $log->Info("rConfig files updated - (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 51145685 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 25572842;
        // check for and install sql file
        $sqlUpdateFile = $extractDir . '/rconfig/updates/sqlupdate.sql';
        if ($update->checkForUpdateFile($sqlUpdateFile) && filesize($sqlUpdateFile) !== 0) {
            $____key = 110936756 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 55468378;
            // loadSqlFile from classes/updater.class.php
            if ($update->loadSqlFile($sqlUpdateFile, DB_HOST, DB_PORT, DB_USER, DB_PASSWORD, DB_NAME)) {
                $____key = 228359550 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 114179775;
                $response['sqlUpdateComplete'] = 'rConfig Database was updated';
                $log->Info("Database was updated - (File: " . $_SERVER['PHP_SELF'] . ")");
            }
            $____key = 182996807 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 91498403;
        }
        $____key = 89031034 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 44515517;
        // create any new dirs as required
        $dirsToCreateArr = array('/home/rconfig/reports/complianceReports/');
        $update->createDirs($dirsToCreateArr);
        // Delete all /home/rconfig/tmp/ data
        exec('rm -fr /home/rconfig/tmp/*.*');
        if ($update->dirIsEmpty('/home/rconfig/tmp/')) {
            $____key = 208537761 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 104268880;
            $response['tmpFolderEmpty'] = 'rConfig update files removed';
            $log->Info("rConfig update files removed - (File: " . $_SERVER['PHP_SELF'] . ")");
        } else {
            $____key = 71082677 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 35541338;
            $response['tmpFolderEmpty'] = 'Could not remove rConfig update files';
            $log->Info("Could not remove rConfig update files - (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 186311838 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 93155919;
        // remove rconfig/www/install directory as should already be removed for upgrade
        $installDir = '/home/rconfig/www/install/';
        if (is_dir($installDir)) {
            $____key = 28843589 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 14421794;
            rrmdir($installDir);
            sleep(1);
            // pause while deleting
            if (!file_exists($installDir)) {
                $____key = 62684382 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 31342191;
                // check if install  does not dir exist after delete and return success
                $log->Info($installDir . " dir removed - " . $updateFile . " (File: " . $_SERVER['PHP_SELF'] . ")");
            } else {
                $____key = 39444865 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 19722432;
                if (file_exists($installDir)) {
                    $____key = 144750366 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 72375183;
                    // else return failure as dir still exists
                    $response['zip'] = 'Could remove installation directory - ' . $updateFile;
                    $log->Warn("Could remove installation directory - " . $updateFile . " (File: " . $_SERVER['PHP_SELF'] . ")");
                }
                $____key = 216624154 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 108312077;
            }
            $____key = 54801396 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 27400698;
        } else {
            $____key = 228985402 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 114492701;
            if (!is_dir($installDir)) {
                $____key = 259465337 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 129732668;
                // first if - return success as dir does not exist
                $log->Info($installDir . " dir removed - " . $updateFile . " (File: " . $_SERVER['PHP_SELF'] . ")");
            }
            $____key = 36753018 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 18376509;
        }
        $____key = 127502208 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 63751104;
        echo json_encode($response);
    } else {
        $____key = 136565827 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 68282913;
        // could not find update file in tmp dir
        $response['noUpdateFile'] = 'Could not find update File';
        $log->Fatal("Could not find update File (File: " . $_SERVER['PHP_SELF'] . ")");
        echo json_encode($response);
    }
    $____key = 131303879 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 65651939;
}
$____key = 230758851 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 115379425;