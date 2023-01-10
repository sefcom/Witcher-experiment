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
$____key = 206825381 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 103412690;
include "includes/head.inc.php";
?>
<body style="overflow:hidden;">
    <?php 
/**
 * userAccountEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 */
?>	
    <div id="forgotPasswordForm" class="myform stylizedForm stylized">
        <?php 
/**
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if (isset($_SESSION['useredit'])) {
    $____key = 151863088 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 75931544;
    unset($_SESSION['useredit']);
    echo "<h3>User Account Edit Success!</h3>";
    echo "<p><b>{$session->username}</b>, your account has been successfully updated " . "<a href=\"#\" onClick=\"javascript:window.close();\">Close</a></p>";
} else {
    $____key = 67055777 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 33527888;
    /**
     * If user is not logged in, then do not display anything.
     * If user is logged in, then display the form to edit
     * account information, with the current email address
     * already in the field.
     */
    if ($session->logged_in) {
        $____key = 202223260 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 101111630;
        // echo error message if is sent back in GET from lib/crud/ userproess.php
        if (isset($_SESSION['errors'])) {
            $____key = 49619275 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 24809637;
            // move nested errors array to new array
            $errors = $_SESSION['errors'];
        }
        $____key = 97351880 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 48675940;
        /* "Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal." */
        $_SESSION['errors'] = array();
        ?>

                <h1>User Account Edit : <?php 
        echo $session->username;
        ?></h1>
                <p>You can update your password and change your email address here.<br><br></p>
        <?php 
        if ($form->num_errors > 0) {
            $____key = 226232397 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 113116198;
            echo "<td><font size=\"2\" color=\"#ff0000\">" . $form->num_errors . " error(s) found</font></td>";
        }
        $____key = 38323873 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 19161936;
        ?>
                <?php 
        echo $form->error("username");
        ?>
                <form action="lib/crud/userprocess.php" method="POST"  style="margin-left:50px;">
                    <input type="hidden" name="editid" value="<?php 
        echo $session->userid;
        ?>">
                    <input type="hidden" name="username" value="<?php 
        echo $session->username;
        ?>">
                    <input type="hidden" name="ulevelid" value="<?php 
        echo $session->userlevel;
        ?>">

                    <label style="font-size:0.9em">Current Password:
        <?php 
        // echo error message if is sent back in GET from CRUD
        if (isset($errors['curpass'])) {
            $____key = 232416278 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 116208139;
            echo "<span class=\"error\">" . $errors['curpass'] . "</span>";
        } else {
            $____key = 84553548 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 42276774;
            echo "<span class=\"small\">Your current password</span>";
        }
        $____key = 119885418 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 59942709;
        ?>
                    </label>
                    <input type="password" name="curpass" maxlength="30" value="<?php 
        echo $form->value("curpass");
        ?>">


                    <div class="spacer"></div>
                    <label style="font-size:0.9em">New Password:
                        <?php 
        // echo error message if is sent back in GET from CRUD
        if (isset($errors['password'])) {
            $____key = 251284996 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 125642498;
            echo "<span class=\"error\">" . $errors['password'] . "</span>";
        } else {
            $____key = 51648875 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 25824437;
            echo "<span class=\"small\">Type Chosen new password</span>";
        }
        $____key = 142241617 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 71120808;
        ?>
                    </label>
                    <input type="password" name="newpass" maxlength="30" value="<?php 
        echo $form->value("newpass");
        ?>">

                    <div class="spacer"></div>
                    <label style="font-size:0.9em">Confirm Password:
                        <?php 
        // echo error message if is sent back in GET from CRUD
        if (isset($errors['passconf'])) {
            $____key = 223384924 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 111692462;
            echo "<span class=\"error\">" . $errors['passconf'] . "</span>";
        } else {
            $____key = 99570595 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 49785297;
            echo "<span class=\"small\">Confirm new password</span>";
        }
        $____key = 213709271 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 106854635;
        ?>
                    </label>
                    <input type="password" name="passconf" maxlength="30" value="<?php 
        echo $form->value("passconf");
        ?>">

                    <div class="spacer"></div>
                    <label style="font-size:0.9em">Email Address:
                        <?php 
        // echo error message if is sent back in GET from CRUD
        if (isset($errors['email'])) {
            $____key = 229418017 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 114709008;
            echo "<span class=\"error\">" . $errors['email'] . "</span>";
        } else {
            $____key = 221999601 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 110999800;
            echo "<span class=\"small\">Edit your email address</span>";
        }
        $____key = 118094811 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 59047405;
        ?>
                    </label>
                    <input type="text" name="email" maxlength="50" value="<?php 
        if ($form->value("email") == "") {
            $____key = 196986414 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 98493207;
            echo $session->userinfo['email'];
        } else {
            $____key = 240145620 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 120072810;
            echo $form->value("email");
        }
        $____key = 246576045 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 123288022;
        ?>
                           ">
                    <div class="spacer"></div>

                    <input type="hidden" name="subedit" value="1">
                    <button type="submit" value="Submit" class="forgotBtn">Submit</button>


                <!--<table align="left" border="0" cellspacing="0" cellpadding="3">
                <tr>
                <td>Current Password:</td>
                <td><input type="password" name="password" maxlength="30" value="
                    <?php 
        echo $form->value("password");
        ?>"></td>
                <td><?php 
        echo $form->error("curpass");
        ?></td>
                </tr>
                <tr>
                <td>New Password:</td>
                <td><input type="password" name="newpass" maxlength="30" value="
                    <?php 
        echo $form->value("newpass");
        ?>"></td>
                <td><?php 
        echo $form->error("newpass");
        ?></td>
                </tr>
                <tr>
                <td>Email:</td>
                <td><input type="text" name="email" maxlength="50" value="<?php 
        if ($form->value("email") == "") {
            $____key = 10125902 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 5062951;
            echo $session->userinfo['email'];
        } else {
            $____key = 157295220 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 78647610;
            echo $form->value("email");
        }
        $____key = 27329644 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 13664822;
        ?>
                ">
                </td>
                <td><?php 
        echo $form->error("email");
        ?></td>
                </tr>
                <tr><td colspan="2" align="right">
                <input type="hidden" name="subedit" value="1">
                <input type="submit" value="Edit Account"></td></tr>
                <tr><td colspan="2" align="left"></td></tr>
                </table>
        </form>
        <?php 
    }
    $____key = 229970878 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 114985439;
}
$____key = 123039761 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 61519880;