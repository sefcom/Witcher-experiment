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
$____key = 216259310 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 108129655;
include "includes/head.inc.php";
?>
<body>
    <!-- Headwrap Include -->
        <?php 
include "includes/masthead.inc.php";
?>
    <div id="mainwrap">
        <!-- TopNav Include -->
            <?php 
include "includes/topnav.inc.php";
?>
        <div id="main">
            <?php 
/* Custom Devices Custom Form Functions */
require_once "lib/crud/devices.frm.func.php";
?>
            <!-- Breadcrumb Include -->
            <?php 
include "includes/breadcrumb.inc.php";
?>
            <!-- Announcement Include -->
                <?php 
include "includes/announcement.inc.php";
?>
            <div id="content">
                <?php 
if (isset($_SESSION['errors'])) {
    $____key = 134680075 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 67340037;
    $errors = $_SESSION['errors'];
}
$____key = 174501195 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 87250597;
// below are populated if errors are sent back from CRUD script to re-populate from
if (isset($_SESSION['deviceName'])) {
    $____key = 85340913 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 42670456;
    $deviceName = $_SESSION['deviceName'];
    unset($_SESSION['deviceName']);
}
$____key = 64523294 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 32261647;
if (isset($_SESSION['deviceIpAddr'])) {
    $____key = 129425672 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 64712836;
    $deviceIpAddr = $_SESSION['deviceIpAddr'];
    unset($_SESSION['deviceIpAddr']);
}
$____key = 69802604 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 34901302;
if (isset($_SESSION['devicePrompt'])) {
    $____key = 199373964 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 99686982;
    $devicePrompt = $_SESSION['devicePrompt'];
    unset($_SESSION['devicePrompt']);
}
$____key = 112925506 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 56462753;
if (isset($_SESSION['deviceEnablePrompt'])) {
    $____key = 211934252 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 105967126;
    $deviceEnablePrompt = $_SESSION['deviceEnablePrompt'];
    unset($_SESSION['deviceEnablePrompt']);
}
$____key = 127055158 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 63527579;
if (isset($_SESSION['vendorId'])) {
    $____key = 235744495 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 117872247;
    $vendorId = $_SESSION['vendorId'];
    unset($_SESSION['vendorId']);
}
$____key = 14806731 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 7403365;
if (isset($_SESSION['deviceModel'])) {
    $____key = 235105514 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 117552757;
    $deviceModel = $_SESSION['deviceModel'];
    unset($_SESSION['deviceModel']);
}
$____key = 222802603 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 111401301;
if (isset($_SESSION['defaultCreds'])) {
    $____key = 135305574 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 67652787;
    $defaultCreds = $_SESSION['defaultCreds'];
    unset($_SESSION['defaultCreds']);
}
$____key = 260049918 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 130024959;
if (isset($_SESSION['deviceUsername'])) {
    $____key = 197232063 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 98616031;
    $deviceUsername = $_SESSION['deviceUsername'];
    unset($_SESSION['deviceUsername']);
}
$____key = 75564826 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 37782413;
if (isset($_SESSION['devicePassword'])) {
    $____key = 165251237 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 82625618;
    $devicePassword = $_SESSION['devicePassword'];
    unset($_SESSION['devicePassword']);
}
$____key = 141586369 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 70793184;
if (isset($_SESSION['deviceEnablePassword'])) {
    $____key = 62058625 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 31029312;
    $deviceEnablePassword = $_SESSION['deviceEnablePassword'];
    unset($_SESSION['deviceEnablePassword']);
}
$____key = 1379964 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 689982;
if (isset($_SESSION['catId'])) {
    $____key = 189045263 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 94522631;
    $catId = $_SESSION['catId'];
    unset($_SESSION['catId']);
}
$____key = 154032794 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 77016397;
/* "Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal." */
$_SESSION['errors'] = array();
?>
                <fieldset id="tableFieldset">
                    <legend>Device Management</legend>
                    <?php 
if (isset($errors['Success'])) {
    $____key = 258374500 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 129187250;
    echo "<span class=\"error\">" . $errors['Success'] . "</span><br/>";
}
$____key = 72071126 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 36035563;
if (isset($errors['Fail'])) {
    $____key = 184608849 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 92304424;
    echo "<span class=\"error\">" . $errors['Fail'] . "</span><br/>";
}
$____key = 19942013 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 9971006;
if (isset($errors['username'])) {
    $____key = 252810888 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 126405444;
    echo "<span class=\"error\">" . $errors['username'] . "</span><br/>";
}
$____key = 249584269 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 124792134;
?>
                    <div id="toolbar">
                        <div id="toolbarButtons">
                            <button class="show_hide">Add Device</button>
                            <button onclick="editDevice('button')">Edit Device</button>
                            <button onclick="delDevice()">Remove Device</button>
                            <!-- set below to let scripts know that the from is in edit mode - set in editDevice() -->
                            <input type="hidden" id="editModeOn" name="editModeOn" value="">
                            <!-- <button class="show_import"><img src="images/icon_import_dark.gif"/> &nbsp;Bulk Import</button> -->
                        </div>
                        <!-- end toolbarButtons -->
                    </div>
                    <!-- begin devices form -->
                    <div class="mainformDiv">
                        <form method="post" action="lib/crud/devices.crud.php"  class="myform stylizedForm stylized" onsubmit="return checkPwInput(this);">
                            <div id="left">
                                <legend>Device Details</legend>
                                <label for="deviceName"><font color="red">*</font> Device Name:</label>
                                <input name="deviceName" id="deviceName" placeholder="Device Name" tabindex='1' style="width:150px;" value="<?php 
