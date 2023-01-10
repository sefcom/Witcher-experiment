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
$____key = 254493497 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 127246748;
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
            <?php 
/* Custom Devices Custom Form Functions */
require_once "lib/crud/compliancePolicies.frm.func.php";
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
// echo error message if is sent back in GET from CRUD
if (isset($_SESSION['errors'])) {
    $____key = 14093293 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 7046646;
    // move nested errors array to new array
    $errors = $_SESSION['errors'];
}
$____key = 190635200 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 95317600;
/* "Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal." */
$_SESSION['errors'] = array();
?>
                <fieldset id="tableFieldset">
                    <legend> Compliance Policies </legend>
                    <?php 
if (isset($errors['Success'])) {
    $____key = 196895965 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 98447982;
    echo "<span class=\"error\">" . $errors['Success'] . "</span><br/>";
}
$____key = 44935976 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 22467988;
if (isset($errors['Fail'])) {
    $____key = 115046455 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 57523227;
    echo "<span class=\"error\">" . $errors['Fail'] . "</span><br/>";
}
$____key = 186493753 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 93246876;
if (isset($errors['selectRadioErr'])) {
    $____key = 251947673 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 125973836;
    echo "<span class=\"error\">" . $errors['selectRadioErr'] . "</span>";
}
$____key = 228084037 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 114042018;
?>
                    <div id="toolbar">
                        <button class="show_hide">Add Policy</button>
                        <button onclick="editPolicy()">Edit Policy</button>
                        <button onclick="delPolicy()">Remove Policy</button>
                    </div>
                    <!-- begin devices form -->
                    <div class="mainformDiv">
                        <form id="policyAddForm" name="policyAddForm" method="post" action="lib/crud/compliancepolicies.crud.php" enctype="multipart/form-data" class="myform stylizedForm stylized" style="width:100%;">

                            <div id="formDiv" style="width:600px; margin-bottom:10px;">
                                <div>
                                    <label for="policyName"><font color="red">*</font> Policy Name:</label>
                                    <input name="policyName" id="policyName" size="75" tabindex='1' <?php 
if (isset($errors['policyNameVal'])) {
    $____key = 115305089 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 57652544;
    echo 'value="' . $errors['policyNameVal'] . '"';
}
$____key = 75642325 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 37821162;
?>>
                                    <div  id="errorDiv" style="float:left;margin-left:220px; margin-top:-10px; margin-bottom:10px;">
                                        <?php 
if (isset($errors['policyName'])) {
    $____key = 198868610 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 99434305;
    echo "<span class=\"error\">" . $errors['policyName'] . "</span>";
}
$____key = 24464070 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 12232035;
?>
                                    </div>
                                </div>
                                <div style="float:left;">
                                    <label for="policyDesc"><font color="red">*</font> Policy Description:</label>
                                    <input name="policyDesc" id="policyDesc" size="150" tabindex='2'  <?php 
if (isset($errors['policyDescVal'])) {
    $____key = 15212474 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 7606237;
    echo 'value="' . $errors['policyDescVal'] . '"';
}
$____key = 6160405 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 3080202;
?>>
                                    <div id="errorDiv" style="float:left;margin-left:220px; margin-top:-10px; margin-bottom:10px;">
<?php 
if (isset($errors['policyDesc'])) {
    $____key = 89128198 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 44564099;
    echo "<span class=\"error\">" . $errors['policyDesc'] . "</span>";
}
$____key = 47846621 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 23923310;
?>
                                    </div>
                                </div>
                                <div style="clear:both;">
                                </div>

                                <table border="0" cellpadding="3" cellspacing="0">
                                    <thead style="padding-left:20px;">
                                    <th>Available Policy Elements</th>
                                    <th></th>
                                    <th>Selected Policy Elements</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select id="availableElemsSel" name="availableElems[]" multiple="multiple" size="15" MULTIPLE>
<?php 
// get list of available elements from lib/crud/compliancePolicies.frm.func.php
echo availableElems();
?>
                                                </select>
                                            </td>
                                            <td align="center" style="vertical-align:middle">
                                                <button  type="button" name="addBtn" id="addBtn" tabindex='11' class="paginate" style="width:22px; margin-left:10px; margin-top:2px;" onclick="SelectMoveRows(document.policyAddForm.availableElemsSel, document.policyAddForm.selectedElemsSel)">+</button>
                                                <br>
                                                <button  type="button" name="removeBtn" id="removeBtn" tabindex='11' class="paginate" style="width:22px; margin-left:10px; margin-top:2px;" onclick="SelectMoveRows(document.policyAddForm.selectedElemsSel, document.policyAddForm.availableElemsSel)">-</button>
                                            </td>
                                            <td>
                                                <select id="selectedElemsSel" name="selectedElems[]" multiple="multiple" size="15" MULTIPLE>
                                <?php 
// get list of selected elements from lib/crud/compliancePolicies.frm.func.php
// echo selectElems();
?>				
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
<?php 
if (isset($errors['selectedElems'])) {
    $____key = 19246489 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 9623244;
    echo "<span class=\"error\" style=\"padding-left:252px\">" . $errors['selectedElems'] . "</span>";
}
$____key = 126996461 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 63498230;
?>

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
include "compliancepolicies.inc.php";
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
        <script type="text/JavaScript" src="js/compliancepolicies.js"></script>
        <!-- Footer Include -->
<?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>