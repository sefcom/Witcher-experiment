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
$____key = 115759056 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 57879528;
require 'includes/head.php';
?>	
<div id="content">
    <h2>Pre-Installation Check</h2>
    <p>
        If any of the following tests fail, you need to resolve them before installing rConfig or the installation may fail
    </p>
    <h3>Software Version Check</h3>
    <hr/>
    <div id="section">
        <div id="notes">
            <p>
                This section checks your server for recommended software versions compatible with this release of rConfig	<br />

            </p>
        </div>
        <div id="items">
            <div class="cell">
                <ul>
                    <li></li>
                    <li>PHP Version >= 5.3</li>
                    <li>MySQL Version >= 5.1</li>
                    <li>Apache Version >= 2.2</li>
                </ul>
            </div>	
            <div class="cellinside">
                <ul>
                    <li><div id="phpVersion"></div></li>
                    <li><div id="mysqlVersion"></div></li>
                    <li><div id="httpdVersion"></div></li>
                </ul>
            </div>						
        </div>		
    </div>
    <div class="clear"></div>

</div>
<!-- JS script Include -->
<script type="text/JavaScript" src="js/preinstall.js"></script>
<div id="footer">
    <div id="footerNav">
        <div id="last" class="disabled"><a href="#"><< Last</a></div>
        <div id="next"><a href="license.php">Next >></a></div>
    </div>
</div>
</div>
</body>
</html>