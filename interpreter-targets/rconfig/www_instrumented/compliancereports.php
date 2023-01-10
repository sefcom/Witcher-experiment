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
$____key = 111242578 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 55621289;
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
require_once "lib/crud/complianceReports.frm.func.php";
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
    $____key = 242486093 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 121243046;
    // move nested errors array to new array
    $errors = $_SESSION['errors'];
}
$____key = 82540521 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 41270260;
/* "Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal." */
$_SESSION['errors'] = array();
?>
                <fieldset id="tableFieldset">
                    <legend> Compliance Reports </legend>
                    <?php 
if (isset($errors['Success'])) {
    $____key = 47675092 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 23837546;
    echo "<span class=\"error\">" . $errors['Success'] . "</span><br/>";
}
$____key = 134900115 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 67450057;
if (isset($errors['Fail'])) {
    $____key = 8634387 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 4317193;
    echo "<span class=\"error\">" . $errors['Fail'] . "</span><br/>";
}
$____key = 231708815 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 115854407;
if (isset($errors['selectRadioErr'])) {
    $____key = 64275129 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 32137564;
    echo "<span class=\"error\">" . $errors['selectRadioErr'] . "</span>";
}
$____key = 208022403 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 104011201;
?>
                    <div id="toolbar">
                        <button class="show_hide">Add Report</button>
                        <button onclick="editReport()">Edit Report</button>
                        <button onclick="delReport()">Remove Report</button>
                    </div>
                    <!-- begin devices form -->
                    <div class="mainformDiv">
                        <form id="reportsAddForm" name="reportsAddForm" method="post" action="lib/crud/compliancereports.crud.php" enctype="multipart/form-data" class="myform stylizedForm stylized" style="width:100%;">

                            <div id="formDiv" style="width:600px; margin-bottom:10px;">
                                <div>
                                    <label for="reportsName"><font color="red">*</font> Report Name:</label>
                                    <input name="reportsName" id="reportsName" size="75" tabindex='1' <?php 
if (isset($errors['reportsNameVal'])) {
    $____key = 166769637 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 83384818;
    echo 'value="' . $errors['reportsNameVal'] . '"';
}
$____key = 254312968 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 127156484;
?>>
                                    <div  id="errorDiv" style="float:left;margin-left:220px; margin-top:-10px; margin-bottom:10px;">
                                        <?php 
if (isset($errors['reportsName'])) {
    $____key = 8412725 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 4206362;
    echo "<span class=\"error\">" . $errors['reportsName'] . "</span>";
}
$____key = 35698374 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 17849187;
?>
                                    </div>
                                </div>
                                <div style="float:left;">
                                    <label for="reportsDesc"><font color="red">*</font> Report Description:</label>
                                    <input name="reportsDesc" id="reportsDesc" size="150" tabindex='2'  <?php 
if (isset($errors['reportsDescVal'])) {
    $____key = 98198052 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 49099026;
    echo 'value="' . $errors['reportsDescVal'] . '"';
}
$____key = 58359327 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 29179663;
?>>
                                    <div id="errorDiv" style="float:left;margin-left:220px; margin-top:-10px; margin-bottom:10px;">
<?php 
if (isset($errors['reportsDesc'])) {
    $____key = 40621927 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 20310963;
    echo "<span class=\"error\">" . $errors['reportsDesc'] . "</span>";
}
$____key = 15305368 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 7652684;
?>
                                    </div>
                                </div>
                                <div style="clear:both;">
                                </div>

                                <table border="0" cellpadding="3" cellspacing="0">
                                    <thead style="padding-left:20px;">
                                    <th>Available Reports</th>
                                    <th></th>
                                    <th>Selected Reports</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select id="availablePoliciesSel" name="availablePolicies[]" multiple="multiple" size="15" MULTIPLE>
<?php 
// get list of available elements from lib/crud/complianceReports.frm.func.php
echo availablePolicies();
?>
                                                </select>
                                            </td>
                                            <td align="center" style="vertical-align:middle">
                                                <button  type="button" name="addBtn" id="addBtn" tabindex='11' class="paginate" style="width:22px; margin-left:10px; margin-top:2px;" onclick="SelectMoveRows(document.reportsAddForm.availablePoliciesSel, document.reportsAddForm.selectedPoliciesSel)">+</button>
                                                <br>
                                                <button  type="button" name="removeBtn" id="removeBtn" tabindex='11' class="paginate" style="width:22px; margin-left:10px; margin-top:2px;" onclick="SelectMoveRows(document.reportsAddForm.selectedPoliciesSel, document.reportsAddForm.availablePoliciesSel)">-</button>
                                            </td>
                                            <td>
                                                <select id="selectedPoliciesSel" name="selectedPolicies[]" multiple="multiple" size="15" MULTIPLE>
                                <?php 
// get list of selected elements from lib/crud/complianceReports.frm.func.php
// echo selectPolicies();
?>				
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
<?php 
if (isset($errors['selectedPolicies'])) {
    $____key = 161004249 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 80502124;
    echo "<span class=\"error\" style=\"padding-left:252px\">" . $errors['selectedPolicies'] . "</span>";
}
$____key = 84037851 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 42018925;
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
include "compliancereports.inc.php";
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
        <script type="text/JavaScript" src="js/compliancereports.js"></script>
        <!-- Footer Include -->
<?php 
include "includes/footer.inc.php";
?>
    </div>
    <!-- End Mainwrap -->
</body>
</html>