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
$____key = 103398890 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 51699445;
?>
<div id="headwrap">    <div id="header">        <div id="title"><h2><span style="color:#413F3C;">rConfig - Configuration Management</span></h2></div>        <div id="logo"><img src="images/logos/rConfig_red_trnsprnt_1_64px.png" alt="rConfigLogo" title="rConfig Logo" style="padding-top:5px;padding-right:5px;"/></div>        <div id="user-section">            <em>Logged in as <strong><?php 
echo $session->username;
?></strong></em>            <a href="javascript: void(0)"                onclick="window.open('useraccount.php',                               'Edit Account',                               'width=425, \                                height=500, \                                directories=no, \                                location=no, \                                menubar=no, \                                resizable=no, \                                scrollbars=0, \                                status=no, \                                toolbar=no');                       return false;">                Account</a> |             <a href="javascript: void(0)" onclick="openHelp()">Help</a> |             <a href="lib/crud/userprocess.php">Logout</a>            <br />            <br />            <!--<input /> <a href="#">Search</a> -->        </div>    </div> <!-- End header --></div> <!-- End headwrap -->