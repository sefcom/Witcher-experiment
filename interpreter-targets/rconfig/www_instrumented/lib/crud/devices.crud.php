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
$____key = 259811964 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 129905982;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 96201076 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 48100538;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 86959149 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 43479574;
    require_once "../../../classes/db2.class.php";
    $db2 = new db2();
    $log = ADLog::getInstance();
    /* Add Custom Property Here */
    if (isset($_POST['add'])) {
        $____key = 263423917 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 131711958;
        $errors = array();
        // validate deviceName field
        if (!empty($_POST['deviceName'])) {
            $____key = 64707707 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 32353853;
            $deviceName = $_POST['deviceName'];
            $deviceName = cleanDeviceName($deviceName);
            // check device name for whitespace
            if (!chkWhiteSpaceInStr($deviceName) === false) {
                $____key = 246514345 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 123257172;
                $errors['deviceName'] = "Device Name cannot contain spaces";
                $log->Warn("Failure: Device Name cannot contain spaces (File: " . $_SERVER['PHP_SELF'] . ")");
                $deviceName = "";
                // set back to blank so text with spaces is not returned to devices form
            }
            $____key = 95503090 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 47751545;
        } else {
            $____key = 220684499 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 110342249;
            $errors['deviceName'] = "Device Name cannot be empty";
            $log->Warn("Failure: Device Name cannot be empty (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 253713612 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 126856806;
        if (!empty($_POST['deviceIpAddr'])) {
            $____key = 16705385 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 8352692;
            // validate deviceIpAddr IP address
            if (!filter_var($_POST['deviceIpAddr'], FILTER_VALIDATE_IP)) {
                $____key = 12323115 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 6161557;
                $errors['deviceIpAddr'] = "IP Address is not valid ";
                $log->Warn("Failure: IP Address is not valid (File: " . $_SERVER['PHP_SELF'] . ")");
            } else {
                $____key = 195074124 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 97537062;
                $deviceIpAddr = $_POST['deviceIpAddr'];
            }
            $____key = 13262543 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 6631271;
        } else {
            $____key = 31649487 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 15824743;
            $errors['deviceIpAddr'] = "IP Address cannot be empty ";
            $log->Warn("Failure: IP Address cannot be empty (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 31345503 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 15672751;
        // validate devicePrompt field
        if (!empty($_POST['devicePrompt'])) {
            $____key = 104410076 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 52205038;
            $devicePrompt = $_POST['devicePrompt'];
        } else {
            $____key = 114232673 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 57116336;
            $errors['devicePrompt'] = "Device Prompt cannot be empty";
            $log->Warn("Failure: Device Prompt cannot be empty (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 235875807 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 117937903;
        // validate deviceEnablePrompt field
        $deviceEnablePrompt = str_replace(' ', '', $_POST['deviceEnablePrompt']);
        // validate vendorId field
        if (!empty($_POST['vendorId']) && ctype_digit($_POST['vendorId'])) {
            $____key = 84301831 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 42150915;
            $vendorId = $_POST['vendorId'];
        } else {
            $____key = 226258763 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 113129381;
            $errors['vendorId'] = "Vendor field cannot be empty";
            $log->Warn("Failure: Vendor Field cannot be empty (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 77547047 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 38773523;
        // validate deviceModel field
        if (!empty($_POST['deviceModel'])) {
            $____key = 172070546 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 86035273;
            $deviceModel = $_POST['deviceModel'];
        } else {
            $____key = 230245879 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 115122939;
            $errors['deviceModel'] = "Device Model cannot be empty";
            $log->Warn("Failure: Device Model cannot be empty (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 229243402 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 114621701;
        // validate defaultCreds check boxes
        if (isset($_POST['defaultCreds'])) {
            $____key = 27146399 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 13573199;
            $defaultCreds = '1';
        } else {
            $____key = 27150558 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 13575279;
            $defaultCreds = '0';
        }
        $____key = 119487670 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 59743835;
        // validate deviceUsername field
        if (!empty($_POST['deviceUsername']) && is_string($_POST['deviceUsername'])) {
            $____key = 250798126 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 125399063;
            $deviceUsername = $_POST['deviceUsername'];
        } else {
            $____key = 215780110 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 107890055;
            $deviceUsername = '';
        }
        $____key = 195510137 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 97755068;
        // check if PW encryption enabled
        $db2->query("SELECT passwordEncryption from settings");
        $encryptionEnabled = false;
        if ($db2->resultsetCols()[0] == 1) {
            $____key = 245288424 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 122644212;
            $encryptionEnabled = true;
        }
        $____key = 8775002 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 4387501;
        // validate devicePassword field
        if (!empty($_POST['devicePassword']) && is_string($_POST['devicePassword'])) {
            $____key = 198439722 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 99219861;
            if ($encryptionEnabled == true) {
                $____key = 15945763 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 7972881;
                $devicePassword = encrypt_decrypt('encrypt', $_POST['devicePassword']);
            } else {
                $____key = 82369946 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 41184973;
                $devicePassword = $_POST['devicePassword'];
            }
            $____key = 63826493 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 31913246;
        } else {
            $____key = 66996384 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 33498192;
            $devicePassword = '';
        }
        $____key = 232882845 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 116441422;
        // validate devicePassword field
        if (!empty($_POST['deviceEnablePassword']) && is_string($_POST['deviceEnablePassword'])) {
            $____key = 143226175 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 71613087;
            if ($encryptionEnabled == true) {
                $____key = 61132608 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 30566304;
                $deviceEnablePassword = encrypt_decrypt('encrypt', $_POST['deviceEnablePassword']);
            } else {
                $____key = 118913824 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 59456912;
                $deviceEnablePassword = $_POST['deviceEnablePassword'];
            }
            $____key = 1806751 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 903375;
        } else {
            $____key = 134378745 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 67189372;
            $deviceEnablePassword = '';
        }
        $____key = 9147474 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 4573737;
        // validate vendorId field
        if (!empty($_POST['templateId']) && ctype_digit($_POST['templateId'])) {
            $____key = 265221480 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 132610740;
            $templateId = $_POST['templateId'];
        } else {
            $____key = 248622072 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 124311036;
            $errors['templateId'] = "Template field cannot be empty";
            $log->Warn("Failure: Template Field cannot be empty (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 219324273 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 109662136;
        // validate catId field
        if (ctype_digit($_POST['catId'])) {
            $____key = 88947959 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 44473979;
            $catId = $_POST['catId'];
        } else {
            $____key = 167632734 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 83816367;
            $errors['catId'] = "Category field cannot be empty";
            $log->Warn("Failure: Category field did not pass numeric value i.e. catId OR awas empty (File: " . $_SERVER['PHP_SELF'] . ")");
            $catId = '';
        }
        $____key = 123760854 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 61880427;
        if (isset($_POST['username'])) {
            $____key = 36385232 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 18192616;
            $username = $_POST['username'];
        } else {
            $____key = 150709801 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 75354900;
            $errors['username'] = "Username passed to devices.crud.php was not valid";
            $log->Warn("Failure: Username passed to devices.crud.php was not valid (File: " . $_SERVER['PHP_SELF'] . ")");
        }
        $____key = 237307189 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 118653594;
        /* See if category is added to any scheduled tasks and get correct column name if it is */
        $db2->query("SELECT id, catId FROM tasks WHERE status = '1'");
        $resultCatSelect = $db2->resultset();
        $taskIdColumns = '';
        $taskValue = '';
        foreach ($resultCatSelect as $taskRow) {
            $____key = 203328365 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 101664182;
            if (!empty($taskRow['catId'])) {
                $____key = 144717290 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 72358645;
                $catIdArray = unserialize($taskRow['catId']);
                if (gettype($catIdArray) == 'string') {
                    $____key = 176259921 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 88129960;
                    // if value return is a string and not an array, convert it
                    $catIdArray = explode(',', $catIdArray);
                }
                $____key = 61995014 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 30997507;
            }
            $____key = 178519796 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 89259898;
            if (!empty($taskRow['catId']) && is_array($taskRow) && in_array($catId, $catIdArray)) {
                $____key = 226114980 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 113057490;
                $taskIdColumns .= "taskId" . $taskRow['id'] . ", ";
                $taskValue .= "'1',";
            }
            $____key = 36866913 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 18433456;
        }
        $____key = 40092717 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 20046358;
        // set the session id if any errors occur and redirect back to devices page with ?error set for JS on that page to keep form open
        if (!empty($errors)) {
            $____key = 208504587 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 104252293;
            if (isset($deviceName)) {
                $____key = 192013864 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 96006932;
                $_SESSION['deviceName'] = $deviceName;
            }
            $____key = 198109806 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 99054903;
            if (isset($deviceIpAddr)) {
                $____key = 253080947 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 126540473;
                $_SESSION['deviceIpAddr'] = $deviceIpAddr;
            }
            $____key = 233177666 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 116588833;
            if (isset($devicePrompt)) {
                $____key = 75125106 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 37562553;
                $_SESSION['devicePrompt'] = $devicePrompt;
            }
            $____key = 67717463 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 33858731;
            if (isset($deviceEnablePrompt)) {
                $____key = 105472091 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 52736045;
                $_SESSION['deviceEnablePrompt'] = $deviceEnablePrompt;
            }
            $____key = 51008557 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 25504278;
            if (isset($vendorId)) {
                $____key = 124693123 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 62346561;
                $_SESSION['vendorId'] = $vendorId;
            }
            $____key = 51586635 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 25793317;
            if (isset($deviceModel)) {
                $____key = 232442396 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 116221198;
                $_SESSION['deviceModel'] = $deviceModel;
            }
            $____key = 101568826 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 50784413;
            if (isset($defaultCreds)) {
                $____key = 254682419 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 127341209;
                $_SESSION['defaultCreds'] = $defaultCreds;
            }
            $____key = 111390673 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 55695336;
            if (isset($deviceUsername)) {
                $____key = 111252360 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 55626180;
                $_SESSION['deviceUsername'] = $deviceUsername;
            }
            $____key = 116223124 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 58111562;
            if (isset($devicePassword)) {
                $____key = 193207009 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 96603504;
                $_SESSION['devicePassword'] = $devicePassword;
            }
            $____key = 152044255 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 76022127;
            if (isset($deviceEnablePassword)) {
                $____key = 20658170 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 10329085;
                $_SESSION['deviceEnablePassword'] = $deviceEnablePassword;
            }
            $____key = 41480553 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 20740276;
            if (isset($catId)) {
                $____key = 77294036 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 38647018;
                $_SESSION['catId'] = $catId;
            }
            $____key = 3122887 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 1561443;
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "devices.php?error");
            exit;
        } else {
            $____key = 125144102 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 62572051;
            // Search POST for any key with partial string 'custom_' to get the names of the
            // custom fields column names in DB
            $custom_results = array();
            foreach ($_POST as $k => $v) {
                $____key = 64554137 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 32277068;
                if (strstr($k, 'custom_')) {
                    $____key = 45395831 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 22697915;
                    // create new 'custom_results' array with key and values from the post matching 'custom'
                    $custom_results[$k] = $v;
                }
                $____key = 61956405 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 30978202;
            }
            $____key = 80668807 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 40334403;
            /* http://php.net/manual/en/function.extract.php */
            /* Extract Keys as Column Names for dynamic Query
             * and extract values as DB values for dynamic query */
            $dynamicValues = array();
            $dynamicTbls = array();
            $customPropEditQueryStr = '';
            foreach ($custom_results as $key => $value) {
                $____key = 142339242 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 71169621;
                $customPropEditQueryStr .= $key . " = " . "'" . $value . "', ";
                // create the edit query for any custom properties fields
                array_push($dynamicValues, $value);
                array_push($dynamicTbls, $key);
            }
            $____key = 70060505 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 35030252;
            // Output above arrays to simple string variables for use in the query
            $dynamicValuesBlk = implode("', '", $dynamicValues);
            $dynamicTblsBlk = implode(", ", $dynamicTbls);
            // create part of the UPDATE query for custom_ fields
            $customPropQueryStr = "";
            foreach ($custom_results as $k => $v) {
                $____key = 100553809 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 50276904;
                $customPropQueryStr = $customPropQueryStr . $k . " = '" . $v . "', ";
            }
            $____key = 145894237 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 72947118;
            // next if vars are not empty, add a comma to complete SQL statement
            // because if no custom props, or Tasks added errors will occur
            if (!empty($dynamicTblsBlk)) {
                $____key = 81011826 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 40505913;
                $dynamicTblsBlk = $dynamicTblsBlk . ",";
                if (empty($dynamicValuesBlk)) {
                    $____key = 81067564 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 40533782;
                    $dynamicValuesBlk = "NULL" . ",";
                } else {
                    $____key = 149742639 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 74871319;
                    if (!empty($dynamicValuesBlk)) {
                        $____key = 23674147 ^ $GLOBALS["____instr"]["prev"];
                        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                        $GLOBALS["____instr"]["map"][$____key] += 1;
                        $GLOBALS["____instr"]["prev"] = 11837073;
                        $dynamicValuesBlk = "'" . $dynamicValuesBlk . "',";
                    }
                    $____key = 225643641 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 112821820;
                }
                $____key = 252396029 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 126198014;
            }
            $____key = 124344461 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 62172230;
            if (!empty($taskIdColumns)) {
                $____key = 225879967 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 112939983;
                //            $taskIdColumns = $taskIdColumns . ",";
            }
            $____key = 255529943 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 127764971;
            if (!empty($taskValue)) {
                $____key = 231688226 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 115844113;
                $taskValue = $taskValue;
            } else {
                $____key = 173023143 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 86511571;
                $taskValue = '';
            }
            $____key = 243675786 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 121837893;
            /* Begin DB query. This will either be an Insert if $_POST ID is not set - or an edit/Update if ID is set in POST */
            if (empty($_POST['editid'])) {
                $____key = 225052362 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 112526181;
                $db2->query("INSERT INTO nodes\n                (deviceName, \n                deviceIpAddr,\n                devicePrompt,\n                deviceEnablePrompt,\n                deviceUsername,\n                devicePassword,\n                deviceEnablePassword,\n                templateId,\n                model,\n                vendorId,\n                nodeCatId,\n                nodeAddedBy,\n                defaultCreds,\n                " . $dynamicTblsBlk . "\n                " . $taskIdColumns . "\n                deviceDateAdded,\n                status\n                )\n                VALUES \n                    (:deviceName,\n                    :deviceIpAddr,\n                    :devicePrompt,\n                    :deviceEnablePrompt,\n                    :deviceUsername,\n                    :devicePassword,\n                    :deviceEnablePassword,\n                    :templateId,\n                    :deviceModel,\n                    :vendorId,\n                    :catId,\n                    :username,\n                    :defaultCreds,\n                    {$dynamicValuesBlk}\n                    {$taskValue}\n                    CURDATE(),\n                    '1')");
                var_dump($taskValue);
                $db2->bind(':deviceName', $deviceName);
                $db2->bind(':deviceIpAddr', $deviceIpAddr);
                $db2->bind(':devicePrompt', $devicePrompt);
                $db2->bind(':deviceEnablePrompt', $deviceEnablePrompt);
                $db2->bind(':deviceUsername', $deviceUsername);
                $db2->bind(':devicePassword', $devicePassword);
                $db2->bind(':deviceEnablePassword', $deviceEnablePassword);
                $db2->bind(':templateId', $templateId);
                $db2->bind(':deviceModel', $deviceModel);
                $db2->bind(':vendorId', $vendorId);
                $db2->bind(':catId', $catId);
                $db2->bind(':username', $username);
                $db2->bind(':defaultCreds', $defaultCreds);
                $queryResult = $db2->execute();
                if ($queryResult) {
                    $____key = 119359186 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 59679593;
                    $errors['Success'] = "Added new device " . $deviceName . " to Database";
                    $log->Info("Success: Added new device, " . $deviceName . " to DB (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "devices.php");
                } else {
                    $____key = 198784759 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 99392379;
                    $errors['Fail'] = "ERROR: Could not Insert Record to Database, Check Logs";
                    $log->Fatal("Fatal: Error executing Node Insert (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "devices.php?error");
                    exit;
                }
                $____key = 15503073 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 7751536;
            } else {
                $____key = 228636628 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 114318314;
                // if ID is set in post when running a save from the form do an UPDATE
                $id = $_POST['editid'];
                // reset all taskID*  columns to 2 before updating them in the UPDATE query for correct taskId assignments
                $db2->query("SELECT column_name FROM information_schema.COLUMNS c\n                        WHERE c.table_schema = 'rconfig35' \n                        AND c.table_name='nodes' \n                        AND c.column_name LIKE '%taskId%'");
                $taskColNames = $db2->resultsetCols();
                foreach ($taskColNames as $taskColName) {
                    $____key = 214761174 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 107380587;
                    $db2->query("UPDATE nodes SET " . $taskColName . " = 2 WHERE id = :id");
                    $db2->bind(":id", $id);
                    $db2->execute();
                }
                $____key = 110931333 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 55465666;
                // updated taskId Columns partial query for the update statement
                //  explode to array for previously built string. array_filter to remove blanks
                // array_flip to move all values from $taskIdColumns to key names
                $taskIdColumns = rtrim($taskIdColumns, ", ");
                // delete last comma and space
                $taskIdColumns = array_flip(array_filter(explode(",", $taskIdColumns)));
                // set all values in array to 1 as these are the correct taskId assignments for this device when updating
                $taskIdColumns = array_fill_keys(array_keys($taskIdColumns), 1);
                //iterate over $taskIdColumn array and chnage it to a string for the sql update
                $prefix = '';
                $taskIdColumnList = '';
                foreach ($taskIdColumns as $taskIdColumnK => $taskIdColumnV) {
                    $____key = 97620588 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 48810294;
                    $taskIdColumnList .= $prefix . $taskIdColumnK . ' = ' . $taskIdColumnV;
                    $prefix = ', ';
                }
                $____key = 78926955 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 39463477;
                // add a trailing comma if the $taskIdColumnList is not empty, otherwise the query is broken
                if ($taskIdColumnList != '') {
                    $____key = 4262864 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 2131432;
                    $taskIdColumnList = $taskIdColumnList . ',';
                }
                $____key = 131771753 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 65885876;
                echo '<pre>';
                echo 'test';
                $db2->query("UPDATE nodes SET \n                            deviceName = :deviceName,\n                            deviceIpAddr = :deviceIpAddr,\n                            devicePrompt = :devicePrompt,\n                            deviceEnablePrompt = :deviceEnablePrompt,\n                            deviceUsername = :deviceUsername, \n                            devicePassword = :devicePassword, \n                            deviceEnablePassword = :deviceEnablePassword, \n                            templateId = :templateId, \n                            model = :deviceModel, \n                            vendorId = :vendorId, \n                            nodeCatId = :catId, \n                            defaultCreds = :defaultCreds,\n                            {$customPropEditQueryStr}\n                            {$taskIdColumnList}\n                            deviceDateAdded = CURDATE()\n                            WHERE id = :id");
                $db2->bind(':deviceName', $deviceName);
                $db2->bind(':deviceIpAddr', $deviceIpAddr);
                $db2->bind(':devicePrompt', $devicePrompt);
                $db2->bind(':deviceEnablePrompt', $deviceEnablePrompt);
                $db2->bind(':deviceUsername', $deviceUsername);
                $db2->bind(':devicePassword', $devicePassword);
                $db2->bind(':deviceEnablePassword', $deviceEnablePassword);
                $db2->bind(':templateId', $templateId);
                $db2->bind(':deviceModel', $deviceModel);
                $db2->bind(':vendorId', $vendorId);
                $db2->bind(':catId', $catId);
                $db2->bind(':defaultCreds', $defaultCreds);
                $db2->bind(':id', $id);
                $db2->debugDumpParams();
                $queryResult = $db2->execute();
                if ($queryResult) {
                    $____key = 85110133 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 42555066;
                    $errors['Success'] = "Edit device " . $deviceName . " successful";
                    $log->Info("Success: Edit device " . $deviceName . " in DB successful (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "devices.php");
                } else {
                    $____key = 17265611 ^ $GLOBALS["____instr"]["prev"];
                    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                    $GLOBALS["____instr"]["map"][$____key] += 1;
                    $GLOBALS["____instr"]["prev"] = 8632805;
                    $errors['Fail'] = "ERROR: Could not Edit device " . $deviceName;
                    $log->Fatal("Fatal: ERROR: Could not Edit device " . $deviceName . " (File: " . $_SERVER['PHP_SELF'] . ")");
                    $_SESSION['errors'] = $errors;
                    session_write_close();
                    header("Location: " . $config_basedir . "devices.php?error");
                    exit;
                }
                $____key = 220528193 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 110264096;
            }
            $____key = 266298240 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 133149120;
            /* end check if 'id' is iset in input field */
        }
        $____key = 105763054 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 52881527;
        /* end '!empty($errors)' check */
    } elseif (isset($_POST['del'])) {
        $____key = 122864897 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 61432448;
        /* the query */
        $q = "UPDATE nodes SET status = 2 WHERE id = " . $_POST['id'] . ";";
        $db2->query("UPDATE nodes SET status = 2 WHERE id = :id");
        $db2->bind(':id', $_POST['id']);
        $result = $db2->execute();
        if ($result) {
            $____key = 75241632 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 37620816;
            $log->Info("Success: Deleted Node ID = " . $_POST['id'] . " in DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('success' => true));
        } else {
            $____key = 23740530 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 11870265;
            $log->Warn("Failure: Unable to delete node id:" . $_POST['id'] . " in DB (File: " . $_SERVER['PHP_SELF'] . ")");
            $response = json_encode(array('failure' => true));
        }
        $____key = 139187085 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 69593542;
        echo $response;
    } elseif (isset($_GET['getRow']) && isset($_GET['id'])) {
        $____key = 248944474 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 124472237;
        if (ctype_digit($_GET['id'])) {
            $____key = 103894937 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 51947468;
            $id = $_GET['id'];
        } else {
            $____key = 195933936 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 97966968;
            $errors['Fail'] = "Fatal: id not of type int for getRow";
            $log->Fatal("Fatal: id not of type int for getRow - " . $_SERVER['PHP_SELF'] . ")");
            $_SESSION['errors'] = $errors;
            session_write_close();
            header("Location: " . $config_basedir . "devices.php?error");
            exit;
        }
        $____key = 158207204 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 79103602;
        /* first get custom fieldnames  and impode to create part of final SQL query */
        $db2->query("SELECT customProperty FROM customProperties");
        $qCustProp = $db2->resultset();
        $items = array();
        foreach ($qCustProp as $row) {
            $____key = 147159015 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 73579507;
            $customProperty = $row['customProperty'];
            array_push($items, $customProperty);
            $customProp_string = implode(", ", $items) . ', ';
        }
        $____key = 175331986 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 87665993;
        $db2->query("SELECT \n                    n.id,\n                    n.deviceName,\n                    n.deviceIpAddr,\n                    n.devicePrompt,\n                    n.deviceEnablePrompt,\n                    v.id vendorId,\n                    n.model,\n                    n.defaultCreds,\n                    n.deviceUsername,\n                    n.templateId,\n                    " . $customProp_string . "\n                    cat.id catId\n\t\tFROM nodes n\n\t\tLEFT OUTER JOIN vendors v ON n.vendorId = v.id\n\t\tLEFT OUTER JOIN categories c ON n.nodeCatId = c.id\n\t\tLEFT OUTER JOIN categories cat ON n.nodeCatId = cat.id\n\t\tWHERE n.status = 1\n\t\tAND n.id = :id");
        $db2->bind(':id', $id);
        $qSelectnodeData = $db2->resultset();
        $items = array();
        foreach ($qSelectnodeData as $row) {
            $____key = 256867166 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 128433583;
            array_push($items, $row);
        }
        $____key = 1332481 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 666240;
        $result["rows"] = $items;
        echo json_encode($result);
    }
    $____key = 252554500 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 126277250;
    /* end GetId */
}
$____key = 95906144 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 47953072;