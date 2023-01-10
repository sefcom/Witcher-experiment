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
$____key = 173362464 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 86681232;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 260244195 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 130122097;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 158936850 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 79468425;
    require_once "../../../classes/db2.class.php";
    require_once "../../../classes/imageResize.class.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    /* Add Vendors Here */
    if (isset($_POST['add'])) {
        $____key = 249647632 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 124823816;
        $errors = array();
        if (!empty($_POST['vendorName'])) {
            $____key = 32899654 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 16449827;
            /* Validate Input from Form */
            if (!ctype_alnum($_POST['vendorName'])) {
                $____key = 233474223 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 116737111;
                $errors['vendorName'] = "Input was not a valid string - alphaNumeric Characters only, and no spaces!";
                $log->Warn("Failure: categoryName Input was not a valid string! (File: " . $_SERVER['PHP_SELF'] . ")");
            }
            $____key = 159777607 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 79888803;
            if (!empty($errors)) {
                $____key = 134387352 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 67193676;
                $_SESSION['errors'] = $errors;
                session_write_close();
                header("Location: " . $config_basedir . "vendors.php?error");
                exit;
            } else {
                $____key = 220415817 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 110207908;
                $vendorName = $_POST['vendorName'];
            }
            $____key = 21244383 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 10622191;
            // var_dump($_FILES);die();
            if (!empty($_FILES["vendorLogo"]["name"])) {
                $____key = 13531982 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 6765991;
                if ($_FILES["vendorLogo"]["type"] == "image/gif" || $_FILES["vendorLogo"]["type"] == "image/jpeg" || $_FILES["vendorLogo"]["type"] == "image/jpg" || $_FILES["vendorLogo"]["type"] == "image/pjpeg" || $_FILES["vendorLogo"]["type"] == "image/png" && $_FILES["vendorLogo"]["size"] < 20000) {
                    $____key = 178092470 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 89046235;
                    if ($_FILES["vendorLogo"]["error"] > 0) {
                        $____key = 74603304 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 37301652;
                        $errors['fileError'] = "File Error Return Code: " . $_FILES["vendorLogo"]["error"];
                        $log->Warn("File Error Return Code: " . $_FILES["vendorLogo"]["error"] . " (File: " . $_SERVER['PHP_SELF'] . ")");
                    } else {
                        $____key = 201901600 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 100950800;
                        $filename = $config_basedir . "images/vendor/" . $_FILES["vendorLogo"]["name"];
                        $location = $config_app_basedir . "www/images/vendor/" . $_FILES["vendorLogo"]["name"];
                        if (file_exists($location)) {
                            $____key = 41089273 ^ $GLOBALS["____instr"]["prev"];
                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                            $GLOBALS["____instr"]["map"][$____key] += 1;
                            $GLOBALS["____instr"]["prev"] = 20544636;
                            $log->Warn("Failure: " . $_FILES["vendorLogo"]["name"] . " already exists (File: " . $_SERVER['PHP_SELF'] . ")");
                        } else {
                            $____key = 51663067 ^ $GLOBALS["____instr"]["prev"];
                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                            $GLOBALS["____instr"]["map"][$____key] += 1;
                            $GLOBALS["____instr"]["prev"] = 25831533;
                            if (!copy($_FILES['vendorLogo']['tmp_name'], $location)) {
                                $____key = 26985223 ^ $GLOBALS["____instr"]["prev"];
                                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                                $GLOBALS["____instr"]["map"][$____key] += 1;
                                $GLOBALS["____instr"]["prev"] = 13492611;
                                $errors['fileInvalid'] = "Upload Failed";
                                $log->Warn("Failure: Invalid File(File: " . $_SERVER['PHP_SELF'] . ")");
                                $_SESSION['errors'] = $errors;
                                session_write_close();
                                header("Location: " . $config_basedir . "vendors.php?error");
                                exit;
                            }
                            $____key = 256235827 ^ $GLOBALS["____instr"]["prev"];
                            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                            $GLOBALS["____instr"]["map"][$____key] += 1;
                            $GLOBALS["____instr"]["prev"] = 128117913;
                            // *** 1) Initialize / load image
                            $resizeObj = new resize($location);
                            // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                            $resizeObj->resizeImage(16, 16, 'auto');
                            // *** 3) Save image
                            $resizeObj->saveImage($location, 100);
                        }
                        $____key = 118053333 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 59026666;
                    }
                    $____key = 44716915 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 22358457;
                } else {
                    $____key = 60224923 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 30112461;
                    $errors['fileInvalid'] = "Invalid File";
                    $log->Warn("Failure: Invalid File(File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "vendors.php?error");
                    exit;
                }
                $____key = 142391598 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 71195799;
            } else {
                $____key = 40736162 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 20368081;
                /* set location variable as defaultImg for later use in SQL statement, reason is user is not obliged to upload a file */
                $filename = "images/logos/rconfig16.png";
            }
            $____key = 222837245 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 111418622;
            /* end validate */
            /* Begin DB query. This will either be an Insert if $_POST editid is not set - or an edit/Update if editid is set in POST */
            if (empty($_POST['editid'])) {
                $____key = 729853 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 364926;
                // do the add/ INSERT
                if (ctype_alnum($vendorName)) {
                    $____key = 77704230 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 38852115;
                    $db2->query("INSERT INTO vendors (vendorName, vendorLogo, status) VALUES (:vendorName, :filename, '1')");
                    $db2->bind(':vendorName', $vendorName);
                    $db2->bind(':filename', $filename);
                    $queryResult = $db2->execute();
                    if ($queryResult) {
                        $____key = 220858077 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 110429038;
                        // if Q was good, send back a sucess to the file
                        $errors['Success'] = "Added new vendor " . $vendorName . " to Database";
                        $log->Info("Success: Added new vendor, " . $vendorName . " to DB (File: " . $_SERVER['PHP_SELF'] . ")");
                        $_SESSION['errors'] = $errors;
                        session_write_close();
                        header("Location: " . $config_basedir . "vendors.php");
                    } else {
                        $____key = 11559335 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 5779667;
                        $errors['Fail'] = "ERROR: Could not add new vendor " . $vendorName . " to Database";
                        $log->Fatal("Fatal: ERROR: Could not add new vendor " . $vendorName . " to Database (File: " . $_SERVER['PHP_SELF'] . ")");
                        $_SESSION['errors'] = $errors;
                        session_write_close();
                        header("Location: " . $config_basedir . "vendors.php?error");
                        exit;
                    }
                    $____key = 152706715 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 76353357;
                } else {
                    $____key = 15075694 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 7537847;
                    $errors['vendorName'] = "Vendor Name Field was not a string";
                    $log->Warn("Failure: vendorName was not a string (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "vendors.php?error");
                    exit;
                }
                $____key = 61286447 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 30643223;
            } else {
                $____key = 124681666 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 62340833;
                // do the UPDATE/EDIT
                if (ctype_alnum($vendorName)) {
                    $____key = 242351941 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 121175970;
                    $id = $_POST['editid'];
                    // if an edit takes place and a new logo is not updated, keep the current logo
                    $db2->query("SELECT vendorLogo FROM vendors WHERE status = 1 AND id = :id");
                    $db2->bind(':id', $id);
                    $queryResult = $db2->resultset();
                    // only update $location if I get a result from above for given vendor ID
                    if (empty($_FILES["vendorLogo"]["name"]) && !empty($queryResult[0])) {
                        $____key = 224031501 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 112015750;
                        // if an image was not chosen to be uploaded & the select query returned a result
                        $location = $queryResult[0]['vendorLogo'];
                    }
                    $____key = 168022450 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 84011225;
                    $db2->query("UPDATE vendors SET vendorName = :vendorName, vendorLogo = :location WHERE id = :id");
                    $db2->bind(':vendorName', $vendorName);
                    $db2->bind(':location', $location);
                    $db2->bind(':id', $id);
                    $queryResult = $db2->execute();
                    if ($queryResult) {
                        $____key = 238880 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 119440;
                        $errors['Sucess'] = "Edited vendor " . $vendorName . " in Database";
                        $log->Info("Success: Edited vendor, " . $vendorName . " in DB (File: " . $_SERVER['PHP_SELF'] . ")");
                        $_SESSION['errors'] = $errors;
                        session_write_close();
                        header("Location: " . $config_basedir . "vendors.php");
                    } else {
                        $____key = 264522536 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 132261268;
                        $errors['Fail'] = "ERROR: Could not edit vendor " . $vendorName . " in Database";
                        $log->Fatal("Fatal: ERROR: Could not edit vendor " . $vendorName . " in Database (File: " . $_SERVER['PHP_SELF'] . ")");
                        $_SESSION['errors'] = $errors;
                        session_write_close();
                        header("Location: " . $config_basedir . "vendors.php?error");
                        exit;
                    }
                    $____key = 164940823 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 82470411;
                } else {
                    $____key = 246339042 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 123169521;
                    $errors['vendorName'] = "Vendor Name Field was not a string";
                    $log->Warn("Failure: vendorName was not a string (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "vendors.php?error");
                    exit;
                }
                $____key = 156626314 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 78313157;
            }
            $____key = 85188968 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 42594484;
            /* end 'id' post check */
        } else {
            $____key = 144047090 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 72023545;
            $errors['vendorName'] = "Vendor Name Field cannot be empty";
            $log->Warn("Failure: vendorName was empty(File: " . $_SERVER['PHP_SELF'] . ")");
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "vendors.php?error");
            exit;
        }
        $____key = 177059665 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 88529832;
    } elseif (isset($_POST['del'])) {
        $____key = 90798071 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 45399035;
        if (ctype_digit($_POST['id'])) {
            $____key = 248561381 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 124280690;
            $id = $_POST['id'];
        } else {
            $____key = 72938091 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 36469045;
            $errors['Fail'] = "Fatal: id not of type int for getRow";
            $log->Fatal("Fatal: id not of type int for getRow - " . $_SERVER['PHP_SELF'] . ")");
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "vendors.php?error");
            exit;
        }
        $____key = 150035557 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 75017778;
        /* the query */
        $db2->query("UPDATE vendors SET status = 2 WHERE id = :id");
        $db2->bind(':id', $id);
        $queryResult = $db2->execute();
        if ($queryResult) {
            $____key = 114957425 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 57478712;
            $log->Info("Success: Deleted vendor in DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('success' => true));
        } else {
            $____key = 30696859 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 15348429;
            $log->Warn("Failure: Unable to delete vendor in DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('failure' => true));
        }
        $____key = 217346030 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 108673015;
        echo $response;
    } elseif (isset($_GET['getRow']) && isset($_GET['id'])) {
        $____key = 182864638 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 91432319;
        if (ctype_digit($_GET['id'])) {
            $____key = 254738117 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 127369058;
            $id = $_GET['id'];
        } else {
            $____key = 82164607 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 41082303;
            $errors['Fail'] = "Fatal: id not of type int for getRow";
            $log->Fatal("Fatal: id not of type int for getRow - " . $_SERVER['PHP_SELF'] . ")");
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "categories.php?error");
            exit;
        }
        $____key = 59780496 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 29890248;
        $db2->query("SELECT id, vendorName, vendorLogo FROM vendors WHERE status = 1 AND id = :id");
        $db2->bind(':id', $id);
        $queryResult = $db2->resultset();
        $items = array();
        foreach ($queryResult as $row) {
            $____key = 19031029 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 9515514;
            array_push($items, $row);
        }
        $____key = 254019484 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 127009742;
        $result["rows"] = $items;
        echo json_encode($result);
    }
    $____key = 204959803 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 102479901;
    /* end GetId */
}
$____key = 213276389 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 106638194;