if (isset($deviceName)) {
    $____key = 51232968 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 25616484;
    echo $deviceName;
}
$____key = 67299073 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 33649536;
?>" class="tooltip-right" data-original-title="You cannot edit a Device Name after it has been created" title="You cannot edit a Device Name after it has been created" alt="You cannot edit a Device Name after it has been created">
                                <div class="spacer"></div>
                                <?php 
if (isset($errors['deviceName'])) {
    $____key = 49301539 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 24650769;
    echo "<span class=\"error\">" . $errors['deviceName'] . "</span>";
}
$____key = 143841315 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 71920657;
?>

                                <label><font color="red">*</font> IP Address:</label>
                                <span class="small"><a href="javascript:void(0)" onclick="resolveDevice(document.getElementById('deviceName').value);">resolve device name</a></span>
                                <input name="deviceIpAddr" id="deviceIpAddr" placeholder="x.x.x.x" tabindex='2' style="width:150px;" value="<?php 
if (isset($deviceIpAddr)) {
    $____key = 181029167 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 90514583;
    echo $deviceIpAddr;
}
$____key = 218955865 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 109477932;
?>">
                                <div class="spacer"></div>
                                <?php 
if (isset($errors['deviceIpAddr'])) {
    $____key = 95168802 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 47584401;
    echo "<span class=\"error\">" . $errors['deviceIpAddr'] . "</span>";
}
$____key = 108308416 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 54154208;
?> <br/>
 <label> Enable Prompt:</label>
                                <input name="deviceEnablePrompt" id="deviceEnablePrompt" placeholder="router>" tabindex='2' style="width:150px;" value="<?php 
if (isset($deviceEnablePrompt)) {
    $____key = 59881051 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 29940525;
    echo $deviceEnablePrompt;
}
$____key = 79518863 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 39759431;
?>">
                                <div class="spacer"></div>
<?php 
if (isset($errors['deviceEnablePrompt'])) {
    $____key = 61256851 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 30628425;
    echo "<span class=\"error\">" . $errors['deviceEnablePrompt'] . "</span>";
}
$____key = 238623756 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 119311878;
?> <br/>
                                <label><font color="red">*</font> Main Prompt:</label>
                                <input name="devicePrompt" id="devicePrompt" placeholder="router#" tabindex='3' style="width:150px;" value="<?php 
if (isset($devicePrompt)) {
    $____key = 110537064 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 55268532;
    echo $devicePrompt;
}
$____key = 229042075 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 114521037;
?>">
                                <div class="spacer"></div>
<?php 
if (isset($errors['devicePrompt'])) {
    $____key = 249052169 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 124526084;
    echo "<span class=\"error\">" . $errors['devicePrompt'] . "</span>";
}
$____key = 248317558 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 124158779;
?> <br/>
                               
                                <label><font color="red">*</font> Vendor:</label>
                                <select name="vendorId" id="vendorId" tabindex='4' style="width:155px;">
                                    <?php 
if (isset($vendorId)) {
    $____key = 146059837 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 73029918;
    vendorId($vendorId);
} else {
    $____key = 38061899 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 19030949;
    vendorId();
}
$____key = 235505958 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 117752979;
/* taken from devices.frm.func.php */
?>
                                </select>
                                <div class="spacer"></div>
                                <?php 
if (isset($errors['vendorId'])) {
    $____key = 255252744 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 127626372;
    echo "<span class=\"error\">" . $errors['vendorId'] . "</span>";
}
$____key = 200077449 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 100038724;
?> 
                                <label><font color="red">*</font>Model:</label>
                                <input name="deviceModel" id="deviceModel" placeholder="Model" tabindex='5' style="width:150px;" value="<?php 
if (isset($deviceModel)) {
    $____key = 211287464 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 105643732;
    echo $deviceModel;
}
$____key = 52711947 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 26355973;
?>">
                                <div class="spacer"></div>
<?php 
if (isset($errors['deviceModel'])) {
    $____key = 199048615 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 99524307;
    echo "<span class=\"error\">" . $errors['deviceModel'] . "</span>";
}
$____key = 263177389 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 131588694;
?>

                            </div>
                            <div id="right">
                                <legend>Other Details</legend>
                                <label><font color="red">*</font> Category:</label>
                                <select name="catId" id="catId" style="width:155px;" tabindex='6' value="<?php 
