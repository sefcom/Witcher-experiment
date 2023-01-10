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
$____key = 75953738 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 37976869;
require_once "/home/rconfig/config/config.inc.php";
require_once "/home/rconfig/config/functions.inc.php";
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 121489180 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 60744590;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 204272155 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 102136077;
    // SEE BOTTOM OF SCRIPT FOR CORE FUNCTIONALITY
    /**
    * procDebugOnOff - Change the debug value in the settings table to 1 or 0 to turn
     device output debugging to on or off respectively
    */
    function procDebugOnOff()
    {
        $____key = 155283260 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 77641630;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if ($_GET['debugOnOff'] == '1') {
            $____key = 220695348 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 110347674;
            $status = "On";
            $debugOnOff = $_GET['debugOnOff'];
        } else {
            $____key = 143374382 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 71687191;
            $status = "Off";
            $debugOnOff = 0;
        }
        $____key = 230467149 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 115233574;
        $db2->query("UPDATE `settings` SET `commandDebug` = :debugOnOff");
        $db2->bind(':debugOnOff', $debugOnOff);
        $queryResult = $db2->execute();
        /* Update successful */
        if ($queryResult) {
            $____key = 251297392 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 125648696;
            $response = "<font color='red'>Debugging status changed successfully to " . $status . "</font>";
        } else {
            $____key = 82215907 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 41107953;
            $response = "failed";
            $log->Warn("Failure: Could not update debugSetting in DB for ajaxSettingsProcess.php:" . $queryResult);
        }
        $____key = 229457198 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 114728599;
        echo json_encode($response);
    }
    /**
    * phpLoggingOnOff - Change the php logging value in the settings tbl to 1 or 0 to turn
     php logging to on or off respectively
    */
    function phpLoggingOnOff()
    {
        $____key = 238736225 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 119368112;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if ($_GET['phpLoggingOnOff'] == '1') {
            $____key = 87797950 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 43898975;
            $status = "On";
            $phpLoggingOnOff = $_GET['phpLoggingOnOff'];
        } else {
            $____key = 166256337 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 83128168;
            $status = "Off";
            $phpLoggingOnOff = 0;
        }
        $____key = 30356649 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 15178324;
        $db2->query("UPDATE `settings` SET `phpErrorLogging` = :phpLoggingOnOff");
        $db2->bind(':phpLoggingOnOff', $phpLoggingOnOff);
        $queryResult = $db2->execute();
        /* Update successful */
        if ($queryResult) {
            $____key = 19582483 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 9791241;
            $response = "<font color='red'>PHP Error Logging status changed successfully to " . $status . "</font>";
        } else {
            $____key = 42082071 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 21041035;
            $response = "failed";
            $log->Warn("Failure: Could not update phpErrorLogging in DB for ajaxSettingsProcess.php:" . $queryResult);
        }
        $____key = 42771237 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 21385618;
        echo json_encode($response);
    }
    /**
     * procDeviceTimeout - Change the device connection timeout value
     */
    function procDeviceTimeout()
    {
        $____key = 170331687 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 85165843;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if (isset($_GET['deviceToutVal'])) {
            $____key = 79138680 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 39569340;
            $timeout = $_GET['deviceToutVal'];
        }
        $____key = 38303201 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 19151600;
        $db2->query("UPDATE `settings` SET `deviceConnectionTimout` = :deviceToutVal");
        $db2->bind(':deviceToutVal', $timeout);
        $queryResult = $db2->execute();
        /* Update successful */
        if ($queryResult) {
            $____key = 221316166 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 110658083;
            $response = "<br/><font color='green'>Device Connection Timeout changed successfully to " . $timeout . " Seconds</font>";
        } else {
            $____key = 244288741 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 122144370;
            $response = "failed";
            $log->Warn("Failure: Could not update deviceConnectionTimout in DB for ajaxSettingsProcess.php:" . $queryResult);
        }
        $____key = 130404902 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 65202451;
        echo json_encode($response);
    }
    /**
     * procPageTimeout - Change the webpage timeout value
     */
    function procPageTimeout()
    {
        $____key = 19521654 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 9760827;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if (isset($_GET['pageTimeoutVal'])) {
            $____key = 9342948 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 4671474;
            $timeout = $_GET['pageTimeoutVal'];
        }
        $____key = 65091533 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 32545766;
        $db2->query("UPDATE `settings` SET `pageTimeout` = :pageTimeoutVal");
        $db2->bind(':pageTimeoutVal', $timeout);
        $queryResult = $db2->execute();
        /* Update successful */
        if ($queryResult) {
            $____key = 5869081 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 2934540;
            $response = "<br/><font color='green'>Webpage Timeout changed successfully to " . $timeout . " Seconds</font>";
        } else {
            $____key = 208905830 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 104452915;
            $response = "failed";
            $log->Warn("Failure: Could not update procPageTimeout in DB for ajaxSettingsProcess.php:" . $queryResult);
        }
        $____key = 101395657 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 50697828;
        echo json_encode($response);
    }
    /**
     * procTimeZoneChange - Change the server timezone
     */
    function procTimeZoneChange()
    {
        $____key = 109326058 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 54663029;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if (isset($_GET['timeZoneChange'])) {
            $____key = 48412997 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 24206498;
            $timeZone = $_GET['timeZoneChange'];
        }
        $____key = 54191875 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 27095937;
        $db2->query("UPDATE `settings` SET `timeZone` = :timeZone");
        $db2->bind(':timeZone', $timeZone);
        $queryResult = $db2->execute();
        /* Update successful */
        if ($queryResult) {
            $____key = 257314574 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 128657287;
            $response = "<br/><font color='green'>Timezone changed successfully to " . $timeZone . "</font>";
        } else {
            $____key = 33538159 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 16769079;
            $response = "failed";
            $log->Warn("Failure: Could not update Timezone in DB for ajaxSettingsProcess.php:" . $queryResult);
        }
        $____key = 118403252 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 59201626;
        echo json_encode($response);
    }
    /**
     * enableLDAPAuth - Enable LDAP Authentication & pass settings
     */
    function enableLDAPAuth()
    {
        $____key = 120186141 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 60093070;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        $enableLDAPAuth = $_POST['enableLDAPAuth'];
        $ldap_host = $_POST['ldap_host'];
        $ldap_dn = $_POST['ldap_dn'];
        $ldap_user_group = $_POST['ldap_user_group'];
        $ldap_admin_group = $_POST['ldap_admin_group'];
        $ldap_usr_dom = $_POST['ldap_usr_dom'];
        $db2->query("UPDATE `settings` SET `ldapServer` = :ldapServer, `ldap_host` = :ldap_host, `ldap_dn` = :ldap_dn, `ldap_user_group` = :ldap_user_group, `ldap_admin_group` = :ldap_admin_group, `ldap_usr_dom` = :ldap_usr_dom");
        $db2->bind(':ldapServer', $enableLDAPAuth);
        $db2->bind(':ldap_host', $ldap_host);
        $db2->bind(':ldap_dn', $ldap_dn);
        $db2->bind(':ldap_user_group', $ldap_user_group);
        $db2->bind(':ldap_admin_group', $ldap_admin_group);
        $db2->bind(':ldap_usr_dom', $ldap_usr_dom);
        $queryResult = $db2->execute();
        /* Update successful */
        if ($queryResult) {
            $____key = 163339487 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 81669743;
            $response = "<br/><font color='green'>LDAP Settings Updated </font>";
        } else {
            $____key = 71202516 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 35601258;
            $response = "failed";
            $log->Warn("Failure: Could not update LDAP in DB for ajaxSettingsProcess.php:" . $queryResult);
        }
        $____key = 28693784 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 14346892;
        echo json_encode($response);
    }
    /**
     * getDebugStatus - Change the device debug status
     */
    function getDebugStatus()
    {
        $____key = 133711446 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 66855723;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if (isset($_GET['getDebugStatus'])) {
            $____key = 256196693 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 128098346;
            $db2->query("SELECT commandDebug FROM settings");
            $result = $db2->single();
            $status = $result['commandDebug'];
            /* Update successful */
            if ($status == '1') {
                $____key = 170907004 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 85453502;
                $response = "<font color='red'><strong>Debugging Status: </strong>On<br/></font>";
            } else {
                $____key = 53082189 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 26541094;
                if ($status == '0') {
                    $____key = 47940397 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 23970198;
                    $response = "<font color='green'><strong>Debugging Status: </strong>Off</font>";
                }
                $____key = 152066722 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 76033361;
            }
            $____key = 210322847 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 105161423;
            echo json_encode($response);
        }
        $____key = 49703748 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 24851874;
    }
    /**
     * getTimeZoneStatus - Change the device connection timeout value
     */
    function getTimeZone()
    {
        $____key = 142456003 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 71228001;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if (isset($_GET['getTimeZone'])) {
            $____key = 79161731 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 39580865;
            $db2->query("SELECT timeZone FROM settings");
            $result = $db2->single();
            $timeZone = $result['timeZone'];
            /* Update successful */
            if (!empty($timeZone)) {
                $____key = 128377991 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 64188995;
                $response = $timeZone;
            } else {
                $____key = 79767040 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 39883520;
                if (empty($timeZone)) {
                    $____key = 106932646 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 53466323;
                    $response = "";
                }
                $____key = 176902113 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 88451056;
            }
            $____key = 50752012 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 25376006;
            echo json_encode($response);
        }
        $____key = 7138068 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 3569034;
    }
    /**
     * procDeviceTimeout - Change the device connection timeout value
     */
    function getPhpLoggingStatus()
    {
        $____key = 65770891 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 32885445;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if (isset($_GET['getPhpLoggingStatus'])) {
            $____key = 113504234 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 56752117;
            $db2->query("SELECT phpErrorLogging FROM settings");
            $result = $db2->single();
            $status = $result['phpErrorLogging'];
            /* Update successful */
            if ($status == '1') {
                $____key = 13623879 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 6811939;
                $response = "<font color='red'><strong>PHP Error Logging Status: </strong>On<br/></font>";
            } else {
                $____key = 24080162 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 12040081;
                if ($status == '0') {
                    $____key = 146381145 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 73190572;
                    $response = "<font color='green'><strong>PHP Error Logging Status: </strong>Off</font>";
                }
                $____key = 63577956 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 31788978;
            }
            $____key = 26533783 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 13266891;
            echo json_encode($response);
        }
        $____key = 224792454 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 112396227;
    }
    /**
     * procDefaultCredsManualSet - Change the status for using the default credential set when manually uploading/downloading configs to/from devices
     */
    function procDefaultCredsManualSet()
    {
        $____key = 96224433 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 48112216;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if ($_GET['defaultCredsManualSet'] == '1') {
            $____key = 74585414 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 37292707;
            $status = "enabled";
            $defaultCredsManualSet = $_GET['defaultCredsManualSet'];
        } else {
            $____key = 28542799 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 14271399;
            $status = "disabled";
            $defaultCredsManualSet = 0;
        }
        $____key = 248807188 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 124403594;
        $db2->query("UPDATE `settings` SET `useDefaultCredsManualSet` = :defaultCredsManualSet");
        $db2->bind(':defaultCredsManualSet', $defaultCredsManualSet);
        $queryResult = $db2->execute();
        /* Update successful */
        if ($queryResult) {
            $____key = 138863157 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 69431578;
            if ($_GET['defaultCredsManualSet'] == '1') {
                $____key = 18155638 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 9077819;
                $response = "<font color='red'>Default credentials are disabled and individual users will have to input their credentials for manual config uploads & downloads</font>";
            } else {
                $____key = 5135389 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 2567694;
                $response = "<font color='red'>Default credentials are enabled and will be used for manual config uploads & downloads</font>";
            }
            $____key = 239558306 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 119779153;
        } else {
            $____key = 113208854 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 56604427;
            $response = "failed";
            $log->Warn("Failure: Could not update useDefaultCredsManualSet in DB for ajaxSettingsProcess.php:" . $queryResult);
        }
        $____key = 55971167 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 27985583;
        echo json_encode($response);
    }
    /**
     * getDefaultCredsManualSet - Get value set for using default credentials with manual uploads & downloads
     */
    function getDefaultCredsManualSet()
    {
        $____key = 54110048 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 27055024;
        require_once "../../../classes/db2.class.php";
        require_once "../../../classes/ADLog.class.php";
        $db2 = new db2();
        $log = ADLog::getInstance();
        if (isset($_GET['getDefaultCredsManualSet'])) {
            $____key = 191047915 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 95523957;
            $db2->query("SELECT useDefaultCredsManualSet FROM settings");
            $result = $db2->single();
            $useDefaultCredsManualSet = $result['useDefaultCredsManualSet'];
            /* Update successful */
            $response = $useDefaultCredsManualSet;
            echo json_encode($response);
        }
        $____key = 26451163 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 13225581;
    }
    /* User adjust debugging Option */
    if (isset($_GET['debugOnOff'])) {
        $____key = 204458715 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 102229357;
        procDebugOnOff();
    } else {
        $____key = 182368491 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 91184245;
        if (isset($_GET['deviceToutVal'])) {
            $____key = 28056460 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 14028230;
            procDeviceTimeout();
        } else {
            $____key = 137272535 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 68636267;
            if (isset($_GET['pageTimeoutVal'])) {
                $____key = 168960895 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 84480447;
                procPageTimeout();
            } else {
                $____key = 110355405 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 55177702;
                if (isset($_GET['timeZoneChange'])) {
                    $____key = 192819988 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 96409994;
                    procTimeZoneChange();
                } else {
                    $____key = 251095484 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 125547742;
                    if (isset($_GET['getTimeZone'])) {
                        $____key = 110081192 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 55040596;
                        getTimeZone();
                    } else {
                        $____key = 210002818 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 105001409;
                        if (isset($_GET['enableLDAPAuth'])) {
                            $____key = 266433122 ^ $GLOBALS["____instr"]["prev"];
                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                            $GLOBALS["____instr"]["map"][$____key] += 1;
                            $GLOBALS["____instr"]["prev"] = 133216561;
                            enableLDAPAuth();
                        } else {
                            $____key = 69866183 ^ $GLOBALS["____instr"]["prev"];
                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                            $GLOBALS["____instr"]["map"][$____key] += 1;
                            $GLOBALS["____instr"]["prev"] = 34933091;
                            if (isset($_GET['getDebugStatus'])) {
                                $____key = 214221885 ^ $GLOBALS["____instr"]["prev"];
                                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                $GLOBALS["____instr"]["map"][$____key] += 1;
                                $GLOBALS["____instr"]["prev"] = 107110942;
                                getDebugStatus();
                            } else {
                                $____key = 53957217 ^ $GLOBALS["____instr"]["prev"];
                                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                $GLOBALS["____instr"]["map"][$____key] += 1;
                                $GLOBALS["____instr"]["prev"] = 26978608;
                                if (isset($_GET['phpLoggingOnOff'])) {
                                    $____key = 241998028 ^ $GLOBALS["____instr"]["prev"];
                                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                    $GLOBALS["____instr"]["map"][$____key] += 1;
                                    $GLOBALS["____instr"]["prev"] = 120999014;
                                    phpLoggingOnOff();
                                } else {
                                    $____key = 143611476 ^ $GLOBALS["____instr"]["prev"];
                                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                    $GLOBALS["____instr"]["map"][$____key] += 1;
                                    $GLOBALS["____instr"]["prev"] = 71805738;
                                    if (isset($_GET['getPhpLoggingStatus'])) {
                                        $____key = 193379616 ^ $GLOBALS["____instr"]["prev"];
                                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                        $GLOBALS["____instr"]["map"][$____key] += 1;
                                        $GLOBALS["____instr"]["prev"] = 96689808;
                                        getPhpLoggingStatus();
                                    } else {
                                        $____key = 264871869 ^ $GLOBALS["____instr"]["prev"];
                                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                        $GLOBALS["____instr"]["map"][$____key] += 1;
                                        $GLOBALS["____instr"]["prev"] = 132435934;
                                        if (isset($_GET['defaultCredsManualSet'])) {
                                            $____key = 31685277 ^ $GLOBALS["____instr"]["prev"];
                                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                            $GLOBALS["____instr"]["map"][$____key] += 1;
                                            $GLOBALS["____instr"]["prev"] = 15842638;
                                            procDefaultCredsManualSet();
                                        } else {
                                            $____key = 194979185 ^ $GLOBALS["____instr"]["prev"];
                                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                            $GLOBALS["____instr"]["map"][$____key] += 1;
                                            $GLOBALS["____instr"]["prev"] = 97489592;
                                            if (isset($_GET['getDefaultCredsManualSet'])) {
                                                $____key = 38332642 ^ $GLOBALS["____instr"]["prev"];
                                                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                                $GLOBALS["____instr"]["map"][$____key] += 1;
                                                $GLOBALS["____instr"]["prev"] = 19166321;
                                                getDefaultCredsManualSet();
                                            }
                                            $____key = 215146082 ^ $GLOBALS["____instr"]["prev"];
                                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                            $GLOBALS["____instr"]["map"][$____key] += 1;
                                            $GLOBALS["____instr"]["prev"] = 107573041;
                                        }
                                        $____key = 241177953 ^ $GLOBALS["____instr"]["prev"];
                                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                        $GLOBALS["____instr"]["map"][$____key] += 1;
                                        $GLOBALS["____instr"]["prev"] = 120588976;
                                    }
                                    $____key = 221927970 ^ $GLOBALS["____instr"]["prev"];
                                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                    $GLOBALS["____instr"]["map"][$____key] += 1;
                                    $GLOBALS["____instr"]["prev"] = 110963985;
                                }
                                $____key = 110730066 ^ $GLOBALS["____instr"]["prev"];
                                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                $GLOBALS["____instr"]["map"][$____key] += 1;
                                $GLOBALS["____instr"]["prev"] = 55365033;
                            }
                            $____key = 246331233 ^ $GLOBALS["____instr"]["prev"];
                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                            $GLOBALS["____instr"]["map"][$____key] += 1;
                            $GLOBALS["____instr"]["prev"] = 123165616;
                        }
                        $____key = 105678394 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 52839197;
                    }
                    $____key = 185719779 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 92859889;
                }
                $____key = 170698484 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 85349242;
            }
            $____key = 242197471 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 121098735;
        }
        $____key = 155419012 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 77709506;
    }
    $____key = 55165247 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 27582623;
}
$____key = 70426204 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 35213102;