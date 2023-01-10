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
$____key = 124612714 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 62306357;
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <!-- jQuery -->
        <script type="text/javascript" src="../js/jquery/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery.validate.min.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="top">
                <h1><img src="img/Install48.png"/>rConfig Installation</h1>
            </div>
            <div id="leftnav">
                <ul>
                    <li><a href="preinstall.php" <?php 
if (basename($_SERVER['SCRIPT_NAME']) == "preinstall.php") {
    $____key = 175315975 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 87657987;
    echo 'class="selected"';
}
$____key = 220451632 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 110225816;
?> >Pre-installation Check</a></li>
                    <li><a href="license.php" <?php 
if (basename($_SERVER['SCRIPT_NAME']) == "license.php") {
    $____key = 42041956 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 21020978;
    echo 'class="selected"';
}
$____key = 46794249 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 23397124;
?> >License</a></li>
                    <li><a href="dbinstall.php" id="dbinstall_a" <?php 
if (basename($_SERVER['SCRIPT_NAME']) == "dbinstall.php") {
    $____key = 123072586 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 61536293;
    echo 'class="selected"';
}
$____key = 42832816 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 21416408;
?>>Database Setup</a></li>
                    <li><a href="finalcheck.php" id="finalcheck_a" <?php 
if (basename($_SERVER['SCRIPT_NAME']) == "finalcheck.php") {
    $____key = 215162757 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 107581378;
    echo 'class="selected"';
}
$____key = 202303081 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 101151540;
?>>Final Check</a></li>
                </ul> 
            </div>