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
$____key = 59265114 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 29632557;
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
                <fieldset id="dashboardFieldset" style="width:78%">
                    <legend>Connection Log</legend>
                    <a id="refreshLog" href="#"><img src="images/refresh.png" alt="Click to refresh system log" title="Click to refresh system log"/></a> Displaying last <font color="red">
                    <select name="displayNoLogs" id="displayNoLogs" tabindex='11' onchange="getLog(this.value)">
                        <option value ="10" selected>10</option>
                        <option value ="20">20</option>
                        <option value ="50">50</option>
                        <option value ="100">100</option>
                    </select>
                    </font> entries - <a href="#" onclick="javascript:openFile('/home/rconfig/logs/All-default.log');">View current log file</a>
                    <div class="spacer"></div><br/>
                    <table id="logDiv">
                    </table>					
                    <div id="logDivError" style="display:none;">
                        <div class="spacer"></div><br/>
                        <font color="red">Could not retrieve logging information</font>
                    </div>
                </fieldset>

                <fieldset id="tableFieldset" style="width:78%;">
                    <legend>Log files</legend>
                    <div id="logInfoDiv">
                        <br/>
                        <div id="logFiles" style="width:45%; padding-right:20px;">
                            <table class="tableSimple">
                                <thead>
                                <th>
                                    Current Log Files
                                </th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <button class="smlButton" id="" onclick="archiveFiles('/home/rconfig/logs/', 'log')">Archive Logs</button>
                            <button class="smlButton" id="deleteDebugsBtn" onclick="deleteDebugFiles('/home/rconfig/logs/', 'log')">Delete Logs</button>
                        </div>
                        <br/>
                        <div id="archiveLogFiles" style="width:45%; float: left;">
                            <table class="tableSimple">
                                <thead>
                                <th>
                                    Archive Log Files
                                </th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <button class="smlButton" id="deleteArchivesBtn" onclick="deleteDebugFiles('/home/rconfig/logs/archive/', 'zip')">Delete Archives</button>
                        </div>
                    </div>
                </fieldset>
            </div>
            <!-- End Content -->
            <div style="clear:both;">
            </div>
        </div>
        <!-- End Main -->
        <!-- JS script Include -->
        <script type="text/JavaScript" src="js/reportLogging.js"></script>
        <!-- Footer Include -->
        <?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>