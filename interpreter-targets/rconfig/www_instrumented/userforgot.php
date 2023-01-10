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
$____key = 147686031 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 73843015;
?>
<!-- Head Include -->    
<?php 
include "includes/head_login.inc.php";
?>
<body style="overflow:hidden;">
    <div id="forgotPasswordForm" class="myform stylizedForm stylized">
        <?php 
// echo error message if is sent back in GET from lib/crud/ userproess.php
if (isset($_SESSION['errors'])) {
    $____key = 99234087 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 49617043;
    // move nested errors array to new array
    $errors = $_SESSION['errors'];
}
$____key = 229512758 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 114756379;
/* "Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal." */
$_SESSION['errors'] = array();
/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>
        <h1>Forgot Password</h1>
        <p>A new password will be generated for you and sent to the email address
            associated with your account, all you have to do is enter your
            username.<br><br></p>
        <form action="lib/crud/userprocess.php" method="POST" style="margin-left:50px;">
            <div class="spacer"></div>
            <label style="font-size:0.9em">Username:
                <div class="spacer"></div>
                <?php 
// echo error message if is sent back in GET from CRUD
if (isset($errors['user'])) {
    $____key = 21213134 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 10606567;
    echo "<span class=\"error\">" . $errors['user'] . "</span>";
} else {
    $____key = 189721145 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 94860572;
    echo "<span class=\"small\">Type your username</span>";
}
$____key = 36580132 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 18290066;
?>
            </label> 
            <input type="text" name="user" maxlength="30" value="<?php 
echo $form->value("user");
?>" tabindex="1">
            <input type="hidden" name="subforgot" value="1">
            <button type="submit" value="Get New Password" tabindex="2" class="forgotBtn">Submit</button>
        </form>
    </div>
</body>
</html>