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
$____key = 266236135 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 133118067;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 1006206 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 503103;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 115068984 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 57534492;
    require_once "../../../classes/db2.class.php";
    require_once "../../../classes/crontab.class.php";
    require_once "../../../classes/phpmailer/class.phpmailer.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    /* Add tasks Here */
    if (isset($_POST['add'])) {
        $____key = 166954429 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 83477214;
        $errors = array();
        /* FORM FIELD VALIDATION BELOW */
        // validate taskType field
        if (!empty($_POST['taskType'])) {
            $____key = 9210873 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 4605436;
            $taskType = $_POST['taskType'];
        } else {
            $____key = 129011288 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 64505644;
            $errors['taskType'] = "Task Type cannot be empty";
        }
        $____key = 191659936 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 95829968;
        // validate taskName & escape field
        if (!empty($_POST['taskName']) && is_string($_POST['taskName'])) {
            $____key = 251601352 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 125800676;
            $taskName = $_POST['taskName'];
        } else {
            $____key = 26548210 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 13274105;
            $errors['taskName'] = "Task Name cannot be empty";
        }
        $____key = 50747828 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 25373914;
        // validate taskDesc & escape field
        if (!empty($_POST['taskDesc']) && is_string($_POST['taskDesc'])) {
            $____key = 23192203 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 11596101;
            $taskDesc = $_POST['taskDesc'];
        } else {
            $____key = 205154833 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 102577416;
            $errors['taskDesc'] = "Task Description cannot be empty";
        }
        $____key = 183168823 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 91584411;
        // validate mailReport checkbox
        if (!empty($_POST['mailConnectionReport'])) {
            $____key = 237381707 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 118690853;
            $mailConnectionReportChk = $_POST['mailConnectionReport'];
        } else {
            $____key = 259087234 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 129543617;
            $mailConnectionReportChk = '0';
        }
        $____key = 114280093 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 57140046;
        // validate snippetSlct select
        if (isset($_POST['snippetSlct'])) {
            $____key = 212720711 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 106360355;
            if ($_POST['snippetSlct'] != 'select') {
                $____key = 178002822 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 89001411;
                $snipId = deleteChar($_POST['snippetSlct'], 10);
                // delete snippetId- from returned value
            } else {
                $____key = 8771699 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 4385849;
                $errors['snippetSlct'] = "Please select a snippet";
            }
            $____key = 201366874 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 100683437;
        } else {
            $____key = 196175097 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 98087548;
            $errors['snippetSlct'] = "Select a Snippet";
            $snipId = '';
        }
        $____key = 62691330 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 31345665;
        // validate mailReport checkbox
        if (!empty($_POST['mailErrorsOnly'])) {
            $____key = 153091756 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 76545878;
            $mailErrorsOnlyChk = $_POST['mailErrorsOnly'];
        } else {
            $____key = 163730810 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 81865405;
            $mailErrorsOnlyChk = '0';
        }
        $____key = 23877693 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 11938846;
        // validate selectRadio field
        if (isset($_POST['selectRadio'])) {
            $____key = 239640685 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 119820342;
            if ($_POST['selectRadio'] == 'deviceSelectRadio' && empty($_POST['deviceSelect'])) {
                $____key = 208270139 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 104135069;
                $errors['deviceSelectRadio'] = "You must choose some Devices";
            } elseif ($_POST['selectRadio'] == 'catSelectRadio' && empty($_POST['catSelect'])) {
                $____key = 57290694 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 28645347;
                $errors['catSelectRadio'] = "You must choose a category(s)";
            }
            $____key = 257204325 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 128602162;
        } else {
            $____key = 12584659 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 6292329;
            $errors['selectRadio'] = "You must choose either devices or categories";
        }
        $____key = 45184591 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 22592295;
        // validate catSelect select // used only if download type is selected on scheduler
        $categories = "";
        if (isset($_POST['catSelect'])) {
            $____key = 254423701 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 127211850;
            // serialsed data should always be an array for checks in devies.crud.php for example if not already an array
            $categories = serialize($_POST['catSelect']);
        }
        $____key = 128331324 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 64165662;
        // validate catId select // used only if report type is selected on scheduler
        if (isset($_POST['catId'])) {
            $____key = 171622959 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 85811479;
            // serialsed data should always be an array for checks in devies.crud.pp for example
            $categories = serialize($_POST['catId']);
        }
        $____key = 81692604 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 40846302;
        // validate $deviceSelect select
        if (isset($_POST['deviceSelect'])) {
            $____key = 145521959 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 72760979;
            $nodeIdArr = $_POST['deviceSelect'];
        } else {
            $____key = 140456035 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 70228017;
            $errors['deviceSelectRadio'] = "Error: the deviceSelect array was empty";
        }
        $____key = 247328606 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 123664303;
        // validate $deviceSelect select
        if (isset($_POST['catCommand'])) {
            $____key = 256493300 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 128246650;
            $catCommand = $_POST['catCommand'];
        } else {
            $____key = 16207437 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 8103718;
            $errors['catCommand'] = "Error: the catCommand select was empty";
        }
        $____key = 145978403 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 72989201;
        // get the posts from the cron form and trim
        $minute = trim($_POST['minute']);
        $hour = trim($_POST['hour']);
        $day = trim($_POST['day']);
        $month = trim($_POST['month']);
        $weekday = trim($_POST['weekday']);
        // put them in an array
        $cronArray = array("minute" => $minute, "hour" => $hour, "day" => $day, "month" => $month, "weekday" => $weekday);
        $regexPattern = '/^(?:[1-9]?\\d|\\*)(?:(?:[\\/-][1-9]?\\d)|(?:,[1-9]?\\d)+)?$/';
        // test if any of the cron fields are empty
        foreach ($cronArray as $cronK => $cronV) {
            $____key = 162401925 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 81200962;
            if ($cronV === null || $cronV === '') {
                $____key = 149451471 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 74725735;
                $errors['cron'] = 'A field was empty!';
                break;
            }
            $____key = 166472399 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 83236199;
            if (!preg_match($regexPattern, $cronV)) {
                $____key = 83862140 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 41931070;
                $errors['cron'] = 'Field ' . $cronK . ' contains invalid characters';
                // break;
            }
            $____key = 13102425 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 6551212;
        }
        $____key = 155618354 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 77809177;
        /* END - VALIDATION */
        /* SQL and CRONTAB Additions below
         * Next code is based on the fact that the above validation has passed
         */
        if (!empty($_POST['taskName'])) {
            $____key = 103986071 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 51993035;
            /* INSTALL CRON TABS */
            // Create Random Task ID to identify for scheduled script later
            $randNum = rand(100000, 999999);
            // pre-pend crontab task name with  #
            $taskName = "#" . $randNum . " - " . $_POST['taskName'];
            // add hash for comment in CRON script
            $taskDesc = "#" . $randNum . " - " . $_POST['taskDesc'];
            $cronPattern = $minute . ' ' . $hour . ' ' . $day . ' ' . $month . ' ' . $weekday . ' ';
            // check the task type selected and update the $cronScript VAR with the correct taskType
            if ($_POST['taskType'] == 1) {
                $____key = 260418617 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 130209308;
                // taskType is download Configurations
                $script = "showCmdScript.php";
            } else {
                $____key = 203644644 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 101822322;
                if ($_POST['taskType'] == 2) {
                    $____key = 127824176 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 63912088;
                    if (strstr($_POST['reportTypeSlct'][0], '-', true) == 'compliance') {
                        $____key = 154957413 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 77478706;
                        // check if the value form the select begins with str compliance
                        $complianceId = substr($_POST['reportTypeSlct'][0], strrpos($_POST['reportTypeSlct'][0], '-') + 1);
                        // get everything after the '-' and set the complianceId
                        $script = "complianceScript.php";
                    } else {
                        $____key = 214220419 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 107110209;
                        $script = "compareReportScript.php";
                        // default script name for $_POST['taskType'] == 2 (reports)
                    }
                    $____key = 39359142 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 19679571;
                } else {
                    $____key = 29330212 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 14665106;
                    if ($_POST['taskType'] == 3) {
                        $____key = 244071493 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 122035746;
                        // taskType is Schedule Config Snippet
                        $script = "configCategoryScript.php";
                    } else {
                        $____key = 29264404 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 14632202;
                        $errors['taskTypeError'] = "There was a problem selecting the Task Type";
                        // throw an error
                        $log->Warn("Failure: There was a problem selecting the Task Type (File: " . $_SERVER['PHP_SELF'] . ")");
                    }
                    $____key = 11421116 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 5710558;
                }
                $____key = 92897445 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 46448722;
            }
            $____key = 69785230 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 34892615;
            $cronScript = "php /home/rconfig/lib/" . $script . " " . $randNum;
            $crontab = new crontab($cronScript, $taskName, $taskDesc, $cronPattern);
            $crontabUpdateResult = $crontab->addCron();
            if ($crontabUpdateResult == 0) {
                $____key = 70091582 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 35045791;
                $errors['crontab'] = "Failure: Could not update crontab on the server ";
                // throw an error
                $log->Fatal("Failure: Could not update crontab on the server (File: " . $_SERVER['PHP_SELF'] . ")");
            }
            $____key = 150811357 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 75405678;
            /* END - INSTALL CRON TABS */
            /* ADD CRONTAB RECORDS TO DB */
            if ($_POST['taskType'] == 1) {
                $____key = 97340421 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 48670210;
                //taskType is download Configurations
                $db2->query("INSERT INTO tasks(id, taskType, taskName, taskDescription, crontime, croncmd, addedby, dateadded, status, catId, mailConnectionReport, mailErrorsOnly) \n                        VALUES  (:randNum, :taskType, :taskName, :taskDesc, :cronPattern, :cronScript, :username,  NOW(),  '1', :categories, :mailConnectionReportChk, :mailErrorsOnlyChk)");
                $db2->bind(':randNum', $randNum);
                $db2->bind(':taskType', $_POST['taskType']);
                $db2->bind(':taskName', $_POST['taskName']);
                $db2->bind(':taskDesc', $_POST['taskDesc']);
                $db2->bind(':cronPattern', $cronPattern);
                $db2->bind(':cronScript', $cronScript);
                $db2->bind(':username', $_SESSION['username']);
                $db2->bind(':categories', $categories);
                $db2->bind(':mailConnectionReportChk', $mailConnectionReportChk);
                $db2->bind(':mailErrorsOnlyChk', $mailErrorsOnlyChk);
                $queryResult = $db2->execute();
            } else {
                $____key = 54229759 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 27114879;
                if ($_POST['taskType'] == 2) {
                    $____key = 165878937 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 82939468;
                    $db2->query("INSERT INTO tasks (id, taskType, taskName, taskDescription, crontime, croncmd, addedby, dateadded, status, mailConnectionReport, catId, catCommand, complianceId) \n                    VALUES (:randNum, :taskType, :taskName, :taskDesc, :cronPattern, :cronScript, :username, NOW(), '1', :mailConnectionReportChk, :categories, :catCommand, :complianceId)");
                    $db2->bind(':randNum', $randNum);
                    $db2->bind(':taskType', $taskType);
                    $db2->bind(':taskName', $_POST['taskName']);
                    $db2->bind(':taskDesc', $_POST['taskDesc']);
                    $db2->bind(':cronPattern', $cronPattern);
                    $db2->bind(':cronScript', $cronScript);
                    $db2->bind(':username', $_SESSION['username']);
                    $db2->bind(':mailConnectionReportChk', $mailConnectionReportChk);
                    $db2->bind(':categories', $categories);
                    $db2->bind(':catCommand', $catCommand);
                    $db2->bind(':complianceId', $complianceId);
                    $queryResult = $db2->execute();
                } else {
                    $____key = 64331030 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 32165515;
                    if ($_POST['taskType'] == 3) {
                        $____key = 128687642 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 64343821;
                        $db2->query("INSERT INTO tasks (id, taskType, taskName, taskDescription, crontime, croncmd, addedby, dateadded, status, mailConnectionReport, catId, snipId) \n                    VALUES (:randNum, :taskType, :taskName, :taskDesc, :cronPattern, :cronScript, :username, NOW(), '1', :mailConnectionReportChk, :categories, :snipId)");
                        $db2->bind(':randNum', $randNum);
                        $db2->bind(':taskType', $taskType);
                        $db2->bind(':taskName', $_POST['taskName']);
                        $db2->bind(':taskDesc', $_POST['taskDesc']);
                        $db2->bind(':cronPattern', $cronPattern);
                        $db2->bind(':cronScript', $cronScript);
                        $db2->bind(':username', $_SESSION['username']);
                        $db2->bind(':mailConnectionReportChk', $mailConnectionReportChk);
                        $db2->bind(':categories', $categories);
                        $db2->bind(':snipId', $snipId);
                        $queryResult = $db2->execute();
                    }
                    $____key = 144794499 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 72397249;
                }
                $____key = 38901767 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 19450883;
            }
            $____key = 16257307 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 8128653;
            if ($queryResult) {
                $____key = 78666978 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 39333489;
                /* ADD NEW COLUMN TO NODES TABLE */
                /*  add to taskID column to nodes table in database to specify which nodes belong to this task 
                     default of '2' means all nodes are not part of this task will update with 1 for node selection
                     in next query
                    */
                $db2->query("ALTER TABLE `nodes` ADD COLUMN taskId" . $randNum . " VARCHAR(20) NOT NULL DEFAULT '2' AFTER `id`");
                $queryResult = $db2->execute();
                if ($queryResult) {
                    $____key = 164670038 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 82335019;
                    $log->Info("Success: Added task Column to nodes table to DB (File: " . $_SERVER['PHP_SELF'] . ")");
                } else {
                    $____key = 147968231 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 73984115;
                    $errors['Fail'] = "ERROR: could not update table nodes";
                    $log->Fatal("Fatal: could not update table nodes (File: " . $_SERVER['PHP_SELF'] . ")");
                }
                $____key = 170553658 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 85276829;
                /* END - ADD NEW COLUMN TO NODES TABLE */
                /* UPDATE NEW TASK COLUMN IN NODES TBL WITH '1' FOR SELECTED NODES/CATEGORIES */
                // Amend all selected Nodes new TaskID with a '1' to identify an active state for this task
                $categories = unserialize($categories);
                // unserialize $categories before next tasks because was serialised for DB input
                if (!empty($categories)) {
                    $____key = 182533959 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 91266979;
                    if (is_array($categories)) {
                        $____key = 135296205 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 67648102;
                        // check if $categories is an array because when selecting compare report, cat option is single value
                        $sanitized_post_ids = array();
                        foreach ($categories as $id) {
                            $____key = 253508212 ^ $GLOBALS["____instr"]["prev"];
                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                            $GLOBALS["____instr"]["map"][$____key] += 1;
                            $GLOBALS["____instr"]["prev"] = 126754106;
                            $sanitized_post_ids[] = intval($id);
                        }
                        $____key = 155977965 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 77988982;
                        $in_str = implode(',', $sanitized_post_ids);
                        $db2->query("SELECT id FROM nodes WHERE nodeCatId IN (:in_str)");
                        $db2->bind(':in_str', $in_str);
                        $catRes = $db2->resultset();
                    } else {
                        $____key = 197813216 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 98906608;
                        $catRes = $db2->query("SELECT id FROM nodes WHERE nodeCatId = {$categories} ");
                        $db2->query("SELECT id FROM nodes WHERE nodeCatId IN (:categories)");
                        $db2->bind(':categories', $categories);
                        $catRes = $db2->resultset();
                    }
                    $____key = 253568947 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 126784473;
                    $nodeIdArr = array();
                    foreach ($catRes as $catRow) {
                        $____key = 224463544 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 112231772;
                        $nodeIdArr[] = $catRow['id'];
                    }
                    $____key = 175722989 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 87861494;
                }
                $____key = 126976761 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 63488380;
                if (!empty($nodeIdArr)) {
                    $____key = 239608054 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 119804027;
                    //Let's sanitize it
                    $sanitized_ids = array();
                    foreach ($nodeIdArr as $nodeId) {
                        $____key = 146022379 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 73011189;
                        $sanitized_ids[] = intval($nodeId);
                    }
                    $____key = 62744368 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 31372184;
                    //Get the ids and add a trailing ",", but remove the last one
                    $in_str = implode(',', $sanitized_ids);
                    //Build the sql and execute it
                    $db2->query("UPDATE nodes SET taskId" . $randNum . " = 1 WHERE id IN (" . $in_str . ") AND status = 1");
                    $queryResult = $db2->execute();
                    if ($queryResult) {
                        $____key = 201927980 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 100963990;
                        $log->Info("Success: Added task Column to nodes table to DB (File: " . $_SERVER['PHP_SELF'] . ")");
                    } else {
                        $____key = 235930962 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 117965481;
                        $errors['Fail'] = "ERROR: Could not add task Column to nodes table";
                        $log->Fatal("Fatal: ERROR: Could not add task Column to nodes table (File: " . $_SERVER['PHP_SELF'] . ")");
                    }
                    $____key = 160533745 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 80266872;
                }
                $____key = 226655907 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 113327953;
                /* END - UPDATE NEW COLUMN WITH '1' FOR SELECTED NODES/CATEGORIES */
            }
            $____key = 265589506 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 132794753;
            $errors['Success'] = "Added Task Successfully";
            $log->Info("Success: Added Task to DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "scheduler.php");
            exit;
        } else {
            $____key = 566302 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 283151;
            $errors['Fail'] = "ERROR: Could not add task";
            $log->Fatal("Fatal: Could not add task (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 264427078 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 132213539;
        /* END - ADD CRONTAB RECORDS TO DB */
        // set the session id if any errors occur and redirect back to devices page with ?error set for JS on that page to keep form open
        if (!empty($errors)) {
            $____key = 89236460 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 44618230;
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "scheduler.php?errors");
            exit;
        }
        $____key = 189503092 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 94751546;
    } elseif (isset($_POST['del'])) {
        $____key = 167867687 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 83933843;
        $tid = $_POST['id'];
        // Query to retrieve row for given ID
        $db2->query("SELECT taskName, taskDescription, crontime, croncmd  FROM tasks WHERE id = :tid");
        $db2->bind(':tid', $tid);
        $taskSelectResult = $db2->resultset();
        // Put row results into variables
        foreach ($taskSelectResult as $row) {
            $____key = 156815116 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 78407558;
            $delTaskName = "#" . $tid . " - " . $row['taskName'];
            $delTaskDesc = "#" . $tid . " - " . $row['taskDescription'];
            $delCronJob = $row['crontime'] . $row['croncmd'];
        }
        $____key = 55969331 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 27984665;
        /* The cronfeed.txt/CronTab Delete */
        $crontab = new crontab($delCronJob, $delTaskName, $delTaskDesc, $row['crontime']);
        $crontabUpdateResult = $crontab->removeCron($delTaskName, $delTaskDesc, $delCronJob);
        if ($crontabUpdateResult == 0) {
            $____key = 90491170 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 45245585;
            $errors['crontab'] = "Failure:Could not update crontab on the server ";
            // throw an error
            $log->Fatal("Failure: Could not update crontab on the server (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 8927661 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 4463830;
        /* the DB query */
        $db2->query("UPDATE tasks SET status = 2 WHERE id = :tid");
        $db2->bind(':tid', $tid);
        $delTaskQResult = $db2->execute();
        // Delete the tid column from the nodes table
        $db2->query("ALTER TABLE nodes DROP COLUMN taskId" . $tid . ";");
        $db2->execute();
        if ($delTaskQResult) {
            $____key = 170183311 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 85091655;
            $log->Info("Success: Deleted task " . $_POST['id'] . " in DB and CRONTAB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('success' => true));
        } else {
            $____key = 162598038 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 81299019;
            $log->Warn("Failure: Unable to delete task " . $_POST['id'] . " in DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('failure' => true));
        }
        $____key = 6219181 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 3109590;
        echo $response;
    } elseif (isset($_GET['getRow']) && isset($_GET['id'])) {
        $____key = 155614563 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 77807281;
        $id = $_GET['id'];
        $db2->query("SELECT * FROM tasks WHERE status = 1 AND id = :id");
        $db2->bind(':id', $id);
        $tasksResult = $db2->resultset();
        $items = array();
        foreach ($tasksResult as $row) {
            $____key = 162156862 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 81078431;
            array_push($items, $row);
        }
        $____key = 57668257 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 28834128;
        $db2->query("SELECT deviceName FROM nodes WHERE taskId" . $id . " = 1");
        $db2->bind(':id', $id);
        $devicesTaskQResult = $db2->resultset();
        $devices = array();
        foreach ($devicesTaskQResult as $rowDev) {
            $____key = 65308017 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 32654008;
            array_push($devices, $rowDev);
        }
        $____key = 236510614 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 118255307;
        // assumption is, if its blank, when the task was created we selected specific devices and not a full category
        // then we set the catOrDevices value to 1, meaning we have a list of devices to show and not a category
        if ($items[0]['catId']) {
            $____key = 8094709 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 4047354;
            if (count(unserialize($items[0]['catId'])) >= 1 && is_array(unserialize($items[0]['catId']))) {
                $____key = 210089690 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 105044845;
                $cats = implode(",", unserialize($items[0]['catId']));
            } else {
                $____key = 83911665 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 41955832;
                $cats = unserialize($items[0]['catId']);
                // if an array wasn't passed, its a single string item unserialised from DB
            }
            $____key = 110678057 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 55339028;
            $db2->query("SELECT categoryName FROM categories WHERE id IN (" . $cats . ")");
            $catTaskQResult = $db2->resultsetCols();
            $result['categoryName'] = $catTaskQResult;
        }
        $____key = 12516084 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 6258042;
        $result["rows"] = $items;
        $result["devices"] = $devices;
        echo json_encode($result);
    }
    $____key = 235665742 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 117832871;
    /* end GetId */
}
$____key = 256545848 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 128272924;