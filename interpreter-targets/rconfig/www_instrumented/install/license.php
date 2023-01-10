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
$____key = 111121684 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 55560842;
require 'includes/head.php';
?>	
<div id="content">
    <h2>License Agreement</h2>
    <h3>rConfig License Information</h3>
    <hr/>
    <div id="section">
        <p>
            Please read the terms of your license carefully below. By continuing with the installation of rConfig, you declare that you agree to the terms of this license agreement in full
        </p>
        <div id="licenseDiv">
            <p>
                <?php 
$licence = file_get_contents("/home/rconfig/www/LICENSE.txt");
echo nl2br($licence);
?>
            </p>				
        </div>		
    </div>
    <div class="spacer"></div>
    <label>Accept License:</label>
    <input type="checkbox" name="acceptLicenseChkBox" id="acceptLicenseChkBox" value="0" onclick="acceptLicense();" class="checkbox"/>
    <div class="spacer"></div>
    <div class="clear"></div>

</div>
<!-- JS script Include -->
<script type="text/JavaScript" src="js/preinstall.js"></script>
<script type="text/JavaScript" src="js/license.js"></script>
<div id="footer">
    <div id="footerNav">
        <div id="last"><a href="preinstall.php"><< Last</a></div>
        <div id="next"><a href="#" id="next_a">Next >></a></div>
    </div>
</div>	
</div>
</body>
</html>