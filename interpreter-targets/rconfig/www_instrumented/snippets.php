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
$____key = 141189243 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 70594621;
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
// echo error message if is sent back in GET from CRUD
if (isset($_SESSION['errors'])) {
    $____key = 94940685 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 47470342;
    // move nested errors array to new array
    $errors = $_SESSION['errors'];
}
$____key = 44045054 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 22022527;
/* "Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal." */
$_SESSION['errors'] = array();
?>
                <fieldset id="tableFieldset">
                    <legend> Configuration Snippets </legend>
                    <?php 
if (isset($errors['Success'])) {
    $____key = 242643625 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 121321812;
    echo "<span class=\"error\">" . $errors['Success'] . "</span><br/>";
}
$____key = 252871458 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 126435729;
if (isset($errors['Fail'])) {
    $____key = 47527615 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 23763807;
    echo "<span class=\"error\">" . $errors['Fail'] . "</span><br/>";
}
$____key = 183707109 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 91853554;
?>
                    <div id="toolbar">
                        <button class="show_hide">Add Snippet</button>
                        <button onclick="editSnippet()">Edit Snippet</button>
                        <button onclick="delSnippet()">Remove Snippet</button>
                    </div>
                    <!-- begin devices form -->
                    <div class="mainformDiv">
                        <form id="snippetAddForm" name="snippetAddForm" method="post" action="lib/crud/snippets.crud.php" enctype="multipart/form-data" class="myform stylizedForm stylized" style="width:100%;">

                            <div id="formDiv" style="width:600px; margin-bottom:10px;">
                                <div>
                                    <label for="snippetName"><font color="red">*</font> Snippet Name:</label>
                                    <input name="snippetName" id="snippetName" size="75" tabindex='1' <?php 
if (isset($errors['snippetNameVal'])) {
    $____key = 54390495 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 27195247;
    echo 'value="' . $errors['snippetNameVal'] . '"';
}
$____key = 265758353 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 132879176;
?>>
                                    <div  id="errorDiv" style="float:left;margin-left:220px; margin-top:-10px; margin-bottom:10px;">
                                        <?php 
if (isset($errors['snippetName'])) {
    $____key = 210951033 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 105475516;
    echo "<span class=\"error\">" . $errors['snippetName'] . "</span>";
}
$____key = 85453223 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 42726611;
?>
                                    </div>
                                </div>
                                <div style="float:left;">
                                    <label for="snippetDesc"><font color="red">*</font> Snippet Description:</label>
                                    <input name="snippetDesc" id="snippetDesc" size="150" tabindex='2'  <?php 
if (isset($errors['snippetDescVal'])) {
    $____key = 256371305 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 128185652;
    echo 'value="' . $errors['snippetDescVal'] . '"';
}
$____key = 165858430 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 82929215;
?>>
                                    <div id="errorDiv" style="float:left;margin-left:220px; margin-top:-10px; margin-bottom:10px;">
                                        <?php 
if (isset($errors['snippetDesc'])) {
    $____key = 214923168 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 107461584;
    echo "<span class=\"error\">" . $errors['snippetDesc'] . "</span>";
}
$____key = 15397416 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 7698708;
?>
                                    </div>
                                </div>

                                <div style="clear:both">
                                    <label for="snippet"><font color="red">*</font> Snippet:</label>
                                    <textarea rows="8" cols="100" wrap="off" id="snippet" name="snippet" tabindex='6' style="width:500px;margin-left:10px;float:clear;" <?php 
if (isset($errors['snippetVal'])) {
    $____key = 65134322 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 32567161;
    echo 'value="' . $errors['snippetVal'] . '"';
}
$____key = 127727707 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 63863853;
?>/>
                                    </textarea> 
                                    <div class="spacer"></div>
                                    <div  id="errorDiv" style="float:left;margin-left:77px; margin-top:-10px; margin-bottom:10px;">
                                        <?php 
if (isset($errors['snippet'])) {
    $____key = 129136194 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 64568097;
    echo "<span class=\"error\">" . $errors['snippet'] . "</span>";
}
$____key = 146915803 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 73457901;
?>
                                    </div>						
                                </div>

                                <input type="hidden" id="add" name="add" value="add" tabindex='3'>
                                <input type="hidden" id="editid" name="editid" value="" tabindex='4'>
                                <div class="spacer"></div>
                                <button id="save" type="submit" tabindex='21'>Save</button>
                                <button class="show_hide" type="button" tabindex='22'>Close</button><?php 
/* type="button" to remove default form submit function which when pressed can cause the form action attr to take place */
?>
                            </div>
                        </form>
                    </div>
                    <!-- End mainformDiv -->
                    <div id="table">
                        <?php 
/* full table stored off in different script */
include "snippets.inc.php";
?>
                    </div>
                </fieldset>
            </div>
            <!-- End Content -->
            <div style="clear:both;">
            </div>
        </div>
        <!-- End Main -->
        <!-- JS script Include -->
        <script type="text/JavaScript" src="js/snippets.js"></script>
        <!-- Footer Include -->
        <?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>