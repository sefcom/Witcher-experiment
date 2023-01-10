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
$____key = 63600031 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 31800015;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 198610362 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 99305181;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 196309750 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 98154875;
    require_once "../../../classes/db2.class.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    /* Add Categories Here */
    if (isset($_POST['add'])) {
        $____key = 134457420 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 67228710;
        $errors = array();
        /* validations */
        // validate command field
        if (!empty($_POST['command'])) {
            $____key = 65827590 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 32913795;
            $command = str_replace(" ", "", $_POST['command']);
            // remove spaces for alpha validation
            if (ctype_alpha($command)) {
                $____key = 215277703 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 107638851;
                $command = $_POST['command'];
                // reset $command var to actual input
            } else {
                $____key = 236252318 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 118126159;
                $errors['command'] = "Command input invalid";
            }
            $____key = 173408689 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 86704344;
        } else {
            $____key = 66346510 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 33173255;
            $errors['command'] = "Command field cannot be empty";
        }
        $____key = 58024074 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 29012037;
        if (preg_match('/(?:\\\\[trn])+/', $_POST['command'])) {
            $____key = 223938732 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 111969366;
            $errors['command'] = "Command input invalid";
        } else {
            $____key = 122426585 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 61213292;
            $command = $_POST['command'];
            // reset $command var to actual input and escape
        }
        $____key = 90661363 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 45330681;
        /* if command inputted and no cat selected - return error */
        $catId = $_POST['catId'];
        if ($catId['0'] == 0) {
            $____key = 33415194 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 16707597;
            $errors['catId'] = "You must select a category";
        } else {
            $____key = 207299065 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 103649532;
            $catId = $_POST['catId'];
        }
        $____key = 134275379 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 67137689;
        if (!empty($command) && $catId['0'] != 0) {
            $____key = 65403710 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 32701855;
            /* Begin DB query. This will either be an Insert if $_POST editid is not set - or an edit/Update if editid is set in POST */
            if (empty($_POST['editid'])) {
                $____key = 238437505 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 119218752;
                // actual add
                // add command to configcommand table
                $db2->query("INSERT INTO configcommands (command, status) VALUES (:command, '1' )");
                $db2->bind(':command', $command);
                $queryResult = $db2->execute();
                if ($queryResult) {
                    $____key = 208673530 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 104336765;
                    $db2->query("SELECT id FROM configcommands WHERE command = :command");
                    $db2->bind(':command', $command);
                    $commandRes = $db2->resultset();
                    foreach ($commandRes as $row) {
                        $____key = 53298558 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 26649279;
                        $cmdId = $row['id'];
                    }
                    $____key = 142851361 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 71425680;
                    // next loop over catId Post and get all IDs selected and insert to cmdCatTbl
                    $catIds = $_POST['catId'];
                    for ($i = 0; $i < count($catIds); $i++) {
                        $____key = 26324780 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 13162390;
                        $catId = $catIds[$i];
                        $db2->query('INSERT INTO cmdCatTbl (configCmdId, nodeCatId) VALUES (:cmdId, :catId)');
                        $db2->bind(':cmdId', $cmdId);
                        $db2->bind(':catId', $catId);
                        $db2->execute();
                    }
                    $____key = 168911959 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 84455979;
                    $errors['Success'] = "Added command '" . $command . "' to Database";
                    $log->Info("Success: Added command " . $command . " to DB (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "commands.php");
                    exit;
                } else {
                    $____key = 46476797 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 23238398;
                    $errors['Fail'] = "ERROR: Could not Add command '" . $command . "' to Database ";
                    $log->Fatal("Fatal: Could not Add command '" . $command . "' to Database (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "commands.php?error");
                    exit;
                }
                $____key = 19836576 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 9918288;
            } else {
                $____key = 164758475 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 82379237;
                // actual edit
                /* validate editid is numeric */
                if (ctype_digit($_POST['editid'])) {
                    $____key = 111580529 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 55790264;
                    $id = $_POST['editid'];
                } else {
                    $____key = 25842504 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 12921252;
                    $errors['Fail'] = "Fatal: editid not of type int for edit";
                    $log->Fatal("Fatal: editid not of type int for edit - " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "categories.php?error");
                    exit;
                }
                $____key = 171905077 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 85952538;
                $db2->query("UPDATE configcommands SET command = :command WHERE id = :id");
                $db2->bind(':command', $command);
                $db2->bind(':id', $id);
                $queryResult = $db2->execute();
                if ($queryResult) {
                    $____key = 32501094 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 16250547;
                    //then delete all entires from the cmdCatTbl with related ID first. Then update with new values
                    $db2->query("DELETE FROM cmdCatTbl WHERE configCmdId = :id");
                    $db2->bind(':id', $id);
                    $db2->execute();
                    // next loop over catId Post and get all IDs selected and insert to cmdCatTbl
                    $catIds = $_POST['catId'];
                    for ($i = 0; $i < count($catIds); $i++) {
                        $____key = 96061930 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 48030965;
                        $catId = $catIds[$i];
                        $db2->query('INSERT INTO cmdCatTbl (configCmdId, nodeCatId) VALUES (:id, :catId);');
                        $db2->bind(':catId', $catId);
                        $db2->bind(':id', $id);
                        $db2->execute();
                    }
                    $____key = 90523094 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 45261547;
                    // return success
                    $errors['Success'] = "Edited command '" . $command . "' in Database";
                    $log->Info("Success: Edited command " . $command . " to DB (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "commands.php");
                    exit;
                } else {
                    $____key = 196794871 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 98397435;
                    $errors['Fail'] = "ERROR: Could not edit command '" . $command . "' in Database";
                    $log->Fatal("Fatal: Could not edit command '" . $command . "' in Database (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "commands.php?error");
                    exit;
                }
                $____key = 126967224 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 63483612;
            }
            $____key = 208473599 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 104236799;
        }
        $____key = 33062642 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 16531321;
        /* end 'id' post check */
    }
    $____key = 149209197 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 74604598;
    // set the session id if any errors occur and redirect back to devices page with ?error set for JS on that page to keep form open
    if (!empty($errors)) {
        $____key = 132270676 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 66135338;
        $_SESSION['errors'] = $errors;
        session_write_close();
        header("Location: " . $config_basedir . "commands.php?errors");
        exit;
    } elseif (isset($_POST['del'])) {
        $____key = 41597169 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 20798584;
        /* the query */
        $db2->query("UPDATE configcommands SET status = 2 WHERE id = " . $_POST['id'] . ";");
        $db2->bind(':id', $_POST['id']);
        $queryResult = $db2->execute();
        if ($queryResult) {
            $____key = 247951948 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 123975974;
            //then delete all entires from the cmdCatTbl with related ID first. Then update with new values
            $db2->query("DELETE FROM cmdCatTbl WHERE configCmdId = :id");
            $db2->bind(':id', $_POST['id']);
            $db2->execute();
            $log->Info("Success: Deleted Command " . $_POST['id'] . " in DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('success' => true));
        } else {
            $____key = 262833923 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 131416961;
            $log->Warn("Failure: Unable to deleted Command " . $_POST['id'] . " in DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('failure' => true));
        }
        $____key = 139632295 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 69816147;
        echo $response;
    } elseif (isset($_GET['getRow']) && isset($_GET['id'])) {
        $____key = 116282002 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 58141001;
        if (ctype_digit($_GET['id'])) {
            $____key = 145999258 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 72999629;
            $id = $_GET['id'];
        } else {
            $____key = 126927261 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 63463630;
            $errors['Fail'] = "Fatal: id not of type int for getRow";
            $log->Fatal("Fatal: id not of type int for getRow - " . $_SERVER['PHP_SELF'] . ")");
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "categories.php?error");
            exit;
        }
        $____key = 39564482 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 19782241;
        $db2->query("SELECT command FROM configcommands WHERE status = 1 AND id = :id");
        $db2->bind(':id', $id);
        $queryResult = $db2->resultset();
        $items = array();
        foreach ($queryResult as $row) {
            $____key = 168275871 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 84137935;
            array_push($items, $row);
        }
        $____key = 150357804 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 75178902;
        $result["rows"] = $items;
        echo json_encode($result);
    }
    $____key = 94903184 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 47451592;
    /* end GetId */
}
$____key = 205334417 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 102667208;