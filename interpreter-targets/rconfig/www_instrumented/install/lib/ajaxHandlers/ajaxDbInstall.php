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
$____key = 244893153 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 122446576;
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['server'])) {
    $____key = 6597141 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 3298570;
    $server = $_GET['server'];
}
$____key = 216327208 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 108163604;
if (isset($_GET['port'])) {
    $____key = 74425452 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 37212726;
    $port = $_GET['port'];
}
$____key = 66948071 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 33474035;
if (isset($_GET['dbName'])) {
    $____key = 92227649 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 46113824;
    $dbName = $_GET['dbName'];
}
$____key = 166907005 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 83453502;
if (isset($_GET['dbUsername'])) {
    $____key = 48042320 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 24021160;
    $dbUsername = $_GET['dbUsername'];
}
$____key = 251876156 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 125938078;
if (isset($_GET['dbPassword'])) {
    $____key = 6460184 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 3230092;
    $dbPassword = $_GET['dbPassword'];
}
$____key = 203062337 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 101531168;
$sqlHost = $server . ":" . $port;
$dbFile = '../../rconfig.sql';
$configFilePathOriginal = '/home/rconfig/www/install/config.inc.php.template';
$configFilePathInstalled = '/home/rconfig/config/config.inc.php';
$array = array();
// add DB
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
$error = '';
// set error var to blank
try {
    $____key = 131580689 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 65790344;
    $dbh = new PDO('mysql:port=' . $port . ';host=' . $server, $dbUsername, $dbPassword, $options);
    $dbh->exec("CREATE DATABASE `{$dbName}`;");
    $dbCreated = 1;
} catch (PDOException $e) {
    $____key = 259719317 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 129859658;
    // delete DB if there was an error running the CREATE DB query
    try {
        $____key = 14544346 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 7272173;
        $dbh = new PDO('mysql:port=' . $port . ';host=' . $server, $dbUsername, $dbPassword, $options);
        $dbh->exec("DROP DATABASE `{$dbName}`;");
    } catch (PDOException $e) {
        $____key = 89911035 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 44955517;
        $error = "DB ERROR: " . $e->getMessage() . "(some special characters such as + signs are not allowed in MYSQl passwords)";
        //        echo $error;
        $array['error'] = '<strong><font class="bad">Fail - ' . $error . '</strong></font><br/>';
        echo json_encode($array);
        die;
    }
    $____key = 214695730 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 107347865;
    $error = "DB ERROR: " . $e->getMessage();
    $array['error'] = '<strong><font class="bad">Fail - ' . $error . '</strong></font><br/>';
    echo json_encode($array);
    die;
}
$____key = 169363752 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 84681876;
if ($dbCreated == 1) {
    $____key = 183426462 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 91713231;
    // rewrite the 'DATABASE_NAME' tag from the SQL file into memory
    $templateFile = file_get_contents($dbFile);
    $templateFile = str_replace('DATABASE_NAME', $dbName, $templateFile);
    $sql = file_get_contents($dbFile);
    //file name should be name of SQL file with .sql extension.
    try {
        $____key = 133574968 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 66787484;
        $dsn = 'mysql:host=' . $server . ';dbname=' . $dbName . ';port=' . $port;
        $dbh = new PDO($dsn, $dbUsername, $dbPassword, $options);
        $sqlArray = explode(';', $templateFile);
        foreach ($sqlArray as $stmt) {
            $____key = 66889298 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 33444649;
            //loop through each line of the sql file and execute
            if (strlen($stmt) > 3 && substr(ltrim($stmt), 0, 2) != '/*') {
                $____key = 136522229 ^ $GLOBALS["____instr"]["prev"];
                isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
                $GLOBALS["____instr"]["map"][$____key] += 1;
                $GLOBALS["____instr"]["prev"] = 68261114;
                $sth = $dbh->prepare($stmt);
                $sth->execute();
            }
            $____key = 145838910 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 72919455;
        }
        $____key = 258846765 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 129423382;
    } catch (PDOException $e) {
        $____key = 48174114 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 24087057;
        // delete DB if there was an error running any commands
        try {
            $____key = 238543521 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 119271760;
            $dbh = new PDO('mysql:port=' . $port . ';host=' . $server, $dbUsername, $dbPassword, $options);
            $dbh->exec("DROP DATABASE `{$dbName}`;");
        } catch (PDOException $e) {
            $____key = 91034082 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 45517041;
            $error = "DB ERROR: " . $e->getMessage();
            echo $error;
            $array['error'] = '<strong><font class="bad">Fail - ' . $error . '</strong></font><br/>';
            echo json_encode($array);
            die;
        }
        $____key = 75942503 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 37971251;
        $error = "DB ERROR: " . $e->getMessage();
        $array['error'] = '<strong><font class="bad">Fail - ' . $error . '. We have deleted the DB that was created. Please check your settings and try again.</strong></font><br/>';
        echo json_encode($array);
        die;
    }
    $____key = 203887391 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 101943695;
    /* Add details to /includes/config.inc.php file */
    $configFile = file_get_contents($configFilePathOriginal);
    // re-write config file in memory
    $configFile = str_replace('_DATABASEHOST', $server, $configFile);
    $configFile = str_replace('_DATABASEPORT', $port, $configFile);
    $configFile = str_replace('_DATABASENAME', $dbName, $configFile);
    $configFile = str_replace('_DATABASEUSERNAME', $dbUsername, $configFile);
    $configFile = str_replace('_DATABASEPASSWORD', $dbPassword, $configFile);
    chmod($configFilePathInstalled, 0777);
    file_put_contents($configFilePathInstalled, $configFile);
    chmod($configFilePathInstalled, 0644);
    shell_exec('chown -R apache /home/rconfig');
    // set all dir permissions correctly
    $array['success'] = '<strong><font class="Good">rConfig database installed successfully</strong></font><br/>';
} else {
    $____key = 170820985 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 85410492;
    $array['error'] = '<strong><font class="bad">Fail - ' . $error . '</strong></font><br/>';
    // DROP DB on failure
    try {
        $____key = 55083612 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 27541806;
        $dbh = new PDO('mysql:port=' . $port . ';host=' . $server, $dbUsername, $dbPassword, $options);
        $dbh->exec("DROP DATABASE `{$dbName}`;");
    } catch (PDOException $e) {
        $____key = 219007638 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 109503819;
        $error = "DB ERROR: " . $e->getMessage();
        echo $error;
        $array['error'] = '<strong><font class="bad">Fail - ' . $error . '</strong></font><br/>';
        echo json_encode($array);
        die;
    }
    $____key = 63905833 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 31952916;
}
$____key = 15328800 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 7664400;
echo json_encode($array);