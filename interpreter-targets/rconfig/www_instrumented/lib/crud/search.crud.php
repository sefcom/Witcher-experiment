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
$____key = 147678629 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 73839314;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 159554370 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 79777185;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 210543555 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 105271777;
    require_once "../../../classes/db2.class.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    // simple script runtime check
    $Start = getTime();
    $errors = array();
    if (isset($_GET['searchTerm']) && is_string($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
        $____key = 238169429 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 119084714;
        /* validation */
        $searchTerm = '"' . $_GET['searchTerm'] . '"';
        $catId = $_GET['catId'];
        $catCommand = $_GET['catCommand'];
        $nodeId = $_GET['nodeId'];
        $grepNumLineStr = $_GET['numLinesStr'];
        $grepNumLine = $_GET['noLines'];
        $username = $_SESSION['username'];
        // if nodeId was empty set it to blank
        if (empty($nodeId)) {
            $____key = 242011626 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 121005813;
            $nodeId = '';
        } else {
            $____key = 139576694 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 69788347;
            $nodeId = '/' . $nodeId . '/';
        }
        $____key = 204144158 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 102072079;
        $returnArr = array();
        // Get the category Name from the Category selected
        $db2->query("SELECT categoryName from `categories` WHERE id = :catId");
        $db2->bind(':catId', $catId);
        $resultCat = $db2->resultset();
        $returnArr['category'] = $resultCat[0]['categoryName'];
        // get total file count
        $fileCount = array();
        $subDir = "";
        if (!empty($returnArr['category'])) {
            $____key = 232309847 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 116154923;
            $subDir = "/" . $returnArr['category'];
        }
        $____key = 210999233 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 105499616;
        exec("find /home/rconfig/data" . $subDir . $nodeId . " -maxdepth 10 -type f | wc -l", $fileCountArr);
        $returnArr['fileCount'] = $fileCountArr['0'];
        //next find all instances of the search term under the specific cat/dir
        $command = 'find /home/rconfig/data' . $subDir . $nodeId . ' -name ' . $catCommand . ' | xargs grep -il ' . $grepNumLineStr . ' ' . $searchTerm . ' | while read file ; do echo File:"$file"; grep ' . $grepNumLineStr . ' ' . $searchTerm . ' "$file" ; done';
        // echo $command;die();
        exec($command, $searchArr);
        if (!empty($searchArr)) {
            $____key = 29368926 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 14684463;
            // iterate array for all lines begining with 'File:' and add to $lines array
            // this is to create a multidimensional array for each files output
            foreach ($searchArr as $key => $val) {
                $____key = 150618726 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 75309363;
                if (substr($val, 0, 5) == 'File:') {
                    $____key = 98254818 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 49127409;
                    $lines[] = $key;
                }
                $____key = 169852257 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 84926128;
            }
            $____key = 236869742 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 118434871;
            // count the difference in keys between first and second keys this gives the actual line count from 'File:' to 'File:' line from the grep output
            if (count($lines) > 1) {
                $____key = 45760014 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 22880007;
                $lineCnt = $lines[1] - $lines[0];
                $searchArr = array_chunk($searchArr, $lineCnt);
                // create mDimension array for the value of $lineCnt for each device
            } else {
                $____key = 154213058 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 77106529;
                if (count($lines) == 1) {
                    $____key = 253763652 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 126881826;
                    $searchArr = array_chunk($searchArr, count($searchArr));
                }
                $____key = 228525623 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 114262811;
            }
            $____key = 18300966 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 9150483;
            $output = array();
            foreach ($searchArr as $line) {
                $____key = 110689960 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 55344980;
                $val = $line[0];
                if (substr($val, 0, 5) == 'File:') {
                    $____key = 259890707 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 129945353;
                    // replace everything before deviceName returned
                    $firstChkDevName = str_replace("File:/home/rconfig/data" . $subDir . "/", "", $val);
                    //Remove everything after the first '/'
                    $deviceName = substr($firstChkDevName, 0, strpos($firstChkDevName, "/"));
                    // replace everything before date returned
                    $firstChkDate = str_replace("File:/home/rconfig/data" . $subDir . "/" . $deviceName . "/", "", $val);
                    //Remove everything after the first '/'
                    $date = explode("/", $firstChkDate);
                    $date = $date['0'] . "-" . $date['1'] . "-" . $date['2'];
                    // get filePath
                    $filePath = substr($val, 5);
                }
                $____key = 116719980 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 58359990;
                $textOut = array();
                foreach ($line as $l) {
                    $____key = 15088207 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 7544103;
                    if (substr($l, 0, 5) == 'File:') {
                        $____key = 157398715 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 78699357;
                        unset($l);
                        // unset line beginning with 'File:'
                    } else {
                        $____key = 256611648 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 128305824;
                        array_push($textOut, $l . "<br/>");
                    }
                    $____key = 160397425 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 80198712;
                }
                $____key = 264423232 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 132211616;
                $newSearchArr = array("device" => $deviceName, "filePath" => $filePath, "date" => $date, "lines" => $textOut);
                array_push($output, $newSearchArr);
            }
            $____key = 171616416 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 85808208;
            $End = getTime();
            $returnArr['timeTaken'] = number_format($End - $Start, 2);
            $returnArr['searchResult'] = $output;
        } else {
            $____key = 223315422 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 111657711;
            $returnArr['searchResult'] = 'Empty';
        }
        $____key = 33217492 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 16608746;
        echo json_encode($returnArr);
    } else {
        $____key = 228560700 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 114280350;
        //searchTerm was not filed in, and so end back error and kill script
        $errors['searchTerm'] = "Search Field cannot be empty or is incorrect format ";
        $log->Warn("Failure: Search Field cannot be empty or is incorrect format(File: " . $_SERVER['PHP_SELF'] . ")");
        $_SESSION['errors'] = $errors;
        session_write_close();
        header("Location: " . $config_basedir . "search.php?error");
        exit;
    }
    $____key = 14638396 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 7319198;
}
$____key = 84953244 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 42476622;