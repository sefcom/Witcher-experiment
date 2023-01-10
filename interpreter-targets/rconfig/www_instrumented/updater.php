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
$____key = 39377564 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 19688782;
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
                <?php 
if (isset($_SESSION['errors'])) {
    $____key = 230189474 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 115094737;
    $errors = $_SESSION['errors'];
}
$____key = 169318894 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 84659447;
/* "Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal." */
$_SESSION['errors'] = array();
?>
                <!-- Main Content Start-->
                <fieldset id="dashboardFieldset" style="width:90%; min-height:147px; float:left;">
                    <legend>Update rConfig</legend>

                    <?php 
// chk=1 passed form update url. If not passed - Form is not displayed
if (isset($_GET['chk']) && $_GET['chk'] == 1) {
    $____key = 4011174 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 2005587;
    ?>

                        <div id="updateForm">	
                            <p><strong>rConfig update available</strong> - Please login to www.rconfig.com <a href="http://www.rconfig.com/index.php/download-menu" target="_blank">downloads</a> page and get the latest version of rConfig. 
                                Please create a <a href="settingsBackup.php">system backup</a> before you proceed.</p>	
                            <div class="spacer"></div><br/>
                            <p><strong>Your version: </strong><?php 
    echo $config_version;
    ?></p>	
                            <div class="spacer"></div>
                            <?php 
    // get latest version online
    //Setting the timeout properly without messing with ini values:
    $ctx = stream_context_create(array('http' => array('timeout' => 5)));
    $latestVer = file_get_contents("http://www.rconfig.com/downloads/version.txt", 0, $ctx);
    ?>
                            <p><strong>Update version: </strong><?php 
    echo $latestVer;
    ?></p>	
                            <div class="spacer">
                            </div>
                            <br/>

                            <!-- begin upload form -->
                            <div class="mainformDiv">
                                <form id="vendorsAdd" method="post" action="lib/crud/updater.crud.php" enctype="multipart/form-data"  class="myform stylizedForm stylized"  style="width:100%;">

                                    <div style="width:500px; margin-bottom:10px;">

                                        <label for="updateFile">Update ZIP File:</label>
                                        <div class="spacer"></div>
                                        <?php 
    if (isset($errors['fileInvalid'])) {
        $____key = 123992206 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 61996103;
        echo "<span class=\"error\">" . $errors['fileInvalid'] . "</span>";
    }
    $____key = 4384729 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 2192364;
    ?> 
                                        <?php 
    if (isset($errors['fileError'])) {
        $____key = 198111683 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 99055841;
        echo "<span class=\"error\">" . $errors['fileError'] . "</span>";
    }
    $____key = 18357551 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 9178775;
    ?> 
                                        <div class="spacer"></div>
                                        <input name="updateFile" type="file" id="updateFile" size="40"/>
                                        <button id="upload" type="submit" style="float:left; margin-left:10px; margin-top: -5px;">Upload</button>
                                        <div class="spacer"></div>
                                        <input type="hidden" id="upload" name="upload" value="upload">
                                        <div class="spacer"></div>

    <?php 
    if (isset($errors['success'])) {
        $____key = 137011537 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 68505768;
        ?>

                                            <span class="success" style="padding-right:4px; margin-left:10px;"><?php 
        echo $errors['success'];
        ?></span>
                                            <div class="mainformDiv">
                                                <form id="installUpdateFrm" method="post" action="lib/crud/updater.crud.php" enctype="multipart/form-data"  class="myform stylizedForm stylized"  style="width:100%;">

                                                    <div style="width:500px; margin-bottom:10px;">
                                                        <div class="spacer"></div><br/>
                                                        <?php 
        if (isset($errors['fileInvalid'])) {
            $____key = 91766030 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 45883015;
            echo "<span class=\"error\">" . $errors['fileInvalid'] . "</span>";
        }
        $____key = 97889946 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 48944973;
        ?> 
        <?php 
        if (isset($errors['fileError'])) {
            $____key = 120759499 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 60379749;
            echo "<span class=\"error\">" . $errors['fileError'] . "</span>";
        }
        $____key = 198233250 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 99116625;
        ?> 
                                                        <button id="installUpdateBtn" type="button" style="float:left; margin-left:10px; margin-top: -5px;" onclick="updateFn()">Install Update</button>
                                                        <div class="spacer"></div>
                                                        <input type="hidden" id="installUpdate" name="installUpdate" value="installUpdate">
                                                        <div class="spacer"></div>

                                                        <div id="installerNotice">
                                                            <span id="pleaseWait" style="display:none; margin-left:10px;">Updating rConfig - Standby... <img  width="12" height="12" src='images/ajax_loader.gif' alt='Please wait... '/></span>
                                                            <div class="success" id ="installMsgs" style="padding-right:4px; margin-left:10px;"><strong>Notices:</strong><br/></div>
                                                            <div class="spacer"></div>
                                                            <div class="clear" style="line-height:15px;">&nbsp;</div>	
                                                            <span class="success" id ="installNotice" style="padding-right:4px; margin-left:10px;">
                                                                <strong>
                                                                    <img src="images/Info.png"><?php 
        echo 'You have successfully upgraded to rConfig version ' . $latestVer . ' - Please refresh page.';
        ?>
                                                                </strong></span>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

    <?php 
    }
    $____key = 3091523 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 1545761;
    ?> 

                                    </div>
                                </form>
                            </div>

                        </div>	
<?php 
} else {
    $____key = 118241308 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 59120654;
    ?>

                        <p>rConfig update not available at this time</p>

<?php 
}
$____key = 9993565 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 4996782;
?>
                </fieldset>


            </div><!-- End Content -->
            <div style="clear:both;"></div>
        </div><!-- End Main -->

        <!-- JS script Include -->
        <script type="text/JavaScript" src="js/updater.js"></script>
        <!-- Footer Include -->
<?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>