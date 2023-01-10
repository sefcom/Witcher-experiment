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
$____key = 253671719 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 126835859;
include "includes/head.inc.php";
?>
<body>
    <!-- Masthead Include -->
    <?php 
include "includes/masthead.inc.php";
?>
    <div id="mainwrap">
        <!-- TopNav Include -->
        <?php 
include "includes/topnav.inc.php";
?>
        <div id="main">
            <div id="updateNotice">
                <span id="pleaseWait1" style="display:none">Checking for updates... <img  width="12" height="12" src='images/ajax_loader.gif' alt='Please wait... '/></span>
                <span id="noticeGood">	<img src="images/yellow-warning-sign_16.jpg"/>rConfig update available  - <a id="updateNow" href="updater.php?chk=1">update</a></span>
                <span id="noticeNoUpdate">	<img src="images/yellow-warning-sign_16.jpg"/>No updates available</span>
            </div>
            <!-- Breadcrumb Include -->
            <?php 
include "includes/breadcrumb.inc.php";
?>
            <!-- Announcement Include -->
            <?php 
include "includes/announcement.inc.php";
?>
            <div id="content">
                <!-- Main Content Start-->
                <fieldset id="dashboardFieldset" style="width:35%; min-height:147px; float:left;">
                    <legend>Server Information</legend>
                    <div class="tableSummary">
                        <div class="row">
                            <div class="cell">Servername</div>
                            <div class="cell last">
                                <?php 
echo $host;
// var set in topnav include
?>
                            </div>
                        </div>
                        <div class="row even">
                            <div class="cell">IP Address</div>
                            <div class="cell last">
                                <?php 
echo $ip;
// var set in topnav include
?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">DNS Addresses</div>
                            <div class="cell last">
                                <div id="dnsip">
                                    <?php 
// get resolv.conf output
$dnsArr = (include "lib/ajaxHandlers/ajaxGetDnsAddress.php");
// explode the array as returned
$ipList = explode(", ", $dnsArr);
$ipArr = array();
// foreach and implode IPs only
foreach ($ipList as $k => $v) {
    $____key = 137168904 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 68584452;
    if (filter_var($v, FILTER_VALIDATE_IP)) {
        $____key = 249593781 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 124796890;
        array_push($ipArr, $v);
    }
    $____key = 171254883 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 85627441;
}
$____key = 226896360 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 113448180;
echo implode(", ", $ipArr);
?>
                                </div>
                            </div>
                        </div>
                        <div class="row even">
                            <div class="cell">
                                Internet IP <a id="refreshPubIp" href="#">
                                    <img src="images/refresh.png" alt="Click to update Stored Public IP address" title="Click to update stored Public IP address"/>
                                </a>
                            </div>
                            <div class="cell last">
                                <div id="pubIp">
                                    <?php 
$msg = "<font color=\"red\">No Public IP Address</font>";
if (!file_exists("lib/ajaxHandlers/publicIp.txt")) {
    $____key = 64332630 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 32166315;
    echo $msg;
}
$____key = 78314354 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 39157177;
if ($ip = file_get_contents("lib/ajaxHandlers/publicIp.txt")) {
    $____key = 136568578 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 68284289;
    echo $ip;
} else {
    $____key = 119541215 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 59770607;
    echo $msg;
}
$____key = 184118286 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 92059143;
?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">Disk Free Space</div>
                            <div class="cell last">
                                <?php 
$fs = disk_free_space("/");
echo _format_bytes($fs);
?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- below loaded from dashboard.js -->
                <fieldset id="dashboadFieldSet" style="width:50%; min-height:147px; float:left;">
                    <legend>Last 5 devices added/modified</legend>
                    <div id="last5NodesAdded">
                        <table class="tableSimple">
                            <thead>
                                <tr>
                                    <th>Device Name</th>
                                    <th>Date Added</th>
                                    <th>Added By</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div><!-- End Content -->
            <div style="clear:both;"></div>
        </div><!-- End Main -->
        <!-- JS script Include -->
        <script type="text/JavaScript" src="js/dashboard.js"></script>
        <!-- Footer Include -->
        <?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>
