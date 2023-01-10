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
$____key = 71933741 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 35966870;
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
                <fieldset id="tableFieldset" style="width:40%;">
                    <legend>Reports</legend>
                    <div id="connectionReportsDiv">
                        <p>
                            Click on a report below to view it's contents
                        </p>
                        <div class="spacer"></div>
                        <br/>
                        <table class="tableSimple">
                            <thead>
                            <th>Device Connectivity Reports</th>
                            </thead>
                            <tbody>
                                <tr id="connectionReports">
                            <div id="connectionReportsFileContent"></div>
                            </tr>
                            </tbody>
                        </table>
                        <br/>
                        <button class="smlButton" id="deleteFilesbtn" onclick="deleteFiles('/home/rconfig/reports/connectionReports/', 'html', '0')">Delete Reports</button>
                        <span id="pleaseWait0" style="display:none">Please wait... <img src='images/ajax_loader.gif'  width="12" height="12" alt='Please wait... '/></span>
                    </div>
                    <br/>
                    <br/>
                    <div id="compareReportsDiv">
                        <table class="tableSimple">
                            <thead>
                            <th>Configuration Comparison Reports</th>
                            </thead>
                            <tbody>
                                <tr id="compareReports">
                            <div id="compareReportsFileContent"></div>
                            </tr>
                            </tbody>
                        </table>
                        <br/>
                        <button class="smlButton" id="deleteFilesbtn" onclick="deleteFiles('/home/rconfig/reports/compareReports/', 'html', '1')">Delete Reports</button>
                        <span id="pleaseWait1" style="display:none">Please wait... <img src='images/ajax_loader.gif'  width="12" height="12" alt='Please wait... '/></span>
                    </div>
                    <br/>
                    <br/>							
                    <div id="configSnippetReportsDiv">
                        <table class="tableSimple">
                            <thead>
                            <th>Configuration Snippet Reports</th>
                            </thead>
                            <tbody>
                                <tr id="configSnippetReports">
                            <div id="configSnippetReportsContent"></div>
                            </tr>
                            </tbody>
                        </table>
                        <br/>
                        <button class="smlButton" id="deleteFilesbtn" onclick="deleteFiles('/home/rconfig/reports/configSnippetReports/', 'html', '1')">Delete Reports</button>
                        <span id="pleaseWait1" style="display:none">Please wait... <img src='images/ajax_loader.gif'  width="12" height="12" alt='Please wait... '/></span>
                    </div>
                    <br/>
                    <br/>			
                </fieldset>
            </div>
            <!-- End Content -->
            <div style="clear:both;">
            </div>
        </div>
        <!-- End Main -->
        <!-- JS script Include -->
        <script type="text/JavaScript" src="js/reports.js"></script>
        <!-- Footer Include -->
        <?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>