if (isset($catId)) {
    $____key = 114181490 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 57090745;
    echo $catId;
}
$____key = 167057420 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 83528710;
?>" onchange="changeCatAlert(document.getElementById('editModeOn').value)">
                                <?php 
if (isset($catId)) {
    $____key = 144576265 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 72288132;
    categories($catId);
} else {
    $____key = 70946445 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 35473222;
    categories();
}
$____key = 81409439 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 40704719;
/* taken from devices.frm.func.php */
?>
                                </select>
                                <div class="spacer"></div>
<?php 
if (isset($errors['catId'])) {
    $____key = 65227928 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 32613964;
    echo "<span class=\"error\">" . $errors['catId'] . "</span>";
}
$____key = 34530945 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 17265472;
?> <br/>

                                <label>Custom Properties:</label>
<?php 
customProp();
/* taken from devices.frm.func.php */
?>
                                <br/>
                                <br/>
                            </div>

                            <div id="left">
                                <legend>Credentials</legend>

                                <label>Default username/password?</label>
                                <!-- <span class="small"><a href="javascript:void(0)" onclick="getDefaultUserPass();">default username/password</a></span> -->
                                <input type="checkbox" name="defaultCreds" id="defaultCreds" onclick="getDefaultUserPass(this);" style="width:15px;" <?php 
if (isset($defaultCreds)) {
    $____key = 248821833 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 124410916;
    echo 'checked';
}
$____key = 143791443 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 71895721;
?>>
                                <br />

                                <label>Username:</label>
                                <input name="deviceUsername" id="deviceUsername" placeholder="username" tabindex='7' style="width:150px;" value="<?php 
if (isset($deviceUsername)) {
    $____key = 149129805 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 74564902;
    echo $deviceUsername;
}
$____key = 123180118 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 61590059;
?>" autocomplete="off">
                                <div class="spacer"></div>
<?php 
if (isset($errors['deviceUsername'])) {
    $____key = 84671811 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 42335905;
    echo "<span class=\"error\">" . $errors['deviceUsername'] . "</span>";
}
$____key = 131439991 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 65719995;
?>
                                <br/>

                                <label>Password:</label>
                                <input type="password" name="devicePassword" id="devicePassword" placeholder="password" tabindex='8'  style="width:150px;" value="<?php 
if (isset($devicePassword)) {
    $____key = 38654793 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 19327396;
    echo $devicePassword;
}
$____key = 157244472 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 78622236;
?>" autocomplete="off">
                                <div class="spacer"></div>
<?php 
if (isset($errors['devicePassword'])) {
    $____key = 30134899 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 15067449;
    echo "<span class=\"error\">" . $errors['devicePassword'] . "</span>";
}
$____key = 187988454 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 93994227;
?> <br/>

                                <label>Enable Password:</label>
                                <input type="password" name="deviceEnablePassword" id="deviceEnablePassword" placeholder="Enable Password" tabindex='9' style="width:150px;" value="<?php 
if (isset($deviceEnablePassword)) {
    $____key = 21054470 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 10527235;
    echo $deviceEnablePassword;
}
$____key = 9416508 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 4708254;
?>" autocomplete="off">
                                <div class="spacer"></div>
                                    <?php 
if (isset($errors['deviceEnableMode'])) {
    $____key = 68315349 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 34157674;
    echo "<span class=\"error\">" . $errors['deviceEnableMode'] . "</span>";
}
$____key = 203465005 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 101732502;
?> <br/>

                                    
                                <label><font color="red">*</font> Template:</label>
                                <select name="templateId" id="templateId" tabindex='10' style="width:155px;">
                                    <?php 
if (isset($templateId)) {
    $____key = 82200075 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 41100037;
    templateId($templateId);
} else {
    $____key = 100360476 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 50180238;
    templateId();
}
$____key = 223800476 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 111900238;
/* taken from devices.frm.func.php */
?>
                                </select>
                                <div class="spacer"></div>
                                <?php 
if (isset($errors['templateId'])) {
    $____key = 71807676 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 35903838;
    echo "<span class=\"error\">" . $errors['templateId'] . "</span>";
}
$____key = 50614462 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 25307231;
?>         

                            </div>
                            <input type="hidden" id="add" name="add" value="add">
                            <input type="hidden" id="username" name="username" value="<?php 
echo $session->username;
?>">
                            <input type="hidden" id="editid" name="editid" value="">
                            <!-- end devices form -->
                            <div id="saveButtons">
                                <button class="" tabindex='13' id="submit" type="submit">Save</button>
                                <button class="show_hide" type="button" tabindex='14'>Close</button>
                            </div>
                        </form>
                    </div>
                    <!--  end mainformDiv -->
                    <div id="devicesTable">
<?php 
include "devices.inc.php";
?>
                    </div>
                </fieldset>
            </div>
            <!-- End Content -->
            <div style="clear:both;"></div>
            <!-- JS script Include -->
            <script type="text/JavaScript" src="js/devices.js"></script>
        </div>
        <!-- End Main -->
        <!-- Footer Include -->
<?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>
