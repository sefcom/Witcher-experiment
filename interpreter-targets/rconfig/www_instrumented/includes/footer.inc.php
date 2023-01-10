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
$____key = 245381062 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 122690531;
?>
<div id="footer">
    <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootbox.min.js"></script>
    <ul>
        <li><a href="http://www.rconfig.com/" target="_blank"  alt="rConfig home page"  title="rConfig home page" >rConfig.com</a> <img src="images/icon_popup_light.gif"/> | </li>
        <li><a href="http:///www.rconfig.com/index.php/blog" target="_blank"  alt="rConfig blog"  title="rConfig blog" >Online Blog</a> <img src="images/icon_popup_light.gif"/> | </li>
        <li><a href="<?php 
echo $config_basedir . 'help';
?>" target="_blank" alt="rConfig help files" title="rConfig help files">Help Files</a> <img src="images/icon_popup_light.gif"/> | </li>		
        <li><a href="<?php 
echo $config_basedir . 'LICENSE.txt';
?>" target="_blank" alt="rConfig licensing information" title="rConfig licensing information">License Information</a> <img src="images/icon_popup_light.gif"/> | </li>
        <li><a href="http:///www.rconfig.com/" target="_blank"  alt="rConfig home page"  title="rConfig support page" >Online Support</a> <img src="images/icon_popup_light.gif"/> | </li>
    </ul>
    <div id="footer-copyright">
        <p>rConfig Version <?php 
echo $config_version;
?><span>&nbsp;&nbsp;&nbsp;</span>&copy; rConfig 2015 - <?php 
echo date("Y");
?></p>
    </div>
</div> <!-- End Footer -->
