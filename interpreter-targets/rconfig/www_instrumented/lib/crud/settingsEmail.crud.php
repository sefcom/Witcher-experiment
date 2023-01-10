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
$____key = 54247211 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 27123605;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 205929339 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 102964669;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 249942368 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 124971184;
    /*
     Steps work like this;
     1. Load external files
     2. instantiate ../../classes - db and config
     3. check if POST contains 'add'. If it does carry out the add script
     4. elseif, check if POST contains delete. if it does, carry out delete script
     5. elseif, check if POST contains 'getRow' and 'id'. If it does, do a select from DB to populate form to prepare for row edit
    */
    require_once "../../../classes/db2.class.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    /* Add SMTP Settings Here */
    if (isset($_POST['add'])) {
        $____key = 17201832 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 8600916;
        $errors = array();
        if (!empty($_POST['smtpServerAddr'])) {
            $____key = 219270017 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 109635008;
            /* Begin DB query. This will either be an Insert if $_POST editid is not set - or an edit/Update if editid is set in POST */
            if (is_string($_POST['smtpServerAddr'])) {
                $____key = 29903661 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 14951830;
                $smtpServerAddr = $_POST['smtpServerAddr'];
                if (filter_var($_POST['smtpFromAddr'], FILTER_VALIDATE_EMAIL)) {
                    $____key = 127505878 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 63752939;
                    $smtpFromAddr = $_POST['smtpFromAddr'];
                } else {
                    $____key = 243359098 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 121679549;
                    $errors['smtpFromAddr'] = "Please enter a valid email address";
                    $log->Warn("Failure: Please enter a valid email address (File: " . $_SERVER['PHP_SELF'] . ")");
                }
                $____key = 258068557 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 129034278;
                if (isset($_POST['smtpAuth'])) {
                    $____key = 11892928 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 5946464;
                    $smtpAuth = $_POST['smtpAuth'];
                } else {
                    $____key = 164933802 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 82466901;
                    $smtpAuth = '0';
                }
                $____key = 218361472 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 109180736;
                $smtpAuthUser = $_POST['smtpAuthUser'];
                $smtpAuthPass = $_POST['smtpAuthPass'];
                $smtpRecipientAddr = $_POST['smtpRecipientAddr'];
                // get each email address from textarea
                $smtpRecipientAddresses = explode("; ", $smtpRecipientAddr);
                $newSmtpRecipientAddr = '';
                foreach ($smtpRecipientAddresses as $address) {
                    $____key = 244771360 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 122385680;
                    if (filter_var($address, FILTER_VALIDATE_EMAIL)) {
                        $____key = 30990592 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 15495296;
                        // validate each address
                        $newSmtpRecipientAddr .= $address . "; ";
                    } else {
                        $____key = 76259152 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 38129576;
                        $errors['smtpRecipientAddr'] = "Please enter a valid email address";
                        $log->Warn("Failure: Please enter a valid email address (File: " . $_SERVER['PHP_SELF'] . ")");
                    }
                    $____key = 253804362 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 126902181;
                }
                $____key = 196083780 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 98041890;
                // next once emails validated put email Recipients string back together
                $newSmtpRecipientAddr = rtrim($newSmtpRecipientAddr);
                // remove trailing whitespace
                $newSmtpRecipientAddr = rtrim($newSmtpRecipientAddr, ";");
                // remove trailing ";" from new string
                if (!empty($errors)) {
                    $____key = 152629714 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 76314857;
                    $errors['Fail'] = "There were errors!";
                    $log->Info("Success:There were errors! on form (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "settings.php#emailSettings");
                    exit;
                }
                $____key = 265436720 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 132718360;
                $db2->query("UPDATE settings SET\n                    smtpServerAddr = :smtpServerAddr, \n                    smtpFromAddr = :smtpFromAddr,\n                    smtpAuth =  :smtpAuth,\n                    smtpAuthUser = :smtpAuthUser,\n                    smtpAuthPass = :smtpAuthPass,\n                    smtpRecipientAddr =  :newSmtpRecipientAddr WHERE id = 1");
                $db2->bind(':smtpServerAddr', $smtpServerAddr);
                $db2->bind(':smtpFromAddr', $smtpFromAddr);
                $db2->bind(':smtpAuth', $smtpAuth);
                $db2->bind(':smtpAuthUser', $smtpAuthUser);
                $db2->bind(':smtpAuthPass', $smtpAuthPass);
                $db2->bind(':newSmtpRecipientAddr', $newSmtpRecipientAddr);
                $resultUpdate = $db2->execute();
                if ($resultUpdate) {
                    $____key = 169742544 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 84871272;
                    $errors['Success'] = "SMTP Settings saved";
                    $log->Info("Success: SMTP Settings saved (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "settings.php#emailSettings");
                    exit;
                } else {
                    $____key = 54042489 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 27021244;
                    $errors['Fail'] = "ERROR: SMTP Settings were not saved";
                    $log->Fatal("Fatal: SMTP Settings were not saved (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "settings.php#?error#emailSettings");
                    exit;
                }
                $____key = 136358974 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 68179487;
            } else {
                $____key = 173013501 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 86506750;
                // categoryName was NOT a String, and so end back error and kill script
                $errors['categoryName'] = "Server Address Field was not a string";
                $log->Warn("Failure: Server Address Field was not a string (File: " . $_SERVER['PHP_SELF'] . ")");
                $_SESSION['errors'] = $errors;
                session_write_close();
                header("Location: " . $config_basedir . "settings.php?error#emailSettings");
                exit;
            }
            $____key = 175016703 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 87508351;
        } else {
            $____key = 87417819 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 43708909;
            // categoryName was not filed in, and so end back error and kill script
            $errors['categoryName'] = "Category Field cannot be empty";
            $log->Warn("Failure: Category Name Field cannot be empty (File: " . $_SERVER['PHP_SELF'] . ")");
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "settings.php?error#emailSettings");
            exit;
        }
        $____key = 141782587 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 70891293;
    } elseif (isset($_POST['del'])) {
        $____key = 42855702 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 21427851;
        /* the query */
        // set all SMTP fields to Null
        $db2->query("UPDATE settings SET\n                            smtpServerAddr = NULL, \n                            smtpFromAddr = NULL,\n                            smtpAuth = '0',\n                            smtpAuthUser = NULL,\n                            smtpAuthPass = NULL,\n                            smtpRecipientAddr =  NULL\n                            WHERE id = 1");
        $resultDelete = $db2->execute();
        if ($resultDelete) {
            $____key = 1621482 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 810741;
            $log->Info("Success: SMTP Settings cleared (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('success' => true));
        } else {
            $____key = 138003360 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 69001680;
            $log->Warn("Failure: Unable clear SMTP Settings (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('failure' => true));
        }
        $____key = 111966230 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 55983115;
        echo $response;
    }
    $____key = 23786714 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 11893357;
    /* end 'delete' if */
}
$____key = 221768268 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 110884134;